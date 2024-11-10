<?php 
/* Post Type: Testimonials. */
function cp_testimonials() {

    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'wp-bootstrap-starter' ),
        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'wp-bootstrap-starter' ),

    );
    $args = array(
        'label'               => __( 'testimonials', 'wp-bootstrap-starter' ),
        'description'         => __( 'Custom Post Description', 'wp-bootstrap-starter' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies'          => array( ),
        'public'      => true,
        'has_archive' => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-feedback',
    );
    register_post_type( 'testimonials', $args );

} 
add_action( 'init', 'cp_testimonials');


$labels = array(
    'name'                => _x('Categories', 'Post Type General Name', 'wp-bootstrap-starter'),
    'singular_name'       => _x('Category', 'Post Type Singular Name', 'wp-bootstrap-starter'),

);
register_taxonomy(
    'testimonials_cat', // Taxonomy name
    array('testimonials'), //On Which Post You Want Custom Taxonomy
    array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'testimonials_cat' // Taxonomy Slug
        )
    )
);
