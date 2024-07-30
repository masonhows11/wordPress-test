<?php
add_action('admin_menu','wp_auth_admin_settings');
function wp_auth_admin_settings(){
    add_menu_page('ورود و ثبت نام',
        'ورود و ثبت نام',
        'manage_options',
        'wp_auth',
        'wp_auth_settings');
}
function wp_auth_settings(){
    $wp_auth_options = get_option('wp_auth_options',[]);
    // save settings value
    if(isset($_POST['saveData'])){
        $wp_auth_options['is_login_active'] =
            isset($_POST['is_login_active']);
        $wp_auth_options['is_register_active'] =
            isset($_POST['is_register_active']);
        $wp_auth_options['login_title_form'] =
            sanitize_text_field($_POST['login_title_form']);
        $wp_auth_options['register_title_form'] =
            sanitize_text_field($_POST['register_title_form']);
        update_option('wp_auth_options',$wp_auth_options);
    }
     // show setting view
    include WP_AUTH_TPL . "admin/settings.php";
}