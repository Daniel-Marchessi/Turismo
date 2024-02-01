<?php

/*
 * AIT WordPress Theme
 *
 * Copyright (c) 2014, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

return array(

	'menus' => array(
		'main'   => __('Main menu', 'ait-admin'),
		'footer' => __('Footer menu', 'ait-admin'),
	),

	// Supported standard WordPress features
	'theme-support' => array(
		'woocommerce',
		'automatic-feed-links',
		'post-thumbnails',
	),

	// Supported custom ait-theme features
	'ait-theme-support' => array(
		'megamenu',
		'cpts' => array(
			'ad-space',
			'event',
			'faq',
			'job-offer',
			'member',
			'partner',
			'portfolio-item',
			'price-table',
			'product-item',
			'service-box',
			'testimonial',
			'toggle',
		),
		'elements' => array(
			'get-directions',
			'advertising-spaces',
			'columns',
			'contact-form',
			'countdown',
			'counters',
			'easy-slider',
			'events',
			'facebook',
			'faq',
			'google-map',
			'job-offers',
			'member',
			'members',
			'mixcloud',
			'opening-hours',
			'page-title',
			'partners',
			'portfolio',
			'posts',
			'price-table',
			'products',
			'revolution-slider',
			'rule',
			'seo',
			'services',
			'sitemap',
			'soundcloud',
			'testimonials',
			'text',
			'toggles',
			'twitter',
			'video',
			'widget-area',
		),
	),

	'plugins' => array(
		'ait-toolkit' => array(
			'required' => true,
		),
		'ait-shortcodes' => array(
			'required' => true,
		),
        'ait-languages' => array(
            'required'      => true,
        ),
		'revslider' => array(
			'required' => true,
		),
		'easyreservations' => array(
			'name'     => 'easyReservations',
			'required' => false,
			'version'  => '3.4.2',
		),
	),

	'assets' => array(

		'fonts' => array(
			'opensans' => array(
				'regular',
				'semibold',
				'bold',
				'bolditalic',
			),
			'awesome',
		),

		'css' => array(
			'jquery-selectbox' => array(
				'file' => '/libs/jquery.selectbox.css',
			),
			'font-awesome'	=> array(
				'file'	=> '/libs/font-awesome.css',
			),
			'jquery-ui-css' => true,
		),

		'js' => array(
			'jquery-raty' => array(
				'file' 	=> '/libs/jquery.raty-2.5.2.js',
				'deps' 	=> array('jquery')
			),
			'jquery-waypoints' => array(
				'file' 	=> '/libs/jquery-waypoints-2.0.3.js',
				'deps' 	=> array('jquery')
			),
			'jquery-selectbox' => array(
				'file' => '/libs/jquery.selectbox-0.2.js',
				'deps' => array('jquery')
			),
			'jquery-infieldlabels' => array(
				'file'	=> '/libs/jquery.infieldlabel-0.1.4.js',
				'deps'	=> array('jquery')
			),
			/* AIT CUSTOM SCRIPTS */
			'ait-mobile-script' => array(
				'file' => '/mobile.js',
				'deps' => array('jquery')
			),
			'ait-menu-script' => array(
				'file' => '/menu.js',
				'deps' => array('jquery', 'ait-mobile-script')
			),
			'ait-portfolio-script' => array(
				'file' => '/portfolio-item.js',
				'deps' => array('jquery', 'ait-mobile-script', 'jquery-ui-accordion', 'jquery-bxslider')
			),
			'ait-custom-script' => array(
				'file' => '/custom.js',
				'deps' => array('jquery', 'ait-mobile-script')
			),
			'ait-woocommerce-script' => array(
				'file' => '/woocommerce.js',
				'deps' => array('jquery'),
				'enqueue-only-if' => '!is_admin() and aitIsPluginActive("woocommerce")',
			),
			/* AIT CUSTOM SCRIPTS */
			'ait-script' => array(
				'file' => '/script.js',
				'deps' => array('jquery', 'ait-mobile-script', 'ait-menu-script', 'ait-portfolio-script', 'ait-custom-script')
			),
		),

	),


	'frontend-ajax' => array(
		'send-email',
	),
);
