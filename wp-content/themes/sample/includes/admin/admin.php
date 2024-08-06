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

// for custom upload file
// from parts/admin/menus.php page
function sample_page_content(){

    if(isset($_POST['upload'])){

        // get file info
        $file = $_FILES['uploadFile'];
        // return file dir info
        $uploadPath = wp_upload_dir();
        // for save file to permanent dir
        $file_path  = $uploadPath['basedir']."/my_upload_files\/";
        // create dir
        if(!file_exists($file_path)){
            wp_mkdir_p($file_path);
        }
        // create new file name
        $file_name_part = explode('.',$file['name']);
        $new_file_name = 'file'.rand(10000,90000).'.'.end($file_name_part);
        // final upload file
        move_uploaded_file($file['tmp_name'],$file_path . $new_file_name);

    }
    include SAMPLE_PATH."/parts/admin/menus.php";
}
function sample_add_media_uploader(){

    // load all css js assets for upload media scripts
    wp_enqueue_media();
    // only use script
    wp_enqueue_script('sample-admin-scripts',SAMPLE_URL."/assets/js/admin.js",['jquery'],false,true);
}