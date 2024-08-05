<?php
// create custom widget
class CustomWidget extends WP_Widget{

        public function __construct()
        {
            parent::__construct(false,'Custom Widget','');
        }

        // create default widget function
        // displaying the output on the site
        // like login form or countdown online users
        function widget($args, $instance)
        {}

        // for display setting in admin section
        // like config title
        function form( $instance ) {
            return '';
        }

        // To apply new settings in the admin section
        function update( $new_instance, $old_instance ) {}
    }

function register_custom_widget(){
    // the value for  register_widget is name of widget class
    register_widget('CustomWidget');
}
// for register widget
add_action('widgets_init','register_custom_widget');
