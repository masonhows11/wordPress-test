<?php
// define const
define('CLAB_URL', get_template_directory_uri().'/');
define('CLAB_PATH', get_template_directory().DIRECTORY_SEPARATOR);
const CLAB_APP = CLAB_PATH . 'app' . DIRECTORY_SEPARATOR ;

const CLAB_ASSETS_URL = CLAB_URL . 'assets';


//
add_action('after_theme_setup','clab_setup');
function clab_setup(){

    add_theme_support('title-tag');

    add_image_size('blog-index-thumbnail-size', 730, 432);
}

// hide admin bar in front
add_filter('show_admin_bar','__return_false');

if(is_admin()){
    include CLAB_APP . 'admin/admin.php';
}
include CLAB_APP . 'user/user.php';