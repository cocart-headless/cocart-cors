<?php
/*
 * Plugin Name: CoCart CORS Support
 * Plugin URI:  https://cocartapi.com
 * Description: Enables support for CORS to allow CoCart API to work across multiple domains.
 * Author:      CoCart Headless, LLC
 * Author URI:  https://cocartapi.com
 * Version:     1.0.7
 * Text Domain: cocart-cors
 * Requires at least: 5.6
 * Requires PHP: 7.4
 * Requires Plugins: cart-rest-api-for-woocommerce
 * CoCart requires at least: 4.2
 * CoCart tested up to: 4.3
 *
 * @package CoCart CORS
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
