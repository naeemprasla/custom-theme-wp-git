<?php
// Adds widget: Contact  Info
class Contactinfo_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'contactinfo_widget',
            esc_html__('Contact  Info', 'wpb-custom-theme'),
            array('description' => esc_html__('Contact Info', 'wpb-custom-theme'),) // Args
        );
    }

    private $widget_fields = array();

    public function widget($args, $instance)
    {

        $output = null;
        $output .= $args['before_widget'];

        if (!empty($instance['title'])) {
            $output .=  $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $phone = get_theme_mod('phone_text_setting');
        $faxnumb = get_theme_mod('fax_text_setting');
        $emailaddr = get_theme_mod('emailid_text_setting');
        $address = get_theme_mod('address_text_setting');
        $gmaplink = get_theme_mod('map_url_setting');


        $output .= '<div class="contact-info">';
        if (!empty($phone)) {
            $output .= '<p><a href="tel:' . $phone . '"><i class="fal fa-phone"></i> ' . $phone . '</a></p>';
        }

        if (!empty($faxnumb)) {
            $output .= '<p><a href="fax:' . $faxnumb . '"><i class="fal fa-fax"></i> ' . $faxnumb . ' </a></p>';
        }

        if(!empty( $emailaddr)){
            $output .= '<p><a href="mailto:' .  $emailaddr . '"><i class="fal fa-envelope"></i> ' .  $emailaddr . ' </a></p>';
        }

        if (!empty($address)) {
            $output .= '<p><a href="' . $gmaplink . '" target="_blank"><i class="fal fa-map"></i> ' . $address . '</a></p>';
        }


        $output .= '</div>';


        $output .=  $args['after_widget'];

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

function register_contactinfo_widget()
{
    register_widget('Contactinfo_Widget');
}
add_action('widgets_init', 'register_contactinfo_widget');
