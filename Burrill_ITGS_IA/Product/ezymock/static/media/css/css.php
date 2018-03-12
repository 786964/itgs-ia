/*! normalize.css v2.1.3 | MIT License | git.io/normalize */img,legend{border:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}audio,canvas,video{display:inline-block}audio:not([controls]){display:none;height:0}[hidden],template{display:none}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body,figure{margin:0}a{background:0 0}a:focus{outline:dotted thin}a:active,a:hover{outline:0}h1{font-size:2em;margin:.67em 0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:italic}hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}mark{background:#ff0;color:#000}code,kbd,pre,samp{font-family:monospace,serif;font-size:1em}pre{white-space:pre-wrap}q{quotes:"\201C" "\201D" "\2018" "\2019"}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}svg:not(:root){overflow:hidden}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{padding:0}button,input,select,textarea{font-family:inherit;font-size:100%;margin:0}button,input{line-height:normal}button,select{text-transform:none}button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}textarea{overflow:auto;vertical-align:top}table{border-collapse:collapse;border-spacing:0}


/* the div that holds the date picker calendar */
.dpDiv {
	}


/* the table (within the div) that holds the date picker calendar */
.dpTable {
	font-family: Tahoma, Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-align: center;
	color: #505050;
	background-color: #ece9d8;
	border: 1px solid #AAAAAA;
	}


/* a table row that holds date numbers (either blank or 1-31) */
.dpTR {
	}


/* the top table row that holds the month, year, and forward/backward buttons */
.dpTitleTR {
	}


/* the second table row, that holds the names of days of the week (Mo, Tu, We, etc.) */
.dpDayTR {
	}


/* the bottom table row, that has the "This Month" and "Close" buttons */
.dpTodayButtonTR {
	}


/* a table cell that holds a date number (either blank or 1-31) */
.dpTD {
	border: 1px solid #ece9d8;
	}


/* a table cell that holds a highlighted day (usually either today's date or the current date field value) */
.dpDayHighlightTD {
	background-color: #CCCCCC;
	border: 1px solid #AAAAAA;
	}


/* the date number table cell that the mouse pointer is currently over (you can use contrasting colors to make it apparent which cell is being hovered over) */
.dpTDHover {
	background-color: #aca998;
	border: 1px solid #888888;
	cursor: pointer;
	color: red;
	}


/* the table cell that holds the name of the month and the year */
.dpTitleTD {
	}


/* a table cell that holds one of the forward/backward buttons */
.dpButtonTD {
	}


/* the table cell that holds the "This Month" or "Close" button at the bottom */
.dpTodayButtonTD {
	}


/* a table cell that holds the names of days of the week (Mo, Tu, We, etc.) */
.dpDayTD {
	background-color: #CCCCCC;
	border: 1px solid #AAAAAA;
	color: white;
	}


/* additional style information for the text that indicates the month and year */
.dpTitleText {
	font-size: 12px;
	color: gray;
	font-weight: bold;
	white-space:nowrap;
	}


/* additional style information for the cell that holds a highlighted day (usually either today's date or the current date field value) */ 
.dpDayHighlight {
	color: #4060ff;
	font-weight: bold;
	}


/* the forward/backward buttons at the top */
.dpButton {
	font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: gray;
	background: #d8e8ff;
	font-weight: bold;
	padding: 0px;
	}


/* the "This Month" and "Close" buttons at the bottom */
.dpTodayButton {
	font-family: Verdana, Tahoma, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: gray;
	background: #d8e8ff;
	font-weight: bold;
	}


/*! jQuery UI - v1.11.1 - 2014-10-02
* http://jqueryui.com
* Includes: core.css, draggable.css, resizable.css, selectable.css, sortable.css, accordion.css, autocomplete.css, button.css, datepicker.css, dialog.css, menu.css, progressbar.css, selectmenu.css, slider.css, spinner.css, tabs.css, tooltip.css, theme.css
* To view and modify this theme, visit http://jqueryui.com/themeroller/?ffDefault=Trebuchet%20MS%2CTahoma%2CVerdana%2CArial%2Csans-serif&fwDefault=bold&fsDefault=1.1em&cornerRadius=4px&bgColorHeader=f6a828&bgTextureHeader=gloss_wave&bgImgOpacityHeader=35&borderColorHeader=e78f08&fcHeader=ffffff&iconColorHeader=ffffff&bgColorContent=eeeeee&bgTextureContent=highlight_soft&bgImgOpacityContent=100&borderColorContent=dddddd&fcContent=333333&iconColorContent=222222&bgColorDefault=f6f6f6&bgTextureDefault=glass&bgImgOpacityDefault=100&borderColorDefault=cccccc&fcDefault=1c94c4&iconColorDefault=ef8c08&bgColorHover=fdf5ce&bgTextureHover=glass&bgImgOpacityHover=100&borderColorHover=fbcb09&fcHover=c77405&iconColorHover=ef8c08&bgColorActive=ffffff&bgTextureActive=glass&bgImgOpacityActive=65&borderColorActive=fbd850&fcActive=eb8f00&iconColorActive=ef8c08&bgColorHighlight=ffe45c&bgTextureHighlight=highlight_soft&bgImgOpacityHighlight=75&borderColorHighlight=fed22f&fcHighlight=363636&iconColorHighlight=228ef1&bgColorError=b81900&bgTextureError=diagonals_thick&bgImgOpacityError=18&borderColorError=cd0a0a&fcError=ffffff&iconColorError=ffd27a&bgColorOverlay=666666&bgTextureOverlay=diagonals_thick&bgImgOpacityOverlay=20&opacityOverlay=50&bgColorShadow=000000&bgTextureShadow=flat&bgImgOpacityShadow=10&opacityShadow=20&thicknessShadow=5px&offsetTopShadow=-5px&offsetLeftShadow=-5px&cornerRadiusShadow=5px
* Copyright 2014 jQuery Foundation and other contributors; Licensed MIT */

/* Layout helpers
----------------------------------*/
.ui-helper-hidden {
	display: none;
}
.ui-helper-hidden-accessible {
	border: 0;
	clip: rect(0 0 0 0);
	height: 1px;
	margin: -1px;
	overflow: hidden;
	padding: 0;
	position: absolute;
	width: 1px;
}
.ui-helper-reset {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	line-height: 1.3;
	text-decoration: none;
	font-size: 100%;
	list-style: none;
}
.ui-helper-clearfix:before,
.ui-helper-clearfix:after {
	content: "";
	display: table;
	border-collapse: collapse;
}
.ui-helper-clearfix:after {
	clear: both;
}
.ui-helper-clearfix {
	min-height: 0; /* support: IE7 */
}
.ui-helper-zfix {
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	position: absolute;
	opacity: 0;
	filter:Alpha(Opacity=0); /* support: IE8 */
}

.ui-front {
	z-index: 100;
}


/* Interaction Cues
----------------------------------*/
.ui-state-disabled {
	cursor: default !important;
}


/* Icons
----------------------------------*/

/* states and images */
.ui-icon {
	display: block;
	text-indent: -99999px;
	overflow: hidden;
	background-repeat: no-repeat;
}


/* Misc visuals
----------------------------------*/

/* Overlays */
.ui-widget-overlay {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
.ui-draggable-handle {
	-ms-touch-action: none;
	touch-action: none;
}
.ui-resizable {
	position: relative;
}
.ui-resizable-handle {
	position: absolute;
	font-size: 0.1px;
	display: block;
	-ms-touch-action: none;
	touch-action: none;
}
.ui-resizable-disabled .ui-resizable-handle,
.ui-resizable-autohide .ui-resizable-handle {
	display: none;
}
.ui-resizable-n {
	cursor: n-resize;
	height: 7px;
	width: 100%;
	top: -5px;
	left: 0;
}
.ui-resizable-s {
	cursor: s-resize;
	height: 7px;
	width: 100%;
	bottom: -5px;
	left: 0;
}
.ui-resizable-e {
	cursor: e-resize;
	width: 7px;
	right: -5px;
	top: 0;
	height: 100%;
}
.ui-resizable-w {
	cursor: w-resize;
	width: 7px;
	left: -5px;
	top: 0;
	height: 100%;
}
.ui-resizable-se {
	cursor: se-resize;
	width: 12px;
	height: 12px;
	right: 1px;
	bottom: 1px;
}
.ui-resizable-sw {
	cursor: sw-resize;
	width: 9px;
	height: 9px;
	left: -5px;
	bottom: -5px;
}
.ui-resizable-nw {
	cursor: nw-resize;
	width: 9px;
	height: 9px;
	left: -5px;
	top: -5px;
}
.ui-resizable-ne {
	cursor: ne-resize;
	width: 9px;
	height: 9px;
	right: -5px;
	top: -5px;
}
.ui-selectable {
	-ms-touch-action: none;
	touch-action: none;
}
.ui-selectable-helper {
	position: absolute;
	z-index: 100;
	border: 1px dotted black;
}
.ui-sortable-handle {
	-ms-touch-action: none;
	touch-action: none;
}
.ui-accordion .ui-accordion-header {
	display: block;
	cursor: pointer;
	position: relative;
	margin: 2px 0 0 0;
	padding: .5em .5em .5em .7em;
	min-height: 0; /* support: IE7 */
	font-size: 100%;
}
.ui-accordion .ui-accordion-icons {
	padding-left: 2.2em;
}
.ui-accordion .ui-accordion-icons .ui-accordion-icons {
	padding-left: 2.2em;
}
.ui-accordion .ui-accordion-header .ui-accordion-header-icon {
	position: absolute;
	left: .5em;
	top: 50%;
	margin-top: -8px;
}
.ui-accordion .ui-accordion-content {
	padding: 1em 2.2em;
	border-top: 0;
	overflow: auto;
}
.ui-autocomplete {
	position: absolute;
	top: 0;
	left: 0;
	cursor: default;
}
.ui-button {
	display: inline-block;
	position: relative;
	padding: 0;
	line-height: normal;
	margin-right: .1em;
	cursor: pointer;
	vertical-align: middle;
	text-align: center;
	overflow: visible; /* removes extra width in IE */
}
.ui-button,
.ui-button:link,
.ui-button:visited,
.ui-button:hover,
.ui-button:active {
	text-decoration: none;
}
/* to make room for the icon, a width needs to be set here */
.ui-button-icon-only {
	width: 2.2em;
}
/* button elements seem to need a little more width */
button.ui-button-icon-only {
	width: 2.4em;
}
.ui-button-icons-only {
	width: 3.4em;
}
button.ui-button-icons-only {
	width: 3.7em;
}

/* button text element */
.ui-button .ui-button-text {
	display: block;
	line-height: normal;
}
.ui-button-text-only .ui-button-text {
	padding: .4em 1em;
}
.ui-button-icon-only .ui-button-text,
.ui-button-icons-only .ui-button-text {
	padding: .4em;
	text-indent: -9999999px;
}
.ui-button-text-icon-primary .ui-button-text,
.ui-button-text-icons .ui-button-text {
	padding: .4em 1em .4em 2.1em;
}
.ui-button-text-icon-secondary .ui-button-text,
.ui-button-text-icons .ui-button-text {
	padding: .4em 2.1em .4em 1em;
}
.ui-button-text-icons .ui-button-text {
	padding-left: 2.1em;
	padding-right: 2.1em;
}
/* no icon support for input elements, provide padding by default */
input.ui-button {
	padding: .4em 1em;
}

/* button icon element(s) */
.ui-button-icon-only .ui-icon,
.ui-button-text-icon-primary .ui-icon,
.ui-button-text-icon-secondary .ui-icon,
.ui-button-text-icons .ui-icon,
.ui-button-icons-only .ui-icon {
	position: absolute;
	top: 50%;
	margin-top: -8px;
}
.ui-button-icon-only .ui-icon {
	left: 50%;
	margin-left: -8px;
}
.ui-button-text-icon-primary .ui-button-icon-primary,
.ui-button-text-icons .ui-button-icon-primary,
.ui-button-icons-only .ui-button-icon-primary {
	left: .5em;
}
.ui-button-text-icon-secondary .ui-button-icon-secondary,
.ui-button-text-icons .ui-button-icon-secondary,
.ui-button-icons-only .ui-button-icon-secondary {
	right: .5em;
}

/* button sets */
.ui-buttonset {
	margin-right: 7px;
}
.ui-buttonset .ui-button {
	margin-left: 0;
	margin-right: -.3em;
}

/* workarounds */
/* reset extra padding in Firefox, see h5bp.com/l */
input.ui-button::-moz-focus-inner,
button.ui-button::-moz-focus-inner {
	border: 0;
	padding: 0;
}
.ui-datepicker {
	width: 17em;
	padding: .2em .2em 0;
	display: none;
}
.ui-datepicker .ui-datepicker-header {
	position: relative;
	padding: .2em 0;
}
.ui-datepicker .ui-datepicker-prev,
.ui-datepicker .ui-datepicker-next {
	position: absolute;
	top: 2px;
	width: 1.8em;
	height: 1.8em;
}
.ui-datepicker .ui-datepicker-prev-hover,
.ui-datepicker .ui-datepicker-next-hover {
	top: 1px;
}
.ui-datepicker .ui-datepicker-prev {
	left: 2px;
}
.ui-datepicker .ui-datepicker-next {
	right: 2px;
}
.ui-datepicker .ui-datepicker-prev-hover {
	left: 1px;
}
.ui-datepicker .ui-datepicker-next-hover {
	right: 1px;
}
.ui-datepicker .ui-datepicker-prev span,
.ui-datepicker .ui-datepicker-next span {
	display: block;
	position: absolute;
	left: 50%;
	margin-left: -8px;
	top: 50%;
	margin-top: -8px;
}
.ui-datepicker .ui-datepicker-title {
	margin: 0 2.3em;
	line-height: 1.8em;
	text-align: center;
}
.ui-datepicker .ui-datepicker-title select {
	font-size: 1em;
	margin: 1px 0;
}
.ui-datepicker select.ui-datepicker-month,
.ui-datepicker select.ui-datepicker-year {
	width: 45%;
}
.ui-datepicker table {
	width: 100%;
	font-size: .9em;
	border-collapse: collapse;
	margin: 0 0 .4em;
}
.ui-datepicker th {
	padding: .7em .3em;
	text-align: center;
	font-weight: bold;
	border: 0;
}
.ui-datepicker td {
	border: 0;
	padding: 1px;
}
.ui-datepicker td span,
.ui-datepicker td a {
	display: block;
	padding: .2em;
	text-align: right;
	text-decoration: none;
}
.ui-datepicker .ui-datepicker-buttonpane {
	background-image: none;
	margin: .7em 0 0 0;
	padding: 0 .2em;
	border-left: 0;
	border-right: 0;
	border-bottom: 0;
}
.ui-datepicker .ui-datepicker-buttonpane button {
	float: right;
	margin: .5em .2em .4em;
	cursor: pointer;
	padding: .2em .6em .3em .6em;
	width: auto;
	overflow: visible;
}
.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
	float: left;
}

/* with multiple calendars */
.ui-datepicker.ui-datepicker-multi {
	width: auto;
}
.ui-datepicker-multi .ui-datepicker-group {
	float: left;
}
.ui-datepicker-multi .ui-datepicker-group table {
	width: 95%;
	margin: 0 auto .4em;
}
.ui-datepicker-multi-2 .ui-datepicker-group {
	width: 50%;
}
.ui-datepicker-multi-3 .ui-datepicker-group {
	width: 33.3%;
}
.ui-datepicker-multi-4 .ui-datepicker-group {
	width: 25%;
}
.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,
.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
	border-left-width: 0;
}
.ui-datepicker-multi .ui-datepicker-buttonpane {
	clear: left;
}
.ui-datepicker-row-break {
	clear: both;
	width: 100%;
	font-size: 0;
}

/* RTL support */
.ui-datepicker-rtl {
	direction: rtl;
}
.ui-datepicker-rtl .ui-datepicker-prev {
	right: 2px;
	left: auto;
}
.ui-datepicker-rtl .ui-datepicker-next {
	left: 2px;
	right: auto;
}
.ui-datepicker-rtl .ui-datepicker-prev:hover {
	right: 1px;
	left: auto;
}
.ui-datepicker-rtl .ui-datepicker-next:hover {
	left: 1px;
	right: auto;
}
.ui-datepicker-rtl .ui-datepicker-buttonpane {
	clear: right;
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button {
	float: left;
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current,
.ui-datepicker-rtl .ui-datepicker-group {
	float: right;
}
.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header,
.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
	border-right-width: 0;
	border-left-width: 1px;
}
.ui-dialog {
	overflow: hidden;
	position: absolute;
	top: 0;
	left: 0;
	padding: .2em;
	outline: 0;
}
.ui-dialog .ui-dialog-titlebar {
	padding: .4em 1em;
	position: relative;
}
.ui-dialog .ui-dialog-title {
	float: left;
	margin: .1em 0;
	white-space: nowrap;
	width: 90%;
	overflow: hidden;
	text-overflow: ellipsis;
}
.ui-dialog .ui-dialog-titlebar-close {
	position: absolute;
	right: .3em;
	top: 50%;
	width: 20px;
	margin: -10px 0 0 0;
	padding: 1px;
	height: 20px;
}
.ui-dialog .ui-dialog-content {
	position: relative;
	border: 0;
	padding: .5em 1em;
	background: none;
	overflow: auto;
}
.ui-dialog .ui-dialog-buttonpane {
	text-align: left;
	border-width: 1px 0 0 0;
	background-image: none;
	margin-top: .5em;
	padding: .3em 1em .5em .4em;
}
.ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
	float: right;
}
.ui-dialog .ui-dialog-buttonpane button {
	margin: .5em .4em .5em 0;
	cursor: pointer;
}
.ui-dialog .ui-resizable-se {
	width: 12px;
	height: 12px;
	right: -5px;
	bottom: -5px;
	background-position: 16px 16px;
}
.ui-draggable .ui-dialog-titlebar {
	cursor: move;
}
.ui-menu {
	list-style: none;
	padding: 0;
	margin: 0;
	display: block;
	outline: none;
}
.ui-menu .ui-menu {
	position: absolute;
}
.ui-menu .ui-menu-item {
	position: relative;
	margin: 0;
	padding: 3px 1em 3px .4em;
	cursor: pointer;
	min-height: 0; /* support: IE7 */
	/* support: IE10, see #8844 */
	list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
}
.ui-menu .ui-menu-divider {
	margin: 5px 0;
	height: 0;
	font-size: 0;
	line-height: 0;
	border-width: 1px 0 0 0;
}
.ui-menu .ui-state-focus,
.ui-menu .ui-state-active {
	margin: -1px;
}

/* icon support */
.ui-menu-icons {
	position: relative;
}
.ui-menu-icons .ui-menu-item {
	padding-left: 2em;
}

/* left-aligned */
.ui-menu .ui-icon {
	position: absolute;
	top: 0;
	bottom: 0;
	left: .2em;
	margin: auto 0;
}

/* right-aligned */
.ui-menu .ui-menu-icon {
	left: auto;
	right: 0;
}
.ui-progressbar {
	height: 2em;
	text-align: left;
	overflow: hidden;
}
.ui-progressbar .ui-progressbar-value {
	margin: -1px;
	height: 100%;
}
.ui-progressbar .ui-progressbar-overlay {
	background: url("data:image/gif;base64,R0lGODlhKAAoAIABAAAAAP///yH/C05FVFNDQVBFMi4wAwEAAAAh+QQJAQABACwAAAAAKAAoAAACkYwNqXrdC52DS06a7MFZI+4FHBCKoDeWKXqymPqGqxvJrXZbMx7Ttc+w9XgU2FB3lOyQRWET2IFGiU9m1frDVpxZZc6bfHwv4c1YXP6k1Vdy292Fb6UkuvFtXpvWSzA+HycXJHUXiGYIiMg2R6W459gnWGfHNdjIqDWVqemH2ekpObkpOlppWUqZiqr6edqqWQAAIfkECQEAAQAsAAAAACgAKAAAApSMgZnGfaqcg1E2uuzDmmHUBR8Qil95hiPKqWn3aqtLsS18y7G1SzNeowWBENtQd+T1JktP05nzPTdJZlR6vUxNWWjV+vUWhWNkWFwxl9VpZRedYcflIOLafaa28XdsH/ynlcc1uPVDZxQIR0K25+cICCmoqCe5mGhZOfeYSUh5yJcJyrkZWWpaR8doJ2o4NYq62lAAACH5BAkBAAEALAAAAAAoACgAAAKVDI4Yy22ZnINRNqosw0Bv7i1gyHUkFj7oSaWlu3ovC8GxNso5fluz3qLVhBVeT/Lz7ZTHyxL5dDalQWPVOsQWtRnuwXaFTj9jVVh8pma9JjZ4zYSj5ZOyma7uuolffh+IR5aW97cHuBUXKGKXlKjn+DiHWMcYJah4N0lYCMlJOXipGRr5qdgoSTrqWSq6WFl2ypoaUAAAIfkECQEAAQAsAAAAACgAKAAAApaEb6HLgd/iO7FNWtcFWe+ufODGjRfoiJ2akShbueb0wtI50zm02pbvwfWEMWBQ1zKGlLIhskiEPm9R6vRXxV4ZzWT2yHOGpWMyorblKlNp8HmHEb/lCXjcW7bmtXP8Xt229OVWR1fod2eWqNfHuMjXCPkIGNileOiImVmCOEmoSfn3yXlJWmoHGhqp6ilYuWYpmTqKUgAAIfkECQEAAQAsAAAAACgAKAAAApiEH6kb58biQ3FNWtMFWW3eNVcojuFGfqnZqSebuS06w5V80/X02pKe8zFwP6EFWOT1lDFk8rGERh1TTNOocQ61Hm4Xm2VexUHpzjymViHrFbiELsefVrn6XKfnt2Q9G/+Xdie499XHd2g4h7ioOGhXGJboGAnXSBnoBwKYyfioubZJ2Hn0RuRZaflZOil56Zp6iioKSXpUAAAh+QQJAQABACwAAAAAKAAoAAACkoQRqRvnxuI7kU1a1UU5bd5tnSeOZXhmn5lWK3qNTWvRdQxP8qvaC+/yaYQzXO7BMvaUEmJRd3TsiMAgswmNYrSgZdYrTX6tSHGZO73ezuAw2uxuQ+BbeZfMxsexY35+/Qe4J1inV0g4x3WHuMhIl2jXOKT2Q+VU5fgoSUI52VfZyfkJGkha6jmY+aaYdirq+lQAACH5BAkBAAEALAAAAAAoACgAAAKWBIKpYe0L3YNKToqswUlvznigd4wiR4KhZrKt9Upqip61i9E3vMvxRdHlbEFiEXfk9YARYxOZZD6VQ2pUunBmtRXo1Lf8hMVVcNl8JafV38aM2/Fu5V16Bn63r6xt97j09+MXSFi4BniGFae3hzbH9+hYBzkpuUh5aZmHuanZOZgIuvbGiNeomCnaxxap2upaCZsq+1kAACH5BAkBAAEALAAAAAAoACgAAAKXjI8By5zf4kOxTVrXNVlv1X0d8IGZGKLnNpYtm8Lr9cqVeuOSvfOW79D9aDHizNhDJidFZhNydEahOaDH6nomtJjp1tutKoNWkvA6JqfRVLHU/QUfau9l2x7G54d1fl995xcIGAdXqMfBNadoYrhH+Mg2KBlpVpbluCiXmMnZ2Sh4GBqJ+ckIOqqJ6LmKSllZmsoq6wpQAAAh+QQJAQABACwAAAAAKAAoAAAClYx/oLvoxuJDkU1a1YUZbJ59nSd2ZXhWqbRa2/gF8Gu2DY3iqs7yrq+xBYEkYvFSM8aSSObE+ZgRl1BHFZNr7pRCavZ5BW2142hY3AN/zWtsmf12p9XxxFl2lpLn1rseztfXZjdIWIf2s5dItwjYKBgo9yg5pHgzJXTEeGlZuenpyPmpGQoKOWkYmSpaSnqKileI2FAAACH5BAkBAAEALAAAAAAoACgAAAKVjB+gu+jG4kORTVrVhRlsnn2dJ3ZleFaptFrb+CXmO9OozeL5VfP99HvAWhpiUdcwkpBH3825AwYdU8xTqlLGhtCosArKMpvfa1mMRae9VvWZfeB2XfPkeLmm18lUcBj+p5dnN8jXZ3YIGEhYuOUn45aoCDkp16hl5IjYJvjWKcnoGQpqyPlpOhr3aElaqrq56Bq7VAAAOw==");
	height: 100%;
	filter: alpha(opacity=25); /* support: IE8 */
	opacity: 0.25;
}
.ui-progressbar-indeterminate .ui-progressbar-value {
	background-image: none;
}
.ui-selectmenu-menu {
	padding: 0;
	margin: 0;
	position: absolute;
	top: 0;
	left: 0;
	display: none;
}
.ui-selectmenu-menu .ui-menu {
	overflow: auto;
	/* Support: IE7 */
	overflow-x: hidden;
	padding-bottom: 1px;
}
.ui-selectmenu-menu .ui-menu .ui-selectmenu-optgroup {
	font-size: 1em;
	font-weight: bold;
	line-height: 1.5;
	padding: 2px 0.4em;
	margin: 0.5em 0 0 0;
	height: auto;
	border: 0;
}
.ui-selectmenu-open {
	display: block;
}
.ui-selectmenu-button {
	display: inline-block;
	overflow: hidden;
	position: relative;
	text-decoration: none;
	cursor: pointer;
}
.ui-selectmenu-button span.ui-icon {
	right: 0.5em;
	left: auto;
	margin-top: -8px;
	position: absolute;
	top: 50%;
}
.ui-selectmenu-button span.ui-selectmenu-text {
	text-align: left;
	padding: 0.4em 2.1em 0.4em 1em;
	display: block;
	line-height: 1.4;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}
