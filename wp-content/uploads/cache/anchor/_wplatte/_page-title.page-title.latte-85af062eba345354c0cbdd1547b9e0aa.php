<?php //netteCache[01]000581a:2:{s:4:"time";s:21:"0.05975000 1701871229";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:95:"C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\page-title\page-title.latte";i:2;i:1468282813;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.0";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.66";}}}?><?php

// source file: C:\xampp\htdocs\turismo\wp-content\themes\anchor\ait-theme\elements\page-title\page-title.latte

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'eoe284z5r7')
;
// prolog NUIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if (($wp->isBlog and $blog) or !$wp->isHome) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/page-title", ""), array() + get_defined_vars(), $_l->templates['eoe284z5r7'])->render() ?>

<?php } 