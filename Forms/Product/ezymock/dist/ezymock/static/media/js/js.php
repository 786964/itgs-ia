/* Queue.js - a function for creating an efficient queue in JavaScript
 *
 * The author of this program, Safalra (Stephen Morley), irrevocably releases
 * all rights to this program, with the intention of it becoming part of the
 * public domain. Because this program is released into the public domain, it
 * comes with no warranty either expressed or implied, to the extent permitted
 * by law.
 *
 * For more public domain JavaScript code by the same author, visit:
 *
 * http://www.safalra.com/web-design/javascript/
 */


/* Creates a new Queue. A Queue is a first-in-first-out (FIFO) data structure.
 * Functions of the Queue object allow elements to be enqueued and dequeued, the
 * first element to be obtained without dequeuing, and for the current size of
 * the Queue and empty/non-empty status to be obtained.
 */
function Queue(){

  // the list of elements, initialised to the empty array
  var queue = [];

  // the amount of space at the front of the queue, initialised to zero
  var queueSpace = 0;

  /* Returns the size of this Queue. The size of a Queue is equal to the number
   * of elements that have been enqueued minus the number of elements that have
   * been dequeued.
   */
  this.getSize = function(){

    // return the number of elements in the queue
    return queue.length - queueSpace;

  }

  /* Returns true if this Queue is empty, and false otherwise. A Queue is empty
   * if the number of elements that have been enqueued equals the number of
   * elements that have been dequeued.
   */
  this.isEmpty = function(){

    // return true if the queue is empty, and false otherwise
    return (queue.length == 0);

  }

    this.resetQueue = function() {
        queue = [];
    };

  /* Enqueues the specified element in this Queue. The parameter is:
   *
   * element - the element to enqueue
   */
  this.enqueue = function(element){
    queue.push(element);
  }

    this.prequeue = function(element){
        queue.push(element);
    }

  /* Dequeues an element from this Queue. The oldest element in this Queue is
   * removed and returned. If this Queue is empty then undefined is returned.
   */
  this.dequeue = function(){

    // initialise the element to return to be undefined
    var element = undefined;

    // check whether the queue is empty
    if (queue.length){

      // fetch the oldest element in the queue
      element = queue[queueSpace];

      // update the amount of space and check whether a shift should occur
      if (++queueSpace * 2 >= queue.length){

        // set the queue equal to the non-empty portion of the queue
        queue = queue.slice(queueSpace);

        // reset the amount of space at the front of the queue
        queueSpace=0;

      }

    }

    // return the removed element
    return element;

  }

  /* Returns the oldest element in this Queue. If this Queue is empty then
   * undefined is returned. This function returns the same value as the dequeue
   * function, but does not remove the returned element from this Queue.
   */
  this.getOldestElement = function(){

    // initialise the element to return to be undefined
    var element = undefined;

    // if the queue is not element then fetch the oldest element in the queue
    if (queue.length) element = queue[queueSpace];

    // return the oldest element
    return element;

  }

}
;

function AjaxManager()
{
	var requests=new Queue();
	var responses=new Array();
	var dontRender=new Array();

    this.addRequest=function(obj,request)
    {
        if(obj && obj!='' && g(obj)){
            $('#'+obj).addClass('hasJaxRequest').data('jaxrequest',request);
        };
    }

    this.remove_request=function(obj)
    {
        if(obj && obj!='' && g(obj)){
            $('#'+obj+'.hasJaxRequest').removeClass('hasJaxRequest').removeData('jaxrequest');
        };
    }

	this.request=function(url,query,obj,callback,dontblocksite,post,insertaction,servernotfoundcallback,nocontextmenu,loadingObj)
	{

		var s=Math.floor(Math.random()*99999999);

                var objexists=false;

                //Are we trying to ajax in somthing
                if(obj && obj!='')
                {
                    //Then does what we want to jax into exist
                    if(g(obj))
                    {
                        objexists=true;
                    }
                    //Otherwise we shouldn't execute it
                    else{return;}
                }

		if(objexists){
                    this.addRequest(obj,{
                        'url':url,
                        'method':insertaction, 
                        'args':query,
                        'post':post,
                        'callback':callback,
                        'nocontext':nocontextmenu
                    });
		};

        //if (!loadingObj) {loadingObj = {type: "screen"}};
        //
        //if (loadingObj) {
        //
        //    var loadingtype = loadingObj.type || "element";
        //
        //    if (loadingtype === "screen") {
        //        var el = $('#coverblock');
        //        var timesCalled = $('#coverblock').data("timescalled");
        //        $('#coverblock').data("timescalled", timesCalled + 1);
        //        $(el).show();
        //
        //    } else {
        //        var loadingText = loadingObj.text || "";
        //        var targetEl = obj;
        //        var style = "";
        //
        //        if (loadingObj.style) {
        //            style = " style='" + loadingObj.style +"'";
        //        }
        //
        //        var loadingJax = "<div class='loading-medium'" + style + "'>"+ loadingText + "</div>";
        //        $('#'+targetEl).html(loadingJax);
        //    }
        //
        //}

        if(!dontblocksite)
        {
            $('#coverblock').show();
        }

		$('#loading').fadeIn('fast');

        //if (obj == "left") {
        //    $('#rtab1details').html("<div class='loading-medium' style='font-size: 16px; height: 50px;'>Loading page. Please wait...</span>");
        //    requests.prequeue(Array(s,url,query,obj,callback,insertaction));
        //
        //} else if (obj == "rtab1details" || "clientcontacts1" || "commcontactdetails1") {
        //    requests.prequeue(Array(s,url,query,obj,callback,insertaction));
        //}
        //else {
        //    requests.enqueue(Array(s,url,query,obj,callback,insertaction));
        //}

        requests.enqueue(Array(s,url,query,obj,callback,insertaction));


        if( objexists && !g(obj).nocontext) {
                    if(obj.indexOf('rtab')==0) {
                        var tab=obj.replace(/rtab/,'').replace(/details/,'');
                        var rtabTab = g('rtab'+tab);
                        if( rtabTab && rtabTab.tabview){tab_load=rtabTab.tabview;}
                    }
                    else if( !nocontextmenu 
                        && (obj!='calendar')&&(obj!='sideList')&&(obj!='left') 
                        && g(obj) 
                        && ( !insertaction || insertaction == 'insert' ) )
                    {
                        if( !translateCorrection )
                        {
                            $('#'+obj).unbind('contextmenu').bind( 'contextmenu', context_std);
                            g(obj).oncontextmenu=function(){return false;};
                        }
                    }
//                    g(obj).jaxrequest=Array(url,query,callback,insertaction);
		}
		called=url;
		if(query)
			var query=query.replace(/&amp;/g,"&");
		else
			var query='';
		tab=get_getvalue('tab',query);
		var xmlhttp=false;
		xmlhttp=(!window.XMLHttpRequest)?(new ActiveXObject("Microsoft.XMLHTTP")):(new XMLHttpRequest());
                
        var generalRequestStuff = '';
        if( $('#data_class'+tab).length )
        {
            generalRequestStuff = 'forid='+$('#data_id'+tab).val()
                +'&'+'forclass='+$('#data_class'+tab).val()
                +'&'+'fortype='+$('#data_type'+tab).val()
                +'&'+'clinicid='+$('#data_clinicid'+tab).val()
            + '&';
        }
        top.tabActivity.currentTime = getBloodyTimeFFS();
        generalRequestStuff += 'tabActivity='+fixedEncodeURI(JSON.stringify(top.tabActivity))+'&';
                
		if(post) {
			postparams=query;
			xmlhttp.open('POST',basehref+url+'?s='+s+'&'+generalRequestStuff+'request_time='+getBloodyTimeFFS()+'&'+'last_active_time='+tabActivity.lastActiveTime+'&'+'win_id='+$('#win_id').val(),true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		}
		else {
			xmlhttp.open('GET',basehref+url+'?s='+s+'&'+'request_time='+getBloodyTimeFFS()+'&'+'last_active_time='+tabActivity.lastActiveTime+'&'+'win_id='+$('#win_id').val()+'&'+generalRequestStuff+query,true);
		}
		xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4) {
                    if(xmlhttp.status==200) {
                        response(s+"",xmlhttp.responseText);
                    }
                    else if(xmlhttp.status==404) {
                        response(s+"",' ');
                        if( !( url.indexOf('logerror.php') > 0 ) )
                        {
                            jax_post('core/main/set/logerror.php','error='+encodeURI(window.btoa('<font color=#660099><b>xmlhttp.status: '+xmlhttp.status+'<br />'+xmlhttp.statusText+'<br />'+url+'</b></font><br />')));
                        }
                    }
                    else if(xmlhttp.status==412) {
                        cancel(s+"",xmlhttp.responseText);
                    }
                    else if( xmlhttp.status != 0) {
                        response(s+"",' ');
                        if( !( url.indexOf('logerror.php') > 0 ) )
                        {
                            jax_post('core/main/set/logerror.php','error='+encodeURI(window.btoa('<font color=#660099><b>xmlhttp.status: '+xmlhttp.status+'<br />'+xmlhttp.statusText+'<br />'+url+'</b></font><br />')));
                        }
                    } 
                    else
                    {
                        if(servernotfoundcallback)
                        {
                            servernotfoundcallback();
                        }
                    }
                } 
		};
		if(post)
			xmlhttp.send(postparams);
		else
			xmlhttp.send(url);
	}
	var response= function(s,responseText)
	{
		s=s+"";
		responses[s]=responseText;
        //checkClickBlocking();
		do_check();
	}
	var cancel= function( s , responseText )
	{
		dontRender[s] = true;
        response( s , responseText );
	}

    var checkClickBlocking = function() {

        var coverblock = document.getElementById('coverblock');

            var timescalled = $(coverblock).data('timescalled');

            $(coverblock).data('timescalled', timescalled - 1);


            if ($(coverblock).data('timescalled') <= 0) {
                $(coverblock).hide().data('timescalled', 0);
            }
    };
	var do_check= function()
	{
		var last = requests.getOldestElement();
		if(last)
		{            
            (function(){
                var s=last[0]+"";
                var responseText = responses[s];

                if(responseText || responseText=='')
                {							
                    var obj=last[3];
                    var callback=last[4];
                    var url=last[1];
                    var insertaction=last[5];
                    var noeval = false;

                    var jsitems = getAllJavascriptMatches(responseText);
                    responseText = responseText.replace(/<script\b.*?>([\s\S]*?)<\/script>/ig,'').split('').join('');
                    if(obj && g(obj)){
                        if( dontRender[s] )
                        {
                            delete dontRender[s];
                        }
                        else
                        {
                            switch(insertaction)
                            {
                                case "none":{               
                                        break;
                                    }
                                case "before":{$('#'+obj).before(responseText);break;}
                                case "after":{$('#'+obj).after(responseText);break;}
                                case "append":{$('#'+obj).append(responseText);break;}
                                case "replace":{                 
                                        $('#'+obj).empty().replaceWith(responseText);break;}
                                case "insert":
                                default:{                                    
                                        if($('#'+obj).empty().length)
                                        {
                                            g(obj).innerHTML=responseText;
                                        }
                                        break;
                                }
                            }
                        }
                    }
                    requests.dequeue();
                    delete responses[s];

//                  $('input,textarea',$('#'+obj)).not('[processed],.colorpickerfield,#feedbacktext').unbind();
                    for( var i = 0; i < jsitems.length; i++ ){                                    
                                                        try {
                                eval(jsitems[i]);
                            }
                            catch(e) {
                                if( !( url.indexOf('logerror.php') > 0 ) )
																{
																		var err = new Error();
																		jserror(((obj && obj!='' && g(obj))?$(g(obj)).data('jaxrequest'):'')+' - '+e+'<br/><br/>'+err.stack,url);
																}
                            }                                                                 
                                                };
                    $('input,textarea',$('#'+obj)).not('[processed],.colorpickerfield,#feedbacktext')
                                    .bind('focus', function(e){
                                        $(this).addClass('focused');
                                    }).bind('blur',function(e){
                                        $(this).removeClass('focused');
                                    }).each(function(e){
                                        this.processed=true;
                                    });

                    if(callback){
                        callback();
                    };

                    $('input').attr('autocomplete','off');
                     $('#loginfield').attr('autocomplete','on');                     //$('input:checkbox:not([safari])').checkbox();
                    //$('input:radio:not([safari])').checkbox();

                    if( requests.getSize()==0){
                        $('#loading').fadeOut('fast');
                        $('#coverblock').data('timescalled', 0).hide();
    //					$('.focused').removeAttr("readonly");
                    }
                    do_check();
                }
            })();
		}
		else
		{
			responses=Array();
		}
	}		
}

function getAllJavascriptMatches( responseText )
{
    var matches = [];
    var instancere = /<script\b.*?>([\s\S]*?)<\//ig;
    while( match = instancere.exec(responseText) ){
           matches[matches.length] = match[1].split('').join('');
    };
    return matches;
};
var CkHelper = (function()
{
    var ckTextDoms = ['text', 'span', 'em'];

    return {
        /**
         * Returns the greatest grand parent of a node in the CkEditor (before body)
         * If the body is passed, then it is returned
         * @param node
         * @returns node
         */
        top: function(node)
        {
            if (node.getParent() == null
                || node.getParent().getName() == 'body'
                || typeof node.getName === 'function' && node.getName() == 'body'
            ) {
                return node;
            }
            return this.top(node.getParent());
        },

        /**
         * DFS Post-Order search for the next node
         * @param top Greatest grandparent of the node.
         * @param node Node currently processed.
         * @param start Starting node.
         * @param foundStart If true, the starting node has now been found
         * @param foundMatch If true, the next node with input tag has been found and can be returned.
         */
        nextInputTag: function(top, node, start, foundStart, foundMatch)
        {
            foundStart = typeof foundStart !== 'undefined' ? foundStart : false;
            foundMatch = typeof foundMatch !== 'undefined' ? foundMatch : false;

            // --- check if current node has #INPUT#
            if (foundStart === true
                && node.type == CKEDITOR.NODE_TEXT
                && node.getText().includes('#INPUT#')
                && (typeof node.getName !== 'function' || ckTextDoms.indexOf(node.getName()) >= 0)
            ) {
                return {
                    node: node,
                    foundMatch: true,
                    foundStart: foundStart
                };
            }

            // --- check the flag that determines if the method can start returning results
            if (node.equals(start)) {
                foundStart = true;
            }

            // --- has children; traverse
            if (typeof node.getChildren === 'function') {
                // --- recursive call through each child node
                var children = node.getChildren();
                for (var i = 0; i < children.count(); i++) {
                    var child = children.getItem(i);
                    var result = this.nextInputTag(node, child, start, foundStart, foundMatch);

                    foundStart = result.foundStart;
                    if (result.foundMatch == true) {
                        return result;
                    }
                }
            }

            if (foundStart == true
                && !node.equals(start)
                && node.type == CKEDITOR.NODE_TEXT
                && node.getText().includes('#INPUT#')
                && (typeof node.getName !== 'function' || ckTextDoms.indexOf(node.getName()) >= 0)
            ) {
                foundMatch = true;
            }

            return {
                node: node,
                foundMatch: foundMatch,
                foundStart: foundStart
            };
        },

        /**
         * Processes the given input tag.
         * #INPUT# are highlighted
         * #INPUT[...] generate a picklist.
         * @param editor The CkEditor instance
         * @param node The node where the input tag is located
         * @param tab Unique tab ID for the picklist popup.
         * @returns {*}
         */
        processInputTag: function(editor, node, tab, offset)
        {
            // first we want to define a range then select the #INPUT#
            var range = editor.createRange();
            var sel = editor.getSelection();

            // set range at start and end of #INPUT#
            var start_of_input = node.getText().indexOf('#INPUT#', offset);
            range.selectNodeContents(node);
            range.setStart(node, start_of_input);
            range.setEnd(node, start_of_input + '#INPUT#'.length);

            // select the range and scroll into view
            range.scrollIntoView();
            sel.selectRanges([range]);

            // now we check if the #INPUT# is followed by '['
            // indicating that it is the beginning of a picklist
            if (node.getText().substr(range.endOffset, 1) != '[') {
                // this means it is not a picklist
                return;
            }

            // store beginning index of picklist
            // keep adjusting selection range based on last closing bracket
            var begin_picklist_index = range.endOffset;
            range.setStart(node, begin_picklist_index);
            range.setEnd(node, node.getText().length);
            sel.selectRanges([range]);

            // check bracket stack
            var result = matchBracketStack(sel.getSelectedText());

            // if bracket stack is good
            if (!result.fail) {
                // then update selection
                range.setStart(node, start_of_input);
                range.setEnd(node, begin_picklist_index + result.closingIndex);
                sel.selectRanges([range]);
            } else {
                // make copy of node to not lose original node
                var _node = node;

                while (true) {
                    // if next node is not found, collapse selection
                    // and return
                    _node = _node.getNext();
                    if (_node === 'undefined') {
                        range.setStart(node, start_of_input);
                        range.setEnd(node, start_of_input + '#INPUT#'.length);
                        sel.selectRanges([range]);
                        return;
                    }

                    // set end to the end of the new node
                    // if the node type is element, then offset works a little differently
                    var _node_endoffset = _node.getText().length;
                    if (_node.type == CKEDITOR.NODE_ELEMENT) {
                        _node_endoffset = 1;
                    }
                    range.setEnd(_node, _node_endoffset);
                    sel.selectRanges([range]);

                    // check bracket stack
                    result = matchBracketStack(sel.getSelectedText());

                    // if bracket stack is good
                    if (!result.fail) {
                        // then update selection
                        range.setStart(node, start_of_input);
                        var index_txt = sel.getSelectedText().substr(result.closingIndex);
                        var closing_bracket_index = _node.getText().indexOf(index_txt);
                        range.setEnd(_node, closing_bracket_index);
                        sel.selectRanges([range]);
                        break;
                    }
                }
            }

            // now we have a valid picklist, but lets validate it once more
            var input_data = sel.getSelectedText().substr('#INPUT#'.length);
            var validation = validateQuestionInput(input_data.substr(1, input_data.length-2));

            if (validation) {
                input_data = input_data.substr(1, input_data.length-1);

                var m = [
                    sel.getSelectedText(),
                    '#INPUT#',
                    input_data
                ];

                var editorPopup = $('#wysiwig_popup'+tab);
                if (m[2].charAt(0) == "[") {
                    m[2] = m[2].slice(1, m[2].length - 1);
                }

                // --- generate question popup
                $(this).addClass('usingPickList');
                return generateQuestionContent(this, m, start_of_input, editorPopup, editor);
            }
        },
    };
})();

function matchBracketStack(stringInputData)
{
    var bracketStack = [];
    var lastClosingBracketIndex = 0;
    for (var i=0; i <stringInputData.length; i++) {
        if (stringInputData[i] == "[") {
            // --- this is the beginning of a second outermost [] bracket pair.
            // don't include this.
            if (i > 0 && bracketStack.length == 0) {
                break;
            }
            bracketStack.push("[");
            continue;
        } else if (stringInputData[i] == "]") {

            if (bracketStack.pop() != "[") {
                return {closingIndex: lastClosingBracketIndex, fail: true};
            } else {
                lastClosingBracketIndex = i+1;
            }
        }
    }

    if (bracketStack.length > 0) {
        return {closingIndex: lastClosingBracketIndex, fail: true};
    }
    return {closingIndex: lastClosingBracketIndex, fail: false};
}
var timeLocalServerDifference = 1520051623000 - getBloodyTimeFFS();
// Code to deal with bloody IE {
var ie = document.all != null;
var op7=navigator.userAgent.indexOf("opera")>0 && operaVersion() <= 7;
var translateCorrection = false;
var autocomplete = false;
var tabnum = 1;
var initialLoad = false;

// --- sidebar vars
var sidebarShow = true;        // sidebar shown/hidden state

var sidebarResizing = false;    // true if the sidebar is being resized (aka click-drag)
var sidebarResized = false;     // true if the sidebar width was chagned
var sidebarPreviousX = 0;       // used to track previoptionSelectionWrapperous sidebar X split
var sidebarResizedX = 186;      // the new sidebar split's X coord
var sidebarMaxX = 400;          // max X coord
var sidebarMinX = 185;          // min Y coord
var sidebarEaseX = 50;          // the maximum X units that the sidebar can be dragged by the mouse, before being eased back into threshold
var sidebarToggling = false;    // flag to determine when toggleSidebar is started.  Used to prevent double calls due to tap/click

function deleteAndChildren(deleteid) {
    $("a[parent='" + deleteid + "']").each(function () {
        deleteAndChildren($(this).attr("recordid"));
    });
    $("a[recordid='" + deleteid + "']").remove();
}

function recreateCheckboxTemplateJson(textareaid, tab) {
    var newjson = new Object();
    $("#jsonUI" + tab + " .sectioninput").each(function() {
        var sectionname = $(this).val();
        if (sectionname) {
            var sectionarraykey = $(this).attr("arraykey");
            var itemsArray = new Array();
            $("#jsonUI" + tab + " input[sectionarraykey='" + sectionarraykey + "']").each(function() {
                var itemname = $(this).val();
                itemsArray.push(itemname);
            });
            newjson[sectionname] = itemsArray;
        }
    });
    var newjsonstring = JSON.stringify(newjson);
    $("#" + textareaid).val(newjsonstring);
}

function updateBillingTriggerField(triggerIdentifier, productid, qty, tab) {
    $('#billingTriggers' + tab + ' .addedBy'+triggerIdentifier+':first .newDropDown').trigger('setrecord',[productid]);
    $('#billingTriggers' + tab + ' .addedBy'+triggerIdentifier+':first .billingTriggerQty').val(qty);
}

function showChildrenOrSelect(idPrefix, id, breadcrumbsid, tab, triggerIdentifier, billed) {
    $("#historysystemdata_name" + tab).val($("#" + idPrefix + id).text());
    $("#historysystem_id" + tab).val(id);
    if (billed != 1) {
        updateBillingTriggerField(triggerIdentifier, $("#" + idPrefix + id).attr("defaultbillingtrigger"), $("#" + idPrefix + id).attr("defaultbillingtriggerqty"), tab);
    }

    $(".historysystemitems").removeClass("selected");

    if ($("a[parent='" + id + "']").length) { //selected item has children, so display children
        $(".historysystemitems").hide();
        $("a[parent='" + id + "']").show();
    } else { //selected item has no children, so just select it
        var parent = $("#" + idPrefix + id).attr("parent");
        $(".historysystemitems").hide();
        $("a[parent='" + parent + "']").show();        
        $("#" + idPrefix + id).addClass("selected");
    }
    var currentLink = "";
    var breadcrumbs = "<a href=\"#\" onclick=\"showChildrenOrSelect('" + idPrefix + "', '0', '" + breadcrumbsid + "', '" + tab + "','"+triggerIdentifier+"', "+billed+");\">" + ((id == 0) ? "<b>" : "") + "(root)" + ((id == 0) ? "</b>" : "") + "</a>";
    if (id > 0) {
        breadcrumbs += getBreadcrumbs(idPrefix, id, breadcrumbsid, tab, triggerIdentifier, billed);
        currentLink = " >> <a href=\"#\" onclick=\"showChildrenOrSelect('" + idPrefix + "', '" + id + "', '" + breadcrumbsid + "', '" + tab + "','"+triggerIdentifier+"', "+billed+");\">" + "<b>" + $("#" + idPrefix + id).text() + "</b>" + "</a>";
    }
    breadcrumbs += currentLink;
    $("#" + breadcrumbsid).html(breadcrumbs);
}

function getBreadcrumbs(idPrefix, id, breadcrumbsid, tab, triggerIdentifier, billed) {
    var parent = $("#" + idPrefix + id).attr("parent");
    var recursiveLinks = "";
    var currentLink = "";
    if (parent) {
        recursiveLinks = getBreadcrumbs(idPrefix, parent, breadcrumbsid, tab,triggerIdentifier);
        if ($("#" + idPrefix + parent).attr("parent")) { //if parent of parent
            recursiveLinks += " >> <a href=\"#\" onclick=\"showChildrenOrSelect('" + idPrefix + "', '" + parent + "', '" + breadcrumbsid + "', '" + tab + "','"+triggerIdentifier+"', "+billed+");\">" + $("#" + idPrefix + parent).text() + "</a>";
        }
    }
    
    return recursiveLinks;
}

function operaVersion() {
	agent = navigator.userAgent;
	idx = agent.indexOf("opera");
	if (idx>-1) {
		return parseInt(agent.subString(idx+6,idx+7));
	}
}

function getActiveClassTemplateId() {
    var template = new Array("ltab1800","ltab1810", "ltab1820", "ltab1830" );
    for(j = 0; j < template.length; j++) {
        var classList = document.getElementById(template[j]).className.split(/\s+/);
        for (i = 0; i < classList.length; i++) {
           if (classList[i] == 'active') {
             return template[j];
           }
        }
    }    
}

var leftButton = ie? 1 : 0;
var middleButton = op7 ? 3 : ie ? 4 : 1;
var rightButton = 2;
//Code to deal with bloody IE }
var lastjserror='';
function jserror(m,u,l) {
    try
    {
	top.debug(m+' - '+u+':'+l);
//	top.consoleinfo(m+' - '+u+':'+l);
        printErrorStackTrace();
        if(lastjserror!=m)
        {
            lastjserror=m;
            top.jax_post('core/main/set/logerror.php','action=jserror&amp;error='+escape(m+'<br /><br />'+u+':'+l));
        }
    }
    catch(error)
    {
        return false;
    }
    return true;
}

function printErrorStackTrace() {
    var callstack = [];
    var isCallstackPopulated = false;
    try {
        i.dont.exist+=0; //doesn't exist- that's the point
  } catch(e) {
    if (e.stack) { //Firefox
      var lines = e.stack.split('\n');
      for (var i=0, len=lines.length; i<len; i++) {
        if (lines[i].match(/^\s*[A-Za-z0-9\-_\$]+\(/)) {
          callstack.push(lines[i]);
        }
      }
      //Remove call to printStackTrace()
      callstack.shift();
      isCallstackPopulated = true;
    }
    else if (window.opera && e.message) { //Opera
      var lines = e.message.split('\n');
      for (var i=0, len=lines.length; i<len; i++) {
        if (lines[i].match(/^\s*[A-Za-z0-9\-_\$]+\(/)) {
          var entry = lines[i];
          //Append next line also since it has the file info
          if (lines[i+1]) {
            entry += ' at ' + lines[i+1];
            i++;
          }
          callstack.push(entry);
        }
      }
      //Remove call to printStackTrace()
      callstack.shift();
      isCallstackPopulated = true;
    }
  }
  if (!isCallstackPopulated) { //IE and Safari
    var currentFunction = arguments.callee.caller;
    while (currentFunction) {
      var fn = currentFunction.toString();
      var fname = fn.substring(fn.indexOf('function') + 8, fn.indexOf('')) || 'anonymous';
      callstack.push(fname);
      currentFunction = currentFunction.caller;
    }
  }
  outputerror(callstack);
}

function outputerror(arr) {
  //Optput however you want
  consoleinfo(arr.join('\n\n'));
}
    window.onerror=jserror;

var keepAliveChange=false;
var keepAliveFreq=60;
var keepAliveTime=0;
var lockdownBoxColorTimer=false;
var lowerLeftDashboardBoxThing=false;
noreturn='n';
var tabActivity = {lastActiveTime:getBloodyTimeFFS()
    ,loggedIn:1    ,version:'22.00.8'
    ,refreshBrowserCheckTime:0};
// START IT UP

function pageReady() {
	timeDiff.setStartTime();
	var current_module='';
	top.jax('core/main/mainmenus.php','','mainmenus');
        var messagetimer;
        	if(!g('coverblock')) {
		bigelement=document.createElement('div');
		bigelement.id='coverblock';
        bigelement.setAttribute('data-timescalled', 0);
		$(bigelement).hide();
		g('ezydesk').appendChild(bigelement);
                delete bigelement;
	}
                tabActivity.lastActiveTime = getBloodyTimeFFS();
        _runLockDownTimer();
}

// Controlls how often Update Activity is called
function updateTabActivityTimeout(content)
{
    // If we are locked out or the page os not visible we only want to run every 30 minutes otherwise behave as normal
    if (lockdownActive() || document.visibilityState !== 'visible') {
        return 1800000; // 30 Minutes
    } else {
        if (content.noUpdateLast || ( tabActivity.tabVisible == "visible" && $('#calendar:visible').length > 0 )) {
            return 15000; // 15 Seconds
        } else {
            return 40000; // 40 Seconds
        }
    }
}

function updateTabActivity(content)
{
    clearTimeout(lockDownTimeTimeout);
    var timeOut = top.updateTabActivityTimeout(content);
    if( content.activeWinId =  top.tabActivity.win_id )//Is The Latest(May have a very long script)
    {
        top.tabActivity = content;
        var update = false;
                if( top.tabActivity.refreshBrowser )
        {
            var date=new Date();
            if((date.getTime()-60000>top.tabActivity.refreshBrowserCheckTime)){
                top.tabActivity.refreshBrowserCheckTime=date.getTime();
                top.yesNoNew({
                    question:"<span style='font-weight: bold'>Updates have been applied that require you to refresh your browser.</span><br /><br />It is highly recommended that you do this."
                    ,yesScript:function() {
                        top.location = 'index.php?runsecurityjs=1&t=' + date.getTime() + '';
                    }
                    ,noScript:function(){}
                    ,yesName:"Refresh now"
                    ,noName:"Refresh later"
                });
            }
        }
                if( top.tabActivity.newMemos )
        {
            update = true;
            top.refresh_jax('#theMemos');
            top.tabActivity.newMemos.forEach(function(entry){
                top.msg('You have '+entry.count+' new memo'+(entry.count>1?"s":"")+' from '+entry.from+' Click memos at the top of the screen to view your memos.',5000,'notice');
            });
            delete top.tabActivity.newMemos;
        }
        if( content.updateRecordRelatioships == 1 )
        {
            top.$.ajax({
                    url: 'Relationship/ProcessAllPending',
                    type: 'POST',
                    dataType:'json',
                    data: {}
                })
                .then(function(content) {
                    if( content.refreshElements )
                    {
                        content.refreshElements.forEach(function(entry) {
                            top.refresh_jax(entry);
                        });
                    }
                }, function(xhr, status, error) {
                    // Upon failure... set the tooltip content to the status and error value
                });
        }

        // Check to make sure we are not locked out
        if (!lockdownActive()) {
            if (content.updateFooter) {
                top.refresh_jax('#footer',null,true);
            }
            if (content.updateCalendar) {
                top.appointmentRefresh();
            }
        }

        // Check to make sure we are still logged in
        if (top.tabActivity.loggedIn == 1) {
                            if (lockdownActive()) {
                    if (top.tabActivity.lockedDown == 0) {
                        unlock();
                        timeOut = 100;
                    }
                } else if (top.tabActivity.lockedDown == 1) {
                    lockdown();
                    timeOut = 100;
                }
                        
            if (top.tabActivity.loggedInConflict) {
                top.location='index.php?runsecurityjs=1&t='+top.tabActivity.lastUpdate;        
            }
        }
    }

    // Update update activity time till next run
    lockDownTimeTimeout = setTimeout(_runLockDownTimer,timeOut);
}

var lockDownTimeTimeout;
function _runLockDownTimer()
{
    clearTimeout(lockDownTimeTimeout);
    tabActivity.currentTime = getBloodyTimeFFS();
    tabActivity.calendarVisible = top.calendarVisible();
    if (!tabActivity.win_id)
    {
        tabActivity.win_id = $('#win_id').val();
    }
    tabActivity.tabVisible = document.visibilityState;
    $.ajax( {
        url: 'Session/UpdateActivity',
        type: 'POST',
        dataType:'json',
        data: { tabActivity:JSON.stringify(tabActivity) }
    } )

    // http://api.jquery.com/deferred.then/ - .then(done, fail)
    .then(function(content) {
        // Set the tooltip content upon successful retrieval      
        if( content )
        {
            top.updateTabActivity( content );
        }
    }, function(xhr, status, error) {
        // Upon failure... Just Try Again
        lockDownTimeTimeout = setTimeout(_runLockDownTimer,60000);
    });
}
function calendarVisible(element)
{
    return $('#calendar').length && $('#calendar').is(':visible');
}

function lockdownActive()
{
    return ($('#lockdown:visible').length > 0);
}

function lockdown( sendRequest ) {
    if($('#login').css('display') == "block")
    {
        return false;
    }
        if(sendRequest) {
        $.get('/core/main/lockdown.php', {lock: true});
    }
//    lockdownBoxColorTimer=setTimeout('lockdownBoxBackground();',3000);
    $('#lockdown_password').val('');
    $('#lockdown_username').html($('#userdata_name div:first').html());
    $('#lockdown').show();
    
    setTimeout("g('lockdown_password').focus();g('lockdown_password').select();",100);

    winh=parseInt(document.body.offsetHeight);
    winw=parseInt(document.body.offsetWidth);
    mleft=(parseInt(document.body.offsetWidth)-g('lockdown_inner').offsetWidth)/2;
    mtop=(parseInt(document.body.offsetHeight)-g('lockdown_inner').offsetHeight)/2;
    $('#lockdown_inner').css({left:mleft+'px',top:mtop+'px'});
        
}

function unlock( ) { 
        
    $('#lockdown_password').val('');
    $('#lockdown_username').html($('#userdata_name div:first').html());
    $('#lockdown').hide();
        
}

time=0;
var timeDiff  =  {
    setStartTime:function (){
        d = new Date();
        time  = d.getTime();
    },

    getDiff:function (){
	if(time>0){
        d = new Date();
        return (d.getTime()-time)+'ms';}
    }
};

//Debug a select
jQuery.debug = function(query) {
	var debug='===========================<br/>';
	debug+='Search:"'+query+'"<br/>';
	debug+='===========================<br/>';
	var item=$(query);
	debug+='Length:'+item.length+'<br/>';
	item.each(function(){
		if(this.id!='')debug+='Id:'+this.id+'<br/>';
		if(this.className)debug+='Classes:'+this.className+'<br/>';
		if(this.name)debug+='Name:'+this.name+'<br/>';
		if(this.value!='')debug+='Value:'+this.value+'<br/>';
		if(this.type!='')debug+='Type:'+this.type+'<br/>';
		if(this.actualvalue)debug+='Actual Value:'+this.actualvalue+'<br/>';
		if(this.title)debug+='Title:'+this.title+'<br/>';
		if(this.checked)debug+='Checked:'+this.checked+'<br/>';
		debug+='--------------------------<br/>';
	});
	debug+='===========================<br/>';
	top.debug(debug);
}

minicalheight=200;
minicalzoom=0;
calendardown='no';
appointmentdown='no';
resizerdown='no';
currentappointment='appt9';
apptstatus='over';
apptstatusanimal='over';
apptstatuscommunication='over';
apptstatusclinical='over';
apptstatusjob='over';
apptstatusmain='over';
allowright='no';
disablecontext=false;
disablerefresh=false;
popupnewtab=false;
messageblocktimer='';
messageclosetimer='';
tab_load='';
s=new Array();
r2ts=new Array();
t2r=new Array();
a2rs=new Array();
a2rl=new Array();
statementformat=1;
c2r=new Array();
cst=new Array();
newlogin=0;
tab_clicked=false;
dash_loaded=false;
currently_open=new Array();
footerOffset=24;
idletimerTimeout=false;

function context_std()
{
	if(!disablerefresh)
	{
		top.ele_context('#'+this.id);
	}
	disablecontext=true;
	disablerefresh=false;
	return false;
}

function addEvent(obj, evType, fn){
	$(obj).each(function(){
		if (this.addEventListener){ 
			this.addEventListener(evType, fn, false); 
			return true; 
		} else if (this.attachEvent){ 
			var r = this.attachEvent("on"+evType, fn); 
			return r; 
		} else { 
			return false; 
		}; 
	});
};

function removeEvent(obj, evType, fn){ 
	$(obj).each(function(){
		if (this.removeEventListener){ 
			this.removeEventListener(evType, fn, false); 
			return true; 
		} else if (this.detachEvent){ 
			var r = this.detachEvent("on"+evType, fn);
			return r; 
		} else { 
			return false;
		} 
	});
};

// AJAX DATA REQUEST
function g(g){return document.getElementById(g);}
jaxmanager=new AjaxManager();
function nocontext_jax(url,query,obj,callback,dontblocksite,after,isPost)
{
    jaxmanager.request(url,query,obj,callback,dontblocksite,isPost?true:false,after,null,true);
}

function stripContext( selekta )
{
    $(selekta).off( 'contextmenu' ).unbind( 'contextmenu' ).each(function(){
        this.oncontextmenu = null;
    });
}

function jax(url,query,obj,callback,dontblocksite,after,servernotfoundcallback,nocontext){
	jaxmanager.request(url,query,obj,callback,dontblocksite,false,after,servernotfoundcallback,nocontext);
}
function jax_post(url,query,obj,callback,dontblocksite,after,servernotfoundcallback,nocontext){
    jaxmanager.request(url,query,obj,callback,dontblocksite,true,after,servernotfoundcallback,nocontext);
}

function jaxnew( url, args )
{
    if(typeof args['args'] =='object')
    {
        args['args'] = jQuery.param( args['args'] );
    }
    jaxmanager.request(url,args['args'],args['target'],args['callback'],args['noblock'],args['post'],args['how'],null,args['nocontext'],args['loading']);
}



var startTime = 0;
function jaxRefreshTest( target , count , dontInit )
{
    var d = new Date();
    if( !dontInit )
    {
        startTime = d.getTime();
    }
    //console.info(count+':'+(d.getTime()-startTime));
    if( count > 0)
    {
        count--;
        refresh_jax(target,{},false,function(){
            setTimeout(function(){jaxRefreshTest( target , count , true );},2000);
        })
    }
    else
    {
        console.info('DONE'+(d.getTime()-startTime));
    }
}

function jaxnew_Attach( url, args )
{
    if(typeof args['args'] =='object')
    {
        args['args'] = jQuery.param( args['args'] );
    }
    args['url'] = url;
    jaxmanager.addRequest(args['target'],args);
}

function get_getvalue(what,from){
	var request_args=from.split('&');
	for (var item in request_args)
	{
		arg=request_args[item].split('=');
		if(arg[0]==what)return arg[1];
	}
	return null;
}

/**
* Gets the jax request that was previously executed for an object and reruns it
* @param {string} target The css for of the target to be refreshed, i.e. '.className' or '#id'
* @param {array(associative)} args The associative array to define the arguments. Define like {'id':1,'type':'generic'}
* @return {void}
* 
var str="http://localhost:9000/sidelist-purchaseorder.php?s=86713&win_id=cff3d140ca2304cfc289bd427f45578e&search=&filter=2&items=16&refreshview=1&nonew=1"
var existingArgRe=new RegExp("new"+"\\=[^\\&]*");
*/
function refresh_jax(target,args,dontshowloadingimage,callback)
{
    $(target).each(function(){
        var jaxRequest = top.jQuery(this).data('jaxrequest');
        if( jaxRequest )
        {
            jaxRequest['args'] = replaceUrlArgs( jaxRequest['args'] , args );
            if( callback ) {
                jaxRequest['callback'] = callback;
            }
            jaxRequest['target'] = this.id;
            jaxRequest['noblock']=dontshowloadingimage?true:false;
            top.jaxnew(jaxRequest['url'],jaxRequest);      
        }
    });
}

if (typeof String.prototype.endsWith !== 'function') {
    String.prototype.endsWith = function(suffix) {
        return this.indexOf(suffix, this.length - suffix.length) !== -1;
    };
}
 function replaceUrlArgs( urlArgs , replacementArgs )
 {
        if(!replacementArgs){
                replacementArgs=new Object();
        }
        if(!urlArgs)
        {
            urlArgs = '';
        }
        urlArgs=urlArgs.replace(/&amp;/g,'&');
        var request_args=urlArgs.split('&');
        var assoc_request_args = new Array();
        for (var item in request_args)
        {
                arg=request_args[item].split('=');
                arg[0] = decodeURIComponent(arg[0]);
                assoc_request_args[arg[0].endsWith('[]')?item:arg[0]]=arg;
        }
        for (var item in replacementArgs){
                assoc_request_args[item]=[item,replacementArgs[item]];
        }
        request_args=new Array();
        for(var item in assoc_request_args)
        {
//            var key = assoc_request_args[item][0].endsWith('[]')?(fixedEncodeURI(assoc_request_args[item][0].replace("[]",""))+"[]"):fixedEncodeURI(assoc_request_args[item][0]);
            request_args.push(fixedEncodeURI(assoc_request_args[item][0])+'='+assoc_request_args[item][1]);
        }
        urlArgs=request_args.join('&amp;');
        return urlArgs;
 }
 
function refresh_jaxnew(target,args,dontshowloadingimage,callback)
{
    $(target).each(function(){
        var jaxRequest = top.jQuery(this).data('jaxrequest');
        if( jaxRequest )
        {
            jaxRequest['args'] = replaceUrlArgsNew( jaxRequest['args'] , args );
            if( callback ) {
                jaxRequest['callback'] = callback;
            }
            jaxRequest['target'] = this.id;
            jaxRequest['noblock']=dontshowloadingimage?true:false;
            top.jaxnew(jaxRequest['url'],jaxRequest);
        }
    });
}

function replaceUrlArgsNew( urlArgs , replacementArgs )
{
    if(!replacementArgs){
        replacementArgs=new Object();
    }
    if(!urlArgs)
    {
        urlArgs = '';
    }
    urlArgs=urlArgs.replace(/&amp;/g,'&');
    var assoc_request_args = Object.assign(parseJQueryParams(urlArgs),replacementArgs);
    return assoc_request_args;
}

function parseJQueryParams(p) {
    var params = {};
    var pairs = p.split('&');
    for (var i=0; i<pairs.length; i++) {
        var pair = pairs[i].split('=');
        var indices = [];
        var name = decodeURIComponent(pair[0]),
            value = decodeURIComponent(pair[1]);

        var name = name.replace(/\[([^\]]*)\]/g,
            function(k, idx) { indices.push(idx); return ""; });

        indices.unshift(name);
        var o = params;

        for (var j=0; j<indices.length-1; j++) {
            var idx = indices[j];
            var nextIdx = indices[j+1];
            if (!o[idx]) {
                if ((nextIdx == "") || (/^[0-9]+$/.test(nextIdx)))
                    o[idx] = [];
                else
                    o[idx] = {};
            }
            o = o[idx];
        }

        idx = indices[indices.length-1];
        if (idx == "") {
            o[o.length] = value;
        }
        else {
            o[idx] = value;
        }
    }
    return params;
}


// X & Y POSITION
$.fn.x=function(n){var result=null;this.each(function(){var o=this;if(n===undefined){var x=0;if(o.offsetParent){while(o.offsetParent){x+=o.offsetLeft;o=o.offsetParent;}};if(result===null){result=x;}else{result=Math.min(result,x);}}else{o.style.left=n+'px';}});return result;};
$.fn.y=function(n){var result=null;this.each(function(){var o=this;if(n===undefined){var y=0;if(o.offsetParent){while(o.offsetParent){y+=o.offsetTop;o=o.offsetParent;}}if (result===null){result=y;}else{result=Math.min(result,y);}}else{o.style.top=n+'px';}});return result;};

//Used to load up a box using a specified file and arguments for anm ajax request on that file
function filebox(file, get_arguments)
{
	if(!g('box'))
	{
		element=document.createElement('div');
		element.id='box';
		g('ezydesk').appendChild(element);
		top.$('#box').hide();
	}

	if(g('box'))
	{
    	g('box').innerHTML='<div id="boxinner"></div>';
    
    	jax(file,get_arguments,'boxinner',function(){    	
	    	top.$('#box').show();
	    
	    	winh=parseInt(document.body.offsetHeight);
	    	winw=parseInt(document.body.offsetWidth);
	    
	    	mleft=(parseInt(document.body.offsetWidth)-top.g('box').offsetWidth)/2;
	    	mtop=(parseInt(document.body.offsetHeight)-top.g('box').offsetHeight)/2;
	    	top.$('#box').css({opacity:'1',left:mleft+'px',top:mtop+'px'});    	
    	}); 
	}    
};

//Used to load up a box using a specified file and arguments for anm ajax request on that file
function printLabelBox( targetJax )
{
	if(!g('box'))
	{
		element=document.createElement('div');
		element.id='box';
		g('ezydesk').appendChild(element);
		top.$('#box').hide();
	}

	if(g('box'))
	{
    	g('box').innerHTML='<div id="boxinner"></div>';
    
    	jax("core/main/get/labelBox.php","targetJax="+JSON.stringify(targetJax),'boxinner',function(){    	
	    	top.$('#box').show();	    
	    	winh=parseInt(document.body.offsetHeight);
	    	winw=parseInt(document.body.offsetWidth);	    
	    	mleft=(parseInt(document.body.offsetWidth)-top.g('box').offsetWidth)/2;
	    	mtop=(parseInt(document.body.offsetHeight)-top.g('box').offsetHeight)/2;
	    	top.$('#box').css({opacity:'1',left:mleft+'px',top:mtop+'px'});    	
    	}); 
	}    
};

current_tab=1;
function rtab_context(clicked_tab)
{
	current_tab=clicked_tab;

	g('tab_menu').style.top=mouseY+'px';
	g('tab_menu').style.left=mouseX+'px';
	g('tab_menu').style.display='block';
}

current_ele='';
function ele_context(clicked_ele)
{
	current_ele=clicked_ele;
	g('ele_menu').style.top=mouseY+'px';
	g('ele_menu').style.left=mouseX+'px';
	g('ele_menu').style.display='block';
}
function getRecordLink(clicked_tab) 
{
    const regex = /([a-z]+)([0-9]+)/;
    var str = $("#rtab" + clicked_tab + "details").attr('record');
    var m;
    if ((m = regex.exec(str)) !== null) {
        var recordclass = m[1];
        var recordid = m[2];
        
        return "https://vsvhwvc.usw2.ezyvet.com/" + "?recordclass=" + recordclass + "&recordid=" + recordid;
    }
    return null;
}

function close_others(clicked_tab)
{	
	$("#righttabs li a").each(
		function()
		{
			tabX=parseInt(this.id.replace('rtab',''));
			if(tabX!=clicked_tab&&tabX!=1){closetab(tabX,clicked_tab);}
		}
	);
}

debugwin=null;
function closedebugwin() 
{
    if(debugwin!=null) {
        debugwin.window.close();
    }
    jax('core/main/set.php','action=debugwindow&value=0');
    debugwin=null;
}
function launchdebugwin()
{
    closedebugwin();

	debugwin=window.open('/core/debug/debugwin.php','debugwin','width=800,height=400,resizable=1,alwaysRaised=1,scrollbars=1');
    if(debugwin.opener==null) {
        debugwin.opener=self;
    }
    $(debugwin.window).load(function() {
        $(debugwin.window).unload(function() {
            if(debugwin!=null) {
                closedebugwin();
                return false;
            }
        });
    });
	jax('core/main/set.php','action=debugwindow&value=1');
}

function detectMouseButton(e)
{ 
	var mousebutton; 
	if(!e){var e=window.event;} 
    if(e.button){mousebutton=e.button;} 
    else if(e.which){mousebutton=e.which;} 
    return mousebutton; 
} 


function debug(msg,time,base64Encoded)
{
	try
	{
        if(debugwin)
        {
            if(base64Encoded){msg=base64_decode(msg);}
            var html = '<div class="messagecontainer">'+msg+'</div><script>scrollBy(0,9999999);highlightPending();filters($(\'#filterInput\').val());</script>';
            $(debugwin.document.body).find('#debugmsgs').append(html);
        }
	}
	catch(e)
	{
        debugwin=null;
        jax('core/main/set.php','action=debugwindow&value=0');
	}
};

document.onclick=function() {
	timeDiff.setStartTime();
	$('.menus').css('top','-1000px');
	closemsgtype('waiting');
};

function closemsgtype(type) {
	if(type=='waiting') {
                var jGrowlArea = $('#jGrowl');
                var waitingMsgs = $('.waiting',jGrowlArea);
		if(waitingMsgs.length) {
			waitingMsgs.trigger("jGrowl.close");
			if(! $('.error',jGrowlArea).length) {
				$('#messageblock').hide();
			}
		}
		else {
			$('#messageblock').hide();
		}
	}
}

//var lastMsgError='';
function msg(txt,time,type)
{
	if(!type){type='default';}
    if (typeof time === 'string' || time instanceof String) {
	    time = parseInt(time);
    }
    if(typeof time == 'undefined' || time == 0) {
        switch(type) {
            case 'default':
                time = 5000;
                break;
            case 'success':
                time = 2000;
                break;
            case 'warning':
                time = 7000;
                break;
        }
    }

    var jgimage='';
	if(type=='success') {
            //fa-check-circle
            $.jGrowl(txt, { 
                header:'Success! <i class="right icon icon-trophy5"></i>',
                theme:'success', 
                life:time,
                beforeOpen:function(e,m) {
                    top.closemsgtype('waiting');
                }
            });
	}
	else if(type=='warning') {
            $.jGrowl(txt, { 
                header:'Warning! <i class="right icon icon-exclamation-sign"></i>',
                theme:'warning', 
                life:time,
                beforeOpen:function(e,m) {
                    top.closemsgtype('waiting');
                }
            });
	}
	else if(type=='default') {
            $.jGrowl(txt, { 
                header:'', 
                theme:'default', 
                life:time,
                beforeOpen:function(e,m) {
                }
            });
	}
	else if(type=='notice') {
            $.jGrowl(txt, { 
                header:'Notification! <i class="right icon icon-info9"></i>',
                theme:'notice', 
                sticky:true,
                beforeOpen:function(e,m) {
                    top.closemsgtype('waiting');
                }
            });
	}
	else if(type=='error') {
            $.jGrowl(txt, { 
                header:'Error! <i class="right icon icon-minus-alt"></i>',
                theme:'error', 
                sticky:true,
                beforeOpen:function(e,m) {
                    top.closemsgtype('waiting');
                }
            });
	}
	else if(type=='jserror') {
            $.jGrowl('A Javascript error has occured. We recommend you restart your browser.', { 
                header:'Javascript Error! <i class="right icon fa icon-minus-alt"></i>',
                theme:'error', 
                sticky:true,
                beforeOpen:function(e,m) {
                    top.closemsgtype('waiting');
                }
            });
	}
	else if(type=='waiting') {
            $.jGrowl(txt, { 
                header:'Waiting! <i class="right icon icon-clock3"></i>',
                theme:'waiting', 
                sticky:true,
                beforeOpen:function(e,m) {
                    $('#messageblock').show();
                }
            });
	}
	return;
}

// buttonWait(final button value, button id, ms count time);
function buttonWait(value,id,time) {
	var button=g(id);
	button.disabled=true;
	if(time<=0 || 0 ) {
		button.value=value;
		button.disabled=false;
	}
	else {
		button.value='Please Wait... '+(time/1000);
		setTimeout("buttonWait('"+value+"','"+id+"','"+(time-1000)+"');",1000);
	}
}

function mainmenu(menu)
{
     height=118;
     $('#ezydesk').each(function(){height=24;});
     setTimeout('$(\'#'+menu+'menu\').css(\'top\',\''+height+'px\').css(\'display\',\'block\');',10);
}

function printwin_rework(path, parameters) {
    //Create a form with the follow attributes
    var form = $('<form></form>');
    form.attr("target", "_blank");
    form.attr("method", "post");
    form.attr("action", path);

    //Create a recursive function which will iterate through keys/values
    var recursion = function(key, value) {
        //If the value is an array (value = [subkey => subvalue])
        //key = Config
        //subkey = Invoice
        //subvalue = [55..]

        //It'll be passing back into the recursive function, this key : Config[Invoice][ + new key + ] => []
        if (typeof value == 'object' || typeof value == 'array') {
            $.each(value, function(subkey, subvalue) {
                recursion(key + '[' + subkey + ']', subvalue);
            });
        } else {
            var field = $('<input />');
            field.attr("type", "hidden");
            field.attr("name", key);
            field.attr("value", value);
            form.append(field);
        }
    }

    //For each element inside parameters..
    $.each(parameters, function(key, value) {
        recursion(key, value);
    });

    $(document.body).append(form);
    form.submit();
}

function printwin(url, postdata)
{

    if(typeof postdata == 'undefined') {
        // create a new window using a url including getstring.
        window.open(url,Math.floor(Math.random()*99999999),'width=800,height=600,resizable=yes,scrollbars=yes');
    } else {
        if (url == 'undefined') {
            url = "post.htm";
        }
        // Allows you to post a javascript array or object that is then sent to the print window as 'post' data
        // To do this we have to create a form using the postdata, and then post the form to the print URL
        var name = Math.floor(Math.random()*99999999);
        var windowoptions = 'width=800,height=600,resizable=yes,scrollbars=yes';
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", url);
        form.setAttribute("target", name );

        if (typeof postdata == 'string') {
            // if the postdata is an url string process the string to be an object.
            postdata = getPostAsObject(postdata);
        }

        for (var i in postdata) {
            if (postdata.hasOwnProperty(i)) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = i;
                //Haxy because it is too hard to create multi-dimensional fields for one use(Debtor Letters)
                if( typeof postdata[i] == 'object')
                {
                    postdata[i] = JSON.stringify( postdata[i] );
                }
                input.value = postdata[i];
                form.appendChild(input);
            }
        }

        document.body.appendChild(form);

        window.open("post.htm", name, windowoptions);

        form.submit();

        document.body.removeChild(form);
    }
}

function printpr()
{
	var OLECMDID = 7;
	/* OLECMDID values:
	* 6 - print
	* 7 - print preview
	* 1 - open window
	* 4 - Save As
	*/
	var PROMPT = 1; // 2 DONTPROMPTUSER
	var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
	document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
	WebBrowser1.ExecWB(OLECMDID, PROMPT);
	WebBrowser1.outerHTML = "";
}

// MODULE SWITCHER
function module(mod)
{
	if(!mod){ mod='menu'; }
	
	if( mod=='menu' && top.tabActivity.loggedIn == 1 ) {
            if(g('header').className=='dashboard') {
                    $('#dashboard .action').click();
            }
            else if(g('header').className=='admin') {
                    $('#admin .action').click();
            }
            else {
                    $('#dashboard .action').click();
            };
            return false;
	} // If this machine had already had a login Trigger Security by loading dummy file but don't load module - For Fast Switch and saving current entry of data on session timeout.
	
	if(mod=='reporting') { 
            top.jaxnew('reporting/sideBar',{
                args:{},
                target:'left'}); 
        }
	else if(mod=='work') { 
                            top.jaxnew('work/sideBar',{
                                args:{},
                                target:'left'}); }
    else if(mod=='tracker') { 
            top.jaxnew('tracker/sideBar',{
                args:{},
                target:'left'});  }	
	else if(mod=='animals') { 
                            top.jaxnew('animal/sideBar',{
                                args:{},
                                target:'left'}); }
	else if(mod=='clinical') { 
                            top.jaxnew('clinical/sideBar',{
                                args:{},
                                target:'left'}); }
	else if(mod=='admin') { 
                            top.jaxnew('admin/sideBar',{
                                args:{},
                                target:'left'}); }
	else if(mod=='financial') { 
                            top.jaxnew('financial/sideBar',{
                                args:{},
                                target:'left'}); }
	else if(mod=='contacts') { 
                            top.jaxnew('contact/sideBar',{
                                args:{},
                                target:'left'}); } 
	else if(mod=='help') { 
                            top.jaxnew('help/sideBar',{
                                args:{},
                                target:'left'}); }
	else { 
            mod='dashboard';
            jax('modules/dashboard/dashboard.php','','left');
        }
	if(mod!='menu'){jax('core/main/set.php','action=setmodule&amp;module='+mod, false, false, true);g('left').className=g('header').className=mod;}
	current_module=mod;
    return true;
};

function loginhidebg()
{
    document.documentElement.style.overflowY = 'hidden';
}

function logout(f)
{
        // Close all tabs and empty content divs
        // This is a temporary fix
        $('.innerContent').empty();
        $('.rtab').remove();
        // Temp fix
        
	keepAliveChange=false;
	keepAliveTime=0;
	$('#lockdown_password').val('');
	$('#lockdown').hide();
	
	jax('core/main/login.php','logout=yes');
	$('#ezydesk').hide();
	$('#changepassword').hide();
    $('#loginbg').show();
	$('#login').show();
	$('#loginfield').focus();
	$('#loginfield').select();
	$('#passfield').val('');
        
	//mleft=(parseInt(document.body.offsetWidth)-g('login').offsetWidth)/2;
	//mtop=(parseInt(document.body.offsetHeight)-g('login').offsetHeight)/2;
	//$('#login').css({left:mleft+'px',top:mtop+'px'});
	
	if(f) {
		g('passfield').focus();
		g('passfield').select();
		
		$('.loginmain').css({border:'1px solid #FF0000'});
		setTimeout("$('.loginmain').animate({border:'1px solid #888888'},500);",1250);
                
		$('#bottomloginmenu').effect( "shake", {distance : 30, times: 2}, "slow");
	}
}

function changepassword(username)
{
	jax('core/main/login.php','logout=yes');
	g('ezydesk').style.visibility='hidden';
	g('loginfields').style.display='none';
	g('changepassword').style.display='block';

	//mleft=(parseInt(document.body.offsetWidth)-g('changepassword').offsetWidth)/2;
	//mtop=(parseInt(document.body.offsetHeight)-g('changepassword').offsetHeight)/2;
	//$('#changepassword').css({left:mleft+'px',top:mtop+'px'});

	g('changeloginfield').value=username;
	g('changenewpassfield').value='';
	g('changeoldpassfield').value='';
	
	g('changeoldpassfield').focus();
	g('changeoldpassfield').select();
}

// LAYOUT THE PAGE
function layout() {
	winh=parseInt(document.body.offsetHeight)-footerOffset;
	
	$('#leftpane').height(winh-$('#leftpane').y()-5);
	$('#rightpane').height(winh-$('#rightpane').y()-4);
	$('#widgetPane').height(winh-$('#rightpane').y()+26);
	$('.reportlist').height(winh-$('.reportlist').y()-11);
}

function timeloop() {
    clearTimeout(timeloop);
    var today = new Date();
    var h = today.getHours() * 3600;
    var m = today.getMinutes() * 60 + h;
    var s = today.getSeconds() + m;
    var timeFade = $('#timefade');

    if (timeFade.length > 0) {
        timeFade.css('top', ((s / 3600) * timeHeight) + ((s / 3600)) - 15 + 'px');
        setTimeout(timeloop, 10000);
    }
}

// LAYOUT THE PANELS


function getHeaderHeight( tabElement )
{
    var otherHeight =12;
    $(tabElement).children().not('form').each(function(){
        otherHeight += parseInt($(this).height());
    });
    return otherHeight;
}

function sortByWidth( a , b )
{
    return b.width() > a.width();
}

function rejigRecordTabs( tabDom )
{
    var tabSpaceWidth = $('.tabHolder',tabDom).width();
    var theTabs = $('.tabHolder .aTabbyTab a:visible',tabDom);
    var totalTabWidth = 0;
    var domElements = [];
    theTabs.css('maxWidth','');
    theTabs.each(function(){
        var tab = $(this);
        domElements[domElements.length]=tab; 
        totalTabWidth += tab.width()+16;
    });
    var overflow = totalTabWidth - tabSpaceWidth;
    if( overflow > 0 )
    {
        var currentWidth = 0;
        var allWidths = 0;
        var maxWidth = 0;
        domElements.sort(sortByWidth);
        for( var i = 0; i < domElements.length; i++ )
        {       
            if( maxWidth > currentWidth )
            {
                break;
            }
            currentWidth = domElements[i].width();
            allWidths += currentWidth;
            maxWidth = (allWidths-overflow)/(i+1);
        }
        theTabs.css('maxWidth',maxWidth+'px');
    }
}

totaltabwidth=new Array();
function panels()
{
    layout();
    winh=parseInt(document.body.offsetHeight)-footerOffset;
    winw=parseInt(document.body.offsetWidth);
    mainmenuheight=154;
    var rightPane = $('#rightpane');
    var rightHeight = parseInt(rightPane.height());
    var rightWidth = parseInt(rightPane.width());
    var minicalHeight = parseInt( $('#minical').height() );
    $('> div:visible',rightPane).each(function(){
        rejigRecordTabs( this );
        var otherHeight = getHeaderHeight( this );
        $('.panels',this).height(rightHeight-otherHeight);          
        if($('#calendar:visible',this).length)
        {  
            $('#calendar',this).height(rightHeight-otherHeight-40).width(rightWidth-255);
            $('.dashboardcolumn',this).height(rightHeight-otherHeight-45);
        };
        if(top.calendarVisible()) {
            var calendarHeight = parseInt($('#calendar').height());
            var headerHeight = getHeaderHeight($('#calendarmain').parents('#rightpane > div.dashboard').first());
            var calendarHeaderHeight = parseInt($('#calendarheader').height());
            $('#calendarmain').height(calendarHeight - calendarHeaderHeight).width(rightWidth - 255);
            if (g('mouselayer') && g('calendarmain')) {
                g('mouselayer').style.width = (parseFloat(g('calendarmain').style.width) - 16) + 'px';
            }
            if (g('calendarmain')) {
                colWidth = Math.floor(((parseFloat(g('calendarmain').style.width) - 66) / calColumns) - 3);
            }
            startLeft = 0;
            $('.sep').each(function () {
                this.style.left = startLeft + 'px';
                this.style.width = colWidth + 'px';
                startLeft += colWidth + 3;
            });
            $('.appt').width(colWidth - 6).each(function () {
                var theAppt = $(this);
                theAppt.css({
                    left: coltopx(theAppt.data('col')) + 'px',
                    top: ((parseInt(theAppt.data('start')) / 3600) * timeHeight) + ((parseInt(theAppt.data('start')) / 3600)) + 'px'
                });
                height = Math.floor(((parseInt(theAppt.data('seconds')) / 3600) * timeHeight) + ((parseInt(theAppt.data('seconds')) / 3600) * (timeHeight)) * 0.00077 * interval) - 2;
                if (height < 0) {
                    height = 0;
                }
                theAppt.css({height: height + 'px'});
            });

            callist = calendarHeight - minicalHeight - 6;
            if ($('#frontticketlist:visible').length) {
                callist = callist / 2;
            }
            if (callist < 0) {
                callist = 0;
            }
            ;
            $('#calendarlist').height(callist);
            if ( $('#calendar').data('updateActivityFired') == undefined ) {
                $('#calendar').data('updateActivityFired',true);
                _runLockDownTimer();
            }
            checkConflicting();
            $('#frontticketlist').height(callist);
        };
    });
//    rejigRecordTabs( document.getElementById('maintabs') );
};
function recalculateSideList()
{
    panels();
}
// RESET VIEWING WHEN WINDOW RESIZED
function resetwin()
{
	layout();
	endload(1);
	winw=parseInt(document.body.offsetWidth);
	$('.probnamecol').width((winw-428)*.3);
	$('.probdesccol').width((winw-428)*.7);
	$('.mednamecol').width((winw-325)*.3);
	$('.meddesccol').width((winw-325)*.3);
	$('.medinstcol').width((winw-325)*.4);
	
	//mleft=(parseInt(document.body.offsetWidth)-g('login').offsetWidth)/2;
	//mtop=(parseInt(document.body.offsetHeight)-g('login').offsetHeight)/2;
	//$('#login').css({left:mleft+'px',top:mtop+'px'});
	
	mleft=(parseInt(document.body.offsetWidth)-g('lockdown_inner').offsetWidth)/2;
	mtop=(parseInt(document.body.offsetHeight)-g('lockdown_inner').offsetHeight)/2;
	$('#lockdown_inner').css({left:mleft+'px',top:mtop+'px'});
};

window.onresize=resetwin;

// GET THE AMOUNT OF ITEMS WHICH CAN BE SHOWN GIVEN USERS SCREEN
function items(buffer)
{
	if(!buffer){buffer=0;}
    return Math.floor((parseInt(document.body.offsetHeight)-$('#theSideList').y()-28-buffer-footerOffset)/20); 
};

//DEFOCUSER
function b(){/*g('logoutlink').focus();g('logoutlink').blur();*/};

// TEXT AUTO FORMATING
function captext(input) {
    var seleStart = input.selectionStart;
    var seleEnd = input.selectionEnd;
    startpos=getCursorPosition(input);
    var a=input.value;
    var b='';
    var notyet=true;
    for (i=0;i<=a.length;i++) {
            m = a.substr(i,1);
            b += (notyet)?m.toUpperCase():m;
            notyet = (!isNumber(m) && m.toUpperCase() == m.toLowerCase())
            if(m=='\''){notyet=false;}
    }
    input.value=b;
    input.selectionStart = seleStart;
    input.selectionEnd = seleEnd;
    setCursorPosition(input, startpos);
};

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function capitaliseFirstLetter(input)
{
    var string = input.value;
    var startpos = getCursorPosition(input);
    string = string.charAt(0).toUpperCase() + string.slice(1);
    input.value = string;
    setCursorPosition( input, startpos );
}

function formattext(input) {
	var a=input.value;
	var b='';
	var notyet=true;
	for (i=0;i<=a.length;i++)
	{
		m = a.substr(i,1);
	
		if(m=='.'||m=='?'||m=='!'){notyet=true;}
	
		b += (notyet)?m.toUpperCase():m;
	
		if(m!='.'&&m!='?'&&m!='!'&&m!=' '){notyet=false;}
	}
	input.value=b.replace(/ i /g,' I ');
};

function getCursorPosition(field) {
   var cursorPos = -1;
   if (document.selection && document.selection.createRange) {
     var range = document.selection.createRange().duplicate();
     if (range.parentElement() == field) {
       range.moveStart('textedit', -1);
       cursorPos = range.text.length;
     }
   } else if (field.selectionEnd) {
     cursorPos = field.selectionEnd;
   }
   return cursorPos;
}

function setCursorPosition(field, pos) {
   if (field.createTextRange) {
      var range = field.createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
   } else if (field.selectionEnd) {
      field.selectionEnd = pos;
   }
}
function replaceTabFor(recordClass,recordId,args)
{
    tab = tab != undefined?tab:1;
    if( args == undefined )
    {
        args = {tab:1};
    }
    jax('General/OpenTabRecord','recordClass='+recordClass+'&amp;recordId='+recordId+'&amp;'+getArgString(args),'rtab'+tab+'details');
    tabview('rtab',tab);
}
function openTabFor(recordClass,recordId,args)
{
    if( args == undefined )
    {
        args = {};
    }
    var tab = args.sourceTab;
    tab = tab?tab:1;
    newtab('Opening '+recordClass,'','','General/OpenTabRecord',tab,'recordClass='+recordClass+'&amp;recordId='+recordId+'&amp;'+getArgString(args));
}
function openPopupFor(recordClass,recordId,args)
{ 
    if( args == undefined )
    {
        args = {};
    }
    args.recordClass = recordClass;
    args.recordId = recordId;
    top.formBox('/General/OpenPopupRecord',getArgString(args),false,true);
}
// CREATE NEW TAB
cc=0;
function newtab(title,tabclass,img,url,rtab,q,noshow)
{
//	qcheck=q;
//	qcheck=qcheck.replace(/rtab=\d+/gi,"");
//	qcheck=qcheck.replace(/tab=\d+/gi,"");
//	qcheck=qcheck.replace(/&amp;/gi,"");
//	qcheck=qcheck.replace(/&/gi,"");
    var isFontIcon = false;
    if( img.indexOf('.') === -1)
    {
        isFontIcon = true;
    }
    title = truncate( title , 30 );
	
//	$('#rightpane > div').each(function() {
//		if(this.jaxrequest) {
//			qcheckee=this.jaxrequest[1];
//			qcheckee=qcheckee.replace(/rtab=\d+/gi,"");
//			qcheckee=qcheckee.replace(/tab=\d+/gi,"");
//			qcheckee=qcheckee.replace(/&amp;/gi,"");
//			qcheckee=qcheckee.replace(/&/gi,"");
                        /* //This message is just getting annoying
			if((this.jaxrequest[0]==url)&&(qcheckee==qcheck)) {
				top.msg('You may already have this record open in another tab',5000,'warning');
			}
                        */
//		}
//	});
	
	var tabid=Math.floor(Math.random()*99999999);
	noshow=noshow?true:false;
    var lastTab = $('#newtab'+rtab,'#righttabs');
	newtabContent = '<li id="newtab'+tabid+'" class="aTabbyTab"></li>';
    if( lastTab.length > 0 )
        lastTab.after(newtabContent);
    else
        $('#righttabs').append(newtabContent);

    $('#newtab'+tabid).addClass('rtab').addClass('closeable');
    img=(isFontIcon?'<b class="icon '+img+'">&nbsp;&nbsp;&nbsp;</b>':'<img src="/media/images/'+img+'" alt="Image" class="timg" />');
    g('newtab'+tabid).innerHTML='<a href="#" id="rtab'+tabid+'" class="rtab" onclick="top.tabview(\'rtab\','+tabid+');return false;" onmousedown="if(event.button==middleButton){cc=1;closetab(\''+tabid+'\');};;return false;" oncontextmenu="disablerefresh=true;rtab_context('+tabid+');return false;" ><span class="tabContainer">'+img+'<b class="tabTitle">'+title+'<\/b><img src="/media/images/closetab.gif" alt="Close Tab" onclick="tabview(\'rtab\','+rtab+');setTimeout(\'closetab('+tabid+','+rtab+');\',1);return false;" /></span></a>';

    $('#rightpane').append('<div id="rtab'+tabid+'details" style="display:none;"></div>');

    q='tab='+tabid+'&amp;rtab='+rtab+'&amp;'+q;

    $('#rtab'+tabid+'details').addClass('rtabdetails');
    $('#rtab'+tabid+'details').addClass(tabclass); 
    $('#rtab'+tabid+'details').addClass('elementContent'+tabid); 
    
    var focusTab = false;
    if((!noshow || noshow==false)||(noshow=true && popupnewtab))
    {
        focusTab = true;
    }
    var javascriptToRun = [function(){            
        if(focusTab){
            tabview('rtab',tabid);
        }
        updateScroller(1);}];
    
    jax(url,q,'rtab'+tabid+'details',function(){for(var i = 0; i < javascriptToRun.length; i++){javascriptToRun[i]();}});
    var newLen = $('li','#righttabs').length;
    $('#tabsOpen').val(newLen);
    if (newLen > 10) {
        top.msg('You currently have '+$('#tabsOpen').val()+' tabs open. ' +
            'Having more than 10 tabs is not recommended as it can reduce performance.', 8000, 'warning');
    }
};

function getTabId(isNegative)
{
    var tabid=new Date().getUTCMilliseconds()*Math.floor(Math.random()*99999999);
    if( isNegative )
    {
        tabid = tabid*-1;
    }
    if( isNegative )
    {
        if( $('#formbox'+tabid).length >=1 )
        {
            return getTabId(isNegative);
        }
    }
    else
    {

        if( $('#rtab'+tabid+'details').length >=1 )
        {
            return getTabId(isNegative);
        }
    }
    return tabid;
}

// CLOSE EXISTING TAB
function closetab(tabid,returnto)
{
    var thisTab = $('#newtab'+tabid);
    var returnTab = $('#newtab'+returnto+' a');
    if( returnTab.length == 0 )
    {
        returnTab = thisTab.prev().children('a');
    }
    if( returnTab.length == 0 )
    {
        returnTab = $('#newtab'+1+' a');
    }
//	if(g('newtab'+returnto) && g('newtab'+returnto).style.display!='none'){setTimeout('tabview(\'rtab\','+returnto+')',1);}else{setTimeout('tabview(\'rtab\',1)',1);}
//	g('newtab'+tabid).style.position='relative';
//	g('newtab'+tabid).style.top='-100px';
	$('#newtab'+tabid).remove();
//	g('rtab'+tabid+'details').style.display='none';
//	g('rtab'+tabid+'details').style.position='relative';
//	g('rtab'+tabid+'details').style.top='-10000px';
	$('#rtab'+tabid+'details').hide().remove();
	updateScroller(0);
    $('#tabsOpen').val( $('li','#righttabs').length );
    setTimeout(function(){returnTab.click();},1);
    delete returnTab;
    delete thisTab;
};

// TAB SWITCHER
currenttabs=oldtabs=new Array();
//tabs=type,num=,tab=
var tabSettings = {};
function subTabView( tabIdentifier , recordIdentifier , tab )
{
    var theTabToShow = $('#subTab'+tab+'-'+tabIdentifier+':visible');  
    if( !theTabToShow.length )
    {
        theTabToShow = $( '.subTab'+tab+':first' );
        tabIdentifier = theTabToShow.attr('id').replace('subTab'+tab+'-','');
    }  
    var theTabsDetails = $('#'+theTabToShow.attr('id')+'-details');
    $('.subTab'+tab+'-details').not(theTabsDetails).hide();	
    theTabToShow.show().addClass('active');
    theTabsDetails.show();
    $('.subTab'+tab).not(theTabToShow).removeClass('active'); 
    tabSettings.recordIdentifier = tabIdentifier;
    delete theTabToShow;
    delete theTabsDetails;
}

function subTabClick( tabIdentifier , recordIdentifier , tab )
{
    var theTabToShow = $('#subTab'+tab+'-'+tabIdentifier+':visible');  
    if( !theTabToShow.length )
    {
        theTabToShow = $( '.subTab'+tab+':first' );
        tabIdentifier = theTabToShow.attr('id').replace('subTab'+tab+'-','');
    }  
    theTabToShow.click();
    delete theTabToShow;
}

function tabConfigure( recordIdentifier , tab)
{
    var theTabToShow = $('#subTab'+tab+'-'+tabSettings.recordIdentifier+':visible'); 
    if( theTabToShow.length )
    {
        theTabToShow.first().click();
    }
    else
    { 
        subTabClick( tabSettings.recordIdentifier , recordIdentifier , tab );
    }    
    delete theTabToShow;
    endload(tab);
    panels();
}


function tabview(tabs,num,thetab)
{
	ctabs=tabs;
	if(!thetab){thetab='';}
	tabs=tabs+''+thetab;

	oldtab=oldtabs[tabs]?oldtabs[tabs]:oldtab=1;
	
	if(!g(tabs+oldtab)){oldtab=1;}

	$('#'+tabs+oldtab+'details').hide();
	$('.'+tabs+'details').hide();
	
	if( tabs!='ltab' && tabs!='ytab' && tabs!='ttab' )
	{
		if(tabs=='rtab')
                {
                    $('#'+tabs+num+'details').show().trigger('tabView');
                    panels();
                }
		else
                {
                                        $('#'+tabs+num+'details').show().trigger('tabView');
                                    }
        var tabColorClass = getTabColorClass('#'+tabs+num+'details');
        if (tabColorClass !== false) {
            $('#toggleSidebarButtonVisible').removeAttr('class');
            $('#toggleSidebarButtonVisible').addClass('display-block');
            $('#toggleSidebarButtonVisible').addClass(tabColorClass);
        } else {
            $('#toggleSidebarButtonVisible').removeAttr('class');
            $('#toggleSidebarButtonVisible').addClass('display-block');
            $('#toggleSidebarButtonVisible').addClass("dashboard");
        }

        var record = $("#"+tabs+num+"details input[name=formkey_class]").val();
        if (isSidebarVisible() && tabColorClass !== "document" && tabColorClass !== "dashboard" && tabColorClass !== false && !$('#left').hasClass('dashboard') && record !== 'FeatureRequest' && record !== 'FeatureRequestDashboard') {
            $('#panes').trigger('openSideBar', [false, true, false, true]);
            sidebarResize();
            window.setTimeout(function(){
                panels();
            }, 260);
        } else if ((tabColorClass === "document" || record == 'FeatureRequest' || record == 'FeatureRequestDashboard') && !$('#left').hasClass('help')) {
            $('#panes').trigger('closeSideBar', [false, true, true, true]);
            window.setTimeout(function(){
                panels();
            }, 260);
        }
	}

	$('#'+tabs+oldtab).removeClass('active');
	if(tabs=='rtab'){$('.rtab .active').removeClass('active');}
	oldtab=num;
	$('#'+tabs+oldtab).addClass('active');
	oldtabs[tabs]=oldtab;
	currenttabs[ctabs]=num;
	if(ctabs=='rtab'){
		focustab(num);
	}
	else if(
		(ctabs=='atab') ||
		(ctabs=='itab') ||
		(ctabs=='ptab') ||
		(ctabs=='stab') ||
		(ctabs=='utab') ||
		(ctabs=='dtab')
	) {
		if(thetab==''){tab_forthis=1;}else{tab_forthis=thetab;}
		if(g('rtab'+tab_forthis)){
			g('rtab'+tab_forthis).tabview='tab_dom=top.g(\''+ctabs+thetab+num+'\');if(tab_dom){stop_b=true;tab_clicked=true;$(tab_dom).click();}else{tab_clicked=false;}';
			g('rtab'+tab_forthis).tab_to_click=ctabs+thetab+num;
		}
	}
	else
	{
		tab_switch=false;
	}
};

function load_tab(type,tabs,num,thetab)
{
	if(!g(g('rtab'+thetab).tab_to_click) || g('rtab'+thetab).content_type!=type || !g('rtab'+thetab).tabview){
		g('rtab'+thetab).content_type=type;
		tab_load='';
                $('#'+tabs+thetab+num+'').click();
//		tabview(tabs,num,thetab);
	}
}

function endload(thetab)
{
	panels(thetab?thetab:1);
	if(tab_load) { eval(tab_load); }
	tab_load='';
}

function focustab(tab){
	if(!g('rtab'+tab))tab=1;
	offset=g('rtab'+tab).offsetLeft;
	tabwidth=g('rtab'+tab).offsetWidth+3;
	if((-margleft['righttabs'])>offset)//tab is to the left
	{
		margleft['righttabs']=-offset+3; 
		settabpos(margleft['righttabs']);
	}
	else if((availabletabswidth()-margleft['righttabs'])<(offset+tabwidth))//tab is to the right
	{
		margleft['righttabs']=-offset-tabwidth+availabletabswidth(); 
		settabpos(margleft['righttabs']);
	}
	updateScroller(0);
};

function updatetabtitle(rtab,tab,title,type,image){
	image=(image?image:type.toLowerCase()+'.png');
	if(tab!=1){closeimage='<img src="/media/images/closetab.gif" alt="Close Tab" onclick="cc=1;closetab(\''+tab+'\',\''+rtab+'\');return false;" />';}
	else{closeimage='';}
        var isFontIcon = false;
        if( image.indexOf('.') === -1)
        {
            isFontIcon = true;
        }
	image=(isFontIcon?'<b class="icon '+image+'">&nbsp;&nbsp;&nbsp;</b>':'<img src="/media/images/'+image+'" alt="'+type+'" class="timg" />');
	g('rtab'+tab).innerHTML='<span class="tabContainer">'+image+'<b class="tabTitle">'+title+'<\/b>'+closeimage+'<\/span>';
	updateScroller(0);
};

scrolling=0;
function sectionUpdateScroller(){
	scrolling=0;
	updateScroller(0);
	if(!canmoveleft()){flushleft();}
};

/*
This function is called whenever the width of the tabs that are open 
changes for scrolling when the tabs exceeds the amount of space
*/
function updateScroller(isnew){
	totaltabwidth['maintabs']=8;
	$('#maintabs li a').each( function() {
		widthval=this.offsetWidth+1;
		totaltabwidth['maintabs']+=widthval;
	});
	avaliablewidth=g('rightpane').offsetWidth;
	if(totaltabwidth['maintabs']>avaliablewidth){
		if(scrolling==0){
			scrolling=1;
			g('maintabs').style.marginLeft='16px';
			g('maintabs').style.marginRight='16px';
			g('leftarrow').style.display='block';
			g('rightarrow').style.display='block';
		}
	}else {
		if(scrolling==1){
		scrolling=0;
		g('leftarrow').style.display='none';
		g('rightarrow').style.display='none';
		g('maintabs').style.marginLeft='0px';
		flushleft();
		}
	}
	g('righttabs').style.width=(totaltabwidth['maintabs']+4000)+'px';
};

//Code for tab scrolling
scrollstep=10;
refreshinterval=30;
margleft=new Array();

function scrolltabsleft(id){
	if(canmoveright(id)) {
		margleft[id]+=scrollstep;
		settabpos(margleft[id],id);
	}
	else{flushleft(id);}
	
};
function scrolltabsright(id){
	if(canmoveleft(id)) {
		margleft[id]-=scrollstep;
		settabpos(margleft[id],id);
	}
	else{flushright(id);}
	
};
function canmoveright(id){
	if((margleft[id]+scrollstep)<0){
		return true;
	}else{
		return false;
	}
};

function canmoveleft(id){
	if(availabletabswidth(id)<(totaltabwidth[$('#'+id).attr('tabholder')]+(parseFloat(margleft[id])-parseFloat(scrollstep)))){
		return true;
	}else{
		return false;
	}
};

function flushleft(id){
	margleft[id]=0;
	settabpos(margleft[id],id);
};

function flushright(id){
	if(availabletabswidth(id)<=totaltabwidth[$('#'+id).attr('tabholder')]){
		margleft[id]=availabletabswidth(id)-totaltabwidth[$('#'+id).attr('tabholder')];
		settabpos(margleft[id],id);
	}
};

function settabpos(pos,id){
	if(!id){id='righttabs';}
	g(id).style.marginLeft=pos+'px';
}

function availabletabswidth(id){
	if(!id){id='righttabs';}
	return parseFloat(g($('#'+id).attr('tabholder')).offsetWidth);
}

scrollleft=new Array;
scrollright=new Array;

function goleft(keepgoing,id){
	if(keepgoing==1){
		scrolltabsleft(id);
		setTimeout("goleft("+scrollleft[id]+",'"+id+"')",refreshinterval);
	}
}
function goright(keepgoing,id){
	if(keepgoing==1){
		scrolltabsright(id);
		setTimeout("goright("+scrollright[id]+",'"+id+"')",refreshinterval);
	}
}

function mousedown(which,id){
	if(!margleft[id]){margleft[id]=0;}
	
	if(id!='righttabs') {
		totaltabwidth[$('#'+id).attr('tabholder')]=8;
		$('#'+id+' li a').each( function() {
			widthval=this.offsetWidth+1;
			totaltabwidth[$('#'+id).attr('tabholder')]+=widthval;}
		);
	}
	
	if(which==0)//scrolling left
	{
		scrollleft[id]=1;
		goleft(scrollleft[id],id);
	}
	else if(which=1)//scrolling right
	{
		scrollright[id]=1;
		goright(scrollright[id],id);
	}
}

function mouseup(which,id){
	if(which==0)//stop scrolling left
	{scrollleft[id]=0;}
	else if(which=1)//stop scrolling right
	{scrollright[id]=0;}
}


// LIST CLICK
olditem=false;
function listclick(item,url,q)
{
	$('#filterlist .active').removeClass('active');
	olditem=item;
	$('#list'+olditem).addClass('active');

	jax(url,q,'rtab1details');
	tabview('rtab',1);
};

function redolist(){
	$('#filterlist .active').removeClass('active');
	if(olditem){$('#filterlist #list'+olditem).addClass('active');}
}

// INIT DROP DOWN
ddactive='no';
ddarrow='no';
ddover='no';
currentddvalue='';
currentlyfocusedfield='';
function __dropdown(id,showin,field,search,q,m)
{
        var showinEle = g(showin);
        if( !showinEle )
        {
            showinEle = top.g('systemWrapper');
        }
	if(!search && field){search=g(field).value;}	
	currentlyfocusedfield=field;
	currentddvalue=search;
	cddcount=1;
	if(!g(id))
	{
		element=document.createElement('div');
		element.id=id;
		showinEle.appendChild(element);
		g(id).className='dropdown';
		g(id).onfocus=function(){setTimeout("g('"+field+"').focus()",0);};
		g(id).onclick=function(){setTimeout("g('"+id+"').style.display='none';g('"+id+"').innerHTML='';ddactive='no';",0);};
		g(id).onmouseover=function(){ddover='yes';};
		g(id).onmouseout=function(){ddover='no';};
	}

	if(g(id))
	{
		g(id).innerHTML='';     

		$('#'+field).unbind('blur').bind('blur',function(){if(ddover=='no'){setTimeout("g('"+field+"').value=g('"+field+"').title;g('"+id+"').style.display='none';g('"+id+"').innerHTML='';ddactive='no';",0);}});

		ddactive="yes";

		if(search!=""){g(id).style.display='block';}
		g(id).style.top=$('#'+field).y()-$('#'+showin).y()+$('#'+field).height()+2+'px';
		g(id).style.left=$('#'+field).x()-$('#'+showin).x()+1+'px';
		if(m>0)
		{
			g(id).style.minWidth=$('#'+field).width()+'px';
			g(id).style.paddingRight='50px';
			g(id).style.overflowX='hidden';    
		}
		else
		{
			//g(id).style.width=$('#'+field).width()+'px';
		}

		sidelist('core/main/get.php',q+'&amp;field='+field+'&amp;search='+escape(search)+'&amp;ddid='+id,id,null,true);
	}
};

function dropdown(id,showin,field,search,q,m,immediate)
{
	if(search!='showall' && !immediate)
	{
		idletimer(field,'__dropdown('+turn_to_literal(id)+','+turn_to_literal(showin)+','+turn_to_literal(field)+','+turn_to_literal(search)+','+turn_to_literal(q)+','+turn_to_literal(m)+');',1000);
	}
	else
	{
		__dropdown(id,showin,field,search,q,m);
	}
}
//*/
function turn_to_literal(arg)
{
	return (arg!=null)?'\''+addslashes(arg)+'\'':'null';
}

// DROP DOWN SELECT
cddtype='';
cddfield='';
cddtab='';
cddcount=1;
cddq='';
function ddselect(type,tab,field,count,q)
{
	if(!q){q='';}
	
	cddq=q;
	
	if(g(type+'-'+tab+'-'+cddcount))
	{
		g(type+'-'+tab+'-'+cddcount).className='';
	}
	cddcount=count;
	g(type+'-'+tab+'-'+cddcount).className='active';

	selectedheight=(g(type+'-'+tab+'-'+cddcount).offsetTop+20);
	ddscroll=g(type+'-'+tab+'-'+cddcount).parentNode.scrollTop;

	if(selectedheight>ddscroll+100){g(type+'-'+tab+'-'+cddcount).parentNode.scrollTop+=20;}
	if(selectedheight<ddscroll+20){g(type+'-'+tab+'-'+cddcount).parentNode.scrollTop-=20;}

	ddid=g(type+'-'+tab+'-'+cddcount).name;
	
	jax('core/main/get.php','action=fillfields&amp;type='+type+'&amp;tab='+tab+'&amp;field='+field+'&amp;id='+ddid+'&amp;'+q,null,null,true);
	
};
// DROP DOWN ARROW KEY
function ddarrowkey(e)
{
	ddarrow="no";
	
	if(!e){e=window.event;}
	//Up Arrow
	if(e.keyCode==38 && ddactive=="yes" && g(cddtype+'-'+cddtab+'-'+(cddcount-1))){ddselect(cddtype,cddtab,cddfield,cddcount-1,cddq);}
	//Down Arrow
	if(e.keyCode==40 && ddactive=="yes" && g(cddtype+'-'+cddtab+'-'+(cddcount+1))){ddselect(cddtype,cddtab,cddfield,cddcount+1,cddq);}
	// Tab
	if(e.keyCode==9 && ddactive=="yes"){ddactive='no';ddover='no';}
	// Enter Key
	if((e.keyCode==13 || e.keyCode==40 || e.keyCode==38) && ddactive=="yes"){ddarrow="yes";return false;}
};

function ddarrowkey_new(e)
{
	ddarrow="no";
        current=g(cddtype+'-'+cddtab+'-'+cddcount);
	if(!e){e=window.event;}
	//Up Arrow
	if(e.keyCode==38){
            if(ddactive=="yes"){
                prev=$(current).prev("a");
                if(prev.length){
                    ddselect(cddtype,cddtab,cddfield,prev.attr('name'),cddq);
                }
            }
        }
	//Down Arrow
	if(e.keyCode==40){
            if(ddactive=="yes"){
                next=$(current).next("a");
                if(next.length){
                    ddselect(cddtype,cddtab,cddfield,next.attr('name'),cddq);
                }
            }
        }
	// Tab
	if(e.keyCode==9 && ddactive=="yes"){ddactive='no';ddover='no';}
	// Enter Key
	if((e.keyCode==13 || e.keyCode==40 || e.keyCode==38) && ddactive=="yes"){ddarrow="yes";return false;}
};
/*
// DROP DOWN ARROW KEY
function ddarrowkey_nofill(e)
{
	ddarrow="no";

	if(!e){e=window.event;}
	//Up Arrow
	if(e.keyCode==38 && ddactive=="yes" && g(cddtype+'-'+cddtab+'-'+(cddcount-1))){ddselect(cddtype,cddtab,cddfield,cddcount-1,cddq,1);}
	//Down Arrow
	if(e.keyCode==40 && ddactive=="yes" && g(cddtype+'-'+cddtab+'-'+(cddcount+1))){ddselect(cddtype,cddtab,cddfield,cddcount+1,cddq,1);}
	// Tab
	if(e.keyCode==9 && ddactive=="yes"){ddactive='no';ddover='no';ddselect(cddtype,cddtab,cddfield,cddcount,cddq);}
	// Enter Key
	if((e.keyCode==13 || e.keyCode==40 || e.keyCode==38) && ddactive=="yes"){ddarrow="yes";return false;}
};
*/
// AUTO FILL SCRIPT
function sidelist(url,q,returnto,searchfield,nojaxoverlay)
{
	olditem=false;
	if(searchfield)
	{
        var waittime = 800;
        $('#paginate-loading').show();
        if(isFinite(q.search)) {
            // If they are searching for numbers. Let them search faster.
            waittime = 400;
        } else if (q.search == "" ) {
            waittime = 0;
        }


		idletimer(searchfield,function(){
                    jaxnew(url,{
                        args:q,
                        target:returnto,
                        noblock:true,
                        nocontext:true});
                    },waittime);
	}
	else
	{
		jaxnew(url,{
                        args:q,
                        target:returnto,
                        noblock:nojaxoverlay,
                        nocontext:true});
	}
};
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
};

function refresh_list(item,shownew,args){
	if(!shownew){nonewargs={'nonew':1,'new':0,'refreshview':0};}
	else{nonewargs={'nonew':0,'new':1,'refreshview':1};};    
	refresh_jax(item,$.extend(nonewargs,args),true,redolist);
    stripContext(item);
};

// TRACK MOUSE POSITION
mouseX=0;
mouseY=0;
function getMouseXY(e)
{ 
	if(!e){e=window.event;}
	mouseX=e.clientX;
	mouseY=e.clientY;
};

function cload(tab,type,id)
{
    $('#calendarSideList [name='+type+']').val(id);
    calendarRefreshTimer();
}

function calendarRefreshTimer(delay)
{
    if (delay == undefined){
        delay = 1500;
    }
    idletimer('calendarRefreshTimer',calendarRefresh,delay);
}
function calendarRefresh()
{
    if(g('calendar'))
    {
       var scrollTop = top.$('#calendar').data('scrollTop');
       g('calendar').innerHTML='<div class="calloading">Loading...</div>';
       jaxnew('modules/dashboard/calendar.php',{args:'lastScrollTop='+scrollTop+'&amp;tab='+tab+'&amp;setResources=1&amp;'+getPostWithinString('#calendarSideList')+'&amp;'+getPostWithinString('#controls'),target:'calendar',post:true});
       //jaxnew('Dashboard/RefreshCalendar',{args:{},target:'grid',post:true,how:'append'});
    }
}

var calendarRefreshTimeout = false;
function appointmentRefresh()
{
    if(top.g('calendar'))
    {
        clearTimeout(calendarRefreshTimeout);
        calendarRefreshTimeout = setTimeout(function(){
        top.jaxnew('Dashboard/RefreshCalendar',{
            args:{}
            ,target:$('#calendarmain .theGrid').attr('id'),post:true,how:'append'});
        },20);
    }
}


function cdown(cell,row,column,hour,mins)
{
	if(calendardown=='no'){calendardown='yes';calendarmax=row;calendarcol=column;starttime=hour+':'+mins;startdown=row;cell.style.backgroundColor='#ccc';}
};

function cover(cell,row,resource,currentdate)
{
	lapptid=currentappointment.split('-');
	lapptid=lapptid[0];
	if(resizerdown=='yes' && cell.parentNode.offsetTop>parseInt(g(currentappointment).style.top)){a2rl[lapptid]=row-a2rs[lapptid]+1;g(currentappointment+'e').innerHTML=r2t[a2rs[lapptid]+a2rl[lapptid]];g(currentappointment).style.height=parseInt(cell.parentNode.offsetTop)-parseInt(g(currentappointment).style.top)+19+'px';};
	if(appointmentdown=='yes' && resizerdown!='yes'){a2rs[lapptid]=row;g(currentappointment+'s').innerHTML=r2t[row];g(currentappointment+'e').innerHTML=r2t[a2rs[lapptid]+a2rl[lapptid]];g(currentappointment).style.zIndex=row;g(currentappointment).style.left=cell.offsetLeft+1+'px';g(currentappointment).style.top=cell.parentNode.offsetTop+'px';};
	if(calendardown=='yes'){if(calendarmax<row){calendarmax=row;};for(i=startdown;i<=row;i++){$('#calendarr'+i+'c'+calendarcol).css('background','#ccc');};for(i=row+1;i<=calendarmax;i++){$('#calendarr'+i+'c'+calendarcol).css('background','#fff');}};
	if(resizerdown=='yes' || appointmentdown=='yes'){g(currentappointment+'re').innerHTML=resource;g(currentappointment+'d2').innerHTML=currentdate;}
	if(g(currentappointment+'e')){if(r2t[a2rs[lapptid]+a2rl[lapptid]]){g(currentappointment+'e').innerHTML=r2t[a2rs[lapptid]+a2rl[lapptid]];}else{g(currentappointment+'e').innerHTML='11:59pm';}}
};

function astatus(appointment,status)
{
	jax('core/main/get.php','action=appointmentstatus&amp;appointment='+appointment+'&amp;status='+status);
}


//Keyboard Script
function keyListener(e)
{
	$('.menus').css('top','-1000px');     
	
	// Return is there is currently a box open.
	if(($('#coverblock'))&&($('#coverblock').css('display')=='block')) { if(e.keyCode==13) { g('messageblock').style.display='none'; } return false; }
	if(($('#messageblock'))&&($('#messageblock').css('display')=='block')) { if(e.keyCode==13) { g('messageblock').style.display='none'; } return false; }

	if(!e){e=window.event;}
	var targ;
	if(e.target){targ = e.target;}
	else if(e.srcElement){targ = e.srcElement;}
	if(targ.nodeType==3){targ = targ.parentNode;}
	
//	if(e.keyCode==27){logout();return false;}
	// The following line disables the confirm page change code... it is only for while we are developing and need to hit F5 or Ctrl+R a lot. (keycode 116=F5).
	if(e.keyCode==116){
		enableconfirm='no';
	};
	if(e.ctrlKey){
		if(e.keyCode==82){enableconfirm='no';}
	}
	
	//alert(e.keyCode);

	// Plain Shortcuts
	if(targ.tagName!='INPUT'&&targ.tagName!='TEXTAREA'&&targ.tagName!='SELECT'&&!e.shiftKey&&!e.ctrlKey&&!e.altKey)
	{
		if(plainkeys[e.keyCode]){eval(plainkeys[e.keyCode]);return false;}		
	}

	// Shift Shortcuts
	if(targ.tagName!='INPUT'&&targ.tagName!='TEXTAREA'&&targ.tagName!='SELECT'&&e.shiftKey&&!e.ctrlKey&&!e.altKey)
	{
		if(shiftkeys[e.keyCode]){eval(shiftkeys[e.keyCode]);}
		return false;
	}
	
	// Ctrl+Shift Shortcuts
	if(targ.tagName!='INPUT'&&targ.tagName!='TEXTAREA'&&targ.tagName!='SELECT'&&e.shiftKey&&e.ctrlKey&&!e.altKey)
	{
		if(ctrlshiftkeys[e.keyCode]){eval(ctrlshiftkeys[e.keyCode]);}
		return false;
	}
}

filerow=new Array();
function addattachment(tab)
{
     filerow[tab]++;
	row=g('files'+tab).insertRow(-1);
	row.id='frow'+filerow[tab]+'-'+tab;

	cell=row.insertCell(-1);
	cell.innerHTML='<input style="float:left;" style="border:none;padding:1px;" type="file" name="myfiles[]" />';

	cell=row.insertCell(-1);
	cell.innerHTML='<span class="button-remove" alt="Remove File" onclick="g(\'files\'+'+tab+').deleteRow(g(\''+row.id+'\').rowIndex);" />';
}

dashdrag=dashrem=dashr='no';
dashbox=currentdashbox=0;
dashb2c=new Array();
dashb2c[0]=1;
currentoffsettop=currentoffsetleft=0;

function dashdraggin()
{
	g('viewelement'+currentdashbox).style.top=parseInt(mouseY)-mainmenuheight-30+'px';
	g('viewelement'+currentdashbox).style.left=parseInt(mouseX)-currentoffsetleft-5+'px';
}

function dashdown(box,e)
{
	dashdrag='yes';
	currentdashbox=box;
	
	currentoffsettop=g('viewelement'+box).offsetTop;
	currentoffsetleft=g('viewelement'+box).offsetLeft+g('dashboardcolumn'+dashb2c[box]).offsetLeft;

	if(!g('viewelement0'))
	{
		element=document.createElement('div');
		element.id='viewelement0';
		g('ezydesk').appendChild(element);
		g('viewelement0').onmouseover=function(){if(dashdrag=='yes'){dashreplace(0);return false;};};
		g('viewelement0').innerHTML='<div id="dashplacer"></div>';
	}
	g('viewelement0').style.display='block';
	
	g('dashplacer').style.height=g('viewelement'+box).offsetHeight-19+'px';
	
	dashb2c[0]=dashb2c[box];
	g('dashboardcolumn'+dashb2c[box]).insertBefore(g('viewelement0'),g('viewelement'+box));
	
	$('#viewelement'+currentdashbox).css('opacity',0.6).css('z-index',999999999);
	g('viewelement'+box).style.width=g('viewelement'+box).offsetWidth-2+'px';
	g('viewelement'+box).style.position='absolute';
	dashdraggin();
}

function dashup()
{
	dashdrag='no';
	if(g('viewelement'+currentdashbox) && g('viewelement0'))
	{
		try
		{
    		dashb2c[currentdashbox]=dashb2c[0];
    		g('viewelement0').style.display='none';
    		$('#viewelement'+currentdashbox).css('opacity',1);
    		g('dashboardcolumn'+dashb2c[0]).insertBefore(g('viewelement'+currentdashbox),g('viewelement0'));	
    		g('viewelement'+currentdashbox).style.width='';g('viewelement'+currentdashbox).style.position='static';
		}
		catch(e)
		{
			top.msg('error!',0,'error');
		}
	}
}

function dashset(dashcol,dashbox)
{
	dashb2c[dashbox]=dashcol;
	g('dashboardcolumn'+dashcol).appendChild(g('viewelement'+dashbox));
}

function dashremove(dashbox)
{
	if(confirm('Are you sure you want to remove this box?'))
	{
		g('dashboardcolumn'+dashb2c[dashbox]).removeChild(g('viewelement'+dashbox));
	}
}

function dashmove(dashcol)
{
	if(dashdrag=='yes' && dashr=='no')
	{
		dashb2c[0]=dashcol;
		g('dashboardcolumn'+dashcol).appendChild(g('viewelement0'));
	}
	dashr='no';
}

function dashreplace(dashbox)
{
	dashr='yes';
	
	if(dashdrag=='yes' && dashbox!=currentdashbox)
	{
		try
		{
			dashb2c[0]=dashb2c[dashbox];
			g('dashboardcolumn'+dashb2c[dashbox]).insertBefore(g('viewelement0'),g('viewelement'+dashbox));
		}
		catch(e)
		{
			top.msg(dashbox,0,'error');
		}
	}
}

////////////////// JOBS

// MENU TOGGLE
function toggle(img)
{
	if(img.src.indexOf('plus')=='-1'){img.src='media/images/plus.gif';img.parentNode.className='hidden';}else{img.src='media/images/minus.gif';img.parentNode.className='';}
}

function base64_decode( data ) {
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = ac = 0, dec = "", tmp_arr = [];

    data += '';

    do {  // unpack four hexets into three octets using index points in b64
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));

        bits = h1<<18 | h2<<12 | h3<<6 | h4;

        o1 = bits>>16 & 0xff;
        o2 = bits>>8 & 0xff;
        o3 = bits & 0xff;

        if (h3 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1);
        } else if (h4 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1, o2);
        } else {
            tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
        }
    } while (i < data.length);

    dec = tmp_arr.join('');
    dec = utf8_decode(dec);

    return dec;
}

function base64_encode( data ) {
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = ac = 0, enc="", tmp_arr = [];
    data = utf8_encode(data);
    
    do { // pack three octets into four hexets
        o1 = data.charCodeAt(i++);
        o2 = data.charCodeAt(i++);
        o3 = data.charCodeAt(i++);

        bits = o1<<16 | o2<<8 | o3;

        h1 = bits>>18 & 0x3f;
        h2 = bits>>12 & 0x3f;
        h3 = bits>>6 & 0x3f;
        h4 = bits & 0x3f;

        // use hexets to index into b64, and append result to encoded string
        tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
    } while (i < data.length);
    
    enc = tmp_arr.join('');
    
    switch( data.length % 3 ){
        case 1:
            enc = enc.slice(0, -2) + '==';
        break;
        case 2:
            enc = enc.slice(0, -1) + '=';
        break;
    }

    return enc;
}

function utf8_decode ( str_data ) {
    var tmp_arr = [], i = ac = c1 = c2 = c3 = 0;

    str_data += '';

    while ( i < str_data.length ) {
        c1 = str_data.charCodeAt(i);
        if (c1 < 128) {
            tmp_arr[ac++] = String.fromCharCode(c1);
            i++;
        } else if ((c1 > 191) && (c1 < 224)) {
            c2 = str_data.charCodeAt(i+1);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
            i += 2;
        } else {
            c2 = str_data.charCodeAt(i+1);
            c3 = str_data.charCodeAt(i+2);
            tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }

    return tmp_arr.join('');
}

function utf8_encode ( string ) {
    string = (string+'').replace(/\r\n/g, "\n").replace(/\r/g, "\n");

    var utftext = "";
    var start, end;
    var stringl = 0;

    start = end = 0;
    stringl = string.length;
    for (var n = 0; n < stringl; n++) {
        var c1 = string.charCodeAt(n);
        var enc = null;

        if (c1 < 128) {
            end++;
        } else if((c1 > 127) && (c1 < 2048)) {
            enc = String.fromCharCode((c1 >> 6) | 192) + String.fromCharCode((c1 & 63) | 128);
        } else {
            enc = String.fromCharCode((c1 >> 12) | 224) + String.fromCharCode(((c1 >> 6) & 63) | 128) + String.fromCharCode((c1 & 63) | 128);
        }
        if (enc != null) {
            if (end > start) {
                utftext += string.substring(start, end);
            }
            utftext += enc;
            start = end = n+1;
        }
    }

    if (end > start) {
        utftext += string.substring(start, string.length);
    }

    return utftext;
}

function dragStop(event) {
  // Stop capturing mousemove and mouseup events.

  if (browser.isIE) {
    document.detachEvent("onmousemove", dragGo);
    document.detachEvent("onmouseup",   dragStop);
  }
  if (browser.isNS) {
    document.removeEventListener("mousemove", dragGo,   true);
    document.removeEventListener("mouseup",   dragStop, true);
  }
}

//Takes the properties of an object and converts them into hidden inputs
function get_hidden_inputs(target_object,tab,row) {
	name_suffix=(row==null?'':'-'+row);
	id_suffix=name_suffix+(tab==null?'':'-'+tab);
	inputs='';
	for(item in target_object) {
		inputs+='<input type="hidden" disabled="disabled" id="'+item+id_suffix+'" name="'+item+name_suffix+'" value="'+target_object[item]+'" />\n';
	}
	return inputs;
}

//Takes the properties of an object and attaches them to dom objects defined by a jquery search string
function attach_to_dom_element(target_object,search_string) {
	target_elements=$(search_string).each(function (){
		for(item in target_object) {
			this[item]=target_object[item];
		}
	});
	return inputs;
}


function idletimer(id,exec,time) {
	if(!time){time=time?time:300;}
	clearTimeout(idletimerTimeout);
	idletimerTimeout=setTimeout(exec,time);
	
//	if(!time){time=time?time:300;}
//	clearTimeout(g(id).timeout);
//	g(id).timeout=setTimeout(exec,time);
}

function clearIdleTimer(id)
{
    clearTimeout(idletimerTimeout);
}
var idleTimers = {};
function idletimerNew(timerId,exec,time) {
    if( timerId == undefined ) {
        timerId = 'unknown'
    }
    if (!time) {
        time = time ? time : 300;
    }
    clearIdleTimerNew(idleTimers[timerId]);
    idleTimers[timerId] = setTimeout(exec, time);
}

function clearIdleTimerNew(timerId)
{
    if( timerId != undefined )
    {
        clearTimeout(timerId);
    }
}

//Empty Obj Array
function create_array(elements)
{
	var result=new Array;
	for(var i=0; i<elements; i++)
	{
		result.push(new Object);
	}
	return result;
}

chkdate_re=/^\d\d-\d\d-\d\d\d\d$/;
relativeFormat_re=/^([-+])(\d+)([dmyw])$/;
function check_date(field,allowempty) {
    if(relativeFormat_re.test(field.value))
    {
        var matches = field.value.match(relativeFormat_re);
        var startDate = new Date();
        //if a date was selected else do nothing
        var qtyAdjust = parseInt(matches[1]+matches[2]);
        if (startDate != null) {
            switch(matches[3])
            {              
                case 'm':
                {
                    startDate.setMonth(startDate.getMonth()+qtyAdjust);
                    break;
                }
                case 'w':
                {
                   qtyAdjust = qtyAdjust*7;
                } 
                case 'd':
                {
                    startDate.setDate(startDate.getDate()+qtyAdjust);
                    break;
                } 
                case 'y':
                {
                    startDate.setYear(startDate.getYear()+qtyAdjust);
                    break;
                }
                default:{}
            }
            $(field).datepicker('setDate',startDate);
        }
    }
/*
	if ( (allowempty && !field.value) || chkdate_re.exec(field.value)) {
		//field.style.backgroundColor='#ffffff';
	} else {
		//field.style.backgroundColor='#ffbbbb';
	}
*/
}

function addEvent(obj, evType, fn){
	$(obj).each(function(){
		if (this.addEventListener){ 
			this.addEventListener(evType, fn, false); 
			return true; 
		} else if (this.attachEvent){ 
			var r = this.attachEvent("on"+evType, fn); 
			return r; 
		} else { 
			return false; 
		}; 
	});
};
function attach_new_simple_editor(id,tab, options)
{
    if( options == null )
    {
        var options = {};
    }
    options.toolbar = [
            [ 'Undo', 'Redo' ],
            [ 'Bold', 'Italic', 'Underline' ],
            [ 'Font', 'FontSize' ],
            [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ]
        ];

    attach_new_editor(id,tab, options);
}

function attach_new_editor_standard(id, tab, options)
{
    var ckReadyOnce = false;
    var ckEditor = top.attach_new_editor(id, tab, options, function(instance){
        ckEditor = instance;
        $('#'+id).parent().find('.anim-loader').fadeOut("1000", function() {
            $(this).css('display', 'none');
        });
        if (!ckReadyOnce) {
            CKEDITOR.on('instanceReady', function(e) {
            });
            ckReadyOnce = true;
        }
        ckEditor.on('mode', function(e){
            if (e.editor.mode == "wysiwyg") {
                ckReadyOnce = false;
            }
        });
    });
}

function attach_new_editor(id, tab, options, callback)
{
    // --- Not loaded; load CKEDITOR and wait for its plugins to finish loading 
    if (typeof CKEDITOR == "undefined" || typeof CKEDITOR.config == "undefined"  || CKEDITOR.status != "loaded") {
        var s = document.createElement('script');
        s.src = "media/js/ckeditor_4_5_11/ckeditor.js";
        document.querySelector('head').appendChild(s);
        var interval = setInterval(function(){
            if (CKEDITOR.status == "loaded") {
                clearInterval(interval);
                var instance = _attach_new_editor(id, options);
                if (typeof callback != "undefined") {
                    callback(instance);
                }
                return instance;
            }
        }, 250);
        
    // --- Already loaded; proceed with normal attach
    } else {
        var instance = _attach_new_editor(id, options);
        if (typeof callback != "undefined") {
            callback(instance);
        }
        return instance;
    }
}

function _attach_new_editor(id, options)
{
    CKEDITOR.config.width = options!=null && options.width!=null && parseInt(options.width)!=0?parseInt(options.width):800;
    CKEDITOR.config.height = options!=null && options.height!=null && parseInt(options.height)!=0?parseInt(options.height):400;
    if(options!=null && options.toolbar !=null)
    {
        CKEDITOR.config.toolbar = options.toolbar;
    }
    else if(options!=null && options.toolbarGroups!=null)
    {
        CKEDITOR.config.toolbarGroups = options.toolbarGroups;
    } else {

        // Fixes bug where toolbar was being overwritten by simplified toolbar.
        CKEDITOR.config.toolbar = "";

        CKEDITOR.config.toolbarGroups = [
            { name: 'mode', groups: [ 'mode', 'doctools' ] },
            { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
            { name: 'undo', groups: [ 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'insert' },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ] },
            { name: 'styles' },
            { name: 'colors' }
        ];

        CKEDITOR.config.removeButtons = 'Flash,Smiley,IFrame';

    }
    CKEDITOR.config.readOnly = (options!=null && options.disabled)?true:false;
    CKEDITOR.config.autoParagraph = false;
    //CKEDITOR.config.extraPlugins = 'dialogui,dialog,image';
    //CKEDITOR.config.extraPlugins = 'dialog';
    //CKEDITOR.config.extraPlugins = 'image';
    CKEDITOR.config.fillEmptyBlocks = false;
//    CKEDITOR.config.entities_latin = false;
//    CKEDITOR.config.htmlEncodeOutput = false;
//    CKEDITOR.config.forcePasteAsPlainText = true;
    CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
    CKEDITOR.config.shiftEnterMode = CKEDITOR.ENTER_P;
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.config.baseFloatZIndex = 1999900;
        CKEDITOR.on('instanceReady',function(e){
        top.rejigFormBox();
    });
    var instance = CKEDITOR.replace( id );
    instance.on('contentDom', function( event ) {
        instance.document.on('keydown', function(e) {
            top.$('#ezydesk').trigger(e.name);
        });
        instance.document.on('click', function(e) {
            top.$('#ezydesk').trigger(e.name);
        });
    });
    return instance;
}


function yesno(text,yes,no,yes_name,no_name) {
	if(!yes_name){yes_name='Yes';}
	if(!no_name){no_name='No';}
	opts='<input class="button" id="yesno_yes" type="button" onclick="$(\'#yesno\').hide();'+yes+'" value="'+yes_name+'"> ';
	opts+='<input class="button" id="yesno_no" type="button" onclick="$(\'#yesno\').hide();'+no+'" value="'+no_name+'"> ';
	g('yesno_text').innerHTML=text;
	g('yesno_choices').innerHTML=opts;
	$('#yesno').show();
	winh=parseInt(document.body.offsetHeight);
	winw=parseInt(document.body.offsetWidth);
	mleft=(parseInt(document.body.offsetWidth)-g('yesno').offsetWidth)/2;
	mtop=(parseInt(document.body.offsetHeight)-g('yesno').offsetHeight)/2;
	$('#yesno').css({opacity:'1',left:mleft+'px',top:mtop+'px'});
}

/*
 *yesNoNew the new Yes No dialog box accepts an object with the following options
 *
yesNoNew({
  'question' => 'Are you sure?',
  'yesScript' => function(){},
  'noScript' => function(){},
  'yesName' => 'Yes',
  'noName' => 'No'
});
 */
function yesNoNew( arguments )
{
    var yesJavascript = arguments['yesScript'];
    var noJavascript = arguments['noScript'];
	if(!arguments['yesName']){arguments['yesName']='Yes';}
	if(!arguments['noName']){arguments['noName']='No';}
	if(!arguments['question']){arguments['question']='Are You Sure?';}
	opts='<input class="button" id="yesno_yes" type="button" value="'+arguments['yesName']+'"> ';
	opts+='<input class="button" id="yesno_no" type="button" value="'+arguments['noName']+'"> ';
	$('#yesno_text').html(arguments['question']);
    $('#yesno_choices').html(opts);
    $('#yesno_choices #yesno_yes').off('click').on('click',function(){
        $('#yesno').hide();
        yesJavascript();
    });
    $('#yesno_choices #yesno_no').off('click').on('click',function(){
        $('#yesno').hide();
        noJavascript();
    });
	$('#yesno').show();
	winh=parseInt(document.body.offsetHeight);
	winw=parseInt(document.body.offsetWidth);
	mleft=(parseInt(document.body.offsetWidth)-g('yesno').offsetWidth)/2;
	mtop=(parseInt(document.body.offsetHeight)-g('yesno').offsetHeight)/2;
	$('#yesno').css({opacity:'1',left:mleft+'px',top:mtop+'px'});
}

function acknowledge(text) {
    var background = "<div id='acknowledge' class='formbox' style=\"display:block;\"></div>";
    $(document.body).append(background);

    $('#yesno_text').html(text);
    $('#yesno_choices').html('<input class="button" id="yesno_yes" type="button" value="Acknowledge"> ');
    $('#yesno_choices #yesno_yes').off('click').on('click',function(){
        $('#yesno').hide();
        $('#acknowledge').remove();
    });
    $('#yesno').show();
    $('#yesno').css({opacity:'1',margin:'0',position:'absolute',top:'50%',left:'50%',transform:'translate(-50%, -50%)'});
}

function consoleinfo(msg) {
	if(parseFloat($('#_firebugConsole').attr('FirebugVersion'))>0) {
		console.info(msg);
	}
}

function makeFormBox( zindex )
{
    var formboxTab = getTabId( true );
    
    var formBox = '<div id="formbox'+formboxTab+'" class="formbox" style="z-index:'+zindex+';">'+
        '<div class="formbox_inner popup_element" class="ui-widget-content" style="overflow:visible;" >'+
            '<div id="formbox'+formboxTab+'_content" class="elementContent'+formboxTab+' formbox_content popup_content"></div>'+
        '</div>'+
    '</div>';
    $(document.body).append(formBox);
/*
    MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
    var observer = new MutationObserver(function(mutations, observer) {
        // fired when a mutation occurs
        console.log(mutations, observer);
        top.rejigFormBox();        
        // ...
    });

    // define what element should be observed by the observer
    // and what types of mutations trigger the callback
    observer.observe($('#formbox'+formboxTab+'').get(0), {
      attributes:true,
      characterData:true
    });
//*/
    var isDirty = false;
    $('.formbox').off('click').on('click', function (e) {
        if(e.target != this){
            //Necessary for triggering a change in all hidden fields
            $('.formbox :input[type="hidden"]').trigger("blur");
            //If any inputs (hidden or unhidden) have been altered, the form has been 'dirtied'
            $('.formbox :input[type="hidden"]').blur(function(){
                isDirty = true;
            });
            $('.formbox :input[type!="hidden"]').change(function(){
                isDirty = true;
            });

            return;
        }

        if (isDirty){
            if (confirm("Are you sure you want to close this form?\nAny unsaved changes will be lost!") == true) {
                this.remove();
            }
        } else {
            this.remove();
        }

    });
    $('.formbox_inner').draggable({
        handle: ".popupFormHeader",
        containment: "window",
    });
    return formboxTab;
}
function destroyFormBox( formboxTab )
{
    $('#formbox'+formboxTab).remove();
}
// creates a generic form box
function formBox(url,args,referenceEle,post) {
        var zindex = 9999;
        if( referenceEle )
        {
            $(referenceEle).zIndex();
        }
        var rtab =1;
        var matches = /[&;]+tab\=([0-9]*)[&]+/.exec(args);
        if( matches )
        {
            rtab = matches[1];
        }
        var formboxTab = makeFormBox();
        args = replaceUrlArgs( args , {tab:formboxTab,formBoxTab:formboxTab,rtab:rtab} );
	$('#formbox'+formboxTab+' .formbox_content').html('');
	nocontext_jax(url,args,'formbox'+formboxTab+'_content',function(){
		$('#formbox'+formboxTab).show();
                rejigFormBox();
//                $( '#formbox'+formboxTab+' .formbox_inner' ).draggable( "destroy" );
//                $('#formbox'+formboxTab+' .formbox_inner' ).draggable({handle:'#formbox'+formboxTab+' .formboxDrag',containment:'parent',cursor:'move',cancel:null,zIndex: 999999});
//                $( '#formbox'+formboxTab+' .formbox_inner' ).disableSelection();
        },false,false,post );
}

function rejigFormBox()
{
    var winh=parseInt($(document.body).height());
    var winw=parseInt($(document.body).width());
    var cssJson;
    var cssJsonContent;
    $('.formbox_inner').each(function(){
        cssJsonContent = {'max-height':(winh-118)+'px','max-width':(winw-20)+'px','overflow-y':'default','overflow-x':'hidden'};
        if(this.offsetHeight>500)
        {
            cssJsonContent['overflow-y'] = 'auto';
        }
        $('.recordPopupForm',this).css(cssJsonContent);
        var mleft=parseInt(winw-$(this).width()-44)/2;
        mleft = mleft>0?mleft:0;
        var mtop=parseInt(winh-$(this).height()-24)/2;
        mtop = mtop>0?mtop:0;
        cssJson = {left:mleft+'px',top:mtop+'px', height:'auto', width:'auto'};
        $(this).css(cssJson);
        if( mtop+$(this).height() > winh-20 )
        {
            mtop = 0;
            $(this).css({top:mtop+'px'});
        }
    });
}

function cancelFormBox( formboxTab )
{
    if( formboxTab )
    {
        $('#formbox'+formboxTab).remove();
    }
    else
    {
        $('.formbox').remove();
    }
}


function adminLeftMenuToggle(item) {
    item=='metarecord'?$('.adminMetarecordItem').show(500):$('.adminMetarecordItem').hide(500);
	item=='misc'?$('.adminMiscItem').show(500):$('.adminMiscItem').hide(500);
	item=='products'?$('.adminProductsItem').show(500):$('.adminProductsItem').hide(500);
    item=='work'?$('.adminWorkItem').show(500):$('.adminWorkItem').hide(500);
	item=='settings'?$('.adminSettingsItem').show(500):$('.adminSettingsItem').hide(500);
	item=='clinical'?$('.adminClinicalItem').show(500):$('.adminClinicalItem').hide(500);
	item=='shelter'?$('.adminShelterItem').show(500):$('.adminShelterItem').hide(500);
        item=='animal'?$('.adminAnimalItem').show(500):$('.adminAnimalItem').hide(500);
	item=='financial'?$('.adminFinancialItem').show(500):$('.adminFinancialItem').hide(500);
    item=='templates'?$('.adminTemplateItem').show(500):$('.adminTemplateItem').hide(500);   
    item=='integration'?$('.adminIntegrationItem').show(500):$('.adminIntegrationItem').hide(500);   
    item=='resource'?$('.adminResourceItem').show(500):$('.adminResourceItem').hide(500); 
	setTimeout('layout();',550);
}

function reportingLeftMenuToggle(item) {
	item=='misc'?$('#reportingMenuMisc').show(500):$('#reportingMenuMisc').hide(500);
        item=='financialprocedure'?$('#reportingMenuFinProc').show(500):$('#reportingMenuFinProc').hide(500);
        item=='inventory'?$('#reportingMenuInventory').show(500):$('#reportingMenuInventory').hide(500);
        item=='crm'?$('#reportingMenuCRM').show(500):$('#reportingMenuCRM').hide(500);
        item=='sales'?$('#reportingMenuSales').show(500):$('#reportingMenuSales').hide(500);
	item=='financial'?$('#reportingMenuFinancial').show(500):$('#reportingMenuFinancial').hide(500);
        item=='reminders'?$('#reportingReminder').show(500):$('#reportingReminder').hide(500);
	setTimeout('layout();',550);
}

function lockdownBoxBackground() {
	var currentColor=$('#lockdown_inner').css('backgroundColor');
	if(currentColor=='rgb(170, 170, 255)') { $('#lockdown_inner').animate({backgroundColor:'rgb(170, 255, 170)'},2500); }
	else if(currentColor=='rgb(170, 255, 170)') { $('#lockdown_inner').animate({backgroundColor:'rgb(255, 170, 170)'},2500); }
	else if(currentColor=='rgb(255, 170, 170)') { $('#lockdown_inner').animate({backgroundColor:'rgb(255, 255, 170)'},2500); }
	else if(currentColor=='rgb(255, 255, 170)') { $('#lockdown_inner').animate({backgroundColor:'rgb(170, 170, 255)'},2500); }
	lockdownBoxColorTimer=setTimeout('lockdownBoxBackground();',5000);
}

function nl2br(text) {
	text = escape(text);
	re_nlchar='';
	if(text.indexOf('%0D%0A') > -1) {
		re_nlchar = /%0D%0A/g ;
	}else if(text.indexOf('%0A') > -1) {
		re_nlchar = /%0A/g ;
	}else if(text.indexOf('%0D') > -1) {
		re_nlchar = /%0D/g ;
	}
	return unescape( text.replace(re_nlchar,'<br />') );
}

function ucwords(str) {
	return (str+'').replace(/^(.)|\s(.)/g, function ( $1 ) { return $1.toUpperCase( ); } );
}

function md5(str) {
    // Calculate the md5 hash of a string  
    // 
    // version: 909.322
    // discuss at: http://phpjs.org/functions/md5
    // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
    // + namespaced by: Michael White (http://getsprink.com)
    // +    tweaked by: Jack
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // -    depends on: utf8_encode
    // *     example 1: md5('Kevin van Zonneveld');
    // *     returns 1: '6e658d4bfcb59cc13f96c14450ac40b9'
    var xl;

    str = ( typeof str == "object" || typeof str == "array" )?JSON.stringify(str):str;

    var rotateLeft = function (lValue, iShiftBits) {
        return (lValue<<iShiftBits) | (lValue>>>(32-iShiftBits));
    };

    var addUnsigned = function (lX,lY) {
        var lX4,lY4,lX8,lY8,lResult;
        lX8 = (lX & 0x80000000);
        lY8 = (lY & 0x80000000);
        lX4 = (lX & 0x40000000);
        lY4 = (lY & 0x40000000);
        lResult = (lX & 0x3FFFFFFF)+(lY & 0x3FFFFFFF);
        if (lX4 & lY4) {
            return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
        }
        if (lX4 | lY4) {
            if (lResult & 0x40000000) {
                return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
            } else {
                return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
            }
        } else {
            return (lResult ^ lX8 ^ lY8);
        }
    };

    var _F = function (x,y,z) { return (x & y) | ((~x) & z); };
    var _G = function (x,y,z) { return (x & z) | (y & (~z)); };
    var _H = function (x,y,z) { return (x ^ y ^ z); };
    var _I = function (x,y,z) { return (y ^ (x | (~z))); };

    var _FF = function (a,b,c,d,x,s,ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_F(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };

    var _GG = function (a,b,c,d,x,s,ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_G(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };

    var _HH = function (a,b,c,d,x,s,ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_H(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };

    var _II = function (a,b,c,d,x,s,ac) {
        a = addUnsigned(a, addUnsigned(addUnsigned(_I(b, c, d), x), ac));
        return addUnsigned(rotateLeft(a, s), b);
    };

    var convertToWordArray = function (str) {
        var lWordCount;
        var lMessageLength = str.length;
        var lNumberOfWords_temp1=lMessageLength + 8;
        var lNumberOfWords_temp2=(lNumberOfWords_temp1-(lNumberOfWords_temp1 % 64))/64;
        var lNumberOfWords = (lNumberOfWords_temp2+1)*16;
        var lWordArray=new Array(lNumberOfWords-1);
        var lBytePosition = 0;
        var lByteCount = 0;
        while ( lByteCount < lMessageLength ) {
            lWordCount = (lByteCount-(lByteCount % 4))/4;
            lBytePosition = (lByteCount % 4)*8;
            lWordArray[lWordCount] = (lWordArray[lWordCount] | (str.charCodeAt(lByteCount)<<lBytePosition));
            lByteCount++;
        }
        lWordCount = (lByteCount-(lByteCount % 4))/4;
        lBytePosition = (lByteCount % 4)*8;
        lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80<<lBytePosition);
        lWordArray[lNumberOfWords-2] = lMessageLength<<3;
        lWordArray[lNumberOfWords-1] = lMessageLength>>>29;
        return lWordArray;
    };

    var wordToHex = function (lValue) {
        var wordToHexValue="",wordToHexValue_temp="",lByte,lCount;
        for (lCount = 0;lCount<=3;lCount++) {
            lByte = (lValue>>>(lCount*8)) & 255;
            wordToHexValue_temp = "0" + lByte.toString(16);
            wordToHexValue = wordToHexValue + wordToHexValue_temp.substr(wordToHexValue_temp.length-2,2);
        }
        return wordToHexValue;
    };

    var x=[],
        k,AA,BB,CC,DD,a,b,c,d,
        S11=7, S12=12, S13=17, S14=22,
        S21=5, S22=9 , S23=14, S24=20,
        S31=4, S32=11, S33=16, S34=23,
        S41=6, S42=10, S43=15, S44=21;

    str = this.utf8_encode(str);
    x = convertToWordArray(str);
    a = 0x67452301; b = 0xEFCDAB89; c = 0x98BADCFE; d = 0x10325476;
    
    xl = x.length;
    for (k=0;k<xl;k+=16) {
        AA=a; BB=b; CC=c; DD=d;
        a=_FF(a,b,c,d,x[k+0], S11,0xD76AA478);
        d=_FF(d,a,b,c,x[k+1], S12,0xE8C7B756);
        c=_FF(c,d,a,b,x[k+2], S13,0x242070DB);
        b=_FF(b,c,d,a,x[k+3], S14,0xC1BDCEEE);
        a=_FF(a,b,c,d,x[k+4], S11,0xF57C0FAF);
        d=_FF(d,a,b,c,x[k+5], S12,0x4787C62A);
        c=_FF(c,d,a,b,x[k+6], S13,0xA8304613);
        b=_FF(b,c,d,a,x[k+7], S14,0xFD469501);
        a=_FF(a,b,c,d,x[k+8], S11,0x698098D8);
        d=_FF(d,a,b,c,x[k+9], S12,0x8B44F7AF);
        c=_FF(c,d,a,b,x[k+10],S13,0xFFFF5BB1);
        b=_FF(b,c,d,a,x[k+11],S14,0x895CD7BE);
        a=_FF(a,b,c,d,x[k+12],S11,0x6B901122);
        d=_FF(d,a,b,c,x[k+13],S12,0xFD987193);
        c=_FF(c,d,a,b,x[k+14],S13,0xA679438E);
        b=_FF(b,c,d,a,x[k+15],S14,0x49B40821);
        a=_GG(a,b,c,d,x[k+1], S21,0xF61E2562);
        d=_GG(d,a,b,c,x[k+6], S22,0xC040B340);
        c=_GG(c,d,a,b,x[k+11],S23,0x265E5A51);
        b=_GG(b,c,d,a,x[k+0], S24,0xE9B6C7AA);
        a=_GG(a,b,c,d,x[k+5], S21,0xD62F105D);
        d=_GG(d,a,b,c,x[k+10],S22,0x2441453);
        c=_GG(c,d,a,b,x[k+15],S23,0xD8A1E681);
        b=_GG(b,c,d,a,x[k+4], S24,0xE7D3FBC8);
        a=_GG(a,b,c,d,x[k+9], S21,0x21E1CDE6);
        d=_GG(d,a,b,c,x[k+14],S22,0xC33707D6);
        c=_GG(c,d,a,b,x[k+3], S23,0xF4D50D87);
        b=_GG(b,c,d,a,x[k+8], S24,0x455A14ED);
        a=_GG(a,b,c,d,x[k+13],S21,0xA9E3E905);
        d=_GG(d,a,b,c,x[k+2], S22,0xFCEFA3F8);
        c=_GG(c,d,a,b,x[k+7], S23,0x676F02D9);
        b=_GG(b,c,d,a,x[k+12],S24,0x8D2A4C8A);
        a=_HH(a,b,c,d,x[k+5], S31,0xFFFA3942);
        d=_HH(d,a,b,c,x[k+8], S32,0x8771F681);
        c=_HH(c,d,a,b,x[k+11],S33,0x6D9D6122);
        b=_HH(b,c,d,a,x[k+14],S34,0xFDE5380C);
        a=_HH(a,b,c,d,x[k+1], S31,0xA4BEEA44);
        d=_HH(d,a,b,c,x[k+4], S32,0x4BDECFA9);
        c=_HH(c,d,a,b,x[k+7], S33,0xF6BB4B60);
        b=_HH(b,c,d,a,x[k+10],S34,0xBEBFBC70);
        a=_HH(a,b,c,d,x[k+13],S31,0x289B7EC6);
        d=_HH(d,a,b,c,x[k+0], S32,0xEAA127FA);
        c=_HH(c,d,a,b,x[k+3], S33,0xD4EF3085);
        b=_HH(b,c,d,a,x[k+6], S34,0x4881D05);
        a=_HH(a,b,c,d,x[k+9], S31,0xD9D4D039);
        d=_HH(d,a,b,c,x[k+12],S32,0xE6DB99E5);
        c=_HH(c,d,a,b,x[k+15],S33,0x1FA27CF8);
        b=_HH(b,c,d,a,x[k+2], S34,0xC4AC5665);
        a=_II(a,b,c,d,x[k+0], S41,0xF4292244);
        d=_II(d,a,b,c,x[k+7], S42,0x432AFF97);
        c=_II(c,d,a,b,x[k+14],S43,0xAB9423A7);
        b=_II(b,c,d,a,x[k+5], S44,0xFC93A039);
        a=_II(a,b,c,d,x[k+12],S41,0x655B59C3);
        d=_II(d,a,b,c,x[k+3], S42,0x8F0CCC92);
        c=_II(c,d,a,b,x[k+10],S43,0xFFEFF47D);
        b=_II(b,c,d,a,x[k+1], S44,0x85845DD1);
        a=_II(a,b,c,d,x[k+8], S41,0x6FA87E4F);
        d=_II(d,a,b,c,x[k+15],S42,0xFE2CE6E0);
        c=_II(c,d,a,b,x[k+6], S43,0xA3014314);
        b=_II(b,c,d,a,x[k+13],S44,0x4E0811A1);
        a=_II(a,b,c,d,x[k+4], S41,0xF7537E82);
        d=_II(d,a,b,c,x[k+11],S42,0xBD3AF235);
        c=_II(c,d,a,b,x[k+2], S43,0x2AD7D2BB);
        b=_II(b,c,d,a,x[k+9], S44,0xEB86D391);
        a=addUnsigned(a,AA);
        b=addUnsigned(b,BB);
        c=addUnsigned(c,CC);
        d=addUnsigned(d,DD);
    }

    var temp = wordToHex(a)+wordToHex(b)+wordToHex(c)+wordToHex(d);

    return temp.toLowerCase();
}

function getBloodyDateFFS( date ) {
	var d = date?date:new Date();
    return getDateOf( d );
}

function getBloodyTimeFFS( date ) {
	var d = date?date:new Date();
	return getTimeOf( d );	
}
function getServerTime() {
	var d = new Date();
    return getTimeOf( d ) - timeLocalServerDifference;
}
function getDateOf( date )
{
	var a_p = "";
	var curr_hour = date.getHours();
	if(curr_hour < 12) {
		a_p = "AM";
	}
	else {
		a_p = "PM";
	}
	if(curr_hour == 0) {
		curr_hour = 12;
	}
	if(curr_hour > 12) {
		curr_hour = curr_hour - 12;
	}

	var curr_min = date.getMinutes();

	curr_min = curr_min + "";

	if(curr_min.length == 1) {
		curr_min = "0" + curr_min;
	}

	return(curr_hour+":"+curr_min+" "+a_p);    
}

function getTimeOf( date ) {
	return date.getTime();	
}

function get_templatecustomargs(tab)
{
    var getargs="";
    $('.customfields'+tab).each(function(){getargs+=(this.name+"="+this.value+"&amp;");});
    return getargs;
}

function jax_attach(url,query,obj,insertAction)
{
    jaxmanager.addRequest(obj,{
        'url':url,
        'method':insertAction, 
        'args':query
    });
}

function mouseScrollList(event) {
	var delta = 0;
	if(event.originalEvent.wheelDelta) delta=event.originalEvent.wheelDelta/120;
	if(event.originalEvent.detail) delta=-event.originalEvent.detail/3;
	if(delta<0) $('#leftlistnext').trigger('click');
	else $('#leftlistprev').trigger('click');
	return false;
}

function getPostString(classname) {
	var buf='';
	$('.'+classname).each(function(){
		if(this.name) {
			if(this.type=='file' || this.type=='image' || this.type=='reset') {
				// Cant handle these types
			}
			if(this.type=='checkbox' || this.type=='radio') {
				if(this.checked) {
					buf+=fixedEncodeURI(this.name)+'='+fixedEncodeURI(this.value)+'&';
				}
			}
			else {
				buf+=fixedEncodeURI(this.name)+'='+fixedEncodeURI(this.value)+'&';
			}
		}
	});
	return buf;
}

function getArgString( obj )
{
    return jQuery.param( obj );
}

function getInputsWithin( selectorstring ) {
	var inputs = [];
	$(''+selectorstring+' input,'+selectorstring+' select,'+selectorstring+' textarea').each(function(){
		if(this.name) {
			if(this.type=='file' || this.type=='image' || this.type=='reset' || $(this).is(':disabled') ) {
				
			}
			else if(this.type=='checkbox' || this.type=='radio') {
				if(this.checked) {
					 inputs[this.name] = this.value;
				}
			}
			else if(this.type=='textarea') {
                            var that = $(this);
                            if( $('#'+this.id+'_parent.mceEditor',that.parent()).length > 0 )
                            {
                                inputs[this.name] = that.html();
                            }
                            else if( $('#cke_'+this.id+'',that.parent()).length > 0 )
                            {
                                inputs[this.name] = CKEDITOR.instances[this.id].getData()
                            }
                            else
                                inputs[this.name] = that.val();
			}
			else {
                inputs[this.name] = this.value;
			}
		}
	});
	return $.extend({}, inputs);
}



string = {};

string.repeat = function(string, count)
{
    return new Array(count+1).join(string);
}

string.count = function(string)
{
    var count = 0;

    for (var i=1; i<arguments.length; i++)
    {
        var results = string.match(new RegExp(arguments[i], 'g'));
        count += results ? results.length : 0;
    }

    return count;
}

array = {};

array.merge = function(arr1, arr2)
{
    for (var i in arr2)
    {
        if (arr1[i] && typeof arr1[i] == 'object' && typeof arr2[i] == 'object')
            arr1[i] = array.merge(arr1[i], arr2[i]);
        else
            arr1[i] = arr2[i]
    }

    return arr1;
}

array.print = function(obj)
{
    var arr = [];
    $.each(obj, function(key, val) {
        var next = key + ": ";
        next += $.isPlainObject(val) ? array.print(val) : val;
        arr.push( next );
      });

    return "{ " +  arr.join(", ") + " }";
}

node = {};

node.objectify = function(node, params)
{
    if (!params)
        params = {};

    if (!params.selector)
        params.selector = "*";

    if (!params.key)
        params.key = "name";

    if (!params.value)
        params.value = "value";

    var o = {};
    var indexes = {};

    $(node).find(params.selector+"["+params.key+"]").each(function()
    {
        var type= $(this).attr('type');
        if( ( type == 'checkbox' || type == 'radio' ) && $(this).not(':checked').length != 0 )
        {
            return;
        }
        var name = $(this).attr(params.key),
            value = $(this).attr(params.value);
        if( value==undefined )
        {
            return;
        }

        var obj = $.parseJSON("{"+name.replace(/([^\[]*)/, function()
        {
            return '"'+arguments[1]+'"';
        }).replace(/\[(.*?)\]/gi, function()
        {
            if (arguments[1].length == 0)
            {
                var index = arguments[3].substring(0, arguments[2]);
                indexes[index] = indexes[index] !== undefined ? indexes[index]+1 : 0;

                return ':{"'+indexes[index]+'"';
            }
            else
                return ':{"'+arguments[1]+'"';
        })+':"'+value.replace(/[\\"]/gi, function()
        {
            return "\\"+arguments[0]; 
        })+'"'+string.repeat('}', string.count(name, ']'))+"}");

        o = array.merge(o, obj);
    });

    return o;
}

function convertToPostValues( resultSet )
{
	resultSet = $.makeArray( resultSet );
    for( name in resultSet )
    {
        buf+=fixedEncodeURI(name)+'='+fixedEncodeURI(resultSet[name])+'&';
    }
}

function submitForm(formSelector, callback) {
    var form = $(formSelector);
    var formData = new FormData($(formSelector)[0]);

    var url = form.attr('action');
    if (typeof url === 'undefined') {
        throw 'Form needs an action specified';
    }

    var type = form.attr('type');
    if (typeof type === 'undefined') {
        type = 'post';
    }

    $('#coverblock').show();
    $('#loading').fadeIn('fast');

    $.ajax({
        url: url,
        type: type,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (typeof callback !== 'undefined') {
                callback(data);
            }
        },
        error: function(xhr, err) {
            console.log('Error submitting the form - ' + err);
        },
        complete: function(){
            $('#loading').fadeOut('fast');
            $('#coverblock').data('timescalled', 0).hide();
        }
    });
}

function submitAndReplaceForm(formSelector) {
    submitForm(formSelector, function(data) {
        $(formSelector).replaceWith(data);
        rejigFormBox();
    });
}

//ensures square brackets remain when url is encoded
function fixedEncodeURI(str) {
    return encodeURIComponent(str).replace(/%5B/g, '[').replace(/%5D/g, ']');
}

function getPostWithinString( selectorstring, excludedNames ) {
    var buf='';
    selectorstring = selectorstring.split(",");
    if (excludedNames === undefined) {
        excludedNames = [];
    }
    for(var i =0; i < selectorstring.length; i++ )
    {        
	$(''+selectorstring[i]+' input,'+selectorstring[i]+' select,'+selectorstring[i]+' textarea').each(function(){
		if(this.name && ($.inArray(this.name, excludedNames) == -1)) {
			if(this.type=='file' || this.type=='image' || this.type=='reset' || $(this).is(':disabled') ) {
				
			}
			else if(this.type=='checkbox' || this.type=='radio') {
				if(this.checked) {
					buf+=fixedEncodeURI(this.name)+'='+fixedEncodeURI(this.value)+'&';
				}
			}
			else if(this.type=='textarea') {
                            var that = $(this);
                            if( $('#'+this.id+'_parent.mceEditor',that.parent()).length > 0 )
                            {
                                buf+=fixedEncodeURI(this.name)+'='+fixedEncodeURI(that.html())+'&';
                            }
                            else if( $('#cke_'+this.id+'',that.parent()).length > 0 )
                            {
                                buf+=fixedEncodeURI(this.name)+'='+fixedEncodeURI(CKEDITOR.instances[this.id].getData())+'&';
                            }
                            else
                                buf+=fixedEncodeURI(this.name)+'='+fixedEncodeURI(that.val())+'&';
			}
			else {
				buf+=fixedEncodeURI(this.name)+'='+fixedEncodeURI(this.value)+'&';
			}
		}
	});
    }
    return buf;
}

function getPostAsObject(url) {
    // this is in order to split a url string into an object
    // this is useful for when the request url is too long and posting an object for printwin

    //Now accommodates arrays such as "a[]=1&a[]=2" (referenced from https://stackoverflow.com/a/5713807)
    var setValue = function(root, path, value) {
        if (path.length > 1) {
            var dir = path.shift();
            if (typeof root[dir] == 'undefined') {
                root[dir] = path[0] == '' ? [] : {};
            }

            arguments.callee(root[dir], path, value);
        } else {
            if (root instanceof Array) {
                root.push(value);
            } else {
                root[path] = value;
            }
        }
    };

    var request = url.split("&");
    var obj = {};
    for (var i = 0; i < request.length; i++) {
        var valuePair = request[i].split("=");
        var key = decodeURIComponent(valuePair[0]);
        var value = decodeURIComponent(valuePair[1]);

        if (key == "") continue;

        var path = key.match(/(^[^\[]+)(\[.*\]$)?/);
        var first = path[1];
        if (path[2]) {
            //case of 'array[level1]' || 'array[level1][level2]'
            path = path[2].match(/(?=\[(.*)\]$)/)[1].split('][')
        } else {
            //case of 'name'
            path = [];
        }
        path.unshift(first);

        setValue(obj, path, value);
    }
    return obj;
}

function makeSortable(id)
{
    var item = top.g(id);
    if(item)
    {
        top.ts_makeSortable(item);
        $(item).find('a').attr('tabindex',-1)
    }
    delete item;
}

function addslashes(str) {
    str=str.replace(/\\/g,'\\\\');
    str=str.replace(/\'/g,'\\\'');
    str=str.replace(/\"/g,'\\"');
    str=str.replace(/\0/g,'\\0');
    return str;
}
function stripslashes(str) {
    str=str.replace(/\\'/g,'\'');
    str=str.replace(/\\"/g,'"');
    str=str.replace(/\\0/g,'\0');
    str=str.replace(/\\\\/g,'\\');
    return str;
}

function cloneObject(source) {
    for (i in source) {
        if (typeof source[i] == 'source') {
            this[i] = new cloneObject(source[i]);
        }
        else{
            this[i] = source[i];
	}
    }
}

function adjustRowOrderValues(tab,notOriginal)
{
    var order=0;
    $('.financialitem').each(function(){
        var that = $(this);
        if(!that.hasClass('header'))
        {
            $('#pr-order-'+that.attr('item_row')+'-'+that.attr('tab')).val(order);
            if( !notOriginal )
            {
               $('#row'+that.attr('item_row')+'-'+that.attr('tab')).data('originalOrder',order)
            }
            order++;
        }
        delete that;
    });
}

function keepInRange(inputField,min,max)
{
    if(inputField)
    {
        if(inputField.value < min)
        {
            inputField.value = min;
        }

        if(inputField.value > max)
        {
            inputField.value = max;
        }
    }
}

function keepInRangeNew( inputField , val1 , val2 )
{
    var min = Math.min( val1 , val2 );
    var max = Math.max( val1 , val2 );
    keepInRange( inputField , min , max );
}

function eftpos(transaction,tab,terminal)
{
	if(!g('eftpos'))
	{
		element=document.createElement('div');
		element.id='eftpos';
		g('ezydesk').appendChild(element);
		g('eftpos').innerHTML='<div>Sending to Pinpad...</div>';
	}

	if(g('eftpos'))
	{
		jax('core/main/get.php','action=eftposstatus&amp;tab='+tab+'&amp;paymenttransaction_id='+transaction+'&amp;terminal='+terminal,'eftpos');

		$('#eftpos').show();

		winh=parseInt(document.body.offsetHeight);
		winw=parseInt(document.body.offsetWidth);

		mleft=(parseInt(document.body.offsetWidth)-g('eftpos').offsetWidth)/2;
		mtop=(parseInt(document.body.offsetHeight)-g('eftpos').offsetHeight)/2;

		$('#eftpos').css({left:mleft+'px',top:mtop+'px'});
	}
}



//Returns true if it is a DOM element    
function isElement( theItemToTest ){
  return (
        typeof HTMLElement === "object" ? theItemToTest instanceof HTMLElement : //DOM2
        typeof theItemToTest === "object" && theItemToTest.nodeType === 1 && typeof theItemToTest.nodeName === "string"
    );
}

function truncate( theString , length )
{
    if( theString.length > 30 )
    {
        theString = theString.substring(0,length-3)+'...';
    }
    return theString;
}

function xeroCallback()
{
    top.refresh_jax('.xeroConnectButton');
    <!--top.refresh_jax('#setupWizard');--> 
}

function provetEnrolCallback()
{
    top.refresh_jax('.provetEnrolButton');
}

function loadLinkSearchTable(searchString, tab, options)
{
    options["searchString"] = searchString;
    top.jaxnew('/modules/admin/productsupplier/_integratedProductSupplierSearch.php',
    {args:{
        tab: tab,
        options: options,
        searchString: searchString
        },
    target: 'linkProductSupplierSearch'+tab
    });
}

function loadLinkProductSupplier(tab, options)
{
    top.jaxnew('/modules/admin/productsupplier/jaxForm.php',
    {
        args : { 
            tab: tab,
            options : options
        },
        target: 'linkProductSupplierRecord'+tab
    });
}

/*
function loadShelterListManager()
{ 
    $( ".dragableArea" ).listManager( { 
            accordian : { active : false , autoHeight : false , collapsible : true } , 
            draggable : { 
                cursorAt : { left : 5 } , 
                zIndex: 99999 ,
                revert : true,
                start: function(event, ui) { 
                    $(this).addClass("draggingTheAnimal"); 
                },
                stop: function(event, ui) { $(this).removeClass("draggingTheAnimal"); }
            } ,                
            droppable : { 
                appliedElements : '.shelterResourceContainer' ,
                drop : function( event, ui ){
                    var animal = $( ui.draggable );
                    var animal_id = animal.data('animal_id');
                    var shelterResource = $( this );
                    $( this ).addClass( "ui-state-highlight" );
                    if( shelterResource.data('shelterresource_id') !=  animal.data('shelterresource_id') )
                    {
                        animal.remove();
                        top.jax('modules/shelter/set/moveAnimal.php','animal_id='+animal_id+'&amp;shelterresource_id='+shelterResource.data('shelterresource_id')+'&amp;'+getPostWithinString('#toolbar'))
                        return true;
                    }
                    else
                    {    
                        $( this ).removeClass( "ui-state-highlight" );
//                        top.refresh_jax('#shelterResource'+shelterResource.data('shelterresource_id'));
                    }
                } 
            }
        } );
}
*/

var theDateFormat = '';
jQuery.fn.ezyDatePicker = function( options ) {
	var defaults = {changeMonth:true,firstDay:0,changeYear:true,dateFormat:theDateFormat,constrainInput:false};
	this.each( function(){
        if( !$(this).attr('disabled') )
        {
            if( options == "disable" || options == "enable"  )
            {
                $(this).datepicker( options );
            }
            else
            {
                $(this).datepicker( $.extend(defaults,options) );
            }
        }
	});
    return this;
}


function mondaysOnly(date) {
  return [ ( parseInt(date.getDay()) == 1 ) ];
}


function validateExcludedFromMarkup(tab)
{   
    var isPurchased = parseInt($('#rtab'+tab+'details input:checked[name=productdata_ispurchased]').val());
    if( isPurchased != 1)
    {
        var yesExcludeFromMarkup =$('#rtab'+tab+'details span.yesOption input[name=productdata_hasmarkup]:not(:checked)');
        if( yesExcludeFromMarkup.length )
        {
            yesExcludeFromMarkup.click();
            top.msg('Products which are not bought should be excluded from markup. Please check this field as it may have changed. ',1000,'warning');
        }
    }
}

function canSaveCancelAppointment(idFieldSelector,tabNum)
{
    var cancelOption = $('#cancelAppointmentConfirmDiv'+tabNum+' input[name=canceloption]:checked').val();
    if(cancelOption == 1)
    {
        if($(idFieldSelector).val() == 0)
        {
            $('#cancelAppointmentConfirmDiv'+tabNum+' [name=canCancel]').val(0);
        } 
        else
        {
            $('#cancelAppointmentConfirmDiv'+tabNum+' [name=canCancel]').val(1);
        }
    }
    else if(cancelOption == 2)
    {
        if($('#appointmentdata_cancellationreasontext').val() == "")
        {
            $('#cancelAppointmentConfirmDiv'+tabNum+' [name=canCancel]').val(0);
        } else {
            $('#cancelAppointmentConfirmDiv'+tabNum+' [name=canCancel]').val(1);
        } 
    }
}
function FitToContent(id, maxHeight)
{
   var text = id && id.style ? id : document.getElementById(id);
   if ( !text )
      return;

   var adjustedHeight = text.clientHeight;
   if ( !maxHeight || maxHeight > adjustedHeight )
   {
      adjustedHeight = Math.max(text.scrollHeight, adjustedHeight);
      if ( maxHeight )
         adjustedHeight = Math.min(maxHeight, adjustedHeight);
      if ( adjustedHeight > text.clientHeight )
         text.style.height = adjustedHeight + "px";
   }
}

jQuery(function($) {

  var _oldShow = $.fn.show;

  $.fn.show = function(speed, oldCallback) {
    return $(this).each(function() {
      var obj         = $(this),
          newCallback = function() {
            if ($.isFunction(oldCallback)) {
              oldCallback.apply(obj);
            }
            obj.trigger('afterShow');
          };

      // you can trigger a before show if you want
      obj.trigger('beforeShow');

      // now use the old function to show the element passing the new callback
      _oldShow.apply(obj, [speed, newCallback]);
    });
  }
});

function limitIt( value , value1 , value2 )
{
    var max = 0;
    var min = 0;
    if( value1 < value2 )
    {
        max = value2;
        min = value1;
    }
    else
    {
        max = value1;
        min = value2;
    }
    if( value < min )
    {
        value = min;
    }
    else if( value > max )
    {
        value = max;
    }
    return value;
}

function validateURI(uri)
{
    var input = 'http://';
    var input2 = 'https://';
    var lowercaseURI = uri.toLowerCase();
    if( (!(lowercaseURI.substring(0, input.length) === input)) || (!(lowercaseURI.substring(0, input2.length) === input2))  )
    {
        lowercaseURI = input+lowercaseURI;
    }
    return /^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(lowercaseURI);
}

function autoResize( jquerySelector ){
    var newheight;
    var newwidth;
    var element = $(jquerySelector);
    element.height(element.contents().height());
    element.width(element.contents().width());
}

var initGG = 0;
// google graph loading
// 0 - GG not loaded
// 1 - GG load attempt started
// 2 - GG loaded
var googleGR = false;
function initialiseGoogleGraphs()
{
    // --- load google graph only if there has never been an attempt to load it
    if( top.initGG == 0 )
    {
        google.load('visualization', '1.0', {'packages':['corechart'],callback:visualizationLoaded});
        top.googleGR = new GoogleGraphRegister();
        top.initGG = 1;
    }
}

function visualizationLoaded()
{
    top.initGG=2;
}

function GoogleGraphConfig( type ) {
    initialiseGoogleGraphs();
    this.type = type;
    switch( this.type )
    {
        case 'Bar':
        {
            this.renderOptions = this._barConfig;
            break;
        }
        case 'Line':
        {
            this.renderOptions = this._lineConfig;
            break;
        }
        default:
        {
            this.renderOptions = {};
        }
    }
    this.identifier = '';
    this.columns = [];
    this.rows = [];
}

GoogleGraphConfig.prototype._lineConfig = {
      is3D:true,
      width:600,
      height:300,
      hAxis:{title:''},
      curveType:'function',
      animation:{'duration': 100,'easing': 'linear'}
}

GoogleGraphConfig.prototype._barConfig = {
      width:600,
      height:300,
      hAxis:{title:''},
}

GoogleGraphConfig.prototype.addRow = function( args )
{
    this.rows[ this.rows.length ] = args;
}

GoogleGraphConfig.prototype.addColumn = function( args )
{
    this.columns[ this.columns.length ] = args;
}

GoogleGraphConfig.prototype.setTitle = function( title )
{
    this.renderOptions.title = title;
}
  
GoogleGraphConfig.prototype.setIdentifier = function( identifier )
{
    this.identifier = identifier;
}

function GoogleGraphRegister() {
    this.register = {};
}
GoogleGraphRegister.prototype.createGraph = function( args )
{
    if( top.initGG != 2 )
    {
        return false;
    }
    switch( args.type )
    {
        case 'Line':
        {
            var graphData = new google.visualization.DataTable();
            for( key in args.columns )
            {
                var column = args.columns[key];
                graphData.addColumn(column.type,column.title);        
            }
            for( key in args.rows )
            {
                graphData.addRow(args.rows[key]);       
            }
            var chart = new google.visualization.LineChart(document.getElementById(args.identifier));
            break;
        }
        case 'Bar':
        {
            var graphData = [[]];
            for( key in args.columns )
            {
                var column = args.columns[key];
                if( !args.renderOptions.hAxis.title )
                {
                   args.renderOptions.hAxis.title = column.title;
                }
                graphData[0][graphData[0].length]= column.title;    
            }
            for( key in args.rows )
            {
                graphData[graphData.length]= args.rows[key];
            }
            graphData = google.visualization.arrayToDataTable(graphData);
            var chart = new google.visualization.ColumnChart(document.getElementById(args.identifier));
            break;
        }
    }
    this.addGraph(args.identifier,chart);
    chart.draw(graphData, args.renderOptions );
}

GoogleGraphRegister.prototype.addGraph = function( graphElementId , graph )
{
    this.clearGraphs();
    this.register[graphElementId] = graph;
}

GoogleGraphRegister.prototype.hasGraph = function( graphElementId ) {
    return ( this.register[graphElementId] != null );
}

GoogleGraphRegister.prototype.removeGraph = function( graphElementId ) {
    this.register[graphElementId].clearChart();
    delete this.register[graphElementId];
}

GoogleGraphRegister.prototype.clearGraphs = function() {
    // --- remove graph if it is still in the register, but no longer inside the container
    for( key in this.register )
    {
        if( $.trim($('#'+key ).html()).length )
        {
            this.removeGraph( key );
        }
    }
}

function replaceLastWord( string , replacements )
{
    var splitString = string.trim().split(" ");
    var lastWord = splitString.pop();
    var lowerlastWord = lastWord.toLowerCase(); //creates a lower case version of the inputted string to make the function case-insensitive
    
    if(typeof replacements !== 'undefined' && Object.keys(replacements).length > 0 && replacements.hasOwnProperty(lowerlastWord) ) //change this line to convert to lower case in the check
    {
        //do a check on whether lastWord has upper case first letter, if it does, convert the replacement first letter to upper
        if (lastWord.charAt(0) !== lowerlastWord.charAt(0)){
           var replacementString = replacements[lowerlastWord.toLowerCase()];
           lowerlastWord = replacementString.charAt(0).toUpperCase() + replacementString.slice(1);
        } else{
            lowerlastWord = replacements[lowerlastWord.toLowerCase()];
        }
        lastWord = lowerlastWord;
    }
    return (splitString.length>0?(splitString.join(" ")+" "):"")+lastWord+(string[string.length-1]==' '?' ':'');
}


// --- SHORTHAND TEXTS ---------------------------------------------------------
var shorthandList = new Array();
var shorthandLastUpdated = 0;

// --- updates only a specified field's shorthand list
function updateShorthandFieldList(){
    jaxnew('clinical/ShortHandUpdate', {args:'shortHandLastUpdated='+shorthandLastUpdated});
}

// --- returns the shorthandList index, based on finding the correct class of the textarea that supports shorthand
function getValidShorthandFormClass(formClass){
    var returnClass = "";
    for (var i in formClass){
        switch(formClass[i]){
            case "shorthandPresentingProblem": returnClass = "presentingproblem"; break;
            case "shorthandHealthStatus": returnClass = "healthstatus"; break;
            case "shorthandPastPertinentHistory": returnClass = "pastpertinenthistory"; break;
            case "shorthandHistory": returnClass = "history"; break;
            case "shorthandPhysicalExam": returnClass = "physicalexam"; break;
            case "shorthandAssessment": returnClass = "assessment"; break;
            case "shorthandPlan": returnClass = "plan"; break;
            case "shorthandMedication": returnClass = "medication"; break;
            case "shorthandTherapeutic": returnClass = "therapeutic"; break;
            case "shorthandDiagnosticRequest": returnClass = "diagnosticrequest"; break;
            case "shorthandDiagnosticResult": returnClass = "diagnosticresult"; break;
            case "shorthandVaccination": returnClass = "vaccination"; break;
            case "shorthandInClinicNotes": returnClass = "inclinic"; break;
            case "shorthandHospitalNote": returnClass = "hospitalnote"; break;
            case "shorthandClientCommunication": returnClass = "clientcommunication"; break;
            case "shorthandVetCommunication": returnClass = "vetcommunication"; break;
            case "shorthandDocument": returnClass = "document"; break;
            default: returnClass = ""; break;
        }
        if (returnClass){
            break;
        }
    }
    return returnClass;
}

function shortHandReplaceHtml(ckEditor, formClass, viaNewline)
{
    viaNewline = (typeof viaNewline !== 'undefined') ? viaNewline : false;
    var input = (viaNewline === true) ? ckEditor.getSelection().getRanges()[0].getPreviousNode().getPrevious().getPrevious() : ckEditor.getSelection().getRanges()[0];
    var shorthandListName = getValidShorthandFormClass(formClass.split(' '));
    var translations = shorthandList[shorthandListName];
    var jqInput = (viaNewline === true) ? input : input.startContainer;

    // --- there are random scenarios where the range points to the body, even though the cursor is at the end of a line
    var inputType = (viaNewline === true) ? input.type : input.startContainer.type;
    if (inputType != CKEDITOR.NODE_TEXT) {
        return;
    }
    
    var cursorPosition = input.startOffset;
    if (viaNewline) {
        cursorPosition = jqInput.getText().length;
    }
    
    var jqInputVal = jqInput.getText();
    var isFocused = true;
    var startpos = isFocused ? cursorPosition : jqInputVal.length;

    if (startpos < 0){
        startpos = 0;
    }

    // --- find the last word
    var wordpos = 0;
    for (var i = ((startpos-1)<0)?0:startpos-1; i >= 0; i--){
        if (jqInputVal.charAt(i) == "<br/>" || jqInputVal.charAt(i) == "<br>" || jqInputVal.charAt(i) == '\xa0' || jqInputVal.charCodeAt(i) == 8203 || jqInputVal.charAt(i) == " "  || jqInputVal.charAt(i) == "\n") {
            wordpos = i+1;
            break;
        }
    }

    // --- replace the text
    var textBeforeWord = jqInputVal.slice(0,wordpos);
    var textWord = jqInputVal.slice(wordpos, startpos);
    var textAfterWord = jqInputVal.slice(startpos);
    var replacedWord = replaceLastWord(textWord, translations);
    if (viaNewline) {
        var originalCkRange = new CKEDITOR.dom.range(ckEditor.getSelection().getRanges()[0].getPreviousNode().getPrevious().getPrevious());
        originalCkRange.selectNodeContents(ckEditor.getSelection().getRanges()[0].getPreviousNode().getPrevious().getPrevious());
        originalCkRange.startOffset = textBeforeWord.length;
        originalCkRange.endOffset = originalCkRange.startOffset;
    }
    
    jqInput.setText(textBeforeWord+replacedWord+textAfterWord);
    
    // --- update cursor position
    if (!viaNewline) {
        var ckRange = ckRange = ckEditor.getSelection().getRanges()[0];
        ckRange.startOffset = (textBeforeWord.length + replacedWord.length);
        ckRange.endOffset = (textBeforeWord.length + replacedWord.length);
        ckEditor.getSelection().selectRanges( [ ckRange ] );
    }
    
    // --- check for input popup
    var replacedWordIndex = wordpos;
    var jqCurrentVal = ckEditor.getSelection().getRanges()[0].startContainer.getText();
    if (viaNewline) {
        jqCurrentVal = originalCkRange.startContainer.getText();
    } else {
        jqCurrentVal = ckEditor.getSelection().getRanges()[0].startContainer.getText();
    }
    var checkChar = jqCurrentVal.slice(replacedWordIndex+7, replacedWordIndex+8);
    
    if (checkChar == "[" && textWord != replacedWord) {
        // --- move cursor back to the beginning of #INPUT#[]
        // for newlines, select the previous node, then delete the newline that was inserted when Enter key was pressed 
        if (viaNewline) {
            ckEditor.getSelection().selectRanges( [ originalCkRange ] );
            ckEditor.getSelection().getRanges()[0].getNextNode().getNext().remove();
        } else {
            ckRange.startOffset = (replacedWordIndex);
            ckRange.endOffset = (replacedWordIndex);
            ckEditor.getSelection().selectRanges( [ ckRange ] );
        }
        
        var e = $.Event("keydown", { keyCode: 9 });
        $(ckEditor.editable().$).trigger(e);
        return false;
    }
}

function shortHandReplace(input, cursorPosition, formClass)
{
    var shorthandListName = getValidShorthandFormClass(formClass.split(' '));
    var translations = shorthandList[shorthandListName];
    var jqInput = $(input);
    var isFocused = jqInput.is(":focus");
    var startpos = isFocused?cursorPosition:jqInput.val().length;
    if (startpos < 0){
        startpos = 0;
    }

    // --- find the last word
    var wordpos = 0;
    for (var i = ((startpos-1)<0)?0:startpos-1; i >= 0; i--){
        if (jqInput.val().charAt(i) == " " || jqInput.val().charAt(i) == "\n"){
            wordpos = i+1;
            break;
        }
    }

    var textBeforeWord = jqInput.val().slice(0,wordpos);
    var textWord = jqInput.val().slice(wordpos, startpos);
    var textAfterWord = jqInput.val().slice(startpos);

    var replacedWord = replaceLastWord(textWord, translations);
    jqInput.val(textBeforeWord+replacedWord+textAfterWord);

    var hasReplaced = (textWord == replacedWord)?false:true;
    var hasInputField = true;
    var replacedWordIndex = wordpos;
    if( isFocused )
    {
        replacedWordIndex = replacedWord.indexOf("#INPUT#");
        replacedWordIndex -= replacedWord.slice(0, replacedWordIndex).split("\n").length-1;

        if(replacedWordIndex < 0)
        {
            hasInputField = false;
            replacedWordIndex = replacedWord.length;
        } else {
            replacedWordIndex += wordpos;
        }

        if (hasReplaced) {
            setCursorPosition(input, textBeforeWord.length + replacedWordIndex);
        }
    }

    var checkChar = jqInput.val().slice(replacedWordIndex+7, replacedWordIndex+8);
    if (hasInputField && hasReplaced && checkChar == "[") {
        setCursorPosition(input, replacedWordIndex-1);
        var e = $.Event("keydown", { keyCode: 9});
        $(".hasShorthandText").trigger(e);
        return false;
    }
    else if (hasInputField && hasReplaced) {
        if (input.setSelectionRange) {
            input.setSelectionRange(replacedWordIndex, replacedWordIndex + 7);
        } else {
            var r = input.createTextRange();
            r.collapse(true);
            r.moveEnd('character', replacedWordIndex);
            r.moveStart('character', replacedWordIndex + 7);
            r.select();
        }
        return false;
    } else {
        return true;
    }
}

/**
 * Recursively validates the question data input.
 * Each question must have at least one answer.
 * Input: The "..." from "#INPUT[...]".  (no brackets)
 */
function validateQuestionInput(input)
{
    var re = /([^\/\[\]]+)(\/.+)+/;
    var m = re.exec(input);

    // --- if input data has no match, it is broken
    if (m === null) {
        return false;
    }

    // --- iterate through each answer
    // if it contains any brackets, get the entire bracketed part
    if (m[2].indexOf("[") >= 0 || m[2].indexOf("]") >= 0 )
    {
        var bracketStack = [];
        var lastClosingBracketIndex = 0;
        for (var i=0; i <m[2].length; i++) {
            if (m[2][i] == "[") {
                bracketStack.push("[");
                continue;
            } else if (m[2][i] == "]") {

                if (bracketStack.pop() != "[") {
                    return;
                } else {
                    lastClosingBracketIndex = i+1;
                }
            }
        }

        if (bracketStack.length > 0) {
            return;
        }

        // -- recurse!
        var ansCurrent = m[2].substring(m[2].indexOf("[")+1, lastClosingBracketIndex-1);
        return(validateQuestionInput(ansCurrent));
    } else {
        var ansAll = m[2].split("/");
        var ansCounter = 0;
        for (var i = 0; i<ansAll.length; i++) {
            if (ansAll[i] != "") {
                return true;
            }
        }
        return false;
    }
    return true;
}

var billingRegex = /\$\$(.*)\$\$/g;
//Generates a tree structure based off #INPUT#[Question/Answer 1[Sub Question/Answer 1/Answer 2]/Answer 2]
function generateQuestionContent(formClass, input, cursorPosition, editorPopup, ckEditor) {
    var stack = []; //Parent stack
    var node = {caption: "", options: []}; //Tree of Objects.
    var buff = ""; //Buffer
    input[2] = input[2].replace(/]\s*]/,"]]");
    input[2] = input[2].replace("}","]]"); //Fix for framework automatically replacing ]] with } due to templ8 variables
    var arr = input[2].split("");
    var output = "";
    arr.forEach(function(val, index) {
        if(val == "[") {
            stack.push(node);
            node = {caption: buff, options: []};
            buff = "";
        } else if (val == "]") {
            if(buff !== "") {
                node.options.push(_getQuestionOption( buff ));
                buff = "";
            }
            var parent = stack.pop();
            if(typeof parent === "undefined") {
                return false; //This is used as the last closing bracket tries to get the parent, but it is the parent.
            }
            else {
                parent.options.push(node);
                node = parent;
            }
        } else if (val == "/") {
            if (buff !== "") {
                node.options.push(_getQuestionOption( buff ));
                buff = "";
            }
        } else {
            buff += val;
        }
    });

    // --- process any leftover buffer
    if(buff !== "") {
        node.options.push(_getQuestionOption( buff ));
        buff = "";
    }
    return generateQuestionPopup(formClass, node, cursorPosition, input, output, editorPopup, ckEditor);
}

function _getQuestionOption( buff )
{
    billingRegex.lastIndex = 0;
    var result = billingRegex.exec(buff);
    var config = {};
    if (result) {
        buff = buff.replace(result[0],'');
        var parts = result[1].split("*");
        config.productCode = parts[0];
        if (parts[1]) {
            config.quantity = parts[1];
        }
    }
    return {caption: buff, options: [],config:config};
}

function billItem(productCode,quantity,billingTriggerEle,identifier)
{
    if( identifier ) {//Clear whats there
        $('.addedBy'+identifier+'', billingTriggerEle).trigger('remove');
        $('.billingTriggerRow:not(.addedBy'+identifier+')', billingTriggerEle).each(function () {
            if ($('.idField', this).val() == 0) {
                $(this).trigger('remove');
            }
        });
    }
    jaxnew('Financial/AddBillingTriggerLine',{
        args:{
             lineNumber:$('.numberOfLines',billingTriggerEle).increment().val(),
             tab:$('[name=tab]',billingTriggerEle.parents('form')).val(),
             triggerIdentifier:'Template',
             recordUniqueifier:identifier,
             forclass:billingTriggerEle.data('forClass'),
             forid:billingTriggerEle.data('forId'),
             productCode:productCode,
             quantity:quantity
         },
        how:'before',
        target:$('.numberOfLines',billingTriggerEle).attr('id')
     } );
}

/**
 * Named event handler for generateQuestionPopup, so that we can specifically turn it off.
 * @param e
 * @returns {*}
 */
function evtReplaceQuestionPopup(e) {
    $(this).unbind(e);
    if (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 96 && e.keyCode <= 105) {
        var val = e.data.params.obj[e.keyCode - 48];
        var val2 = e.data.params.obj[e.keyCode - 96];
        var valOut;
        if (typeof val !== "undefined") {
            if (val.caption.slice(0, 1) != "'") {
                e.data.params.output += val.caption + ' ';
                valOut = val;
            }
        } else if (typeof val2 !== "undefined") {
            if (val2.caption.slice(0, 1) != "'") {
                e.data.params.output += val2.caption + ' ';
                valOut = val2;
            }
        } else {
            return false;
        }
        return replaceQuestionPopup(e.data.params.input, valOut, e.data.params.cursorPosition, e.data.params.formClass, e.data.params.output, e.data.params.editorPopup, e.data.params.ckEditor);
    }
}

function generateQuestionPopup(formClass, node, cursorPosition, input, output, editorPopup, ckEditor)
{
    $(".questionPopupDiv").remove();
    var obj;
    var x = 48;
    var html="<table style=\"width: 100%\">";
    var popupDiv = $(document.createElement('div'))
        .attr("class", 'questionPopupDiv')
        .css({
            'position': 'absolute',
            'left': '50%',
            'padding':'0px',
            'background': '#F1F1F1',
            'min-width': '200px',
            'border': '2px solid #33a2d2',
            'z-index': '100',
            'display': 'none'
        });
    var headerPopupDiv = $(document.createElement('div'))
        .attr("class", 'questionHeaderPopupDiv')
        .css({
            'padding':'0px',
            'background': '#303136',
            'margin': '0px'
        });

    if (typeof editorPopup !== "undefined") {
        popupDiv.css({
            'left': '35%',
            'top': '35%'
        });
        editorPopup.append(popupDiv);
        editorPopup.parent().find('.questionPopupDiv').append(headerPopupDiv);
        editorPopup.show();
    } else {
        $(".usingPickList").parent().append(popupDiv);
        $(".questionPopupDiv").append(headerPopupDiv);
    }

    if(typeof node.options === "undefined") {
        obj = node;
    } else {
        obj = node.options;
    }
    
    obj.forEach(function (val, index) {
        x++;
        if(typeof val.config === "undefined") {
            var extraBillingSymbol = '';
        } else {
            var extraBillingSymbol = ( val.config.productCode ? ' $':'')
        }
        val.caption = val.caption.trim();
        if (index == 0) {
            if (val.caption.slice(0,1) == "'" || val.caption.slice(0,1) == "‘") {
                var escapedquestion = val.caption.slice(1, -1);
                $(".questionHeaderPopupDiv").append("<h2 style=\"padding:5px 10px 5px 10px!important;\"><span style=\"margin-left:auto;font-size: 12px!important;display:inline-block;\">" + escapedquestion + extraBillingSymbol + "</span></h2>");
            } else {
                $(".questionHeaderPopupDiv").append("<h2 style=\"padding:5px 10px 5px 10px!important;\"><span style=\"margin-left:auto;font-size: 12px!important;display:inline-block;\">" + val.caption + extraBillingSymbol + "</span></h2>");
                output += val.caption + ' ';
            }
        } else {
            if (val.caption.slice(0,1) == "'" || val.caption.slice(0,1) == "‘") {
                var escapedanswer = val.caption.slice(1, -1);
                html += "<tr><td class=\"question" + index + "\" style=\"width: 100%; padding:0px 3px 4px 3px\"><label><span style=\"font-style:italic; color:#666\">" + index + ".&nbsp;</span>" + escapedanswer + extraBillingSymbol + "</label></td></tr>";
            } else {
                html += "<tr><td class=\"question" + index + "\" style=\"width: 100%; padding:0px 3px 4px 3px\"><label><span style=\"font-style:italic; color:#666\">" + index + ".&nbsp;</span>" + val.caption + extraBillingSymbol + "</label></td></tr>";

            }
            if (typeof ckEditor === "undefined") {
                $(this).on({
                    keydown: function (e) {
                    if (e.keyCode == 48 + index || e.keyCode == 96 + index) { //48->57 for top row. 96-105 for numpad.
                            $(".usingPickList").focus();
                            if (val.caption.slice(0, 1) != "'") {
                                output += val.caption + ' ';
                            }
                            return replaceQuestionPopup(input, val, cursorPosition, formClass, output, editorPopup, ckEditor );
                        }
                    }
                });
            }
        }
    });
    
    if (typeof ckEditor !== "undefined") {
        $(ckEditor.editable().$).off("keydown", { params: {obj:obj, formClass:formClass, node:node, cursorPosition:cursorPosition, input:input, output:output, editorPopup:editorPopup, ckEditor:ckEditor} }, evtReplaceQuestionPopup);
        $(ckEditor.editable().$).on("keydown", { params: {obj:obj, formClass:formClass, node:node, cursorPosition:cursorPosition, input:input, output:output, editorPopup:editorPopup, ckEditor:ckEditor} }, evtReplaceQuestionPopup);
    } else {
        $(this).on({
            keydown: function (e) {
            if (!(e.keyCode >= 48 && e.keyCode <= 57) && !(e.keyCode >= 96 && e.keyCode <= 105)) // Removes popup/Unbinds keys on any other key than 0-9
                {
                    $(".questionPopupDiv").remove();
                    $(this).unbind('keydown');
                    return true;
                }
            }
        });
    }
    
    html+="</table>";

    $(".questionPopupDiv").append(html);
    $(".question1").addClass("questionPopupSelected");

    obj.forEach(function (val, index) {
        if (index != 0) {
            $(".question" + index + "").hover(function () {
                $(".questionPopupSelected").removeClass("questionPopupSelected");
                $(this).addClass("questionPopupSelected");
            })
                .click(function (e) {
                    $(".usingPickList").focus();
                    if (val.caption.slice(0,1) != "'") {
                        output += val.caption + ' ';
                    }
                    return replaceQuestionPopup(input, val, cursorPosition, formClass, output, editorPopup, ckEditor );
                });
        }
    });

    //Sets margins based of current textbox side + generated box size.
    var widthOfBox = $('.questionPopupDiv').width();
    var widthOfInput = $('.usingPickList').width();
    var heightOfInput = $('.usingPickList').height();
    $(".questionPopupDiv").css({'margin': '-' + heightOfInput + 'px 0px 0px -'+widthOfBox/2+'px', 'max-width': ''+widthOfInput*0.6+'px'});
    $(".questionPopupDiv").show("fast");
    return false;
}

function replaceQuestionPopup(input, node, cursorPos, formClass, output, editorPopup, ckEditor ) {
    if(typeof node.config !== "undefined") {
        if (node.config.productCode) {
            var quantity = node.config.quantity!=null?node.config.quantity:1;
            var fullForm = $(formClass).parents('form');
            var form = $('.billingTriggerForm', fullForm);
            if( !form.length ) {
                msg('This record isn\'t billable, can\'t bill '+quantity+' * '+node.config.productCode+'!',1000,'warning');
            }
            billItem(node.config.productCode, quantity, form);
        }
    }
    $(".questionPopupDiv").remove();
    $(this).unbind('keydown');

    if(node.options.length) {
        generateQuestionPopup(formClass, node.options, cursorPos, input, output, editorPopup, ckEditor);
    }
    else {
        if (typeof ckEditor !== "undefined") {
            $(ckEditor.editable().$).removeClass('usingPickList');
            var ckRange = ckEditor.getSelection().getRanges()[0];
            ckRange.extractContents(true, false);
            var textObject = ckRange.startContainer;
            var text = textObject.getText();
            textObject.setText(text + ' ' + output);
            ckRange.endOffset += output.length;
            ckRange.collapse();
            ckEditor.getSelection().selectRanges( [ ckRange ] );
        } else {
            $(".hasShorthandText").val(function(index, value) {
                $(this).removeClass("usingPickList");
                return value.replace(input[0], output);
            });
            var hasShorthandInside = output.indexOf("#INPUT#");
            if (hasShorthandInside >= 0) {
                var newCursorPos = hasShorthandInside + cursorPos;
            } else {
                var newCursorPos = output.length + cursorPos;
            }
            setCursorPosition(formClass, newCursorPos);
        }
    }
    return false;
}
function processShowMores()
{
    $('.showMoreConstruct:not(.loaded)').each(function(){
        var detectorsPosition = $('.showMoreDetector',this).position();
        var contentsPosition = $('.showMoreContent',this).position();
        $(this).addClass('loaded');   
        var height = $(this).data('height');
        if( ( detectorsPosition.top - contentsPosition.top ) < height )
        {
            $(this).removeClass( 'hasHidden' );
            $('.showMoreContent',this).css('maxHeight','none');
        }
        else
        {
            $(this).addClass( 'hasHidden' );
            $('.showMoreContent',this).css('maxHeight',(height-$('.showMoreButton',this).height())+'px');
        }
        $('.showMoreDetector',this).hide();
    });
}

/* ========================================================
    PDF.JS Renderer
 ======================================================== */

var pdfDoc = null;  // --- pdf document being currently viewed

// --- queues the rendering of pages
function pdfQueueRenderPage(canvas, num)
{
    num = parseInt(num);
    if (canvas.data("rendering") == "true") {
        canvas.data("page-pending", num);
    } else {
        pdfRenderPage(canvas, num, 1);
    }
}

// --- renders the page number specified
function pdfRenderPage(canvas, num, scale)
{
    canvas.data("rendering", "true");

    pdfDoc.getPage(num).then(function (page)
    {
        // --- adjust canvas size
        canvas.parent().parent().css('height', '80vh');
        canvas.parent().css('height', '95%');
        canvas[0].height = canvas.parent().height()-25;
        var viewport = page.getViewport(canvas[0].height / page.getViewport(1).height);
        canvas.parent().parent().width(viewport.width+10);
        canvas[0].width = viewport.width;
        canvas.show();

        // --- render PDF page into canvas context
        var renderContext = {
            canvasContext: canvas[0].getContext("2d"),
            viewport: viewport
        };

        // --- run the next rendering when the current rendering is done
        var renderTask = page.render(renderContext);
        renderTask.promise.then(function() {
            // --- render signatures + adjust signature pad after pdf is rendered
            var sigPads = $('.sig-pad');
            sigPads.height(canvas[0].height);
            sigPads.width(canvas[0].width);
            $('.sig-pad-canvas').attr('height', (canvas[0].height));
            $('.sig-pad-canvas').attr('width', (canvas[0].width));

            if (canvas.data('free-write-mode') == "true") {
                sigPads.hide();
                $('#sig-pad-'+num).show();
                pdfRegenerateSignature(num);
            }

            // --- render next in queue (if any)
            canvas.data("rendering", "false");
            if (canvas.data("page-pending") != "") {
                pdfRenderPage(canvas.data("page-pending"));
                canvas.data("page-pending", "");
            }
        });

        rejigFormBox();
    });
}

// --- +/- page navigation
function pdfMovePage(canvas, move)
{
    var pageNum = parseInt(canvas.data("page-num"));
    pageNum += move;

    if (pageNum >  pdfDoc.numPages) {
        pageNum = pdfDoc.numPages;
        return;
    } else if (pageNum <= 0) {
        pageNum = 0;
        return;
    }
    $('.pdf-page-jump').val(pageNum);
    canvas.data("page-num", pageNum);
    pdfQueueRenderPage(canvas, pageNum);
}

// --- jump page navigation
function pdfChangePage(canvas, change)
{
    var pageNum = change;
    if (pageNum >  pdfDoc.numPages) {
        pageNum = pdfDoc.numPages;
        return;
    } else if (pageNum < 0) {
        pageNum < 0
        return;
    }
    $('.pdf-page-jump').val(pageNum);
    canvas.data("page-num", pageNum);
    pdfQueueRenderPage(canvas, pageNum);
}

// --- regenerate signature, given the page
function pdfRegenerateSignature(page) {
    var sigData = $('#sig-pad-data-'+page).attr('value');
    sigData = sigData?sigData:"[]";
    $('#sig-pad-'+page).signaturePad().regenerate($.parseJSON(sigData));
}

// --- toggles the free write mode
function pdfFreeWrite(canvas, buttonId) {
    var freeWriteMode = canvas.data('free-write-mode');

    // --- on
    if (freeWriteMode == "false" || !freeWriteMode) {
        var currentPage = canvas.data('page-num');
        canvas.data('free-write-mode', 'true');
        $('#' + buttonId + '  span').html("Hide");
        $('#sig-pad-'+currentPage).show();
        pdfRegenerateSignature(currentPage);
    // --- off
    } else {
        var currentPage = canvas.data('page-num');
        $('#sig-pad-'+currentPage).hide();
        $('#' + buttonId + '  span').html("Scribble");
        canvas.data('free-write-mode', 'false');
    }
}

function updateUserConfigSettingFilter_Array(filter, values) {
    jaxnew('User/UpdateUserConfigSettingFilter_Array', {
        args: '&filterName='+filter+'&filterValue='+JSON.stringify(getPostAsObject(values))
    });
}

function updateUserConfigSettingFilter(filter, value) {
    jaxnew('User/UpdateUserConfigSettingFilter', {
        args: '&filterName='+filter+'&filterValue='+value
    });
}

function updateUserConfigClass(configClass, configName, configValue)
{
    jaxnew('User/UpdateUserConfigClass', {
        args: '&configClass='+configClass+'&configName='+configName+'&configValue='+configValue,
        callback: (function(){ sidebarToggling = false; })
    });
}

function updateCustomUserConfigClass(configClass, configName, configValue, userId)
{
    jaxnew('User/UpdateUserConfigClassForUser', {
        args: '&configClass='+configClass+'&configName='+configName+'&configValue='+configValue+'&userId='+userId,
        callback: (function(){ sidebarToggling = false; })
    });
}

// --- Google Places API code
function fillInAddress() {
    var place =  autocomplete.getPlace();

    if(place != null) {
        var cleanComponents = [];
        place.address_components.forEach(function(component) {
            component.types.forEach(function(componentType) {
                cleanComponents[componentType] = component.long_name;
            });
        });

        var street1 = $('#physical_addressdata_street1'+tabnum);
        var street2 = $('#physical_addressdata_street2'+tabnum);
        var suburb = $('#physical_addressdata_suburb'+tabnum);
        var postcode = $('#physical_addressdata_postcode'+tabnum);
        var city = $('#physical_addressdata_city'+tabnum);
        var state = $('#physical_addressdata_state'+tabnum);
        var region = $('#physical_addressdata_region'+tabnum);
        var lat = $('#physical_addressdata_latitude'+tabnum);
        var lng = $('#physical_addressdata_longitude'+tabnum);

        street1.val(""); street2.val(""); suburb.val(""); postcode.val(""); city.val(""); state.val(""); region.val(""); lat.val(""); lng.val("");
        var str;
        var streetName = cleanComponents['route'];
        if('street_number' in cleanComponents) {
            var streetNum = cleanComponents['street_number']+" ";
            str = streetNum.concat(streetName);
        } else {
            str = streetName;
        }

        if('subpremise' in cleanComponents) {
            str = cleanComponents['subpremise'].concat("/", str);
        }

        street1.val(str); suburb.val(cleanComponents['sublocality']); postcode.val(cleanComponents['postal_code']); city.val(cleanComponents['locality']);
        state.val(cleanComponents['administrative_area_level_1']); region.val(cleanComponents['administrative_area_level_2']);
        lat.val(place.geometry.location.lat());
        lng.val(place.geometry.location.lng());
    }
}

function initAutocomplete(tabnumber) {
    tabnum = tabnumber;
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('physical_addressdata_street1'+tabnum)),
        {types: ['geocode']});

    autocomplete.addListener('place_changed', fillInAddress);
}
function geolocate(tabnum) {
    var placeSearch;
    initAutocomplete(tabnum);

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}

/*lookup product popup code*/
function lookupProductComplete(response)
{
    var errors = 0;
    var i = 0;
    for(i = 0; i < response.length; i++)
    {
        console.log("#"+response[i].rowId);
        var row = $("#"+response[i].rowId);
        var luAddButton = row.find(".theAddSingleProductButton");
        var luCheckbox = row.find("input[type=checkbox]");
        if( response[i].success == 1 )
        {
            luCheckbox.prop("disabled", true);
            luAddButton.prop('disabled',true);
            luAddButton.prop('value','ADDED');
        }
        else
        {
            errors++;
            luAddButton.prop('disabled', false);
            row.css('background-color','red');
            var recordPopupForm = row.closest('.recordPopupForm');
            recordPopupForm.scrollTop(recordPopupForm.scrollTop() - 50 + row.position().top);
            top.msg(response[i].error,0,'error');
        }
    }

    if(errors == 0)
    {
        top.msg("Successfully Added " + i + " products", 0, "success");
    }

}

function lookupProductNavigateToPage(pageNum, tab) {
    top.jaxnew(
        'Product/LookupProductTable',
        {
            target: 'lookupProductTable' + tab,
            args: 'tab=' + tab + '&pageNum=' + pageNum + '&' + getPostWithinString('#lookupProductSearchPane' + tab)
        }
    );
}

/**
 * On clicking the sidebar button, either shows the sidebar, or hides it all the way to the left.
 */
function toggleSidebar(e)
{
    if (sidebarToggling == true) { return; }
    sidebarToggling = true;
    if (!sidebarResizing && !sidebarResized) {
        var immediate = false;
        if (e.type == "doubletap") {
            immediate = true;
        }
        if (isSidebarVisible()) {
            $('#panes').trigger('closeSideBar', [false, immediate]);
            //$('#panes').trigger('closeSideBar'); // animated but delayed
            $('#toggleSidebarButtonText').html('<div class="iconWraper"><div class="iconContainer"><i class="icon icon-arrow-right12"></i></div><div class="clear"></div></div>');
        } else {
            $('#panes').trigger('openSideBar', [false, immediate]);
            //$('#panes').trigger('openSideBar'); // animated but delayed
            $('#toggleSidebarButtonText').html('<div class="iconWraper"><div class="iconContainer"><i class="icon icon-arrow-left12"></i></div><div class="clear"></div></div>');
        }
        panels();
    }
    sidebarResized = false;
}

/**
 *  Updates the sidebar's visibility.  Very similar to toggleSidebar(), except that it doesn't toggle settings.
 */
function updateSidebarVisibility()
{
    if (isSidebarVisible()) {
        $('#panes').trigger('openSideBar', [false, true]);
        //$('#panes').trigger('openSideBar'); // animated but delayed
        $('#toggleSidebarButtonText').html('<div class="iconWraper"><div class="iconContainer"><i class="icon icon-arrow-left12"></i></div><div class="clear"></div></div>');
    } else {
        $('#panes').trigger('closeSideBar', [false, true]);
        //$('#panes').trigger('closeSideBar'); // animated but delayed
        $('#toggleSidebarButtonText').html('<div class="iconWraper"><div class="iconContainer"><i class="icon icon-arrow-right12"></i></div><div class="clear"></div></div>');
    }
}

/**
 * Returns true if sidebar is visible
 * @returns {*}
 */
function isSidebarVisible()
{
    return getSidebarState();
}

/**
 * Returns the width of the sidebar
 */
function getSidebarWidth()
{
    return sidebarResizedX;
}

/**
 * Returns sidebar's visibility state
 */
function getSidebarState()
{
    return sidebarShow;
}

/**
 * Sets the sidebar's visibility state
 */
function setSidebarState(state)
{
    sidebarShow = state;
}

/**
 * Indicates that the user is currently resizing the sidebar
 */
function sidebarResizeStart(e)
{
    sidebarResizing = true;
    if (e.type == "touchstart") {
        $('#toggleSidebarButtonDragLine').css('margin-left', getSidebarWidth()+'px');
        
    }
}

/**
 * Mouse move listener for resizing the sidebar
 */
function sidebarResizeMouseMove(e)
{
    if (sidebarResizing) {
        if (e.type == "touchmove") {
            var inputX = e.touches[0].clientX;
            $('#toggleSidebarButtonDragLine').css('display', 'block');
        } else {
            var inputX = e.clientX;
            e.preventDefault();
        }

        if (inputX < sidebarMinX - sidebarEaseX) {
            inputX = sidebarMinX - sidebarEaseX;
        } else if (inputX > sidebarMaxX + sidebarEaseX) {
            inputX = sidebarMaxX + sidebarEaseX;
        }
        
        sidebarResizedX = inputX;
        sidebarPreviousX = inputX;
        sidebarResized = true;

        if (e.type == "touchmove") {
            if (inputX < sidebarMinX) {
                $('#toggleSidebarButtonDragLine').css('margin-left', sidebarMinX+'px');
            } else if (inputX > sidebarMaxX) {
                $('#toggleSidebarButtonDragLine').css('margin-left', sidebarMaxX+'px');
            } else {
                $('#toggleSidebarButtonDragLine').css('margin-left', inputX+'px');
            }
        } else {
            if (e.type != "touchmove") {
                sidebarResize();
            }
        }
    }
}

/**
 * Mouse up listener for resizing the sidebar.  Also handles the easing animation if the sidebar dimensions exceed threshold.
 */
function sidebarResizeEnd(e)
{
    if (sidebarResized && sidebarResizing) {
        $('#panes').trigger('openSideBar', [false, true, true]);
        setSidebarState(true);
        $('#toggleSidebarButtonText').html('<div class="iconWraper"><div class="iconContainer"><i class="icon icon-arrow-left12"></i></div><div class="clear"></div></div>');

        if (e.type == "touchend") {
            var inputX = e.changedTouches[0].clientX;
        } else {
            var inputX = e.clientX;
        }
        
        if (inputX < sidebarMinX) {
            sidebarResizedX = sidebarMinX;
        }
        else if (inputX > sidebarMaxX) {
            sidebarResizedX = sidebarMaxX;
        }
        
        if (e.type == "touchend") {
            sidebarResize();
        } else {
            sidebarResize(true);
        }
        
        updateUserConfigClass("Sidebar", "width", sidebarResizedX);
    }

    $('#toggleSidebarButtonDragLine').css('display', 'none');
    sidebarResizing = false;
    
}

/**
 * Function for applying the updated sidebar widths.
 */
function sidebarResize(ease)
{
    if (ease === true) {
        var easeSpeed = 250;

        $('#right').animate({marginLeft:sidebarResizedX+'px'}, easeSpeed);
        $('#toggleSidebarButton').animate({marginLeft:(sidebarResizedX-10)+'px'}, easeSpeed);

        // -- resize the sidebar
        $('#left').animate({width:(sidebarResizedX-1)+'px'}, easeSpeed);
        $('#leftpane').animate({width:(sidebarResizedX-1)+'px'}, easeSpeed);
        $('#leftpane > .filter').animate({width:(sidebarResizedX-1)+'px'}, easeSpeed);
        $('#leftpane').find('.filterField').animate({width:((sidebarResizedX-31)+'px')}, easeSpeed);
        $('#sideBarOptions').animate({width:((sidebarResizedX-1)+'px')}, easeSpeed);
        $('#sideBarOptions').find('.iconWraper').next().animate({width:((sidebarResizedX-21)+'px')}, easeSpeed);
        $('#sideBarOptions').find('img').next().animate({width:((sidebarResizedX-21)+'px')}, easeSpeed);
        $('#theSideList > .paginate').animate({width:(sidebarResizedX-9)+'px'}, easeSpeed);
        $('#sectionOptions').animate({width:((sidebarResizedX-1)+'px')}, easeSpeed);
        $('#sectionOptions > .optionSelectionWrapper').animate({width:(sidebarResizedX-1)+'px'});
        $('#leftpane').find('input#filter').animate({width:((sidebarResizedX-46)+'px')}, easeSpeed);

        $('#leftpane').find('input#filter').width((sidebarResizedX-46)+'px');

        sidebarResized = false;
        window.setTimeout(function(){
            panels();
        }, easeSpeed+50);
        
    } else {
        $('#right').css('marginLeft',sidebarResizedX+'px');
        $('#toggleSidebarButton').css('marginLeft',(sidebarResizedX-10)+'px');

        // -- resize the sidebar
        $('#left').width((sidebarResizedX-1)+'px');
        $('#leftpane').width((sidebarResizedX-1)+'px');
        $('#leftpane > .filter').width((sidebarResizedX-1)+'px');
        $('#leftpane').find('.filterField').width((sidebarResizedX-31)+'px');
        $('#sideBarOptions').width((sidebarResizedX-1)+'px');
        $('#sideBarOptions').find('.iconWraper').next().width((sidebarResizedX-21)+'px'); // sidebar options
        $('#sideBarOptions').find('img').next().width((sidebarResizedX-21)+'px'); // sidebar options with special icons (eg Integrations > Xero)
        $('#theSideList > .paginate').width((sidebarResizedX-9)+'px');
        $('#sectionOptions').width((sidebarResizedX-1)+'px');
        $('#sectionOptions > .optionSelectionWrapper').width((sidebarResizedX-1)+'px');

        $('#leftpane').find('input#filter').width((sidebarResizedX-46)+'px');
        panels();
    }
    $('#toggleSidebarButtonVisible').css('border-radius', '30px 0px 0px 30px');
}

/**
 * Function to resize the pagination of sidebar lists.  Made generic to be callable by other parts of the framework.
 */
function sidebarPaginationResize(ease)
{
    var easeSpeed = 250;
    if (ease === true) {
        $('#sideBarOptions').find('.iconWraper').next().animate({width:((sidebarResizedX-21)+'px')}, easeSpeed);
    } else {
        $('#theSideList > .paginate').width((sidebarResizedX-9)+'px');
    }
}

function getTabColorClass(tabId)
{
    var colorClassList = ["contacts", "animals", "clinical", "work", "tracker", "financial", "reporting", "admin", "help", "document"];
    var tabClasses  = $(tabId).attr("class");
    if(tabClasses) {
        tabClasses = tabClasses.split(" ");
        for (var i = 0; i < tabClasses.length; i++) {
            if (colorClassList.indexOf(tabClasses[i]) >= 0) {
                return tabClasses[i];
            }
        }
    }
    
    return false;
}

function evtSidebarMouseMove(e)
{
    if (sidebarResizing) {
        sidebarResizeMouseMove(e);
    }
    sidebarResizeStart(e);
}

function evtSidebarMouseUp(e)
{
    $(this).removeClass('mouse-layer-mouse-down');
    $(this).off('mousemove', evtSidebarMouseMove);
    $(this).off('mouseup', evtSidebarMouseUp);

    $(this).off('touchmove', evtSidebarMouseMove);
    $(this).off('touchend', evtSidebarMouseUp);
    sidebarResizeEnd(e);
}


function flashInput(target)
{
    target.stop().animate({borderColor: '#F00'}, 250)
        .animate({borderColor: '#aeafb3'}, 250)
        .animate({borderColor: '#F00'}, 250)
        .animate({borderColor: '#aeafb3'}, 250);
}

function nextField(current){
    for (i = 0; i < current.form.elements.length; i++){
        if (current.form.elements[i].tabIndex == current.tabIndex+1){
            current.form.elements[i].focus();
            if (current.form.elements[i].type == "text"){
                current.form.elements[i].select();
            }
        }
    }
}

function slack(msg, name, chan, icon, sendOnDev) {
    // Default parameters
    msg = (typeof msg !== 'undefined') ? msg : "Lorem Ipsum..";
    name = (typeof name !== 'undefined') ? name : false;
    chan = (typeof chan !== 'undefined') ? chan : "#alerts-monitoring";
    icon = (typeof icon !== 'undefined') ? icon : "http://www.ezyvet.com/wp-content/uploads/2016/10/Pasted-image-at-2016_10_11-02_16-PM.png";
    sendOnDev = (typeof sendOnDev !== 'undefined') ? sendOnDev : false;

    jaxnew("General/Slack", {
        args: {
            msg: msg,
            name: name,
            chan: chan,
            icon: icon,
            sendOnDev: sendOnDev
        }
    });
}

function generateShortLink(url, callback, expiry) {
    $.ajax({
        type: "POST",
        url: "General/GenerateShortLink",
        data: {
            url: url,
            expiry: expiry
        },
        success: callback
    });
}

function saveHistoryRecord(userId, recordClass, recordId) {
//    console.log("User Id: " + userId + ", Record class: " + recordClass + ", Record Id: " + recordId);
    if(recordClass === "Dashboard" || recordClass === "FeatureRequest")
    {
        return false;
    }

    var navigationHistory = getNavigationHistoryStack(userId);
    var key = recordClass+"-"+recordId;
    if(navigationHistory.includes(key)) {
        //rearrange the history
        var index = $.inArray(key, navigationHistory);
        if (index>=0) navigationHistory.splice(index, 1);
        navigationHistory.push(key);
    } else {
        navigationHistory.push(key);
    }

    //only want to store 10 previous records
    if(navigationHistory.length > 20)
    {
        navigationHistory.splice(0, 1);
    }
    objToLocalStorage(getNavigationHistoryKey(userId), navigationHistory);
}

function getNavigationHistoryStack(userId) {
    var list = objFromLocalStorage(getNavigationHistoryKey(userId));
    return list instanceof Array ? list : [];
}

function getNavigationHistoryKey(userId) {
    return "userNavigationHistory-"+userId;
}

function objToLocalStorage(key,obj){
    if(localStorage) {
        localStorage.setItem(key, JSON.stringify(obj));
    }
}

function objFromLocalStorage(key){
    if(localStorage) {
        var results = localStorage.getItem(key) || "";
        try {
            return JSON.parse(results);
        } catch(err) {

        }
    }
}


/** The code in this file, below this comment is to be pristine and clean as fuck mate **/

//Flash error tabs briefly every 10 seconds - slightly more efficient than direct CSS
var flashTabs = setInterval(function() {
    $('.errorTab:not(.active)').effect("highlight", {backgroundColor: "rgba(240,100,100,1)"}, 750);
}, 10000);;
apptdown=calendardown=resizerdown='no';
calColstart=calrowstart=1;
calColumns=calrows=rowHeight=currentappt=currentjob=currentres=offsetRow=apptRowstart=apptCol=colWidth=mouseX=mouseY=calCol=calrow=intervalseconds=startofday=0;
currentcalendaritem=false;

function draggin(e)
{ 
	if(!e){e=window.event;}
	calCol=pxtocol(e.pageX);
	calrow=pxtorow(e.pageY);

	if(calCol<1){calCol=1;}
	if(calCol>calColumns){calCol=calColumns;}
	if(calrow<1){calrow=1;}
	if(calrow>calrows){calrow=calrows;}
	if(apptdown=='yes' && resizerdown!='yes' && currentcalendaritem != null )
	{
            calrow=calrow-(parseInt(calrowover)-apptRowstart);
            currentcalendaritem.css({top:rowtopx(calrow)+'px',left:coltopx(calCol)+'px'});
			currentcalendaritem.css('width', colWidth);
            currentcalendaritem.data('col',calCol);
            currentcalendaritem.data('start',r2ts[calrow]);
            currentcalendaritem.data('startPositionIntoDay',r2ts[calrow]);
            g('mouselayer').focus();
        	$('.appt[data-metaappointment*='+currentcalendaritem.data('metaappointment')+']').css({top:getTop( currentcalendaritem )});
	}
	
	if(resizerdown=='yes' && currentcalendaritem)
	{
            if((rowtopx(calrow+1)-rowtopx(apptRowstart)-3)>=0)
            {
                height=rowtopx(calrow+1)-rowtopx(apptRowstart)-3+'px';
                seconds=(r2ts[calrow]-r2ts[apptRowstart]+(interval/60*3600));	
                $('.appt'+currentcalendaritem.data('appointment')).each(
                        function(){
                                $(this).css({height:height}).data('seconds',seconds);
                        }
                );
            }
	}
	
	if(calendardown=='yes')
	{
            var theDragger = $('#dragger');
            theDragger.css('left',coltopx(calColstart)+'px').css('width',colWidth+'px');
            if((rowtopx(calrow)-rowtopx(calrowstart))>=0)
            {
                theDragger.css('top',rowtopx(calrowstart)+'px').css('height',rowtopx(calrow)-rowtopx(calrowstart)+(rowHeight+1)+'px');
            }
            else
            {
                theDragger.css('top',rowtopx(calrow)+'px').css('height',((rowtopx(calrow)-rowtopx(calrowstart))*-1)+(rowHeight+1)+'px');
            }
            theDragger.show();
	}
	return false;
};

function calmouseup(e)
{
        var calrow;
        var start;
        var end;
	if($('#calendar .sep').length>0)
	{
		if(g('mouselayer'))
		{
                        var theDragger = $('#dragger');
			theDragger.hide();
			
			if(calendardown=='yes')
			{
				if(!e){e=window.event;}
				calrow=pxtorow(e.pageY);
				if(calrow<calrowstart)
				{
//					start=parseInt(cst[calColstart]);
					start=parseInt(cst[calColstart])+parseInt(r2ts[calrow]);
					end=(parseInt(cst[calColstart])+parseInt(r2ts[calrowstart])+intervalseconds);
                                        startPositionIntoDay = parseInt(r2ts[calrow]);
                                        appointmentLength = parseInt(r2ts[calrowstart])-parseInt(r2ts[calrow])+intervalseconds;
				}
				else
				{	
//					start=parseInt(cst[calColstart]);
					start=parseInt(cst[calColstart])+parseInt(r2ts[calrowstart]);
					end=(parseInt(cst[calColstart])+parseInt(r2ts[calrow])+intervalseconds);
                                        startPositionIntoDay = parseInt(r2ts[calrowstart]);
                                        appointmentLength = parseInt(r2ts[calrow])-parseInt(r2ts[calrowstart])+intervalseconds;
				}
				if(isNaN(end))
                                {
                                    end=0;
                                }
                                openTabFor('Appointment',0,{
                                    resource:c2r[calColstart],
                                    metaappointmentdata_starttime:start,
                                    startTimePosition:startPositionIntoDay,
                                    appointmentLength:appointmentLength,
                                    metaappointmentdata_endtime:end,
                                    appointmentdata_calendartype:$('#calendarTypeEditMode').val()
                                });

			}
			if((apptdown=='yes' || resizerdown=='yes') && currentcalendaritem )
			{
                                startPositionIntoDay = parseInt(currentcalendaritem.data('start'));
                                appointmentLength = parseInt(currentcalendaritem.data('seconds'));
				start=(parseInt(cst[parseInt(currentcalendaritem.data('col'))])+parseInt(currentcalendaritem.data('start')));
				end=(parseInt(cst[parseInt(currentcalendaritem.data('col'))])+parseInt(currentcalendaritem.data('start'))+parseInt(currentcalendaritem.data('seconds')));
				if(start>end){return false;}
				;
				apptColstart=apptColstart?apptColstart:0;
				calCol=calCol?calCol:0;
				currentcalendaritem.data('appointment',currentcalendaritem.data('appointment')?currentcalendaritem.data('appointment'):0);
//				
				$('.appt'+currentcalendaritem.data('appointment')).each(function(){
					$(this).data('start',currentcalendaritem.data('start'))
                                            .data('seconds',currentcalendaritem.data('seconds'));
					$(this).css('top',getTop( currentcalendaritem )).css('height',currentcalendaritem.height());
				});
				
				if( currentcalendaritem && apptColstart && calCol )
				{					
					jaxnew('modules/dashboard/set/updateAppointment.php',
                                        {
                                            args:'r1='+c2r[apptColstart]+'&amp;r2='+c2r[calCol]+'&amp;appointment_id='+currentcalendaritem.data('appointment')+'&amp;metaappointment_id='+currentcalendaritem.data('metaappointment')+'&amp;repetitioninstance=' + currentcalendaritem.data('repetitioninstance') + '&amp;metaappointmentdata_starttime='+start+'&amp;startTimePosition='+startPositionIntoDay+'&amp;appointmentLength='+appointmentLength+'&amp;win_id='+top.$('#win_id').val(),
                                            target:$('#calendarmain .theGrid').attr('id'),post:true,how:'append'
                                        });
				};
			}
                        $('#mouselayer').css('z-index',85);
			apptdown=calendardown=resizerdown='no';
	
			if(currentcalendaritem){
				currentcalendaritem.css('z-index',90);
				$('.appt'+currentcalendaritem.data('appointment')).removeClass('apptactive');
			}	
		}
	}
        else
        {
            $('#dragger').hide();
        }
        checkConflicting();
	return false;
};

function checkconflict()
{
	if(!currentcalendaritem)return;
	currentcalendaritem.css('margin-left',0+'px').width(colWidth-6);
	
	$('.appt'+currentcalendaritem.data('appointment')).each(function()
	{
		amountofappts=1;
		ids='#appt'+currentres;
		$("div[col='"+$(this).data('col')+"']:not('"+ids+"')").each(function()
		{
                    var theAppt = $(this);
                    if (theAppt.data('calendartype') == currentcalendaritem.data('calendartype')) {
			if((theAppt.data('start')>currentcalendaritem.data('start') && theAppt.data('start')<(parseInt(currentcalendaritem.data('start'))+parseInt(currentcalendaritem.data('seconds')))) || ((parseInt(theAppt.data('start'))+parseInt(theAppt.data('seconds')))>currentcalendaritem.data('start') && theAppt.data('start')<(parseInt(currentcalendaritem.data('start'))+parseInt(currentcalendaritem.data('seconds')))))
			{
				ids+=',#'+$(this).attr('id');
				amountofappts++;
			}
			else
			{
				$(this).css('margin-left',0+'px').width(colWidth-6);
			}
                    }
		});
		
		counter=0;

		$(ids).each(function()
		{
			$(this).css('margin-left',(counter*((colWidth-(6/amountofappts))/amountofappts))+'px').width(((colWidth-(6*amountofappts))/amountofappts));
			counter++;
		});
	});
}

function coltopx(col)
{
	col=parseInt(col);
	colWidth=parseInt(colWidth);
	if(parseInt(col)<1){col=1;}
	return (col-1)*(colWidth+3)+53;
};

function rowtopx(row)
{
	row=parseInt(row);
	rowHeight=parseInt(rowHeight);
	if(parseInt(row)<1){row=1;}
	return (row-1)*(rowHeight+1);
};

function pxtocol(pxc)
{
	row=parseInt(pxc);
	colWidth=parseInt(colWidth);
	col=Math.floor(((pxc-g('calendar').offsetLeft-61)/(colWidth+3))+1);
	if(parseInt(col)<1){col=1;}
	return col;
}

function pxtorow(pxr)
{
	pxr=parseInt(pxr);
	rowHeight=parseInt(rowHeight);
	if(g('calendarmain'))
	{
		row=Math.floor(((pxr-mainmenuheight-42+parseFloat(g('calendarmain').scrollTop))/(rowHeight+1))+1);
		if(parseInt(row)<1){row=1;}
		return row;
	}
}

function getTop( calendarItem )
{
    return calendarItem.position().top-$('#calendarmain .theGrid').position().top;
}

function mcup(date)
{
	if(apptdown=='yes' && resizerdown!='yes')
	{
		//alert(date);
	}
};

function mcover()
{
	if(apptdown=='yes' && resizerdown!='yes')
	{
		//alert('this');
	}
};

function checkConflicting() {
        $('.appt.conflictable.conflicted').removeClass('conflicted');	
        $('.appt.conflictable').each( function(){
            $(this).attr('col',$(this).data('col'));
        } );
	for(var daynum=1;daynum<=calColumns;daynum++) {
		var collisionGroups = [];
		$('.appt.conflictable[col='+daynum+']').each(function(checkerIndex) {
			var checker=$(this);
				$('.appt.conflictable[col='+daynum+']').each(function(checkeeIndex) {
					var checkee=$(this);
					if(checkee.data('appointment')!=checker.data('appointment') && checkee.data('calendartype') == checker.data('calendartype')) {
						if(isColliding(checker, checkee)) {
							checkee.addClass('conflicted');

							// Get collision groups
                            var found = false;
                            for(var group = 0; group < collisionGroups.length; group++) {
                                for(var item = 0; item < collisionGroups[group].length; item++) {
                                    if((collisionGroups[group][item] == checker.attr('id') || collisionGroups[group][item] == checkee.attr('id')) && !found) {
                                        collisionGroups[group].push(checkee.attr('id'));
                                        collisionGroups[group].push(checker.attr('id'));
                                        found = true;
                                    }
                                }
                            }
                            if(!found) {
                                collisionGroups[collisionGroups.length] = [];
                                collisionGroups[collisionGroups.length - 1].push(checkee.attr('id'));
                                collisionGroups[collisionGroups.length - 1].push(checker.attr('id'));
                            }
						}
					}
				});
		});

		// Wow, that is ugly and inefficient, but works. There must be some way to put this in above check?
		for(var group = 0; group < collisionGroups.length; group++) {
			for(var item = 0; item < collisionGroups[group].length; item++) {
				for(var groupToCheck = 0; groupToCheck < collisionGroups.length; groupToCheck++) {
					if(collisionGroups[groupToCheck].indexOf(collisionGroups[group][item]) > -1 && groupToCheck !== group) {
						// Is duplicate, merge and remove
						collisionGroups[group] = collisionGroups[group].concat(collisionGroups[groupToCheck]);
						collisionGroups.splice(groupToCheck, 1);
					}
				}
			}
		}

		// Filter unique ids
        for(var group = 0; group < collisionGroups.length; group++) {
            collisionGroups[group] = collisionGroups[group].filter(onlyUnique);
			collisionGroups[group] = collisionGroups[group].sort(sortByStartTime);
        }

		// generate matrix for each group
        var collisionMatricies = [];
        for(var group = 0; group < collisionGroups.length; group++) {
            collisionMatricies[group] = getCollisionMatrix(collisionGroups[group]);
        }

		for(var group = 0; group < collisionMatricies.length; group++) {
			var maxRowLength = 0;
			for(var row = 0; row < collisionMatricies[group].length; row++) {
				if(collisionMatricies[group][row].length > maxRowLength) {
					maxRowLength = collisionMatricies[group][row].length;
				}
			}

			var colWidth = parseInt($('#calendar .sep').css("width"));
			var newWidth = colWidth / maxRowLength;

			for(var row = 0; row < collisionMatricies[group].length; row++) {
				for(var col = 0; col < collisionMatricies[group][row].length; col++) {
					var element = $('#' + collisionMatricies[group][row][col]);
					element.css("width", (newWidth - 7) + "px");
					var firstLeft = coltopx(element.data('col'));
					var newLeft = (firstLeft + (newWidth * col)) + "px";
					element.css("left", newLeft);
				}
			}
		}
	}
}

function isColliding(checker, checkee) {
    var chk_start=Number(checker.data('start'));
    var chk_end=chk_start+Number(checker.data('seconds'));
    var this_chk_start=Number(checkee.data('start'));
    var this_chk_end=this_chk_start+Number(checkee.data('seconds'));
    return (
        ((chk_start >= this_chk_start) && (chk_start < this_chk_end)) ||
        ((this_chk_start >= chk_start) && (this_chk_start < chk_end))
    )
}

function getCollisionMatrix(collisionGroup) {
    var matrix = [];
    matrix[0] = [];

	for(var item = 0; item < collisionGroup.length; item++) {
		var event = $('#' + collisionGroup[item]);
		var col = 0;
		var found = false;
		while (!found) {
			var row = getMatrixColumnLastRow(matrix, col);

			if (row === false) {
				// No last event in row and no index so create index and place here
				matrix[0].push(event.attr('id'));
				found = true;
			} else {
				var existingevent = $('#' + matrix[row][col]);
				if (!isColliding(event, existingevent)) {
					// Place the current event in the next row of the current column
					if (matrix[row + 1] === undefined) {
						matrix[row + 1] = [];
					}
					matrix[row + 1][col] = event.attr('id');
					found = true;
				}
			}

			col++;
		}
	}

    return matrix;
}

function getMatrixColumnLastRow(matrix, col) {
	// From the last row in the matrix, search for the column where there is a value or until there are no more rows
	var row = matrix.length;
	while (row--) {
		if (matrix[row][col] !== undefined) {
			return row;
		}
	}

	// No more rows
	return false;
}

function sortByStartTime(a, b) {
	return $('#' + a).data('start') - $('#' + b).data('start');
}

function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}

function scrollTop()
{
    top.$('#calendar').data('scrollTop',top.$('#calendarmain').scrollTop());
};
$(window).load(function () {
    function FinancialLineItem(config) {
        this.config = config;
    }

    FinancialLineItem.prototype.removeRow = function (elementSelector) {
        var row = elementSelector.parents("tr");
        disableFinancialLineItem(row.attr("tab"), row.attr("item_row"));
    };

    FinancialLineItem.prototype.addRow = function (elementSelector, multiplier) {
        multiplier = multiplier ? multiplier : 1;
        var tab = elementSelector.parents("form").find(".form_key input[name=tab]").val();
        var recordId = elementSelector.parents("form").find(".form_key input[name=formkey_id]").val();
        var ownershipSeparationId = parseInt($("#ownershipownershipseparationDropdown" + tab + " .idField").val());
        var target = elementSelector.parents("tr.invrow" + tab).attr("id");
        var action = "after";
        if (!target) {
            target = $("tbody tr", elementSelector.parents("table")).attr("id");
        }
        var queryString = "multiplier=" + multiplier + "&amp;tab=" + tab + "&amp;ownershipseparation_id=" + ownershipSeparationId + "&amp;row=" + ($("#totalrows" + tab).increment().val()) + "&amp;" + this.config.idFieldName + "=" + recordId;
        if (this.config.recordIdField && this.config.recordClassField) {
            queryString += "&amp;" + this.config.recordIdField + "=" + elementSelector.parents("form").find(".form_key input[name=formkey_id]").val();
            queryString += "&amp;" + this.config.recordClassField + "=" + elementSelector.parents("form").find(".form_key input[name=formkey_class]").val();
        }
        if (this.config.addFileName == "addPurchaseOrderRow.php" && multiplier == 1) {
            queryString += "&amp;addSingleRowFix=1";
        }
        top.jax(
            "modules/financial/get/" + this.config.addFileName,
            queryString,
            target,
            null,
            null,
            action
        );
        refreshGST(tab);
    };

    FinancialLineItem.prototype.getSelectedRowIndex = function() {
        var selectedCell = $(document.activeElement).parents('td');
        var selectedRow = selectedCell.parent();
        return selectedCell.parents('tbody').children('tr:visible').index(selectedRow);
    };

    FinancialLineItem.prototype.getSelectedColumnIndex = function() {
        var selectedCell = $(document.activeElement).parents('td');
        return selectedCell.parent().children('td:visible').index(selectedCell);
    };

    FinancialLineItem.prototype.setListeners = function (wrappingElementSelector) {
        var financialInstance = this;
        for (var i = 0; i < this.config.addRowListeners.length; i++) {
            switch (this.config.addRowListeners[i]) {
                case "clickplus":
                    $(wrappingElementSelector).on({
                        click: function (e) {
                            $(this).trigger('addRows', 1);
                        },
                        addRows: function (e, multiplier) {
                            financialInstance.addRow($(this), multiplier);
                        }
                    }, financialInstance.config.tableIdentifier + " .add");
                    break;
                case "clickremove":
                    $(wrappingElementSelector).on({
                        click: function () {
                            financialInstance.removeRow($(this));
                        }
                    }, financialInstance.config.tableIdentifier + " .newRemove, " + financialInstance.config.tableIdentifier + " .remove");
                    break;
                case "keydown":
                    $(wrappingElementSelector).on({
                        keydown: function (e) {
                            if (!e) {
                                e = window.event;
                            }

                            var columnIndex = financialInstance.getSelectedColumnIndex();
                            var rowIndex = financialInstance.getSelectedRowIndex();
                            var table = $(document.activeElement).parents('table').first();
                            var rows = table.find('tbody').children('tr:visible');
                            var currentRow = rows.eq(rowIndex);

                            for (var i = 0; i < financialInstance.config.addKeyCodes.length; i++) {
                                if (e.keyCode == financialInstance.config.addKeyCodes[i]) {
                                    switch (e.keyCode) {
                                        case 9: //tab key - check on last column
                                            if ($(this).parents('.totalCell').length > 0) {
                                                financialInstance.addRow($(this));
                                            }
                                            break;
                                        case 38: //Up key - Selects the row above
                                        case 40: //Down key - Selects the row below
                                            // halp - am here to halp (AB)

                                            if (rowIndex > 0) {
                                                var selectedItem = $(currentRow.find('td:visible').eq(columnIndex).find('.dropDownList'));
                                                if (selectedItem.css('display') == 'none') {
                                                    e.stopPropagation();
                                                    if (e.keyCode == 38) {
                                                        var newRow = rows.eq(rowIndex - 1);
                                                    } else {
                                                        var newRow = rows.eq(rowIndex + 1);
                                                    }

                                                    if (typeof newRow !== 'undefined') {
                                                        newRow.find('td:visible').eq(columnIndex).find('input:visible').click();
                                                    }
                                                }
                                            }
                                            e.preventDefault();
                                            break;
                                        case 13:
                                            var selectedInput = $(currentRow.find('td:visible').eq(columnIndex).find('input:visible'));
                                            var selectedItem = $(currentRow.find('td:visible').eq(columnIndex).find('.dropDownList'));

                                            if (selectedItem.css('display') == 'block') {
                                                selectedInput.blur();
                                                selectedInput.focusout();
                                                selectedInput.click();
                                                delete selectedItem;
                                                break;
                                            }
                                        default: //any other key
                                            financialInstance.addRow($(this));
                                            break;
                                    }
                                }
                            }
                        }
                    }, ".financialRecord.enabled" + financialInstance.config.tableIdentifier + " .financialitem input");
                    break;
                case "qtychangeouter":
                    $(wrappingElementSelector).on({
                        change: function () {
                            var row = $(this).parents("tr");
                            row.find(".outer").val(numfWithMinimum(parseFloat(this.value) / parseFloat(row.find(".outerUnits").val()), 4, 0));
                        }
                    }, financialInstance.config.tableIdentifier + " .financialitem.lineNotApproved input.qty");
                    break;
                case "qtyreceivedchange":
                    $(wrappingElementSelector).on({
                        change: function () {
                            var row = $(this).parents("tr");
                            row.find(".received_outer").val(numfWithMinimum(parseFloat(row.find(".received_qty").val()) / parseFloat(row.find(".outerUnits").val()), 4, 0));

                            var ordered = parseFloat(row.find(".orderedQty").val());
                            var received = parseFloat(row.find(".received_qty").val()) + parseFloat(row.find(".previously_received").val());
                            if (Math.abs(received) > Math.abs(ordered)) {
                                msg("You are receiving more then you ordered","1000","warning");
                            }
                        }
                    }, financialInstance.config.tableIdentifier + " .financialitem.lineNotApproved input.received_qty");
                    break;
            }
        }
    };

    var financialitemObject = new FinancialLineItem({
        addFileName: "addFinancialLineItem.php",
        tableIdentifier: ".financialItemTable",
        recordIdField: "recordId",
        recordClassField: "recordClass",
        addRowListeners: ["clickplus", "clickremove"]
    });
    financialitemObject.setListeners('#ezydesk');
    var customerorderObject = new FinancialLineItem({
        addFileName: "addCustomerOrderRow.php",
        tableIdentifier: ".customerOrderTable",
        idFieldName: "customerorder_id",
        addRowListeners: ["clickplus", "clickremove", "keydown"],
        addKeyCodes: [9, 13, 38, 40]
    });
    customerorderObject.setListeners('#ezydesk');
    var productcontainerObject = new FinancialLineItem({
        addFileName: "addProductContainerRow.php",
        tableIdentifier: ".productContainerTable",
        idFieldName: "productcontainer_id",
        addRowListeners: ["clickplus", "clickremove", "keydown"],
        addKeyCodes: [9, 13, 38, 40]
    });
    productcontainerObject.setListeners('#ezydesk');
    var quotationObject = new FinancialLineItem({
        addFileName: "addQuotationRow.php",
        tableIdentifier: ".quotationTable",
        idFieldName: "quotation_id",
        addRowListeners: ["clickplus", "clickremove", "keydown"],
        addKeyCodes: [9, 13, 38, 40]
    });
    quotationObject.setListeners('#ezydesk');
    var recurringinvoiceObject = new FinancialLineItem({
        addFileName: "addRecurringInvoiceRow.php",
        tableIdentifier: ".recurringInvoiceTable",
        idFieldName: "recurringinvoice_id",
        addRowListeners: ["clickplus", "clickremove"]
    });
    recurringinvoiceObject.setListeners('#ezydesk');
    var stockadjustmentObject = new FinancialLineItem({
        addFileName: "addStockAdjustmentRow.php",
        tableIdentifier: ".stockAdjustmentTable",
        idFieldName: "stockadjustment_id",
        addRowListeners: ["clickplus", "clickremove", "keydown"],
        addKeyCodes: [9, 13, 38, 40]
    });
    stockadjustmentObject.setListeners('#ezydesk');
    var invoicetemplateObject = new FinancialLineItem({
        addFileName: "addInvoiceTemplateRow.php",
        tableIdentifier: ".invoicetemplate",
        idFieldName: "invoicetemplate_id",
        addRowListeners: ["clickplus", "clickremove", "keydown"],
        addKeyCodes: [9, 13, 38, 40]
    });
    invoicetemplateObject.setListeners('#ezydesk');
    var purchaseorderObject = new FinancialLineItem({
        addFileName: "addPurchaseOrderRow.php",
        tableIdentifier: ".purchaseOrderTable",
        idFieldName: "purchaseorder_id",
        addRowListeners: ["clickplus", "clickremove", "keydown", "qtychangeouter"],
        addKeyCodes: [9, 13, 38, 40]
    });
    purchaseorderObject.setListeners('#ezydesk');
    var invoiceObject = new FinancialLineItem({
        addFileName: "addInvoiceExpenseRow.php",
        tableIdentifier: ".invoiceTable",
        idFieldName: "invoice_id",
        addRowListeners: ["clickplus", "clickremove", "keydown"],
        addKeyCodes: [9, 13, 38, 40]
    });
    invoiceObject.setListeners('#ezydesk');
    var receiveStockObject = new FinancialLineItem({
        addFileName: "addReceiveStockRow.php",
        tableIdentifier: ".receiveStockTable",
        idFieldName: "receivestock_id",
        addRowListeners: ["clickplus", "clickremove", "keydown", "qtyreceivedchange"],
        addKeyCodes: [9, 13]
    });
    receiveStockObject.setListeners('#ezydesk');
    var receiveInvoiceObject = new FinancialLineItem({
        tableIdentifier: ".receiveInvoiceTable",
        idFieldName: "receiveinvoice_id",
        addRowListeners: ["qtyreceivedchange"]
    });
    receiveInvoiceObject.setListeners('#ezydesk');
});;
//Return the amount within a limit
function get_withinlimit(min,max,required,needed)
{
	if(needed){
		if(min<max)
		{
			max=( ( max + needed ) > 0 )?(-1*needed):max;
		}
		else
		{
			max=( ( max + needed ) > 0 )?max:(-1*needed);
			
		}		
	}
	if(min<max)
	{
		if(min<required && required<max)
		{
			return numf(required,2,FLOAT_TYPE);
		}
		else if(min>=required)
		{
			return numf(min,2,FLOAT_TYPE);
		}
	}
	else
	{
		if(min>required && required>max)
		{
			return numf(required,2,FLOAT_TYPE);
		}
		else if(min<=required)
		{
			return numf(min,2,FLOAT_TYPE);
		}
	}
	return numf(max,2,FLOAT_TYPE);
};
function markupToggle(tab,hide) {
	if(hide==1){
		$('.financialRecord'+tab).addClass('noshowmarkup');
//		$('#mkdhc'+tab).attr('checked','');
	}
	else if(hide==2){
//		$('#mkdhc'+tab).attr('checked','checked');
		$('.financialRecord'+tab).removeClass('noshowmarkup');
	}
	else{
		if( $('#mkdhc'+tab+':checked').length == 1 )
                {
                    $('.financialRecord'+tab).removeClass('noshowmarkup');
                }
                else
                {
                    $('.financialRecord'+tab).addClass('noshowmarkup');
                }
	}
}

function roundNumber(rnum, rlength) { // Arguments: number to round, number of decimal places
	  return Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
}

function numfWithMinimum(number,decimals,minimum,method)
{
    if( method == undefined )
    {
        method = 'Standard';
    }
    if( number == 'NaN')
    {
        number = 0;
    }
	if(minimum == undefined){minimum=2;}
	number_string=numf(number,decimals,FLOAT_TYPE,method).toString();
	number_string_array=number_string.split('.');
	if(number_string_array[1] != undefined && number_string_array[1].length>=minimum){return number_string;}
	else{return numf(number,minimum,STRING_TYPE,method)}
}

// FORMAT INVOICE FIELDS
var STRING_TYPE=0;
var FLOAT_TYPE=1;
// FORMAT INVOICE FIELDS NEW FUNCTION
function numf(number,decimals,type,method)
{
    if( method == undefined )
    {
        method = 'Standard';
    }
	if(!type)
	{
		type=STRING_TYPE;
	}

	if(Math.abs(number)==Infinity)
	{
		return number;
	}

	if( isElement(number) )
	{
		number.value=numf(number.value,decimals,type,method);
		return number.value;
	}
	else
	{
		number=''+number;
		number=number.replace(',','');
		number=number.replace('$','');
		if(number=='' || !number || isNaN(number))
		{
			number=0;
		}
		number=parseFloat(number);
		if(decimals==null){decimals=2;}
		if(decimals<0){decimals=0;}
        number = numfToMultiple(number,1/Math.pow(10,decimals),type,method);
		var newString;
		decimals = Number(decimals);

		if(decimals==0) {
		    number=Math.round(number);
		    if(type==FLOAT_TYPE)return number;
		    return number.toString();
		}
		if(number<0){sign="-";}else{sign="";}
		var numString = Math.abs(number)+"";
		if(numString.indexOf('e-')!=-1){numString="0";sign="";}
		var decpointpos=numString.indexOf('.');
		if(decpointpos==-1){
		    number=sign+numString+"."+bufferString("0",decimals)
		    if(type==FLOAT_TYPE)return parseFloat(number);
		    return number;
		}
		else if((decpointpos+decimals+1)>numString.length){numString=numString+bufferString("0",(decpointpos+decimals+1)-numString.length);}
		var requiredprecision=decimals+decpointpos;
		var halves = numString.split(".");
		var integerstring = halves[0]+halves[1];
		integerString=integerstring.substring(0,requiredprecision);
		var oldlength=integerString.length;
		var integer=integerString/1;
		var other=integerstring.substring(requiredprecision,integerstring.length);
		var otherdidgets=other.length;
		if( (("1"+other)/1) >= (("1"+5*Math.pow(10,(otherdidgets-1)))/1) ){integer++;}
		integerString=integer+"";
		var newlength=integerString.length;
		integerString=bufferString("0",requiredprecision-newlength)+integerString;
		decpointpos+=(integerString.length-oldlength);
		number=sign+integerString.substring(0,decpointpos)+"."+integerString.substring(decpointpos,integerString.length);
		if(type==FLOAT_TYPE)return parseFloat(number);
		return number;
	}
};

function numfToMultiple(number,tothenearestmultipleof,type,method)
{
        var numberBefore = number;
        var numberAbs = Math.abs(number);
        var sign = number==0?1:numberAbs/number;
        var roundedUp = Math.ceil((numberAbs/tothenearestmultipleof).toFixed(2)) * tothenearestmultipleof;
        var roundedDown = Math.floor((numberAbs/tothenearestmultipleof).toFixed(2)) * tothenearestmultipleof;
        if (method == 'Standard') {
            if (Math.abs(numberAbs - roundedUp) <= Math.abs(numberAbs - roundedDown)) {
                numberAbs = roundedUp;
            } else {
                numberAbs = roundedDown;
            }
        } else if (method == 'Always Up') {
            numberAbs = roundedUp;
        } else if (method == 'Always Down') {
            numberAbs = roundedDown;
        }
        number = numberAbs * sign;
        if( number != numberBefore );
    return type == FLOAT_TYPE ? parseFloat(number) : number;
};

function bufferString(string,size)
{
    var buffer="";
    for(var i=0;i<size;i++){buffer+=string;}
    return buffer;
}


//
function calrow_all(tab,from_type)
{
    var rows=$('#totalrows'+tab).val();
    for(var row=0; row<=rows; row++){
		if($('#pr-product-'+row+'-'+tab)){
		    calrow_new(tab,row,from_type);
		}
    }
}

// CALCULATE INVOICE ROW NUMBERS
tdchanged='';
var FROM_PRICE=0;
var FROM_QTY=1;
var FROM_DISCOUNT=2;
var FROM_PRICE_BEFORE_DISCOUNT=3;
var FROM_PRICEINCGST=4;
var FROM_PRICE_BEFORE_DISCOUNTINCGST=5;
var FROM_QTYINCGST=6;
var FROM_DISCOUNTINCGST=7;
var FROM_DISPENSE=9;
var FROM_DISPENSEINCGST=11;
var TAX_ROUNDING='Standard';

function calrow_new(tab,row,from_type,dimension)
{
    var inclusive=parseInt($('#gstinc'+tab).val());
    if(typeof(from_type)=='undefined'){from_type=FROM_PRICE;}
    if(typeof(dimension)=='undefined' ){
        if( $('#pr-highqty-'+row+'-'+tab).length ) {
            calrow_new(tab, row, from_type, '');
            calrow_new(tab, row, from_type, 'high');
            return;
        }
        else
        {
            dimension = '';
        }
    }
    if(from_type==FROM_PRICE && inclusive==1){from_type=FROM_PRICEINCGST;}
    if(from_type==FROM_PRICE_BEFORE_DISCOUNT && inclusive==1){from_type=FROM_PRICE_BEFORE_DISCOUNTINCGST;}
    if(from_type==FROM_DISPENSE && inclusive==1){from_type=FROM_DISPENSEINCGST;}
    if(from_type==FROM_QTY && inclusive==1){from_type=FROM_QTYINCGST;}
    if(from_type==FROM_DISCOUNT && inclusive==1){from_type=FROM_DISCOUNTINCGST;}
    if(parseInt($('#editable'+tab).val()))
    { 
        var subrows=parseInt($('#pr-subrows-'+row+'-'+tab).val());	
        var qty=numf($('#pr-'+dimension+'qty-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        var price=numf($('#pr-price-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        var priceincgst=numf($('#pr-priceincgst-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        var pricegst=numf($('#pr-pricegst-'+row+'-'+tab).val(),4,FLOAT_TYPE,TAX_ROUNDING);
        var price_before_discount=numf($('#pr-pricebeforediscount-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        var price_before_discount_incgst=numf($('#pr-pricebeforediscountincgst-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        var price_before_discount_gst=numf($('#pr-pricebeforediscountgst-'+row+'-'+tab).val(),4,FLOAT_TYPE,TAX_ROUNDING);
        var discount=numf($('#pr-discount-'+row+'-'+tab).val(),2,FLOAT_TYPE);
        var gst_rate=numf($('#pr-gstrate-'+row+'-'+tab).val(),2,FLOAT_TYPE);
        var dispense=numf($('#pr-dispense-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        var dispenseincgst=numf($('#pr-dispenseincgst-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        var dispensegst=numf($('#pr-dispensegst-'+row+'-'+tab).val(),4,FLOAT_TYPE,TAX_ROUNDING);
        var dispensemodifier = parseInt(qty/Math.abs(qty));		
        var possibleAmount = 0;
        
        $('#pr-gstperunit-'+row+'-'+tab).val(numfWithMinimum(price * (gst_rate/100),4,2));
        
        switch(from_type)
        {
            case FROM_PRICE_BEFORE_DISCOUNTINCGST:
            { 
                price_before_discount_gst = numf(price_before_discount_incgst * (1- 100 / (100 + gst_rate) ),4,FLOAT_TYPE,TAX_ROUNDING);
                price_before_discount = numf(price_before_discount_incgst - price_before_discount_gst,4,FLOAT_TYPE);
                $('#pr-pricebeforediscountgst-'+row+'-'+tab).val(price_before_discount_gst);
                $('#pr-pricebeforediscount-'+row+'-'+tab).val(numfWithMinimum(price_before_discount,4,2));

                $('#pr-discountflat-'+row+'-'+tab).val( numfWithMinimum( (price_before_discount_incgst / 100) * discount,2,2) );
                calrow_new(tab,row,FROM_DISCOUNTINCGST); 
                return; 
                break; 
            }
            case FROM_PRICE_BEFORE_DISCOUNT:
            {  
                price_before_discount_gst = numf(price * (gst_rate/100),4,FLOAT_TYPE,TAX_ROUNDING);
                price_before_discount_incgst = numf(price_before_discount + price_before_discount_gst,4,FLOAT_TYPE);
                $('#pr-pricebeforediscountgst-'+row+'-'+tab).val(price_before_discount_gst);
                $('#pr-pricebeforediscountincgst-'+row+'-'+tab).val(numfWithMinimum(price_before_discount_incgst,4,2));

                $('#pr-discountflat-'+row+'-'+tab).val( numfWithMinimum( (price_before_discount_incgst / 100) * discount,2,2) );
                calrow_new(tab,row,FROM_DISCOUNT,dimension);
                return; 
                break; 
            }
            case FROM_DISCOUNTINCGST: { 
                priceincgst = numf(price_before_discount_incgst * (1-discount/100),4,FLOAT_TYPE);
                pricegst = numf(priceincgst * (1- 100 / (100 + gst_rate) ),4,FLOAT_TYPE,TAX_ROUNDING);
                price = numf(priceincgst - pricegst,4,FLOAT_TYPE);
                $('#pr-priceincgst-'+row+'-'+tab).val(numfWithMinimum(priceincgst,4,2));
                $('#pr-pricegst-'+row+'-'+tab).val(pricegst);
                $('#pr-price-'+row+'-'+tab).val(numfWithMinimum(price,4,2));

                $('#pr-discountflat-'+row+'-'+tab).val( numfWithMinimum( (price_before_discount_incgst / 100) * discount,2,2) );
                calrow_new(tab,row,FROM_QTYINCGST);
                return; 
                break; 
            }
            case FROM_QTYINCGST: {
                var totalincgst = numf(priceincgst*qty+(dispensemodifier*dispenseincgst),2,FLOAT_TYPE);
                var totalgst = numf(totalincgst * (1- 100 / (100 + gst_rate) ),2,FLOAT_TYPE,TAX_ROUNDING);
                var total = numf(totalincgst - totalgst,2,FLOAT_TYPE);
                $('#pr-'+dimension+'totalincgst-'+row+'-'+tab).val( numf(totalincgst,2) );
                $('#pr-'+dimension+'totalgst-'+row+'-'+tab).val( totalgst );
                $('#pr-'+dimension+'total-'+row+'-'+tab).val( numf(total,2) );
                possibleAmount = numf(price_before_discount*qty,2,FLOAT_TYPE);
                $('#pr-discountamount-'+row+'-'+tab).val( possibleAmount - total );

                $('#pr-discountamountflat-'+row+'-'+tab).val( (price_before_discount_incgst*qty / 100) * (possibleAmount - total) );
                break;
            }
            case FROM_PRICEINCGST: {
                discount = numf(100*(price_before_discount_incgst-priceincgst)/price_before_discount_incgst,2,FLOAT_TYPE);
                $('#pr-discount-'+row+'-'+tab).val( numfWithMinimum(discount,2,2) );

                $('#pr-discountflat-'+row+'-'+tab).val( numfWithMinimum( (price_before_discount_incgst / 100) * discount,2,2) );

                pricegst = numf(priceincgst * (1- 100 / (100 + gst_rate) ),4,FLOAT_TYPE,TAX_ROUNDING);
                price = numf(priceincgst - pricegst,4,FLOAT_TYPE);
                $('#pr-pricegst-'+row+'-'+tab).val(pricegst);
                $('#pr-price-'+row+'-'+tab).val(numfWithMinimum(price,4,2));
                calrow_new(tab,row,FROM_QTYINCGST,dimension);
                return;
                break; 
            }
            case FROM_PRICE: {
                discount = numf(100*(price_before_discount-price)/price_before_discount,2,FLOAT_TYPE);
                $('#pr-discount-'+row+'-'+tab).val( numfWithMinimum(discount,2,2) );

                $('#pr-discountflat-'+row+'-'+tab).val( numfWithMinimum( (price_before_discount_incgst / 100) * discount,2,2) );

                pricegst = numf(price * (gst_rate/100),4,FLOAT_TYPE,TAX_ROUNDING);
                priceincgst = numf(price + pricegst,4,FLOAT_TYPE);
                $('#pr-pricegst-'+row+'-'+tab).val(pricegst);
                $('#pr-priceincgst-'+row+'-'+tab).val(numfWithMinimum(priceincgst,4,2));
                calrow_new(tab,row,FROM_QTY,dimension);
                return;
                break; 
            }
            case FROM_DISPENSEINCGST: { 
                dispensegst = numf(dispenseincgst * (1- 100 / (100 + gst_rate) ),4,FLOAT_TYPE,TAX_ROUNDING);
                dispense = numf(dispenseincgst - dispensegst,4,FLOAT_TYPE);
                $('#pr-dispensegst-'+row+'-'+tab).val(dispensegst);
                $('#pr-dispense-'+row+'-'+tab).val(numfWithMinimum(dispense,4,2));
                calrow_new(tab,row,FROM_QTYINCGST,dimension);
                return;
                break; 
            }
            case FROM_DISPENSE: { 
                dispensegst = numf(dispense * (gst_rate/100),4,FLOAT_TYPE,TAX_ROUNDING);
                dispenseincgst = numf(dispense + dispensegst,4,FLOAT_TYPE);
                $('#pr-dispensegst-'+row+'-'+tab).val(dispensegst);
                $('#pr-dispenseincgst-'+row+'-'+tab).val(numfWithMinimum(dispenseincgst,4,2));
                calrow_new(tab,row,FROM_QTY,dimension);
                return;
                break; 
            }
            case FROM_DISCOUNT: { 
                price = numf(price_before_discount * (1-discount/100),4,FLOAT_TYPE);
                pricegst = numf(price * (gst_rate/100),4,FLOAT_TYPE,TAX_ROUNDING);
                priceincgst = numfWithMinimum(price + pricegst,4,2);
                $('#pr-priceincgst-'+row+'-'+tab).val(numfWithMinimum(priceincgst,4,2));
                $('#pr-pricegst-'+row+'-'+tab).val(pricegst);
                $('#pr-price-'+row+'-'+tab).val(numfWithMinimum(price,4,2));

                $('#pr-discountflat-'+row+'-'+tab).val( numfWithMinimum( (price / 100) * discount,2,2) );
                calrow_new(tab,row,FROM_QTY,dimension);
                return; 
                break; 
            }
            case FROM_QTY: {  
                total = numf(price*qty+(dispensemodifier*dispense),2,FLOAT_TYPE);
                totalgst = numf(pricegst*qty+(dispensemodifier*dispensegst),2,FLOAT_TYPE,TAX_ROUNDING);
                totalincgst = numf(total + totalgst,2,FLOAT_TYPE);
                $('#pr-'+dimension+'totalincgst-'+row+'-'+tab).val( numf(totalincgst,2) );
                $('#pr-'+dimension+'totalgst-'+row+'-'+tab).val(totalgst);
                $('#pr-'+dimension+'total-'+row+'-'+tab).val( numf(total,2) );
                possibleAmount = numf(price_before_discount*qty,2,FLOAT_TYPE);
                $('#pr-discountamount-'+row+'-'+tab).val( possibleAmount - total );

                $('#pr-discountamountflat-'+row+'-'+tab).val( (price_before_discount*qty / 100) * (possibleAmount - total) );
                break;
            }
        }
	}
    determineRangeLine(tab,row);
    calculateMarkup(tab,row);
	calrecord(tab,dimension);
}

function determineRangeLine(tab,row)
{
    if( $('#pr-hightotal-'+row+'-'+tab).length > 0 )
    {
        var rowEle = $('#pr-hightotal-'+row+'-'+tab).parents('tr');
        if( $('#pr-total-'+row+'-'+tab).val() != $('#pr-hightotal-'+row+'-'+tab).val() ){
            rowEle.addClass('highLowLine');
        }
        else {
            rowEle.removeClass('highLowLine');
        }
    }
}

function determineRangeTotal(tab)
{
    if( $('#hightotal'+tab).length > 0 )
    {
        var table = $('#hightotal'+tab).parents('table');
        if( $('#total'+tab).val() != $('#hightotal'+tab).val() ){
            table.addClass('highLowTotal');
        }
        else {
            table.removeClass('highLowTotal');
        }
    }
}

function determineRangeTax(tab)
{
    if( $('#highgst'+tab).length > 0 )
    {
        var table = $('#highgst'+tab).parents('table');
        if( $('#gst'+tab).val() != $('#highgst'+tab).val() ){
            table.addClass('highLowTaxTotal');
        }
        else {
            table.removeClass('highLowTaxTotal');
        }
    }
}


function calculateCost( tab , row , backwards )
{
    var stockCostTotal = 0;
    var totalQty=numf($('#pr-qty-'+row+'-'+tab).val(),4,FLOAT_TYPE);
    if( backwards && ( $.inArray(theRow.find('.productTracking').val(),["Product","Batch","Serial"]) != -1  ) && $('.stockItemRefItem'+tab+'-'+row).length > 0 )
    {
        $('.stockItemRefItem'+tab+'-'+row).each( function(){
            var stockQty = numf($(this).find('.stockQty').val(),4,FLOAT_TYPE);
            var stockCostPerUnit = numf($(this).find('.stockCostPerUnit').val(),4,FLOAT_TYPE);
            stockCostTotal += stockQty * stockCostPerUnit;
        } );
        $('#costPerUnit'+row+'-'+tab).val( numf(stockCostTotal?stockCostTotal/totalQty:0) );
    }
    else
    {
        stockCostTotal = parseFloat($('#costPerUnit'+row+'-'+tab).val())*totalQty;
    }
    $('#totalCost'+row+'-'+tab).val( numfWithMinimum(stockCostTotal,4,2) ).trigger( 'change' );
}

function calculateMarkup( tab , row )
{
    calculateCost( tab , row , false );    
    var markupAmount = '';
    var markupPercent = '';
    if( parseInt( $('#pr-hasmarkup-'+row+'-'+tab).val() ) == 1 )
    {
        var totalCost = numf($('#totalCost'+row+'-'+tab).val(),4,FLOAT_TYPE);    
        var totalSellAmount = numf($('#pr-total-'+row+'-'+tab).val(),4,FLOAT_TYPE)-numf($('#pr-dispense-'+row+'-'+tab).val(),4,FLOAT_TYPE);
        markupAmount = numf(totalSellAmount - totalCost,2);
        markupPercent = totalCost?numf(( ( 100 * totalSellAmount/totalCost ) - 100 ),2):'';
    }
    $('#markupAmount'+row+'-'+tab).val( markupAmount );
    $('#markupPercent'+row+'-'+tab).val( markupPercent );
}

function calrecord(tab,dimension)
{
    if(typeof(dimension)=='undefined' ){
        if( $('.highqty'+tab).length ) {
            calrecord(tab, row, from_type, '');
            calrecord(tab, row, from_type, 'high');
            return;
        }
        else
        {
            dimension = '';
        }
    }
    var totalDiscount = getTotalDiscount();
    var subtotal=$('.activeLine.include .'+dimension+'total'+tab).sum();
	var subtotalincgst=$('.activeLine.include .'+dimension+'totalincgst'+tab).sum();
	var discounted=$('.activeLine.include .discountamount'+tab).sum();
	var gross_profit=$('.activeLine.include .markup_amount'+tab).sum();
	var markupable_amount=$('.activeLine.include .markupable_total_cost'+tab).sum();
	var gst=$('.activeLine.include .'+dimension+'gst'+tab).sum();
	var freight=numf($('#freight'+tab).val(),2,FLOAT_TYPE);
	var freight_gst_rate=numf($('#freight_gst_rate'+tab).val(),2,FLOAT_TYPE);
        if(parseInt($('#gstinc'+tab).val())==1)
        {
            freight=numf( numf( $('#freightincgst'+tab).val() , 2 , FLOAT_TYPE ) * (100/(100+freight_gst_rate)),2 , FLOAT_TYPE);
            $('#freight'+tab).val(numf(freight,2));
        }
	var payments=numf($('#allocatedvalue'+tab).val(),2,FLOAT_TYPE);
	var freight_gst=numf(freight*(freight_gst_rate/100),2,FLOAT_TYPE);
	gst+=freight_gst;
	var total = freight+gst+subtotal;
	if(parseInt($('#editable'+tab).val()) || $('#data_type'+tab).val()=='customerorder' || $('#data_type'+tab).val()=='quotation')
	{
		var rounding=numf($('#rounding'+tab).val(),2,FLOAT_TYPE);
		$('#'+dimension+'total'+tab).val(numf(total+rounding,2));
		$('#unallocatedvalue'+tab).val(numf(total+rounding-payments,2));
		$('#freight_gst'+tab).val(numf(freight_gst,2));
		$('#freightincgst'+tab).val(numf(parseFloat(freight_gst)+parseFloat(freight),2));
		$('#'+dimension+'gst'+tab).val(numf(gst,2));
		$('#'+dimension+'subtotal'+tab).val(numf(subtotal,2));
		$('#'+dimension+'subtotalincgst'+tab).val(numf(subtotalincgst,2));

        $('#totaldiscount'+tab).val(numf(totalDiscount,2));
	}
	$('#discount'+tab).val(numf(100*(discounted/(subtotal+discounted)),2));
	$('#totalCost'+tab).val(numf(markupable_amount));
	$('#totalmarkup'+tab).val(numf(gross_profit));
	$('#totalmarkuppc'+tab).val(numf(100*gross_profit/markupable_amount));
    determineRangeTax(tab);
    determineRangeTotal(tab);
}

//Multiply item discount and item quantity
getTotalDiscount = function(){
    var discounts = [];
    var qty = [];

    $('.activeLine.include .discountflat'+tab).each(function(){
        discounts.push(parseFloat(this.value));
    });

    $('.activeLine.include .qty'+tab).each(function(){
        qty.push(parseFloat(this.value));
    });

    var totalDiscount = 0;
    for (var i = 0; i < discounts.length; i++){
        totalDiscount += discounts[i] * qty[i];
    }
    return totalDiscount;
}


jQuery.fn.objectOf = function() {
    var result = {};
    var assignAtCoordinates = function( result, coordinates , value ){
        var head = coordinates.shift();
        if( coordinates.length ) {
            if( result[head] == undefined) {
                result[head]= {};
            }
            result[head] = assignAtCoordinates(result[head],coordinates,value);
        } else {
            result[head] = value;
        }
        return result;
    }
    this.serializeArray().forEach(function(obj) {
        var key = obj.name;
        var value = obj.value;
        if( key.indexOf('[') > 0 ) {
            result = assignAtCoordinates(result,key.replace(/\]/g,'').replace(/\[/g, "%").split('%'),value);
        } else {
            result[key] = value;
        }
    });
    return result;
}

jQuery.fn.increment = function() {
	this.each(function(){
		this.value = ( parseInt( this.value ) + 1 );
	});
	return this;
}

jQuery.fn.decrement = function() {
	this.each(function(){
		this.value = ( parseInt( this.value ) - 1 );
	});
	return this;
}

jQuery.fn.sum = function() {
	var total=0;
	this.each(function(){
		var amount=parseFloat(this.value);
		amount=!isNaN(amount)?amount:0;
	    total+=amount;
	});
	return total;
}

jQuery.fn.absSum = function() {
	var total=0;
	this.each(function(){
		var amount=parseFloat(this.value);
		amount=!isNaN(amount)?amount:0;
	    total+=Math.abs(amount);
	});
	return total;
}
// sum but multiply each individual one by a qty field if its not serialised. Use carefully!
jQuery.fn.sumQ = function(row,tab) {
	var total=0;
	this.each(function(){
		var amount=parseFloat(this.value);
		amount=!isNaN(amount)?amount:0;
		var qty=parseFloat(g('pr-qty-'+row+'-'+tab).value);
		qty=!isNaN(qty)?qty:1;
		if(g('pr-stockitem-'+row+'-1-'+tab))
			total+=amount;
		else
			total+=(amount*qty);
	});
	return total;
}

function calcmarkup(tab,row,subrow)
{
	if(subrow)
	{
		__calcmarkup(tab,row,subrow);
	}
	else
	{
		var subrows=parseInt($('#subrows-'+row+'-'+tab).val());
		for(var i=0; i<subrows; i++)
		{
			subrow=i+1;
			__calcmarkup(tab,row,subrow);
		}
	}
}

function __calcmarkup(tab,row,subrow)
{
//	console.info('__calcmarkup('+tab+','+row+','+subrow+')');
	var price=numf($('#pr-price-'+row+'-'+tab).val(),4,FLOAT_TYPE);
	var discount=numf($('#pr-discount-'+row+'-'+tab).val(),2,FLOAT_TYPE);
	var actual_price=price*(1-(discount/100));
	var stockqty=numf($('#pr-stock_qty-'+row+'-'+subrow+'-'+tab).val(),4,FLOAT_TYPE);
	var cost=numf($('#hmarkup-'+row+'-'+subrow+'-'+tab).val(),4,FLOAT_TYPE);
	var markup_amount=actual_price-cost;
	var markup_percent=100*markup_amount/cost;
	var total_markup=markup_amount*stockqty;
//	console.info(price+','+discount+','+actual_price+','+stockqty+','+cost+','+markup_amount+','+markup_percent+','+total_markup);
	$('#markup'+row+'-'+subrow+'-'+tab).val(numf(markup_amount));
	$('#pr-markuppc-'+row+'-'+subrow+'-'+tab).val(numf(markup_percent));
	$('#markuptotal-'+row+'-'+subrow+'-'+tab).val(numf(total_markup));

    $('#pr-discountflat-'+row+'-'+tab).val(numf(price / 100 * discount));
    $('#pr-discountamountflat-'+row+'-'+tab).val(numf(price / 100 * discount));
}

//EFTPOS

//function eftposbox() {
//    if(!top.g('eftpos'))
//    {
//        element=document.createElement('div');
//        element.id='eftpos';
//    } 
//    top.g('eftpos').show();
//    winh=parseInt(document.body.offsetHeight);
//    winw=parseInt(document.body.offsetWidth);
//    mleft=(parseInt(document.body.offsetWidth)-g('eftpos').offsetWidth)/2;
//    mtop=(parseInt(document.body.offsetHeight)-g('eftpos').offsetHeight)/2;
//    $('#eftpos').css({left:mleft+'px',top:mtop+'px'});
//}
//function eftpos(transaction,tab,terminal)
//{
//	if(!g('eftpos'))
//	{
//		element=document.createElement('div');
//		element.id='eftpos';
//		g('ezydesk').appendChild(element);
//		g('eftpos').innerHTML='<div>Sending to Pinpad...</div>';
//	}
//
//	if(g('eftpos'))
//	{
//		jax('core/main/get.php','action=eftposstatus&amp;tab='+tab+'&amp;transaction='+transaction+'&amp;terminal='+terminal,'eftpos');
//
//		$('#eftpos').show();
//
//		winh=parseInt(document.body.offsetHeight);
//		winw=parseInt(document.body.offsetWidth);
//
//		mleft=(parseInt(document.body.offsetWidth)-g('eftpos').offsetWidth)/2;
//		mtop=(parseInt(document.body.offsetHeight)-g('eftpos').offsetHeight)/2;
//
//		$('#eftpos').css({left:mleft+'px',top:mtop+'px'});
//	}    
//}

//Reallocates items for expiry in the recieve stock section
function loadFloat(tab,count,num,item,date) {
	var floatAmount=parseInt( $('.itemfloat'+count+'-'+tab).val() );
	
	if(num <=  floatAmount )
	{
		if(num < 0 && $(item).is('.itemfloat'+count+'-'+tab))
		{
			$(item).removeClass('itemfloat'+count+'-'+tab);
			newrowitemcount=parseInt($('#stockitemdata_expiryitemcount'+count+'-'+tab).val())+1;
			$('#stockitemdata_expiryitemcount'+count+'-'+tab).val(newrowitemcount);
			var this_expire='';
			this_expire+='<div class="clear"><input type="text" name="stockitemdata_expiryqty'+count+'-'+newrowitemcount+'" value="'+(-num)+'" class="itemfloat'+count+'-'+tab+'" onfocus="this.oldvalue=this.value;" onblur="if(!loadFloat('+tab+','+count+',(parseInt(this.value)-parseInt(this.oldvalue)),this,\''+date+'\')){this.value=this.oldvalue;}" style="float:left; width:15px;"/>';
			this_expire+='<div class="datepicker" onclick="displayDatePicker(\'stockitemdata_expiry'+count+'-'+newrowitemcount+'\', false, \'dmy\', \'-\');" style="float:left;">';
			this_expire+='	<div>';
			this_expire+='		<input type="text" name="stockitemdata_expiry'+count+'-'+newrowitemcount+'" value="'+date+'" onfocus="this.select();" /><img src="/media/images/date.png" alt="Choose Date" />';
			this_expire+='	</div>';
			this_expire+='</div><div class="clear"><!--  --></div></div>';
			$(item).parent('.clear').after(this_expire);				
		}
		else
		{
			floatAmount-=num;
			$('.itemfloat'+count+'-'+tab).val(floatAmount);
		}
		return true;
	}
	else
	{
		return false;
	}

}

function toggleIncExcGST(tab)
{
    if(parseInt($('#gstinc'+tab).val())!=1)
    {
        incGST(tab);
    }
    else
    {
        excGST(tab);
    }
}

function refreshGST(tab)
{
    if(parseInt($('#gstinc'+tab).val())!=1)
    {
        excGST(tab);
    }
    else
    {
        incGST(tab);
    }
}

function excGST(tab,dontcalculate)
{
    $('#gstinc'+tab).val(0);
    $('.gstinc'+tab).hide();
    $('.gstexc'+tab).show();
    $('#recordtable'+tab).removeClass('gstInclusive').addClass("gstExclusive");
    $('#gstrow'+tab).removeClass('fade');
    if(!dontcalculate)calrow_all(tab,FROM_QTY);
}

function incGST(tab,dontcalculate)
{
    $('#gstinc'+tab).val(1);
    $('.gstinc'+tab).show();
    $('.gstexc'+tab).hide();
    $('#recordtable'+tab).addClass('gstInclusive').removeClass("gstExclusive");
    $('#gstrow'+tab).addClass('fade');
    if(!dontcalculate)calrow_all(tab,FROM_QTYINCGST);
}

function updateOuters(tab, row, dimensionLower)
{
    var dimensionLower = dimensionLower?dimensionLower:"";
    var outerCellElement = $("#"+"pr-outer-"+row+"-"+tab);
    var outerUnitCellElement = $("#"+"pr-units-"+row+"-"+tab);
    var qtyCellElement = $("#"+"pr"+dimensionLower+"-qty-"+row+"-"+tab);

    outerCellElement.val(parseInt(qtyCellElement.val()) / parseInt(outerUnitCellElement.val()));
}

var FROM_BUYPRICE=0;
var FROM_MARKUP=1;
var FROM_SELLPRICE_EXC=2;
var FROM_GST=2;
var FROM_SELLPRICE_INC=3;
function calcProductPrices(containerId,from_type, decimals)
{
    if( isNumber(containerId) ) { //Then it's tab
        $('.productPricing'+containerId+' .productPricingLine.content').each(function(){
            calcProductPrices(this.id,from_type,decimals);
        });
    } else {
        var hasmarkup = parseInt($('.hasMarkup:checked', $('#' + containerId).parents('form')).val()) ? true : false;

        var sellPriceExc = numf($('#' + containerId + ' input.sellPrice').val(), decimals, FLOAT_TYPE);
        var costPrice = (hasmarkup) ? numf($('#' + containerId + ' input.costPrice').val(), 4, FLOAT_TYPE) : sellPriceExc;
        var markup = (hasmarkup) ? numf($('#' + containerId + ' input.markupPercentage').val() / 100, 4, FLOAT_TYPE) : 0.00;
        var salesTaxRate = numf($('#' + containerId + ' input.salesTaxRate').val(), 2, FLOAT_TYPE);
        var sellPriceIncTax = numf($('#' + containerId + ' input.sellPriceIncTax').val(), 4, FLOAT_TYPE);
        var dispenseExcTax = numf($('#' + containerId + ' input.dispenseExcTax').val(), 2, FLOAT_TYPE);
        var dispenseIncTax = numf($('#' + containerId + ' input.dispenseIncTax').val(), 4, FLOAT_TYPE);
        switch (from_type) {
            case FROM_MARKUP:
                sellPriceExc = costPrice * (1 + markup);
            case FROM_BUYPRICE:
                if (sellPriceExc == 0.00) {
                    sellPriceExc = costPrice * (1 + markup);
                }
                from_type = FROM_SELLPRICE_EXC;
                break;
        }
        switch (from_type) {
            case FROM_SELLPRICE_EXC:
                markup = ((sellPriceExc / costPrice) - 1);
            case FROM_GST:
                sellPriceIncTax = sellPriceExc * ((100 + salesTaxRate) / 100);
                dispenseIncTax = dispenseExcTax * ((100 + salesTaxRate) / 100);
                break;
            case FROM_DISPENSE:
                dispenseIncTax = dispenseExcTax * ((100 + salesTaxRate) / 100);
                break;
            case FROM_SELLPRICE_INC:
                sellPriceExc = sellPriceIncTax * (100 / (100 + salesTaxRate));
                markup = ((sellPriceExc / costPrice) - 1);
                break;
        }

        if (!isFinite(markup)) {
            markup = 0.00;
        }

        $('#' + containerId + ' input.costPrice').val(numfWithMinimum(costPrice, 4));
        if( sellPriceExc && costPrice && $('#' + containerId + ' input.basedOnCheckbox').prop("checked") )
        {
            $('#' + containerId + ' input.markupPercentage').val(numfWithMinimum(markup*100, 2, 2));
        }
        $('#' + containerId + ' input.sellPrice').val(numfWithMinimum(sellPriceExc, decimals));
        $('#' + containerId + ' input.sellPriceIncTax').val(numfWithMinimum(sellPriceIncTax, 4));
        $('#' + containerId + ' input.sellPriceTax').val(numfWithMinimum(numf(sellPriceIncTax, 4, FLOAT_TYPE) - numf(sellPriceExc, 4, FLOAT_TYPE), 4));
        $('#' + containerId + ' input.dispenseExcTax').val(numfWithMinimum(dispenseExcTax, decimals));
        $('#' + containerId + ' input.dispenseIncTax').val(numfWithMinimum(dispenseIncTax, decimals));
    }
}

function sendInvoiceEmail(tab,button) {
	if(g('jb-'+tab+'-work_id') && parseInt($('#jb-'+tab+'-work_id').val())>0 && ($('#emailwarninggiven'+tab).val()==0)) {
		$('.attachmentcheckbox-'+tab).each(function(){
			if(this.checked) $('#emailwarninggiven'+tab).val(2);
		});
		if($('#emailwarninggiven'+tab).val()==0) {
			$('#emailwarninggiven'+tab).val(1);
			msg('No Work Sheet has been attached!<br>Click send again to ignore this',6000,'warning');
			return false;
		}
	}

	$('#emailbutton'+button+tab).addClass('disabled').attr('disable',true);
	msg('Sending Invoice...',10000,'waiting');
	
	$('#emailwarninggiven'+tab).val(0);
	return true;
}
function disableFinancialLineItem(tab,item_row)
{
    //REMOVE INVOICE ROW
    var row = $('#row'+item_row+'-'+tab);
    $('#row'+item_row+'-'+tab).removeClass('activeLine').addClass('inActiveLine').hide();
    $('#pr-delete-'+item_row+'-'+tab).val(1);
    calrow_new (tab,item_row);
};
function enableFinancialLineItem(tab,item_row)
{
    //REMOVE INVOICE ROW
    var row = $('#row'+item_row+'-'+tab);
    $('#row'+item_row+'-'+tab).addClass('activeLine').removeClass('inActiveLine').show();
    $('#pr-delete-'+item_row+'-'+tab).val(0);
    calrow_new (tab,item_row);
};



function removeexpenserow(tab,item_row)
{
	//REMOVE INVOICE ROW
	var row = $('#row'+item_row+'-'+tab);
    $('.dispenseCell input,.cost_per_unitCell input,input.qty,.price_before_discountCell input,.priceCell input,.dispenseCell input,.total_costCell input,.markup_amountCell input,.totalCell input',row).val(0);	
    $('#pr-item-'+item_row+'-'+tab).val('');
    $('#pr-description-'+item_row+'-'+tab).val('');
    $('#pr-product-'+item_row+'-'+tab).val('');
	$('#row'+item_row+'-'+tab).hide();
	$('#pr-delete-'+item_row+'-'+tab).val(1);
	calrow_new (tab,item_row);
};
;
/* 
 * @author Kazu
 */
var myVar;
var waitUserInput;

/** PAYJUNCTION **/
//Check transaction -- if no response in n seconds, call
function checkPayJunctionTransactionUpdate(transaction_id, tab, showPrompt) {
    myVar = setInterval(function() {
        top.jaxnew("PayJunction/CheckTransactionStatus", {
            args: 'eftpostransaction_id=' + transaction_id + "'&amp;domid=" + tab + "&amp;showPrompt=" + showPrompt,
            noblock: true
        });
    }, 1500);
}

//Popup whether they want to cancel payjunction transaction or not
function clearPayJunctionTransactionUpdate(transaction_id, tab) {
    top.$('#eftpos_message').html("The transaction is taking long than usual.");
    top.$('#eftpos_message_2').html("Would you like to cancel the transaction?");
    var onclickFunction = "clearInterval(myVar); top.jaxnew('PayJunction/ClearTransaction', {args: 'eftpostransaction_id=' + " + transaction_id + " + '&amp;domid=' + " + tab + "})";
    var buttonHtml = generateYesButtonHtml("cancelYes", "Yes", onclickFunction);
    top.$('#eftpos_buttons').html(buttonHtml);
}

//Passed transaction - waiting for signature
function checkPayJunctionSignatureUpdate(transaction_id, tab) {
    top.$('#eftpos_message').html("Waiting for signature");
    top.$('#eftpos_message_2').html("");
    top.$('#eftpos_buttons').html("");
}

//If no signature after n seconds, force close if necessary
function clearPayJunctionSignatureUpdate(transaction_id, tab) {
    top.$('#eftpos_message').html("Waiting for signature...");
    top.$('#eftpos_message_2').html("(Taking longer than expected)");
    var onclickFunction = "clearInterval(myVar); top.unloadFader()";
    var buttonHtml = generateYesButtonHtml("cancelYes", "Skip", onclickFunction);
    top.$('#eftpos_buttons').html(buttonHtml);
}

function errorPayJunctionTransaction(payment_id, tab, message) {
    clearInterval(myVar);
    top.$('#eftpos_message').html(message);
    top.$('#eftpos_message_2').html("");
    var onclickFunction = "endPayJunctionTransaction(" + payment_id + "," + tab + ")";
    var buttonHtml = generateYesButtonHtml("cancelYes", "Continue", onclickFunction);
    top.$('#eftpos_buttons').html(buttonHtml);
}

//Transaction complete - just awaiting prompt
function endPayJunctionTransaction(payment_id, tab) {
    clearInterval(myVar);
    unloadFader();
    top.refresh_jax('#rtab' + tab + 'details', 'payment_id:' + payment_id);
    top.refresh_jax('.financiallist');
    top.refresh_list('#financiallist');
}

function storeTransactionTokenPrompt(transaction_id, contact_id, payment_id) {
    top.yesNoNew({
        "question": "Would you like to store this card?",
        "yesScript": function() {
            storeTransactionToken(transaction_id, contact_id, payment_id);
        },
        "noScript": function() {
            postFormPopup(contact_id, payment_id);
        }
    });
}

function storeTransactionToken(transaction_id, contact_id, payment_id) {
    top.jaxnew('PayJunction/SaveTransactionToken', {
        args: 'eftpostransaction_id=' + transaction_id,
        noblock: true,
        callback: postFormPopup(contact_id, payment_id)
    });
}

function postFormPopup(contact_id, payment_id) {
    top.formBox('financial/AfterPaymentPopup', 'prompt=1&amp;contact_id=' + contact_id + '&amp;payment_id=' + payment_id);
}

//Initialize Eftpos Transaction
function startEftposTransaction(message, message2, division, client_name, payment_amount, payment_number, payment_type, showTransactionInfo){
    payment_type = (typeof payment_type == 'undefined') ? "Purchase" : payment_type;
    showTransactionInfo = (typeof showTransactionInfo == 'undefined') ? true : showTransactionInfo;
    top.$('#eftpos_transaction_user').html("Client: " + client_name);
    top.$('#eftpos_transaction_division').html("Division: " + division);
    top.$('#eftpos_transaction_client').html("Amount: " + payment_amount);
    top.$('#eftpos_transaction_paymentnumber').html("Payment Number : " + payment_number);
    top.$('#eftpos_transaction_paymenttype').html("Payment Type : " + payment_type);
    top.$('#eftpos_message').html(message);
    top.$('#eftpos_message_2').html(message2);//Initialize
    top.$('#eftpos_buttons').html(''); //Initialize
    
    if(showTransactionInfo){
        top.$('#eftpos_transaction_infoheader').show();
    }
    else{
        top.$('#eftpos_transaction_infoheader').hide();
    }

    loadFader();

    waitUserInput = false;
    $('#eftpos_transaction').focus();
}

function showCancelWindow(transaction_id, tab){
    //clearInterval(myVar);
    if(!waitUserInput) {
        top.$('#eftpos_message').html("The transaction is taking long than usual. ");
        top.$('#eftpos_message_2').html("Would you like to cancel the transaction?");
        var buttonHtml = "";
        var onclickFunction = "cancelTransaction(" + transaction_id + "," + tab + ");";
        buttonHtml += generateYesButtonHtml("cancelYes", "Yes", onclickFunction);
        onclickFunction = "continueTransaction(" + transaction_id + "," + tab + ");";
        buttonHtml += generateNoButtonHtml("cancelNo", "No", onclickFunction);
        top.$('#eftpos_buttons').html(buttonHtml);
        waitUserInput = true;
    }
}

function continueTransaction(transaction_id, tab){
    top.$('#eftpos_message').html("Continue Transaction");
    top.$('#eftpos_message_2').html("");
    top.$('#eftpos_buttons').html("");

    top.jaxnew(
        'Eftpos/ResetTransactionTime',
        { args:'transaction_id='+transaction_id}
    );

    waitUserInput = false;
    //checkIntervalEftposTransactionUpdate(transaction_id, tab);
}

function cancelTransaction(transaction_id, tab){
    top.$('#eftpos_message').html("Wait a moment please...");
    top.$('#eftpos_message_2').html("");
    top.$('#eftpos_buttons').html("");

    top.jaxnew(
        'Eftpos/ForceCancelTransaction',
        { args:'transaction_id='+transaction_id}
    );
  //  checkIntervalEftposTransactionUpdate(transaction_id, tab);
    waitUserInput = false;
}

function updateEftposWindowMessage(message1, message2, disableButtons){
    disableButtons = (typeof disableButtons == 'undefined') ? false : disableButtons;
    top.$('#eftpos_message').html(message1);
    top.$('#eftpos_message_2').html(message2);
    if(disableButtons){
        top.$('#eftpos_buttons').html("");
    }
    waitUserInput = false;
}

function updateEftposPopupWindow(jsonData, tab){
    var jsonDataArray = JSON.parse(jsonData);

    var transactionId = jsonDataArray.transactionId;
    var message = jsonDataArray.message;
    var message_2 = jsonDataArray.message_2;
    var button1_array = jsonDataArray.button_1;
    var button2_array = jsonDataArray.button_2;

    top.$('#eftpos_message').html(message);
    top.$('#eftpos_message_2').html(message_2);
    var buttonHtml = "";
    if(button1_array){
        var onclickFunction = "sendButtonValue(" + transactionId + ", '" + button1_array["buttonId"] + "', '" + button1_array["buttonValue"] + "', " + tab + ");";
        buttonHtml += generateYesButtonHtml(button1_array["buttonId"], button1_array["buttonValue"], onclickFunction);
    }

    if(button2_array){
        var onclickFunction = "sendButtonValue(" + transactionId + ", '" + button2_array["buttonId"] + "', '" + button2_array["buttonValue"] + "', " + tab + ");";
        buttonHtml += generateNoButtonHtml(button2_array["buttonId"], button2_array["buttonValue"], onclickFunction);
    }
    top.$('#eftpos_buttons').html(buttonHtml);
    waitUserInput = false;
}

function generateYesButtonHtml(inputId, inputValue, onclickFunction){
    return "<div><input id = " + inputId + " class =\"blueGradient eftpos_blue_btn\" type=\"button\" value=\"" + inputValue + "\" onclick=\"" + onclickFunction + "\" /><i style='font-size: 13px; position: absolute; bottom: 17px; left: 21px; color: white;' class=\"icon icon-save2\"></i></div>";
}

function generateNoButtonHtml(inputId, inputValue, onclickFunction){
    return "<div><input id = " + inputId + " class =\"greyGradient eftpos_grey_btn\" type=\"button\" value=\"" + inputValue + "\" onclick=\"" + onclickFunction + "\" /><i style='font-size: 11px; position: absolute; bottom: 17px; right: 90px; color: white;' class=\"icon icon-close\"></i></div>"
}

// Check eftpos transaction record every second (Cron task is the one actually communicate with eftpos and updates the record - check cron controller -> actionGetEftposStatus)
function checkIntervalEftposTransactionUpdate(transaction_id, tab)
{
/*    myVar = setInterval(function(){
        top.jax(
        '/modules/financial/get/manageEftposResponseNew.php',
        'eftpostransaction_id='+transaction_id+'&amp;domid='+tab,
        false,
        false,
        true
    );}, 1700);*/
    myVar = setInterval(function(){
        top.jaxnew(
            'Eftpos/ManageEftposResponse',
            { args:'eftpostransaction_id='+transaction_id+'&amp;domid=' + tab}
        );}, 1700);
}

function endEftposTransaction(payment_id, transaction_id, tab){
    clearInterval(myVar);
    unloadFader();
    top.jaxnew(
        'Eftpos/DropTemporaryTable',
        { args:'transaction_id='+transaction_id}
    );
    top.refresh_jax('#rtab' + tab + 'details', 'payment_id:' + payment_id );
    top.refresh_jax('.financiallist');
    top.refresh_list('#financiallist');
}

function startPostPaymentPopup(transaction_id) {
    var counter = 0;
    myVar = setInterval(function() {
        if (counter++ > 10) {
            endPostPaymentPopup();
        }

        top.jaxnew(
            'Eftpos/AfterPaymentPopup', {
                args: 'eftpostransaction_id=' + transaction_id
            }
        );
    }, 1700);
}

function endPostPaymentPopup() {
    clearInterval(myVar);
}

function endEftposTransactionWithCloseButton(payment_id, transaction_id, tab, message, message_2){
    message_2 = (typeof message_2 == 'undefined') ? false : message_2;
    clearInterval(myVar);
    top.$('#eftpos_message').html(message);
    top.$('#eftpos_message_2').html(message_2);
    var buttonHtml = "<input id = \"OK\" class =\"buttonHolder blueGradient right\" type=\"button\" value=\"OK\" onclick=\"endEftposTransaction(" + payment_id + "," + transaction_id + "," + tab + ");\" />";
    top.$('#eftpos_buttons').html(buttonHtml);
}

function sendButtonValue(transaction_id, button_id, button_value, tab){
    updateEftposWindowMessage('Sending Button Values..', '', true);
    top.jaxnew(
        'Eftpos/SendButtonValue',
        { args:'transaction_id='+transaction_id+'&amp;button_id=' + button_id + '&amp;button_value=' + button_value + '&amp;tab=' + tab}
        );
}


/*
 * @author Daryl
 */
function loadFader()
{
    centreEftposPopup();
    $('#eftpos_transaction').show();
    $('#backgroundFader').css({
        "opacity": "0.7"
    });
    $('#backgroundFader').fadeIn("slow");
}

function unloadFader()
{
    $('#eftpos_transaction').hide();
    $("#backgroundFader").fadeOut("slow");
    $("#loading").fadeOut("fast");
}

function centreEftposPopup()
{
    var windowWidth = document.documentElement.clientWidth;
    var windowHeight = document.documentElement.clientHeight;
    var popupHeight = $("#eftpos_transaction").height();
    var popupWidth = $("#eftpos_transaction").width();
    //centering
    $("#eftpos_transaction").css({
        "position": "absolute",
        "top": (windowHeight/2-popupHeight/2)-100,
        "left": windowWidth/2-popupWidth/2
    });
    // //only need force for IE6
    // $("#eftpos_transaction").css({
    //     "height": windowHeight
    // });
}

function sendToPinpad(transactionJsonObj, tab, ezserverurl,callback)
{
    top.$('#eftpos_new').html("<span id=\"sendingToPinpadId\" style=\"text-align:center;\">Sending to Pinpad</span>\n\
                               <br />\n\
                               <input id=\"yesno_yes\" type=\"button\" class=\"hidden\" value=\"Cancel Transaction\" onclick=\"cancelEftposTransaction('"+transactionJsonObj.location+"','rtab"+ tab +"details');return false;\" />");
    loadFader();
    //console.info(transactionJsonObj.location+'?transaction_id='+transactionJsonObj.transaction_id+'&hashcode='+transactionJsonObj.hashcode);

    $.ajax({
        url: transactionJsonObj.location+'?transaction_id='+transactionJsonObj.transaction_id+'&hashcode='+transactionJsonObj.hashcode,
        dataType: 'html',
        success: function(data) {
            $(data).appendTo('eftpos_new');
            checkForEftposTransactionUpdate(transactionJsonObj.transaction_id, tab,callback);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert("Error Could Not Connect To Terminal. Please check your eftpos software is running. Status "+xhr.status);
            //alert('status is:'+xhr.status+' error is:'+console.info(thrownError));

            markAsFailedPayment(ezserverurl,transactionJsonObj,callback);
        }
    });
    $('#sendingToPinpadId').focus();
    document.onkeyup = KeyCheck;
    //$('#yesno_yes').


    //This below lot runs the script the comes back from the server after the jax is done. The above ajax code
    //(doesnt use the jax manager) and doesnt run it. So thats why we have called checkForEftposTransactionUpdate() in the code above.
    //The javascript coming back from the server (eftpos software) is not being executed, instead this function is ran.
    //
    //    top.jax(
    //        transactionJsonObj.location,
    //        'transaction_id='+transactionJsonObj.transaction_id+'&amp;hashcode='+transactionJsonObj.hashcode,
    //        'eftpos_new',
    //        false,
    //        true,
    //        false,
    //        false,
    //        failedToConnectToEftpos()
    //        );

}

function KeyCheck( event )
{
    if(event.keyCode == 27)
    {
        $('#yesno_yes').click();
    }
}


function markAsFailedPayment(ezserverurl,transactionJsonObj,callback)
{
    //this is just your old console.info();
    top.jax(
        '/modules/financial/set/markEftposAsFailed.php',
        'transaction_id='+transactionJsonObj.transaction_id+'&amp;action=failed',
        'eftpos_new',
        callback,
        true
    );
}

function cancelEftposTransaction(url,domid)
{
    alert( 'test'+domid );
    top.jax(
        url,
        'cancelTransaction=true',
        'eftpos_new',
        false,
        true
    );
    unloadFader();
    top.refresh_jax(domid);
}

function checkForEftposTransactionUpdate(transaction_id, tab,callback)
{
    //this function just adds in the delay and processes the callback.
    //setTimeout(3000, doEftposCheckUpdate(transaction_id, hashcode));
    top.jax(
        '/modules/financial/get/manageEftposResponse.php',
        'eftpostransaction_id='+transaction_id+'&amp;domid='+tab,
        'eftpos_new_scriptonly',
        callback,
        true
    );

}


function doEftposCheckUpdate(domid, id)
{
    unloadFader();
    top.refresh_jax(domid, {'payment_id':id});
    top.refresh_jax('.financiallist');
    top.refresh_list('#financiallist');
}

;
TAX_ROUNDING='Standard';
var lastTap = 0;
document.addEventListener("visibilitychange", function() {
    if (document.visibilityState === 'visible') {
        _runLockDownTimer();
    }
});

$(window).load(function(){
    var body = $('body');
    // Uses doubletap instead of dblclick (jquery.finger.min.js)
    // Double tap should always be fired on double click
    // doubletap listener for mobile, dblclick otherwise
    if (!jQuery.browser.mobile) {
        $('body').on({dblclick:function(e){
            var that = $(this);
            var args = that.data();
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.dblClickOpen')
        .on({dblclick:function(e){
            var that =$(this);
            var args = that.data();
            args.openAs = 'Tab';
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.dblClickOpenTab')
        .on({dblclick:function(e){
            var that = $(this);
            var args = that.data();
            args.openAs = 'Popup';
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.dblClickOpenPopup')
        .on({dblclick:function(e){
            var that = $(this);
            var args = that.data();
            that.trigger('getSimpleDependencies');
            args.passedArgs = that.data('simpleDependencies');
            args.passedArgs.fromDropDownFullUpdate = that.data('fullUpdateOnUpdate');
            args.passedArgs.fromDropDown = that.attr('id');
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.newDropDown.dropDownEditable');
    }else{
        $('body').on({doubletap:function(e){
            var that = $(this);
            var args = that.data();
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.dblClickOpen')
        .on({doubletap:function(e){
            var that =$(this);
            var args = that.data();
            args.openAs = 'Tab';
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.dblClickOpenTab')
        .on({doubletap:function(e){
            var that = $(this);
            var args = that.data();
             args.openAs = 'Popup';
             that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.dblClickOpenPopup')
        .on({doubletap:function(e){
            var that = $(this);
            var args = that.data();
            that.trigger('getSimpleDependencies');
            args.passedArgs = that.data('simpleDependencies');
            args.passedArgs.fromDropDownFullUpdate = that.data('fullUpdateOnUpdate');
            args.passedArgs.fromDropDown = that.attr('id');
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }},'.newDropDown.dropDownEditable');
    }

    // Singleclick to open records
    $('body').on({click:function(e){
        var that = $(this);
        var args = that.data();
        that.trigger('openRecord',[args,that]);
        delete args;
        return false;
    }},'.singleClickOpen')
    .on({click:function(e){
        var that =$(this);
        var args = that.data();
        args.openAs = 'Tab';
        that.trigger('openRecord',[args,that]);
        delete args;
        return false;
    }},'.singleClickOpenTab')
    .on({click:function(e){
        var that = $(this);
        var args = that.data();
        args.openAs = 'Popup';
        that.trigger('openRecord',[args,that]);
        delete args;
        return false;
    }},'.singleClickOpenPopup');

    //START-QTIP
    $('body.qtipsEnabled').on({
        mouseenter:function(event){
            var that = $(this);
            var delay = that.data('qtipdelay');
            delay = delay?delay:1000;
            $('.qtipLoaded').removeClass('.qtipLoaded').qtip('destroy',true);
            var recordId = parseInt(that.data('recordQtipId'));
            recordId = recordId > 0?recordId:parseInt(that.data('recordId'));
            var recordClass = that.data('recordQtipClass');
            recordClass = recordClass !== undefined?recordClass:that.data('recordClass');
            if( recordId > 0 )
            {
                that.addClass('qtipLoaded').qtip( {
                    content: {
                        text: function(event, api) {
                            $.ajax({
                                url: '/General/MouseOver',
                                type: 'POST',
                                data: {
                                    recordClass: recordClass,
                                    recordId: recordId
                                }
                            })
                            .then(function(content) {
                                // Set the tooltip content upon successful retrieval
                                api.set('content.text', content);
                            }, function(xhr, status, error) {
                                // Upon failure... set the tooltip content to the status and error value
                                api.set('content.text', status + ': ' + error);
                            });
                            return 'Loading...' // Set some initial text
                        }
                   },
                   style: {
                      //classes: 'ui-tooltip-youtube ui-tooltip-shadow ui-tooltip-rounded higher-zindex',
                      classes: 'ezy-tooltip higher-zindex',
                      width:'auto'
                   },
                   events: {
                      show: function(event, api) {
                        if( !that.data('recordId') ) {
                            // IE might throw an error calling preventDefault(), so use a try/catch block.
                            try { event.preventDefault(); } catch(e) {}
                        }
                        return true;
                      },
                      hide: function(){
    //                            $(".qtip").remove();
                      }
                   },
                   position : {viewport: $(window),target:'mouse',adjust:{method: 'flipinvert shift',x:10,y:10}},
                    overwrite   : true,
                    show: {
                        solo: true,
                        delay: delay,
                        event: event.type,
                        ready: true,
                        effect:false 
                    },
                    hide: {
                        effect:false//function(){$(this).qtip('destroy',true);}
                    },
                    render: {
                        effect:false 
                    }
                } , event );
            }
            delete that;
        }},'.hasQtip').on({
        mouseenter:function(event){
            var that = $(this);
            var delay = that.data('qtipdelay');
            delay = delay?delay:1000;
            $('.changeLogQtip.qtipLoaded').removeClass('.qtipLoaded').qtip('destroy',true);
            var recordId = parseInt(that.data('forId'));
            var recordClass = that.data('forClass');
            if( recordId > 0 )
            {
                that.addClass('qtipLoaded').qtip( {
                    content: {
                        text: function(event, api) {
                            $.ajax({
                                    url: '/core/main/list-changes.php',
                                    type: 'POST',
                                    data: {
                                        tab:1,
                                        recordClass: recordClass,
                                        recordId: recordId
                                    }
                                })
                                .then(function(content) {
                                    // Set the tooltip content upon successful retrieval
                                    api.set('content.text', content);
                                }, function(xhr, status, error) {
                                    // Upon failure... set the tooltip content to the status and error value
                                    api.set('content.text', status + ': ' + error);
                                });
                            return 'Loading...' // Set some initial text
                        }
                    },
                    style: {
                        //classes: 'ui-tooltip-youtube ui-tooltip-shadow ui-tooltip-rounded higher-zindex',
                        classes: 'ezy-tooltip higher-zindex',
                        width:'auto'
                    },
                    events: {
                        show: function(event, api) {
                            if( !that.data('forId') ) {
                                // IE might throw an error calling preventDefault(), so use a try/catch block.
                                try { event.preventDefault(); } catch(e) {}
                            }
                            return true;
                        },
                        hide: function(){
                            //                            $(".qtip").remove();
                        }
                    },
                    position : {viewport: $(window),target:'mouse',adjust:{method: 'flipinvert shift',x:10,y:10}},
                    overwrite   : true,
                    show: {
                        solo: true,
                        delay: delay,
                        event: event.type,
                        ready: true,
                        effect:false
                    },
                    hide: {
                        effect:false//function(){$(this).qtip('destroy',true);}
                    },
                    render: {
                        effect:false
                    }
                } , event );
            }
            delete that;
        }},'.changeLogQtip');
    //END-QTIP
    pageReady();
    $(body).on({
        keydown:function(e)
        {
            if(e.keyCode==13)return false;
        },
        keypress:function(e){if(e.keyCode==9){clearTimeout(idletimerTimeout);}return true;},
    },'#ezydesk input');
    $(body).on({
        keydown:function()
        {
            top.tabActivity.lastActiveTime=getBloodyTimeFFS();
        },
        click:function()
        {
            top.tabActivity.lastActiveTime=getBloodyTimeFFS();
        }
    },'*');
    $(body).on({
        click:function()
        {
            formBox('User/ChangeLocationPopup','noreload=0');
        }
    },'.userLocation')
    .on({click:function(e){
        if (e.which == 2) {
            e.preventDefault();
        }
    }})
    .on({focusField:function( e , timeout )
        {
            timeout = timeout?timeout:1000;
            var that = $(this);
            clearTimeout($('body').data('focusTimeout'));
            $('body').data('focusTimeout',setTimeout( function(){ that.focus() } , timeout ) );
            return false;
        },
    },'input,textarea')
    .on({click:function(){
        var tab = $(this).parents('form').find('.form_key input[name=tab]').val();
        var row=$(this).parents('tr');
        formBox('/modules/financial/popup/editFinancialRecordColumns.php','financialLineType='+row.attr('type')+'&amp;tab='+tab+'&amp;financialLineClass='+row.attr('record_class'));
     }},'.editColumns')
     .on({
        click:function(){
            this.select();$(this).trigger('focusField',[1]);
    }},'.financialitem td input').on({change:function(){
        var tab = $(this).parents('form').find('.form_key input[name=tab]').val();
        numf(this,2,STRING_TYPE);
        $('.discount'+tab).val(this.value).trigger('change');
     }},'.financialRecord.enabled  input.totalDiscount')
    .on({change:function(){
        var theBatchSelection = $(this).parents('.batchRow');
        var tab = $(this).parents('form').find('.form_key input[name=tab]').val();
        var row=$(this).parents('tr');
        var isSerialised = $('#productTracking'+row.attr('item_row')+'-'+row.attr('tab')).val() == "Serial";
        if( isSerialised )
        {
            var qtyField = $('.batchQty .modifiedNumberField',theBatchSelection);
            var qty = parseFloat(qtyField.val());
            if( Math.abs(qty) > 1 )
            {
                qtyField.val(qty/Math.abs(qty)).blur();
            }
        }        
     }},'.financialRecord.enabled  input.batchIsSelected')
 //CALENDAR
    .on({
        mousemove:function(e){
           getMouseXY(e);
           if(g('calendar'))
           {
               draggin(e);
           };
           if(dashdrag=='yes')
           {
               dashdraggin();
           };
        },
        mouseup:function(e){
           if(g('calendar'))
           {
               calmouseup(e);
           }
           dashup();
        }
    })    
    .on({
            mousedown:function(e)
            {            
                var calendaritem = $(this).parents('.appt');  
                if(!calendaritem)return;
                currentcalendaritem=calendaritem;   
                currentres=currentcalendaritem.data('resource')+"-"+currentcalendaritem.data('appointment');
                calrowover=calrow;
                apptRowstart=pxtorow(getTop( currentcalendaritem )+$('#calendar').y()+28-g('calendarmain').scrollTop);
                apptColstart=parseFloat(currentcalendaritem.data('col'));
                $('.appt[data-metaappointment*='+currentcalendaritem.data('metaappointment')+']').addClass('apptactive');
                apptdown='yes';
                delete calendaritem;
                return false;
            },
        },'#calendar .appt.calendarmovable img.move')
    .on( { 
            mousedown:function(e)
            {
                var calendaritem = $(this).parents('.appt');      
                if(!calendaritem.length)return;
                currentcalendaritem=calendaritem;   
                currentres=currentcalendaritem.data('resource')+"-"+currentcalendaritem.data('appointment');
                calrowover=calrow;
                apptRowstart=pxtorow(getTop( currentcalendaritem )+$('#calendar').y()+28-g('calendarmain').scrollTop);
                apptColstart=parseFloat(currentcalendaritem.data('col'));
                $('.appt[data-metaappointment*='+currentcalendaritem.data('metaappointment')+']').addClass('apptactive');
                resizerdown='yes';
                delete calendaritem;
            } 
        },'#calendar .appt.calendarmovable .rsizr'
    )
    .on({
        mousedown:function (e)
        {
            if($('#calendar .sep').length>0)
            {
                $('#mouselayer').css('z-index',95);
                calendardown='yes';
                if(!e){e=window.event;}
                calColstart=pxtocol(e.pageX);
                calrowstart=pxtorow(e.pageY);
            }	
        },
    },'#mouselayer')
//CALENDAR
 //START-Sidebar listeners
     .on({click:function(e){
        var that = $(this);
        $('#recordClass').val(that.data('recordClass'));
        $('#typeFilter').val(that.data('typeFilter'));
        $('#filterSql').val(JSON.stringify(that.data('filterSql')));
        $('#menuFilterSet').val(JSON.stringify(that.data('menuFilterSet')));
        $('#menuFlagSet').val(JSON.stringify(that.data('menuFlagSet')));
        $('#externalUrl').val(that.data('externalUrl'));
        $('#tabFilterSet').val(JSON.stringify(that.data('tabFilterSet')));
        $('.listTabs .restrict').hide();
        tabview('ltab',that.data('identifier'));
        $('.restrict.'+that.data('identifier')+'Show').show();
        if(!that.data('issingular'))
        {
            var defaultTab = $('#sideBarSubOptions .'+that.data('identifier')+'Default a' );
            defaultTab = defaultTab.length>0?defaultTab:$('#sideBarSubOptions .Default a' );
            defaultTab.click();
            $('#sideBarSubOptions,#leftpane').css('visibility','visible');
            delete defaultTab;
        } 
        else
        { 
            $('#sideBarSubOptions,#leftpane').css('visibility','hidden');
        }
    }},'#sideBarOptions ul li a')
    .on({click:function(e){
        var that = $(this);
        $('#typeFilter').val(that.data('filter'));
        $('#tabFilterSet').val(JSON.stringify(that.data('tabFilterSet')));
        $('#filter').keyup();
        tabview('ytab',that.data('identifier'));
        return false;
    }},'#sideBarSubOptions ul li a')
    .on({keyup:function(e){
        sidelist('General/SideList',{
       recordClass:$('#recordClass').val(),
       search:this.value,
       filter:$('#typeFilter').val(),
       filterSql:$('#filterSql').val(),
       menuFilterSet:$('#menuFilterSet').val(),
       menuFlagSet:$('#menuFlagSet').val(),
       externalUrl:$('#externalUrl').val(),
       tabFilterSet:$('#tabFilterSet').val(),
       allactive:$('#subTypeFilter').val(),
       openNew:0,
       items:items()},'theSideList',this.id);
    }},'#left #filter')
    .on("mousedown",".listClickOpenTab", function(e){
        if (e.which == 2) {
            var that = $(this);
            that.trigger('openRecord',[{
                recordClass:that.data('recordClass'),
                recordId:that.data('recordId'),
                clinicId:that.data('clinicId'),
                module:that.data('module'),
                openAs:'Tab'
            }]);
        }
    })
    .on({click:function(e){
        var that = $(this);
        if( e.ctrlKey || e.metaKey )
        {
            e.preventDefault();
            that.trigger('openRecord',[{
                recordClass:that.data('recordClass'),
                recordId:that.data('recordId'),
                clinicId:that.data('clinicId'),
                module:that.data('module'),
                openAs:'Tab'
            }]);
        }
        else
        {
            that.trigger('openRecordInTab',[{
                recordClass:that.data('recordClass'),
                recordId:that.data('recordId'),
                clinicId:that.data('clinicId'),
                module:that.data('module'),
                identifier:that.data('identifier'),
            }]);
        }
    }},'.listClickOpenTab')
    .on({openRecordInTab:function(e,args){
        $('#tabsarea.invisible,#toggleSidebarButtonVisible.invisible').removeClass('invisible');
        g('rtab1').className=g('rtab1details').className='active '+args.module;
        if (isSidebarVisible()) {
            $('#panes').trigger('openSideBar', [false, true, true]);
            sidebarResize();
        }

        var menuFlagSet = "{}";
        if ($('#menuFlagSet').length > 0 && $('#menuFlagSet').val() != "") {
            menuFlagSet = $('#menuFlagSet').val()
        }
        menuFlagSet = JSON.parse(menuFlagSet);
        listclick(args.recordId,'General/OpenTabRecord','recordClass='+args.recordClass+'&amp;tab=1&amp;recordId='+args.recordId+'&amp;identifier='+args.identifier+'&amp;menuFlagSet='+menuFlagSet);

    }})
//END-Sidebar listeners
    .on({click:function(e){
        var that =$(this);
        var args = that.data();
        args.openAs = 'Tab';
        that.trigger('openRecord',[args,that]);
        delete args;
        return false;
    }},'.clickOpenTab')
    .on({click:function(e){
        var that = $(this);
        var args = that.data();
        args.openAs = 'Popup';
        that.trigger('openRecord',[args,that]);
        delete args;
        return false;
    }},'.clickOpenPopup')
    .on({click:function(e){
        var that = $(this);
        var args = that.data();
        that.trigger('openRecord',[args,that]);
        delete args;
        return false;
    }},'.clickOpen')
    .on({contextmenu:function(e){
        var that = $(this);
        var args = that.data();
        if( !args.passedArgs.translationcorrection || top.translateCorrection )
        {
            that.trigger('openRecord',[args,that]);
            delete args;
            return false;
        }
    }},'.rightClickOpen')
    .on({
        openRecord:function(e,args,sourceEle){
            var recordClass = args.recordClass;
            var recordId = args.recordId;
            var recordClinicid = args.recordClinicid;

            args.passedArgs = args.passedArgs?args.passedArgs:{};
            args.passedArgs.sourceTab = sourceEle?sourceEle.parents('form').find('[name=tab]').val():1;

            args.passedArgs.clinicId = recordClinicid;

            if(args.hasOwnProperty('recordClassOpenOverride') && args.recordClassOpenOverride ) {
                // Only overwrite if not false, null, "" or 0
                recordClass = args.recordClassOpenOverride;
            }

            if(args.hasOwnProperty('recordIdOpenOverride') && args.recordIdOpenOverride) {
                // Only overwrite if not false, null, "" or 0
                recordId = args.recordIdOpenOverride;
            }

            if (args.hasOwnProperty('canDisable') && args.canDisable) {
                args.passedArgs.canDisable = 1;
            }

            if(recordClass === undefined || recordClass === null || recordClass === '')
            {
                return;
            }
            if(!args.editOnly || args.recordId )
            {
                if( args.openAs === 'Popup')
                {
                    openPopupFor(recordClass,recordId,args.passedArgs);
                }
                else
                {
                    openTabFor(recordClass,recordId,args.passedArgs);
                }
            }

            if(sourceEle.attr("closeFormBox") === "true")
            {
                cancelFormBox();
            }
            return false;
        }
    })
    .on({focus:function(e){
        this.select();
    }},'.financialRecord.enabled  input.totalDiscount')
    .on({click:function(e){
        var row=$(this).parents('tr');
        enableFinancialLineItem(row.attr('tab'),row.attr('item_row'));
    }},'.financialRecord.enabled .newEnable')
    .on({blur:function(e){
        var theValue = parseFloat(this.value);
        if( !theValue<0 )
        {
            this.value = 0;
        }
    }},'input.negative')
    .on({blur:function(e){
        var theValue = parseFloat(this.value);
        if( theValue<0 )
        {
            this.value = 0;
        }
    }},'input.positive')
    .on({keypress:function(e){
        var a = [8,0,45,46];
        var k = e.which;
        for (i = 48; i < 58; i++)
        {
            a.push(i);
        }
        if (!($.inArray(k,a)>=0))
        {
            e.preventDefault();
            return false;
        }
    }},'input.decimalField')
    .on({keypress:function(e){
        var a = [8,0];
        var k = e.which;
        for (i = 48; i < 58; i++)
        {
            a.push(i);
        }
        if (!($.inArray(k,a)>=0))
        {
            e.preventDefault();
            return false;
        }
    }},'input.integerField')
    .on({keypress:function(e){
        var a = [8,0];
        var k = e.which;
        for (i = 47; i < 58; i++)
        {
            a.push(i);
        }
        if (!($.inArray(k,a)>=0))
        {
            e.preventDefault();
            return false;
        }
    }},'input.fractionField')
    .on({change:function(e){
        check_date(this);
    }},'input.date:not(.keepRelativeDate)')
    .on({
        click:function(e){
            return false;
        },
        keydown:function(e){
            return false;
        }},':checkbox[readonly=readonly]')
    //START-DROPDOWN

    .on({
        mouseover:function(){
            $('.clearDropDown').not(this).css('visibility','hidden');
            var dropDownValue = $('.idField',this).val();
            if( !( dropDownValue =='0' || dropDownValue =='' || dropDownValue == 'undefined' ) )
            {
                $('.clearDropDown',this).css('visibility','visible');
            }
        },
        mouseout:function(){
            $('.clearDropDown',this).css('visibility','hidden');
        },
    },'.enabledDropDown .dropDownEleWrapper')
    .on({
        click:function(){
            $(this).parents('.newDropDown').trigger('setrecord',[0,true]);
        }
    },'.enabledDropDown .dropDownEleWrapper .clearDropDown')
    .on({
        updaterecord:function( e , fullUpdate)
        {
            var that = $(this);
            var values = that.data('values');
            var idField = $('.idField',that);
            if( idField.val() == "" || idField.val() == NaN )
            {
                idField.val( 0 );
            }
            var id = idField.val();
            jax_post('General/DropDownUpdate',
                'tab='+values.tab+'&amp;fullUpdate='+fullUpdate+'&amp;dropdownType='+values.dropdownType+'&amp;dropdownClass='+values.dropdownClass+'&amp;uniqueifier='+values.uniqueifier+'&amp;id='+id+'&amp;dropDownOptions='+encodeURIComponent(JSON.stringify(values.dropDownOptions)),
                false,false,true);
        },
        setrecord:function( e , id , doReset , forceUpdate )
        {
            var that = $(this);           
            var idField = $('.idField',that);
            if( id == "" || id == NaN )
            {
                id = 0;
            }     
            idField.val( id );
            if( !$('.dropDownField',that).is(":focus") || forceUpdate )
            {
                that.trigger('submitRecordSet',[doReset , forceUpdate]);
            }
        },
        getFirst:function( e  , doReset )
        {
            var that = $(this);      
            var values = that.data('values');  
            that.trigger('getDependencyString');
            var processedDependencies = that.data('dependencyString');
            that.trigger('getJoinsString');
            var processedJoins = that.data('joinsString');
            that.trigger('getDropdownFiltersString');
            var processedDropdownFilters = that.data("dropdownFiltersString");
            jax_post('General/DropDownGetFirst',
                        'tab='+values.tab+'&amp;currentlySelectedId='+$('#'+that.attr('id')+' .idField').val()+'&amp;search='+escape($('#'+that.attr('id')+' .dropDownField').val())+'&amp;dropdownType='+values.dropdownType+'&amp;dropdownClass='+values.dropdownClass+'&amp;uniqueifier='+values.uniqueifier+processedDependencies+processedJoins+processedDropdownFilters+'&amp;dropDownOptions='+encodeURIComponent(JSON.stringify(values.dropDownOptions)),
                        false,
                        false,
                        true
                     );
        },
        submitRecordSet:function( e , doReset , forceUpdate )
        {                
            var that = $(this);
//            if( that.data('searching') )
//            {
//                return false;
//            }
            var values = that.data('values');            
            var idField = $('.idField',that); 
            if( forceUpdate || parseInt(that.data('recordId')) !== parseInt(idField.val()) )
            {
                that.data('recordId',idField.val());
                $('.hasQtip',that).data('recordId',idField.val());
                if( doReset == undefined )
                {
                    doReset = false;
                }
                jax_post('General/DropDownSelect',
                    'tab='+values.tab+'&amp;dropdownType='+values.dropdownType+'&amp;dropdownClass='+values.dropdownClass+'&amp;uniqueifier='+values.uniqueifier+'&amp;id='+idField.val()+'&amp;noReset='+(doReset?0:1)+'&amp;dropDownOptions='+encodeURIComponent(JSON.stringify(values.dropDownOptions)),
                    false,false,true);
            }
        },
        getJoinsString : function()
        {
            var joinsString = '';
            var that = $(this);
            that.trigger('getJoinsObject');
            var processedJoins = that.data('joinsObject');

            if( Object.keys(processedJoins).length > 0 )
            {
                joinsString = '&amp;joinArguments='+encodeURIComponent(JSON.stringify( processedJoins ));
            }
            that.data('joinsString',joinsString);
        },
        getDropdownFiltersString : function()
        {
            var dropdownFiltersString = '';
            var that = $(this);
            that.trigger('getDropdownFiltersObject');
            var processedDropdownFilters = that.data('dropdownFiltersObject');

            if( Object.keys(processedDropdownFilters).length > 0 )
            {
                dropdownFiltersString = '&amp;processedDropdownFilters='+encodeURIComponent(JSON.stringify( processedDropdownFilters ));
            }
            that.data('dropdownFiltersString',dropdownFiltersString);
        },
        getDependencyString : function()
        {
            var dependencyString = '';
            var that = $(this);
            that.trigger('getDependencyObject');
            var processedDependencies = that.data('dependencyObject');
            /*
             * If there are argument values pass them through
             */
            if( Object.keys(processedDependencies).length > 0 )
            {
                dependencyString = '&amp;elementValueArguments='+encodeURIComponent(JSON.stringify( processedDependencies ));
            }
            that.data('dependencyString',dependencyString);
        },
        getSimpleDependencies : function()
        {
            var that = $(this);
            var simpleDependencies = {};
            that.trigger('getDependencyObject');
            var processedDependencies = that.data('dependencyObject');
            for( var key in processedDependencies )
            {
                if ( processedDependencies.hasOwnProperty(key) )
                {
                    if( processedDependencies[key]['comparator'] == '=' )
                    {
                       simpleDependencies[key] = processedDependencies[key]['value'];
                    }
                }
            }
            delete processedDependencies;
            that.data('simpleDependencies',simpleDependencies);
        },
        getDependencyObject:function(){
            var key;
            var that = $(this);
            var values = that.data('values');
            var absoluteArguments = values.absoluteArguments;
            var dependentElementValueArguments = values.dependentElementValueArguments;
            var nonDependentElementValueArguments = values.nonDependentElementValueArguments;
            var processedDependencies = {};
            /*
             * These are arguments used for the search query that have a fixed value
             * (e.g. if you just want to restrict on contacts that are clients)
             * So these do not need to be processed
             */
            if( absoluteArguments )
            {
                for( key in absoluteArguments )
                {
                    var matches = [];
                    var  processedAbsoluteArgs = absoluteArguments[key];
                    var instancere = /<jQuerySelector>([\s\S]*?)<\//ig;
                    while( match = instancere.exec(absoluteArguments) ){
                           matches[matches.length] = match[1];
                           processedAbsoluteArgs = processedAbsoluteArgs.replace('<jQuerySelector>'+match[1]+'<\/jQuerySelector>',$(match[1]).val());
                    };
                    processedDependencies[key]= processedAbsoluteArgs;
                };
            }

            /*
             * These are arguments used in the search query that are taken from input fields, such as those from dropdowns. 
             * (e.g. You want to restrict invoices to a selected client contact)
             * These are jquery seloectors that need to be processed and values grabbed
             */
            if( dependentElementValueArguments )
            {
                for( key in dependentElementValueArguments )
                {
                    var dependentValue = 0;
                    var dependentComparator = "=";
                    if( dependentElementValueArguments[key]['value'] )
                    {
                        dependentValue = $( dependentElementValueArguments[key]['value'] ).val();
                        dependentComparator = dependentElementValueArguments[key]['comparator'];
                    }
                    else
                    {
                        dependentValue = $( dependentElementValueArguments[key] ).val();
                    } 
                    processedDependencies[key] = {'value':dependentValue,'comparator':dependentComparator};
                }
            }
            /*
             * Same as before however if there is no value is is not used
             */
            if( nonDependentElementValueArguments )
            {
                for( key in nonDependentElementValueArguments )
                {
                    var nonDependentValue = 0;
                    var nonDependentComparator = "=";
                    if( is_array( nonDependentElementValueArguments[key] ) )
                    {                                    
                        nonDependentValue = $( nonDependentElementValueArguments[key]['value'] ).val();
                        nonDependentComparator = nonDependentElementValueArguments[key]['comparator'];
                    }
                    else
                    {
                        nonDependentValue = $( nonDependentElementValueArguments[key] ).val();
                    }                                        
                    if( nonDependentValue != undefined && nonDependentValue != "" && parseInt(nonDependentValue) != 0 && nonDependentValue != 'NaN' )
                    {
                        processedDependencies[key] = { 'value':nonDependentValue, 'comparator':nonDependentComparator };
                    }
                    else if ( processedDependencies[key] != undefined)
                    {
                        delete processedDependencies[key];
                    }
                }
            }
            that.data('dependencyObject',$.extend({},processedDependencies));
        },
        getJoinsObject:function(){
            var key;
            var that = $(this);
            var values = that.data('values');
            var joins = values.joins;
            var processedDependencies = {};

            if( joins )
            {
                for( key in joins )
                {
                    var matches = [];
                    var processedJoins = joins[key];
                    var instancere = /<jQuerySelector>([\s\S]*?)<\//ig;
                    while( match = instancere.exec(joins) ){
                        matches[matches.length] = match[1];
                        processedJoins = processedJoins.replace('<jQuerySelector>'+match[1]+'<\/jQuerySelector>',$(match[1]).val());
                    };
                    processedDependencies[key]= processedJoins;
                };
            }
            that.data('joinsObject',$.extend({},processedDependencies));
        },

        getDropdownFiltersObject:function(){
            var key;
            var key2;
            var that = $(this);
            var dropdownFilters = JSON.parse(JSON.stringify(that.data('values').dropdownFilters));

            if( dropdownFilters )
            {
                for( key in dropdownFilters )
                {
                    var matches = [];
                    var processedDropdownFilters= dropdownFilters[key].filter;
                    for (key2 in processedDropdownFilters) {
                        var instancere = /<jQuerySelector>([\s\S]*?)<\//ig;
                        while( match = instancere.exec(processedDropdownFilters[key2]) ){
                            matches[matches.length] = match[1];
                            if ($.isArray(processedDropdownFilters[key2])) processedDropdownFilters[key2] = processedDropdownFilters[key2][0];
                            processedDropdownFilters[key2] = processedDropdownFilters[key2].replace('<jQuerySelector>'+match[1]+'<\/jQuerySelector>',$(match[1]).val());
                            if (processedDropdownFilters[key2] == 0 || processedDropdownFilters[key2] == "") {
                                delete(processedDropdownFilters[key2]);
                            }
                        };
                        //HAX HERE - sometimes we want to replace more than one jQuery selector - there will be a better way of doing this but this will do for now! - RR
                        while( match = instancere.exec(processedDropdownFilters[key2]) ){
                            matches[matches.length] = match[1];
                            if ($.isArray(processedDropdownFilters[key2])) processedDropdownFilters[key2] = processedDropdownFilters[key2][0];
                            processedDropdownFilters[key2] = processedDropdownFilters[key2].replace('<jQuerySelector>'+match[1]+'<\/jQuerySelector>',$(match[1]).val());
                            if (processedDropdownFilters[key2] == 0 || processedDropdownFilters[key2] == "") {
                                delete(processedDropdownFilters[key2]);
                            }
                        };
                    }
                    dropdownFilters[key].filter = processedDropdownFilters;
                };
            }

            that.data('dropdownFiltersObject',$.extend({},dropdownFilters));
        },

        disable:function( e ) {
            var theDropdown = $(this);
            var data = theDropdown.data('values');
            data.disabled = true;
            theDropdown.data('values', JSON.stringify(data));
            theDropdown.prop('disabled', true).addClass('disabledDropDown').removeClass('enabledDropDown');
            theDropdown.find('.dropDownField').prop('readonly', true);
            theDropdown.find('.dropDownEleWrapper').find('i').addClass('icon-lock-stroke').removeClass('icon-magnifying-glass').removeClass('searchIcon');
        },
        enable:function( e ) {
            var theDropdown = $(this);
            var data = theDropdown.data('values');
            data.disabled = false;
            theDropdown.data('values', JSON.stringify(data));
            theDropdown.prop('disabled', false).addClass('enabledDropDown').addClass('searchIcon').removeClass('disabledDropDown');
            theDropdown.find('.dropDownField').prop('readonly', false);
            theDropdown.find('.dropDownEleWrapper').find('i').addClass('icon-magnifying-glass').removeClass('icon-lock-stroke');
        }
    },".newDropDown")
    .on({
        slidedown:function( e )
        {
            $(this).slideDown(300);
        },
        slideup:function( e )
        {
            $(this).slideUp(300);
        },
    },".newDropDown .dropDownList")
    .on({
        click:function( e )
        {
            $(this).EzyDropDownClick();
            return true;
        },
    },".newDropDown .dropDownList .dropDownListItem")
    .on({
        keyup:function( e )
        {  
            if( e.keyCode == 46 || e.keyCode == 8 || e.type == 'blur' )
            {
                var dropDownField = $(this);
                var dropDownElement = dropDownField.parents('.newDropDown');//The wrapper element
                if( dropDownField.attr('value') == '' )
                {
                    dropDownElement.trigger('setrecord',[0,true]);
                }
                delete dropDownField;
                delete dropDownElement;
            }
        },
        /*
         * Biding for the key down field(the dropdown search)
         */
        keydown:function( e ){
            var dropDownField = $(this);
            var dropDownElement = dropDownField.parents('.newDropDown');//The wrapper element
            var dropDownList = dropDownElement.find('.dropDownList');//The list items get generated into
            var dropDownListCurrentItem = $('.selectedItem',dropDownList);//The currently selected item in the list
            dropDownElement.trigger('getDependencyString');
            dropDownElement.data('searching',true);
            var elementValueArgumentsString = dropDownElement.data('dependencyString');
            dropDownElement.trigger('getJoinsString');
            var processedJoins = dropDownElement.data('joinsString');
            dropDownElement.trigger('getDropdownFiltersString');
            var processedDropdownFilters = dropDownElement.data('dropdownFiltersString');

            if(!e){e=window.event;}
            if( dropDownElement.data('ddActive') ){
                //Up Arrow
                if( e.keyCode==38 ){
                    dropDownListCurrentItem.prev().EzyDropDownClick();
                }                                
                //Down Arrow
                if( e.keyCode==40 ){
                    dropDownListCurrentItem.next().EzyDropDownClick();
                }
                // Tab
                if( e.keyCode==9 || e.keyCode==13 ){                                    
                    dropDownList.trigger('slideup');
                    dropDownField.val(dropDownField.attr('title'));
                    return true;
                }
                // Enter Key
                if( e.keyCode==13 || e.keyCode==40 || e.keyCode==38 ){
                    return true;
                }
            }
            else if(e.keyCode==13)
            {
                return true;
            }
            var theFunction = function( theDropDownId , thatField ){
                return function(){
                    var theDropDown = $('#'+theDropDownId);
                    var values = theDropDown.data('values');
                    var dropDownList = $('.dropDownList',theDropDown);
                    $('.dropDownList').not(dropDownList).hide();
                    dropDownList.html('<div class="dropdownLoading"><img src="/media/images/load.gif"/><b>Loading....</b></div>').show();
                    jax_post('General/DropDownList',
                        'tab='+values.tab+'&amp;currentlySelectedId='+$('#'+theDropDownId+' .idField').val()+'&amp;search='+encodeURIComponent(thatField.value)+'&amp;dropdownType='+values.dropdownType+'&amp;dropdownClass='+values.dropdownClass+'&amp;uniqueifier='+values.uniqueifier+'&amp;dropdown='+dropDownList.attr('id')+elementValueArgumentsString+processedJoins+processedDropdownFilters+'&amp;dropDownOptions='+encodeURIComponent(JSON.stringify(values.dropDownOptions)),
                        dropDownList.attr('id'),
                        function(){ $(thatField).parents('.newDropDown').data('ddActive',true); theDropDown.data('searching',false);},
                        true
                     );
                     delete values;
                     delete theDropDown;
                     delete thatField;
                     delete dropDownList;
                }
            }( dropDownElement.attr('id') , this);
            idletimerNew('dropdown',theFunction,1000);
            delete dropDownField;
            delete dropDownElement;
            delete dropDownList ;
            delete dropDownListCurrentItem;
            delete elementValueArgumentsString;
            delete processedJoins;
            delete processedDropdownFilters;
        },
        blur:function( e )
        {
            clearIdleTimerNew('dropdown');
            var dropDownElement = $(this).parents('.newDropDown');//The wrapper element     
            dropDownElement.trigger('submitRecordSet',[true]);  
        },
        click:function(){
            this.focus();
            this.select();
        },
        focusout:function(){
            var dropDownField = $(this);
            var dropDownList = dropDownField.parent().siblings('.dropDownList');
            var theDropDown = dropDownField.parents('.newDropDown');
            dropDownField.val(dropDownField.attr('title'));
            theDropDown.data('listUp',setTimeout(function(){dropDownList.hide();/*.trigger('slideup');*/ },200));
            delete theDropDown;
            delete dropDownField;
            delete dropDownList;
        }
    },".newDropDown.enabledDropDown input.dropDownField")
    .on(
        "tap",//Had 'tap' and 'click', which resulted in double event trigering
        ".newDropDown.enabledDropDown .searchIcon",
        function(e) {
            var that = $(this);
            var theDropDown = that.parents('.newDropDown');
            var dropDownField = $(this).siblings('input.dropDownField');
            var dropDownList = $('.dropDownList',theDropDown);
            var values = theDropDown.data('values');
            theDropDown.trigger('getDependencyString');
            var elementValueArgumentsString = theDropDown.data('dependencyString');
            theDropDown.trigger('getJoinsString');
            theDropDown.trigger('getDropdownFiltersString');
            var processedJoins = theDropDown.data('joinsString');
            var processedDropdownFilters = theDropDown.data('dropdownFiltersString');
            clearTimeout(theDropDown.data('listUp'));
            dropDownField.focus().select();
            $('.dropDownList:visible').not('#'+dropDownList.attr('id')).trigger('slideup');
            dropDownList.empty().html('<div class="dropdownLoading"><img src="/media/images/load.gif"/><b>Loading....</b></div>').show();
            jax_post('General/DropDownList',
                'tab='+values.tab+'&amp;currentlySelectedId='+$('.idField',theDropDown).val()+'&amp;dropdownType='+values.dropdownType+'&amp;dropdownClass='+values.dropdownClass+'&amp;dropdown='+$('.idField',theDropDown).attr('id')+'&amp;uniqueifier='+values.uniqueifier+'&amp;'+'&amp;dropDownOptions='+encodeURIComponent(JSON.stringify(values.dropDownOptions))+'&amp;'+elementValueArgumentsString+processedJoins+processedDropdownFilters,dropDownList.attr('id'),false,true);
            delete dropDownList;
            delete elementValueArgumentsString;
            delete processedJoins;
            delete processedDropdownFilters;
        }
    )
    //END-DROPDOWN
    //START-INVOICE    
    .on({
        change:function(){
            var form = $(this).parents('form');
            var tab = form.find('.form_key input[name=tab]').val();
            var originalDate = this.value;
            var clientcontact_id = form.find('input[name=invoicedata_clientcontact]').val();
            var paymentterms_id = form.find('input[name=invoicedata_terms]').val();
            top.jax('modules/financial/get/recalculateDueDate.php','paymentterms_id='+paymentterms_id+'&amp;tab='+tab+'&amp;contact_id='+clientcontact_id+'&amp;date='+originalDate,null,null,true);
        } 
    },".financial input.invoiceDate")
    //END-INVOICE  
    //START-PRODUCTCONTAINER    
    .on({
        click:function(){
            if( parseInt(this.value) <= 0 )
            {
                this.value = 0;
            }
        } 
    },".productContainerLines .financialitem.lineNotApproved input.qty")
    //END-PRODUCTCONTAINER 
    //START-FINANCIALLINES 
    /*
     */
    .on({
        change:function(){
            // var thisField = $(this);
            // var row=thisField.parents('tr');
            // var orderedQty = row.find('.orderedQty');
            // var previouslyReceived = row.find('.previouslyReceived');
            // var remaining = parseFloat( orderedQty.val() ) - parseFloat( previouslyReceived.val() );
            // keepInRangeNew( this , 0 , remaining  );
            numf(this.value,4,FLOAT_TYPE);
        }
    },".financialitem.lineNotApproved input.received_qty")
    .on({
        change:function(){
            var row = $(this).parents('tr');
            var theRecordTab = row.parents('#rtab'+row.attr('tab')+'details');
            var forClass = $('.form_key [name=formkey_class]',theRecordTab).val();
            var forId = $('.form_key [name=formkey_id]',theRecordTab).val();
            var forInvoiceContact = $('[name=invoicedata_clientcontact]',theRecordTab).val();
            var invoiceTemplateId = parseInt($(this).val());
            if( invoiceTemplateId > 0 )
            {
                top.yesNoNew({
                    'question' : 'Are you sure you want to bring in the linked Sales Template?',
                    'yesScript' : function(){top.jaxnew('modules/financial/get/addInvoiceTemplate.php',{
                                     args:'recordId='+forId+'&amp;clientContactId='+forInvoiceContact+'&amp;recordType='+forClass+'&amp;tab='+row.attr('tab')+'&amp;row=' + $('#totalrows' + row.attr('tab') +'').increment().val() + '&amp;invoicetemplate_id='+invoiceTemplateId,
                                     callback:function(){$('#row'+row.attr('item_row')+'-'+row.attr('tab')+' .ar .newRemove').trigger('click');cancelFormBox();},
                                     post:false,
                                     target:'row'+row.attr('item_row')+'-'+row.attr('tab'),
                                     how:'after'
                                 });},
                    'noScript' : function(){$('#row'+row.attr('item_row')+'-'+row.attr('tab')+' .productDropDown .newDropDown').trigger('setrecord',[0])},
                    'yesName' : 'Yes',
                    'noName' : 'No'
                  });
            }
        } 
    },".financialitem.lineNotApproved input.invoiceTemplateId")
    .on({
        focus:function(){
          $(this).data('old',this.value);
        },
        change:function() {
            var row = $(this).parents('tr');
            var isSerialised = $('#productTracking' + row.attr('item_row') + '-' + row.attr('tab')).val() == "Serial";
            var minimumUnit = parseFloat($('#pr-minimum_unit-' + row.attr('item_row') + '-' + row.attr('tab')).val());
            var usedEle = $('#pr-qtyused-' + row.attr('item_row') + '-' + row.attr('tab'));
            usedEle.val(this.value);
            if (minimumUnit > 0) {
                if (this.value < minimumUnit) {
                    this.value = minimumUnit;
                }
                // }else{
                //      this.value = numf(numf(this.value/minimumUnit,0)*minimumUnit,2);
                // }
            }
            $('#pr-qtywasted-' + row.attr('item_row') + '-' + row.attr('tab')).val(this.value - usedEle.val());
            if (isSerialised) {
                this.value = limitIt(this.value, -100, 100);
            }
            numf(this, isSerialised ? 0 : 4, FLOAT_TYPE);
            var highQty = $('#pr-highqty-' + row.attr('item_row') + '-' + row.attr('tab'));
            if ( highQty.length )
            {
                if( $(this).data('old') == $(highQty).val() || parseFloat(highQty.val()) < parseFloat($(this).val()) )
                {
                    highQty.val($(this).val()).change();
                }
            }
            calculateCost(row.attr('tab'),row.attr('item_row'),false,'');
            calrow_new(row.attr('tab'),row.attr('item_row'),FROM_QTY,'');
        } 
    },".financialitem.lineNotApproved input.qty")
        .on({
            change:function(){
                var row=$(this).parents('tr');
                var isSerialised = $('#productTracking'+row.attr('item_row')+'-'+row.attr('tab')).val() == "Serial";
                if( isSerialised )
                {
                    this.value = limitIt(this.value,-100,100);
                }
                numf(this,isSerialised?0:4,FLOAT_TYPE);
                calculateCost(row.attr('tab'),row.attr('item_row'),false,'high');
                calrow_new(row.attr('tab'),row.attr('item_row'),FROM_QTY,'high');
            }
        },".financialitem.lineNotApproved input.highqty")
    .on({
        change:function(){
            var row=$(this).parents('tr');
            var columnsToToggle = $('.price_before_discountCell input,.priceCell input,.dispenseCell input',row);
            if( $(this).prop('checked'))
            {
                columnsToToggle.attr("readonly",false);
            }
            else
            {
                columnsToToggle.attr("readonly",true);
            }
            var columnsToToggle = $('.gstRateSelector',row);
            if( $(this).prop('checked'))
            {
                columnsToToggle.removeClass("disabledInput");
            }
            else
            {
                columnsToToggle.addClass("disabledInput");
            }
        } 
    },".financialitem.lineNotApproved input.fixedprice")
    .on({
        click:function(){
            var row=$(this).parents('tr');
            var table = row.parents('table');
            $(this).removeClass('ordered').addClass('pending');
            var tableBody = $('tbody',table);
            var rows = $('tr',tableBody).not('.placeHolder');
            rows.sort(function(a,b){
                var orderableItema = parseInt($(a).data('originalOrder'));
                var orderableItemb = parseInt($(b).data('originalOrder'));
                if(orderableItema > orderableItemb) {
                        return 1;
                }
                if(orderableItema < orderableItemb) {
                        return -1;
                }
                return 0;
            });
            rows.detach().appendTo(tableBody);
            adjustRowOrderValues(row.attr('tab'),true);
        } 
    },".financialitem .reorderHeader.ordered")
    .on({
        click:function(){
            var row=$(this).parents('tr');
            var cellsToOrderBy = $(this).data('columnClass');
            var table = row.parents('table');
            $('.reorderHeader',table).addClass('pending').removeClass('ordered');
            $(this).removeClass('pending').addClass('ordered');
            var tableBody = $('tbody',table);
            var rows = $('tr',tableBody).not('.placeHolder');
            rows.sort(function(a,b){
                var orderableItema = $('.'+cellsToOrderBy+'Cell input[type=text]:visible',a).val();
                var orderableItemb = $('.'+cellsToOrderBy+'Cell input[type=text]:visible',b).val();
                if( !isNaN( orderableItemb ) && !isNaN( orderableItema ) )
                {
                    orderableItema = orderableItema?parseFloat(orderableItema):0;
                    orderableItemb = orderableItemb?parseFloat(orderableItemb):0;
                }
                else
                {
                    orderableItema = orderableItema?orderableItema.trim().toLowerCase():"";
                    orderableItemb = orderableItemb?orderableItemb.trim().toLowerCase():"";
                }

                if(orderableItema > orderableItemb) {
                        return 1;
                }
                if(orderableItema < orderableItemb) {
                        return -1;
                }
                return 0;
            });
            rows.detach().appendTo(tableBody);
            adjustRowOrderValues(row.attr('tab'),true);
        } 
    },".financialitem .reorderHeader.pending")
    .on({
        change:function(){
            var row=$(this).parents('tr');
            if( $(this).prop('checked'))
            {
                row.removeClass('exclude').addClass('include');
            }
            else
            {
                row.addClass('exclude').removeClass('include');
            }
            row.find('input.qty').trigger('change');
        } 
    },".financialitem.lineNotApproved input.accepted")
    .on({
        change:function(){
            var row=$(this).parents('tr');
            if( this.value < 0 )
            {
                row.addClass('selectStock').removeClass('addStock');
            }
            else
            {
                row.removeClass('selectStock').addClass('addStock');
            }
        } 
    },".receiveStockTable .financialitem.lineNotApproved input.qty, .stockAdjustmentLines .financialitem.lineNotApproved input.qty")
    
    .on({
        change:function(){
            var row=$(this).parents('tr');
            switch( row.attr('type') )
            {
                case "receiveinvoiceitem":
                case "receivestockitem":
                {
                    row.find('.remaining').val( numfWithMinimum( parseFloat( row.find('.orderedQty').val() ) - parseFloat( row.find('.previously_received').val() ) - parseFloat( this.value ) , 4 , 0 ) );
                    break;
                }
                case "stockadjustmentitem":
                {
                    row.find('.in_stock').val( numfWithMinimum( parseFloat(this.value)+parseFloat(row.find('.org_in_stock').val()) ,4,0));
                    break;
                }
            }
            if( parseFloat(this.value) )
            {
                $(this).trigger('updateDiscounts');
            }
            $('.batchCell',row).trigger('reload');
        } ,
        updateProducts:function(){
            var row=$(this).parents('tr');
            $('.product_codeCell .productDropDown .newDropDown',row).trigger('submitRecordSet',[false,true]);
//            $(this).trigger('updateDiscounts');//Not required as previous call will handle this
        },
        updateDiscounts:function(){
            var row=$(this).parents('tr');
            switch( row.attr('type') )
            {
                case "invoice":
                case "invoiceexpense":
                case "customerorder":
                case "customerorderexpense":
                case "quotation":
                case "quotationexpense":
                case "recurringinvoice": 
                case "recurringinvoiceexpense":
                    var that = this;

                    idletimerNew(this.id,function(){
                        var division = row.find('.divisionCell .idField').val();
                        division = division==null?parseInt($('#ownershipownershipseparationDropdown'+row.attr('tab')+' .idField').val()):division;
                        $.ajax({
                            url: '/Financial/ApplyPricingRules',
                            type: 'POST',
                            dataType:'json',
                            data: {
                                row:row.attr('item_row'),
                                tab:+row.attr('tab'),
                                contact_id:parseInt($('#clientcontactDropdown'+row.attr('tab')+' .idField').val()),
                                animal_id:parseInt($('#animalDropdown'+row.attr('tab')+' .idField').val()),
                                consult_id:
                                    parseInt($('input[name="invoicedata_consult"]').
                                        val()),
                                //product_id:$('#pr-product-'+row.attr('item_row')+'-'+row.attr('tab')).val(),
                                includesTax:parseInt($('#gstinc'+row.attr('tab')).val()),
                                ignoreRoundingRules:(row.attr('type') == "quotation" || row.attr('type') == "quotationexpense" ? 1 : 0),
                                division:division,
                                taxCode:$('#pr-gstcode-'+row.attr('item_row')+'-'+row.attr('tab')).val(),
                                itemQty:$('#pr-qty-'+row.attr('item_row')+'-'+row.attr('tab')).val(),
                                //productpricing_id:row.find('.productDropDown .idField').val(),
                                product_id:row.find('.productDropDown .idField').val(),
                                priceTax:$('#pr-pricebeforediscountgst-'+row.attr('item_row')+'-'+row.attr('tab')).val(),
                                priceExcTax:$('#pr-pricebeforediscount-'+row.attr('item_row')+'-'+row.attr('tab')).val(),
                                dispenseTax:$('#pr-dispensegstorg-'+row.attr('item_row')+'-'+row.attr('tab')).val(),
                                dispenseExcTax:$('#pr-dispenseorg-'+row.attr('item_row')+'-'+row.attr('tab')).val(),
                                recordDate:encodeURI($('#rtab'+row.attr('tab')+'details .recordDate').val()),
                                recordTime:encodeURI($('#rtab'+row.attr('tab')+'details .recordTime').val())
                            }
                        })
                        .then(function(content) {
                            var productId = row.find('.productDropDown .idField').val();
                            if( content.Warnings )
                            {
                                var warningFunction = function( warning , index ){
                                    top.idletimerNew('warning'+index,function(){msg(warning,5000,'warning')},1000);
                                }
                                content.Warnings.forEach(warningFunction);
                            }
                            if( productId != content.Product )
                            {
                                row.find('.productDropDown .newDropDown').trigger('setrecord',[content.Product]);

                            }
                            else {
                                if (content.changePrice) {
                                    $('#pr-priceincgst-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.priceIncTax);
                                    $('#pr-pricegst-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.priceTax);
                                    $('#pr-price-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.priceExcTax);

                                }
                                if (content.changeDispense) {
                                    $('#pr-dispenseincgst-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.dispenseIncTax);
                                    $('#pr-dispensegst-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.dispenseTax);
                                    $('#pr-dispense-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.dispenseExcTax);
                                }
                                if (content.changePrice || content.changeDispense) {
                                    calrow_new(row.attr('tab'), row.attr('item_row'));
                                }
                                if (content.discountPercentage) {
                                    $('#pr-discount-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.discountPercentageAmount);
                                    $('#pr-discountamount-' + row.attr('item_row') + '-' + row.attr('tab') + '').val(content.discountPercentageAmount);
                                }
                            }
                        }, function(xhr, status, error) {
                            // Upon failure... set the tooltip content to the status and error value
                            console.info(status + ': ' + error);
                        });
                },100);
                default: break;
            }
        }
    },".financialitem.lineNotApproved input.qty, .financialitem.lineNotApproved input.priceBeforeDiscount")
    .on({
        updateStockAvailable:function()
        {
            var row = $(this);
            if( $('.productTracking',row).val() != 'No' )
            {
                $.ajax({
                    url: '/Product/GetStockStats',
                    type: 'POST',
                    dataType:'json',
                    data: {
                        identifierSeparation: row.find('.identifierSeparation').val(), 
                        ownershipSeparation: row.find('.locationCell .idField').val(), 
                        product: row.find('.product_codeCell .idField').val(), 
                    }
                })
                .then(function(content) {
                    row.find('.org_in_stock').val(content.inStock).change();
                    row.find('.stockAvailable').val(content.available).change();
                    //row.find('.stockTurn').val(content.stockTurn).change();
                    row.find('.stockOnOrder').val(content.onOrder).change();
                    row.find('.stockTurn').val(content.stockTurn).change();
                }, function(xhr, status, error) {
                    // Upon failure... set the tooltip content to the status and error value
                    console.info([status + ': ' + error]);
                });
            }
            else
            {
                row.find('.org_in_stock').val('N/A').change();
                row.find('.stockAvailable').val('N/A').change();
                row.find('.stockTurn').val('N/A').change();
            }
            
        }   
    },".financialitem.lineNotApproved")
    .on({ 
        change:function(){
            var thisField = $(this);
            var newInStock = parseFloat(thisField.val())+parseFloat(thisField.parents('.financialitem').find('.qty').val());
            thisField.parents('.financialitem').find('.in_stock').val( numfWithMinimum( newInStock , 4 , 0) ).change();
        }
    },".financialitem.lineNotApproved .org_in_stock")
    .on({ 
        change:function(){
            var thisField = $(this);
            var therow = thisField.parents('.financialitem');
            var newInStock = parseFloat(thisField.val())-parseFloat(therow.find('.org_in_stock').val());
            therow.find('.qty').val( numfWithMinimum( newInStock , 4 , 0) ).change();
        }
    },".financialitem.lineNotApproved .in_stock")
    .on({ 
        change:function(){
            var thisField = $(this);
            var row = thisField.parents('tr');
            var qty = parseFloat(row.find('.quantityCell .qty').val());
            var available = parseFloat(thisField.val());
            var isBought = parseInt(row.find('.isBought').val())==1;
            if( !isBought || available >= qty )
            {
                $('.suppliedLineRadio input[value=1]',row).prop('checked',true);
                $('.supplierLineDropdown',row).hide();
            }
            else
            {
                $('.suppliedLineRadio input[value=0]',row).prop('checked',true);
                $('.supplierLineDropdown',row).show();
            }
            if( isBought )
            {
                $('.suppliedLineRadio input[value=0]',row).prop('disabled',false);
            }
            else
            {
                $('.suppliedLineRadio input[value=0]',row).prop('disabled',true);
            }
        }
    },".CustomerOrderForm .financialitem.lineNotApproved .stockAvailable")
    .on({
        change:function(){
            var theRow = $(this).parents('.financialitem'); 
            theRow.find('input.qty').trigger('change');
        }
    },".productTracking")
    .on({
        change:function(){
            var row=$(this).parents('tr');
            numf(this,4,FLOAT_TYPE);
            $('#pr-qty-'+row.attr('item_row')+'-'+row.attr('tab')).val(numfWithMinimum((parseFloat(this.value)*parseFloat($('#pr-units-'+row.attr('item_row')+'-'+row.attr('tab')).val())),4,0)).change();
        } 
    },".financialitem.lineNotApproved input.outer")
    .on({
        focus:function(){
            this.select();
        } 
    },".financialitem td input")
    .on({
        doubletap:function(){
            var tab = $(this).parents('form').find('.form_key input[name=tab]').val();
            if( $('.invrow'+tab+'.lineApproved').length == 0 )
            {
                toggleIncExcGST(tab);
            }
            return false;
        } 
    },".financialRecord.recordNotApproved .gstLabel")
    .on({
        change:function(e){
            var row=$(this).parents('tr');
            numfWithMinimum(this,4,2);
            calrow_new (row.attr('tab'),row.attr('item_row'),FROM_PRICE);
            calculateMarkup(row.attr('tab'),row.attr('item_row'));
        } 
    },".recordNotApproved .financialitem input.price")
    .on({
        keydown:function(e){
            if(!e){
                e=window.event;
            };
            return true;
        },
        change:function(e) {
            var row=$(this).parents('tr');
            numfWithMinimum(this,4,2);
            calrow_new (row.attr('tab'),row.attr('item_row'),FROM_PRICE_BEFORE_DISCOUNT);
            calculateMarkup(row.attr('tab'),row.attr('item_row'));
            calrow_new (row.attr('tab'),row.attr('item_row'),FROM_PRICE_BEFORE_DISCOUNT);
        }
    },".recordNotApproved .financialitem input.priceBeforeDiscount")
    .on({
        change:function(e){
            var row=$(this).parents('tr');
            numfWithMinimum(this,4,2);
            calrow_new (row.attr('tab'),row.attr('item_row'),FROM_DISPENSE);
            calculateMarkup(row.attr('tab'),row.attr('item_row'));
        } 
    },".recordNotApproved .financialitem input.dispense")
    .on({
        keydown:function(e){
            var row=$(this).parents('tr');
            if(!e){
                e=window.event;
            };
            return true;
        },
        change:function () {
            var row=$(this).parents('tr');
            var totalInputField = row.find('input.total');
            var nominalType = row.find('input.accountNominalType').val();
            numf(this,2,STRING_TYPE);
            totalInputField.val(this.value*(nominalType=='DEBIT'?-1:1));
            $('#subtotal'+row.attr('tab')).val($('#recordtable'+row.attr('tab')+' .total').sum());
            calrow_all(row.attr('tab'),FROM_TOTAL);
        }
    },".financialitem.lineNotApproved input.alteredAmount")
    .on({
        change:function(e){
            var row=$(this).parents('tr');
            numf(this,2,STRING_TYPE);
            calculateMarkup(row.attr('tab'),row.attr('item_row'));
            calrow_new (row.attr('tab'),row.attr('item_row'),FROM_DISCOUNT);
        } 
    },".recordNotApproved .financialitem input.discount")
    .on({
        change:function(e){
            var tab = $(this).parents('form').find('.form_key input[name=tab]').val();
            numf(this,2,STRING_TYPE);
            $('.discount'+tab).val(this.value).trigger('change');
        },
        focus:function () {
            this.select();
        }
    },".financialRecord.enabled  input.totalDiscount")
    .on({
        click:function(e){
            var row=$(this).parents('tr');
            enableFinancialLineItem(row.attr('tab'),row.attr('item_row'));
        } 
    },".financialRecord.enabled .newEnable")
    .on({
        click:function(e){
            var row = $(this).parents('tr');
            var rowid = row.attr('id');
            top.jax_post('modules/financial/set/lockFinancialLineItem.php',getPostWithinString('#form_key'+row.attr('tab'))+'&amp;'+'tab='+row.attr('tab')+'&amp;row='+row.attr('item_row')+'&amp;'+getPostWithinString( '#' + rowid ),rowid,null,null,'replace');
        } 
    },".financialRecord.enabled .financialitem div.unapproved")
    .on({
        change:function(e){
            var row=$(this).parents('tr');
            numf(this,2,STRING_TYPE);
            calculateCost(row.attr('tab'),row.attr('item_row'),true);
        } 
    },".financialitem.lineNotApproved input.stockCostPerUnit")
    .on({
        change:function(e){
            var row=$(this).parents('tr');
            var value = (parseInt($('#pr-hasmarkup-'+row.attr('item_row')+'-'+row.attr('tab')).val()) == 1)?this.value:0;
            numf(this,2,STRING_TYPE);
            $('#markupableCost'+row.attr('item_row')+'-'+row.attr('tab')).val( value ).trigger( 'change' );
        } 
    },".financialitem.lineNotApproved input.total_cost")
    .on({
        click:function(e){
            var row = $(this).parents('tr');
            var rowid = row.attr('id');
            top.jax_post('modules/financial/set/unlockFinancialLineItem.php',getPostWithinString('#form_key'+row.attr('tab'))+'&amp;'+'tab='+row.attr('tab')+'&amp;row='+row.attr('item_row')+'&amp;'+getPostWithinString( '#' + rowid ),rowid,null,null,'replace');
        } 
    },".financialRecord.enabled .financialitem div.approved")
    .on({
        click:function(e){
            top.jax_post('modules/financial/set/approveInvoice.php','doRefresh=1&amp;refreshElements[]=#theSideList&'+getPostWithinString( '#' + $(this).parents('form').attr('id') ) );
        } 
    },".financialRecord .invoiceTable .recordApproval div.unapproved.enabled")
    .on({
        click:function(e){
            top.jax_post('modules/financial/set/unapproveInvoice.php','doRefresh=1&amp;refreshElements[]=#theSideList&'+getPostWithinString( '#' + $(this).parents('form').attr('id') ) );
        } 
    },".financialRecord .invoiceTable .recordApproval div.approved.enabled")
    .on({
        click:function(e){
            top.jax_post('modules/financial/set/approveProductContainer.php','doRefresh=1&amp;refreshElements[]=#theSideList&'+getPostWithinString( '#' + $(this).parents('form').attr('id') ) );
        } 
    },".financialRecord.productContainerTable.enabled .recordApproval div.unapproved")
    .on({
        click:function(e){
            top.jax_post('modules/financial/set/unapproveProductContainer.php','doRefresh=1&amp;refreshElements[]=#theSideList&'+getPostWithinString( '#' + $(this).parents('form').attr('id') ) );
        } 
    },".financialRecord.productContainerTable.enabled .recordApproval div.approved")
    .on({
        click:function(e){
            top.jax_post('modules/ledger/set/approveJournalEntry.php',getPostWithinString( '#' + $(this).parents('form').attr('id') ) );
        } 
    },".financialRecord .journalEntryTable .recordApproval div.unapproved.enabled")
    .on({
        click:function(e){
            top.jax_post('modules/ledger/set/unapproveJournalEntry.php',getPostWithinString( '#' + $(this).parents('form').attr('id') ) );
        } 
    },".financialRecord .journalEntryTable .recordApproval div.approved.enabled")
    .on({
        change:function(e){
            var row = $(this).parents('tr');
            $('#pr-gstrate-'+row.attr('item_row')+'-'+row.attr('tab')).val( row.find(".gstRateSelector option:selected").attr("taxRate") );
            calculateMarkup(row.attr('tab'),row.attr('item_row'));
            calrow_new (row.attr('tab'),row.attr('item_row'),FROM_PRICE_BEFORE_DISCOUNT );
        } 
    },".financialRecord.enabled .financialitem .gstRateSelector")
    .on({
        change:function(e){
            var row = $(this).parents('tr');
            $('#pr-gstrate-'+row.attr('item_row')+'-'+row.attr('tab')).val( row.find(".gstRateSelector option:selected").attr("taxRate") );
            calrow_new (row.attr('tab'),row.attr('item_row'),FROM_PRICE_BEFORE_DISCOUNT);
        } 
    },".receiveInvoice .financialitem .gstRateSelector")
    .on({
        change:function(e){
            var form = $(this).parents('form');
            var tab = form.find('.form_key input[name=tab]').val();
            var originalDate = this.value;
            var suppliercontact_id = form.find('input[name=purchaseorderdata_suppliercontact]').val();
            var paymentterms_id = form.find('input[name=receiveinvoicedata_paymentterms]').val();
            top.jax('modules/financial/get/recalculateDueDate.php','paymentterms_id='+paymentterms_id+'&amp;contact_id='+suppliercontact_id+'&amp;tab='+tab+'&amp;date='+originalDate,null,null,true);
        } 
    },".financial input.receiveInvoiceDate")
    .on({
        click:function(e){
            var supplierDropDown  = $(this).parents('tr').find('.supplierLineDropdown');
            if( this.value == 1)
            {
                supplierDropDown.hide();
            }
            else
            {
                supplierDropDown.show();
            }
        } 
    },".stockFrom")
    .on({
        change:function(e){
            var that  = $(this);
            var modifier = that.data('modifier');
            var targetSibling = that.data('targetSibling');
            that.siblings(targetSibling).val(that.val()*modifier);
        } 
    },".modifiedNumberField")
    .on({
        blur:function(e){
            var that  = $(this);
            var theBatchRow = that.parents('.batchRow');
            var theBatchCell = theBatchRow.parents('.batchCell');
            var theRow = theBatchCell.parents('.financialitem');
            var theQtyCell = theRow.find('#pr-qty-'+theRow.attr('item_row')+'-'+theRow.attr('tab'));
            var totalQty = theBatchCell.find('.batchQty .modifiedNumberField').sum();
            var modifyingMultiplier = totalQty/Math.abs(totalQty);
            if( that.val() == 0 )
            {
                theBatchRow.trigger('remove');
            }
            if( modifyingMultiplier*totalQty > modifyingMultiplier*theQtyCell.val() )
            {
                theQtyCell.val(totalQty);
            }
            else if( modifyingMultiplier*totalQty < modifyingMultiplier*theQtyCell.val() )
            {
                var required = theQtyCell.val() - totalQty;
                var rowNotSelected = theBatchCell.find('.batchRow:visible .idField[value=0]:first').parents('.batchRow');
                if( rowNotSelected.length )
                {
                    var theNumberField = rowNotSelected.find('.modifiedNumberField');
                    theNumberField.val(parseFloat(theNumberField.val())+required).change();
                }
                else
                {
                    theBatchCell.trigger('addRow',[required]);
                }
            }
            var modifier = that.data('modifier');
            var targetSibling = that.data('targetSibling');
            that.siblings(targetSibling).val(that.val()*modifier);
        } 
    },".batchQty .modifiedNumberField")
    .on({
        reload:function(e)
        {
            var that = $(this);
            var theRow = that.parents('.financialitem');
            that.find('.batchRow:visible').trigger('remove');
            if( parseInt(theRow.find('.productDropDown .idField').val()) && $.inArray(theRow.find('.productTracking').val(),["Batch","Serial"]) != -1  )
            {
                var theQtyCell = theRow.find('#pr-qty-'+theRow.attr('item_row')+'-'+theRow.attr('tab'));
                that.trigger('addRow',[theQtyCell.val()]);
            }
        },
        addRow:function(e,required){
            var theBatchCell = $(this);
            var subRow = parseInt(theBatchCell.find('.batchRow:last').data('subRow'));
            var theRow = theBatchCell.parents('.financialitem');
            if( !subRow || subRow == undefined )
            {
                subRow = 0;
            }
            $.ajax({
                url: '/Financial/BatchLine',
                type: 'POST',
                data: {
                    modifier: theBatchCell.data('modifier'), 
                    row: theBatchCell.data('row'), 
                    subrow: subRow+1, 
                    qty: required, 
                    tab: theRow.attr('tab'), 
                }
            })
            .then(function(content) {
                theBatchCell.append(content);
            }, function(xhr, status, error) {
                // Upon failure... set the tooltip content to the status and error value
                api.set('content.text', status + ': ' + error);
            });
        }
    },".batchCell")
    .on({
        remove:function(e)
        {
            var theBatchRow = $(this);
            if( theBatchRow.find('.theId').val() )
            {
                theBatchRow.find('.theActiveFlag').hide().val(0);
            }
            else
            {
                theBatchRow.remove();
            }
        }
    },".batchCell .batchRow")
    .on({
        click: function(e) {
            var hideid = '#' + $(this).data('hidefor');
            $(hideid).toggle();
        }
    },".hideshowbtn")
    .on({
        click: function(e) {
            var hideid = '#' + $(this).data('hidefor');
            if($(hideid).css("visibility") == 'hidden'){
                $(hideid).css("visibility", "visible");
            } else {
                $(hideid).css("visibility", "hidden");
            }
        }
    },".vishideshowbtn")
    //For Templated Vaccinations
    .on({
        change:function(){
            var thisRow = $(this).parents('tr');
            var theForm = thisRow.parents('form');
            var tab = $('[name=tab]',theForm).val();
            var invoiceTemplateId = parseInt($(this).val());
            if( invoiceTemplateId > 0 )
            {
                top.yesNoNew({
                    'question' : 'Are you sure you want to bring in the linked Vaccination Template?',
                    'yesScript' : function(){
                        
                        var row = parseInt($('#totalrows'+tab).val());
                        if(row == NaN) { row = 1; }
                        var newrow = row+1;
                        $('#totalrows'+tab).val(newrow);
                        jaxnew('modules/animals/multivax/addTemplate.php', {
                            args:{row:newrow,invoicetemplate_id:invoiceTemplateId,date:$('#all_vaccinationdata_date'+tab).val()},
                            callback:function(){$('.remove',thisRow).trigger('click');},
                            noblock:true,
                            target:thisRow.attr('id'),
                            how:'after'} );},
                    'noScript' : function(){$('.productDropdownCell .newDropDown',thisRow).trigger('setrecord',[0])},
                    'yesName' : 'Yes',
                    'noName' : 'No'
                  });
            }
        } 
    },".addMultiVax input.theProductsTemplateId")
    .on({
        keydown:function(e){
            // Workaround for iPad external keyboard not sending keyCode
            // Using backtick since tab is not registered by javascript in textfield
            // TODO: Come up with better solution (UI navigation?)
            var isIpadBacktick = (e.key == "`" && navigator.userAgent.match(/iPad/i) != null);
            if (e.keyCode == 9 || isIpadBacktick) {
                if(isIpadBacktick) {
                    // Don't print backtick
                    e.preventDefault();
                }
                var syntaxIsValid = true;

                $(".questionPopupDiv").remove();
                //$(".questionPopupDiv").unbind('keydown');
                //$(this).val() --> The entire text; formally known as "theString"
                var theString = $(this).val();
                var nextPosition = $(this).val().indexOf('#INPUT#',getCursorPosition(this));
                if( nextPosition >= 0 )
                {
                    var lastPosition = nextPosition+7;
                    var checkChar = $(this).val().slice(nextPosition+7, nextPosition+8);

                    if (this.setSelectionRange)
                        this.setSelectionRange(nextPosition, lastPosition);
                    else {
                        var r = this.createTextRange();
                        r.collapse(true);
                        r.moveEnd('character', lastPosition);
                        r.moveStart('character', nextPosition);
                        r.select();
                    }
                    if(checkChar == "[") {

                        var braceCount = 1;
                        var curlyBraceCount = 0;
                        var endCurlyBraceCount = 0;
                        var indexOfFirstBrace = lastPosition;
                        var indexOfLastBrace = $(this).val().length;
                        var i = lastPosition + 1;

                        while (braceCount > 0 && i < $(this).val().length){
                            var c = $(this).val().slice(i, ++i);

                            if (c == '[') {
                                braceCount++;
                            } else
                            if (c == ']') {
                                braceCount--;
                                indexOfLastBrace = i;
                            } else
                            //This should establish that it's not a template (because a template requires an opening curly brace)
                            if (c == '{'){
                                curlyBraceCount++;
                            } else
                            if (c == '}'){
                                if (curlyBraceCount > 0) {
                                    curlyBraceCount--;
                                } else {
                                    braceCount -= 2;
                                }

                                if (braceCount < 0){
                                    //alert("Warning: You have a '}' when it should be a ']'. Please refer to the help guide if you are unsure.");
                                    indexOfLastBrace = i;
                                    syntaxIsValid = false;
                                    break;
                                } else {
                                    var tempLeft = $(this).val().substr(0, i - 1);
                                    var tempRight = $(this).val().substr(i);
                                    $(this).val(tempLeft + "]]" + tempRight);

                                    indexOfLastBrace = ++i;
                                }
                            }
                        }

                        if (braceCount > 0){
                            alert("Warning: You are missing one or more ']'. Please refer to help guide if you are unsure.");
                            syntaxIsValid = false;
                        }

                        var m = [$(this).val().slice(nextPosition, indexOfLastBrace), $(this).val().slice(nextPosition, lastPosition), $(this).val().slice(indexOfFirstBrace + 1, indexOfLastBrace - 1), ""];

                        var len = m[0].length;
                        $(this).addClass("usingPickList");
                        if (this.setSelectionRange)
                            this.setSelectionRange(nextPosition, nextPosition+len);
                        else {
                            r = this.createTextRange();
                            r.collapse(true);
                            r.moveEnd('character', nextPosition+len);
                            r.moveStart('character', nextPosition);
                            r.select();
                        }

                        return syntaxIsValid && generateQuestionContent(this, m, nextPosition);
                    }
                    return false;
                }
            } 
            else if(e.keyCode == 13 || e.keyCode==32)
            {
                $(this).removeClass("usingPickList");
                $(".questionPopupDiv").remove(); //Clears any popup on Tab/Enter
                return shortHandReplace(this,getCursorPosition(this),$(this).attr('class'));
            }
            return true;
        }
    },".hasShorthandText")
    .on({
        mousedown:function(e){return false;},
        click:function(e){return false;},
        keypress:function(e){return false;},
        focus:function(e){
            nextField(this);
            return false;}
    },".disabledInput,.lockedInput")
    .on({
        // mousedown:function(e){
        //     $(this).prop('checked',false);
        // },
        click:function(e){
            if ( $(this).hasClass('checked') )
            {
                $(this).removeClass('checked');
                $(this).prop('checked', false);
            }
            else
            {
                $("input[name=\""+$(this).prop('name')+"\"]:radio").removeClass('checked');
                $(this).addClass('checked');
            }
            return true;
        },
    },"input[type=radio].uncheckable")
    .on({
        click:function(e){
            $(this).siblings('.showMoreContent').css('maxHeight','none');
            $(this).parents('.showMoreConstruct').addClass('expanded').removeClass('contracted');
        }
    },'.showMoreButton')
    .on({
        click:function(e){
            var height = $(this).parents('.showMoreConstruct').data('height');
            $(this).siblings('.showMoreContent').css('maxHeight',(height-$(this).height())+'px');
            $(this).parents('.showMoreConstruct').removeClass('expanded').addClass('contracted');
        }
    },'.showLessButton')
    .on({
        doubletap:function(e) {
            toggleSidebar(e);
        },
        dblclick:function(e) {
            toggleSidebar(e);
        },
        mousedown:function(e) {
            $('body').addClass('mouse-layer-mouse-down');
            $('body.mouse-layer-mouse-down').on("mousemove", {e:e}, evtSidebarMouseMove);
            $('body.mouse-layer-mouse-down').on("mouseup", {e:e}, evtSidebarMouseUp);
            $('body.mouse-layer-mouse-down').on("mouseleave", {e:e}, evtSidebarMouseUp);
        },
        touchstart:function(e) {
            $('body').addClass('mouse-layer-mouse-down');
            $('body.mouse-layer-mouse-down').on("touchmove", {e:e}, evtSidebarMouseMove);
            $('body.mouse-layer-mouse-down').on("touchend", {e:e}, evtSidebarMouseUp);
        }
    }, '#toggleSidebarButtonTouchLayer')
        .on({
            removeLine:function(e) {
                $(this).remove();
            },
        }, '.billingTriggerRow.new')
        .on({
            removeLine:function(e) {
                $('.activeFlag',this).val(0);
                $(this).hide();
            },
        }, '.billingTriggerRow.existing')
    //Button START
    .on({
        click:function(e) {
            $(this).trigger('buttonClick');
        },
    }, '.buttonHolder .clickable')
        .on({
            click:function(e) {
                $('a:visible',this).trigger('buttonClick');
                return false;
            },
        }, '.buttonHolder');
    //Button END
    
    // Hide the animal if the resolution is too big!
    if ($(window).height() > 1080 ) {
        $('#loginanimal').css('background', 'url("")');
    }
    
    initialLoad = true;
});
;
