<?php
/**
 * This file is designed to be used to load as package NOT a WP plugin!
 *
 * @version 1.0.4
 * @package CoCart Cors
 */

defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
	return;
}

if ( ! defined( 'COCART_CORS_FILE' ) ) {
	define( 'COCART_CORS_FILE', __FILE__ );
}

// Include the main CoCart CORS class.
if ( ! class_exists( 'CoCart\Cors\Plugin', false ) ) {
	include_once untrailingslashit( plugin_dir_path( COCART_CORS_FILE ) ) . '/includes/class-cocart-cors.php';
}

/**
 * Returns the main instance of cocart_cors and only runs if it does not already exists.
 *
 * @return cocart_cors
 */
if ( ! function_exists( 'cocart_cors' ) ) {
	function cocart_cors() {
		return \CoCart\Cors\Plugin::init();
	}

	add_action( 'plugins_loaded', 'cocart_cors', 0 );
}
