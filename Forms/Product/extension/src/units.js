// Data about commonly used units of measure.
// Currently only mass because I don't need anything else.

export const Mass = new Map([
    ["milligrams", {
        name: "Milligram(s)",
        abbr: "mg",
        value: 0.001
    }],
    ["grams", {
        name: "Gram(s)",
        abbr: "g",
        value: 1
    }],
    ["kilograms", {
        name: "Kilogram(s)",
        abbr: "kg",
        value: 1000
    }],
    ["pounds", {
        name: "Pound(s)",
        abbr: "lb",
        value: 453.59237
    }]
]);

export function convert(value, domain, from, to) {
    return value * domain.get(from).value / domain.get(to).value;
}

export function abbr_to_id(domain, abbr) {
    for ([id, data] of domain) {
        if (data.abbr == abbr) {
            return id;
        }
    }
}
