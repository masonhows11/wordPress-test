<?php
/*
Plugin Name: wordPress Auth Sys
Plugin URI: http://websolor.ir/
Description: A wordPress Auth plugin
Author: Naeem Soltany
Text Domain: new wordPress auth system
Version: 1.0.0
Author URI: http://websolor.ir/
*/
define('WP_AUTH_DIR', plugin_dir_path(__FILE__));
define('WP_AUTH_URL', plugin_dir_url(__FILE__));
//
define('WP_AUTH_INC', WP_AUTH_DIR . '/inc/');
define('WP_AUTH_TPL', WP_AUTH_DIR . '/template/');
//

include WP_AUTH_INC . "functions.php";
include WP_AUTH_INC . "shortcodes.php";
include WP_AUTH_INC . "ajax.php";
// for file just for admin section
if (is_admin()) {
    include WP_AUTH_INC . "admin.php";
}