import * as units from "./units.js";
import moment from "moment";

export function animal_info(doc) {
    // Try to find information about the current animal
    // If there is no current animal, return null
    // Missing information is generally also represented as null
    // Weight is returned in kilograms

    var doc = doc || document;

    var id_tag = doc.getElementById("data_id1");
    if (!id_tag || !id_tag.value) {
        return null;
    }

    var id = id_tag.value;

    var name = doc.getElementById("an-1-animaldata_name").value;

    var owner_dropdown = doc.getElementById("clientcontactDropdown1");
    var owner = owner_dropdown.getElementsByTagName("input")[0].value;
    owner = owner.match(/(?:.*-\s*)?(.*)/)[1];
    if (!owner) {
        owner = null;
    }

    var species_dropdown = doc.getElementById("speciesDropdown1");
    var species = species_dropdown.getElementsByTagName("input")[0].value;
    if (!species) {
        species = null;
    }

    var weight_tag = doc.getElementById("an-1-animaldata_weight");
    var weight = weight_tag.value;
    var weight_label = weight_tag.parentElement.getElementsByTagName("label")[0];
    var weight_units = weight_label.innerText.match(/^Weight\(([^\)]*)\)$/);
    if (weight_units) {
        weight_units = units.abbr_to_id(units.Mass, weight_units[1]);
    }
    if (weight && weight_units) {
        weight = units.convert(
            parseFloat(weight), units.Mass,
            weight_units, "kilograms"
        );
    } else {
        weight = null;
    }

    var dob = doc.getElementById("an-1-animaldata_dateofbirth").value;
    // Make dob JSON serializable (we'll turn it back into a moment
    // on the popup)
    dob = moment(dob, "MM-DD-YYYY");
    if (dob.isValid()) {
        dob = dob.valueOf();
    } else {
        dob = null;
    }

    return {
        id: id,
        dob: dob,
        name: name,
        owner: owner,
        weight: weight,
        species: species
    };
}

export function full_url(url) {
    // Make a relative url global (or whatever the term would be)
    if (url.match(/^https?/)) {
        return url;
    }
    if (url.indexOf("//") === 0) {
        return window.location.protocol + url;
    }
    if (url.indexOf("/") == 0) {
        return window.location.origin + url;
    }

    return (
        window.location.protocol + 
        window.location.pathname + 
        "/" + url
    )
}

export function do_xhr(xhr, data) {
    // Promisify XHRs for easy use in async functions
    return new Promise(function(resolve, reject) {
        xhr.addEventListener("load", event => {
            if (xhr.status < 400) {
                resolve(event);
            } else {
                reject(event);
            }
        });

        xhr.addEventListener("error", reject);
        xhr.send(data);
    });
}

export async function find_attachments(record_id, limit) {
    // By default "only" search 50 pages (500 attachments)
    // Pass a negative number to keep searching forever (dangerous)
    limit = limit || 50;

    var attachments = [];
    while (limit--) {
        var query = btoa(JSON.stringify({
            "Start": attachments.length,
            "ItemsPerPage": 10,
            "RecordId": record_id
        }));
        
        var fd = new FormData();
        fd.append("options", query);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", full_url("/General/TableContent"), fd);
        var event = await do_xhr(xhr, fd);

        var dp = new DOMParser();
        var doc = dp.parseFromString(event.target.response, "text/html");

        var tbody = doc.getElementsByTagName("tbody")[0];
        var trs = tbody.getElementsByTagName("tr");

        if (!trs.length) {
            break;
        }

        for (var tr of trs) {
            var second_column = tr.getElementsByTagName("td")[1];
            var url = second_column.getElementsByTagName("a")[0].href;
            attachments.push(full_url(url));
        }
    }

    return attachments;
}

