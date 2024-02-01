<!doctype html>
<!--[if IE 8]>
<html {languageAttributes}  class="lang-{$currentLang->locale} {$options->layout->custom->pageHtmlClass} ie ie8">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)]><!-->
<html {languageAttributes} class="lang-{$currentLang->locale} {$options->layout->custom->pageHtmlClass}">
<!--<![endif]-->
<head>
	<meta charset="{$wp->charset}">
	<meta name="viewport" content="width=device-width, target-densityDpi=device-dpi">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="{$wp->pingbackUrl}">

	{if $options->theme->general->favicon != ""}
		<link href="{$options->theme->general->favicon}" rel="icon" type="image/x-icon" />
	{/if}

	{includePart parts/seo}

	{googleAnalytics $options->theme->google->analyticsTrackingId}

	{!$options->theme->header->customJsCode}

	{wpHead} {* alias for wp_head() *}
</head>
<body {!$wp->bodyHtmlClass}>
	{* usefull for inline scripts like facebook social plugins scripts, etc... *}
	{doAction ait-html-body-begin}

	<div id="page" class="hfeed page-container">

		{if $options->theme->header->headerType == 'headerTwo'}
			<header id="masthead" class="site-header" role="banner">

				<div class="header-container grid-main">
					{!$options->theme->header->customHtml}
				</div>


				<div class="header-container grid-main">

					<div class="menu-container">
						<nav class="main-nav" role="navigation">
							<div class="main-nav-wrap">
								<h3 class="menu-toggle">{__ 'Menu'}</h3>
								{menu main}
							</div>
						</nav>
					</div>

					<div class="site-tools">

						{includePart parts/social-icons}
						{includePart parts/languages-switcher}
						{includePart "parts/woocommerce-cart"}

					</div>

				</div>


			</header><!-- #masthead -->
		{else}
			<header id="masthead" class="site-header" role="banner">
				<div class="header-container grid-main">

					<div class="site-logo">
						{if $options->theme->header->logo}
						<a href="{$homeUrl}" title="{$wp->name}" rel="home"><img src="{$options->theme->header->logo}" alt="logo"></a>
						{else}
						<div class="site-title"><a href="{$homeUrl}" title="{$wp->name}" rel="home">{$wp->name}</a></div>
						{/if}
					</div>

					<div class="menu-container">
						<nav class="main-nav" role="navigation">
							<div class="main-nav-wrap">
								<h3 class="menu-toggle">{__ 'Menu'}</h3>
								{menu main}
							</div>
						</nav>
					</div>

					<div class="site-tools">

						{includePart parts/social-icons}
						{includePart parts/languages-switcher}
						{includePart "parts/woocommerce-cart"}

					</div>

				</div>


			</header><!-- #masthead -->
		{/if}

		<div class="sticky-menu menu-container" >
			<div class="grid-main">
				<div class="site-logo">
					{if $options->theme->header->logo}
					<a href="{$homeUrl}" title="{$wp->name}" rel="home"><img src="{$options->theme->header->logo}" alt="logo"></a>
					{else}
					<div class="site-title"><a href="{$homeUrl}" title="{$wp->name}" rel="home">{$wp->name}</a></div>
					{/if}
				</div>
				<nav class="main-nav">
					<!-- wp menu here -->
				</nav>
			</div>
		</div>
