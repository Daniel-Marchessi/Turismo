<?php

/*
 * AIT WordPress Theme
 *
 * Copyright (c) 2014, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */


// === Add easyReservations options and table to backup ================================

add_filter('ait-backup-wpoptions', 'ait_backup_easyreservations_options', 10, 2);

function ait_backup_easyreservations_options($options, $isDemoContent)
{
	$options[] = 'reservations\_%';
	return $options;
}



add_filter('ait-backup-content-custom-tables', 'ait_backup_easyreservations_custom_table', 10, 2);

function ait_backup_easyreservations_custom_table($tables, $isDemoContent)
{
	if(!$isDemoContent){
		$tables[] = 'reservations';
	}
	return $tables;
}



// === Override URL of some easyReservations' scripts and styles to our own ================================

if(defined('RESERVATIONS_VERSION') and RESERVATIONS_VERSION){

	remove_action('admin_enqueue_scripts', 'easyreservations_register_scripts_both');
	remove_action('wp_enqueue_scripts', 'easyreservations_register_scripts_both');
	remove_action('wp_enqueue_scripts', 'easyreservations_register_scripts');
	remove_action('wp_enqueue_scripts', 'easyreservations_register_hourlycal_script');
	remove_action('wp_enqueue_scripts', 'easyreservations_register_search_scripts');
	remove_action('wp_enqueue_scripts', 'easyreservations_reg_chat');

	add_action('admin_enqueue_scripts', 'ait_easyreservations_register_scripts_both_admin');
	add_action('admin_enqueue_scripts', 'ait_easyreservations_register_scripts_both');
	add_action('wp_enqueue_scripts', 'ait_easyreservations_register_scripts_both');
	add_action('wp_enqueue_scripts', 'ait_easyreservations_register_scripts');
	add_action('wp_enqueue_scripts', 'ait_easyreservations_register_hourlycal_script');
	add_action('wp_enqueue_scripts', 'ait_easyreservations_register_search_scripts');
	add_action('wp_enqueue_scripts', 'ait_easyreservations_reg_chat');
	add_action('wp_enqueue_scripts', 'ait_easyreservations_override_general_scripts');



	function ait_easyreservations_override_general_scripts()
	{
		wp_dequeue_style('easy-useredit');
		wp_enqueue_style('easy-useredit', aitUrl('css').'/easyreservations/lib/modules/useredit/useredit.css', false);
	}



	function ait_easyreservations_register_scripts()
	{
		wp_register_script('easyreservations_send_calendar', WP_PLUGIN_URL.'/easyreservations/js/ajax/send_calendar.js' , array( "jquery" ), RESERVATIONS_VERSION);
		wp_register_script('easyreservations_send_price', WP_PLUGIN_URL.'/easyreservations/js/ajax/send_price.js' , array( "jquery" ), RESERVATIONS_VERSION);
		wp_register_script('easyreservations_send_validate', WP_PLUGIN_URL.'/easyreservations/js/ajax/send_validate.js' , array( "jquery" ), RESERVATIONS_VERSION);
		wp_register_script('easyreservations_send_form', WP_PLUGIN_URL . '/easyreservations/js/ajax/form.js', array( "jquery" ), RESERVATIONS_VERSION);
		wp_register_script('easyreservations_data', WP_PLUGIN_URL . '/easyreservations/js/ajax/data.js', array( "jquery" ), RESERVATIONS_VERSION);

		easyreservations_load_resources(true);

		global $the_rooms_intervals_array;

		$lang = '';
		if(defined('ICL_LANGUAGE_CODE')) $lang = '?lang=' . ICL_LANGUAGE_CODE;
		elseif(function_exists('qtrans_getLanguage')) $lang = '?lang=' . qtrans_getLanguage();

		wp_localize_script( 'easyreservations_send_calendar', 'easyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php'.$lang ), 'plugin_url' => WP_PLUGIN_URL, 'interval' => json_encode($the_rooms_intervals_array) ) );
		wp_localize_script( 'easyreservations_send_price', 'easyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php'.$lang ), 'plugin_url' => WP_PLUGIN_URL, 'interval' => json_encode($the_rooms_intervals_array) ) );
		wp_localize_script( 'easyreservations_send_validate', 'easyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php'.$lang ), 'plugin_url' => WP_PLUGIN_URL, 'interval' => json_encode($the_rooms_intervals_array) ) );
		$reservations_settings = get_option("reservations_settings");
		$reservations_currency = $reservations_settings['currency'];
		if(!is_array($reservations_currency)) $reservations_currency = array('sign' => $reservations_currency, 'place' => 0, 'whitespace' => 1, 'divider1' => '.', 'divider2' => ',', 'decimal' => 1);
		wp_localize_script( 'easyreservations_send_form', 'easyDate', array( 'ajaxurl' => admin_url( 'admin-ajax.php'.$lang ), 'currency' => $reservations_currency,  'easydateformat' => RESERVATIONS_DATE_FORMAT, 'interval' => json_encode($the_rooms_intervals_array) ) );

		wp_register_style('easy-frontend', aitUrl('css') . '/easyreservations/frontend.css', array(), RESERVATIONS_VERSION); // widget form style
		if(file_exists(aitPath('css') . '/easyreservations/css/custom/form.css')) wp_register_style('easy-form-custom', aitUrl('css') . '/easyreservations/custom/form.css', array(), RESERVATIONS_VERSION); // custom form style override
		wp_register_style('easy-form-little', aitUrl('css') . '/easyreservations/forms/form_little.css', array(), RESERVATIONS_VERSION); // widget form style
		wp_register_style('easy-form-none', aitUrl('css') . '/easyreservations/forms/form_none.css', array(), RESERVATIONS_VERSION);
		wp_register_style('easy-form-blue', aitUrl('css') . '/easyreservations/forms/form_blue.css', array(), RESERVATIONS_VERSION);

		if(file_exists(aitPath('css') . '/easyreservations/custom/calendar.css')) wp_register_style('easy-cal-custom', aitUrl('css') . '/easyreservations/custom/calendar.css', array(), RESERVATIONS_VERSION); // custom form style override
		wp_register_style('easy-cal-1', aitUrl('css') . '/easyreservations/calendar/style_1.css', array(), RESERVATIONS_VERSION);
		wp_register_style('easy-cal-2', aitUrl('css') . '/easyreservations/calendar/style_2.css', array(), RESERVATIONS_VERSION);
	}

	function ait_easyreservations_register_scripts_both_admin(){
		if(file_exists(aitPath('css') . '/easyreservations/css/custom/datepicker.css')) $form1 = 'custom/datepicker.css'; else $form1 = 'jquery-ui.css';
		wp_register_style('datestyle', aitUrl('css') . '/easyreservations/'.$form1, array(), RESERVATIONS_VERSION);
	}

	function ait_easyreservations_register_scripts_both()
	{
		wp_register_script('easyreservations_js_both', WP_PLUGIN_URL.'/easyreservations/js/both.js' , array( "jquery" ), RESERVATIONS_VERSION);
		wp_localize_script('easyreservations_js_both', 'easy_both', array('date_format' => RESERVATIONS_DATE_FORMAT, 'time' => time(), 'offset' => date("Z")));
		wp_enqueue_script('easyreservations_js_both');
	}



	function ait_easyreservations_register_hourlycal_script()
	{
		$lang = '';
		if(function_exists('icl_object_id')) $lang = '?lang=' . ICL_LANGUAGE_CODE;
		elseif(function_exists('qtrans_getLanguage')) $lang = '?lang=' . qtrans_getLanguage();

		wp_register_style('easy-hcal-1', aitUrl('css') . '/easyreservations/lib/modules/hourlycal/style_1.css');
		if(file_exists(aitPath('css') . '/easyreservations/custom/hourly.css')) wp_register_style('easy-hcal-custom', aitUrl('css') . '/easyreservations/custom/hourly.css'); // custom form style override

		wp_register_script('easyreservations_send_hourlycalendar', WP_PLUGIN_URL.'/easyreservations/lib/modules/hourlycal/send_hourlycal.js' , array( "jquery" ));
		wp_localize_script('easyreservations_send_hourlycalendar', 'easyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php'.$lang ), 'plugin_url' => WP_PLUGIN_URL ) );
	}



	function ait_easyreservations_register_search_scripts()
	{
		$lang = '';
		if(function_exists('icl_object_id')) $lang = '?lang=' . ICL_LANGUAGE_CODE;
		elseif(function_exists('qtrans_getLanguage')) $lang = '?lang=' . qtrans_getLanguage();

		wp_register_script('easyreservations_send_search', WP_PLUGIN_URL.'/easyreservations/lib/modules/search/send_search.js' , array( "jquery" ));
		wp_localize_script('easyreservations_send_search', 'easyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php'.$lang ), 'plugin_url' => WP_PLUGIN_URL, 'easydateformat' => RESERVATIONS_DATE_FORMAT ) );

		if(file_exists(aitPath('css') . '/easyreservations/css/custom/search.css')) wp_register_style('easy-search-custom', aitUrl('css').'/easyreservations/css/custom/search.css');
		wp_register_style('easy-search-1', aitUrl('css').'/easyreservations/lib/modules/search/style_1.css');
	}



	function ait_easyreservations_reg_chat()
	{
		wp_register_script('easyreservations_send_chat', WP_PLUGIN_URL.'/easyreservations/lib/modules/useredit/send_chat.js' , array( "jquery" ));
		wp_register_style('easy-guest-control', aitUrl('css') . '/easyreservations/lib/modules/useredit/useredit.css', array(), RESERVATIONS_VERSION);

	}
}