.ui-slider {
	position: relative;
	text-align: left;
}
.ui-slider .ui-slider-handle {
	position: absolute;
	z-index: 2;
	width: 1.2em;
	height: 1.2em;
	cursor: default;
	-ms-touch-action: none;
	touch-action: none;
}
.ui-slider .ui-slider-range {
	position: absolute;
	z-index: 1;
	font-size: .7em;
	display: block;
	border: 0;
	background-position: 0 0;
}

/* support: IE8 - See #6727 */
.ui-slider.ui-state-disabled .ui-slider-handle,
.ui-slider.ui-state-disabled .ui-slider-range {
	filter: inherit;
}

.ui-slider-horizontal {
	height: .8em;
}
.ui-slider-horizontal .ui-slider-handle {
	top: -.3em;
	margin-left: -.6em;
}
.ui-slider-horizontal .ui-slider-range {
	top: 0;
	height: 100%;
}
.ui-slider-horizontal .ui-slider-range-min {
	left: 0;
}
.ui-slider-horizontal .ui-slider-range-max {
	right: 0;
}

.ui-slider-vertical {
	width: .8em;
	height: 100px;
}
.ui-slider-vertical .ui-slider-handle {
	left: -.3em;
	margin-left: 0;
	margin-bottom: -.6em;
}
.ui-slider-vertical .ui-slider-range {
	left: 0;
	width: 100%;
}
.ui-slider-vertical .ui-slider-range-min {
	bottom: 0;
}
.ui-slider-vertical .ui-slider-range-max {
	top: 0;
}
.ui-spinner {
	position: relative;
	display: inline-block;
	overflow: hidden;
	padding: 0;
	vertical-align: middle;
}
.ui-spinner-input {
	border: none;
	background: none;
	color: inherit;
	padding: 0;
	margin: .2em 0;
	vertical-align: middle;
	margin-left: .4em;
	margin-right: 22px;
}
.ui-spinner-button {
	width: 16px;
	height: 50%;
	font-size: .5em;
	padding: 0;
	margin: 0;
	text-align: center;
	position: absolute;
	cursor: default;
	display: block;
	overflow: hidden;
	right: 0;
}
/* more specificity required here to override default borders */
.ui-spinner a.ui-spinner-button {
	border-top: none;
	border-bottom: none;
	border-right: none;
}
/* vertically center icon */
.ui-spinner .ui-icon {
	position: absolute;
	margin-top: -8px;
	top: 50%;
	left: 0;
}
.ui-spinner-up {
	top: 0;
}
.ui-spinner-down {
	bottom: 0;
}

/* TR overrides */
.ui-spinner .ui-icon-triangle-1-s {
	/* need to fix icons sprite */
	background-position: -65px -16px;
}
.ui-tabs {
	position: relative;/* position: relative prevents IE scroll bug (element with position: relative inside container with overflow: auto appear as "fixed") */
	padding: .2em;
}
.ui-tabs .ui-tabs-nav {
	margin: 0;
	padding: .2em .2em 0;
}
.ui-tabs .ui-tabs-nav li {
	list-style: none;
	float: left;
	position: relative;
	top: 0;
	margin: 1px .2em 0 0;
	border-bottom-width: 0;
	padding: 0;
	white-space: nowrap;
}
.ui-tabs .ui-tabs-nav .ui-tabs-anchor {
	float: left;
	padding: .5em 1em;
	text-decoration: none;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active {
	margin-bottom: -1px;
	padding-bottom: 1px;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor,
.ui-tabs .ui-tabs-nav li.ui-state-disabled .ui-tabs-anchor,
.ui-tabs .ui-tabs-nav li.ui-tabs-loading .ui-tabs-anchor {
	cursor: text;
}
.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-active .ui-tabs-anchor {
	cursor: pointer;
}
.ui-tabs .ui-tabs-panel {
	display: block;
	border-width: 0;
	padding: 1em 1.4em;
	background: none;
}
.ui-tooltip {
	padding: 8px;
	position: absolute;
	z-index: 9999;
	max-width: 300px;
	-webkit-box-shadow: 0 0 5px #aaa;
	box-shadow: 0 0 5px #aaa;
}
body .ui-tooltip {
	border-width: 2px;
}

/* Component containers
----------------------------------*/
.ui-widget {
	font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
	font-size: 1.1em;
}
.ui-widget .ui-widget {
	font-size: 1em;
}
.ui-widget input,
.ui-widget select,
.ui-widget textarea,
.ui-widget button {
	font-family: Trebuchet MS,Tahoma,Verdana,Arial,sans-serif;
	font-size: 1em;
}
.ui-widget-content {
	border: 1px solid #dddddd;
	background: #eeeeee url("/media/js/jqueryui/images/ui-bg_highlight-soft_100_eeeeee_1x100.png") 50% top repeat-x;
	color: #333333;
}
.ui-widget-content a {
	color: #333333;
}
.ui-widget-header {
	border: 1px solid #e78f08;
	background: #f6a828 url("/media/js/jqueryui/images/ui-bg_gloss-wave_35_f6a828_500x100.png") 50% 50% repeat-x;
	color: #ffffff;
	font-weight: bold;
}
.ui-widget-header a {
	color: #ffffff;
}

/* Interaction states
----------------------------------*/
.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
	border: 1px solid #cccccc;
	background: #f6f6f6 url("/media/js/jqueryui/images/ui-bg_glass_100_f6f6f6_1x400.png") 50% 50% repeat-x;
	font-weight: bold;
	color: #1c94c4;
}
.ui-state-default a,
.ui-state-default a:link,
.ui-state-default a:visited {
	color: #1c94c4;
	text-decoration: none;
}
.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
	border: 1px solid #fbcb09;
	background: #fdf5ce url("/media/js/jqueryui/images/ui-bg_glass_100_fdf5ce_1x400.png") 50% 50% repeat-x;
	font-weight: bold;
	color: #c77405;
}
.ui-state-hover a,
.ui-state-hover a:hover,
.ui-state-hover a:link,
.ui-state-hover a:visited,
.ui-state-focus a,
.ui-state-focus a:hover,
.ui-state-focus a:link,
.ui-state-focus a:visited {
	color: #c77405;
	text-decoration: none;
}
.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
	border: 1px solid #fbd850;
	background: #ffffff url("/media/js/jqueryui/images/ui-bg_glass_65_ffffff_1x400.png") 50% 50% repeat-x;
	font-weight: bold;
	color: #eb8f00;
}
.ui-state-active a,
.ui-state-active a:link,
.ui-state-active a:visited {
	color: #eb8f00;
	text-decoration: none;
}

/* Interaction Cues
----------------------------------*/
.ui-state-highlight,
.ui-widget-content .ui-state-highlight,
.ui-widget-header .ui-state-highlight {
	border: 1px solid #fed22f;
	background: #ffe45c url("/media/js/jqueryui/images/ui-bg_highlight-soft_75_ffe45c_1x100.png") 50% top repeat-x;
	color: #363636;
}
.ui-state-highlight a,
.ui-widget-content .ui-state-highlight a,
.ui-widget-header .ui-state-highlight a {
	color: #363636;
}
.ui-state-error,
.ui-widget-content .ui-state-error,
.ui-widget-header .ui-state-error {
	border: 1px solid #cd0a0a;
	background: #b81900 url("/media/js/jqueryui/images/ui-bg_diagonals-thick_18_b81900_40x40.png") 50% 50% repeat;
	color: #ffffff;
}
.ui-state-error a,
.ui-widget-content .ui-state-error a,
.ui-widget-header .ui-state-error a {
	color: #ffffff;
}
.ui-state-error-text,
.ui-widget-content .ui-state-error-text,
.ui-widget-header .ui-state-error-text {
	color: #ffffff;
}
.ui-priority-primary,
.ui-widget-content .ui-priority-primary,
.ui-widget-header .ui-priority-primary {
	font-weight: bold;
}
.ui-priority-secondary,
.ui-widget-content .ui-priority-secondary,
.ui-widget-header .ui-priority-secondary {
	opacity: .7;
	filter:Alpha(Opacity=70); /* support: IE8 */
	font-weight: normal;
}
.ui-state-disabled,
.ui-widget-content .ui-state-disabled,
.ui-widget-header .ui-state-disabled {
	opacity: .35;
	filter:Alpha(Opacity=35); /* support: IE8 */
	background-image: none;
}
.ui-state-disabled .ui-icon {
	filter:Alpha(Opacity=35); /* support: IE8 - See #6059 */
}

/* Icons
----------------------------------*/

/* states and images */
.ui-icon {
	width: 16px;
	height: 16px;
}
.ui-icon,
.ui-widget-content .ui-icon {
	background-image: url("/media/js/jqueryui/images/ui-icons_222222_256x240.png");
}
.ui-widget-header .ui-icon {
	background-image: url("/media/js/jqueryui/images/ui-icons_ffffff_256x240.png");
}
.ui-state-default .ui-icon {
	background-image: url("/media/js/jqueryui/images/ui-icons_ef8c08_256x240.png");
}
.ui-state-hover .ui-icon,
.ui-state-focus .ui-icon {
	background-image: url("/media/js/jqueryui/images/ui-icons_ef8c08_256x240.png");
}
.ui-state-active .ui-icon {
	background-image: url("/media/js/jqueryui/images/ui-icons_ef8c08_256x240.png");
}
.ui-state-highlight .ui-icon {
	background-image: url("/media/js/jqueryui/images/ui-icons_228ef1_256x240.png");
}
.ui-state-error .ui-icon,
.ui-state-error-text .ui-icon {
	background-image: url("/media/js/jqueryui/images/ui-icons_ffd27a_256x240.png");
}

/* positioning */
.ui-icon-blank { background-position: 16px 16px; }
.ui-icon-carat-1-n { background-position: 0 0; }
.ui-icon-carat-1-ne { background-position: -16px 0; }
.ui-icon-carat-1-e { background-position: -32px 0; }
.ui-icon-carat-1-se { background-position: -48px 0; }
.ui-icon-carat-1-s { background-position: -64px 0; }
.ui-icon-carat-1-sw { background-position: -80px 0; }
.ui-icon-carat-1-w { background-position: -96px 0; }
.ui-icon-carat-1-nw { background-position: -112px 0; }
.ui-icon-carat-2-n-s { background-position: -128px 0; }
.ui-icon-carat-2-e-w { background-position: -144px 0; }
.ui-icon-triangle-1-n { background-position: 0 -16px; }
.ui-icon-triangle-1-ne { background-position: -16px -16px; }
.ui-icon-triangle-1-e { background-position: -32px -16px; }
.ui-icon-triangle-1-se { background-position: -48px -16px; }
.ui-icon-triangle-1-s { background-position: -64px -16px; }
.ui-icon-triangle-1-sw { background-position: -80px -16px; }
.ui-icon-triangle-1-w { background-position: -96px -16px; }
.ui-icon-triangle-1-nw { background-position: -112px -16px; }
.ui-icon-triangle-2-n-s { background-position: -128px -16px; }
.ui-icon-triangle-2-e-w { background-position: -144px -16px; }
.ui-icon-arrow-1-n { background-position: 0 -32px; }
.ui-icon-arrow-1-ne { background-position: -16px -32px; }
.ui-icon-arrow-1-e { background-position: -32px -32px; }
.ui-icon-arrow-1-se { background-position: -48px -32px; }
.ui-icon-arrow-1-s { background-position: -64px -32px; }
.ui-icon-arrow-1-sw { background-position: -80px -32px; }
.ui-icon-arrow-1-w { background-position: -96px -32px; }
.ui-icon-arrow-1-nw { background-position: -112px -32px; }
.ui-icon-arrow-2-n-s { background-position: -128px -32px; }
.ui-icon-arrow-2-ne-sw { background-position: -144px -32px; }
.ui-icon-arrow-2-e-w { background-position: -160px -32px; }
.ui-icon-arrow-2-se-nw { background-position: -176px -32px; }
.ui-icon-arrowstop-1-n { background-position: -192px -32px; }
.ui-icon-arrowstop-1-e { background-position: -208px -32px; }
.ui-icon-arrowstop-1-s { background-position: -224px -32px; }
.ui-icon-arrowstop-1-w { background-position: -240px -32px; }
.ui-icon-arrowthick-1-n { background-position: 0 -48px; }
.ui-icon-arrowthick-1-ne { background-position: -16px -48px; }
.ui-icon-arrowthick-1-e { background-position: -32px -48px; }
.ui-icon-arrowthick-1-se { background-position: -48px -48px; }
.ui-icon-arrowthick-1-s { background-position: -64px -48px; }
.ui-icon-arrowthick-1-sw { background-position: -80px -48px; }
.ui-icon-arrowthick-1-w { background-position: -96px -48px; }
.ui-icon-arrowthick-1-nw { background-position: -112px -48px; }
.ui-icon-arrowthick-2-n-s { background-position: -128px -48px; }
.ui-icon-arrowthick-2-ne-sw { background-position: -144px -48px; }
.ui-icon-arrowthick-2-e-w { background-position: -160px -48px; }
.ui-icon-arrowthick-2-se-nw { background-position: -176px -48px; }
.ui-icon-arrowthickstop-1-n { background-position: -192px -48px; }
.ui-icon-arrowthickstop-1-e { background-position: -208px -48px; }
.ui-icon-arrowthickstop-1-s { background-position: -224px -48px; }
.ui-icon-arrowthickstop-1-w { background-position: -240px -48px; }
.ui-icon-arrowreturnthick-1-w { background-position: 0 -64px; }
.ui-icon-arrowreturnthick-1-n { background-position: -16px -64px; }
.ui-icon-arrowreturnthick-1-e { background-position: -32px -64px; }
.ui-icon-arrowreturnthick-1-s { background-position: -48px -64px; }
.ui-icon-arrowreturn-1-w { background-position: -64px -64px; }
.ui-icon-arrowreturn-1-n { background-position: -80px -64px; }
.ui-icon-arrowreturn-1-e { background-position: -96px -64px; }
.ui-icon-arrowreturn-1-s { background-position: -112px -64px; }
.ui-icon-arrowrefresh-1-w { background-position: -128px -64px; }
.ui-icon-arrowrefresh-1-n { background-position: -144px -64px; }
.ui-icon-arrowrefresh-1-e { background-position: -160px -64px; }
.ui-icon-arrowrefresh-1-s { background-position: -176px -64px; }
.ui-icon-arrow-4 { background-position: 0 -80px; }
.ui-icon-arrow-4-diag { background-position: -16px -80px; }
.ui-icon-extlink { background-position: -32px -80px; }
.ui-icon-newwin { background-position: -48px -80px; }
.ui-icon-refresh { background-position: -64px -80px; }
.ui-icon-shuffle { background-position: -80px -80px; }
.ui-icon-transfer-e-w { background-position: -96px -80px; }
.ui-icon-transferthick-e-w { background-position: -112px -80px; }
.ui-icon-folder-collapsed { background-position: 0 -96px; }
.ui-icon-folder-open { background-position: -16px -96px; }
.ui-icon-document { background-position: -32px -96px; }
.ui-icon-document-b { background-position: -48px -96px; }
.ui-icon-note { background-position: -64px -96px; }
.ui-icon-mail-closed { background-position: -80px -96px; }
.ui-icon-mail-open { background-position: -96px -96px; }
.ui-icon-suitcase { background-position: -112px -96px; }
.ui-icon-comment { background-position: -128px -96px; }
.ui-icon-person { background-position: -144px -96px; }
.ui-icon-print { background-position: -160px -96px; }
.ui-icon-trash { background-position: -176px -96px; }
.ui-icon-locked { background-position: -192px -96px; }
.ui-icon-unlocked { background-position: -208px -96px; }
.ui-icon-bookmark { background-position: -224px -96px; }
.ui-icon-tag { background-position: -240px -96px; }
.ui-icon-home { background-position: 0 -112px; }
.ui-icon-flag { background-position: -16px -112px; }
.ui-icon-calendar { background-position: -32px -112px; }
.ui-icon-cart { background-position: -48px -112px; }
.ui-icon-pencil { background-position: -64px -112px; }
.ui-icon-clock { background-position: -80px -112px; }
.ui-icon-disk { background-position: -96px -112px; }
.ui-icon-calculator { background-position: -112px -112px; }
.ui-icon-zoomin { background-position: -128px -112px; }
.ui-icon-zoomout { background-position: -144px -112px; }
.ui-icon-search { background-position: -160px -112px; }
.ui-icon-wrench { background-position: -176px -112px; }
.ui-icon-gear { background-position: -192px -112px; }
.ui-icon-heart { background-position: -208px -112px; }
.ui-icon-star { background-position: -224px -112px; }
.ui-icon-link { background-position: -240px -112px; }
.ui-icon-cancel { background-position: 0 -128px; }
.ui-icon-plus { background-position: -16px -128px; }
.ui-icon-plusthick { background-position: -32px -128px; }
.ui-icon-minus { background-position: -48px -128px; }
.ui-icon-minusthick { background-position: -64px -128px; }
.ui-icon-close { background-position: -80px -128px; }
.ui-icon-closethick { background-position: -96px -128px; }
.ui-icon-key { background-position: -112px -128px; }
.ui-icon-lightbulb { background-position: -128px -128px; }
.ui-icon-scissors { background-position: -144px -128px; }
.ui-icon-clipboard { background-position: -160px -128px; }
.ui-icon-copy { background-position: -176px -128px; }
.ui-icon-contact { background-position: -192px -128px; }
.ui-icon-image { background-position: -208px -128px; }
.ui-icon-video { background-position: -224px -128px; }
.ui-icon-script { background-position: -240px -128px; }
.ui-icon-alert { background-position: 0 -144px; }
.ui-icon-info { background-position: -16px -144px; }
.ui-icon-notice { background-position: -32px -144px; }
.ui-icon-help { background-position: -48px -144px; }
.ui-icon-check { background-position: -64px -144px; }
.ui-icon-bullet { background-position: -80px -144px; }
.ui-icon-radio-on { background-position: -96px -144px; }
.ui-icon-radio-off { background-position: -112px -144px; }
.ui-icon-pin-w { background-position: -128px -144px; }
.ui-icon-pin-s { background-position: -144px -144px; }
.ui-icon-play { background-position: 0 -160px; }
.ui-icon-pause { background-position: -16px -160px; }
.ui-icon-seek-next { background-position: -32px -160px; }
.ui-icon-seek-prev { background-position: -48px -160px; }
.ui-icon-seek-end { background-position: -64px -160px; }
.ui-icon-seek-start { background-position: -80px -160px; }
/* ui-icon-seek-first is deprecated, use ui-icon-seek-start instead */
.ui-icon-seek-first { background-position: -80px -160px; }
.ui-icon-stop { background-position: -96px -160px; }
.ui-icon-eject { background-position: -112px -160px; }
.ui-icon-volume-off { background-position: -128px -160px; }
.ui-icon-volume-on { background-position: -144px -160px; }
.ui-icon-power { background-position: 0 -176px; }
.ui-icon-signal-diag { background-position: -16px -176px; }
.ui-icon-signal { background-position: -32px -176px; }
.ui-icon-battery-0 { background-position: -48px -176px; }
.ui-icon-battery-1 { background-position: -64px -176px; }
.ui-icon-battery-2 { background-position: -80px -176px; }
.ui-icon-battery-3 { background-position: -96px -176px; }
.ui-icon-circle-plus { background-position: 0 -192px; }
.ui-icon-circle-minus { background-position: -16px -192px; }
.ui-icon-circle-close { background-position: -32px -192px; }
.ui-icon-circle-triangle-e { background-position: -48px -192px; }
.ui-icon-circle-triangle-s { background-position: -64px -192px; }
.ui-icon-circle-triangle-w { background-position: -80px -192px; }
.ui-icon-circle-triangle-n { background-position: -96px -192px; }
.ui-icon-circle-arrow-e { background-position: -112px -192px; }
.ui-icon-circle-arrow-s { background-position: -128px -192px; }
.ui-icon-circle-arrow-w { background-position: -144px -192px; }
.ui-icon-circle-arrow-n { background-position: -160px -192px; }
.ui-icon-circle-zoomin { background-position: -176px -192px; }
.ui-icon-circle-zoomout { background-position: -192px -192px; }
.ui-icon-circle-check { background-position: -208px -192px; }
.ui-icon-circlesmall-plus { background-position: 0 -208px; }
.ui-icon-circlesmall-minus { background-position: -16px -208px; }
.ui-icon-circlesmall-close { background-position: -32px -208px; }
.ui-icon-squaresmall-plus { background-position: -48px -208px; }
.ui-icon-squaresmall-minus { background-position: -64px -208px; }
.ui-icon-squaresmall-close { background-position: -80px -208px; }
.ui-icon-grip-dotted-vertical { background-position: 0 -224px; }
.ui-icon-grip-dotted-horizontal { background-position: -16px -224px; }
.ui-icon-grip-solid-vertical { background-position: -32px -224px; }
.ui-icon-grip-solid-horizontal { background-position: -48px -224px; }
.ui-icon-gripsmall-diagonal-se { background-position: -64px -224px; }
.ui-icon-grip-diagonal-se { background-position: -80px -224px; }


/* Misc visuals
----------------------------------*/

/* Corner radius */
.ui-corner-all,
.ui-corner-top,
.ui-corner-left,
.ui-corner-tl {
	border-top-left-radius: 4px;
}
.ui-corner-all,
.ui-corner-top,
.ui-corner-right,
.ui-corner-tr {
	border-top-right-radius: 4px;
}
.ui-corner-all,
.ui-corner-bottom,
.ui-corner-left,
.ui-corner-bl {
	border-bottom-left-radius: 4px;
}
.ui-corner-all,
.ui-corner-bottom,
.ui-corner-right,
.ui-corner-br {
	border-bottom-right-radius: 4px;
}

/* Overlays */
.ui-widget-overlay {
	background: #666666 url("/media/js/jqueryui/images/ui-bg_diagonals-thick_20_666666_40x40.png") 50% 50% repeat;
	opacity: .5;
	filter: Alpha(Opacity=50); /* support: IE8 */
}
.ui-widget-shadow {
	margin: -5px 0 0 -5px;
	padding: 5px;
	background: #000000 url("/media/js/jqueryui/images/ui-bg_flat_10_000000_40x100.png") 50% 50% repeat-x;
	opacity: .2;
	filter: Alpha(Opacity=20); /* support: IE8 */
	border-radius: 5px;
}



