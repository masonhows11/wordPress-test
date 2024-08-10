<?php
// handle ajax with an action
// 'calculate_operation' is action name define in ajax request data
// in ajax jquery scripts in admin-main.js file
// and concat it with 'wp_ajax' keyword
add_action('wp_ajax_calculate_operation','wp_api_handle_ajax_operation');
function wp_api_handle_ajax_operation(){

    $number_one = $_POST['numberOne'];
    $number_two = $_POST['numberTwo'];

    // get current user in wp
    $current_user = wp_get_current_user();

    // make response ajax in wp
    wp_send_json([
        'success' => true,
        'result' => $number_one + $number_two,
        'ID' => $current_user->ID,
    ]);
}