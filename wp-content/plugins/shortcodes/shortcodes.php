<?php


/*
Plugin Name: تست shortcodes در وردپرس
Plugin URI: http://websolor.ir/
Description: یک افزونه ساده برای فیلتر سازی محتوای وردپرس
Author: Naeem soltany
Text Domain: shortcodes test
Version: 1.0.0
Author URI: http://websolor.ir/
*/


function login_shortcode(){

    return '<h4> wordpress login page</h4>';

}

add_shortcode('login','login_shortcode');







