import flask
import jinja2
import collections
import datetime
import random
import base64
import enum
import time
import json
import os

app = flask.Flask(__name__)

def timestamp():
    return int(time.time() * 1000)

WeightRecord = collections.namedtuple("WeightRecord", "time weight")

class Sex(enum.Enum):
    MALE = object()
    FEMALE = object()
    UNKNOWN = object()

class Pet:
    def __init__(self, *, pet_name, client_first, client_last,
                 weight_history, attachments, kind="animal",
                 dob=None, sex=Sex.UNKNOWN, desexed=True):
        self.pet_name = pet_name
        self.client_first = client_first
        self.client_last = client_last
        self.weight_history = weight_history
        self.attachments = attachments
        self.kind = kind
        self.dob = dob
        self.sex = sex
        self.desexed = desexed

    @property
    def name(self):
        return f'"{self.pet_name}" {self.client_last}'

    @property
    def weight(self):
        return max(
            self.weight_history,
            key=lambda record: record.time,
            default=WeightRecord(0, -1)
        ).weight

    @property
    def species_name(self):
        if self.kind == "cat":
            return "Feline"
        elif self.kind == "dog":
            return "Canine"
        return ""

    @property
    def client(self):
        return f"{self.client_last}, {self.client_first}"

    @property
    def sex_name(self):
        if self.sex is Sex.UNKNOWN:
            return "Unknown"
        
        if self.sex == Sex.MALE:
            sex = "M"
            desex = "N"
        elif self.sex == Sex.FEMALE:
            sex = "F"
            desex = "S"

        if not self.desexed:
            desex = ""

        return sex + desex
    
    @property
    def dob_string(self):
        if self.dob is None:
            return ""
        # Same format EzyVet uses
        return self.dob.strftime("%m-%d-%Y")

    def __str__(self):
        return self.name

# Constant data which can be splat'd into render_template
data = {
    "user_id": "42",
    "user_name": "potato@example.com",
    "display_name": "Dr. Potato",
    "business_name": "Sequoia High School",
    # Doesn't make sense as a department, but looks pretty good
    "department_name": "EzyVet Mock Server",
    "animals": [
        # Potato
        Pet(
            pet_name="Potato",
            kind = "cat",
            client_first="Ben",
            client_last="Burrill",
            weight_history=[
                WeightRecord(timestamp(), 42)
            ],
            attachments=[
                "/static/documents/potato.pdf"
            ]
        ),

        # Tests dog kind
        Pet(
            pet_name="Rover",
            kind="dog",
            client_first="Ben",
            client_last="Burrill",
            weight_history=[
                WeightRecord(timestamp(), 42)
            ],
            attachments=[
                "/static/documents/README.pdf",
                "/static/documents/needle.pdf",
                "/static/documents/haystack.pdf",
                "/static/documents/more-hay.pdf"
            ]
        ),

        # This pet has a bunch of non-existant documents
        # Tests error handling, as well as being an easy way to ensure
        # we get all the documents (because they are numbered)
        Pet(
            pet_name="Suspicious",
            client_first="Forged",
            client_last="Documents",
            weight_history=[],
            attachments=[f"/static/documents/{n}.pdf" for n in range(50)]
        ),

        # Tests the ability to find a needle in a haystack
        *(
            Pet(
                pet_name=f"Random pet {n}",
                client_first="Arbit",
                client_last="Rando",
                weight_history=[
                    WeightRecord(
                        time=random.randint(0, 10000),
                        weight=random.random() * 10
                    )
                    for _ in range(10)
                ],
                kind=random.choice(["cat", "dog", "animal"]),
                sex=random.choice(list(Sex)),
                desexed=bool(random.randint(0, 1)),
                dob=datetime.date.today() - datetime.timedelta(random.randint(0, 1000)),
                attachments=(
                    ["/static/documents/haystack.pdf"] * random.randint(0, 20) +
                    ["/static/documents/needle.pdf"] +
                    ["/static/documents/haystack.pdf"] * random.randint(0, 20)
                )
            )
            for n in range(100)
        )
    ]
}

