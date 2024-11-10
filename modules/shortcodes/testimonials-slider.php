<?php


// [testimonial_slider class='' id='' ] 
function cp_testimonials_slider($atts)
{

    $a = shortcode_atts(array(
        'class' => '',
        'id' => ''
    ), $atts);




    $loop = new WP_Query(
        array(
            'post_type' => 'testimonials',
            'posts_per_page' => -1,
            // 'tax_query' => array(
            //         array(
            //             'taxonomy' => 'testimonials_cat',
            //             'field'    => 'term_id',
            //             'terms'    => ''
            //         ),
            //     ),

        )
    );
    $html = '';
    $html .= '<div class="testimonials ' . $a['class'] . '" id="' . $a['id'] . '">';
    while ($loop->have_posts()) : $loop->the_post();
        $POST_ID = get_the_ID();
        $IMG_URL = get_the_post_thumbnail_url();
        $TITLE = get_the_title();
        $CONTENT = get_the_content();
        $EXCERPT = get_the_excerpt();
        $CAT_TERMS = get_the_terms($POST_ID, 'testimonials_cat');

        //SIngle Testimonial
        $html .= '<div class="ts_single single-' . $POST_ID . '">
        
        
        </div>';

    endwhile;
    $html .= '</div>';

    wp_reset_query();

    return $html;
}

add_shortcode('testimonial_slider', 'cp_testimonials_slider');
