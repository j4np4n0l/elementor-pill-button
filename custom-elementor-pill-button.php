<?php
/**
 * Plugin Name: Custom Elementor Pill Button Widget
 * Description: A lightweight custom pill button widget for Elementor using the pill-btn class.
 * Version: 1.0.0
 * Author: Jan Panol
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register widget with Elementor
 */
add_action( 'elementor/widgets/register', function( $widgets_manager ) {

	// Include the widget class file right here when Elementor is initializing widgets
	$widget_file = plugin_dir_path( __FILE__ ) . 'widget.php';
	if ( file_exists( $widget_file ) ) {
		require_once $widget_file;
	}

	// Register the widget class
	if ( class_exists( 'Custom_Pill_Button_Widget' ) ) {
		$widgets_manager->register( new \Custom_Pill_Button_Widget() );
	}
});