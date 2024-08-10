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
        parent::__construct('user-information-widget', 'custom user information');
    }

    // create default widget function
    // displaying the output on the site
    // like login form or countdown online users
    function widget($args, $instance): void
    {
        $user = wp_get_current_user();
        //  $title = apply_filters('widget_title', $instance['title']);
        $blog_title = get_bloginfo('name');
        echo $args['before_widget'] . $args['before_title'] . $instance['title'] . $args['after_title'];
        // start display info
        ?>
        <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>
        <p><strong>User:</strong><?php echo $user->display_name ?></p>
        <?php
        // end display info
        echo $args['after_widget'];
    }

    // for display setting in admin section
    // like config title
    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">عنوان ابزارک:</label>
        <input type="text" id="<?php echo $this->get_field_id('title'); ?>"
               name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>"/>
        </p><?php
    }

    // To apply new settings in the admin section
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
}

function register_userinfo_widget(): void
{
    // the value for  register_widget is name of widget class
    register_widget('UserInformationWidget');
}

// for register widget
add_action('widgets_init', 'register_userinfo_widget');

