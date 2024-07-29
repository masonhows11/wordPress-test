<?php

function wp_auth_do_login()
{
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);
    $validate_result = wp_auth_validate_email_and_password($user_email,$user_password);
    if(!$validate_result['is_valid']){

        wp_send_json([
            'success' => false,
            'message' => $validate_result['message']
        ],403);

    }
}

add_action('wp_ajax_nopriv_wp_auth_login', 'wp_auth_do_login');

function wp_auth_validate_email_and_password($email,$password){

    $result = [
        'is_valid' => true,
        'message' => "",
    ];

    if(empty($email)){
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل نمی تواند خالی باشد';
        return $result;
    }

    if(empty($password)){
        $result['is_valid'] = false;
        $result['message'] = 'رمز عبور نمی تواند خالی باشد';
        return $result;
    }

    if(!is_email($email)){
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل وارد شده معتبر نمی باشد';
        return $result;
    }

    return $result;
}
