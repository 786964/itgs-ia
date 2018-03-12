// Data about commonly used units of measure.
// Currently only mass because I don't need anything else.
// I don't use name, but the idea is that it can be used to properly
// pluralize a 

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

export const Concentration = new Map([
    ["milligrams-per-milliliter", {
        name: "Microgram(s) per milliliter",
        abbr: "mg/mL",
        value: 1
    }],
    ["micrograms-per-milliliter", {
        name: "Microgram(s) per milliliter",
        abbr: "mcg/mL",
        value: 0.001
    }],
    // When solution has roughly the density of water
    ["percent", {
        name: "Percent",
        abbr: "%",
        value: 0.1
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
