import * as ezyvet from "./ezyvet.js";

// Welp, it looks like the webextension polyfill is broken when it comes
// to the documented behavior of onMessage handlers.  I can't use
// promises in Firefox because (see below), and I can't use callbacks in
// Chrome because of the polyfill.  So just do a naive polyfill.
if (typeof browser === "undefined") {
    var browser = chrome;
}

const ACTIONS = {
    animal_info: async function() {
        return ezyvet.animal_info();
    },

    get_attachments: async function(query) {
        var animal = ezyvet.animal_info();
        if (!animal) {
            return [];
        }

        return await ezyvet.find_attachments(animal.id);
    }
}

// Transmit promises through the respond function.  For some reason,
// returning promises doesn't work like is documented.  I suspect the
// babel polyfill is at fault, but I'm not sure.
// In any case, writing my own protocol for dealing with this works fine
// and maybe has better cross-browser support.
browser.runtime.onMessage.addListener((message, sender, respond) => {
    console.log("Respond", respond);
    var p = ACTIONS[message.func].apply(sender, message.args || []);
    
    p.then(
        function(result) {
            respond({
                success: true,
                value: result
            })
        },

        function(error) {
            respond({
                success: false,
                value: error
            })
        }
    )

    return true;
});
