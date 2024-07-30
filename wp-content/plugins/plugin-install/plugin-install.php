<?php
/*
Plugin Name: Install & Uninstall
Plugin URI: http://websolor.ir/
Description: A sample plugin for installation plugin
Author: Naeem Soltany
Text Domain: pi
Version: 1.0.0
Author URI: http://websolor.ir/
*/




register_activation_hook(__FILE__,'pi_activation');

// for add custom default value into worPress database
function pi_install_default_configs(){

    //// below options save into wp_options default
    ////  table in wordPress database
    $current_configs = get_option('pi_configs');
    if(!$current_configs){
        $default_configs = [
            'amount' => 1000,
            'role' => 'administrator'
        ];
        update_option('pi_configs',$default_configs);
    }

}

// for add custom table into worPress database
function pi_install_db()
{
    global $wpdb;

    // for set dynamic name for table during active plugin
    // prefix like wp or exp before table name
    $customers_table_name = $wpdb->prefix . 'customers';
    // for set dynamic collate for table during active plugin
    $collate = $wpdb->get_charset_collate();
    $customers_table_sql = "
       CREATE TABLE IF NOT EXISTS  `{$customers_table_name}` (
      `id` int NOT NULL,
      `user_id` int NOT NULL,
      `wallet` int NOT NULL,
      `total_orders` int NOT NULL
    ) {$collate};
    ";
    // for run sql query during activate plugin
    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($customers_table_sql);

    //    $customers_table_sql = "
    //        DROP TABLE IF EXISTS `{$customers_table_name}`;
    //       CREATE TABLE `wp_customers` (
    //      `id` int NOT NULL,
    //      `user_id` int NOT NULL,
    //      `wallet` int NOT NULL,
    //      `total_orders` int NOT NULL
    //    ) {$collate};
    //    ";
}

function pi_uninstall(){

    // delete customer able
    global $wpdb;
    $customers_table_name = $wpdb->prefix . 'customers';
    $wpdb->query("DROP TABLE IF EXISTS {$customers_table_name}");
    // delete pi_configs options
    delete_option('pi_configs');


}
function pi_activation()
{
    pi_install_default_configs();
    pi_install_db();

    // for delete default configs
    register_uninstall_hook(__FILE__,'pi_uninstall');
}