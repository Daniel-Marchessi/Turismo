<?php //netteCache[01]000560a:2:{s:4:"time";s:21:"0.73509500 1701871342";s:9:"callbacks";a:4:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:74:"C:\xampp\htdocs\turismo\wp-content\themes\anchor\single-portfolio-item.php";i:2;i:1468282619;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:22:"released on 2014-08-28";}i:2;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:15:"WPLATTE_VERSION";i:2;s:5:"2.9.0";}i:3;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:17:"AIT_THEME_VERSION";i:2;s:4:"1.66";}}}?><?php

// source file: C:\xampp\htdocs\turismo\wp-content\themes\anchor\single-portfolio-item.php

?><?php
// prolog NCoreMacros
list($_l, $_g) = NCoreMacros::initRuntime($template, 'a7smmqzy2z')
;
// prolog NUIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6fb2371d8c_content')) { function _lb6fb2371d8c_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;foreach($iterator = new WpLatteLoopIterator() as $post): ?>
		<div class="detail-half-content detail-portfolio-content">
				<div class="detail-thumbnail">
<?php $meta = $post->meta('portfolio-item') ;$pictures = $meta->pictures ;if ($pictures != '' and count($pictures) != 0) { ?>
												<section class="elm-main elm-easy-slider-main">
							<div class="elm-easy-slider-wrapper">
								<div class="elm-easy-slider easy-pager-thumbnails pager-pos-outside detail-thumbnail-wrap detail-thumbnail-slider">
									<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
									<ul class="easy-slider">
										<li>
<?php if ($meta->type == 'video') { if (strpos($meta->videoUrl, 'youtube') !== false) { ?>
													<span class="easy-thumbnail">
														<span class="easy-title"><?php echo $post->title ?></span>
														<iframe src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($meta->videoUrl) ?>
" width="<?php echo NTemplateHelpers::escapeHtml($vidWidth, ENT_COMPAT) ?>" height="<?php echo NTemplateHelpers::escapeHtml($vidHeight, ENT_COMPAT) ?>" class="detail-youtube"></iframe>
													</span>
<?php } else { ?>
													<span class="easy-thumbnail">
														<span class="easy-title"><?php echo $post->title ?></span>
														<iframe src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($meta->videoUrl) ?>
" width="<?php echo NTemplateHelpers::escapeHtml($vidWidth, ENT_COMPAT) ?>" height="<?php echo NTemplateHelpers::escapeHtml($vidHeight, ENT_COMPAT) ?>" class="detail-vimeo"></iframe>
													</span>
<?php } } else { ?>
												<a href="<?php echo NTemplateHelpers::escapeHtml($post->imageUrl, ENT_COMPAT) ?>" target="_blank" rel="item-gallery">
													<span class="easy-thumbnail">
														<span class="easy-title"><?php echo $post->title ?></span>
														<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 640, 'crop' => 1)) ?>
" alt="<?php echo NTemplateHelpers::escapeHtml($post->title, ENT_COMPAT) ?>" />
													</span>
												</a>
<?php } ?>
										</li>
<?php $iterations = 0; foreach ($pictures as $picture) { ?>
										<li>
<?php if (strpos($picture['link'], 'youtube') !== false) { ?>
												<span class="easy-thumbnail">
													<?php if ($picture['title'] != "") { ?><span class="easy-title"><?php echo NTemplateHelpers::escapeHtml($picture['title'], ENT_NOQUOTES) ?>
</span><?php } ?>

													<iframe src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($picture['link']) ?>
" width="<?php echo NTemplateHelpers::escapeHtml($vidWidth, ENT_COMPAT) ?>" height="<?php echo NTemplateHelpers::escapeHtml($vidHeight, ENT_COMPAT) ?>" class="detail-youtube"></iframe>
												</span>
<?php } elseif (strpos($picture['link'], 'vimeo') !== false) { ?>
												<span class="easy-thumbnail">
													<?php if ($picture['title'] != "") { ?><span class="easy-title"><?php echo NTemplateHelpers::escapeHtml($picture['title'], ENT_NOQUOTES) ?>
</span><?php } ?>

													<iframe src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($picture['link']) ?>
" width="<?php echo NTemplateHelpers::escapeHtml($vidWidth, ENT_COMPAT) ?>" height="<?php echo NTemplateHelpers::escapeHtml($vidHeight, ENT_COMPAT) ?>" class="detail-vimeo"></iframe>
												</span>
<?php } else { ?>
												<a href="<?php echo aitResizeImage($picture['image'], array('width' => 1000, 'crop' => 1)) ?>" target="_blank" rel="item-gallery">
													<span class="easy-thumbnail">
														<?php if ($picture['title'] != "") { ?><span class="easy-title"><?php echo NTemplateHelpers::escapeHtml($picture['title'], ENT_NOQUOTES) ?>
</span><?php } ?>

														<img src="<?php echo aitResizeImage($picture['image'], array('width' => 640, 'crop' => 1)) ?>
" alt="<?php echo NTemplateHelpers::escapeHtml($picture['title'], ENT_COMPAT) ?>" />
													</span>
												</a>
<?php } ?>
										</li>
<?php $iterations++; } ?>
									</ul>

									<div class="easy-slider-column">
										<div class="easy-slider-pager">
