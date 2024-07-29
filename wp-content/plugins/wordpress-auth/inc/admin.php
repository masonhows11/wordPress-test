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

    // save settings value
    if(isset($_POST['submit'])){

    }

     // show setting view
    include WP_AUTH_TPL . "admin/settings.php";
}