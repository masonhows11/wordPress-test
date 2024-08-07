<?php
// define const
define('CLAB_URL', get_template_directory_uri().'/');
define('CLAB_PATH', get_template_directory().DIRECTORY_SEPARATOR);
const CLAB_APP = CLAB_PATH . 'app' . DIRECTORY_SEPARATOR ;


//
add_action('after_theme_setup','clab_setup');
function clab_setup(){

}

if(is_admin()){
    include CLAB_APP . 'admin/admin.php';
}
include CLAB_APP . 'user/user.php';