/*!
 * ClockPicker v0.0.7 for jQuery (http://weareoutman.github.io/clockpicker/)
 * Copyright 2014 Wang Shenwei.
 * Licensed under MIT (https://github.com/weareoutman/clockpicker/blob/gh-pages/LICENSE)
 * 
 * Bootstrap v3.1.1 (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */.popover{position:absolute;top:0;left:0;z-index:1010;display:none;max-width:276px;padding:1px;text-align:left;white-space:normal;background-color:#fff;background-clip:padding-box;border:1px solid #ccc;border:1px solid rgba(0,0,0,.2);border-radius:6px;-webkit-box-shadow:0 5px 10px rgba(0,0,0,.2);box-shadow:0 5px 10px rgba(0,0,0,.2)}.popover.top{margin-top:-10px}.popover.right{margin-left:10px}.popover.bottom{margin-top:10px}.popover.left{margin-left:-10px}.popover-title{padding:8px 14px;margin:0;font-size:14px;font-weight:400;line-height:18px;background-color:#f7f7f7;border-bottom:1px solid #ebebeb;border-radius:5px 5px 0 0}.popover-content{padding:9px 14px}.popover>.arrow,.popover>.arrow:after{position:absolute;display:block;width:0;height:0;border-color:transparent;border-style:solid;overflow:visible;margin:0;padding:0;z-index:auto;background-color:transparent;-webkit-box-shadow:none;box-shadow:none;bottom:auto;left:auto;right:auto;top:auto;-webkit-transform:none;-ms-transform:none;transform:none}.popover>.arrow{border-width:11px}.popover>.arrow:after{content:"";border-width:10px}.popover.top>.arrow{bottom:-11px;left:50%;margin-left:-11px;border-top-color:#999;border-top-color:rgba(0,0,0,.25);border-bottom-width:0}.popover.top>.arrow:after{bottom:1px;margin-left:-10px;content:" ";border-top-color:#fff;border-bottom-width:0}.popover.right>.arrow{top:50%;left:-11px;margin-top:-11px;border-right-color:#999;border-right-color:rgba(0,0,0,.25);border-left-width:0}.popover.right>.arrow:after{bottom:-10px;left:1px;content:" ";border-right-color:#fff;border-left-width:0}.popover.bottom>.arrow{top:-11px;left:50%;margin-left:-11px;border-top-width:0;border-bottom-color:#999;border-bottom-color:rgba(0,0,0,.25)}.popover.bottom>.arrow:after{top:1px;margin-left:-10px;content:" ";border-top-width:0;border-bottom-color:#fff}.popover.left>.arrow{top:50%;right:-11px;margin-top:-11px;border-right-width:0;border-left-color:#999;border-left-color:rgba(0,0,0,.25)}.popover.left>.arrow:after{right:1px;bottom:-10px;content:" ";border-right-width:0;border-left-color:#fff}.btn{cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-image:none;border:1px solid transparent}.btn.active:focus,.btn:active:focus,.btn:focus{outline:dotted thin;outline:-webkit-focus-ring-color auto 5px;outline-offset:-2px}.btn:focus,.btn:hover{color:#333;text-decoration:none}.btn.active,.btn:active{background-image:none;outline:0;-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,.125);box-shadow:inset 0 3px 5px rgba(0,0,0,.125)}.btn-default{color:#333;background-color:#fff;border-color:#ccc}.btn-default.active,.btn-default:active,.btn-default:focus,.btn-default:hover,.open .dropdown-toggle.btn-default{color:#333;background-color:#ebebeb;border-color:#adadad}.btn-default.active,.btn-default:active,.open .dropdown-toggle.btn-default{background-image:none}.btn-block{display:block;width:100%}.text-primary{color:#428bca}.clockpicker .input-group-addon{cursor:pointer}.clockpicker-moving{cursor:move}.clockpicker-align-left.popover>.arrow{left:25px}.clockpicker-align-top.popover>.arrow{top:17px}.clockpicker-align-right.popover>.arrow{left:auto;right:25px}.clockpicker-align-bottom.popover>.arrow{top:auto;bottom:6px}.clockpicker-popover .popover-title{background-color:#fff;color:#999;font-size:24px;font-weight:700;line-height:30px;text-align:center}.clockpicker-popover .popover-title span{cursor:pointer}.clockpicker-popover .popover-content{background-color:#f8f8f8;padding:12px}.popover-content:last-child{border-bottom-left-radius:5px;border-bottom-right-radius:5px}.clockpicker-plate{background-color:#fff;border:1px solid #ccc;border-radius:50%;width:200px;height:200px;overflow:visible;position:relative;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.clockpicker-canvas,.clockpicker-dial{width:200px;height:200px;position:absolute;left:-1px;top:-1px}.clockpicker-minutes{visibility:hidden}.clockpicker-tick{border-radius:50%;color:#666;line-height:26px;text-align:center;width:26px;height:26px;position:absolute;cursor:pointer}.clockpicker-tick.active,.clockpicker-tick:hover{background-color:#c0e5f7;background-color:rgba(0,149,221,.25)}.clockpicker-button{background-image:none;background-color:#fff;border-width:1px 0 0;border-top-left-radius:0;border-top-right-radius:0;margin:0;padding:10px 0}.clockpicker-button:hover{background-image:none;background-color:#ebebeb}.clockpicker-button:focus{outline:0!important}.clockpicker-dial{-webkit-transition:-webkit-transform 350ms,opacity 350ms;-moz-transition:-moz-transform 350ms,opacity 350ms;-ms-transition:-ms-transform 350ms,opacity 350ms;-o-transition:-o-transform 350ms,opacity 350ms;transition:transform 350ms,opacity 350ms}.clockpicker-dial-out{opacity:0}.clockpicker-hours.clockpicker-dial-out{-webkit-transform:scale(1.2,1.2);-moz-transform:scale(1.2,1.2);-ms-transform:scale(1.2,1.2);-o-transform:scale(1.2,1.2);transform:scale(1.2,1.2)}.clockpicker-minutes.clockpicker-dial-out{-webkit-transform:scale(.8,.8);-moz-transform:scale(.8,.8);-ms-transform:scale(.8,.8);-o-transform:scale(.8,.8);transform:scale(.8,.8)}.clockpicker-canvas{-webkit-transition:opacity 175ms;-moz-transition:opacity 175ms;-ms-transition:opacity 175ms;-o-transition:opacity 175ms;transition:opacity 175ms}.clockpicker-canvas-out{opacity:.25}.clockpicker-canvas-bearing,.clockpicker-canvas-fg{stroke:none;fill:#0095dd}.clockpicker-canvas-bg{stroke:none;fill:#c0e5f7}.clockpicker-canvas-bg-trans{fill:rgba(0,149,221,.25)}.clockpicker-canvas line{stroke:#0095dd;stroke-width:1;stroke-linecap:round}.clockpicker-button.am-button{margin:1px;padding:5px;border:1px solid rgba(0,0,0,.2);border-radius:4px}.clockpicker-button.pm-button{margin:1px 1px 1px 136px;padding:5px;border:1px solid rgba(0,0,0,.2);border-radius:4px}



div.jGrowl {
	padding-bottom:		16px;
	padding-right:		9px;
	z-index: 			9999999;
}

/** Normal Style Positions **/
body > div.jGrowl {
	position:			fixed;
}

body > div.jGrowl.top-left {
	left: 				0px;
	top: 				0px;
}

body > div.jGrowl.top-right {
	right: 				0px;
	top: 				0px;
}

body > div.jGrowl.bottom-left {
	left: 				0px;
	bottom:				0px;
}

body > div.jGrowl.bottom-right {
	right: 				0px;
	bottom: 			16px;
}

body > div.jGrowl.center {
	top: 				0px;
	width: 				50%;
	left: 				25%;
}

/** Cross Browser Styling **/
div.center div.jGrowl-notification, div.center div.jGrowl-closer {
	margin-left: 		auto;
	margin-right: 		auto;
}

div.jGrowl div.jGrowl-notification, div.jGrowl div.jGrowl-closer {
	zoom: 					1;
	width: 					235px;
	padding: 				10px;
	margin-bottom: 			1px;
	font-family: 			Tahoma, Arial, Helvetica, sans-serif;
	font-size: 				11px;
	text-align: 			left;
	display: 				none;
	-moz-border-radius: 	5px;
	-webkit-border-radius:	5px;
}

div.jGrowl div.jGrowl-notification {
	min-height: 			20px;
}

div.jGrowl div.jGrowl-notification div.header {
	font-weight: 			bold;
	font-size:				12px;
}

.jGrowlDate {
	clear:					both;
	text-align:				right;
	font-size:				9px;
}

div.jGrowl div.jGrowl-notification div.close {
	z-index:				99;
	float: 					right;
	font-weight: 			bold;
	font-size: 				12px;
	cursor:					pointer;
}

div.jGrowl div.jGrowl-closer {
	height: 				15px;
	padding-top: 			4px;
	padding-bottom: 		4px;
	cursor: 				pointer;
	font-size:				11px;
	font-weight: 			bold;
	text-align: 			center;
}

/** Hide jGrowl when printing **/
@media print {
	div.jGrowl {
		display: 			none;
	}
}


/*
 * Timepicker stylesheet
 * Highly inspired from datepicker
 * FG - Nov 2010 - Web3R 
 *
 * version 0.0.3 : Fixed some settings, more dynamic
 * version 0.0.4 : Removed width:100% on tables
 * version 0.1.1 : set width 0 on tables to fix an ie6 bug
 */

.ui-timepicker-inline { display: inline; }

#ui-timepicker-div { padding: 0.2em }
.ui-timepicker-table { display: inline-table;}
.ui-timepicker-table table { margin:0.15em 0 0 0; border-collapse: collapse; }

.ui-timepicker-hours, .ui-timepicker-minutes { padding: 0.2em;  }

.ui-timepicker-table .ui-timepicker-title { line-height: 1.8em; text-align: center; }
.ui-timepicker-table td { padding: 0.1em; width: 2.2em; }
.ui-timepicker-table th.periods { padding: 0.1em; width: 2.2em; }
.ui-timepicker-div dl { margin:0px; }

/* span for disabled cells */
.ui-timepicker-table td span {
	display:block;
    padding:0.2em 0.3em 0.2em 0.5em;
    width: 1.2em;

    text-align:right;
    text-decoration:none;
}
/* anchors for clickable cells */
.ui-timepicker-table td a {
    display:block;
    padding:0.2em 0.3em 0.2em 0.5em;
    width: 1.2em;
    cursor: pointer;
    text-align:right;
    text-decoration:none;
}


/* buttons and button pane styling */
.ui-timepicker .ui-timepicker-buttonpane {
    background-image: none; margin: .7em 0 0 0; padding:0 .2em; border-left: 0; border-right: 0; border-bottom: 0;
}
.ui-timepicker .ui-timepicker-buttonpane button { margin: .5em .2em .4em; cursor: pointer; padding: .2em .6em .3em .6em; width:auto; overflow:visible; }
/* The close button */
.ui-timepicker .ui-timepicker-close { float: right }

/* the now button */
.ui-timepicker .ui-timepicker-now { float: left; }

/* the deselect button */
.ui-timepicker .ui-timepicker-deselect { float: left; }


/* IE6 IFRAME FIX (taken from datepicker 1.5.3 */
.ui-timepicker-cover {
    display: none; /*sorry for IE5*/
    display/**/: block; /*sorry for IE5*/
    position: absolute; /*must have*/
    z-index: -1; /*must have*/
    filter: mask(); /*must have*/
    top: -4px; /*must have*/
    left: -4px; /*must have*/
    width: 200px; /*must have*/
    height: 200px; /*must have*/
}
.ui-datepicker dd,.ui-datepicker dt
{
    display:inline;
    -webkit-margin-start: 0;
}

#ui-datepicker-div
{
    padding:10px;
}



/* qTip2 v2.2.1 | Plugins: viewport | Styles: core basic css3 | qtip2.com | Licensed MIT | Mon Sep 08 2014 06:39:54 */

.qtip{position:absolute;left:-28000px;top:-28000px;display:none;max-width:280px;min-width:50px;font-size:10.5px;line-height:12px;direction:ltr;box-shadow:none;padding:0}.qtip-content{position:relative;padding:5px 9px;overflow:hidden;text-align:left;word-wrap:break-word}.qtip-titlebar{position:relative;padding:5px 35px 5px 10px;overflow:hidden;border-width:0 0 1px;font-weight:700}.qtip-titlebar+.qtip-content{border-top-width:0!important}.qtip-close{position:absolute;right:-9px;top:-9px;z-index:11;cursor:pointer;outline:0;border:1px solid transparent}.qtip-titlebar .qtip-close{right:4px;top:50%;margin-top:-9px}* html .qtip-titlebar .qtip-close{top:16px}.qtip-icon .ui-icon,.qtip-titlebar .ui-icon{display:block;text-indent:-1000em;direction:ltr}.qtip-icon,.qtip-icon .ui-icon{-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;text-decoration:none}.qtip-icon .ui-icon{width:18px;height:14px;line-height:14px;text-align:center;text-indent:0;font:400 bold 10px/13px Tahoma,sans-serif;color:inherit;background:-100em -100em no-repeat}.qtip-default{border:1px solid #F1D031;background-color:#FFFFA3;color:#555}.qtip-default .qtip-titlebar{background-color:#FFEF93}.qtip-default .qtip-icon{border-color:#CCC;background:#F1F1F1;color:#777}.qtip-default .qtip-titlebar .qtip-close{border-color:#AAA;color:#111}.qtip-light{background-color:#fff;border-color:#E2E2E2;color:#454545}.qtip-light .qtip-titlebar{background-color:#f1f1f1}.qtip-dark{background-color:#505050;border-color:#303030;color:#f3f3f3}.qtip-dark .qtip-titlebar{background-color:#404040}.qtip-dark .qtip-icon{border-color:#444}.qtip-dark .qtip-titlebar .ui-state-hover{border-color:#303030}.qtip-cream{background-color:#FBF7AA;border-color:#F9E98E;color:#A27D35}.qtip-cream .qtip-titlebar{background-color:#F0DE7D}.qtip-cream .qtip-close .qtip-icon{background-position:-82px 0}.qtip-red{background-color:#F78B83;border-color:#D95252;color:#912323}.qtip-red .qtip-titlebar{background-color:#F06D65}.qtip-red .qtip-close .qtip-icon{background-position:-102px 0}.qtip-red .qtip-icon,.qtip-red .qtip-titlebar .ui-state-hover{border-color:#D95252}.qtip-green{background-color:#CAED9E;border-color:#90D93F;color:#3F6219}.qtip-green .qtip-titlebar{background-color:#B0DE78}.qtip-green .qtip-close .qtip-icon{background-position:-42px 0}.qtip-blue{background-color:#E5F6FE;border-color:#ADD9ED;color:#5E99BD}.qtip-blue .qtip-titlebar{background-color:#D0E9F5}.qtip-blue .qtip-close .qtip-icon{background-position:-2px 0}.qtip-shadow{-webkit-box-shadow:1px 1px 3px 1px rgba(0,0,0,.15);-moz-box-shadow:1px 1px 3px 1px rgba(0,0,0,.15);box-shadow:1px 1px 3px 1px rgba(0,0,0,.15)}.qtip-bootstrap,.qtip-rounded,.qtip-tipsy{-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px}.qtip-rounded .qtip-titlebar{-moz-border-radius:4px 4px 0 0;-webkit-border-radius:4px 4px 0 0;border-radius:4px 4px 0 0}.qtip-youtube{-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;-webkit-box-shadow:0 0 3px #333;-moz-box-shadow:0 0 3px #333;box-shadow:0 0 3px #333;color:#fff;border:0 solid transparent;background:#4A4A4A;background-image:-webkit-gradient(linear,left top,left bottom,color-stop(0,#4A4A4A),color-stop(100%,#000));background-image:-webkit-linear-gradient(top,#4A4A4A 0,#000 100%);background-image:-moz-linear-gradient(top,#4A4A4A 0,#000 100%);background-image:-ms-linear-gradient(top,#4A4A4A 0,#000 100%);background-image:-o-linear-gradient(top,#4A4A4A 0,#000 100%)}.qtip-youtube .qtip-titlebar{background-color:transparent}.qtip-youtube .qtip-content{padding:.75em;font:12px arial,sans-serif;filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr=#4a4a4a, EndColorStr=#000000);-ms-filter:"progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#4a4a4a,EndColorStr=#000000);"}.qtip-youtube .qtip-icon{border-color:#222}.qtip-youtube .qtip-titlebar .ui-state-hover{border-color:#303030}.qtip-jtools{background:#232323;background:rgba(0,0,0,.7);background-image:-webkit-gradient(linear,left top,left bottom,from(#717171),to(#232323));background-image:-moz-linear-gradient(top,#717171,#232323);background-image:-webkit-linear-gradient(top,#717171,#232323);background-image:-ms-linear-gradient(top,#717171,#232323);background-image:-o-linear-gradient(top,#717171,#232323);border:2px solid #ddd;border:2px solid rgba(241,241,241,1);-moz-border-radius:2px;-webkit-border-radius:2px;border-radius:2px;-webkit-box-shadow:0 0 12px #333;-moz-box-shadow:0 0 12px #333;box-shadow:0 0 12px #333}.qtip-jtools .qtip-titlebar{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#717171, endColorstr=#4A4A4A);-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#717171,endColorstr=#4A4A4A)"}.qtip-jtools .qtip-content{filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#4A4A4A, endColorstr=#232323);-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#4A4A4A,endColorstr=#232323)"}.qtip-jtools .qtip-content,.qtip-jtools .qtip-titlebar{background:0 0;color:#fff;border:0 dashed transparent}.qtip-jtools .qtip-icon{border-color:#555}.qtip-jtools .qtip-titlebar .ui-state-hover{border-color:#333}.qtip-cluetip{-webkit-box-shadow:4px 4px 5px rgba(0,0,0,.4);-moz-box-shadow:4px 4px 5px rgba(0,0,0,.4);box-shadow:4px 4px 5px rgba(0,0,0,.4);background-color:#D9D9C2;color:#111;border:0 dashed transparent}.qtip-cluetip .qtip-titlebar{background-color:#87876A;color:#fff;border:0 dashed transparent}.qtip-cluetip .qtip-icon{border-color:#808064}.qtip-cluetip .qtip-titlebar .ui-state-hover{border-color:#696952;color:#696952}.qtip-tipsy{background:#000;background:rgba(0,0,0,.87);color:#fff;border:0 solid transparent;font-size:11px;font-family:'Lucida Grande',sans-serif;font-weight:700;line-height:16px;text-shadow:0 1px #000}.qtip-tipsy .qtip-titlebar{padding:6px 35px 0 10px;background-color:transparent}.qtip-tipsy .qtip-content{padding:6px 10px}.qtip-tipsy .qtip-icon{border-color:#222;text-shadow:none}.qtip-tipsy .qtip-titlebar .ui-state-hover{border-color:#303030}.qtip-tipped{border:3px solid #959FA9;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;background-color:#F9F9F9;color:#454545;font-weight:400;font-family:serif}.qtip-tipped .qtip-titlebar{border-bottom-width:0;color:#fff;background:#3A79B8;background-image:-webkit-gradient(linear,left top,left bottom,from(#3A79B8),to(#2E629D));background-image:-webkit-linear-gradient(top,#3A79B8,#2E629D);background-image:-moz-linear-gradient(top,#3A79B8,#2E629D);background-image:-ms-linear-gradient(top,#3A79B8,#2E629D);background-image:-o-linear-gradient(top,#3A79B8,#2E629D);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#3A79B8, endColorstr=#2E629D);-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#3A79B8,endColorstr=#2E629D)"}.qtip-tipped .qtip-icon{border:2px solid #285589;background:#285589}.qtip-tipped .qtip-icon .ui-icon{background-color:#FBFBFB;color:#555}.qtip-bootstrap{font-size:14px;line-height:20px;color:#333;padding:1px;background-color:#fff;border:1px solid #ccc;border:1px solid rgba(0,0,0,.2);-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;-webkit-box-shadow:0 5px 10px rgba(0,0,0,.2);-moz-box-shadow:0 5px 10px rgba(0,0,0,.2);box-shadow:0 5px 10px rgba(0,0,0,.2);-webkit-background-clip:padding-box;-moz-background-clip:padding;background-clip:padding-box}.qtip-bootstrap .qtip-titlebar{padding:8px 14px;margin:0;font-size:14px;font-weight:400;line-height:18px;background-color:#f7f7f7;border-bottom:1px solid #ebebeb;-webkit-border-radius:5px 5px 0 0;-moz-border-radius:5px 5px 0 0;border-radius:5px 5px 0 0}.qtip-bootstrap .qtip-titlebar .qtip-close{right:11px;top:45%;border-style:none}.qtip-bootstrap .qtip-content{padding:9px 14px}.qtip-bootstrap .qtip-icon{background:0 0}.qtip-bootstrap .qtip-icon .ui-icon{width:auto;height:auto;float:right;font-size:20px;font-weight:700;line-height:18px;color:#000;text-shadow:0 1px 0 #fff;opacity:.2;filter:alpha(opacity=20)}.qtip-bootstrap .qtip-icon .ui-icon:hover{color:#000;text-decoration:none;cursor:pointer;opacity:.4;filter:alpha(opacity=40)}.qtip:not(.ie9haxors) div.qtip-content,.qtip:not(.ie9haxors) div.qtip-titlebar{filter:none;-ms-filter:none}


.borderRadius{-moz-border-radius:5px; border-radius:5px; }
.borderRadiusTp{-moz-border-radius:5px 5px 0 0; border-radius:5px 5px 0 0;}
.borderRadiusBtm{-moz-border-radius:0 0 5px 5px ; border-radius:0 0 5px 5px;}

.ddcommon {position:relative;display:-moz-inline-stack; zoom:1; display:inline-block; *display:inline; cursor:default;background:#FFF;}
tr .ddcommon {background: none;}
.ddcommon ul{padding:0;margin:0;}
.ddcommon ul li{list-style-type:none;}
/*.borderRadiusTp ul li:last-child{-moz-border-radius:0 0 5px 5px ; border-radius:0 0 5px 5px;border-bottom:0 none #c3c3c3; }*/
/*.borderRadiusBtm ul li:first-child{-moz-border-radius:5px 5px 0 0; border-radius:5px 5px 0 0 ;border-bottom:1 solid #c3c3c3; }*/

.ddcommon .disabled img, .ddcommon .disabled span, .ddcommon.disabledAll{
opacity: .5; /* standard: ff gt 1.5, opera, safari */
-ms-filter:"alpha(opacity=50)"; /* ie 8 */
filter:alpha(opacity=50); /* ie lt 7 */
-khtml-opacity:.5; /* safari 1.x */
-moz-opacity:.5; /* ff lt 1.5, netscape */
color:#999999; 
}
.ddcommon .clear{clear:both}
.ddcommon .shadow{-moz-box-shadow:5px 5px 5px -5px #888888;-webkit-box-shadow:5px 5px 5px -5px #888888;box-shadow: 5px 5px 5px -5px #888888;}
.ddcommon input.text{color:#7e7e7e;padding:0 0 0 0; position:absolute; background:#fff; display:block; width:98%; height:98%; left:2px; top:0; border:none;}
.ddOutOfVision{position:relative; display:-moz-inline-stack; display:inline-block; zoom:1; *display:inline;}
.borderRadius .shadow{-moz-box-shadow:5px 5px 5px -5px #888888;-webkit-box-shadow:5px 5px 5px -5px #888888;box-shadow: 5px 5px 5px -5px #888888;}
.borderRadiusBtm .shadow{-moz-box-shadow:-5px -5px 5px -5px #888888;-webkit-box-shadow:-5px -5px 5px -5px #888888;box-shadow: -5px -5px 5px -5px #888888}
.borderRadiusTp .border, .borderRadius .border{-moz-border-radius:0 0 5px 5px ; border-radius:0 0 5px 5px;}
.borderRadiusBtm .border{-moz-border-radius:5px 5px 0 0; border-radius:5px 5px 0 0;}
img.fnone{float:none !important}
.ddcommon .divider{width:0; height:100%; position:absolute;}
.ddcommon .arrow{display:inline-block; position:absolute; top:50%; right:4px;}
.ddcommon .arrow:hover{background-position:0 100%;}
.ddcommon .ddTitle{margin:1px; position:relative; display:inline-block; width:100%;}
tr .ddcommon .ddTitle{margin:0;}
.ddcommon .ddTitle .ddTitleText{display:block;}
.ddcommon .ddTitle .ddTitleText .ddTitleText{padding:0;}
.ddcommon .ddTitle .description{display:block;}
.ddcommon .ddTitle .ddTitleText img{position:relative; vertical-align:middle; float:left}
.ddcommon .ddChild{position:absolute;display:none;width:100%;overflow-y:auto; overflow-x:hidden; zoom:1; z-index:9999}
.ddcommon .ddChild li{clear:both;}
.ddcommon .ddChild li .description{display:block;}
.ddcommon .ddChild li img{border:0 none; position:relative;vertical-align:middle;float:left}
.ddcommon .ddChild li.optgroup{padding:0;}
.ddcommon .ddChild li.optgroup .optgroupTitle{padding:0 5px; font-weight:bold; font-style:italic}
.ddcommon .ddChild li.optgroup ul li{padding:5px 5px 5px 15px}
.ddcommon .noBorderTop{border-top:none 0  !important; padding:0; margin:0;}

/*************** default theme **********************/
.dd{border:1px solid #aeafb3;}
tr .dd{border:none;}
.dd .divider{border-left:1px solid #c3c3c3; border-right:1px solid #fff;; right:24px;}
.dd .arrow{width:16px;height:16px; margin-top:-8px; background:url(/media/images/msdropdown/skin1/dd_arrow.gif) no-repeat;}
.dd .arrow:hover{background-position:0 100%;}
.dd .ddTitle{color:#000;/*        background:#e2e2e4 url(/media/images/msdropdown/skin1/title-bg.gif) repeat-x left top;*/}
.dd .ddTitle .ddTitleText{padding:1px 20px 1px 1px;}
.dd .ddTitle .ddTitleText .ddTitleText{padding:0;}
.dd .ddTitle .description{font-size:12px; color:#666}
.dd .ddTitle .ddTitleText img{padding-right:5px;}
.dd .ddChild{border:1px solid #c3c3c3; background-color:#fff; left:-1px;}
.dd .ddChild li{padding:5px; background-color:#fff; /*border-bottom:1px solid #c3c3c3;*/}
.dd .ddChild li .description{color:#666;}
.dd .ddChild li .ddlabel{color:#333;}
.dd .ddChild li.hover{background-color:#f2f2f2}
.dd .ddChild li img{padding:0 6px 0 0;}
.dd .ddChild li.optgroup{padding:0;}
.dd .ddChild li.optgroup .optgroupTitle{padding:0 5px; font-weight:bold; font-style:italic}
.dd .ddChild li.optgroup ul li{padding:5px 5px 5px 15px}
.dd .ddChild li.selected{background-color:#d5d5d5; color:#000;}




/***************************************
 Zoomed In Styles
***************************************/

img.next{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px 0px !important;position:absolute;}
img.prev{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -16px !important;position:absolute;}
.search{height:16px;width:16px}
img.status1{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -48px !important;position:absolute;}
img.status2{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -48px !important;position:absolute;}
img.status3{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -48px !important;position:absolute;}
img.status4{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -48px !important;position:absolute;}
img.status5{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -48px !important;position:absolute;}
img.status6{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -48px !important;position:absolute;}
img.status7{height:16px !important;width:16px !important;background:url(/media/images/sprite.png) no-repeat 0px -48px !important;position:absolute;}


/***************************************
 General Styles
***************************************/

#loading {
	position:absolute;
	bottom:35px;
	right:10px;
	z-index:999999;
	padding:4px;
	padding-left:15px;
	width:102px;
	border:1px solid #000;
	background-color:#ffffaat;
	color:#333;
	display:none;
	font-weight:bold;
}
#loading img {
	float:left;
	margin-right:4px;
	width:23px;
	height:16px;
}

.loading-medium {
    background: url('/media/images/loading-medium.gif') no-repeat center;
    min-height: 30px;
    min-width: 30px;
    margin: 5px;
}

.tmpfix{position:absolute;top:3px;background:#fff;height:50px;width:3px;z-index:9999;}

.scroll-arrow{
    float:left;
    width:16px;
    height:20px;
    cursor:pointer;
    padding-top:4px;
    z-index:9999;
    display:block;
}
.scroll-arrow:hover{background:#ffffcc;}
.scroll-arrow-button{
	float:left;
	width:16px;
	height:25px;
	cursor:pointer;
	background: transparent url(../images/dashheader.png) repeat-x scroll center bottom;
}

#rightarrow{position:absolute;right:0px;top:0px;}
#leftarrow{position:absolute;}

.subrightarrow{position:absolute;right:0px;top:0px;}
.subleftarrow{position:absolute;}
.subrightarrowbutton{
	position:absolute;right:0px;
}
.subleftarrowbutton{
	position:absolute;
}

/* NEW MEMO { */
.dashlistelement { border-bottom: 1px dotted #555555; }
.dashlistelement.unread { border-bottom: 1px solid #555555; }
.dashlistelement .details{margin-top:2px;padding:5px;background:#BBBBBB;}
.dashlistelement.urgent_memo .details,.dashlistelement.urgent_memo{background:#FFCCCC!important;}

.task .details{background:#FFFFBB;}
.memo .details{margin-top:2px;padding:0px;background:#FFFFFF;float:left;}
.memolist .unread,.unread .details{font-weight:bold;}
.memolist .urgentMemo td{background-color:#FFCCCC;}
.read .details{font-style:italic;}

.dashlistelement .created{
	padding:5px;
	margin-right:2px;
	color:#555;
}

.memo .created{
	padding:0px;
	width:150px;
}

.dashlistelement .status{padding:8px;float:right;width:40%;}
.memo .status{padding:0px;padding-top:4px;float:left;width:50%;}
.memo .status img{margin:2px;margin-right:4px;}

.dashlistelement .status .name{float:left;padding:5px;}
.dashlistelement .status .button{float:right;}

.dashlistelement td a,.memolink,.link{text-decoration:underline;cursor:pointer;}

/* NEW MEMO } */

.sortable{border:1px solid #ACA899;}
.sortable th{padding:0px;border-bottom:0;}
.sortable th a span{white-space:nowrap;display:block;
background-color: #EBEADB;
border-bottom:1px solid #E2DECD;border-right:1px solid #D6D2C2;margin-bottom:1px;padding:3px;font-weight:normal;padding-right:12px;}
.sortable th a{display:block;background:#D6D2C2;border-bottom:1px solid #CBC7B8;color:black;text-align:left;}
.sortable th a:hover{background:#FCC247;border-bottom:1px solid #F9B119;}
.sortable th a:hover span{background:#fff;border-bottom:1px solid #F9A900;}
.sortable td{background:#fff;color:black;border-bottom:1px solid #E2E2E2;border-right:1px solid #E2E2E2;padding:3px;}
.sortable td table td{border:0px;}
.sortable td img{float:left;}


#login .loginmain {
	border:2px solid #31A3D1;
    border-radius: 10px;
	padding:60px 0 0 0;
	background-color:#cdc7bf;
}	
#login label{
display:block;
font-size:16px;
font-weight:bold;
color: #31A3D1;
}
#login input{
width:100px;
border:1px solid #A2968A;
background:#fff;
}

#login input:focus, #login input:active {
background-color: rgb(228, 244, 250);
}

#login .loginSubmitButton {
    margin-left:5px;
    font-size:10px;
    width:40px;
    height:20px;
}
#login .loginother span
{
    width:100px;
}

.region{  }
.state{  }

#changepassword{z-index:20000;margin:auto;position:absolute;display:none;}
#changepassword .changeloginmain{padding:40px 70px 30px 70px;}
#changepassword label{display:block;font-size:10px;font-weight:bold;}
#changepassword input{width:100px;border:1px solid #A2968A;background-color: #FFFFFF;}

.inputshadow {
	background-color:#fff;
}

.pagemenu{position:absolute;right:8px;top:4px;}

.button{
height:20px;color:#fff;background-color:#5588BB;
	border-bottom:1px solid #369 !important;
	border-right:1px solid #369 !important;
	border-top:1px solid #ACF !important;
	border-left:1px solid #ACF !important;
}
.button:hover  {
background-color:#002F5D;
border-bottom:1px solid #4F98EA !important;
border-right:1px solid #4F98EA !important;
border-top:1px solid #0B58A4 !important;
border-left:1px solid #0B58A4 !important;
}
.button:focus, .button:active   {
background-color:#B9DCFF;
color: #000;
border-bottom:1px solid #4F98EA !important;
border-right:1px solid #4F98EA !important;
border-top:1px solid #01376C !important;
border-left:1px solid #01376C !important;
}
.buttonlight {
height:20px;
color:#000;
font-weight: bold;
background-color:#B9DCFF;
border-bottom:1px solid #5A7DBB !important;
border-right:1px solid #5A7DBB !important;
border-top:1px solid #CCE8EA !important;
border-left:1px solid #CCE8EA !important;
}
.buttonlight:hover  {
background-color:#0080FF;
border-bottom:1px solid #4F98EA !important;
border-right:1px solid #4F98EA !important;
border-top:1px solid #0B58A4 !important;
border-left:1px solid #0B58A4 !important;
}
.buttonlight:focus  {
background-color:#004181;
color: #fff;
}
.button,.disabled,#loading,.button_green,.button_red,.buttonAdd
{
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
}
.disabled{
    height:20px;color:#fff;
    background-color:#820040 !important;
	border-bottom:1px solid #58002b !important;
	border-right:1px solid #58002b !important;
	border-top:1px solid #a60052 !important;
	border-left:1px solid #a60052 !important;
}
.button_green,.buttonAdd{
	height:20px;
	color:#fff;
	background-color:#70AD47 !important;
	border-bottom:1px solid #5A8B39 !important;
	border-right:1px solid #5A8B39 !important;
	border-top:1px solid #7CBF4E !important;
	border-left:1px solid #7CBF4E !important;
}

.buttonAdd
{
	color:#111;
	background-color:#BFB !important;
	border-bottom:1px solid #9C9 !important;
	border-right:1px solid #9C9 !important;
	border-top:1px solid #BFB !important;
	border-left:1px solid #BFB !important;
}

.button_red{
	height:20px;
	color:#fff;
	background-color:#C00000 !important;
	border-bottom:1px solid #300 !important;
	border-right:1px solid #300 !important;
	border-top:1px solid #d00 !important;
	border-left:1px solid #d00 !important;
}

.selectbox{width:150px;height:270px;float:left;border:1px solid black !important;margin-right:4px;overflow:hidden;overflow-y:scroll;background:#fff;}
.selectbox a{display:block;padding:2px;white-space:nowrap;}

.highlightrow.creditrecord td,.highlightrow.chargerecord td{}
.highlightrow.creditrecord td{background-color:#aaffaa;color:#000;}
.highlightrow.chargerecord td{background-color:#ffffaa;color:#000;}
.creditrecord td{background-color:#eeffee;}
.chargerecord td{background-color:#ffffff;}
.faded.creditrecord td{color:#555;}
.faded.chargerecord td{color:#555;}

.gstInclusive .gstinc,.gstExclusive .gstexc {display:inline;}
.gstExclusive .gstinc,.gstInclusive .gstexc {display:none;}

.gstlabel{border-top:0;}
 
.bad{ color:#C00;}
.lessGood{ color:#CC550E;}
.good{ color:#1A1;}

#lockdown {
	position:absolute;
	top:0px;
	left:0px;
	z-index:990009;
	display:none;
	background-color:rgba(0,0,0,0.75);
	text-align:center;
	padding:5px;
	width:100%;
	height:100%;
	margin:0px;
}

.lockdown_input {
	background-color:#FFFFFF;
	font-size:9px;
	width:120px;
	height:15px;
}

#lockdown_inner {
	border:2px outset #000000;
	position:absolute;
	padding:20px;
	background-color:#aaaaff;
	text-align:center;
	color:#000;
	width:250px;
}

#yesno {
	position:absolute;
	z-index:960001;
	display:none;
	border:1px solid #fff;
	background:#000000;
	width:450px;
	text-align:center;
	color:#fff;
	font-size: 18px;
	padding:5px;
}

#yesno_yes {
	height:30px;
	width:160px;
	margin:10px;
	font-size:14px;
	font-weight:bold;
	color:#111;
	border: 1px solid #7C7 !important;
	background-color:#9F9;
	-moz-background-clip: -moz-initial ! important; 
	-moz-background-origin: -moz-initial ! important; 
	-moz-background-inline-policy: -moz-initial ! important;
}

#yesno_no {
	height:30px;
	width:160px;
	margin:10px;
	font-size:14px;
	font-weight:bold;
	color:#111;
	border: 1px solid #C77 !important;
	background-color:#F99;
	-moz-background-clip: -moz-initial ! important; 
	-moz-background-origin: -moz-initial ! important; 
	-moz-background-inline-policy: -moz-initial ! important;
}

#yesno_inner {padding:20px;border:1px solid #fff;text-align:center;}

#messageblock{display:none;position:absolute;width:100%;height:9000px;z-index:800000;top:0px;left:0px;background:url(../images/blank.png);}
#coverblock{
position:absolute;
width:100%;
height:100%;
z-index:800000;
top:0px;
left:0px;
opacity:0.1;}
#message{position:absolute;z-index:900000;}
#box{
	position:absolute;
	background:#000;
	color:#fff;
	z-index:800001;
}
#message div,#box div{padding:45px;text-align:center;}
#box div{padding:20px;}
#box span.question{
	font-size: 20px;
}
#box input{
	margin:10px;
	width:180px;
	height:30px;
	font-size:14px;
	color:#fff;
	background:#336699;
}


#box input.text,#yesno input.text{
	margin-top:0px;
	height:20px;
}

#box input.button{
	
}

#eftpos{position:absolute;padding:5px;background:#000;color:#fff;z-index:800001;}
#eftpos div{padding:50px;width:300px;border:1px solid #fff;text-align:center;}

.clear{clear:both;}

.area{padding-bottom:15px;clear:both;}

.left{float:left;margin-right:50px;}


.wysiwyg img{
	height:auto;
	width:auto;
}

.cke iframe, .wysiwyg iframe{
	display:block;
	position:static;
	width:auto;
}
.wysiwyg textarea{
	display:block;
	width:700px;
	height:500px;
}

.linkinput{
	width:200px;
}

.alert
{
	color:#FF3333;
	font-weight:bold;
	margin-top:4px;
}

.alert.deactivate{height:21px;}
.toolbarright{float:right !important;margin-right:3px;top:3px;}

.toolbarButton.disabled
{
    color:grey;
    background-colour:transparent;
}

.choosepic{float:left;display:block;width:150px;height:200px;border:1px solid #000;margin:10px;text-align:center;padding:10px;}
.choosepic img{width:120px;height:178px;}
.choosepic:hover{background:#ffffcc;}

/***********************************************************************************
************************************************************************************
 Pane Styles
************************************************************************************
***********************************************************************************/

/***************************************
 Toggle Bar
***************************************/

#toggle_bar
{
	display:block;
	cursor:pointer;
	position:absolute;
	left:204px;
	z-index:9999;
	padding-right:3px;
	background-color:#EEE;
	background-repeat:vertical;
	width:5px;
	margin-top:24px;
	background-image:url(../images/arrow_left_small.png);
}

#toggle_bar.contracted
{
	background-image:url(../images/arrow_right_small.png);
}


/***************************************
 Dashboard Styles
***************************************/


.ticketdashboarditem {
	padding:10px;
	margin:20px;
	float:left;
	border:1px solid #000000;
	width:330px;
	height:200px;
	overflow:none;
}


#viewelement0{padding-top:15px;}

.viewelement {padding-top:15px;z-index:100;}
.viewelement>div{border:1px solid #999;}
.viewelement>div>div{background:#fff;padding:4px;margin:1px;border:1px solid #999;}
.viewelement>div>div.dashheader{cursor:move;border:0;border-bottom:1px solid #999;margin:0;padding:3px;font-size:1.1em;font-weight:normal;background:url("../images/dashheader.png") bottom repeat-x;}
.viewelement img{float:left;margin-right:4px;cursor:default;}
.viewelement>div>div.dashheader span{position:absolute;right:0;}
.viewelement table{width:100%;}

/* Calendar Styles */
#controls{position:absolute;top:4px;right:3px;z-index:300;}
#calendar{overflow:hidden;background:#fff;border:1px solid #A5BFE1;position:absolute;left:218px;}
.calendar{white-space:nowrap;cursor:default;overflow:auto;overflow-x:hidden;}
.calloading{font-size:30px;color:#6593CF;padding:10px;}
#calendarheader{height:20px;border-bottom:1px solid #A5BFE1;background-color:#E3EFFF;}
.sep span{position:relative;top:3px;left:3px;color:#4371BD;white-space:nowrap;display:block;height:21px;}
#calendarmain{z-index:89;}
#times{width:50px;position:absolute;top:0;left:0;color:#6593CF;font-family:Trebuchet MS;background:#E3EFFF;}
#times div{padding-right:4px;text-align:right;z-index:10;position:relative;}
#grid,.theGrid{margin-left:50px;}
#dragger{background:#ccc;opacity:0.7;filter: alpha(opacity = 70);position:absolute;top:0;display:none;z-index:92;}
#mouselayer{position:absolute;top:0;background:#fff;opacity:0.01;z-index:85;}
.weekend,.today{background:#999999;opacity:0.3;filter: alpha(opacity = 30);height:100%;}
.today{background:#FFFF00;}
.row{border-bottom:1px solid #6593CF;position:relative;z-index:70;}
.rowon{background:#ffffcc;}
.calendarTime{border-bottom:1px solid #6593CF;}
.sep{border-left:3px double #6593CF;position:absolute;top:0;left:0;overflow:hidden;}
.over{display:none;}
.appt{height:103px;position:absolute;top:0;z-index:90;overflow:hidden;white-space:normal;padding:0 2px 0 2px;border:1px solid #aeafb3;-moz-box-shadow: 2px 2px 1px #aaa;}
.apptactive{opacity:0.7;filter: alpha(opacity = 70);z-index:91;}
.rsizr{height:3px;overflow:hidden;cursor:n-resize;position:absolute;width:110%;left:0;bottom:0;opacity:0.2;filter: alpha(opacity = 20);background:#000;}
/*.shadow{background:#E8E8E8;opacity:0.55;filter: alpha(opacity = 55);}*/
#timefade{height:15px;background:url("../images/timefade.png") repeat-x;position:absolute !important;top:-15px;width:46px;z-index:5;}

.ac1{background-color:#90EE90;}
.ac2{background-color:#BE9EDE;}
.ac4{background-color:#ADD8E6;}
.ac7{background-color:#00FF11;}
.ac8{background-color:#FFE682;}
.ac9{background-color:#DBDABF;}
.ac15{background-color:#3D44FF;}
.ac17{background-color:#FFA621;}
.ac18{background-color:#DDDDDD;}
.ac19{background-color:#82a171;}
.ac20{background-color:#FFA600;}
.ac21{background-color:#2CC76F;}
.ac22{background-color:#03C6F2;}
.ac23{background-color:#fec8f4;}
.ac24{background-color:#E68EDB;}
.ac25{background-color:#781F1F;}
.ac26{background-color:#b4ab75;}
.ac27{background-color:#E1FF36;}
.ac28{background-color:#81e368;}
.ac29{background-color:#d7b7f0;}
.ac30{background-color:#ba92b5;}
.ac31{background-color:#c8a4be;}
.ac32{background-color:#11194D;}
.ac33{background-color:#e7f7f4;}
.ac34{background-color:#81c597;}
.ac35{background-color:#fafaab;}
.ac36{background-color:#c49fa5;}
.ac37{background-color:#818bce;}
.ac38{background-color:#E33939;}
.ac39{background-color:#69bcc4;}
.ac40{background-color:#d77598;}
.ac41{background-color:#9dacc0;}
.ac42{background-color:#a19a98;}
.ac43{background-color:#bff5a4;}
.ac44{background-color:#668875;}
.ac45{background-color:#eade97;}
.ac46{background-color:#a6c6af;}
.ac47{background-color:#8d71ad;}
.ac48{background-color:#d7d2cd;}
.ac49{background-color:#b2c4b6;}
.ac50{background-color:#e2d873;}
.ac51{background-color:#E68EDB;}
.ac52{background-color:#76b273;}
.ac53{background-color:#74ffc4;}
.ac54{background-color:#b9cd6a;}
.ac55{background-color:#e68edb;}
.ac56{background-color:#5C5353;}
.ac57{background-color:#8d7f97;}
.ac58{background-color:#8fa8af;}
.ac59{background-color:#dbe3ee;}
.ac60{background-color:#90f869;}
.ac61{background-color:#fec8f4;}
.ac62{background-color:#aad37a;}
.ac63{background-color:#b2bcf1;}
.ac64{background-color:#d9f6e3;}
.ac65{background-color:#a1e8db;}
.ac66{background-color:#78f069;}
.ac67{background-color:#9fb7d6;}
.ac68{background-color:#8D71AD;}
.ac69{background-color:#c2bdd9;}
.ac70{background-color:#D0FF00;}
.appointmentdata_enddate
{
    display:none;
}
.ac-exchange{background-color:#ff9435;z-index:80 !important;}

#calendarlist{
clear:both;
border:1px solid #A5BFE1;
border-top:0;
background:#fff;margin-right:4px;overflow:auto;padding-bottom:3px;margin-top:4px;
overflow-x: hidden;
white-space: nowrap;}
#calendarlist div{border-bottom:1px solid #A5BFE1;background:#E3EFFF;padding:3px;margin-top:3px;border-top:1px solid #A5BFE1}
#calendarlist label{font-weight:normal !important;}

#frontticketlist{border:1px solid #A5BFE1;border-top:0;background:#fff;margin-right:4px;overflow:auto;padding-bottom:3px;margin-top:4px;}
#frontticketlist div{border-bottom:1px solid #A5BFE1;background:#E3EFFF;padding:3px;border-top:1px solid #A5BFE1}
#frontticketlist label{font-weight:normal !important;}

#frontticketlist ul{border:0px;list-style:none;margin:3px;padding:0;}
#frontticketlist img{position:relative;top:-1px;left:3px;}
#frontticketlist span{margin-left:6px;vertical-align:top;}
#frontticketlist ul li{height:20px;overflow:hidden;}
#frontticketlist ul li .active{background:#A2968A;}
#frontticketlist a{display:block;white-space:nowrap;overflow:hidden;padding-top:3px;}
#frontticketlist a:hover,#frontticketlist .hover{background:#BFB7AE;}

.apptmenu{display:none;position:absolute;color:black;}
.apptmenu ul{list-style:none;margin:0;border:1px solid #6593CF;padding:1px;background:url(../images/abg.png) repeat-y #F6F6F6;width:120px;}
.apptmenu li{display:inline;clear:both;width:100%;}
.apptmenu a{padding:3px;display:block;height:15px;}
.apptmenu a:hover,.apptmenu .active{padding:2px;border:1px solid #EEAB47;background-color:#FFE7A2;}
.apptmenu a div{width:20px;float:left;white-space:nowrap;}
.apptmenu a div img{position:relative;top:-1px;left:-1px;}
.apptmenu .disable{opacity:0.5;filter: alpha(opacity = 50);border:0 !important;background:none !important;padding:3px !important;}

.mm{display:none;position:absolute;color:black;}
.mm ul{list-style:none;margin:0;border:1px solid #6593CF;padding:1px;background:url(../images/abg.png) repeat-y #F6F6F6;}
.mm li{display:inline;clear:both;}
.mm a{padding:3px;display:block;height:15px;width:150px;}
.mm a:hover,.apptmenu .active{padding:2px;border:1px solid #FFBD69;background:#FFE7A2;}
.mm a div{float:left;white-space:nowrap;}
.mm a div img{position:relative;top:-1px;left:-1px;margin-right:5px;}
.mm .r{float:right;white-space:nowrap;display:block;font-weight:bold;}

.menus{z-index:99999999;}

.guide{position:absolute;top:100px;z-index:65;opacity:0.6;filter: alpha(opacity = 60);}
.exchangeappts {position:absolute;top:100px;z-index:66;opacity:0.6;filter: alpha(opacity = 60);}

#toolbar div.dropdown  {display:none;border:1px;position:absolute;left:100px;top:30px;background-image:url('../images/dashheader.png'); z-index:9999;}
#toolbar div.dropdown ul li {display:block;float:none;}

/***************************************
 Clinical Styles
***************************************/

.grayout td{background-color:#ccc !important;}
.hidecol{display:none;}
.checkboxes {clear:both;width:750px; margin-bottom:20px;}
.checkboxes input{float:left !important;position:relative;top:2px;}
.checkboxes label{float:left !important;width:120px;font-weight:normal !important;}
.checkboxes label.wide{width:220px !important;}
fieldset{-moz-border-radius:10px;}
legend{font-weight:bold;color:#4846D5;}

.history{margin:0 10px 10px 0;}
.history input{float:left;clear:both;}
.history label{display:inline;width:100px;font-weight:normal !important;}

.problemtable{margin:0;padding:0;}
.problemtable div{white-space:nowrap;}
.problemtable div div{height:20px;}
.problemtable div input{border:0 !important;height:17px;border-bottom:1px solid #aeafb3 !important;border-right:1px solid #aeafb3 !important;margin:0 !important;float:left;}
.problemtable .left{border-left:1px solid #aeafb3 !important;}
.problemtable .problemheader{height:21px;}
.problemtable .problemheader input{border-top:1px solid #aeafb3 !important;text-align:center;background:#CDC7BF !important;color:#4E463F;}
.problemtable img{margin-left:3px;float:left;}

.section{padding: 5px 10px; background:#F0F0F0;margin-bottom:5px;}
.sub_section{margin-bottom:10px;}


.medicationtable{margin:0;padding:0;}
.medicationtable div{white-space:nowrap;}
.medicationtable div div{height:20px;}
.medicationtable div input{border:0 !important;height:17px;border-bottom:1px solid #aeafb3 !important;border-right:1px solid #aeafb3 !important;margin:0 !important;float:left;}
.medicationtable .left{border-left:1px solid #aeafb3 !important;}
.medicationtable .medicationheader{height:21px;}
.medicationtable .medicationheader input{border-top:1px solid #aeafb3 !important;text-align:center;background:#CDC7BF !important;color:#4E463F;}
.medicationtable img{margin-left:3px;float:left;}

#right .medication label input
{
    float:right;
    width:200px;
}
#right .medication .parTickBox label input
{
    width:auto;
}
#right .medication .parTickBox
{
    padding-top:5px;
}
#right .clinical label.inline
{
    display:none;
}
#right .medication label.inline
{
    display:block;
}
#right .medication label.inline
{
    width:300px;
    clear:both;
}

#right .medication .warning{color:#880000;font-weight:bold;width:300px;height:100px;}
#right .medication .warning_text{color:#880000;font-weight:bold;}

.duplicate-warning{color:red;font-size:15px;font-weight:bold;}
.duplicate-warning ul{font-weight:normal;}

.critical td{background:#ffffcc !important;}

textarea.consultNote
{
    width:525px;
    height:180px;
}

div.consultTime
{
    float:left;
    margin-right:50px;
}

div.consultDate
{
    float:left;
}

.settingItem:hover
{
    border: 1px solid #fcefa1; 
    background: #fbf9ee;
}

/***************************************
 Xero Styles
***************************************/

.xeroTokenCountDown
{
    margin-left:4px;
}
.xeroConnectButton
{
    height:22px;
    width:356px;
}
.tickBoxColumn{ width:20px; }
.typeColumn{ width:30px;max-width:30px; }
.recordNameColumn{ width:200px;max-width:200px; }
.dateColumn{ width:65px;max-width:65px; }
.xeroIdColumn{ width:250px;max-width:250px; }
.lastUpdatedColumn{ width:90px;max-width:90px; }
.syncStatusColumn{ width:90px;max-width:90px; }
.xeroStatusColumn{ width:70px;max-width:70px; }
.lastMessageColumn{ width:120px;max-width:120px; }
.originColumn{ width:30px;max-width:30px; }
.actionsColumn{ width:70px;max-width:70px; }
.actionsColumn img
{
    margin-left:4px;
}

.template-box{padding-bottom:15px;}

/***************************************
Product list style
***************************************/
tr.unavailable td {color:#777 !important;}

/***************************************
General style
***************************************/
.section{background-color:#FFC;padding:10px;}

.mark img {
	top:-2px !important;
}

/***************************************
 Change Log Styles
***************************************/

div .changeLogTime {
    display:block;
    float: left;
    width:140px;
}
div .changeLogData
{
    width:1030px;
}

div .timeRecordToggle:nth-child(even)
{
    background-color:#CCCCCC;
}

div .changeLogData table{
    border-spacing:0px;
}
/*
div .changeLogData tr.changeLogRecord:nth-child(odd){
    background-color:#858585;
    
}
*/

/*******************
	Table Styles
*******************/

.focused{border-color:#000 !important;}

.hidden{display:none;}

tr.financialrow {height:20px;}
tr.financialrow td input{height:16px;padding:0px;margin:0px;}
tr.financialrow td {height:19px;}



/***************************************
 Document Styles
***************************************/

#header li a.document:hover,#header.document li a.active{background-color:#ACF3FD;}
.document .tabs ul a{background-color:#ACF3FD;}
#rightpane .document .tabs ul a{background-color:#ACF3FD;}
.tabs a.document{background-color:#ACF3FD !important;}
.document #leftpane{background-color:#ACF3FD;}
#rightpane .document, #rightpane .documents .paginatedTable thead {background:#ACF3FD;}
.document .listoptions{background:#ACF3FD;}
.ddmenu .document{background:url(../images/down.gif) -3px 2px #ACF3FD !important;}
.document #toggle_bar{background-color:#ACF3FD;}



.animaldeathform{
	margin-top:10px;
	border:1px solid #000;
	background-color:#f22;
	clear:both;
	float:left;
}

.bold,.bold td,.bold td input,.bold td div{color:#000000;}
.fade,.fade td,.fade td input,.fade td div,.fade th{color:#888888;}
.fade th{background-color:#DDD8AF;}

.navigation a{text-decoration:underline;cursor:pointer;}
.navigation a.last{font-weight:bold;}
.selectbox{width:150px;height:270px;float:left;border:1px solid black !important;margin-right:4px;overflow:hidden;overflow-y:scroll;background-color:#fff;}
.selectbox a{display:block;padding:2px;white-space:nowrap;}
.selectbox a:hover{background-color:#AAAAFF;}
.selectbox a.selected {background-color:blue;color:white;}
.selectbox a.selected {background-color:blue;color:white;}
.system_comments{width:300px;height:270px;}



input[readonly],input[disabled],textarea[readonly] {
    color:#7F7F7F !important;
    background-color:#FCFCFC;
}

input[type="checkbox"][readonly],input[type="checkbox"][disabled]
{
   opacity : .50;
   filter  : alpha(opacity=50);
   cursor  : default;
}

#right input[readonly],
#right input[disabled],
.formbox input[readonly],
.formbox input[disabled],
#right input.hasDatepicker[readonly],
#right input.hasDatepicker[disabled],
.formbox input.hasDatepicker[readonly],
.formbox input.hasDatepicker[disabled] 
{
    border-color:#AAA !important;
}


.calendarbackground
{
    width:100%;z-index:-1;
}

img.move
{
    position:absolute;
    top:1px;
    right:0px;
    width:16px;
    height:16px;
    visibility:hidden;
}

.appt.calendarmovable.conflicted
{
<!--    border: 2px solid #ff0000;-->
    background-image: url(media/images/overide.png) top right no-repeat;
<!--    opacity:0.5;-->
}

.divTable .column
{
    float:left;
}
.divTable .column .label,.divTable .column .value
{
    height:17px;
}
.divTable .column .label
{
    text-align:left;
    padding-top:2px;
    padding-left:1px;
    height:15px;
}
.divTable .column .value
{
    text-align:right;
}
.divTable .column .odd
{
    background-color:#999999;
}

a:active,a:focus,.button:active,.button:focus { outline: none;border:0; }

#uservoice-dialog-content iframe{display:block;}
#uservoice-dialog-close{z-index:99999;}

#element_used_to_insert_non_insertable_ajax {display:none;}

.gstCode
{
/*    display:none; */
}

.contactDebtStats
{
    width:150px;
    border:2px solid black;
    padding:10px;
    margin:10px;
}
.clientDebtDetails
{
    min-height:141px;
}
.contactDebtStats .label
{
    font-weight:bold;
}
.contactDebtStats .left
{
    margin-right:0px;
}
.contactNotes
{
    padding:3px;
    width:200px;
}
.contactDebtStats .important,.contactNotes.important
{
    color:red;
}
.contactDebtStats h3
{
    margin:2px 0px;
}

.contactDebtStats.important
{
    border-color:red;
}

.contactDebtStats.important hr
{
    color:red;
}
.contactDebtStats.important .total
{
    font-weight:bold;
    color:red;
}

.collapsableList ul
{
    display:none;
}

.coaList
{
    float:left;
    width:15px;
}
.coaTree
{
    width:800px;
    font-size:12px;
}
 .coaTree li
{
    list-style-type:none;
}


.noExpander
{
    margin-left:15px;
}


.work_display{display:none;}.reports_display{display:none;}.reminders_display{display:none;}.shelter_display{display:none;}
.clientPostalAddress
{
    margin-left:20px;
    width:200px;
}

input.description
{
    width:200px;
}

.shipTo
{
    margin-top:3px;
    clear:both;
    float:left;
    width:200px;
    height:59px;
    display:none;
}

#right .itemDetailLine label
{
    display:inline;
}

.financialRecordDetails
{
    float:left;
    width:250px;
    margin-right:30px;
}

div.shipToRo
{
    clear:both;
    float:left;
    width:197px;
    height:59px;
    border:1px solid #aeafb3;
    padding:3px;
    margin-left:3px;
    overflow:auto;
}

input,select,textarea,button,.newDropDown .dropDownEleWrapper,.dropDownList,.mouseOverBox
{
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px 4px 4px 4px;
}
.integerField, .numeric {
	text-align: center;
}
ul.contacttypelist
{
    padding:0;
    margin:0;
}
ul.contacttypelist li
{
    float:left;
    list-style-type: none; 
    width:100px;
    padding: 4px;
}
ul.contacttypelist li label
{
    width:100px;
}

#coverblock:hover
{
    cursor:wait;
}

#backgroundFader
{  
    display:none;  
    position:fixed;  
    _position:absolute; /* hack for internet explorer 6*/  
    height:100%;  
    width:100%;  
    top:0;  
    left:0;  
    background:#000000;  
    border:1px solid #cecece;  
    z-index:9999;  
}

#eftpos_new
{
	display:none;
	position:fixed;
	_position:absolute; /* hack for internet explorer 6*/
	max-height:140px;
	width:500px;
	background:#000;
	border:2px solid #cecece;
	font-size:13px;
	z-index:10000;
	padding:10px;
	text-align:center;
}
#eftpos_new span
{
	display:block;
	padding-top:30px;
	font-size: 36px;
}

#eftpos_header {
	background-color: #303136;
	width: 100%;
	height: 40px;
	border-radius: 8px 8px 0 0;
	text-align: center;
}

#eftpos_header_title {
	display: inline-block;
	color: white;
	margin-top: 11px;
	font-size: 14px;
	font-weight: bold;
}

.eftpos_blue_btn {
	float: left;
}

.eftpos_grey_btn {
	float: right;
}

#eftpos_transaction
{
    display:none;
    position:fixed;
    _position:absolute; /* hack for internet explorer 6*/
    width:400px;
    background:#000;
	border: 2px solid #33a2d2;
	/*min-width: 350px;*/
	padding-top: 0px;
	background-color: #f1f1f1;
	color: #444444;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-ms-border-radius: 10px;
	-o-border-radius: 10px;
	border-radius: 10px;
    font-size:10px;
    z-index:10000;
    text-align:left;
}
#eftpos_transaction_infoheader {
	padding:10px;
}

#eftpos_infoheader span{
	text-align:left;
	font-size:16px;
}

#eftpos_transaction_info {
	text-align: center;
}

#eftpos_transaction #eftpos_transaction_info span
{
    display:block;
    padding-top:20px;
    font-size: 20px;
}

#eftpos_transaction input{
	margin: 10px;
	width:100px;
	height:26px;
	font-size: 11px;
	text-decoration:none;
	padding:4px 0;
	display:inline-block;
}


.ui-datepicker
{
    display:none;
}

/*
Xero setup wizard CSS
*/

div.formbox_inner div.setupWizardInner {
    display: block;
    margin: 0 auto;
     padding:10px; 
    min-width:620px;
    max-width:620px;
    width:620px;
    min-height:480px;
    background: #FFFFFF;
   -webkit-border-radius: 10px;
   -moz-border-radius: 10px;
   border-radius: 10px;
}

div.formbox_inner img {
    height: auto;
    width: auto;
}

div.formbox_inner .setupWizardHeader {
    display: block;
    height:100px;
    max-height:85px;
    width:100%;
}



div.formbox_inner .setupWizardHeaderLogo {
    display:block; 
    float:left;
}

div.formbox_inner .setupWizardHeaderLogoXero {
    display:block; 
    float:right;
}

div.formbox_inner .setupWizardProgress
{
    display:block;
    height: 30px;
    background:#DDDDDD;
}

div.formbox_inner .setupWizardProgress ul
{
    height:30px;
    padding: 0 20px 0 20px;
}

div.formbox_inner .setupWizardProgress ul li
{
    display: inline;
    float:left;
    padding: 8px 16px 8px 16px;
    min-width:100px;
    font-size:12px;
    font-weight: bold;
}

div.formbox_inner .setupWizardProgress ul li.active
{
    background: #385577;
    color: #FFFFFF;
}

div.formbox_inner .setupWizardProgress ul li.complete
{
    
    background: #9B9B9B;
}

div.formbox_inner .setupWizardcontent
{
    display:block;
    text-align:left;
    height:350px;
}

div.formbox_inner .setupWizardFooter
{
    display:block;
    height: 30px;
}

div.formbox_inner .setupWizardFooter div.wizardFooterBack
{
    display:block; 
    float:left;
}

div.formbox_inner .setupWizardFooter div.wizardFooterNext
{
    display:block; 
    float:right;
}

div#searchPortalProductResults
{
    max-height:300px;
    overflow-y:auto;
    text-align:left;
}

.searchableContent:hover
{
    text-decoration:underline;
}
.searchableContent .columnSearchField,#right .searchableContent .columnSearchField
{
    padding:0px;
    margin:0px 0px 3px 0px;
    height:16px;
    font-size:10px;
}

.columnSearch
{
    display:none;
}

.showSearch .columnSearch
{
    display:block;
}

/*
 * Reminder Navigation
 */
.actionNav, .actionNav ul {
	padding: 0;
	margin: 0;
	list-style: none;
    background-color:white;
    color:black;
}

.actionNav a {
	display: block;
	width: 10em;
}

.actionNav li {
	float: left;
	width: 10em;
}

.actionNav li ul {
	position: absolute;
	width: 10em;
	left: -999em;
}

.actionNav li:hover ul {
	left: auto;
}

.syncedRecord 
{
        background-color: #777777;
}
div.left300 
{
    float:left;
    display:block;
    width:300px;
    margin-right:100px;
}
div.left300 input
{
    width:200px;
}
/* Required for Google Chrome */
div.left300 input.radio
{
    width:20px;
}

div .text-left 
{
    text-align:left;
}

div .left-block 
{
    display:block;
    float:left;
}

div.printLabelBox input:focus{
    background-color: #336699;
}

div.previousPage img,div.nextPage img
{
    width:18px;
    height:18px;
}

table .diagResultsTable th
{
    width:60px;
}
.colorpicker, .colorpicker * {
    z-index: 99999;
}

.higher-zindex {
    z-index: 99999999 !important;
}

div .popupButtons input 
{
    display:block;
    float:left;
}

.formdata input
{ 
    width:200px;
}

.disabledButton img
{
    filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+, Firefox on Android */
    filter: gray; /* IE6-9 */
    -webkit-filter: grayscale(100%);
}

.newRemove
{
    float:left;
}

/* Picklist hover style */
.questionPopupSelected {
	background-color: #FFFFFF;
}

/* Google Places API DropDown styling */
.pac-container, .pac-item {
width: 475px !important;
}

.blocking {
	background-color: grey !important;
	z-index: 91 !important;
}

.clearstyle {
    margin:0;
    border:0;
    padding:0;
    display:inline-block;
    vertical-align:middle;
    white-space:normal;
    background:none;
    line-height:1;
    font-size:13px;
}

/*
<!--div,span
{
   -moz-user-select: -moz-none;
   -khtml-user-select: none;
   -webkit-user-select: none;

   /*
     Introduced in IE 10.
     See http://ie.microsoft.com/testdrive/HTML5/msUserSelect/
   */
   -ms-user-select: none;
   user-select: none;
}
*/
/* SUPPLIER INTEGRATION STYLES */
.portalProductsTable 
{
    margin: 0 auto;
    border: 1px solid;
    text-align:left;
}

.portalProductsTable thead
{
    background-color: #CCCCCC;
}

.portalProductsTable tr.odd
{
    background-color: #FFF5EE;
}

.portalProductsTable td p
{
    margin: 0;
}

#portalProductMainDiv p
{
    text-align:left;
}

#portalProductMainDiv
{
    padding:30px;
    width:640px;
    height:600px;
    background-color:#FFF;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
}

.subToggleSection
{
	border-left: dotted #ccc;
	border-bottom: dotted #ccc;
	margin-left: 20px;
	padding: 10px;
}

/* END SUPPLIER INTEGRATION STYLES */

.satisfaction-face {
    width: 50%;
    margin: 1rem auto;
    max-width: 400px;
    -webkit-transition: 0.6s all;
    transition: 0.6s all;
}

.satisfaction-face svg {
    width: 100%;
    -webkit-transition: 1.5s all cubic-bezier(0.17, 0.67, 0.03, 1);
    transition: 1.5s all cubic-bezier(0.17, 0.67, 0.03, 1);
    -webkit-transform-origin: 50% 100%;
    transform-origin: 50% 100%;
}

.form.hidden .satisfaction-face svg {
    opacity: 0;
    -webkit-transform: rotateX(75deg) rotateY(-30deg) translateX(50%) rotateZ(90deg);
    transform: rotateX(75deg) rotateY(-30deg) translateX(50%) rotateZ(90deg);
}

.heading {
    -webkit-transition: 0.8s all ease 0.1s;
    transition: 0.8s all ease 0.1s;
    margin: 0;
    margin-bottom: 1.5rem;
}

.form.hidden .heading {
    -webkit-transform: translateY(60px);
    transform: translateY(60px);
    opacity: 0;
}

.slider {
    margin-bottom: 1.5rem;
    margin-right: 3px;
    border: none;
}

input[type=range] {
    -webkit-appearance: none;
    width: 97%;
    background: transparent;
    -webkit-transition: 0.8s all ease 0.3s;
    transition: 0.8s all ease 0.3s;
}

.form.hidden input[type=range] {
    -webkit-transform: translateY(60px);
    transform: translateY(60px);
    opacity: 0;
}

input[type=range]::-webkit-slider-runnable-track {
    width: 97%;
    height: 26px;
    background: #23aad9;
    border: 3px solid #f0f0f0;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
    border-radius: 20px;
}

input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    margin-top: 2px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
    background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
    background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
    background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
}

input[type=range]:focus {
    outline: none;
}

input[type=range]:focus::-webkit-slider-runnable-track {
    background: #23aad9;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}

input[type=range]::-moz-range-track {
    width: 97%;
    height: 26px;
    background: #23aad9;
    border: 3px solid #f0f0f0;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
    border-radius: 20px;
}

input[type=range]::-moz-range-thumb {
    border: none;
    height: 16px;
    width: 16px;
    margin-top: 2px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
    background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
    background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
    background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
}

input[type=range]:-moz-focusring {
    outline: 1px solid white;
    outline-offset: -1px;
}

input[type=range]::-ms-track {
    border: none;
    color: transparent;
    width: 97%;
    height: 26px;
    background: #23aad9;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
    border-radius: 20px;
}

input[type=range]::-ms-fill-lower {
    outline: none;
    background: white;
    border-radius: 20px 0 0 20px;
}

input[type=range]::-ms-thumb {
    border: none;
    height: 16px;
    width: 16px;
    margin-top: 2px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
    background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
    background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
    background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
}

input[type=range]:focus::-ms-track {
    background: #e6e6e6;
}

input[type=range]:focus::-ms-fill-lower {
    background: #e6e6e6;
}

.satisfaction-note-textfield {
    height: 50px;
    width: 97%;
    margin-bottom: 5px;
}

.action-button {
    transition: all 0.1s;
	  -webkit-transition: all 0.1s;
    position: relative;
	  padding: 10px 40px;
    margin: 0px 10px 10px 0px;
    float: left;
	  border-radius: 10px;
	  font-size: 25px;
	  color: #FFF;
    width: 720px;
    text-align: center;
	  text-decoration: none;	
}

.green-action-button {
    background-color: #82BF56;
	  border-bottom: 5px solid #669644 !important;
	  text-shadow: 0px -2px #669644;
}

.red-action-button {
    background-color: #E74C3C;
	  border-bottom: 5px solid #BD3E31;
	  text-shadow: 0px -2px #BD3E31;
}

.yellow-action-button {
    background-color: #E74C3C;
	  border-bottom: 5px solid #BD3E31;
	  text-shadow: 0px -2px #BD3E31;
}

.blue-action-button {
	  background-color: #3498DB;
	  border-bottom: 5px solid #2980B9;
	  text-shadow: 0px -2px #2980B9;
}

.yellow-action-button {
	  background-color: #F2CF66;
	  border-bottom: 5px solid #D1B358;
	  text-shadow: 0px -2px #D1B358;
}

.action-button:active
{
	  transform: translate(0px,5px);
    -webkit-transform: translate(0px,5px);
	  border-bottom: 1px solid !important;
}

.drawing-container {
    height: 100%;
    width: 100%;
}

.annotation-container {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}





/* 
    Document   : report.css
    Created on : 16/12/2011, 10:39:56 AM
    Author     : daryl
    Description:
        Purpose of the stylesheet follows.
*/

/* 
   TODO customize this sample style
   Syntax recommendation http://www.w3.org/TR/REC-CSS2/
*/
ul.reportFormatSelector {
    padding:0;
}

ul.reportFormatSelector li {
    display:inline-block;
    padding-right:40px;
    font-size: 14px;
}
ul.reportFormatSelector li img {
    padding: 0 5px 0 5px;
}




@font-face {
  font-family: 'Journal';
  src: url('signaturepad/journal.eot');
  src: url('signaturepad/journal.eot?#iefix') format('embedded-opentype'),
       url('signaturepad/journal.woff') format('woff'),
       url('signaturepad/journal.ttf') format('truetype'),
       url('signaturepad/journal.svg#JournalRegular') format('svg');
  font-weight: normal;
  font-style: normal;
}

.sigPad {
  margin: 0;
  padding: 0;
  width: 200px;
}

.sigPad label {
  display: block;
  margin: 0 0 0.515em;
  padding: 0;
}

.sigPad label.error {
  color: #f33;
}

.sigPad input {
  margin: 0;
  padding: 0.2em 0;

  border: 1px solid #666;

  font-size: 1em;
}

.sigPad input.error {
  border-color: #f33;
}

.sigPad button {
  margin: 1em 0 0 0;
  padding: 0.6em 0.6em 0.7em;

  background-color: #ccc;
  border: 0;
  -moz-border-radius: 8px;
  -webkit-border-radius: 8px;
  border-radius: 8px;

  cursor: pointer;

  text-align: left;
}

.sigPad button:hover {
  background-color: #333;

  color: #fff;
}

.sig {
  display: none;
}

.sigNav {
  display: none;
  height: 2.25em;
  margin: 0;
  padding: 0;
  position: relative;

  list-style-type: none;
}

.sigNav li {
  display: inline;
  float: left;
  margin: 0;
  padding: 0;
}

.sigNav a,
.sigNav a:link,
.sigNav a:visited {
  display: block;
  margin: 0;
  padding: 0 0.6em;

  border: 0;

  color: #333;
  font-weight: bold;
  line-height: 2.25em;
  text-decoration: underline;
}

.sigNav a.current,
.sigNav a.current:link,
.sigNav a.current:visited {
  background-color: #666;
  -moz-border-radius-topleft: 8px;
  -moz-border-radius-topright: 8px;
  -webkit-border-top-left-radius: 8px;
  -webkit-border-top-right-radius: 8px;
  border-radius: 8px 8px 0 0;

  color: #fff;
  text-decoration: none;
}

.sigNav .typeIt a.current,
.sigNav .typeIt a.current:link,
.sigNav .typeIt a.current:visited {
  background-color: #ccc;

  color: #555;
}

.sigNav .clearButton {
  bottom: 0.2em;
  display: none;
  position: absolute;
  right: 0;

  font-size: 0.75em;
  line-height: 1.375;
}

.sigWrapper {
  clear: both;

  border: 1px solid #ccc;
}

.sigWrapper.current {
  border-color: #666;
}

.signed .sigWrapper {
  border: 0;
}

.pad {
  position: relative;

  cursor: url("/media/css/signaturepad/pen.cur") 16 16, crosshair;

  -ms-touch-action: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.typed {
  margin: 0;
  padding: 0 10px;
  position: absolute;
  z-index: 90;

  cursor: default;

  color: #145394;
  font: normal 100px/100px "Journal",Georgia,Times,serif;
}

.typeItDesc,
.drawItDesc {
  display: none;
  margin: 0.75em 0 0.515em;
  padding: 0.515em 0 0;

  border-top: 3px solid #ccc;

  color: #000;
  font: italic normal 1em/1.375 Georgia,Times,serif;
}

p.error {
  display: block;
  margin: 0.5em 0;
  padding: 0.4em;

  background-color: #f33;

  color: #fff;
  font-weight: bold;
}



/*/
 * Inspire Tree v1.10.2
 * https://github.com/helion3/inspire-tree
 *
 * Copyright 2015 Helion3, and other contributors
 * Licensed under MIT. https://github.com/helion3/inspire-tree/blob/master/LICENSE
 */
.inspire-tree .btn {
    background-color: hsla(0, 0%, 100%, .4);
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: 3px;
    display: inline-block;
    height: 20px;
    -webkit-transition: all .15s linear;
    transition: all .15s linear;
    width: 20px
}

.inspire-tree .btn:hover {
    box-shadow: 0 2px 3px rgba(0, 0, 0, .1)
}

.inspire-tree .btn + .btn {
    margin-left: 5px
}

.inspire-tree .btn.icon {
    position: relative
}

.inspire-tree .btn.icon:before {
    display: block;
    height: 14px;
    left: 50%;
    position: absolute;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 14px
}

.inspire-tree .btn-group {
    display: inline-block;
    height: 25px;
    line-height: 25px
}

.itree-menu {
    background: #ddd;
    border: 1px solid #c4c4c4;
    border-radius: 3px;
    font-family: sans-serif;
    list-style: none;
    margin: 0;
    min-width: 150px;
    padding: 0;
    position: absolute;
    z-index: 10
}

.itree-menu a {
    display: block;
    padding: 3px 8px
}

.itree-menu a:hover {
    background: rgba(218, 250, 255, .5);
    color: rgba(164, 234, 245, .5)
}

.inspire-tree {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

.inspire-tree:focus {
    outline: none
}

.inspire-tree, .inspire-tree * {
    box-sizing: border-box
}

.inspire-tree ol {
    list-style: none;
    margin: 0;
    padding: 0
}

.inspire-tree ol ol {
    padding-left: 20px
}

.inspire-tree .collapsed > ol, .inspire-tree .hidden {
    display: none
}

.inspire-tree li > .title-wrap {
    min-height: 25px;
    position: relative;
    z-index: 2
}

.inspire-tree .toggle {
    height: 25px;
    left: 0;
    position: absolute;
    top: 0;
    width: 25px;
    z-index: 2
}

.inspire-tree .toggle:before {
    display: block;
    left: 50%;
    position: absolute;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
}

.inspire-tree [type=checkbox] {
    left: 18px;
    position: absolute;
    top: 4px;
    vertical-align: middle;
    width: 20px;
    z-index: 2
}

.inspire-tree .title {
    cursor: default;
    display: block;
    height: 25px;
    line-height: 25px;
    overflow: hidden;
    padding-left: 30px;
    position: relative;
    text-overflow: ellipsis;
    vertical-align: middle;
    white-space: nowrap;
    z-index: 1
}

.inspire-tree .title:before {
    left: -5px;
    position: relative;
    top: 5px;
    vertical-align: top
}

.inspire-tree .title:focus {
    outline: none
}

.inspire-tree .dragging {
    position: fixed;
    z-index: 5000
}

.itree-active-drop-target {
    border: 1px solid #2dadc5
}

.inspire-tree .editable form {
    display: inline-block;
    height: 25px;
    line-height: 25px;
    padding-top: 2px
}

.inspire-tree .editable form input {
    height: 20px;
    width: 200px;
}

.inspire-tree .editable form .btn, .inspire-tree .editable form input {
    vertical-align: top
}

.inspire-tree .editable > .btn-group {
    display: none;
    padding-top: 2px;
    position: absolute;
    right: 10px;
    z-index: 3
}

.inspire-tree .editable:hover > .btn-group {
    display: block
}

.inspire-tree input + .btn-group {
    margin-left: 10px
}

.inspire-tree > .btn.icon {
    margin-left: 2px
}

.inspire-tree > ol > .folder:first-child:not(:only-child) {
    background-position: 11px 13px
}

.inspire-tree .folder:last-child:not(:only-child), .inspire-tree > ol > .folder:first-child:not(:only-child), .inspire-tree li .folder:last-child {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAMCAYAAACji9dXAAAAFUlEQVQIW2M8d+HSf0YGBgYGRpJZAJ2uFKcp4HfpAAAAAElFTkSuQmCC");
    background-repeat: no-repeat
}

.inspire-tree .folder:last-child:not(:only-child), .inspire-tree li .folder:last-child {
    background-position: 11px 0
}

.inspire-tree.editable-add > ol > .folder:last-child:not(:only-child) {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAYCAYAAAA7zJfaAAAAFUlEQVQIW2M8d+HSf0YGBgYGRrqyABKeKU0SV+t2AAAAAElFTkSuQmCC");
    background-repeat: repeat-y
}

.inspire-tree > ol .expanded:not(:last-child):not(:first-child), .inspire-tree li:not(:last-child) {
    background-repeat: no-repeat
}

.inspire-tree > ol .expanded:not(:last-child):not(:first-child), .inspire-tree li.expanded:not(:last-child) > ol, .inspire-tree li:not(:last-child) {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAYCAYAAAA7zJfaAAAAFUlEQVQIW2M8d+HSf0YGBgYGRrqyABKeKU0SV+t2AAAAAElFTkSuQmCC");
    background-position: 11px 0
}

.inspire-tree li.expanded:not(:last-child) > ol {
    background-repeat: repeat-y
}

.inspire-tree li.expanded.folder:not(.loading) > .title-wrap {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAMCAYAAACji9dXAAAAFUlEQVQIW2M8d+HSf0YGBgYGRpJZAJ2uFKcp4HfpAAAAAElFTkSuQmCC");
    background-position: 31px 13px;
    background-repeat: no-repeat
}

.inspire-tree .leaf:not(:last-child) {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAYCAYAAAAh8HdUAAAAN0lEQVQ4T2M8d+HSfyMDPUYGEgBJimHmMo7aBAmK0dCDJgl4ioClDGLo0dBDDz0SMu5o2oMFFgBXbEeI0XwYIwAAAABJRU5ErkJgggAA");
    background-position: 11px 0;
    background-repeat: no-repeat
}

.inspire-tree .leaf:last-child {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAANCAYAAABy6+R8AAAAKklEQVQoU2M8d+HSfyMDPUYGEgBJimHmMo7aBAmK0dCDJgl4ioClDGJoAGUZM32Z0U8tAAAAAElFTkSuQmCC");
    background-position: 11px 0;
    background-repeat: no-repeat
}

.inspire-tree.editable-add > ol > .leaf:last-child {
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAAYCAYAAAAh8HdUAAAAN0lEQVQ4T2M8d+HSfyMDPUYGEgBJimHmMo7aBAmK0dCDJgl4ioClDGLo0dBDDz0SMu5o2oMFFgBXbEeI0XwYIwAAAABJRU5ErkJgggAA")
}

.inspire-tree .icon:before {
    background-position: 0 0;
    background-repeat: no-repeat;
    content: '';
    display: inline-block;
    height: 14px;
    width: 14px
}

.inspire-tree .icon-check:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%236A6A6A%22%20d%3D%22M27%204l-15%2015-7-7-5%205%2012%2012%2020-20z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-check:hover:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%230CCC0A%22%20d%3D%22M27%204l-15%2015-7-7-5%205%2012%2012%2020-20z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-collapse:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22%23aaa%22%20d%3D%22M4%201h16q1.242%200%202.121%200.879t0.879%202.121v16q0%201.242-0.879%202.121t-2.121%200.879h-16q-1.242%200-2.121-0.879t-0.879-2.121v-16q0-1.242%200.879-2.121t2.121-0.879zM20%203h-16q-0.414%200-0.707%200.293t-0.293%200.707v16q0%200.414%200.293%200.707t0.707%200.293h16q0.414%200%200.707-0.293t0.293-0.707v-16q0-0.414-0.293-0.707t-0.707-0.293zM8%2011h8q0.414%200%200.707%200.293t0.293%200.707-0.293%200.707-0.707%200.293h-8q-0.414%200-0.707-0.293t-0.293-0.707%200.293-0.707%200.707-0.293z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E");
    background-color: #fff;
    border-radius: 3px;
    margin-left: -1px
}

.inspire-tree .icon-cross:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%236A6A6A%22%20d%3D%22M31.708%2025.708c-0-0-0-0-0-0l-9.708-9.708%209.708-9.708c0-0%200-0%200-0%200.105-0.105%200.18-0.227%200.229-0.357%200.133-0.356%200.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13%200.048-0.252%200.124-0.357%200.228%200%200-0%200-0%200l-9.708%209.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057%200.229l-4.586%204.586c-0.286%200.286-0.361%200.702-0.229%201.057%200.049%200.13%200.124%200.252%200.229%200.357%200%200%200%200%200%200l9.708%209.708-9.708%209.708c-0%200-0%200-0%200-0.104%200.105-0.18%200.227-0.229%200.357-0.133%200.355-0.057%200.771%200.229%201.057l4.586%204.586c0.286%200.286%200.702%200.361%201.057%200.229%200.13-0.049%200.252-0.124%200.357-0.229%200-0%200-0%200-0l9.708-9.708%209.708%209.708c0%200%200%200%200%200%200.105%200.105%200.227%200.18%200.357%200.229%200.356%200.133%200.771%200.057%201.057-0.229l4.586-4.586c0.286-0.286%200.362-0.702%200.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-cross:hover:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%23CC0000%22%20d%3D%22M31.708%2025.708c-0-0-0-0-0-0l-9.708-9.708%209.708-9.708c0-0%200-0%200-0%200.105-0.105%200.18-0.227%200.229-0.357%200.133-0.356%200.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13%200.048-0.252%200.124-0.357%200.228%200%200-0%200-0%200l-9.708%209.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057%200.229l-4.586%204.586c-0.286%200.286-0.361%200.702-0.229%201.057%200.049%200.13%200.124%200.252%200.229%200.357%200%200%200%200%200%200l9.708%209.708-9.708%209.708c-0%200-0%200-0%200-0.104%200.105-0.18%200.227-0.229%200.357-0.133%200.355-0.057%200.771%200.229%201.057l4.586%204.586c0.286%200.286%200.702%200.361%201.057%200.229%200.13-0.049%200.252-0.124%200.357-0.229%200-0%200-0%200-0l9.708-9.708%209.708%209.708c0%200%200%200%200%200%200.105%200.105%200.227%200.18%200.357%200.229%200.356%200.133%200.771%200.057%201.057-0.229l4.586-4.586c0.286-0.286%200.362-0.702%200.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-expand:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22%23aaa%22%20d%3D%22M4%201h16q1.242%200%202.121%200.879t0.879%202.121v16q0%201.242-0.879%202.121t-2.121%200.879h-16q-1.242%200-2.121-0.879t-0.879-2.121v-16q0-1.242%200.879-2.121t2.121-0.879zM20%203h-16q-0.414%200-0.707%200.293t-0.293%200.707v16q0%200.414%200.293%200.707t0.707%200.293h16q0.414%200%200.707-0.293t0.293-0.707v-16q0-0.414-0.293-0.707t-0.707-0.293zM12%207q0.414%200%200.707%200.293t0.293%200.707v3h3q0.414%200%200.707%200.293t0.293%200.707-0.293%200.707-0.707%200.293h-3v3q0%200.414-0.293%200.707t-0.707%200.293-0.707-0.293-0.293-0.707v-3h-3q-0.414%200-0.707-0.293t-0.293-0.707%200.293-0.707%200.707-0.293h3v-3q0-0.414%200.293-0.707t0.707-0.293z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E");
    background-color: #fff;
    border-radius: 3px;
    margin-left: -1px
}

.inspire-tree .icon-file-empty:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%23A5A5A5%22%20d%3D%22M28.681%207.159c-0.694-0.947-1.662-2.053-2.724-3.116s-2.169-2.030-3.116-2.724c-1.612-1.182-2.393-1.319-2.841-1.319h-15.5c-1.378%200-2.5%201.121-2.5%202.5v27c0%201.378%201.122%202.5%202.5%202.5h23c1.378%200%202.5-1.122%202.5-2.5v-19.5c0-0.448-0.137-1.23-1.319-2.841zM24.543%205.457c0.959%200.959%201.712%201.825%202.268%202.543h-4.811v-4.811c0.718%200.556%201.584%201.309%202.543%202.268zM28%2029.5c0%200.271-0.229%200.5-0.5%200.5h-23c-0.271%200-0.5-0.229-0.5-0.5v-27c0-0.271%200.229-0.5%200.5-0.5%200%200%2015.499-0%2015.5%200v7c0%200.552%200.448%201%201%201h7v19.5z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-folder:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%236A6A6A%22%20d%3D%22M14%204l4%204h14v22h-32v-26z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-folder-open:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%%22%20height%3D%22100%%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%236A6A6A%22%20d%3D%22M26%2030l6-16h-26l-6%2016zM4%2012l-4%2018v-26h9l4%204h13v4z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-minus:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%236A6A6A%22%20d%3D%22M0%2013v6c0%200.552%200.448%201%201%201h30c0.552%200%201-0.448%201-1v-6c0-0.552-0.448-1-1-1h-30c-0.552%200-1%200.448-1%201z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-minus:hover:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%23CC0000%22%20d%3D%22M0%2013v6c0%200.552%200.448%201%201%201h30c0.552%200%201-0.448%201-1v-6c0-0.552-0.448-1-1-1h-30c-0.552%200-1%200.448-1%201z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-pencil:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%236A6A6A%22%20d%3D%22M27%200c2.761%200%205%202.239%205%205%200%201.126-0.372%202.164-1%203l-2%202-7-7%202-2c0.836-0.628%201.874-1%203-1zM2%2023l-2%209%209-2%2018.5-18.5-7-7-18.5%2018.5zM22.362%2011.362l-14%2014-1.724-1.724%2014-14%201.724%201.724z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E%0A")
}

.inspire-tree .icon-pencil:hover:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%230CCC0A%22%20d%3D%22M27%200c2.761%200%205%202.239%205%205%200%201.126-0.372%202.164-1%203l-2%202-7-7%202-2c0.836-0.628%201.874-1%203-1zM2%2023l-2%209%209-2%2018.5-18.5-7-7-18.5%2018.5zM22.362%2011.362l-14%2014-1.724-1.724%2014-14%201.724%201.724z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E%0A")
}

.inspire-tree .icon-plus:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%236A6A6A%22%20d%3D%22M31%2012h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552%200-1%200.448-1%201v11h-11c-0.552%200-1%200.448-1%201v6c0%200.552%200.448%201%201%201h11v11c0%200.552%200.448%201%201%201h6c0.552%200%201-0.448%201-1v-11h11c0.552%200%201-0.448%201-1v-6c0-0.552-0.448-1-1-1z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .icon-plus:hover:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%230CCC0A%22%20d%3D%22M31%2012h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552%200-1%200.448-1%201v11h-11c-0.552%200-1%200.448-1%201v6c0%200.552%200.448%201%201%201h11v11c0%200.552%200.448%201%201%201h6c0.552%200%201-0.448%201-1v-11h11c0.552%200%201-0.448%201-1v-6c0-0.552-0.448-1-1-1z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .selected > .title-wrap .icon-folder:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%232dadc5%22%20d%3D%22M14%204l4%204h14v22h-32v-26z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .selected > .title-wrap .icon-folder-open:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%%22%20height%3D%22100%%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%23179BB9%22%20d%3D%22M26%2030l6-16h-26l-6%2016zM4%2012l-4%2018v-26h9l4%204h13v4z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .selected > .title-wrap .icon-file-empty:before {
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%220%200%2032%2032%22%3E%3Cpath%20fill%3D%22%23179BB9%22%20d%3D%22M28.681%207.159c-0.694-0.947-1.662-2.053-2.724-3.116s-2.169-2.030-3.116-2.724c-1.612-1.182-2.393-1.319-2.841-1.319h-15.5c-1.378%200-2.5%201.121-2.5%202.5v27c0%201.378%201.122%202.5%202.5%202.5h23c1.378%200%202.5-1.122%202.5-2.5v-19.5c0-0.448-0.137-1.23-1.319-2.841zM24.543%205.457c0.959%200.959%201.712%201.825%202.268%202.543h-4.811v-4.811c0.718%200.556%201.584%201.309%202.543%202.268zM28%2029.5c0%200.271-0.229%200.5-0.5%200.5h-23c-0.271%200-0.5-0.229-0.5-0.5v-27c0-0.271%200.229-0.5%200.5-0.5%200%200%2015.499-0%2015.5%200v7c0%200.552%200.448%201%201%201h7v19.5z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
}

.inspire-tree .loading > .title-wrap .title:before {
    background: url(863c5a2796b088dea28a1f75a0973372.gif) 0 0 no-repeat;
    content: '';
    height: 14px;
    width: 14px
}

.inspire-tree > ol {
    position: relative
}

.inspire-tree .wholerow {
    height: 25px;
    left: 0;
    position: absolute;
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
    width: 100%;
    z-index: 1
}

.inspire-tree .focused:not(.selected) > .wholerow {
    outline: 1px dotted #000
}

.inspire-tree .title-wrap:hover + .wholerow {
    background: rgba(218, 250, 255, .5)
}

.inspire-tree .selected > .title-wrap:hover + .wholerow, .inspire-tree .selected > .wholerow {
    background: rgba(164, 234, 245, .5)
}


ul.tagit {
    padding: 1px 5px;
    overflow: auto;
    margin-left: inherit; /* usually we don't want the regular ul margins. */
    margin-right: inherit;
}
ul.tagit li {
    display: block;
    float: left;
    margin: 2px 5px 2px 0;
}
ul.tagit li.tagit-choice {    
    position: relative;
    line-height: inherit;
}
input.tagit-hidden-field {
    display: none;
}
ul.tagit li.tagit-choice-read-only { 
    padding: .2em .5em .2em .5em; 
} 

ul.tagit li.tagit-choice-editable { 
    padding: .2em 18px .2em .5em; 
} 

ul.tagit li.tagit-new {
    padding: .25em 4px .25em 0;
}

ul.tagit li.tagit-choice a.tagit-label {
    cursor: pointer;
    text-decoration: none;
}
ul.tagit li.tagit-choice .tagit-close {
    cursor: pointer;
    position: absolute;
    right: .1em;
    top: 50%;
    margin-top: -8px;
    line-height: 17px;
}

/* used for some custom themes that don't need image icons */
ul.tagit li.tagit-choice .tagit-close .text-icon {
    display: none;
}

ul.tagit li.tagit-choice input {
    display: block;
    float: left;
    margin: 2px 5px 2px 0;
}
ul.tagit input[type="text"] {
    -moz-box-sizing:    border-box;
    -webkit-box-sizing: border-box;
    box-sizing:         border-box;

    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;

    border: none;
    margin: 0;
    padding: 0;
    width: inherit;
    background-color: inherit;
    outline: none;
}



.croppie-container {
	padding: 30px;
}
.croppie-container .cr-image {
	z-index: -1;
	position: absolute;
	top: 0;
	left: 0;
	transform-origin: 0 0;
    max-width: none;
}

.croppie-container .cr-boundary {
	position: relative;
	overflow: hidden;
	margin: 0 auto;
	z-index: 1;
}

.croppie-container .cr-viewport {
	position: absolute;
	border: 2px solid #fff;
	margin: auto;
	top: 0;
	bottom: 0;
	right: 0;
	left: 0;
	box-shadow:0 0 0 899px rgba(0, 0, 0, 0.5);
	z-index: 0;
}
.croppie-container .cr-vp-circle {
	border-radius: 50%;
}
.croppie-container .cr-overlay {
	z-index: 1;
	position: absolute;
	cursor: move;
}
.croppie-container .cr-slider-wrap {
	width: 75%;
	margin: 0 auto;
	margin-top: 25px;
	text-align: center;
}
.croppie-result {
	position: relative; 
	overflow: hidden;
}
.croppie-result img {
	position: absolute;
}

/*************************************/
/***** STYLING RANGE INPUT ***********/
/*************************************/
/*http://brennaobrien.com/blog/2014/05/style-input-type-range-in-every-browser.html */
/*************************************/

.cr-slider {
    -webkit-appearance: none;/*removes default webkit styles*/
    /*border: 1px solid white; *//*fix for FF unable to apply focus style bug */
    width: 300px;/*required for proper track sizing in FF*/
    max-width: 100%;
}
.cr-slider::-webkit-slider-runnable-track {
    width: 100%;
    height: 3px;
    background: rgba(0, 0, 0, 0.5);
    border: 0;
    border-radius: 3px;
}
.cr-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ddd;
    margin-top: -6px;
}
.cr-slider:focus {
    outline: none;
}
/*
.cr-slider:focus::-webkit-slider-runnable-track {
    background: #ccc;
}
*/

.cr-slider::-moz-range-track {
    width: 100%;
    height: 3px;
    background: rgba(0, 0, 0, 0.5);
    border: 0;
    border-radius: 3px;
}
.cr-slider::-moz-range-thumb {
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ddd;
    margin-top: -6px;
}

/*hide the outline behind the border*/
.cr-slider:-moz-focusring{
    outline: 1px solid white;
    outline-offset: -1px;
}

.cr-slider::-ms-track {
    width: 300px;
    height: 5px;
    background: transparent;/*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
    border-color: transparent;/*leave room for the larger thumb to overflow with a transparent border */
    border-width: 6px 0;
    color: transparent;/*remove default tick marks*/
}
.cr-slider::-ms-fill-lower {
    background: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}
.cr-slider::-ms-fill-upper {
    background: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}
.cr-slider::-ms-thumb {
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #ddd;
}
.cr-slider:focus::-ms-fill-lower {
    background: rgba(0, 0, 0, 0.5);
}
.cr-slider:focus::-ms-fill-upper {
    background: rgba(0, 0, 0, 0.5);
}
/*******************************************/


/* Just cross hairs for debugging - can be removed upon release */
.croppie-container .cr-viewport.debug:before,
.croppie-container .cr-viewport.debug:after {
    background: white;
    width: 1px;
    height: 1px;
    content: '';
    position: absolute;
}
.croppie-container .cr-viewport.debug:before {
	top: 0;
    height: 100%;
    left: 50%;
}
.croppie-container .cr-viewport.debug:after {
	top: 50%;
	left: 0;
	width: 100%;
}



@media print {
    #header, #debug, #left, .tabs, #login, #toolbar {
        display: none;
    }

    #right {
        margin-left: 0px;
    }

    #rightpane, .detail, .panels {
        border: 0px;
        padding: 0;
        margin: 0;
        height: 1000px;
    }
}


@media screen {
    .colorpicker {
        width: 356px;
        height: 176px;
        overflow: hidden;
        position: absolute;
        background: url(../images/colorpicker_background.png);
        font-family: Arial, Helvetica, sans-serif;
        display: none;
    }
    .colorpicker_color {
        width: 150px;
        height: 150px;
        left: 14px;
        top: 13px;
        position: absolute;
        background: #f00;
        overflow: hidden;
        cursor: crosshair;
    }
    .colorpicker_color div {
        position: absolute;
        top: 0;
        left: 0;
        width: 150px;
        height: 150px;
        background: url(../images/colorpicker_overlay.png);
    }
    .colorpicker_color div div {
        position: absolute;
        top: 0;
        left: 0;
        width: 11px;
        height: 11px;
        overflow: hidden;
        background: url(../images/colorpicker_select.gif);
        margin: -5px 0 0 -5px;
    }
    .colorpicker_hue {
        position: absolute;
        top: 13px;
        left: 171px;
        width: 35px;
        height: 150px;
        cursor: n-resize;
    }
    .colorpicker_hue div {
        position: absolute;
        width: 35px;
        height: 9px;
        overflow: hidden;
        background: url(../images/colorpicker_indic.gif) left top;
        margin: -4px 0 0 0;
        left: 0px;
    }
    .colorpicker_new_color {
        position: absolute;
        width: 60px;
        height: 30px;
        left: 213px;
        top: 13px;
        background: #f00;
    }
    .colorpicker_current_color {
        position: absolute;
        width: 60px;
        height: 30px;
        left: 283px;
        top: 13px;
        background: #f00;
    }
    .colorpicker input {
        background-color: transparent;
        border: 1px solid transparent;
        position: absolute;
        font-size: 10px;
        font-family: Arial, Helvetica, sans-serif;
        color: #898989;
        top: 4px;
        right: 11px;
        text-align: right;
        margin: 0;
        padding: 0;
        height: 11px;
    }
    .colorpicker_hex {
        position: absolute;
        width: 72px;
        height: 22px;
        background: url(../images/colorpicker_hex.png) top;
        left: 212px;
        top: 142px;
    }
    .colorpicker_hex input {
        right: 6px;
    }
    .colorpicker_field {
        height: 22px;
        width: 62px;
        background-position: top;
        position: absolute;
    }
    .colorpicker_field span {
        position: absolute;
        width: 12px;
        height: 22px;
        overflow: hidden;
        top: 0;
        right: 0;
        cursor: n-resize;
    }
    .colorpicker_rgb_r {
        background-image: url(../images/colorpicker_rgb_r.png);
        top: 52px;
        left: 212px;
    }
    .colorpicker_rgb_g {
        background-image: url(../images/colorpicker_rgb_g.png);
        top: 82px;
        left: 212px;
    }
    .colorpicker_rgb_b {
        background-image: url(../images/colorpicker_rgb_b.png);
        top: 112px;
        left: 212px;
    }
    .colorpicker_hsb_h {
        background-image: url(../images/colorpicker_hsb_h.png);
        top: 52px;
        left: 282px;
    }
    .colorpicker_hsb_s {
        background-image: url(../images/colorpicker_hsb_s.png);
        top: 82px;
        left: 282px;
    }
    .colorpicker_hsb_b {
        background-image: url(../images/colorpicker_hsb_b.png);
        top: 112px;
        left: 282px;
    }
    .colorpicker_submit {
        position: absolute;
        width: 22px;
        height: 22px;
        background: url(../images/colorpicker_submit.png) top;
        left: 322px;
        top: 142px;
        overflow: hidden;
    }
    .colorpicker_focus {
        background-position: center;
    }
    .colorpicker_hex.colorpicker_focus {
        background-position: bottom;
    }
    .colorpicker_submit.colorpicker_focus {
        background-position: bottom;
    }
    .colorpicker_slider {
        background-position: bottom;
    }
}


/*
 * jQuery OrgChart Plugin
 * https://github.com/dabeng/OrgChart
 *
 * Demos of jQuery OrgChart Plugin
 * http://dabeng.github.io/OrgChart/local-datasource/
 * http://dabeng.github.io/OrgChart/ajax-datasource/
 * http://dabeng.github.io/OrgChart/ondemand-loading-data/
 * http://dabeng.github.io/OrgChart/option-createNode/
 * http://dabeng.github.io/OrgChart/export-orgchart/
 * http://dabeng.github.io/OrgChart/integrate-map/
 *
 * Copyright 2016, dabeng
 * http://dabeng.github.io/
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

.orgchart {
  display: inline-block;
  min-height: 202px;
  min-width: 202px;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: linear-gradient(90deg, rgba(200, 0, 0, 0.15) 10%, rgba(0, 0, 0, 0) 10%), linear-gradient(rgba(200, 0, 0, 0.15) 10%, rgba(0, 0, 0, 0) 10%);
  background-size: 10px 10px;
  border: 1px dashed rgba(0,0,0,0);
  padding: 20px;
}

.orgchart .hidden, .orgchart~.hidden {
  display: none!important;
}

.orgchart *, .orgchart *:before, .orgchart *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.orgchart.b2t {
  transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -webkit-transform: rotate(180deg);
}

.orgchart.l2r {
  position: absolute;
  transform: rotate(-90deg) rotateY(180deg);
  -ms-transform: rotate(-90deg) rotateY(180deg);
  -moz-transform: rotate(-90deg) rotateY(180deg);
  -webkit-transform: rotate(-90deg) rotateY(180deg);
  transform-origin: left top;
  -ms-transform-origin: left top;
  -moz-transform-origin: left top;
  -webkit-transform-origin: left top;
}

.orgchart .verticalNodes ul {
  list-style: none;
  margin:0px;
  padding-left: 18px;
  text-align: left;
}
.orgchart .verticalNodes ul:first-child {
  margin-top: 2px;
}
.orgchart .verticalNodes>td::before {
  content: '';
  border: 1px solid rgba(217, 83, 79, 0.8);
}
.orgchart .verticalNodes>td>ul>li:first-child::before {
  top: -4px;
  height: 30px;
  width: calc(50% - 2px);
  border-width: 2px 0 0 2px;
}
.orgchart .verticalNodes ul>li {
  position: relative;
}
.orgchart .verticalNodes ul>li::before,
.orgchart .verticalNodes ul>li::after {
  content: '';
  position: absolute;
  left: -6px;
  border-color: rgba(217, 83, 79, 0.8);
  border-style: solid;
  border-width: 0 0 2px 2px;
}
.orgchart .verticalNodes ul>li::before {
  top: -4px;
  height: 30px;
  width: 11px;
}
.orgchart .verticalNodes ul>li::after {
  top: 1px;
  height: 100%;
}
.orgchart .verticalNodes ul>li:first-child::after {
  top: 24px;
  width: 11px;
  border-width: 2px 0 0 2px;
}
.orgchart .verticalNodes ul>li:last-child::after {
  border-width: 2px 0 0;
}

.orgchart.r2l {
  position: absolute;
  transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -webkit-transform: rotate(90deg);
  transform-origin: left top;
  -ms-transform-origin: left top;
  -moz-transform-origin: left top;
  -webkit-transform-origin: left top;
}

.orgchart>.spinner {
  font-size: 100px;
  margin-top: 30px;
  color: rgba(68, 157, 68, 0.8);
}

.orgchart table {
  border-spacing: 0!important;
  border-collapse: separate!important;
}

.orgchart>table:first-child{
  margin: 20px auto;
}

.orgchart td {
  text-align: center;
  vertical-align: top;
  padding: 0;
}

.orgchart tr.lines td.topLine {
  border-top: 2px solid rgba(217, 83, 79, 0.8);
}

.orgchart tr.lines td.rightLine {
  border-right: 1px solid rgba(217, 83, 79, 0.8);
  float: none;
  border-radius: 0px;
}

.orgchart tr.lines td.leftLine {
  border-left: 1px solid rgba(217, 83, 79, 0.8);
  float: none;
  border-radius: 0px;
}

.orgchart tr.lines .downLine {
  background-color: rgba(217, 83, 79, 0.8);
  margin: 0px auto;
  height: 20px;
  width: 2px;
  float: none;
}

/* node styling */
.orgchart .node {
  display: inline-block;
  position: relative;
  margin: 0;
  padding: 3px;
  border: 2px dashed transparent;
  text-align: center;
  width: 130px;
}

.orgchart.l2r .node, .orgchart.r2l .node {
  width: 50px;
  height: 130px;
}

.orgchart .node>.spinner {
  position: absolute;
  top: calc(50% - 15px);
  left: calc(50% - 15px);
  vertical-align: middle;
  font-size: 30px;
  color: rgba(68, 157, 68, 0.8);
}

.orgchart .node:hover {
  background-color: rgba(238, 217, 54, 0.5);
  transition: .5s;
  cursor: default;
  z-index: 20;
}

.orgchart .node.focused {
  background-color: rgba(238, 217, 54, 0.5);
}

.orgchart .ghost-node {
  position: fixed;
  left: -10000px;
  top: -10000px;
}

.orgchart .ghost-node>* {
  fill: #ffffff;
  stroke: #bf0000;
}

.orgchart .node.allowedDrop {
  border-color: rgba(68, 157, 68, 0.9);
}

.orgchart .node .title {
  text-align: center;
  font-size: 12px;
  font-weight: bold;
  height: 20px;
  line-height: 20px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  background-color: rgba(217, 83, 79, 0.8);
  color: #fff;
  border-radius: 4px 4px 0 0; 
}

.orgchart.b2t .node .title {
  transform: rotate(-180deg);
  -ms-transform: rotate(-180deg);
  -moz-transform: rotate(-180deg);
  -webkit-transform: rotate(-180deg);
  transform-origin: center bottom;
  -ms-transform-origin: center bottom;
  -moz-transform-origin: center bottom;
  -webkit-transform-origin: center bottom;
}

.orgchart.l2r .node .title {
  transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  -ms-transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  -moz-transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  -webkit-transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  transform-origin: bottom center;
  -ms-transform-origin: bottom center;
  -moz-transform-origin: bottom center;
  -webkit-transform-origin: bottom center;
  width: 120px;
}

.orgchart.r2l .node .title {
  transform: rotate(-90deg) translate(-40px, -40px);
  -ms-transform: rotate(-90deg) translate(-40px, -40px);
  -moz-transform: rotate(-90deg) translate(-40px, -40px);
  -webkit-transform: rotate(-90deg) translate(-40px, -40px);
  transform-origin: bottom center;
  -ms-transform-origin: bottom center;
  -moz-transform-origin: bottom center;
  -webkit-transform-origin: bottom center;
  width: 120px;
}

.orgchart .node .title .symbol {
  float: left;
  margin-top: 4px;
  margin-left: 2px;
}

.orgchart .node .content {
  width: 100%;
  height: 20px;
  font-size: 11px;
  line-height: 18px;
  border: 1px solid rgba(217, 83, 79, 0.8);
  border-radius: 0 0 4px 4px;
  text-align: center;
  background-color: #fff;
  color: #333;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.orgchart.b2t .node .content {
  transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -webkit-transform: rotate(180deg);
  transform-origin: center top;
  -ms-transform-origin: center top;
  -moz-transform-origin: center top;
  -webkit-transform-origin: center top;
}

.orgchart.l2r .node .content {
  transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  -ms-transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  -moz-transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  -webkit-transform: rotate(-90deg) translate(-40px, -40px) rotateY(180deg);
  transform-origin: top center;
  -ms-transform-origin: top center;
  -moz-transform-origin: top center;
  -webkit-transform-origin: top center;
  width: 120px;
}

.orgchart.r2l .node .content {
  transform: rotate(-90deg) translate(-40px, -40px);
  -ms-transform: rotate(-90deg) translate(-40px, -40px);
  -moz-transform: rotate(-90deg) translate(-40px, -40px);
  -webkit-transform: rotate(-90deg) translate(-40px, -40px);
  transform-origin: top center;
  -ms-transform-origin: top center;
  -moz-transform-origin: top center;
  -webkit-transform-origin: top center;
  width: 120px;
}

.orgchart .node .edge {
  font-size: 15px;
  position: absolute;
  color: rgba(68, 157, 68, 0.5);
  cursor: default;
  transition: .2s;
  -webkit-transition: .2s;
}

.orgchart.noncollapsable .node .edge {
  display: none;
}

.orgchart .edge:hover {
  color: #449d44;
  cursor: pointer;
}

.orgchart .node .verticalEdge {
  width: calc(100% - 10px);
  width: -webkit-calc(100% - 10px);
  width: -moz-calc(100% - 10px);
  left: 5px;
}

.orgchart .node .topEdge {
  top: -4px;
}

.orgchart .node .bottomEdge {
  bottom: -4px;
}

.orgchart .node .horizontalEdge {
  width: 15px;
  height: calc(100% - 10px);
  height: -webkit-calc(100% - 10px);
  height: -moz-calc(100% - 10px);
  top: 5px;
}

.orgchart .node .rightEdge {
  right: -4px;
}

.orgchart .node .leftEdge {
  left: -4px;
}

.orgchart .node .horizontalEdge::before {
  position: absolute;
  top: calc(50% - 7px);
  top: -webkit-calc(50% - 7px);
  top: -moz-calc(50% - 7px);
}

.orgchart .node .rightEdge::before {
  right: 3px;
}

.orgchart .node .leftEdge::before {
  left: 3px;
}

.orgchart .node .toggleBtn {
  position: absolute;
  left: 5px;
  bottom: -2px;
  color: rgba(68, 157, 68, 0.6);
}

.orgchart .node .toggleBtn:hover {
  color: rgba(68, 157, 68, 0.8);
}

.oc-export-btn {
  display: inline-block;
  position: absolute;
  right: 5px;
  top: 5px;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color: #fff;
  background-color: #5cb85c;
  border: 1px solid transparent;
  border-color: #4cae4c;
  border-radius: 4px;
}

.oc-export-btn[disabled] {
  cursor: not-allowed;
  filter: alpha(opacity=30);
  -webkit-box-shadow: none;
  box-shadow: none;
  opacity: 0.3;
}

.oc-export-btn:hover,.oc-export-btn:focus,.oc-export-btn:active  {
  background-color: #449d44;
  border-color: #347a34;
}

.orgchart~.mask {
  position: absolute;
  top: 0px;
  right: 0px;
  bottom: 0px;
  left: 0px;
  z-index: 999;
  text-align: center;
  background-color: rgba(0,0,0,0.3);
}

.orgchart~.mask .spinner {
  position: absolute;
  top: calc(50% - 54px);
  left: calc(50% - 54px);
  color: rgba(255,255,255,0.8);
  font-size: 108px;
}

.orgchart .node {
  transition: all 0.3s;
  webkit-transition: all 0.3s;
  opacity: 1;
  top: 0;
  left: 0;
}

.orgchart .slide-down {
  opacity: 0;
  top: 40px;
}

.orgchart.l2r .node.slide-down, .orgchart.r2l .node.slide-down {
  top: 130px;
}

.orgchart .slide-up {
  opacity: 0;
  top: -40px;
}

.orgchart.l2r .node.slide-up, .orgchart.r2l .node.slide-up {
  top: -130px;
}

.orgchart .slide-right {
  opacity: 0;
  left: 130px;
}

.orgchart.l2r .node.slide-right, .orgchart.r2l .node.slide-right {
  left: 40px;
}

.orgchart .slide-left {
  opacity: 0;
  left: -130px;
}

.orgchart.l2r .node.slide-left, .orgchart.r2l .node.slide-left {
  left: -40px;
}


/**
 * @package IcoFont by ShapeBootstrap - https://shapebootstrap.net
 * @version 1.0.0 Beta
 * @author IcoFont http://icofont.com
 * @copyright Copyright (c) 2017 IcoFont
 * @license - http://icofont.com/license/
*/

@font-face {
    font-family: 'icofont';
    src: url('../../resources/FontIcons/fonts/icofont.eot?v=1.0.0-beta');
    src: url('../../resources/FontIcons/fonts/icofont.eot?v=1.0.0-beta#iefix') format('embedded-opentype'),
    url('../../resources/FontIcons/fonts/icofont.ttf?v=1.0.0-beta') format('truetype'),
    url('../../resources/FontIcons/fonts/icofont.woff?v=1.0.0-beta') format('woff'),
    url('../../resources/FontIcons/fonts/icofont.svg?v=1.0.0-beta#icofont') format('svg');
    font-weight: normal;
    font-style: normal;
}

.icofont {
    font-family: 'IcoFont' !important;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;

    /* Better Font Rendering =========== */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.icofont-animal-bat:before {
	content: "\e933";
}
.icofont-animal-bear-tracks:before {
	content: "\e934";
}
.icofont-animal-bear:before {
	content: "\e935";
}
.icofont-animal-bird-alt:before {
	content: "\e936";
}
.icofont-animal-bird:before {
	content: "\e937";
}
.icofont-animal-bone:before {
	content: "\e938";
}
.icofont-animal-bull:before {
	content: "\e939";
}
.icofont-animal-camel-alt:before {
	content: "\e93a";
}
.icofont-animal-camel-head:before {
	content: "\e93b";
}
.icofont-animal-camel:before {
	content: "\e93c";
}
.icofont-animal-cat-alt-1:before {
	content: "\e93d";
}
.icofont-animal-cat-alt-2:before {
	content: "\e93e";
}
.icofont-animal-cat-alt-3:before {
	content: "\e93f";
}
.icofont-animal-cat-alt-4:before {
	content: "\e940";
}
.icofont-animal-cat-with-dog:before {
	content: "\e941";
}
.icofont-animal-cat:before {
	content: "\e942";
}
.icofont-animal-cow-head:before {
	content: "\e943";
}
.icofont-animal-cow:before {
	content: "\e944";
}
.icofont-animal-crab:before {
	content: "\e945";
}
.icofont-animal-crocodile:before {
	content: "\e946";
}
.icofont-animal-deer-head:before {
	content: "\e947";
}
.icofont-animal-dog-alt:before {
	content: "\e948";
}
.icofont-animal-dog-barking:before {
	content: "\e949";
}
.icofont-animal-dog:before {
	content: "\e94a";
}
.icofont-animal-dolphin:before {
	content: "\e94b";
}
.icofont-animal-duck-tracks:before {
	content: "\e94c";
}
.icofont-animal-eagle-head:before {
	content: "\e94d";
}
.icofont-animal-eaten-fish:before {
	content: "\e94e";
}
.icofont-animal-elephant-alt:before {
	content: "\e94f";
}
.icofont-animal-elephant-head-alt:before {
	content: "\e950";
}
.icofont-animal-elephant-head:before {
	content: "\e951";
}
.icofont-animal-elephant:before {
	content: "\e952";
}
.icofont-animal-elk:before {
	content: "\e953";
}
.icofont-animal-fish-alt-1:before {
	content: "\e954";
}
.icofont-animal-fish-alt-2:before {
	content: "\e955";
}
.icofont-animal-fish-alt-3:before {
	content: "\e956";
}
.icofont-animal-fish-alt-4:before {
	content: "\e957";
}
.icofont-animal-fish:before {
	content: "\e958";
}
.icofont-animal-fox-alt:before {
	content: "\e959";
}
.icofont-animal-fox:before {
	content: "\e95a";
}
.icofont-animal-frog-tracks:before {
	content: "\e95b";
}
.icofont-animal-frog:before {
	content: "\e95c";
}
.icofont-animal-froggy:before {
	content: "\e95d";
}
.icofont-animal-giraffe-alt:before {
	content: "\e95e";
}
.icofont-animal-giraffe:before {
	content: "\e95f";
}
.icofont-animal-goat-head-alt-1:before {
	content: "\e960";
}
.icofont-animal-goat-head-alt-2:before {
	content: "\e961";
}
.icofont-animal-goat-head:before {
	content: "\e962";
}
.icofont-animal-gorilla:before {
	content: "\e963";
}
.icofont-animal-hen-tracks:before {
	content: "\e964";
}
.icofont-animal-horse-head-alt-1:before {
	content: "\e965";
}
.icofont-animal-horse-head-alt-2:before {
	content: "\e966";
}
.icofont-animal-horse-head:before {
	content: "\e967";
}
.icofont-animal-horse-tracks:before {
	content: "\e968";
}
.icofont-animal-jellyfish:before {
	content: "\e969";
}
.icofont-animal-kangaroo:before {
	content: "\e96a";
}
.icofont-animal-lemur:before {
	content: "\e96b";
}
.icofont-animal-lion-alt:before {
	content: "\e96c";
}
.icofont-animal-lion-head-alt:before {
	content: "\e96d";
}
.icofont-animal-lion-head:before {
	content: "\e96e";
}
.icofont-animal-lion:before {
	content: "\e96f";
}
.icofont-animal-monkey-alt-1:before {
	content: "\e970";
}
.icofont-animal-monkey-alt-2:before {
	content: "\e971";
}
.icofont-animal-monkey-alt-3:before {
	content: "\e972";
}
.icofont-animal-monkey:before {
	content: "\e973";
}
.icofont-animal-octopus-alt:before {
	content: "\e974";
}
.icofont-animal-octopus:before {
	content: "\e975";
}
.icofont-animal-owl:before {
	content: "\e976";
}
.icofont-animal-panda-alt:before {
	content: "\e977";
}
.icofont-animal-panda:before {
	content: "\e978";
}
.icofont-animal-panther:before {
	content: "\e979";
}
.icofont-animal-parrot-lip:before {
	content: "\e97a";
}
.icofont-animal-parrot:before {
	content: "\e97b";
}
.icofont-animal-paw:before {
	content: "\e97c";
}
.icofont-animal-pelican:before {
	content: "\e97d";
}
.icofont-animal-penguin:before {
	content: "\e97e";
}
.icofont-animal-pig-alt:before {
	content: "\e97f";
}
.icofont-animal-pig:before {
	content: "\e980";
}
.icofont-animal-pigeon-alt:before {
	content: "\e981";
}
.icofont-animal-pigeon:before {
	content: "\e982";
}
.icofont-animal-pigeons:before {
	content: "\e983";
}
.icofont-animal-rabbit-running:before {
	content: "\e984";
}
.icofont-animal-rat-alt:before {
	content: "\e985";
}
.icofont-animal-rhino-head:before {
	content: "\e986";
}
.icofont-animal-rhino:before {
	content: "\e987";
}
.icofont-animal-rooster:before {
	content: "\e988";
}
.icofont-animal-seahorse:before {
	content: "\e989";
}
.icofont-animal-seal:before {
	content: "\e98a";
}
.icofont-animal-shrimp:before {
	content: "\e98b";
}
.icofont-animal-snail-alt-1:before {
	content: "\e98c";
}
.icofont-animal-snail-alt-2:before {
	content: "\e98d";
}
.icofont-animal-snail:before {
	content: "\e98e";
}
.icofont-animal-snake:before {
	content: "\e98f";
}
.icofont-animal-squid:before {
	content: "\e990";
}
.icofont-animal-squirrel:before {
	content: "\e991";
}
.icofont-animal-tiger-alt:before {
	content: "\e992";
}
.icofont-animal-tiger:before {
	content: "\e993";
}
.icofont-animal-turtle:before {
	content: "\e994";
}
.icofont-animal-whale:before {
	content: "\e995";
}
.icofont-animal-woodpecker:before {
	content: "\e996";
}
.icofont-animal-zebra:before {
	content: "\e997";
}
.icofont-chart-arrows-axis:before {
	content: "\ea86";
}
.icofont-chart-bar-graph:before {
	content: "\ea87";
}
.icofont-chart-flow-alt-1:before {
	content: "\ea88";
}
.icofont-chart-flow-alt-2:before {
	content: "\ea89";
}
.icofont-chart-flow:before {
	content: "\ea8a";
}
.icofont-chart-histogram-alt:before {
	content: "\ea8b";
}
.icofont-chart-histogram:before {
	content: "\ea8c";
}
.icofont-chart-line-alt:before {
	content: "\ea8d";
}
.icofont-chart-line:before {
	content: "\ea8e";
}
.icofont-chart-pie-alt:before {
	content: "\ea8f";
}
.icofont-chart-pie:before {
	content: "\ea90";
}
.icofont-chart-radar-graph:before {
	content: "\ea91";
}
.icofont-aids:before {
	content: "\ece9";
}
.icofont-ambulance:before {
	content: "\ecea";
}
.icofont-autism:before {
	content: "\eceb";
}
.icofont-bandage:before {
	content: "\ecec";
}
.icofont-bed-patient:before {
	content: "\eced";
}
.icofont-blind:before {
	content: "\ecee";
}
.icofont-blood-drop:before {
	content: "\ecef";
}
.icofont-blood-test:before {
	content: "\ecf0";
}
.icofont-blood:before {
	content: "\ecf1";
}
.icofont-capsule:before {
	content: "\ecf2";
}
.icofont-crutches:before {
	content: "\ecf3";
}
.icofont-dna-alt-1:before {
	content: "\ecf4";
}
.icofont-dna:before {
	content: "\ecf5";
}
.icofont-doctor-alt:before {
	content: "\ecf6";
}
.icofont-doctor:before {
	content: "\ecf7";
}
.icofont-drug-pack:before {
	content: "\ecf8";
}
.icofont-drug:before {
	content: "\ecf9";
}
.icofont-eye-alt:before {
	content: "\ecfa";
}
.icofont-first-aid-alt:before {
	content: "\ecfb";
}
.icofont-garbage:before {
	content: "\ecfc";
}
.icofont-heart-alt:before {
	content: "\ecfd";
}
.icofont-heartbeat:before {
	content: "\ecfe";
}
.icofont-herbal:before {
	content: "\ecff";
}
.icofont-hospital:before {
	content: "\ed00";
}
.icofont-icu:before {
	content: "\ed01";
}
.icofont-injection-syringe:before {
	content: "\ed02";
}
.icofont-laboratory:before {
	content: "\ed03";
}
.icofont-medical-sign-alt:before {
	content: "\ed04";
}
.icofont-medical-sign:before {
	content: "\ed05";
}
.icofont-nurse-alt:before {
	content: "\ed06";
}
.icofont-nurse:before {
	content: "\ed07";
}
.icofont-nursing-home:before {
	content: "\ed08";
}
.icofont-operation-theater:before {
	content: "\ed09";
}
.icofont-paralysis-disability:before {
	content: "\ed0a";
}
.icofont-pills:before {
	content: "\ed0b";
}
.icofont-prescription:before {
	content: "\ed0c";
}
.icofont-pulse:before {
	content: "\ed0d";
}
.icofont-stethoscope-alt:before {
	content: "\ed0e";
}
.icofont-stethoscope:before {
	content: "\ed0f";
}
.icofont-stretcher:before {
	content: "\ed10";
}
.icofont-surgeon-alt:before {
	content: "\ed11";
}
.icofont-surgeon:before {
	content: "\ed12";
}
.icofont-tablets:before {
	content: "\ed13";
}
.icofont-test-bottle:before {
	content: "\ed14";
}
.icofont-test-tube:before {
	content: "\ed15";
}
.icofont-thermometer-alt:before {
	content: "\ed16";
}
.icofont-tooth:before {
	content: "\ed17";
}
.icofont-xray:before {
	content: "\ed18";
}
.icofont-addons:before {
	content: "\ef66";
}
.icofont-address-book:before {
	content: "\ef67";
}
.icofont-adjust:before {
	content: "\ef68";
}
.icofont-alarm:before {
	content: "\ef69";
}
.icofont-anchor:before {
	content: "\ef6a";
}
.icofont-archive:before {
	content: "\ef6b";
}
.icofont-at:before {
	content: "\ef6c";
}
.icofont-attachment:before {
	content: "\ef6d";
}
.icofont-audio:before {
	content: "\ef6e";
}
.icofont-auto-mobile:before {
	content: "\ef6f";
}
.icofont-automation:before {
	content: "\ef70";
}
.icofont-baby:before {
	content: "\ef71";
}
.icofont-badge:before {
	content: "\ef72";
}
.icofont-bag:before {
	content: "\ef73";
}
.icofont-ban:before {
	content: "\ef74";
}
.icofont-bank:before {
	content: "\ef75";
}
.icofont-bar-code:before {
	content: "\ef76";
}
.icofont-bars:before {
	content: "\ef77";
}
.icofont-battery-empty:before {
	content: "\ef78";
}
.icofont-battery-full:before {
	content: "\ef79";
}
.icofont-battery-half:before {
	content: "\ef7a";
}
.icofont-battery-low:before {
	content: "\ef7b";
}
.icofont-beach:before {
	content: "\ef7c";
}
.icofont-beaker:before {
	content: "\ef7d";
}
.icofont-bear:before {
	content: "\ef7e";
}
.icofont-beard:before {
	content: "\ef7f";
}
.icofont-bed:before {
	content: "\ef80";
}
.icofont-bell:before {
	content: "\ef81";
}
.icofont-beverage:before {
	content: "\ef82";
}
.icofont-bicycle:before {
	content: "\ef83";
}
.icofont-bill:before {
	content: "\ef84";
}
.icofont-bin:before {
	content: "\ef85";
}
.icofont-binary:before {
	content: "\ef86";
}
.icofont-binoculars:before {
	content: "\ef87";
}
.icofont-bird:before {
	content: "\ef88";
}
.icofont-birds:before {
	content: "\ef89";
}
.icofont-black-board:before {
	content: "\ef8a";
}
.icofont-bluetooth:before {
	content: "\ef8b";
}
.icofont-bolt:before {
	content: "\ef8c";
}
.icofont-bomb:before {
	content: "\ef8d";
}
.icofont-book-mark:before {
	content: "\ef8e";
}
.icofont-book:before {
	content: "\ef8f";
}
.icofont-boot:before {
	content: "\ef90";
}
.icofont-box:before {
	content: "\ef91";
}
.icofont-brain:before {
	content: "\ef92";
}
.icofont-briefcase:before {
	content: "\ef93";
}
.icofont-broken:before {
	content: "\ef94";
}
.icofont-bucket:before {
	content: "\ef95";
}
.icofont-bucket1:before {
	content: "\ef96";
}
.icofont-bucket2:before {
	content: "\ef97";
}
.icofont-bug:before {
	content: "\ef98";
}
.icofont-building:before {
	content: "\ef99";
}
.icofont-bullet:before {
	content: "\ef9a";
}
.icofont-bullhorn:before {
	content: "\ef9b";
}
.icofont-bullseye:before {
	content: "\ef9c";
}
.icofont-bus:before {
	content: "\ef9d";
}
.icofont-butterfly:before {
	content: "\ef9e";
}
.icofont-cab:before {
	content: "\ef9f";
}
.icofont-calculator:before {
	content: "\efa0";
}
.icofont-calendar:before {
	content: "\efa1";
}
.icofont-camera-alt:before {
	content: "\efa2";
}
.icofont-camera:before {
	content: "\efa3";
}
.icofont-car:before {
	content: "\efa4";
}
.icofont-card:before {
	content: "\efa5";
}
.icofont-cart:before {
	content: "\efa6";
}
.icofont-cc:before {
	content: "\efa7";
}
.icofont-certificate:before {
	content: "\efa8";
}
.icofont-charging:before {
	content: "\efa9";
}
.icofont-chat:before {
	content: "\efaa";
}
.icofont-check-alt:before {
	content: "\efab";
}
.icofont-check-circled:before {
	content: "\efac";
}
.icofont-check:before {
	content: "\efad";
}
.icofont-checked:before {
	content: "\efae";
}
.icofont-children-care:before {
	content: "\efaf";
}
.icofont-clock-time:before {
	content: "\efb0";
}
.icofont-close-circled:before {
	content: "\efb1";
}
.icofont-close-line-circled:before {
	content: "\efb2";
}
.icofont-close-line-squared-alt:before {
	content: "\efb3";
}
.icofont-close-line-squared:before {
	content: "\efb4";
}
.icofont-close-line:before {
	content: "\efb5";
}
.icofont-close-squared-alt:before {
	content: "\efb6";
}
.icofont-close-squared:before {
	content: "\efb7";
}
.icofont-close:before {
	content: "\efb8";
}
.icofont-cloud-download:before {
	content: "\efb9";
}
.icofont-cloud-refresh:before {
	content: "\efba";
}
.icofont-cloud-upload:before {
	content: "\efbb";
}
.icofont-cloud:before {
	content: "\efbc";
}
.icofont-code-not-allowed:before {
	content: "\efbd";
}
.icofont-code:before {
	content: "\efbe";
}
.icofont-coffee-cup:before {
	content: "\efbf";
}
.icofont-comment:before {
	content: "\efc0";
}
.icofont-compass:before {
	content: "\efc1";
}
.icofont-computer:before {
	content: "\efc2";
}
.icofont-connection:before {
	content: "\efc3";
}
.icofont-console:before {
	content: "\efc4";
}
.icofont-contacts:before {
	content: "\efc5";
}
.icofont-contrast:before {
	content: "\efc6";
}
.icofont-copy:before {
	content: "\efc7";
}
.icofont-copyright:before {
	content: "\efc8";
}
.icofont-credit-card:before {
	content: "\efc9";
}
.icofont-crop:before {
	content: "\efca";
}
.icofont-crown:before {
	content: "\efcb";
}
.icofont-cube:before {
	content: "\efcc";
}
.icofont-cubes:before {
	content: "\efcd";
}
.icofont-culinary:before {
	content: "\efce";
}
.icofont-dashboard-web:before {
	content: "\efcf";
}
.icofont-dashboard:before {
	content: "\efd0";
}
.icofont-data:before {
	content: "\efd1";
}
.icofont-database-add:before {
	content: "\efd2";
}
.icofont-database-locked:before {
	content: "\efd3";
}
.icofont-database-remove:before {
	content: "\efd4";
}
.icofont-database:before {
	content: "\efd5";
}
.icofont-delete:before {
	content: "\efd6";
}
.icofont-diamond:before {
	content: "\efd7";
}
.icofont-dice:before {
	content: "\efd8";
}
.icofont-disabled:before {
	content: "\efd9";
}
.icofont-disc:before {
	content: "\efda";
}
.icofont-diskette:before {
	content: "\efdb";
}
.icofont-document-folder:before {
	content: "\efdc";
}
.icofont-download-alt:before {
	content: "\efdd";
}
.icofont-download:before {
	content: "\efde";
}
.icofont-downloaded:before {
	content: "\efdf";
}
.icofont-earth:before {
	content: "\efe0";
}
.icofont-ebook:before {
	content: "\efe1";
}
.icofont-edit:before {
	content: "\efe2";
}
.icofont-eject:before {
	content: "\efe3";
}
.icofont-email:before {
	content: "\efe4";
}
.icofont-envelope-open:before {
	content: "\efe5";
}
.icofont-envelope:before {
	content: "\efe6";
}
.icofont-eraser:before {
	content: "\efe7";
}
.icofont-error:before {
	content: "\efe8";
}
.icofont-exchange:before {
	content: "\efe9";
}
.icofont-exclamation-circle:before {
	content: "\efea";
}
.icofont-exclamation-square:before {
	content: "\efeb";
}
.icofont-exclamation-tringle:before {
	content: "\efec";
}
.icofont-exclamation:before {
	content: "\efed";
}
.icofont-exit:before {
	content: "\efee";
}
.icofont-expand:before {
	content: "\efef";
}
.icofont-external-link:before {
	content: "\eff0";
}
.icofont-external:before {
	content: "\eff1";
}
.icofont-eye-blocked:before {
	content: "\eff2";
}
.icofont-eye-dropper:before {
	content: "\eff3";
}
.icofont-eye:before {
	content: "\eff4";
}
.icofont-favourite:before {
	content: "\eff5";
}
.icofont-fax:before {
	content: "\eff6";
}
.icofont-female:before {
	content: "\eff7";
}
.icofont-file:before {
	content: "\eff8";
}
.icofont-film:before {
	content: "\eff9";
}
.icofont-filter:before {
	content: "\effa";
}
.icofont-fire-burn:before {
	content: "\effb";
}
.icofont-fire-extinguisher:before {
	content: "\effc";
}
.icofont-fire:before {
	content: "\effd";
}
.icofont-first-aid:before {
	content: "\effe";
}
.icofont-flag-alt-1:before {
	content: "\efff";
}
.icofont-flag-alt-2:before {
	content: "\f000";
}
.icofont-flag:before {
	content: "\f001";
}
.icofont-flash-light:before {
	content: "\f002";
}
.icofont-flash:before {
	content: "\f003";
}
.icofont-flask:before {
	content: "\f004";
}
.icofont-focus:before {
	content: "\f005";
}
.icofont-folder-open:before {
	content: "\f006";
}
.icofont-folder:before {
	content: "\f007";
}
.icofont-foot-print:before {
	content: "\f008";
}
.icofont-football-american:before {
	content: "\f009";
}
.icofont-football:before {
	content: "\f00a";
}
.icofont-game-console:before {
	content: "\f00b";
}
.icofont-game-pad:before {
	content: "\f00c";
}
.icofont-gavel:before {
	content: "\f00d";
}
.icofont-gear:before {
	content: "\f00e";
}
.icofont-gears:before {
	content: "\f00f";
}
.icofont-gift:before {
	content: "\f010";
}
.icofont-glass:before {
	content: "\f011";
}
.icofont-globe:before {
	content: "\f012";
}
.icofont-graduate:before {
	content: "\f013";
}
.icofont-graffiti:before {
	content: "\f014";
}
.icofont-grocery:before {
	content: "\f015";
}
.icofont-group:before {
	content: "\f016";
}
.icofont-hammer:before {
	content: "\f017";
}
.icofont-hand:before {
	content: "\f018";
}
.icofont-hanger:before {
	content: "\f019";
}
.icofont-hard-disk:before {
	content: "\f01a";
}
.icofont-headphone:before {
	content: "\f01b";
}
.icofont-heart-beat:before {
	content: "\f01c";
}
.icofont-heart:before {
	content: "\f01d";
}
.icofont-history:before {
	content: "\f01e";
}
.icofont-home:before {
	content: "\f01f";
}
.icofont-horn:before {
	content: "\f020";
}
.icofont-hotel:before {
	content: "\f021";
}
.icofont-hour-glass:before {
	content: "\f022";
}
.icofont-id:before {
	content: "\f023";
}
.icofont-image:before {
	content: "\f024";
}
.icofont-inbox:before {
	content: "\f025";
}
.icofont-infinite:before {
	content: "\f026";
}
.icofont-info-circle:before {
	content: "\f027";
}
.icofont-info-square:before {
	content: "\f028";
}
.icofont-info:before {
	content: "\f029";
}
.icofont-institution:before {
	content: "\f02a";
}
.icofont-interface:before {
	content: "\f02b";
}
.icofont-invisible:before {
	content: "\f02c";
}
.icofont-italic:before {
	content: "\f02d";
}
.icofont-jacket:before {
	content: "\f02e";
}
.icofont-jar:before {
	content: "\f02f";
}
.icofont-jewlery:before {
	content: "\f030";
}
.icofont-karate:before {
	content: "\f031";
}
.icofont-key-hole:before {
	content: "\f032";
}
.icofont-key:before {
	content: "\f033";
}
.icofont-keyboard:before {
	content: "\f034";
}
.icofont-kid:before {
	content: "\f035";
}
.icofont-label:before {
	content: "\f036";
}
.icofont-lamp:before {
	content: "\f037";
}
.icofont-laptop:before {
	content: "\f038";
}
.icofont-layers:before {
	content: "\f039";
}
.icofont-layout:before {
	content: "\f03a";
}
.icofont-leaf:before {
	content: "\f03b";
}
.icofont-leaflet:before {
	content: "\f03c";
}
.icofont-learn:before {
	content: "\f03d";
}
.icofont-legal:before {
	content: "\f03e";
}
.icofont-lego:before {
	content: "\f03f";
}
.icofont-lemon:before {
	content: "\f040";
}
.icofont-lens:before {
	content: "\f041";
}
.icofont-letter:before {
	content: "\f042";
}
.icofont-letterbox:before {
	content: "\f043";
}
.icofont-library:before {
	content: "\f044";
}
.icofont-license:before {
	content: "\f045";
}
.icofont-life-bouy:before {
	content: "\f046";
}
.icofont-life-buoy:before {
	content: "\f047";
}
.icofont-life-jacket:before {
	content: "\f048";
}
.icofont-life-ring:before {
	content: "\f049";
}
.icofont-light-bulb:before {
	content: "\f04a";
}
.icofont-lighter:before {
	content: "\f04b";
}
.icofont-lightning-ray:before {
	content: "\f04c";
}
.icofont-like:before {
	content: "\f04d";
}
.icofont-link:before {
	content: "\f04e";
}
.icofont-live-support:before {
	content: "\f04f";
}
.icofont-location-arrow:before {
	content: "\f050";
}
.icofont-location-pin:before {
	content: "\f051";
}
.icofont-lock:before {
	content: "\f052";
}
.icofont-login:before {
	content: "\f053";
}
.icofont-logout:before {
	content: "\f054";
}
.icofont-lollipop:before {
	content: "\f055";
}
.icofont-look:before {
	content: "\f056";
}
.icofont-loop:before {
	content: "\f057";
}
.icofont-luggage:before {
	content: "\f058";
}
.icofont-lunch:before {
	content: "\f059";
}
.icofont-lungs:before {
	content: "\f05a";
}
.icofont-magic-alt:before {
	content: "\f05b";
}
.icofont-magic:before {
	content: "\f05c";
}
.icofont-magnet:before {
	content: "\f05d";
}
.icofont-mail-box:before {
	content: "\f05e";
}
.icofont-mail:before {
	content: "\f05f";
}
.icofont-male:before {
	content: "\f060";
}
.icofont-map:before {
	content: "\f061";
}
.icofont-math:before {
	content: "\f062";
}
.icofont-maximize:before {
	content: "\f063";
}
.icofont-measure:before {
	content: "\f064";
}
.icofont-medal:before {
	content: "\f065";
}
.icofont-medical:before {
	content: "\f066";
}
.icofont-medicine:before {
	content: "\f067";
}
.icofont-mega-phone:before {
	content: "\f068";
}
.icofont-memorial:before {
	content: "\f069";
}
.icofont-memory-card:before {
	content: "\f06a";
}
.icofont-mic-mute:before {
	content: "\f06b";
}
.icofont-mic:before {
	content: "\f06c";
}
.icofont-micro-chip:before {
	content: "\f06d";
}
.icofont-microphone:before {
	content: "\f06e";
}
.icofont-microscope:before {
	content: "\f06f";
}
.icofont-military:before {
	content: "\f070";
}
.icofont-mill:before {
	content: "\f071";
}
.icofont-minus-circle:before {
	content: "\f072";
}
.icofont-minus-square:before {
	content: "\f073";
}
.icofont-minus:before {
	content: "\f074";
}
.icofont-mobile-phone:before {
	content: "\f075";
}
.icofont-molecule:before {
	content: "\f076";
}
.icofont-money:before {
	content: "\f077";
}
.icofont-moon:before {
	content: "\f078";
}
.icofont-mop:before {
	content: "\f079";
}
.icofont-muffin:before {
	content: "\f07a";
}
.icofont-music-alt:before {
	content: "\f07b";
}
.icofont-music-notes:before {
	content: "\f07c";
}
.icofont-music:before {
	content: "\f07d";
}
.icofont-mustache:before {
	content: "\f07e";
}
.icofont-mute-volume:before {
	content: "\f07f";
}
.icofont-navigation-menu:before {
	content: "\f080";
}
.icofont-navigation:before {
	content: "\f081";
}
.icofont-network-tower:before {
	content: "\f082";
}
.icofont-network:before {
	content: "\f083";
}
.icofont-news:before {
	content: "\f084";
}
.icofont-newspaper:before {
	content: "\f085";
}
.icofont-no-smoking:before {
	content: "\f086";
}
.icofont-not-allowed:before {
	content: "\f087";
}
.icofont-notebook:before {
	content: "\f088";
}
.icofont-notepad:before {
	content: "\f089";
}
.icofont-notification:before {
	content: "\f08a";
}
.icofont-numbered:before {
	content: "\f08b";
}
.icofont-opposite:before {
	content: "\f08c";
}
.icofont-optic:before {
	content: "\f08d";
}
.icofont-options:before {
	content: "\f08e";
}
.icofont-package:before {
	content: "\f08f";
}
.icofont-page:before {
	content: "\f090";
}
.icofont-paint:before {
	content: "\f091";
}
.icofont-paper-plane:before {
	content: "\f092";
}
.icofont-paperclip:before {
	content: "\f093";
}
.icofont-papers:before {
	content: "\f094";
}
.icofont-paw:before {
	content: "\f095";
}
.icofont-pay:before {
	content: "\f096";
}
.icofont-pen:before {
	content: "\f097";
}
.icofont-pencil:before {
	content: "\f098";
}
.icofont-penguin-linux:before {
	content: "\f099";
}
.icofont-pestle:before {
	content: "\f09a";
}
.icofont-phone-circle:before {
	content: "\f09b";
}
.icofont-phone:before {
	content: "\f09c";
}
.icofont-picture:before {
	content: "\f09d";
}
.icofont-pie:before {
	content: "\f09e";
}
.icofont-pine:before {
	content: "\f09f";
}
.icofont-pixels:before {
	content: "\f0a0";
}
.icofont-play:before {
	content: "\f0a1";
}
.icofont-plugin:before {
	content: "\f0a2";
}
.icofont-plus-circle:before {
	content: "\f0a3";
}
.icofont-plus-square:before {
	content: "\f0a4";
}
.icofont-plus:before {
	content: "\f0a5";
}
.icofont-polygonal:before {
	content: "\f0a6";
}
.icofont-power:before {
	content: "\f0a7";
}
.icofont-presentation:before {
	content: "\f0a8";
}
.icofont-price:before {
	content: "\f0a9";
}
.icofont-print:before {
	content: "\f0aa";
}
.icofont-puzzle:before {
	content: "\f0ab";
}
.icofont-qr-code:before {
	content: "\f0ac";
}
.icofont-queen:before {
	content: "\f0ad";
}
.icofont-question-circle:before {
	content: "\f0ae";
}
.icofont-question-square:before {
	content: "\f0af";
}
.icofont-question:before {
	content: "\f0b0";
}
.icofont-quote-left:before {
	content: "\f0b1";
}
.icofont-quote-right:before {
	content: "\f0b2";
}
.icofont-radio:before {
	content: "\f0b3";
}
.icofont-random:before {
	content: "\f0b4";
}
.icofont-recycle:before {
	content: "\f0b5";
}
.icofont-refresh:before {
	content: "\f0b6";
}
.icofont-repair:before {
	content: "\f0b7";
}
.icofont-reply-all:before {
	content: "\f0b8";
}
.icofont-reply:before {
	content: "\f0b9";
}
.icofont-resize:before {
	content: "\f0ba";
}
.icofont-responsive:before {
	content: "\f0bb";
}
.icofont-retweet:before {
	content: "\f0bc";
}
.icofont-road:before {
	content: "\f0bd";
}
.icofont-robot:before {
	content: "\f0be";
}
.icofont-rocket:before {
	content: "\f0bf";
}
.icofont-royal:before {
	content: "\f0c0";
}
.icofont-rss-feed:before {
	content: "\f0c1";
}
.icofont-safety:before {
	content: "\f0c2";
}
.icofont-sale-discount:before {
	content: "\f0c3";
}
.icofont-satellite:before {
	content: "\f0c4";
}
.icofont-send-mail:before {
	content: "\f0c5";
}
.icofont-server:before {
	content: "\f0c6";
}
.icofont-settings:before {
	content: "\f0c7";
}
.icofont-share-alt:before {
	content: "\f0c8";
}
.icofont-share-boxed:before {
	content: "\f0c9";
}
.icofont-share:before {
	content: "\f0ca";
}
.icofont-shield:before {
	content: "\f0cb";
}
.icofont-ship:before {
	content: "\f0cc";
}
.icofont-shopping-cart:before {
	content: "\f0cd";
}
.icofont-sign-in:before {
	content: "\f0ce";
}
.icofont-sign-out:before {
	content: "\f0cf";
}
.icofont-signal:before {
	content: "\f0d0";
}
.icofont-site-map:before {
	content: "\f0d1";
}
.icofont-smart-phone:before {
	content: "\f0d2";
}
.icofont-soccer:before {
	content: "\f0d3";
}
.icofont-sort-alt:before {
	content: "\f0d4";
}
.icofont-sort:before {
	content: "\f0d5";
}
.icofont-space:before {
	content: "\f0d6";
}
.icofont-spanner:before {
	content: "\f0d7";
}
.icofont-speech-comments:before {
	content: "\f0d8";
}
.icofont-speed-meter:before {
	content: "\f0d9";
}
.icofont-spinner-alt-1:before {
	content: "\f0da";
}
.icofont-spinner-alt-2:before {
	content: "\f0db";
}
.icofont-spinner-alt-3:before {
	content: "\f0dc";
}
.icofont-spinner-alt-4:before {
	content: "\f0dd";
}
.icofont-spinner-alt-5:before {
	content: "\f0de";
}
.icofont-spinner-alt-6:before {
	content: "\f0df";
}
.icofont-spinner:before {
	content: "\f0e0";
}
.icofont-spreadsheet:before {
	content: "\f0e1";
}
.icofont-square:before {
	content: "\f0e2";
}
.icofont-ssl-security:before {
	content: "\f0e3";
}
.icofont-star-alt-1:before {
	content: "\f0e4";
}
.icofont-star-alt-2:before {
	content: "\f0e5";
}
.icofont-star:before {
	content: "\f0e6";
}
.icofont-street-view:before {
	content: "\f0e7";
}
.icofont-sun:before {
	content: "\f0e8";
}
.icofont-support-faq:before {
	content: "\f0e9";
}
.icofont-tack-pin:before {
	content: "\f0ea";
}
.icofont-tag:before {
	content: "\f0eb";
}
.icofont-tags:before {
	content: "\f0ec";
}
.icofont-tasks:before {
	content: "\f0ed";
}
.icofont-telephone:before {
	content: "\f0ee";
}
.icofont-telescope:before {
	content: "\f0ef";
}
.icofont-terminal:before {
	content: "\f0f0";
}
.icofont-thumbs-down:before {
	content: "\f0f1";
}
.icofont-thumbs-up:before {
	content: "\f0f2";
}
.icofont-tick-boxed:before {
	content: "\f0f3";
}
.icofont-tick-mark:before {
	content: "\f0f4";
}
.icofont-ticket:before {
	content: "\f0f5";
}
.icofont-tie:before {
	content: "\f0f6";
}
.icofont-toggle-off:before {
	content: "\f0f7";
}
.icofont-toggle-on:before {
	content: "\f0f8";
}
.icofont-tools:before {
	content: "\f0f9";
}
.icofont-transparent:before {
	content: "\f0fa";
}
.icofont-tree:before {
	content: "\f0fb";
}
.icofont-umbrella:before {
	content: "\f0fc";
}
.icofont-unlock:before {
	content: "\f0fd";
}
.icofont-unlocked:before {
	content: "\f0fe";
}
.icofont-upload-alt:before {
	content: "\f0ff";
}
.icofont-upload:before {
	content: "\f100";
}
.icofont-usb-drive:before {
	content: "\f101";
}
.icofont-usb:before {
	content: "\f102";
}
.icofont-vector-path:before {
	content: "\f103";
}
.icofont-verification-check:before {
	content: "\f104";
}
.icofont-video-clapper:before {
	content: "\f105";
}
.icofont-video:before {
	content: "\f106";
}
.icofont-volume-down:before {
	content: "\f107";
}
.icofont-volume-off:before {
	content: "\f108";
}
.icofont-volume-up:before {
	content: "\f109";
}
.icofont-wall-clock:before {
	content: "\f10a";
}
.icofont-wall:before {
	content: "\f10b";
}
.icofont-wallet:before {
	content: "\f10c";
}
.icofont-warning-alt:before {
	content: "\f10d";
}
.icofont-warning:before {
	content: "\f10e";
}
.icofont-water-drop:before {
	content: "\f10f";
}
.icofont-web:before {
	content: "\f110";
}
.icofont-wheelchair:before {
	content: "\f111";
}
.icofont-wifi-alt:before {
	content: "\f112";
}
.icofont-wifi:before {
	content: "\f113";
}
.icofont-world:before {
	content: "\f114";
}
.icofont-zigzag:before {
	content: "\f115";
}
.icofont-zipped:before {
	content: "\f116";
}

/*Font size*/
.icofont-lg {
    font-size: 1.33333333em;
    line-height: .75em;
    vertical-align: -15%
}

.icofont-2x {
    font-size: 2em
}

.icofont-3x {
    font-size: 3em
}

.icofont-4x {
    font-size: 4em
}

.icofont-5x {
    font-size: 5em
}

.icofont-fw {
    display: inline-block;
    width: 1.28571429em;
    text-align: center
}

/*Fixed Width Icons*/
.icofont-fw {
    width: 1.28571429em;
    text-align: center;
}

/*Custom list icons*/
.icofont-ul {
    padding-left: 0;
    margin-left: 2.14285714em;
    list-style-type: none;
}
.icofont-ul>li {
    position: relative;
}
.icofont-li {
    position: absolute;
    left: -2.14285714em;
    width: 2.14285714em;
    top: .14285714em;
    text-align: center;
}

/*Animation*/
.icofont-rotate {
    -webkit-animation: icofont-rotate 2s infinite linear;
    animation: icofont-rotate 2s infinite linear
}

@-webkit-keyframes icofont-rotate {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg)
    }
    100% {
        -webkit-transform: rotate(359deg);
        transform: rotate(359deg)
    }
}

@keyframes icofont-rotate {
    0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg)
    }
    100% {
        -webkit-transform: rotate(359deg);
        transform: rotate(359deg)
    }
}


.literally .button-style-1 {
    border: 2px solid transparent;
    border-radius: 3px
}

.literally .button-style-1 {
    text-decoration: none;
    cursor: pointer
}

.literally .button-style-1.selected:not(.disabled) {
    background-color: #a1d9fe
}

.literally .button-style-1:hover:not(.disabled) {
    border-color: #a1d9fe
}

.literally .button-style-1.disabled {
    cursor: default;
    opacity: 0.3
}

.literally.toolbar-at-top .lc-drawing {
    bottom: 0;
    top: 31px
}

.literally.toolbar-at-top .lc-options {
    top: 0;
}

.literally.toolbar-at-bottom .lc-drawing {
    bottom: 31px;
    top: 0
}

.literally.toolbar-at-bottom .lc-options {
    bottom: 0;
    border-top: 1px solid #555
}

.literally.toolbar-hidden .lc-drawing {
    left: 0;
    right: 0;
    bottom: 0;
    top: 0
}

.literally.toolbar-hidden .lc-options,
.literally.toolbar-hidden .lc-picker {
    display: none
}

.literally {
    position: relative;
    background-color: #ddd;
    min-height: 400px;
    height: 100%;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -ms-touch-action: none;
    user-select: none
}

.literally,
.literally * {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box
}

.literally>* {
    position: absolute
}

.literally .lc-picker {
    top: 0;
    left: 0;
    bottom: 0;
    width: 61px;
    background-color: #EFF0F0;
}

.literally .lc-drawing {
    right: 0;
    left: 0;
    bottom: 0;
    left: 0
}

.literally .lc-drawing>* {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0
}

.literally .lc-drawing.with-gui {
    right: 0;
    left: 61px;
    cursor: default;
    border: 1px black solid;
}

.literally .lc-drawing.with-gui .polygon-toolbar {
    top: auto;
    height: 31px
}

.literally .lc-drawing.with-gui .polygon-toolbar .polygon-toolbar-button {
    float: left
}

.literally .lc-drawing.with-gui .text-tool-input:focus {
    outline: none
}

.literally .lc-picker {
    z-index: 1001;
}

.literally .lc-picker .toolbar-button {
    width: 26px;
    height: 26px;
    line-height: 26px;
    margin: 2px;
    padding: 0;
    cursor: pointer;
    text-align: center;
    border: 2px solid transparent;
    border-radius: 3px
}

.literally .lc-picker .toolbar-button {
    text-decoration: none;
    cursor: pointer
}

.literally .lc-picker .toolbar-button.selected:not(.disabled) {
    background-color: #a1d9fe
}

.literally .lc-picker .toolbar-button:hover:not(.disabled) {
    border-color: #a1d9fe
}

.literally .lc-picker .toolbar-button.disabled {
    cursor: default;
    opacity: 0.3;
    background-color: inherit !important;
    border: none !important;
      
}

.literally .lc-picker .thin-button {
    cursor: pointer;
    float: left;
    position: relative
}

.literally .lc-picker .fat-button {
    clear: both;
    width: 56px
}

.literally .lc-picker .lc-pick-tool,
.literally .lc-picker .lc-undo,
.literally .lc-picker .lc-redo,
.literally .lc-picker .lc-zoom-in,
.literally .lc-picker .lc-zoom-out {
    background-size: 100% auto;
    background-repeat: no-repeat;
    background-position: center center
}

.literally .color-well {
    font-size: 10px;
    float: left;
    width: 60px
}

.literally .color-well.open {
    background-color: #a1d9fe
}

.literally .color-well-color-container {
    border: 2px solid transparent;
    border-radius: 3px;
    border: 1px solid #aaa;
    position: relative;
    width: 28px;
    height: 28px;
    margin: 1px auto;
    overflow: visible
}

.literally .color-well-color-container {
    text-decoration: none;
    cursor: pointer
}

.literally .color-well-color-container.selected:not(.disabled) {
    background-color: #a1d9fe
}

.literally .color-well-color-container:hover:not(.disabled) {
    border-color: #a1d9fe
}

.literally .color-well-color-container.disabled {
    cursor: default;
    opacity: 0.3
}

.literally .color-well-color-container .color-well-checker {
    position: absolute;
    width: 50%;
    height: 50%;
    background-color: black
}

.literally .color-well-color-container .color-well-checker-top-left {
    border-top-left-radius: 3px
}

.literally .color-well-color-container .color-well-checker-bottom-right {
    border-bottom-right-radius: 3px
}

.literally .color-well-color-container .color-well-color {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border-radius: 3px
}

.literally .color-picker-popup {
    position: absolute;
    z-index: 1;
    background-color: white;
    border: 1px solid #555;
    left: 60px;
    bottom: 31px
}

.literally .color-picker-popup .color-row {
    clear: both
}

.literally .color-picker-popup .color-row .color-cell {
    cursor: pointer;
    width: 20px;
    height: 20px;
    line-height: 20px;
    float: left
}

.literally .color-picker-popup .color-row .color-cell:hover,
.literally .color-picker-popup .color-row .color-cell.selected {
    border: 1px solid #555;
    line-height: 18px
}

.literally .color-picker-popup .color-row .color-cell.transparent-cell {
    width: 100%
}

.literally .horz-toolbar {
    height: 31px;
    background-color: #EFF0F0;
}

.literally .horz-toolbar .label {
    line-height: 30px;
    margin: 0 0.25em 0 0.25em;
    font-size: 12px
}

.literally .horz-toolbar span {
    line-height: 30px;
    margin: 0 0.25em 0 0.25em;
    font-size: 12px;
    float: left
}

.literally .horz-toolbar .square-toolbar-button {
    border: 2px solid transparent;
    border-radius: 3px;
    margin: 1px;
    border: 1px solid #aaa;
    width: 28px;
    height: 28px;
    float: left;
    position: relative
}

.literally .horz-toolbar .square-toolbar-button {
    text-decoration: none;
    cursor: pointer
}

.literally .horz-toolbar .square-toolbar-button.selected:not(.disabled) {
    background-color: #a1d9fe
}

.literally .horz-toolbar .square-toolbar-button:hover:not(.disabled) {
    border-color: #a1d9fe
}

.literally .horz-toolbar .square-toolbar-button.disabled {
    cursor: default;
    opacity: 0.3
}

.literally .horz-toolbar .square-toolbar-button img {
    max-width: 100%;
    max-height: 100%
}

.literally .horz-toolbar .square-toolbar-button label {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    line-height: 26px;
    margin: auto;
    float: none;
    text-align: center
}

.literally .polygon-toolbar {
    position: absolute;
    border-top: 1px solid #555;
    border-bottom: 1px solid #555;
    width: 100%
}

.literally.toolbar-at-bottom .polygon-toolbar {
    top: -100%
}

.literally.toolbar-at-top .polygon-toolbar {
    top: 100%
}

.literally .lc-options {
    z-index: 1;
    right: 0;
    left: 61px
}

.literally .lc-options .lc-font-settings {
    height: 30px;
    line-height: 31px;
    padding-left: 4px;
    background-color: #f5f5f5
}

.literally .lc-options .lc-font-settings input {
    margin: 0 0.5em 0 0
}

.literally .lc-options .lc-font-settings input[type=checkbox] {
    margin: 0 0.5em 0 0.5em
}

.literally input[type=range] {
    border: none !important;
    margin-bottom: 10px;
}

.color-picker-popup .label {
    height: 22px !important;
}

.literally label {
    display: initial !important;
}

.literally input {
    height: initial !important;
}


/*
Payment Method
*/
.payment_form .paymentMethod {
    float: left;
    position: relative;
    width: 100px;
    height: 50px;

    margin-top: 5px;
    margin-bottom: 5px;
    margin-right: 10px;

    border-radius: 5px;

    background-image: -webkit-linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
    background-image: -moz-linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
    background-image: -ms-linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
    background-image: -o-linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
    background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);

    text-align: center;
    cursor: pointer;
}

.payment_form .paymentMethod .image {
    position: absolute;
    width: 100%;

    left: 50%;
    top: 40%;
    transform: translate(-50%, -50%);
}
.payment_form .paymentMethod .text {
    position: absolute;
    width: 100%;

    top: 70%;
    left: 0;

    color: #4f4f4f;
    font-size: 10px;
    font-weight: bold;
}

.glowing-border {
    outline: none;
    border: 2px solid #dadada;
    
    -webkit-transition-duration: .25s;
    transition-duration: .25s;
}

.glowing-border:hover {
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
}

.glowing-border.selected {
    border-color: #4899d2;
    box-shadow: 0 0 10px #4899d2;
}


