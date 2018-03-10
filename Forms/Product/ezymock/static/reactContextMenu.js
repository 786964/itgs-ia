// Right click makes context menu appear
var ContextMenu = ( function() {

    var mouseButton = 3;

    if(jQuery.browser.mobile) {
        // Is mobile. Use single touch / single click instead.
        mouseButton = 1;
    }

    return {
        mouseButton: mouseButton
    }

})();
       $('body').on({
        mouseup:function(e){
            let isOldClass = (($(e.target).parents('#theContextMenu0Holder').length>0)?'':'.old');
            setTimeout(function(){
                $('.qtipLoaded').removeClass('.qtipLoaded').qtip('destroy',true);//TEMP HAX    
                $('.contextMenuWrapper'+isOldClass).each(function(){
                    ReactDOM.unmountComponentAtNode(document.getElementById('theContextMenu0Holder'));
                }).remove();
                $('.qtip'+isOldClass).removeClass('old').hide();
            },$(this).parents('.qtip,.hoverElement').length?100:100);
            return true;
        }
    });
       $('.qtip,.hoverElement,.contextMenuLoaded',$('body')).on({mouseup:function(e){
        e.stopPropagation();
    }});

function __menuRegig( menuSelector , hasRunThrough )
{
    hasRunThrough = hasRunThrough?hasRunThrough:false;
    var menu = $(menuSelector);
    var offset = menu.offset();
    var changed = false;
    var windowWidth = $( window ).width();    
    var windowHeight = $( window ).height(); 
    var division = hasRunThrough?4:2;
    if( offset.left < 0 )
    {
        //flipToRight
        offset.left += menu.width();
        changed = true;
    }
    if( ( offset.left+menu.width() ) > windowWidth )
    {
        //flipToLeft
        offset.left -= menu.width()*0.9;
        changed = true;
    }
    if( offset.top < 0 )
    {
        //flipToBottom
        offset.top += menu.height()/division;
        changed = true;
    }
    if( ( offset.top+menu.height() ) > windowHeight )
    {
        //flipToTop
        offset.top -= menu.height()/division;
        changed = true;
    }
    menu.offset(offset);
    if( !hasRunThrough && changed )
    {
        __menuRegig( menuSelector , true );
    }
}

function __processContextContent( args )
{
    $('.qtipLoaded').removeClass('.qtipLoaded').qtip('destroy',true);//TEMP HAX
    var contextMenuId = 'theContextMenu'+args.depth;
    var contextMenuHolderId = 'theContextMenu'+(args.depth)+'Holder';
    var nextContextMenuHolderId = 'theContextMenu'+(args.depth+1)+'Holder';
    var contextClass = ( typeof args.contextClass == "undefined")?'':args.contextClass;
    if( !document.getElementById(contextMenuId) )
    {
        var divStyle = {
            maxHeight: '80vh',
            overflowY: 'auto'
        }
        ReactDOM.render( (
            <div className="contextMenuWrapper">
                <div id={contextMenuId} className={"contextMenu hoverElement "+contextClass} style={divStyle}/>
                <div id={nextContextMenuHolderId} className="contentHolder"/>
            </div>
        ) ,document.getElementById(contextMenuHolderId));
    }
    else
    {
        if( args.subMenuHash && args.subMenuHash == $('#'+contextMenuId).data('contenthash') )
        {//Already visible
            return '#'+contextMenuId;
        }
    }
    $('#'+contextMenuId).data('contenthash',args.subMenuHash);

    var ContextMenuItem = React.createClass({
        subMenuHash:false,
        getSubMenuHash:function()
        {
            if( !this.subMenuHash )
            {
                this.subMenuHash = this.props.menuItem.subMenu?md5(this.props.menuItem.subMenu):false;
            }
            return this.subMenuHash;
        },
        render: function(){
            this.clickAction = null;
            this.mouseEnterAction = null;
            this.disabled = this.props.menuItem.disabled;
            this.openedSubMenu = null;
            this.mouseEnterAction = function( thatSelekta , subMenu )
            {
                return function( event ){
                    
                    var that = $(thatSelekta).get( 0 );
                    if( subMenu )
                    {
                        var newCoordinates = args.coordinates;
                        var offset = $(event.currentTarget).offset();
                        newCoordinates.x = offset.left+$('#'+contextMenuId).width()-2;
                        newCoordinates.y = offset.top;
                        that.openedSubMenu = __processContextContent( {
                            content:subMenu
                            ,coordinates:newCoordinates
                            ,targetElement:args.targetElement
                            ,depth:args.depth+1
                            ,subMenuHash:this.getSubMenuHash()});
                    }
                    else if( that.openedSubMenu )
                    {
                        $(that.openedSubMenu).each(function(){
                            var lastContentHolder = $(this).closest('.contentHolder');
                            if( lastContentHolder.length )
                            {
                                ReactDOM.unmountComponentAtNode(lastContentHolder.get(0));
                                lastContentHolder.empty();
                            }
                        });
                        that.openedSubMenu = null;
                    }
                        return false;
                };
            }( "#"+contextMenuId , this.props.menuItem.subMenu );
            this.clickAction = function(){ eval(this.props.menuItem.action); };
            this.props.menuItem.icon = this.props.menuItem.icon?this.props.menuItem.icon:false;
            return (<div
                onClick={this.handleClick}
                onMouseEnter={this.handleMouseEnter}
                //onMouseLeave={this.handleMouseLeave}
                className={`menuItem ${this.disabled?"disabledItem":"enabledItem"}`} >
                <div className="menuItemIcon" >
                    <ezyVet.IconImage iconClasses={this.props.menuItem.icon} />
                </div>
                <div className="title">{this.props.menuItem.title}</div>
                <div className="rightMiniText">{this.props.menuItem.shortCutKeys}</div>
                <div className="subMenuNotification">
                    <div className={this.props.menuItem.subMenu?" icon-play":""}></div>
                </div>
            </div>);
        },
        handleClick: function(event) {
          if(!this.disabled && this.clickAction)
          {
            this.clickAction( event );
          }
        },
        handleMouseEnter: function(event) {
          if(!this.disabled && this.mouseEnterAction)
          {
            this.mouseEnterAction( event );
          }
        },
        //handleMouseLeave: function(event) {
        //  if(!this.disabled && this.mouseLeaveAction)
        //  {
        //    this.mouseLeaveAction(event);
        //  }
        //},
    });
    var ContextMenu = React.createClass({
        render:function(){
            var props = this.props;
            return (<div className="contextMenuContent" onMouseEnter={this.handleOnEnter} onMouseLeave={this.handleOnBlur} >
                { props.menuItems.map(function(menuItem){ return (<ContextMenuItem key={menuItem.title} menuItem={menuItem} />); }) }
            </div>);
        },
        handleOnEnter: function(event) {
            var target = $(args.targetElement);
            var menuCount = parseInt(target.data('menuCount'));
            if(!menuCount)
            {
                menuCount = 0;
            }
            menuCount++;
            target.data('menuCount',menuCount);
        },
        handleOnBlur: function(event) {
            var target = $(args.targetElement);
            var menuCount = parseInt(target.data('menuCount'));
            menuCount--;
            target.data('menuCount',menuCount);
        },
    }); 
    var domNode = document.getElementById(contextMenuId);
    ReactDOM.render(<ContextMenu menuItems={args.content} />, domNode ,function(){
        setTimeout(function(){$('#'+contextMenuId).parents('.contextMenuWrapper').addClass('old');},1000);
    });

    $(domNode).show().css( {
        position:'absolute',
        left:args.coordinates.x+'px',
        top:args.coordinates.y+'px',
        marginTop:'0px'
    } );
    __menuRegig( '#'+contextMenuId );
    return '#'+contextMenuId;
};

