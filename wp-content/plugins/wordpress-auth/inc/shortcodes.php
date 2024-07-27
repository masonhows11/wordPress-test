<?php
function wp_auth_login_handler($atts, $content = null)
{

    ob_start();
    include WP_AUTH_TPL . "front/login.php";
    return ob_get_clean();
}
function wp_auth_register_handler($atts, $content = null)
{
    ob_start();
    include WP_AUTH_TPL . "front/register.php";
    return ob_get_clean();
}
add_shortcode('wp_auth_login', 'wp_auth_login_handler');
add_shortcode('wp_auth_register', 'wp_auth_register_handler');
