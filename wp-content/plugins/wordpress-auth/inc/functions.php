<?php

// add styles & scripts

function wp_auth_load_assets(): void
{
    // add styles
    wp_register_style('wp_auth_style',WP_AUTH_URL . 'assets/css/auth.css');
    wp_enqueue_style('wp_auth_style');
    // add scripts
    wp_register_script('wp_auth_scripts',WP_AUTH_URL . 'assets/js/auth.js',['jquery']);
    wp_enqueue_script('wp_auth_scripts');
}

add_action('wp_enqueue_scripts','wp_auth_load_assets');






