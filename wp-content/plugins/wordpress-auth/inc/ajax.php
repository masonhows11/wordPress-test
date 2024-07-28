<?php

function wp_auth_do_login()
{

//    var_dump($_POST);
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);
    var_dump($user_email,$user_password);
}

add_action('wp_ajax_nopriv_wp_auth_login', 'wp_auth_do_login');