def update_tab_activity(data, extra={}):
    extra = dict(extra)

    tab_activity = json.loads(data.get("tabActivity", "{}"))
    win_id = data.get("win_id", tab_activity.get("win_id"))
    if win_id is not None:
        tab_activity["win_id"] = tab_activity["activeWinId"] = win_id
    tab_activity["lastActiveTime"] = timestamp()

    # Not sure exactly what this does, based on js.php it controls the
    # time between updates.  Setting it to False makes them a little
    # less frequent.
    tab_activity["noUpdateLast"] = False

    print(tab_activity)
    return {
        **tab_activity,
        **extra
    }

def default_render(path, **kwargs):
    return flask.render_template(
        path, activity_state=update_tab_activity(flask.request.args),
        **data, **kwargs
    )

def render_tree_file(path, **kwargs):
    try:
        return default_render(f"{path}-{flask.request.method}.html", **kwargs)
    except jinja2.exceptions.TemplateNotFound:
        return default_render("template-tree-default.html")

def add_template_tree(route):
    @app.route(f"{route}/<path:path>",
               endpoint=route,
               methods=["GET", "POST"])
    def route_func(path):
        return render_tree_file(f"{route}/{path}")

add_template_tree("/admin")
add_template_tree("/animal")
add_template_tree("/clinical")
add_template_tree("/core")
add_template_tree("/dashboard")
add_template_tree("/File")
add_template_tree("/financial")
add_template_tree("/General")
add_template_tree("/help")
add_template_tree("/modules")
add_template_tree("/reactjs")
add_template_tree("/RecordFilter")
add_template_tree("/reporting")
add_template_tree("/Session")
add_template_tree("/Tag")
add_template_tree("/User")

@app.route("/")
def main():
    return default_render("main.html")

@app.route("/Session/UpdateActivity", methods=["POST"])
def update_activity():
    return flask.jsonify(update_tab_activity(flask.request.form))

@app.route("/General/OpenTabRecord")
def open_tab_record():
    class_name = flask.request.args["recordClass"]
    return render_tree_file(f"/General/record-classes/{class_name}")

@app.route("/General/SideList")
def side_list():
    animals = data["animals"]
    search = flask.request.args.get("search", "")
    start = int(flask.request.args.get("start", 0))
    items = int(flask.request.args.get("items", 33))

    matches = [
        (index, animal)
        for index, animal in enumerate(animals[start:], start)
        if search.casefold() in animal.name.casefold()
    ]

    return render_tree_file(
        flask.request.path, 
        search_results=dict(matches[:items]),
        page_start=start
    )

def get_table_data(start, items, record_id):
    all_attachments = data["animals"][record_id].attachments
    return {
        "attachment_start": start,
        "attachment_items": items,
        "next_page": base64.b64encode(json.dumps({
            "Start": start + items,
            "ItemsPerPage": items,
            "RecordId": record_id
        }).encode("utf-8")).decode("utf-8"),
        "all_attachments": all_attachments,
        "attachments": all_attachments[start:][:items]
    }

@app.route("/General/TableContent", methods=["POST"])
def table_content():
    options = json.loads(base64.b64decode(
        flask.request.form.get("options", base64.b64encode(b"{}"))
    ))

    start = options.get("Start", 0)
    items = options.get("ItemsPerPage", 10)
    record_id = options["RecordId"]

    return default_render(
        "table-content.html",
        **get_table_data(start, items, int(record_id))
    )

@app.route("/core/main/get-attachments.php")
def get_attachments():
    # Gross hack to get the last defined query string parameter rather
    # than the first because we are getting sent some stupid query.
    # http://werkzeug.pocoo.org/docs/0.14/datastructures/
    # Except actually the documentation is wrong, iteritems no longer
    # exists, there's only items.
    real_args = dict(flask.request.args.items(multi=True))
    forid = int(real_args.get("forid", 0))
    return render_tree_file(
        flask.request.path,
        **get_table_data(0, 10, forid)
    )

@app.route("/media/<path:path>")
def media_files(path):
    media_dir = os.path.join(app.static_folder, "media")
    return flask.send_from_directory(media_dir, path)

# A weird one
@app.route("/media/images/")
def media_images():
    return flask.redirect(flask.url_for("media_files", path="images/blank.png"))

@app.route("/images/<path:path>")
def image_files(path):
    image_dir = os.path.join(app.static_folder, "images")
    return flask.send_from_directory(image_dir, path)

if __name__ == "__main__":
    app.run()
