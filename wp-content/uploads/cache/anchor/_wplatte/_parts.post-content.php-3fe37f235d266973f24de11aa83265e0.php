<?php //netteCache[01]000557a:2:{s:4:"time";s:21:"0.56973800 1706720037";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:71:"C:\xampp\htdocs\turismo\wp-content\themes\anchor\parts\post-content.php";i:2;i:1468282622;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.0";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.66";}}}?><?php

// source file: C:\xampp\htdocs\turismo\wp-content\themes\anchor\parts\post-content.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'yhg4l2i7t5')
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

<?php if (!$wp->isSingular) { ?>

<?php if ($wp->isSearch) { ?>

						<article <?php echo $post->htmlId ?> <?php echo $post->htmlClass ?>>
				<header class="entry-header">

					<div class="entry-title">

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-date-format", ""), array('dateIcon' => $post->rawDate, 'dateLinks' => 'no', 'dateShort' => 'no') + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ?>

						<div class="entry-title-wrap">

							<h2><a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>
"><?php echo $post->title ?></a></h2>

<?php if ($post->isInAnyCategory) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-categories", ""), array() + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ;} ?>

						</div><!-- /.entry-title-wrap -->
					</div><!-- /.entry-title -->
				</header><!-- /.entry-header -->

				<div class="entry-content loop">
					<?php echo $post->excerpt ?>

				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>
" class="more"><?php echo $template->printf(__('%s Read more', 'wplatte'), '<span class="meta-nav">&rarr;</span>') ?></a>
				</footer><!-- /.entry-footer -->
			</article>

<?php } else { ?>

						<article <?php echo $post->htmlId ?> <?php echo $post->htmlClass ?>>

				<div class="entry-thumbnail">
<?php if ($post->hasImage) { ?>
						<div class="entry-thumbnail-wrap entry-content">
						<a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>" class="thumb-link">
							<span class="entry-thumbnail-icon">
								<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 900, 'height' => 600, 'crop' => 1)) ?>" />
							</span>
						</a>
						</div>
<?php } ?>

					<div class="entry-meta">
<?php if ($post->isSticky and !$wp->isPaged and $wp->isHome) { ?>
							<span class="featured-post"><?php echo NTemplateHelpers::escapeHtml(__('Featured post', 'wplatte'), ENT_NOQUOTES) ?></span>
<?php } ?>

						<?php ob_start() ?><span class="edit-link"><?php echo __('Edit', 'wplatte') ?>
</span><?php $editLinkLabel = ob_get_clean() ?>

      					<?php echo $post->editLink($editLinkLabel) ?>

					</div><!-- /.entry-meta -->
				</div>

				<div class="post-right-wrap">
					<header class="entry-header <?php if (!$post->hasImage) { ?>nothumbnail<?php } ?>">

						<div class="entry-title">

							<div class="entry-title-wrap">

								<h2><a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>
"><?php echo $post->title ?></a></h2>

								<div class="entry-data">

<?php $dateIcon = $post->date('c') ;$dateLinks = 'no' ;$dateShort = 'no' ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-date-format", ""), array('dateIcon' => $dateIcon, 'dateLinks' => $dateLinks, 'dateShort' => $dateShort) + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ?>

<?php if ($post->type == 'post') { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-author", ""), array() + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ;} ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/comments-link", ""), array() + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ?>

								</div>

							</div><!-- /.entry-title-wrap -->

						</div><!-- /.entry-title -->

					</header><!-- /.entry-header -->


					<div class="entry-content loop">
						<?php echo $post->excerpt ?>

					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<a href="<?php echo NTemplateHelpers::escapeHtml($post->permalink, ENT_COMPAT) ?>
" class="more"><?php echo __('Read more', 'wplatte') ?></a>
					</footer><!-- .entry-footer -->

				</div>

			</article>
<?php } ?>

<?php } else { ?>

				<article <?php echo $post->htmlId ?> class="content-block">
			<header class="entry-header">

					<h1><?php echo $post->title ?></h1>

<?php if ($post->imageUrl) { ?>
						<div class="entry-thumbnail">
							<div class="entry-thumbnail-wrap">
								<a href="<?php echo NTemplateHelpers::escapeHtml($post->imageUrl, ENT_COMPAT) ?>" class="thumb-link">
									<span class="entry-thumbnail-icon">
										<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 1000, 'height' => 500, 'crop' => 1)) ?>
" alt="<?php echo NTemplateHelpers::escapeHtml($post->imageUrl, ENT_COMPAT) ?>" />
									</span>
								</a>
							</div>
						</div>
<?php } ?>

					<div class="entry-data">

<?php $dateIcon = $post->date('c') ;$dateLinks = 'no' ;$dateShort = 'no' ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-date-format", ""), array('dateIcon' => $dateIcon, 'dateLinks' => $dateLinks, 'dateShort' => $dateShort) + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ?>

<?php if ($post->type == 'post') { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-author", ""), array() + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ;} ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/comments-link", ""), array() + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ?>

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/entry-categories", ""), array() + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ?>

					</div>

			</header>


			<div class="entry-content">
				<?php echo $post->content ?>

				<?php echo $post->linkPages ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">

<?php if ($post->tagList) { ?>
					<span class="tags">
						<?php echo NTemplateHelpers::escapeHtml(__('', 'wplatte'), ENT_NOQUOTES) ?>
 <span class="tags-links"><?php echo $post->tagList ?></span>
					</span>
<?php } ?>

<?php if ($wp->isSingle and $post->author->bio and $post->author->isMulti) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/author-bio", ""), array() + get_defined_vars(), $_l->templates['yhg4l2i7t5'])->render() ;} ?>
			</footer><!-- .entry-footer -->
		</article>

<?php } 