(function($)
{
    $.fn.extend({  //pass the options variable to the function
            //pass the options variable to the function
            EzyContext: function(options) {
                //Set the default values, use comma to separate the settings, example:
//                return false;
                return this.not('.contextMenuLoaded').addClass('contextMenuLoaded').off('contextmenu').each(function( values ) {
                        
                    return function(){
                        this.oncontextmenu = function(){return false;}
                        $(this).off(values.event).on( values.event , function( event )
                        {      
                            
                            $('.contextMenuWrapper').each(function(){
                                ReactDOM.unmountComponentAtNode(document.getElementById('theContextMenu0Holder'));
                            }).remove();
                            if ( event.which == values.which )
                            {
                                var data = $(this).data();

                                if( data )//Filtering out non passible data
                                {
                                    var variablesToPass = Object.keys(data).filter(function(e) {
                                        return typeof data[e] !== 'object';
                                    });
                                    var processedData = {};
                                    for( var i = 0; variablesToPass.length > i; i++ )
                                    {
                                        var variable = variablesToPass[i];
                                        processedData[variable]=data[variable];
                                    }
                                    data = processedData;
                                }
                                var coordinates = {x:values.theoffset.x,y:values.theoffset.y,direction:values.direction};

                                if( values.target == "mouse" )
                                {
                                    var theTargetElement = $(event.target);
                                    coordinates.x += event.pageX;
                                    coordinates.y += event.pageY;
                                }
                                else
                                {
                                    var theTargetElement = $(values.target);
                                    var offset = theTargetElement.offset();
                                    if( values.direction == 'bottom')
                                    {
                                        coordinates.y += theTargetElement.height();
                                    }
                                    coordinates.x += offset.left;
                                    coordinates.y += offset.top;
                                }
                                if( values.url )
                                {
                                    $.ajax({
                                        url: values.url,
                                        type: 'POST',
                                        dataType:'json',
                                        data: data,
                                        cache: false,
                                        once: true,
                                    })
                                    .then(function(content) {
                                        __processContextContent({
                                            content:content,
                                            coordinates:coordinates,
                                            targetElement:(typeof(theTargetElement.attr('id')) !== 'undefined' || theTargetElement.attr('id') !== null) ? '#' + theTargetElement.attr('id') :  '.' + theTargetElement.attr('class'),
                                            depth:0,
                                            contextClass:values.contextClass
                                        });
                                    }, function(xhr, status, error) {
                                        // Upon failure... set the tooltip content to the status and error value
                                        console.info('content.text', status + ': ' + error);
                                    });
                                }
                                else
                                {
                                    __processContextContent({
                                        content:values.content,
                                        coordinates:coordinates,
                                        targetElement:(typeof(theTargetElement.attr('id')) !== 'undefined' || theTargetElement.attr('id') !== null) ? '#' + theTargetElement.attr('id') :  '.' + theTargetElement.attr('class'),
                                        depth:0,
                                        contextClass:values.contextClass
                                    });
                                }
                            }
//                            return false;
                        }  );
                    }
                }( $.extend({
                    event:'mousedown',
                    which: ContextMenu.mouseButton,
                    contextClass:'',
                    target:'mouse',
                    direction:'bottom',
                    theoffset:{x:0,y:0}                    
                }, options)) );
            } 
        });
})(jQuery);