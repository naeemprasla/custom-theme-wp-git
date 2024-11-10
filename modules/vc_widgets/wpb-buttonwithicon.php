<?php 

// Create Shortcode button_with_icon_sc
// Use the shortcode: [button_with_icon_sc icon_image="" button_label="" button_link="" Custom_class=""]
function create_buttonwithiconsc_shortcode($atts) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'icon_image' => '',
			'button_label' => '',
			'button_link' => '',
			'custom_class' => '',
		),
		$atts,
		'button_with_icon_sc'
	);
	// Attributes in var
	$icon_image = $atts['icon_image'];
	$button_label = $atts['button_label'];
	$button_link = $atts['button_link'];
	$custom_class = $atts['custom_class'];

		
	if(!empty($button_link)){
		$href = null;
        if ($button_link !== '') {
            $href = vc_build_link($button_link);
        }
		$button = 'a href="'.$href['url'].'" target="'.$href['target'].'" rel="'.$href['rel'].'" title="'.$href['title'].'" ';
		
	}
	else{
		$button = 'button';
	}
	// Output Code
	$output .= '<div class="button-wrapper parallax-medium">
		<'.$button.' class="btn '.$custom_class.'" >'.$button_label.'  </'.$button.'>
		<div class="button_icon">
			<img src="'.wp_get_attachment_url( $icon_image ).'" />
		</div>
	</div>';

	return $output;
}
add_shortcode( 'button_with_icon_sc', 'create_buttonwithiconsc_shortcode' );

// Create Button With Icon element for Visual Composer
add_action( 'vc_before_init', 'buttonwithiconsc_integrateWithVC' );
function buttonwithiconsc_integrateWithVC() {
	vc_map( array(
		'name' => __( 'Button With Icon', 'textdomain' ),
		'base' => 'button_with_icon_sc',
		'class' => 'button_with_icon_cls',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'textdomain'),
		'params' => array(
			array(
				'type' => 'attach_image',
				
				'admin_label' => false,
				'heading' => __( 'Icon/Image', 'textdomain' ),
				'param_name' => 'icon_image',
			),
			array(
				'type' => 'textfield',
				
				'admin_label' => false,
				'heading' => __( 'Button Label', 'textdomain' ),
				'param_name' => 'button_label',
			),
			array(
				'type' => 'vc_link',
				
				'admin_label' => false,
				'heading' => __( 'Button Link', 'textdomain' ),
				'param_name' => 'button_link',
			),
			array(
				'type' => 'textfield',
				
				'admin_label' => false,
				'heading' => __( 'Class', 'textdomain' ),
				'param_name' => 'custom_class',
			),
		)
	) );
}