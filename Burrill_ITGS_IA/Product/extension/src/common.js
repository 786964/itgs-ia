export function undef(val) {
    return typeof val === "undefined"
}

export function* enumerate(iterable, start) {
    // Similar to Python's enumerate builtin
    var index = start || 0;
    for (var item of iterable) {
        yield [index, item];
        index++;
    }
}

export function* imap(iterable, func) {
    // Iterator map function, similar to Array::map
    for (var item of iterable) {
        yield func(item);
    }
}

export function frac(n) {
    // Fractional part of a number
    n = Math.abs(n);
    return n - Math.floor(n);
}

export function kv_table(kv, title) {
    var table = document.createElement("table");
    table.className = "table table-sm";

    if (!undef(title)) {
        var thead = document.createElement("thead");
        thead.className = "thead-dark";
        var tr = document.createElement("tr");
        var th = document.createElement("th");
        th.className = "text-center";
        th.scope = "col";
        th.colSpan = 2;
        th.textContent = title;
        tr.appendChild(th);
        thead.appendChild(tr);
        table.appendChild(thead);
    }

    var tbody = document.createElement("tbody");
    for ([index, [key, value]] of enumerate(kv)) {
        var tr = document.createElement("tr");

        var th = document.createElement("th");
        th.scope = "row";
        th.textContent = key;

        var td = document.createElement("td");
        td.textContent = value;

        // Get rid of the top border on the first row
        if (!index && undef(title)) {
            th.className = "border-top-0";
            td.className = "border-top-0";
        }

        tr.appendChild(th);
        tr.appendChild(td);
        tbody.appendChild(tr);
    }

    table.appendChild(tbody);
    return table;
}
