<?php
// [social_media]
function get_social_links()
{
    $html = '';
    $facebook = get_theme_mod('social_media_fb');
    $twitter = get_theme_mod('social_media_tw');
    $linkedin = get_theme_mod('social_media_ln');
    $instagram = get_theme_mod('social_media_in');
    $youtube = get_theme_mod('social_media_yt');


    if (!empty($facebook)) {
        $html .= '<a href="' . $facebook . '" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>';
    }
    if (!empty($twitter)) {
        $html .= '<a href="' . $twitter . '" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>';
    }
    if (!empty($linkedin)) {
        $html .= '<a href="' . $linkedin . '" target="_blank"><i class="fab fa-linkedin"></i> Linkedin</a>';
    }
    if (!empty($instagram)) {
        $html .= '<a href="' . $instagram . '" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>';
    }
    if (!empty($youtube)) {
        $html .= '<a href="' . $youtube . '" target="_blank"><i class="fab fa-youtube"></i> Youtube</a>';
    }


    return $html;
}
add_shortcode('social_media', 'get_social_links');

// [phone]
function get_phone()
{
    $html = '';
    $phone = get_theme_mod('phone_text_setting');
    if (!empty($phone)) {
        $html .= '<a href="tel:' . $phone . '"><span class="icon"><i class="fal fa-phone"></i></span>' . $phone . '</a>';
    }
    return $html;
}
add_shortcode('phone', 'get_phone');


// [fax]
function get_fax()
{
    $html = '';
    $faxnumb = get_theme_mod('fax_text_setting');
    if (!empty($faxnumb)) {
        $html .= '<a href="fax:' . $faxnumb . '"><span class="icon"><i class="fal fa-fax"></i></span>' . $faxnumb . '</a>';
    }
    return $html;
}
add_shortcode('fax', 'get_fax');


// [emailAddress]

function get_email()
{
    $html = '';
    $emailaddr = get_theme_mod('emailid_text_setting');
    if (!empty($emailaddr)) {
        $html .= '<a href="mailto:' . $emailaddr . '"><span class="icon"><i class="fal fa-envelope"></i></span>' . $emailaddr . '</a>';
    }
    return $html;
}

add_shortcode('emailAddress', 'get_email');

// [address]
function get_location()
{

    $html = '';
    $address = get_theme_mod('address_text_setting');
    $gmaplink = get_theme_mod('map_url_setting');
    if (!empty($address)) {
        $html .= '<a href="' . $gmaplink . '" target="_blank"><span class="icon"><i class="fal fa-marker"></i></span>' . $address . '</a>';
    }
    return $html;
}
add_shortcode('address', 'get_location');


//WooMiniCart  [woo_minicart]
function woo_mini_cart_sc()
{

    if (class_exists('woocommerce')) {
        global $woocommerce;
        $html = '';
        $html .= '<a href="#" class="misha-cart" data-toggle="modal" data-target="#minicart">
                <i class="fal fa-shopping-cart"></i>
                <span class="woo-count">' . $woocommerce->cart->cart_contents_count . '</span>
            </a>';
        return $html;
    }
}

add_shortcode('woo_minicart', 'woo_mini_cart_sc');
