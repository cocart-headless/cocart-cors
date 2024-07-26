<?php
/**
 * CoCart CORS core setup.
 *
 * @author  Sébastien Dumont
 * @package CoCart CORS
 * @license GPL-2.0+
 */

namespace CoCart\Cors;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main CoCart CORS class.
 *
 * @class CoCart\Cors\Plugin
 */
final class Plugin {

	/**
	 * Plugin Version
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @var string
	 */
	public static $version = '1.0.7';

	/**
	 * Initiate CoCart CORS.
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function init() {
		// Enables all cross origin headers.
		add_filter( 'cocart_disable_all_cors', function () {
			return false;
		} );

		// Filters the session cookie to allow CoCart to work across multiple domains.
		if ( defined( 'COCART_VERSION' ) && version_compare( COCART_VERSION, '5.0.0', '<' ) ) {
			add_filter( 'cocart_cookie_samesite', function () {
				if ( is_ssl() ) {
					return 'None; Secure';
				} else {
					return 'None';
				}
			});
		}
	} // END init()

	/**
	 * Return the name of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'CoCart CORS Support';
	} // END get_name()

	/**
	 * Return the version of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_version() {
		return self::$version;
	} // END get_version()

	/**
	 * Return the path to the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_path() {
		return dirname( __DIR__ );
	} // END get_path()
} // END class
