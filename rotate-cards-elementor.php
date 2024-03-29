<?php

/**
 * Plugin Name:       Rotate Cards Widget
 * Description:       Rotate Cards Widget for Elemenor is created by Zain Hassan.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hz-widgets
*/

if(!defined('ABSPATH')){
exit;
}

if ( ! defined( 'RCW_PLUGIN_ASSETS_FILE' ) ) {
	define( 'RCW_PLUGIN_ASSETS_FILE', plugins_url( 'inc/assets/', __FILE__ ) );
}

if(!function_exists('hz_el_category')){
	function hz_el_category( $elements_manager ) {

		$elements_manager->add_category(
			'hz-el-widgets',
			[
				'title' => esc_html__( 'Custom Widgets', 'hz-widgets' ),
				'icon' => 'fa fa-plug',
			]
		);
	
	}
}

add_action( 'elementor/elements/categories_registered', 'hz_el_category' );


function register_hz_rotate_card_widget( $widgets_manager ) {
	require_once( __DIR__ . '/inc/rotate-cards.php' );
	$widgets_manager->register( new \hz_Rotate_Cards );
}
add_action( 'elementor/widgets/register', 'register_hz_rotate_card_widget' );

function hz_register_rcw_scripts() {
	wp_register_style( 'rotate-cards', plugins_url( 'inc/assets/css/rotate-cards.css', __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'hz_register_rcw_scripts' );





