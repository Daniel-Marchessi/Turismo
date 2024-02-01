<?php

/*
 * AIT WordPress Theme
 *
 * Copyright (c) 2014, Affinity Information Technology, s.r.o. (http://AitThemes.club)
 */

// === Usefull debugging constants ===================================

// if(!defined('AIT_DISABLE_CACHE')) define('AIT_DISABLE_CACHE', true);
// if(!defined('AIT_ENABLE_NDEBUGGER')) define('AIT_ENABLE_NDEBUGGER', true);


// === Loads AIT WordPress Framework ================================
require_once get_template_directory() . '/ait-theme/@framework/load.php';


// === Mandatory WordPress Standard functionality ===================

if(!isset($content_width)) $content_width = 1200;


// === Custom filters, actions and framework overrides ==============




// === Run the theme ===============================================

$themeConfiguration = include aitPath('config', '/@theme-configuration.php');

AitTheme::run($themeConfiguration);


// === Custom settings ==============================================

add_filter('loop_shop_columns', create_function('', 'return 3;'));

if ( aitIsPluginActive( "woocommerce" ) ) {
	add_action('ait-theme-activation', 'woocommerce_image_sizes', 1);
	function woocommerce_image_sizes(){
		update_option( 'shop_catalog_image_size', array('width' => '300', 'height' => '300', 'crop' => 1) );
		update_option( 'shop_single_image_size', array('width' => '600', 'height' => '600', 'crop' => 1) );
		update_option( 'shop_thumbnail_image_size', array('width' => '180', 'height' => '180', 'crop' => 1) );
	}
}

// Disable woocommerce default styles
if ( aitIsPluginActive( "woocommerce" ) ) {
	if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	} else {
		define( 'WOOCOMMERCE_USE_CSS', false );
	}
}

// === EasyReservations Plugin Overrides ============================

require_once aitPath('includes', '/easy-reservations.php');