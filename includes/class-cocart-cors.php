<?php
/**
 * CoCart CORS core setup.
 *
 * @author   Sébastien Dumont
 * @category Package
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main CoCart CORS class.
 *
 * @class CoCart_CORS
 */
final class CoCart_CORS {

	/**
	 * Plugin Version
	 *
	 * @access public
	 * @static
	 */
	public static $version = '1.0.0';

	/**
	 * Initiate CoCart CORS.
	 *
	 * @access public
	 * @static
	 */
	public static function init() {
		// Update CoCart add-on counter upon activation.
		register_activation_hook( COCART_CORS_FILE, array( __CLASS__, 'activate_addon' ) );

		// Update CoCart add-on counter upon deactivation.
		register_deactivation_hook( COCART_CORS_FILE, array( __CLASS__, 'deactivate_addon' ) );

		// Filters the session cookie to allow CoCart to work across multiple domains.
		add_filter( 'cocart_cookie_samesite', function() {
			return "None; Secure";
		});
	} // END init()

	/**
	 * Return the name of the package.
	 *
	 * @access public
	 * @static
	 * @return string
	 */
	public static function get_name() {
		return 'CoCart CORS';
	}

	/**
	 * Return the version of the package.
	 *
	 * @access public
	 * @static
	 * @return string
	 */
	public static function get_version() {
		return self::$version;
	}

	/**
	 * Return the path to the package.
	 *
	 * @access public
	 * @static
	 * @return string
	 */
	public static function get_path() {
		return dirname( __DIR__ );
	}

	/**
	 * Runs when the plugin is activated.
	 *
	 * Adds plugin to list of installed CoCart add-ons.
	 *
	 * @access public
	 */
	public static function activate_addon() {
		$addons_installed = get_option( 'cocart_addons_installed', array() );

		$plugin = plugin_basename( COCART_CORS_FILE );

		// Check if plugin is already added to list of installed add-ons.
		if ( ! in_array( $plugin, $addons_installed, true ) ) {
			array_push( $addons_installed, $plugin );
			update_option( 'cocart_addons_installed', $addons_installed );
		}
	} // END activate_addon()

	/**
	 * Runs when the plugin is deactivated.
	 *
	 * Removes plugin from list of installed CoCart add-ons.
	 *
	 * @access public
	 */
	public static function deactivate_addon() {
		$addons_installed = get_option( 'cocart_addons_installed', array() );

		$plugin = plugin_basename( COCART_CORS_FILE );

		// Remove plugin from list of installed add-ons.
		if ( in_array( $plugin, $addons_installed, true ) ) {
			$addons_installed = array_diff( $addons_installed, array( $plugin ) );
			update_option( 'cocart_addons_installed', $addons_installed );
		}
	} // END deactivate_addon()

} // END class
