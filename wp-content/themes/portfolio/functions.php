<?php

//Custom table fetch
 global $wpdb;
 $results_skillsets = $wpdb->get_results("SELECT * FROM wp_skillsets");
 $results_timeline = $wpdb->get_results("SELECT * FROM wp_timeline");
 $results_aboutme = $wpdb->get_results("SELECT * FROM wp_aboutme");
 $results_project = $wpdb->get_results("SELECT * FROM wp_project");


	//$wpdb->show_errors();
	$wpdb->hide_errors();
//Add menu 
	add_theme_support('nav-menu');
		if(function_exists('register_nav_menus')){
		register_nav_menus(
		array(
		'main'=>'Main Nav',
		)
		);

		register_nav_menus(
		array(
		'right-menu'=>'Right Nav'
		)
		);

		register_nav_menus(
		array(
		'footer_menu'=>'Footer Nav'
		)
		);
	}



	
?>