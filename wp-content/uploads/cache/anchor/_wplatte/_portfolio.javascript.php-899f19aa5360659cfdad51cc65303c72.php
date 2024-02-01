<?php //netteCache[01]000578a:2:{s:4:"time";s:21:"0.81165200 1701871231";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:92:"C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\portfolio\javascript.php";i:2;i:1468282814;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.0";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.66";}}}?><?php

// source file: C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\portfolio\javascript.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'ewrdo2cku2')
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
		<?php echo $el->jsObject ?>


<?php if ($options->theme->general->progressivePageLoading) { ?>
			<?php echo $el->jsObjectName ?>.current.progressive = true;
			if(!isResponsive(1024)){
				jQuery("#<?php echo $htmlId ?>").portfolio(<?php echo $el->jsObjectName ?>);
			jQuery("#<?php echo $htmlId ?>").waypoint(function(){
				jQuery("#<?php echo $htmlId ?>").find('div.loading')/*.delay(1000)*/.fadeOut('fast');
				jQuery("#<?php echo $htmlId ?>").parent().parent().addClass('load-finished');
			}, { triggerOnce: true, offset: '95%' });
		} else {
			<?php echo $el->jsObjectName ?>.current.progressive = false;
			jQuery("#<?php echo $htmlId ?>").portfolio(<?php echo $el->jsObjectName ?>);
	}
<?php } else { ?>
	<?php echo $el->jsObjectName ?>.current.progressive = false;
	jQuery("#<?php echo $htmlId ?>").portfolio(<?php echo $el->jsObjectName ?>);
<?php } ?>
	});
</script>
