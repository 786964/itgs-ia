import * as common from "./common.js";
import {convert, Mass, Concentration} from "./units.js";

// Container functions take a name argument to assign a name to the
// container and return an object with a root element that can be added
// to the DOM tree and a body element that can be appended to.  The body
// element is not necessarily empty, so it should not be cleared.
export function no_container(name) {
    var frag = document.createDocumentFragment();
    return {root: frag, body: frag};
}

export function label_container(name) {
    var form_group = document.createElement("div");
    form_group.className = "form-group";

    var label = document.createElement("label");
    label.textContent = `${name}: `;
    form_group.appendChild(label);

    return {root: form_group, body: label};
}

export function widget_container(name) {
    var card = document.createElement("div");
    card.className = "card";

    var card_header = document.createElement("div");
    card_header.className = "card-header";
    card_header.textContent = name;
    card.appendChild(card_header);

    var card_body = document.createElement("div");
    card_body.className = "card-body";
    card.appendChild(card_body);

    return {root: card, body: card_body};
}

export class Input {
    // Base class for inputs, which are an abstraction over DOM elements
    // that have values and can be watched, basically.
    // I didn't document these very well, but they are pretty self
    // explanatory.
    // TODO: maybe talk about them in the screencast

    constructor(opts) {
        // Maybe move the listen stuff to another class.
        this.listeners = [];
        this.name = opts.name;
        // The most sensible default container for most inputs is label.
        this.container = (opts.container || label_container)(this.name);
        this.optional = opts.optional || false;
        this.default = opts.default;
    }

    get value() {
        return this.default;
    }

    get valid() {
        return true;
    }

    get usable() {
        return this.valid || this.optional;
    }
    
    listen(callback) {
        this.listeners.push(callback);
    }

    tell() {
        for (var callback of this.listeners) {
            callback(this);
        }
    }

    add_to(node) {
        return node.appendChild(this.container.root);
    }
}

export class DummyInput extends Input {
    constructor(opts) {
        super(opts);

        this.tree = opts.tree;
        this.container.body.appendChild(this.tree);
    }
}

export class SelectInput extends Input {
    constructor(opts) {
        super(opts);

        if (opts.options instanceof Map) {
            this.opt_names = Array.from(opts.options.keys());
            this.opt_values = Array.from(opts.options.values());
        } else {
            this.opt_names = this.opt_values = Array.from(opts.options);
        }

        this.select = document.createElement("select");
        this.select.onchange = this.tell.bind(this);
        this.select.required = !this.optional;

        if (common.undef(this.default)) {
            this.select.appendChild(document.createElement("option"));
        }

        for (var [index, name] of common.enumerate(this.opt_names)) {
            var option = document.createElement("option");
            option.textContent = name;
            // The value gets stringified, so by making the value the
            // index, the real value can be recovered later from the
            // array of values.
            option.value = index;

            if (this.opt_values[index] === this.default) {
                option.selected = true;
            }

            this.select.appendChild(option);
        }

        this.container.body.appendChild(this.select);
    }

    get value() {
        return this.opt_values[this.select.value];
    }

    get valid() {
        return this.select.value !== "";
    }
}

export class TextInput extends Input {
    constructor(opts) {
        super(opts);

        this.allow_empty = !!opts.allow_empty;

        this.text = document.createElement("input");
        this.text.oninput = this.tell.bind(this);
        this.text.type = "text";
        this.text.required = !this.optional;

        if (!common.undef(this.default)) {
            this.text.value = this.default;
        }

        this.container.body.appendChild(this.text);
    }

    get value() {
        return this.text.value;
    }

    get valid() {
        return this.allow_empty || this.text.value !== "";
    }
}

export class NumberInput extends Input {
    constructor(opts) {
        super(opts);

        this.min = opts.min;
        this.max = opts.max;
        this.places = opts.places;

        this.number = document.createElement("input");
        this.number.oninput = this.tell.bind(this);
        this.number.type = "number";
        this.number.required = !this.optional;

        if (!common.undef(this.default)) {
            this.number.value = this.default;
        }

        if (!common.undef(this.min)) {
            this.number.min = this.min;
        }

        if (!common.undef(this.max)) {
            this.number.max = this.max;
        }

        if (!common.undef(this.precision)) {
            this.number.step = Math.pow(10, -this.places);
        } else {
            this.number.step = "any";
        }

        this.container.body.appendChild(this.number);
    }

    get value() {
        return +this.number.value;
    }

