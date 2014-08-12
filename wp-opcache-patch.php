<?php
/*
 * Plugin Name: WP OPcache Patch
 * Plugin URI: http://www.extendwings.com
 * Description: Improve OPcache compatibility with WordPress
 * Version: 0.1.0
 * Author: Daisuke Takahashi(Extend Wings)
 * Author URI: http://www.extendwings.com
 * License: AGPLv3 or later
 * Text Domain: wp-opcache-patch
 * Domain Path: /languages/
*/


if(!function_exists('add_action')) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

add_action('init', array('OPcache_patch', 'init'));
OPcache_patch::necessity_chk();

class OPcache_patch {
	static $instance;

	const VERSION = '0.1.0';

	static function init() {
		if(!self::$instance) {
			if(did_action('plugins_loaded'))
				self::plugin_textdomain();
			else
				add_action('plugins_loaded', array(__CLASS__, 'plugin_textdomain'));

			self::$instance = new OPcache_patch;
		}
		return self::$instance;
	}

	private function __construct() {
		add_action('upgrader_process_complete', array(&$this, 'version_up_reset'), 10, 2);
	}

	function version_up_reset() {
		opcache_reset();

		$hook_extra =  array(
			'action' => 'update',
			'type' => 'core',
			'bulk' => true,
		);

		if(func_num_args() >= 2)
			$hook_extra = array_merge($hook_extra, func_get_arg(1));

		trigger_error("[WP OPcache Patch] Your WordPress is successfully updated! Detail:\n".var_export($hook_extra, true), E_USER_NOTICE);
	}

	static function plugin_textdomain() {
		load_plugin_textdomain('wp-opcache-patch', false, dirname(plugin_basename(__FILE__)) . '/languages/');
	}

	static function necessity_chk() {
		require_once(ABSPATH.'wp-admin/includes/plugin.php');
		if(is_plugin_active('opcache/opcache.php') || (is_multisite() && is_plugin_active_for_network('opcache/opcache.php'))) {
			deactivate_plugins(__FILE__);
			trigger_error("[WP OPcache Patch] 'OPcache dashboard' is already installed. It includes this patch!", E_USER_NOTICE);
		}
	}
}
