<?php
/*
 * Plugin Name: CoCart CORS
 * Plugin URI:  https://cocart.xyz
 * Description: Simply filters the session cookie to allow CoCart to work across multiple domains.
 * Author:      Sébastien Dumont
 * Author URI:  https://sebastiendumont.com
 * Version:     1.0.1
 * Text Domain: cocart-cors
 * Domain Path: /languages/
 * Requires at least: 5.4
 * Requires PHP: 7.3
 * WC requires at least: 4.3
 * WC tested up to: 6.3
 *
 * @package CoCart CORS
 */

defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.0', '<' ) ) {
	return;
}

if ( ! defined( 'COCART_CORS_FILE' ) ) {
	define( 'COCART_CORS_FILE', __FILE__ );
}

// Include the main CoCart CORS class.
if ( ! class_exists( 'CoCart_CORS', false ) ) {
	include_once( untrailingslashit( plugin_dir_path( COCART_CORS_FILE ) ) . '/includes/class-cocart-cors.php' );
}

/**
 * Returns the main instance of CoCart_CORS and only runs if it does not already exists.
 *
 * @return CoCart_CORS
 */
if ( ! function_exists( 'CoCart_CORS' ) ) {
	function CoCart_CORS() {
		return CoCart_CORS::init();
	}

	CoCart_CORS();
}
