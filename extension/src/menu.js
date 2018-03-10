import 'bootstrap/dist/css/bootstrap.min.css';
import * as common from "./common.js";
import * as input from "./input.js";
import moment from "moment";

// Since I can't get pdfjs to work properly with webpack, I'm putting
// all my pdf stuff in this file rather than making a separate module
// out of it.
var pdfjs = window["pdfjs-dist/build/pdf"];
pdfjs.GlobalWorkerOptions.workerSrc = "/pdfjs/pdf.worker.js";

export function* get_pages(pdf) {
    // Yields promises.
    // Can be used kinda like an async generator but not really.
    // It's mostly just an async function you can step though
    // But it turns out I didn't even end up making use of that
    // stepability.
    for (var page = 1; page <= pdf.pdfInfo.numPages; page++) {
        yield pdf.getPage(page);
    }
}

export async function page_text(page) {
    // Get the text from a pdf page
    var tc = await page.getTextContent();
    return tc.items.map(item => item.str).join(" ");
}

export async function pdf_text(url) {
    // Get the text from a pdf document
    // Joins pages with newlines
    // Probably does stuff in parallel using Promise.all, but I didn't
    // test it.
    var pdf = await pdfjs.getDocument(url);
    var pages = await Promise.all(common.imap(
        get_pages(pdf), getting_page => {
            return getting_page.then(page=>page_text(page));
        }
    ));

    return pages.join("\n");
}

async function call_tab_func(func_name, ...args) {
    // Communicate with content.js on the active tab
    var tabs = await browser.tabs.query({
        active: true,
        currentWindow: true
    });

    var response = await browser.tabs.sendMessage(tabs[0].id, {
        func: func_name,
        args: args
    });

    if (response.success) {
        return response.value;
    } else {
        throw response.value;
    }
}

function simplify(text) {
    // Simplify text for more permissive searching
    return text.toLowerCase().replace(/\s+/g, " ");
}

