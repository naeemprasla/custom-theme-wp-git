<?php
// Create Shortcode apollo_services_sc
// Use the shortcode: [apollo_services_sc post_per_pas="" custom_class=""]
function create_apolloservicessc_shortcode($atts) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'post_per_page' => '',
			'custom_class' => '',
		),
		$atts,
		'apollo_services_sc'
	);
	// Attributes in var
	$post_per_page = $atts['post_per_page'];
	$custom_class = $atts['custom_class'];

    $loop = new WP_Query( array(
        'post_type' => 'services',
        'posts_per_page' => $post_per_page
      )
    );
    $output .= '<div class="services '.$custom_class.'">';
    while ( $loop->have_posts() ) : $loop->the_post();
	// Output Code
	$output .= '<div class="single-service">
        <h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
    </div>';
    endwhile;
    $output .= '</div>';
    wp_reset_query();


	return $output;
}
add_shortcode( 'apollo_services_sc', 'create_apolloservicessc_shortcode' );

// Create Apollo Services element for Visual Composer
add_action( 'vc_before_init', 'apolloservicessc_integrateWithVC' );
function apolloservicessc_integrateWithVC() {
	vc_map( array(
		'name' => __( 'Apollo Services', 'textdomain' ),
		'base' => 'apollo_services_sc',
		'class' => 'apollo_services',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'textdomain'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => false,
				'heading' => __( 'Post Per Page', 'textdomain' ),
				'param_name' => 'post_per_page',
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