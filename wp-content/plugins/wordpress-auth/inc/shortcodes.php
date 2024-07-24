<?php
function wp_auth_login_handler($attr,$content = null)
{

}
function wp_auth_register_handler($attr,$content = null){

}
add_shortcode('wp_auth_login','wp_auth_login_handler');
add_shortcode('wp_auth_register','wp_auth_register_handler');