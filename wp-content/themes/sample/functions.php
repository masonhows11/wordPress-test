<?php
// define const
define('SAMPLE_PATH', get_template_directory());
define('SAMPLE_URL', get_template_directory_uri());


add_action('wp_enqueue_scripts', 'add_assets');
function add_assets()
{

    // add styles
    // wp_register_style('main_style', get_template_directory_uri() . '/assets/css/main.css');

    wp_register_style('main_style', SAMPLE_URL . '/assets/css/main.css');
    wp_enqueue_style('main_style');

    // add scripts
    // wp_register_script('main_js', get_template_directory_uri() . '/assets/js/app.js', ['jquery'], false, true);
    wp_register_script('main_js', SAMPLE_URL . '/assets/js/app.js', ['jquery'], false, true);
    wp_enqueue_script('main_js');

}

add_action('after_setup_theme', 'sample_setup_theme');

function sample_setup_theme()
{
    //  add_theme_support() functions
    // for add some feature to our theme
    add_theme_support('post-thumbnails');

    // for set title of page base on page opened
    // like we open new post the title of page
    // is set the title of current post
    add_theme_support('title-tag');
    add_theme_support('post-formats', array('gallery', 'video', 'audio'));

    // for disable admin bar in front end
    add_filter('show_admin_bar', '__return_false');
    // register nav menu means ( location )
    register_nav_menu('top-bar', 'menu for theme top bar');
    register_nav_menu('second-top-bar', 'second menu for theme top bar');
    //// add custom image size
    // hard crop
    // add_image_size('sample-size',500,500,true);
    // soft crop
    add_image_size('sample-size', 650, 650);
}

/**
 * Add a sidebar.
 * widget sidebar
 * for active widgets sidebar in admin section
 * make sidebar like below
 */
function wpdocs_theme_slug_widgets_init()
{
    register_sidebar(array(
        'name' => __('Custom Main Sidebar', 'textdomain'),
        'id' => 'sidebar-1',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'wpdocs_theme_slug_widgets_init');

// for use custom functions file our theme
// we can write any custom code in below file
// and use this
include SAMPLE_PATH . "/includes/frontend/functions.php";
include SAMPLE_PATH . "/includes/frontend/post-types.php";
include SAMPLE_PATH . "/includes/frontend/taxonomies.php";
// we must include our custom widgets file in functions
// for active or display custom widgets
include SAMPLE_PATH . "/includes/widgets.php";
if (is_admin()) {
    include SAMPLE_PATH . "/includes/admin/admin.php";
}
