ezyVet.IconImage = React.createClass({
    render: function(){
        var iconClasses = this.props.iconClasses;
        if( Array.isArray( iconClasses ) || iconClasses.indexOf(".") == -1 ){
            if( !Array.isArray( iconClasses ) ) {
                iconClasses = [iconClasses];
            }
            return (
                <div className="iconWraper">
                    <div className="iconContainer">
                        { iconClasses.map(function(iconClass){  return <i className={`icon ${iconClass}`} />;  } ) }
                    </div>
                    <div className="clear"></div>
                </div>
            );
        }
        var iconClasses = iconClasses?iconClasses:'cancel.png';
        return (<img src={"media/images/"+iconClasses} />);
    },
});

ezyVet.MyButton = React.createClass({
    getDefaultProps: function() {
        return {
            javascript : '',
            tab : 1,
            disabled : false,
            showText : false,
            buttonId : "",
            buttonText : "",
            buttonTitle : "",
            wrapperClass : "",
            style : {},
            buttonClasses : {},
            buttonImageSrc : false,
            data : {},
            url : "#"
        };
    },
    getButtonId: function() {
        return this.props.buttonId?this.props.buttonId:md5( this.props.tab+this.props.javascript+this.props.buttonText );
    },
    getDataAttributes: function() {
        var nonData = {}
        for( var field in this.props.data )
        {
            nonData['data-'+field]=this.props.data.field;
        }
        return nonData;
    },
    render: function() {
        return (
            <div
                id={this.getButtonId()}
                className={classNames(
                    "buttonHolder",
                    "compactButton",
                    {clickable:this.props.disabled},
                    this.props.wrapperClass)}
                 style={this.props.style} {...this.getDataAttributes()}>
                <div
                    title={this.props.buttonText}
                    className={classNames(this.props.buttonClasses)}
                    onClick={this.props.disabled?this.props.javascipt:function(){return false;}}
                    href={this.props.url} >
                    (this.props.showText?<span className="buttonText">{this.props.buttonText}</span>:'')
                </div>
            </div>
        );
    },
});

/*
 <a id=\"disabled".$buttonId."\" title=\"".Formatting::htmlsafe( $buttonTitle )."\" ".($this->_isEnabled()?"style=\"display:none;\"":"")." class=\"disabledButton ".$this->_getButtonClasses()." disabledButton".Setting::getTab()." ".$this->_getButtonClass().Setting::getTab()."\" href=\"#\">
 <script type=\"text/javascript\">
 $('#disabled".$buttonId."').unbind('click').bind('click',function(){return false;});
 </script>
 ".$this->_getButtonImage().
 ($this->_showText()?"<span class=\"buttonText\">".Formatting::htmlsafe( $buttonText )."</span>":"")."
 </a>
 <a id=\"".$buttonId."\" title=\"".Formatting::htmlsafe( $buttonText )."\" ".($this->_isEnabled()?"":"style=\"display:none;\"")." class=\"clickable ".$this->_getButtonClasses()." ".$this->_getButtonClass()."".Setting::getTab()."\" href=\"$url\">
 <script type=\"text/javascript\">$('#".$buttonId."').parent('.buttonHolder').unbind('click').bind('click',function(){
 ".($this->_getJavascript())."
 return false; });</script>
 ".$this->_getButtonImage().
 ($this->_showText()?"<span class=\"buttonText\">".Formatting::htmlsafe( $buttonText )."</span>":"")."
 </a>
 public function getHtml()
 {
 $buttonContent = "
 <div class=\"buttonHolder clickable compactButton ".($this->_getWrapperClass())."\" style=\"".($this->_getStyle())."\" ".($this->_getData()).">
 ".$this->_getHtml()."
 </div>";
 return $buttonContent;
 }


 protected function _getHtml()
 {
 $buttonId = $this->_getButtonId();
 $buttonText = $this->_getButtonText();
 $buttonTitle = $this->_getButtonTitle();
 $url = $this->_getUrl(); // returns # if not URL was passed.
 $buttonContent = "
 <a id=\"disabled".$buttonId."\" title=\"".Formatting::htmlsafe( $buttonTitle )."\" ".($this->_isEnabled()?"style=\"display:none;\"":"")." class=\"disabledButton ".$this->_getButtonClasses()." disabledButton".Setting::getTab()." ".$this->_getButtonClass().Setting::getTab()."\" href=\"#\">
 <script type=\"text/javascript\">
 $('#disabled".$buttonId."').unbind('click').bind('click',function(){return false;});
 </script>
 ".$this->_getButtonImage().
 ($this->_showText()?"<span class=\"buttonText\">".Formatting::htmlsafe( $buttonText )."</span>":"")."
 </a>
 <a id=\"".$buttonId."\" title=\"".Formatting::htmlsafe( $buttonText )."\" ".($this->_isEnabled()?"":"style=\"display:none;\"")." class=\"clickable ".$this->_getButtonClasses()." ".$this->_getButtonClass()."".Setting::getTab()."\" href=\"$url\">
 <script type=\"text/javascript\">$('#".$buttonId."').parent('.buttonHolder').unbind('click').bind('click',function(){
 ".($this->_getJavascript())."
 return false; });</script>
 ".$this->_getButtonImage().
 ($this->_showText()?"<span class=\"buttonText\">".Formatting::htmlsafe( $buttonText )."</span>":"")."
 </a>";
 return $buttonContent;
 }
 */