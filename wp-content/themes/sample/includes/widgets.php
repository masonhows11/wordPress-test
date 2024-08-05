<?php
// create custom widget

//class CustomWidget extends WP_Widget{
//
//        public function __construct()
//        {
//            parent::__construct(false,'Custom Widget','');
//        }
//
//        // create default widget function
//        // displaying the output on the site
//        // like login form or countdown online users
//        function widget($args, $instance)
//        {}
//
//        // for display setting in admin section
//        // like config title
//        function form( $instance ) {
//            return '';
//        }
//
//        // To apply new settings in the admin section
//        function update( $new_instance, $old_instance ) {}
//    }
//

//function register_custom_widget(){
//    // the value for  register_widget is name of widget class
//    register_widget('CustomWidget');
//}
//// for register widget
//add_action('widgets_init','register_custom_widget');


// create user information widget
class UserInformationWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('user-information-widget', 'user information');
    }

    // create default widget function
    // displaying the output on the site
    // like login form or countdown online users
    function widget($args, $instance)
    {
        $user = wp_get_current_user();

        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
        //// after 'after_widget' our info displayed
        //
        // echo $user->display_name;
        //
        echo 'hello user';
        //
        echo $args['after_widget'];

        //
        ?>
        <!--        <a href="--><?php //echo home_url() .'/profile';
        ?><!--">تکمیل اطلاعات پروفایل</a>-->
        <!--        --><?php
    }

    // for display setting in admin section
    // like config title
    function form($instance)
    {
        return '';
        //        $title = !empty($instance['title']) ? $instance['title'] : 'New Title';
        //
        ?>
        <!--        <label for="--><?php //echo esc_attr($this->get_field_id('title'))
        ?><!--" ></label>-->
        <!--        --><?php
    }

    // To apply new settings in the admin section
    function update($new_instance, $old_instance)
    {
    }
}

function register_userinfo_widget(): void
{
    // the value for  register_widget is name of widget class
    register_widget('UserInformationWidget');
}

// for register widget
add_action('widgets_init', 'register_userinfo_widget');

