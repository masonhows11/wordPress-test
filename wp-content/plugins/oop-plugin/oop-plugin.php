<?php

/*
Plugin Name: oop plugin test
Plugin URI: http://websolor.ir/
Description: یک افزونه شی گرایی وردپرس
Author: Naeem soltany
Text Domain: oop test
Version: 1.0.0
Author URI: http://websolor.ir/
*/

class OOP_Plugin{

    public function __construct()
    {
        $this->Constants();
        $this->init();
    }
    public function Constants()
    {
        // get dir path
        define('OOP_DIR',plugin_dir_path(__FILE__));
        // get url path
        define('OOP_URL',plugin_dir_url(__FILE__));
    }
    public function init()
    {
        register_activation_hook(__FILE__,[$this,'activation']);
        register_deactivation_hook(__FILE__, [$this,'deactivation']);
        add_action('wp_enqueue_scripts',[$this,'register_assets']);
        $this->load_pages();
    }

    public function activation()
    {
        
    }

    public function deactivation()
    {
        
    }

    public function register_assets()
    {
        wp_register_style('oop_custom_css',OOP_URL.'assets/css/custom.css');
        wp_enqueue_style('oop_custom_css');
    }
    public function load_pages()
    {
        include 'pages/users.class.php';
        include 'pages/foods.class.php';
        new Users;
        new Foods;
    }


}

new OOP_Plugin;