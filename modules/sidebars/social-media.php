<?php

// Adds widget: Social Media
class Socialmedia_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'socialmedia_widget',
            esc_html__('Social Media', 'wpb-custom-theme')
        );
    }

    private $widget_fields = array();

    public function widget($args, $instance)
    {
        $output  = null;
        $output .= $args['before_widget'];

        if (!empty($instance['title'])) {
            $output .= $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $facebook = get_theme_mod('social_media_fb');
        $twitter = get_theme_mod('social_media_tw');
        $linkedin = get_theme_mod('social_media_ln');
        $instagram = get_theme_mod('social_media_in');
        $youtube = get_theme_mod('social_media_yt');

        $output .= '<div class="social-media">';
        if (!empty($facebook)) {
            $output .= '<a href="' . $facebook . '" target="_blank"><i class="fab fa-facebook"></i></a>';
        }
        if (!empty($twitter)) {
            $output .= '<a href="' . $twitter . '" target="_blank"><i class="fab fa-twitter"></i></a>';
        }
        if (!empty($linkedin)) {
            $output .= '<a href="' . $linkedin . '" target="_blank"><i class="fab fa-linkedin"></i></a>';
        }
        if (!empty($instagram)) {
            $output .= '<a href="' . $instagram . '" target="_blank"><i class="fab fa-instagram"></i></a>';
        }
        if (!empty($youtube)) {
            $output .= '<a href="' . $youtube . '" target="_blank"><i class="fab fa-youtube"></i></a>';
        }
        $output .= '</div>';


        $output .= $args['after_widget'];

        echo $output;
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'wpb-custom-theme');
            switch ($widget_field['type']) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'wpb-custom-theme') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'wpb-custom-theme');
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'wpb-custom-theme'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
<?php
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_socialmedia_widget()
{
    register_widget('Socialmedia_Widget');
}
add_action('widgets_init', 'register_socialmedia_widget');
