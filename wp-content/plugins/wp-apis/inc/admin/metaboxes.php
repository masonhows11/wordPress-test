<?php

function wp_apis_price_meta_box_handler($post)
{


    // echo '<h1>hello</h1>';
    // get meta data value from database
    $post_meta_price = get_post_meta($post->ID,'wp_apis_price',true);
    // for use html code do like below
    ?>
    <label for="wp_apis_post_price">قیمت مقاله</label>
    <input type="text" id="wp_apis_post_price" name="wp_apis_post_price" value="<?php echo $post_meta_price?>">
    <?php
}


function wp_apis_add_price_meta_box($post_type, $post)
{

    add_meta_box(
        'wp-apis_price_meta_box',
        'قیمت مطلب',
        'wp_apis_price_meta_box_handler',
        'post',
        'normal',
        'default'
    );

}
function wp_apis_save_price_meta_box($post_id)
{
    if(isset($_POST['wp_apis_post_price'])){
        // method for save value meta box post in database
        update_post_meta($post_id,'wp_apis_price',$_POST['wp_apis_post_price']);
        // add_post_meta
        // delete_post_meta
    }
}

add_action('add_meta_boxes', 'wp_apis_add_price_meta_box', 10, 2);
// an action for save value meta box post in database
add_action('save_post','wp_apis_save_price_meta_box');