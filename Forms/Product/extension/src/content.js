import * as ezyvet from "./ezyvet.js";

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
// returning promises doesn't work like is documented.  I suspect babel
// is at fault, but I'm not sure.
// In any case, writing my own protocol for dealing with this works fine
// and maybe has better cross-browser support.
browser.runtime.onMessage.addListener((message, sender, respond) => { 
    var fut = ACTIONS[message.func].apply(sender, message.args || []);
    
    fut.then(
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
