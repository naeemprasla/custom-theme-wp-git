<?php
/* Post Type: Clients Logo. */
function cp_clients_logo()
{

    $labels = array(
        'name'                => _x('Clients Logo', 'Post Type General Name', 'wp-bootstrap-starter'),
        'singular_name'       => _x('Client Logo', 'Post Type Singular Name', 'wp-bootstrap-starter'),

    );
    $args = array(
        'label'               => __('clientslogo', 'wp-bootstrap-starter'),
        'description'         => __('Custom Post Description', 'wp-bootstrap-starter'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies'          => array(),
        'public'      => true,
        'has_archive' => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-images-alt',
    );
    register_post_type('clientslogo', $args);
}
add_action('init', 'cp_clients_logo');


$labels = array(
    'name'                => _x('Categories', 'Post Type General Name', 'wp-bootstrap-starter'),
    'singular_name'       => _x('Category', 'Post Type Singular Name', 'wp-bootstrap-starter'),

);
register_taxonomy(
    'logo_cat', // Taxonomy name
    array('clientslogo'), //On Which Post You Want Custom Taxonomy
    array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'logo_cat' // Taxonomy Slug
        )
    )
);



