<?php


// [logo_slider class='' id='' ] 
function cp_logo_slider($atts)
{

    $a = shortcode_atts(array(
        'class' => '',
        'id' => ''
    ), $atts);

    $loop = new WP_Query(
        array(
            'post_type' => 'clientslogo',
            'posts_per_page' => -1,
            // 'tax_query' => array(
            //         array(
            //             'taxonomy' => 'logo_cat',
            //             'field'    => 'term_id',
            //             'terms'    => ''
            //         ),
            //     ),

        )
    );
    $html = '';
    $html .= '<div class="slogo ' . $a['class'] . '" id="' . $a['id'] . '">';
    while ($loop->have_posts()) : $loop->the_post();
        $POST_ID = get_the_ID();
        $imageUrl = get_the_post_thumbnail_url();
        $title = get_the_title();

        //SIngle Testimonial
        $html .= '<div class="slogo_single single-' . $POST_ID . '">
        
        
        </div>';

    endwhile;
    $html .= '</div>';

    wp_reset_query();

    return $html;
}

add_shortcode('logo_slider', 'cp_logo_slider');
