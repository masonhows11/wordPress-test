<?php

function wp_auth_do_login()
{
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);
    $validate_result = wp_auth_validate_email_and_password($user_email, $user_password);
    if (!$validate_result['is_valid']) {

        wp_send_json([
            'success' => false,
            'message' => $validate_result['message']
        ], 403);

    }

    $user = wp_authenticate_email_password(null, $user_email, $user_password);
    if (is_wp_error($user)) {
        wp_send_json([
            'success' => false,
            'message' => 'کاربری با این مشحصات در سیستم یافت نشد',
        ], 403);
    }

    $loginResult = wp_signon([
        'user_login' => $user->user_login,
        'user_password' => $user_password,
        'remember' => false
    ]);

    if(is_wp_error($loginResult)){
        wp_send_json([
            'success' => false,
            'message' => 'خطایی در ورود به سایت رخ داده',
        ], 403);
    };

    wp_send_json([
        'success' => true,
        'message' => 'ورود با موفقیت انجام شد',
    ], 200);
}

add_action('wp_ajax_nopriv_wp_auth_login', 'wp_auth_do_login');

function wp_auth_validate_email_and_password($email, $password)
{

    $result = [
        'is_valid' => true,
        'message' => "",
    ];

    if (empty($email)) {
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل نمی تواند خالی باشد';
        return $result;
    }

    if (empty($password)) {
        $result['is_valid'] = false;
        $result['message'] = 'رمز عبور نمی تواند خالی باشد';
        return $result;
    }

    if (!is_email($email)) {
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل وارد شده معتبر نمی باشد';
        return $result;
    }

    return $result;
}
