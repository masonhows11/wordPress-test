<?php
/*
Plugin Name: composer in wordpress
Plugin URI: http://websolor.ir/
Description: استفاده از کامپوزر در وردپرس
Author: Naeem soltany
Text Domain: composer in wp
Version: 1.0.0
Author URI: http://websolor.ir/
*/

// for load autoload class
// load required class
define('PHP_COMPOSER_ROOT',plugin_dir_path(__FILE__));
require PHP_COMPOSER_ROOT . 'vendor/autoload.php';