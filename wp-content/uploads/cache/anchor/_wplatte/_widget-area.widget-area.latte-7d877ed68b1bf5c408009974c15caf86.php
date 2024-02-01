<?php //netteCache[01]000583a:2:{s:4:"time";s:21:"0.86272200 1706720668";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:97:"C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\widget-area\widget-area.latte";i:2;i:1468282830;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.0";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.66";}}}?><?php

// source file: C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\widget-area\widget-area.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, '2pgdywh08m')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if (!empty($el->option->area->sidebar) and $wp->isWidgetAreaActive($el->option->area->sidebar)) { NCoreMacros::includeTemplate($el->common('header'), $template->getParameters(), $_l->templates['2pgdywh08m'])->render() ?>

	<div id="<?php echo NTemplateHelpers::escapeHtml($htmlId, ENT_COMPAT) ?>" data-floating="<?php echo NTemplateHelpers::escapeHtml($el->option->floating, ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array($htmlClass, $el->option->floating ? 'widget-area-floating' : 'widget-area-static'))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>

		<div class="minimize-toggle"><i class="fa fa-times"></i></div>

		<div class="grid-main">
			<div class="widget-area-container">
<?php dynamic_sidebar($el->option->area->sidebar) ?>
			</div>
		</div>

	</div>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("ait-theme/elements/widget-area/javascript", ""), array() + get_defined_vars(), $_l->templates['2pgdywh08m'])->render() ;} 