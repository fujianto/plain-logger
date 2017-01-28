<?php
/**
 * Plugin Name: Plain logger
 * Plugin URI:  https://github.com/fujianto/plain-logger
 * Description: Easily log any event on your WordPress site to text file. When simple echo and var_dump just won't do.
 * Version:     1.0.0
 * Author:      Septian Ahmad Fujianto
 * Author URI:  http://septianfujianto.com
 * @package    plainLogger
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
$extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $extension_dir ) );

if (!defined('PLAIN_LOGGER_DIR')) {
	define('PLAIN_LOGGER_DIR'     , $extension_dir);
}

if (!defined('PLAIN_LOGGER_DIR_URI')) {
	define('PLAIN_LOGGER_DIR_URI'     , $extension_url);
}

// For each version release, the priority needs to decrement by 1. This is so that
// we can load newer versions earlier than older versions when there's a conflict.
add_action( 'init', 'plain_logger_100', 9999 );

if (!function_exists( 'plain_logger_100' ) ) {
	/**
	 * Loader function.  Note to change the name of this function to use the
	 * current version number of the plugin.  `1.0.0` is `100`, `1.3.4` = `134`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	function plain_logger_100() {
		// If not in the admin, bail.
		if ( ! is_admin() )
			return;

		// If plugin hasn't been loaded, let's load it.
		if ( ! defined( 'PLAIN_LOGGER_LOADED' ) ) {
			define( 'PLAIN_LOGGER_LOADED', true );

			// inc
			require_once( PLAIN_LOGGER_DIR . 'inc/interface-logger.php' );
			require_once( PLAIN_LOGGER_DIR . 'inc/class-log-to-file.php' );
			require_once( PLAIN_LOGGER_DIR . 'inc/class-log-to-db.php' );

			require_once( PLAIN_LOGGER_DIR . 'class-plain-logger.php' );
		}
	}

	function load_setting_page() {
		require_once( PLAIN_LOGGER_DIR . 'admin/admin-init.php' );
	}

	add_action('plugins_loaded', 'load_setting_page');

	add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'plain_logger_action_links' );

	function plain_logger_action_links( $links ) {
		$links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=plainLogger') ) .'">'.__('Settings' , 'plainLogger').'</a>';
		// $links[] = '<a href="http://septianfujianto.com" target="_blank">More by Fujianto</a>';

		return $links;
	}
}