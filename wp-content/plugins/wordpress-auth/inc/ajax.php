<?php

// for login
function wp_auth_do_login()
{
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);
    $validateResult = wp_auth_validate_email_and_password($user_email, $user_password);
    if (!$validateResult['is_valid']) {

        wp_send_json([
            'success' => false,
            'message' => $validateResult['message']
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

    if (is_wp_error($loginResult)) {
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

// validate login form
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

// for register
function wp_auth_do_register()
{

    // get required info
    $first_name = sanitize_text_field($_POST['user_name']);
    $last_name = sanitize_text_field($_POST['family']);
    $user_email = sanitize_text_field($_POST['user_email']);
    $user_password = sanitize_text_field($_POST['user_password']);

    // validate
    $validateResult = wp_validate_register_request($first_name, $last_name, $user_email, $user_password);
    if (!$validateResult['is_valid']) {
        wp_send_json([
            'success' => false,
            'message' => $validateResult['message']
        ], 422);
    }



    // create user login value
    $userLogin = explode('@',$user_email);
    // create new user
    $newUser = wp_insert_user([
        'user_login' => apply_filters('pre_user_login', $userLogin[0].rand(1000,9999)),
        'user_pass' => apply_filters('pre_user_pass', $user_password),
        'user_email' => apply_filters('pre_user_email', $user_email),
        'first_name' => apply_filters('pre_user_first_name', $first_name),
        'last_name' => apply_filters('pre_user_last_name', $last_name),
        'display_name' => apply_filters('pre_user_display_name'," {$first_name} {$last_name}"),
    ]);
    // check created new user
    //// return failed
    if(is_wp_error($newUser)){
        wp_send_json([
            'success' => false,
            'message' => 'خطایی در ثبت نام رخ داده',
        ], 500);
    }
    //// return success
    wp_send_json([
        'success' => true,
        'message' => 'ثبت نام با موفقیت انجام شد',
    ], 200);
}

// validate register form
function wp_validate_register_request($first_name, $last_name, $user_email, $user_password)
{
    $result = [
        'is_valid' => true,
        'message' => "",
    ];

    if (empty($first_name) || empty($last_name) || empty($user_email) || empty($user_password)) {

        $result['is_valid'] = false;
        $result['message'] = 'تمامی فیلد ها الزامی می باشد';
        return $result;
    }
    if (!is_email($user_email)) {
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل وارد شده معتبر نمی باشد';
        return $result;
    }

    if (email_exists($user_email)) {
        $result['is_valid'] = false;
        $result['message'] = 'ایمیل وارد شده در دسترس نمی باشد';
        return $result;
    }

    return $result;
}

// actions
add_action('wp_ajax_nopriv_wp_auth_register', 'wp_auth_do_register');
add_action('wp_ajax_nopriv_wp_auth_login', 'wp_auth_do_login');