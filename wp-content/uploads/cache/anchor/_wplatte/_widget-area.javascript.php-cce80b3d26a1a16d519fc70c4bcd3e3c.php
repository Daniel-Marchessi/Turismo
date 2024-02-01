<?php //netteCache[01]000580a:2:{s:4:"time";s:21:"0.26536200 1706720669";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:94:"C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\widget-area\javascript.php";i:2;i:1468282830;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.0";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.66";}}}?><?php

// source file: C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\widget-area\javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '7szcja4awt')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<script id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>-script">
jQuery(window).load(function(){
<?php if ($options->theme->general->progressivePageLoading) { ?>
		if(!isResponsive(1024)){
			jQuery("#<?php echo $htmlId ?>").waypoint(function(){
				jQuery("#<?php echo $htmlId ?>").addClass('load-finished');
			}, { triggerOnce: true, offset: "95%" });
		} else {
			jQuery("#<?php echo $htmlId ?>").addClass('load-finished');
		}
<?php } else { ?>
		jQuery("#<?php echo $htmlId ?>").addClass('load-finished');
<?php } ?>
});

jQuery(window).resize(function(){
	widgetAreaCheckResponsive();
});

jQuery(document).ready(function(){
	jQuery("#<?php echo $htmlId ?>").find('.minimize-toggle').click(function(){
		if(typeof jQuery.cookie("widget-area-minimized") == "undefined"){
			jQuery("#<?php echo $htmlId ?>").addClass("widget-area-minimized");
			jQuery("#<?php echo $htmlId ?> .grid-main").delay(500).queue(function(next){
				jQuery(this).hide();
				next();
			});
			jQuery.cookie('widget-area-minimized', 'true');
		} else {
			jQuery("#<?php echo $htmlId ?> .grid-main").show().delay(250).queue(function(next){
				jQuery("#<?php echo $htmlId ?>").removeClass("widget-area-minimized");
				next();
			});
			jQuery.removeCookie('widget-area-minimized');
		}
	});

	if(typeof jQuery.cookie("widget-area-minimized") == "undefined"){
		jQuery("#<?php echo $htmlId ?> .grid-main").show();
		jQuery("#<?php echo $htmlId ?>").removeClass("widget-area-minimized");
	} else {
		jQuery("#<?php echo $htmlId ?>").addClass("widget-area-minimized");
		jQuery("#<?php echo $htmlId ?> .grid-main").hide();
	}

	widgetAreaCheckResponsive();
});

function widgetAreaCheckResponsive(){
	if(jQuery("#<?php echo $htmlId ?>").data("floating")){
		if(isResponsive(640)){
			jQuery("#<?php echo $htmlId ?>").removeClass("widget-area-floating").addClass("widget-area-static");
			jQuery("#<?php echo $htmlId ?> .grid-main").show();
		} else {
			jQuery("#<?php echo $htmlId ?>").addClass("widget-area-floating").removeClass("widget-area-static");
			if(jQuery("#<?php echo $htmlId ?>").hasClass('widget-area-minimized')){
				jQuery("#<?php echo $htmlId ?> .grid-main").hide();
			} else {
				jQuery("#<?php echo $htmlId ?> .grid-main").show();
			}
		}
	}
}
</script>