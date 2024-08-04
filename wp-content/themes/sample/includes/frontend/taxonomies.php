<?php

// for add custom taxonomy
add_action('init','register_recipe_taxonomy');
function register_recipe_taxonomy(){

    $args = array(
        'label'        => __( 'type', 'textdomain' ),
        'public'       => true,
        'rewrite'      => true,
        'hierarchical' => false
    );

    register_taxonomy( 'type', 'recipe', $args );

}