<?php if ($meta->type == 'video') { if (strpos($meta->videoUrl, 'youtube') !== false) { ?>
													<a data-slide-index="0" href="#" title="<?php echo NTemplateHelpers::escapeHtml($post->title, ENT_COMPAT) ?>">
														<span class="entry-thumbnail-icon">
															<img src="<?php echo AitWpLatteMacros::makeVideoThumbnailUrl($meta->videoUrl) ?>
" alt="<?php echo $picture['title'] ?>" class="detail-image" />
														</span>
													</a>
<?php } elseif (strpos($meta->videoUrl, 'vimeo') !== false) { ?>
														<a data-slide-index="0" href="#" title="<?php echo NTemplateHelpers::escapeHtml($post->title, ENT_COMPAT) ?>">
															<span class="entry-thumbnail-icon">
																<img src="<?php echo AitWpLatteMacros::makeVideoThumbnailUrl($meta->videoUrl) ?>
" alt="<?php echo $picture['title'] ?>" class="detail-image" />
															</span>
														</a>
<?php } else { ?>
													<a data-slide-index="0" href="#" title="<?php echo NTemplateHelpers::escapeHtml($post->title, ENT_COMPAT) ?>">
														<span class="entry-thumbnail-icon">
															<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 70, 'height' => 70, 'crop' => 1)) ?>
" alt="<?php echo $post->title ?>" class="detail-image" />
														</span>
													</a>
<?php } } else { ?>
											<a data-slide-index="0" href="#" title="<?php echo NTemplateHelpers::escapeHtml($post->title, ENT_COMPAT) ?>">
												<span class="entry-thumbnail-icon">
													<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 70, 'height' => 70, 'crop' => 1)) ?>
" alt="<?php echo $post->title ?>" class="detail-image" />
												</span>
											</a>
