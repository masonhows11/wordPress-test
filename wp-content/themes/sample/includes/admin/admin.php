<?php
add_action('admin_menu','sample_admin_menu');
add_action('admin_enqueue_scripts','sample_add_media_uploader');
function sample_admin_menu(){

    add_menu_page('تنظیمات قالب',
        'تنظیمات قالب',
        'manage_options',
        'sample_options',
        'sample_page_content');

}

function sample_page_content(){

    include SAMPLE_PATH."/parts/admin/menus.php";
}
function sample_add_media_uploader(){

    // load all css js assets for upload media scripts
    wp_enqueue_media();
    // only use script
    wp_enqueue_script('sample-admin-scripts',SAMPLE_URL."/assets/js/admin.js",['jquery'],false,true);
}