    get valid() {
        return this.number.value !== "" && this.number.checkValidity();
    }
}

export class MeasurementInput extends NumberInput {
    constructor(opts) {
        super(opts);

        this.domain = opts.domain;
        this.unit = opts.unit;

        this.unit_selection = new SelectInput({
            name: `${this.name} units`,
            container: no_container,
            optional: this.optional,
            default: this.unit,
            options: new Map(common.imap(this.domain, ([unit, data]) => {
                return [data.abbr, unit];
            }))
        });

        this.unit_selection.listen(this.tell.bind(this));
        this.unit_selection.add_to(this.container.body);
    }

    get value() {
        return convert(
            super.value, this.domain,
            this.unit_selection.value, this.unit
        );
    }
}

export class MassInput extends MeasurementInput {
    constructor(opts) {
        opts = Object.create(opts);
        opts.domain = Mass;
        opts.unit = opts.unit || "grams";
        opts.min = opts.min || 0;
        super(opts);
    }
}

export class ConcentrationInput extends MeasurementInput {
    constructor(opts) {
        opts = Object.create(opts);
        opts.domain = Concentration;
        opts.unit = opts.unit || "milligrams-per-milliliter";
        opts.min = opts.min || 0;
        super(opts);
    }
}

export class FixedMeasurementInput extends NumberInput {
    constructor(opts) {
        super(opts);

        this.unit_str = opts.unit_str;
        this.container.body.appendChild(
            document.createTextNode(this.unit_str)
        );
    }
}

export class SubmitButton extends Input {
    constructor(opts) {
        opts = Object.create(opts);
        opts.container = opts.container || no_container;
        super(opts);

        this.button = document.createElement("input");
        this.button.type = "submit";
        this.button.onclick = this.tell.bind(this);

        if (!common.undef(this.name)) {
            this.button.value = this.name;
        }

        this.container.body.appendChild(this.button);
    }
}

export class Form extends Input {
    constructor(opts) {
        opts = Object.create(opts);
        opts.container = opts.container || widget_container;
        super(opts);

        this.live = !!opts.live;
        this.process = opts.process;
        this.inputs = opts.inputs.map(this._convert_input.bind(this));

        this.form = document.createElement("form");
        this.form.onsubmit = () => {
            this.form_action();
            // Don't reload page on submit
            return false;
        }

        for (var input of this.inputs) {
            if (this.live) {
                input.listen(this.form_action.bind(this));
            }

            input.add_to(this.form);
        }

        if (!this.live || !common.undef(opts.submit_button_text)) {
            (new SubmitButton({
                name: opts.submit_button_text
            })).add_to(this.form);
        }

        this.container.body.appendChild(this.form);
    }

    _convert_input(input) {
        if (input instanceof Input) {
            return input;
        } else {
            return new input.__type__(input);
        }
    }

    form_action() {
        this.tell();
        // Get the value for the side-effect of running the process
        // function (which is probably desired) and pass it along for
        // subclasses to use.
        if (this.usable) {
            return this.value;
        }
    }

    get value() {
        // Value if valid, undefined otherwise.
        return this.process.apply(this, this.inputs.map(input => {
            if (input.valid) {
                return input.value;
            }
        }));
    }

    get valid() {
        return this.inputs.every(input => input.valid);
    }

    get usable() {
        return this.inputs.every(input => input.usable);
    }

    add_to(node) {
        // Call form_action when a live form is added to the DOM so that
        // live forms which are already usable get updated right away.
        var result = super.add_to(node);
        if (this.live) {
            this.form_action();
        }
        return result;
    }
}

export class Calculator extends Form {
    constructor(opts) {
        opts.live = common.undef(opts.live)? true : opts.live;
        super(opts);

        this.async = !!opts.async;
        this.async_progress = opts.async_progress;
        this.render = opts.render || this.default_render;
        this.result = document.createElement("div");
        this.container.body.appendChild(this.result);
    }

    async form_action() {
        this.result.innerHTML = "";

        var value = super.form_action();
        if (this.async) {
            if (!common.undef(this.async_progress)) {
                this.result.appendChild(this.async_progress);
            }
            value = await value;
            this.result.innerHTML = "";
        }

        if (this.usable) {
            this.result.appendChild(document.createElement("hr"));
            this.result.appendChild(this.render(value));
        }
    }

    default_render(value) {
        var frag = document.createDocumentFragment();
        var display = document.createElement("p");
        display.textContent = value;
        frag.appendChild(display);
        return frag;
    }
}