<?php } $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($pictures) as $picture) { if ($picture['image'] == "" and strpos($picture['link'], 'youtube') !== false) { ?>
													<a data-slide-index="<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>
" href="#" title="<?php echo NTemplateHelpers::escapeHtml($picture['title'], ENT_COMPAT) ?>">
														<span class="entry-thumbnail-icon">
															<img src="<?php echo AitWpLatteMacros::makeVideoThumbnailUrl($picture['link']) ?>
" alt="<?php echo $picture['title'] ?>" class="detail-image" />
														</span>
													</a>
<?php } elseif ($picture['image'] == "" and strpos($picture['link'], 'vimeo') !== false) { ?>
													<a data-slide-index="<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>
" href="#" title="<?php echo NTemplateHelpers::escapeHtml($picture['title'], ENT_COMPAT) ?>">
														<span class="entry-thumbnail-icon">
															<img src="<?php echo AitWpLatteMacros::makeVideoThumbnailUrl($picture['link']) ?>
" alt="<?php echo $picture['title'] ?>" class="detail-image" />
														</span>
													</a>
<?php } else { ?>
												<a data-slide-index="<?php echo NTemplateHelpers::escapeHtml($iterator->getCounter(), ENT_COMPAT) ?>
" href="#" title="<?php echo NTemplateHelpers::escapeHtml($picture['title'], ENT_COMPAT) ?>">
													<span class="entry-thumbnail-icon">
														<img src="<?php echo aitResizeImage($picture['image'], array('width' => 70, 'height' => 70, 'crop' => 1)) ?>
" alt="<?php echo $picture['title'] ?>" class="detail-image" />
													</span>
												</a>
<?php } $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
										</div>

<?php if ($meta->informations) { ?>
										<div class="local-toggles type-accordion">
<?php $iterations = 0; foreach ($meta->informations as $info) { ?>
												<div class="toggle-header"><h3 class="toggle-title"><?php echo $info['title'] ?></h3></div>
						  						<div class="toggle-content"><div class="toggle-container entry-content"><?php echo $info['description'] ?></div></div>
<?php $iterations++; } ?>
										</div>
<?php } ?>
									</div>
								</div>
								<script type="text/javascript">
									jQuery(window).load(function(){
<?php if ($options->theme->general->progressivePageLoading) { ?>
											if(!isResponsive(1024)){
												jQuery(".detail-thumbnail-slider").waypoint(function(){
													portfolioSingleEasySlider(<?php echo NTemplateHelpers::escapeJs($meta->videoRatio) ?>);
													jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
												}, { triggerOnce: true, offset: "95%" });
											} else {
												portfolioSingleEasySlider(<?php echo NTemplateHelpers::escapeJs($meta->videoRatio) ?>);
												jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
											}
<?php } else { ?>
											portfolioSingleEasySlider(<?php echo NTemplateHelpers::escapeJs($meta->videoRatio) ?>);
											jQuery(".detail-thumbnail-slider").parent().parent().addClass('load-finished');
<?php } ?>
									});
								</script>
							</div>
						</section>
<?php } else { if ($meta->type == 'video') { ?>
							<div<?php if ($_l->tmp = array_filter(array('detail-thumbnail-wrap', 'detail-thumbnail-video', $meta->informations ? 'has-toggles':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
								<div class="loading"><span class="ait-preloader"><?php echo __('Loading&hellip;', 'wplatte') ?></span></div>
<?php if (strpos($meta->videoUrl, 'youtube') !== false) { ?>
									<iframe src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($meta->videoUrl) ?>
" width="<?php echo NTemplateHelpers::escapeHtml($vidWidth, ENT_COMPAT) ?>" height="<?php echo NTemplateHelpers::escapeHtml($vidHeight, ENT_COMPAT) ?>" class="detail-youtube"></iframe>
<?php } else { ?>
									<iframe src="<?php echo AitWpLatteMacros::makeVideoEmbedUrl($meta->videoUrl) ?>
" width="<?php echo NTemplateHelpers::escapeHtml($vidWidth, ENT_COMPAT) ?>" height="<?php echo NTemplateHelpers::escapeHtml($vidHeight, ENT_COMPAT) ?>" class="detail-vimeo"></iframe>
<?php } ?>
							</div>
							<script type="text/javascript">
								jQuery(window).load(function(){
									var ratio = <?php echo NTemplateHelpers::escapeJs($meta->videoRatio) ?>;
									var pRatio = ratio.split(':');
									var width = jQuery('.detail-thumbnail-wrap').width();
									var height = (width / parseInt(pRatio[0])) * parseInt(pRatio[1]);
									jQuery('.detail-thumbnail-wrap iframe').each(function(){
										jQuery(this).attr({'width': width, 'height': height});
									});
									jQuery('.detail-thumbnail-wrap').addClass('video-loaded');
								});
							</script>
<?php } elseif ($meta->type == 'website') { ?>
							<div<?php if ($_l->tmp = array_filter(array('detail-thumbnail-wrap', 'detail-thumbnail-website', 'entry-content', $meta->informations ? 'has-toggles':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php if ($post->hasImage) { ?>
									<a href="<?php echo NTemplateHelpers::escapeHtml($meta->websiteUrl, ENT_COMPAT) ?>" target="_blank" class="thumb-link">
										<span class="entry-thumbnail-icon">
											<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 640, 'crop' => 1)) ?>
" alt="<?php echo $post->title ?>" class="detail-image" />
										</span>
									</a>
<?php } ?>
							</div>
<?php } else { ?>
							<div<?php if ($_l->tmp = array_filter(array('detail-thumbnail-wrap', 'detail-thumbnail-image', 'entry-content', $meta->informations ? 'has-toggles':null))) echo ' class="' . NTemplateHelpers::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>
<?php if ($post->hasImage) { ?>
									<a href="<?php echo aitResizeImage($post->imageUrl, array('width' => 1000, 'crop' => 1)) ?>" class="thumb-link">
										<span class="entry-thumbnail-icon">
											<img src="<?php echo aitResizeImage($post->imageUrl, array('width' => 1000, 'crop' => 1)) ?>
" alt="<?php echo $post->title ?>" class="detail-image" />
										</span>
									</a>
<?php } ?>
							</div>
<?php } ?>

<?php if ($meta->informations) { ?>
						<div class="local-toggles type-accordion">
<?php $iterations = 0; foreach ($meta->informations as $info) { ?>
								<div class="toggle-header"><h3 class="toggle-title"><?php echo $info['title'] ?></h3></div>
		  						<div class="toggle-content"><div class="toggle-container entry-content"><?php echo $info['description'] ?></div></div>
<?php $iterations++; } ?>
						</div>
<?php } } ?>
				</div>
				<div class="detail-description">
					<div class="detail-text entry-content">
<?php if ($post->hasContent) { ?>
							<?php echo $post->content ?>

<?php } else { ?>
							<?php echo $post->excerpt ?>

<?php } ?>
					</div>

									</div>
			<?php echo $post->linkPages ?>

		</div><!-- .detail-content -->

		<footer class="entry-footer">
<?php if ($wp->isSingle and $post->author->bio and $post->author->isMulti) { NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/author-bio", ""), array() + get_defined_vars(), $_l->templates['a7smmqzy2z'])->render() ;} ?>
		</footer><!-- .entry-footer -->

<?php NCoreMacros::includeTemplate(WpLatteMacros::getTemplatePart("parts/pagination", ""), array('location' => 'nav-below') + get_defined_vars(), $_l->templates['a7smmqzy2z'])->render() ?>

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