<?php
/*
Plugin Name: wordPress Apis
Plugin URI: http://websolor.ir/
Description: A wordPress plugin to work with apis
Author: Naeem Soltany
Text Domain: shortcodes test
Version: 1.0.0
Author URI: http://websolor.ir/
*/

define('WP_APIS_DIR', plugin_dir_path(__FILE__));
define('WP_APIS_URL', plugin_dir_url(__FILE__));
define('WP_APIS_INC',WP_APIS_DIR.'/inc/');
define('WP_APIS_TPL',WP_APIS_DIR.'/template/');

register_activation_hook(__FILE__,'wp_apis_plugin_activation');
register_deactivation_hook(__FILE__,'wp_apis_plugin_deactivation');

// we just can add role & cap in plugin activation status
// its important
// very important
function wp_apis_plugin_activation()
{

        add_role('shop_manager','Shop Manager',[
           'read' => true,
            'edit_posts' => true,
            'remove_products' => true
        ]);

        $role = get_role('administrator');
        $role->add_cap('remove_products');

}

function wp_apis_plugin_deactivation()
{

}


if(is_admin()){
    include WP_APIS_INC.'admin/metaboxes.php';
    include WP_APIS_INC.'admin/menus.php';
}

// for register styles & scripts in wordpress for front section
add_action('wp_enqueue_scripts','wp_apis_register_styles');


// for register styles & scripts in wordpress for admin section
add_action('admin_enqueue_scripts','wp_apis_register_styles');

function wp_apis_register_styles(){

    // register styles
    wp_register_style('wp-apis-main-style',WP_APIS_URL.'assets/css/main.css');
    // call the register style file
    wp_enqueue_style('wp-apis-main-style');

    // add  condition for load admin-main scripts only in admin section
    if(is_admin()){
        // register scripts
        wp_register_script('wp-apis-main-script',WP_APIS_URL.'assets/js/admin-main.js');
        // call the register scripts file
        wp_enqueue_script('wp-apis-main-script');
    }else{
        // register scripts
        wp_register_script('wp-apis-main-script',WP_APIS_URL.'assets/js/main.js');
        // call the register scripts file
        wp_enqueue_script('wp-apis-main-script');
    }



}