<?php //netteCache[01]000543a:2:{s:4:"time";s:21:"0.30130600 1706720037";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:57:"C:\xampp\htdocs\turismo\wp-content\themes\anchor\post.php";i:2;i:1468282611;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.0";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.66";}}}?><?php

// source file: C:\xampp\htdocs\turismo\wp-content\themes\anchor\post.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 's8xpsey6v0')
;
// prolog NUIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb3296510d5b_content')) { function _lb3296510d5b_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;foreach($iterator = new WpLatteLoopIterator() as $post): ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/post-content", ""), array() + get_defined_vars(), $_l->templates['s8xpsey6v0'])->render() ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/pagination", ""), array('location' => 'nav-below') + get_defined_vars(), $_l->templates['s8xpsey6v0'])->render() ?>

<?php endforeach; 
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof NPresenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return NUIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 