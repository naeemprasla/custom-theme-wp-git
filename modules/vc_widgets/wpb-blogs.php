<?php 
// Create Shortcode apollo_blogs_sc
// Use the shortcode: [apollo_blogs_sc num_posts="" custom_class=""]
function create_apolloblogssc_shortcode($atts) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'num_posts' => '',
			'custom_class' => '',
		),
		$atts,
		'apollo_blogs_sc'
	);
	// Attributes in var
	$num_posts = $atts['num_posts'];
	$custom_class = $atts['custom_class'];


	// Output Code
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
         'post_type' => 'post',
         'posts_per_page' => $num_posts,
         'paged' => $paged
    );
    $loop = new WP_Query( $args );
    $output .= '<div class="apollo_blogs '.$custom_class.' ">';
    while ( $loop->have_posts() ) : $loop->the_post();
        $output .= '<div class="apollo_article-single">
            <div class="blog_wrapper">
                <div class="blog_date">
                    <p>'.get_the_date().'</p>
                </div>
                <div class="blog_title">
                    <h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
                </div>
                <div class="blog_excerpt">
                    <p>'.get_the_excerpt().'</p>
                </div>
                <div class="blog_button">
                    <div class="button-wrapper parallax-medium">
                        <div class="button_icon">
                            <a href="'.get_the_permalink().'"><img src="'.site_url().'/wp-content/uploads/button-arrow.png" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    endwhile;
    $output .= '</div>';
    $big = 999999999;
    $output .= '<div class="pagination">';
    $output .= paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $loop->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
     ) );
     $output .= '</div>';
	

    wp_reset_postdata();
	return $output;
}
add_shortcode( 'apollo_blogs_sc', 'create_apolloblogssc_shortcode' );

// Create Apollo Blogs element for Visual Composer
add_action( 'vc_before_init', 'apolloblogssc_integrateWithVC' );
function apolloblogssc_integrateWithVC() {
	vc_map( array(
		'name' => __( 'Apollo Blogs', 'textdomain' ),
		'base' => 'apollo_blogs_sc',
		'class' => 'apollo_blogs_cls',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'textdomain'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => false,
				'heading' => __( 'Number of post to show', 'textdomain' ),
				'param_name' => 'num_posts',
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