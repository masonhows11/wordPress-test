<?php
// actions
add_action('admin_menu', 'wp_apis_registers_menus');


// functions
function wp_apis_registers_menus()
{

    /*add_menu_page
    ('تنظیمات پلاگین',
        'تنظبمات پلاگین',
        'manage_options',
        'wp_apis_admin',
        'wp_apis_main_menu_handler');*/


    /*  add_submenu_page(
          'wp_apis_admin',
          'عمومی',
          'عمومی',
          'manage_options',
          'wp_apis_general',
          'wp_apis_general_page'
      );*/

    add_menu_page
    ('پلاگین سفارشی',
        'پلاگین سفارشی',
        'manage_options',
        'wp_apis_admin',
        'wp_apis_main_menu_handler');


    add_submenu_page(
        'wp_apis_admin',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'wp_apis_general',
        'wp_apis_general_page'
    );

    add_submenu_page(
        'wp_apis_admin',
        'کاربران',
        'کاربران',
        'manage_options',
        'wp_apis_users',
        'wp_apis_users_page'
    );
}

function wp_apis_general_page()
{
    $user_data = [
        'fname' => 'joe',
        'lname' => 'james'
    ];


    if (isset($_POST['saveSetting'])) {

        //// option apis for save permanently data in database
        //// in wp_options table
        /// wp is prefix is optional prefix
        /// add_option('test', 1);

        //  $is_active_plugin = isset($_POST['is_active_plugin']) ? 1 : 0;
        //  add_option('wp_apis_is_active', $is_active_plugin);

        //// option apis for save permanently data in database
        //// in wp_options table
        /// wp is prefix is optional prefix
        /// update_option for update an option in database
        // $is_active_plugin = isset($_POST['is_active_plugin']) ? 1 : 0;
        // update_option('wp_apis_is_active', $is_active_plugin);

        //// option apis for save permanently data in database
        //// in wp_options table
        /// wp is prefix is optional prefix
        /// delete_option for delete an option in database
        if (isset($_POST['is_active_plugin'])) {
            update_option('wp_apis_is_active', 1);
        } else {
            delete_option('wp_apis_is_active', 0);
        }

    }

    $current_plugin_option = get_option('wp_apis_is_active');
    include WP_APIS_TPL . 'admin/menus/general.php';
}

function wp_apis_main_menu_handler()
{
    // echo '<h1>Hello WP Admin Apis</h1>';
    //    $user_data = [
    //        'fname' =>'joe',
    //        'lname' => 'james'
    //    ];

    global $wpdb;

    $action = isset($_GET['action']);
    // for delete item from database
    if ($action == "delete") {
        $item = null;
        if (isset($_GET['item'])) {
            $item = intval($_GET['item']);
        };
        if ($item > 0) {
            $wpdb->delete($wpdb->prefix . 'sample', ['id' => $item]);
        }

    }
    if ($action == "add") {

        if (isset($_POST['saveData'])) {

            $wpdb->insert($wpdb->prefix . 'sample', [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'mobile' => $_POST['mobile']
            ]);
        }

        include WP_APIS_TPL . 'admin/menus/add.php';

    } else {
        $samples = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}sample");
        include WP_APIS_TPL . 'admin/menus/main.php';
    }

}

function wp_apis_users_page()
{

    //    $pass = wp_generate_password(10);
    //    wp_create_user("naeem",$pass,"mason.hows12@gmail.com");

    global $wpdb;
    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $userID = intval($_GET['id']);
        if (isset($_POST['editData'])) {

            $mobile = $_POST['mobile'];
            $wallet = $_POST['wallet'];

            if (!empty($mobile)) {

                update_user_meta($userID, 'mobile', $mobile);
            }
            if (!empty($wallet)) {

                update_user_meta($userID, 'wallet', $wallet);
            }
        }

        $mobile = get_user_meta($userID, 'mobile', true);
        $wallet = get_user_meta($userID, 'wallet', true);
        include WP_APIS_TPL . 'admin/menus/users/edit.php';
        return;
    }
    if (isset($_GET['action']) && $_GET['action'] == 'deleteMobileWallet')
    {

        $userID = intval($_GET['id']);
        delete_user_meta($userID,'mobile');
        delete_user_meta($userID,'wallet');


    }
    $users = $wpdb->get_results("SELECT ID,user_email,display_name FROM {$wpdb->users}");
    include WP_APIS_TPL . 'admin/menus/users/users.php';
}