function get_inputs(info) {
    // This 200+ line function is where all the supposed elegance of my
    // input classes went to die. :(
    var inputs = [];

    var info_container = document.createElement("div");
    var status_par = document.createElement("p");
    var info_table = [];

    if (info) {
        status_par.textContent = "Found animal information from EzyVet";
        if (info.weight !== null) {
            info_table.push(["Weight", `${info.weight.toFixed(2)} kg`]);
        }

        if (info.dob !== null) {
            info.dob = moment(info.dob);
            info_table.push(["Age", `${info.dob.fromNow(true)} old`]);
        }
        
        if (info.species !== null) {
            info_table.push(["Species", info.species]);
        }

        if (info.owner !== null) {
            info_table.push(["Owner", info.owner]);
        }
    } else {
        status_par.textContent = "No animal information found";
    }

    info_container.appendChild(status_par);
    
    if (info_table.length) {
        info_container.appendChild(common.kv_table(
            info_table, info && info.name || "Unnamed Pet"
        ))
    }

    inputs.push(new input.DummyInput({
        name: "Info",
        tree: info_container,
        container: input.widget_container
    }))

    if (info) {
        var search_status = document.createElement("p");
        inputs.push(new input.Calculator({
            name: "Search Attachments",
            async: true,
            async_progress: search_status,
            live: false,
            submit_button_text: "Search",
            inputs: [{
                __type__: input.TextInput,
                name: "Query"
            }],
            process: async function(query) {
                try {
                    var simple_query = simplify(query);
                    search_status.textContent = "Finding attachments...";
                    var urls = await call_tab_func("get_attachments", info.id);
                    search_status.textContent = `Searching ${urls.length} attachments...`

                    var matches = [];
                    for (var url of urls) {
                        var simple_text = simplify(await pdf_text(url));
                        if (simple_text.indexOf(simple_query) >= 0) {
                            matches.push(url);
                        }
                    }

                    return matches;
                } catch (err) {
                    search_status.textContent = "Search error!";
                    throw err;
                }
            },

            render: function(matches) {
                var frag = document.createDocumentFragment();

                var p = document.createElement("p");
                if (matches.length) {
                    p.textContent = "Results:";
                } else {
                    p.textContent = "No results.";
                }
                frag.appendChild(p);

                var ul = document.createElement("ul");
                for (var match of matches) {
                    var li = document.createElement("li");
                    var a = document.createElement("a");
                    a.href = match;
                    a.textContent = match.split("/").pop();
                    li.appendChild(a);
                    ul.appendChild(li);
                }
                frag.appendChild(ul);

                return frag;
            }
        }));
    }

    var weight_input_spec = {
        __type__: input.MassInput,
        name: "Weight",
        unit: "kilograms"
    };

    if (info && info.weight !== null) {
        weight_input_spec.default = parseFloat(info.weight.toFixed(2));
    }

    const CAT_K = 10;
    const DOG_K = 10.1;
    var sa_k_sel_spec = {
        __type__: input.SelectInput,
        name: "Animal",
        options: new Map([
            ["Cat", CAT_K],
            ["Dog", DOG_K]
        ])
    };

    const KITTEN_MER_COEFF = 2.5;
    const PUPPY_LT_4_MER_COEFF = 3;
    const PUPPY_GT_4_MER_COEFF = 2;
    const NEUTERED_CAT_MER_COEFF = 1.2;
    const NEUTERED_DOG_MER_COEFF = 1.6;

    var mer_coeff_sel_spec = {
        __type__: input.SelectInput,
        name: "Animal",
        optional: true,
        options: new Map([
            ["Kitten", KITTEN_MER_COEFF],
            ["Puppy <4 mos", PUPPY_LT_4_MER_COEFF],
            ["Puppy 4-12 mos", PUPPY_GT_4_MER_COEFF],
            ["Neutered cat", NEUTERED_CAT_MER_COEFF],
            ["Neutered dog", NEUTERED_DOG_MER_COEFF]
        ])
    };

    if (info) {
        var age = null;
        if (info.dob) {
            age = moment().diff(info.dob, "months");
        }

        if (info.species === "Canine") {
            sa_k_sel_spec.default = DOG_K;
            if (age !== null && age <= 12) {
                if (age < 4) {
                    mer_coeff_sel_spec.default = PUPPY_LT_4_MER_COEFF;
                } else {
                    mer_coeff_sel_spec.default = PUPPY_GT_4_MER_COEFF;
                }
            } else {
                // TODO: check gender
                mer_coeff_sel_spec.default = NEUTERED_DOG_MER_COEFF;
            }
        } else if (info.species === "Feline") {
            sa_k_sel_spec.default = CAT_K;
            if (age !== null && age < 12) {
                mer_coeff_sel_spec.default = KITTEN_MER_COEFF;
            } else {
                mer_coeff_sel_spec.default = NEUTERED_CAT_MER_COEFF;
            }
        }
    }

    inputs.push(new input.Calculator({
        name: "Surface Area",
        inputs: [
            sa_k_sel_spec,
            weight_input_spec
        ],

        process: function(k, weight) {
            return k * Math.pow(weight, 2/3) / 100;
        },

        render: function(result) {
            // The text is sanitized, so it's easier to use the unicode
            // character for "SUPERSCRIPT TWO" rather than doing the html
            // rendering ourselves.
            return this.default_render(`${result.toFixed(2)} m\xb2`);
        }
    }));

    inputs.push(new input.Calculator({
        name: "RER and MER",
        inputs: [
            mer_coeff_sel_spec,
            weight_input_spec
        ],

        process: function(coeff, weight) {
            var result = {};
            result.rer = 70 * Math.pow(weight, 0.75);
            if (!common.undef(coeff)) {
                result.mer = coeff * result.rer
            }
            return result;
        },

        render: function(result) {
            var kv = [["RER", result.rer.toFixed(0)]];
            if (!common.undef(result.mer)) {
                kv.push(["MER", result.mer.toFixed(0)]);
            }

            var frag = document.createDocumentFragment();
            frag.appendChild(common.kv_table(kv));
            return frag;
        }
    }));

    return inputs;
}

function fill_doc(info) {
    var content = document.getElementById("content");
    var sidebar = document.getElementById("sidebar");
    content.innerHTML = "";

    var inputs = get_inputs(info);

    var prev = null;
    for (var [idx, input] of common.enumerate(inputs)) {
        var menu_item = document.createElement("li");
        menu_item.className = "nav-item";
        var menu_link = document.createElement("a");
        menu_link.className = "nav-link";
        menu_link.textContent = input.name;
        menu_link.href = "#";
        menu_link.id = `sidebar-${idx}`;
        menu_item.appendChild(menu_link);
        sidebar.appendChild(menu_item);

        if (idx === 0) {
            prev = [input, menu_link];
            input.add_to(content);
            menu_link.classList.add("active");
        }
    }

    sidebar.addEventListener("mouseover", event => {
        // TODO: This is very gross, do something saner
        var parts = event.target.id.split("-");
        if (parts.length === 2 && parts[0] === "sidebar") {
            var idx = parseInt(parts[1]);
            var input = inputs[idx];

            if (prev !== null) {
                var [prev_input, prev_side] = prev;
                if (input == prev_input) {
                    return;
                }
                content.innerHTML = "";
                prev_side.classList.remove("active");
            }
            
            var side = event.target;
            input.add_to(content);
            side.classList.add("active");

            prev = [input, side];
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    call_tab_func("animal_info").then(
        (info) => {
            fill_doc(info)
        },
        (err) => {
            fill_doc(null);
        }
    );
});
