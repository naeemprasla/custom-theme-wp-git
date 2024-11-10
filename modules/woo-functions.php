<?php
if (class_exists('woocommerce')) {
    add_filter('woocommerce_add_to_cart_fragments', 'misha_add_to_cart_fragment');

    function misha_add_to_cart_fragment($fragments)
    {

        global $woocommerce;

        $fragments['.misha-cart'] = '<a href="#" class="misha-cart" data-toggle="modal" data-target="#minicart">
        <i class="fal fa-shopping-cart"></i> 
        <span class="woo-count"> ' . $woocommerce->cart->cart_contents_count . '</span>
        </a>';
        return $fragments;
    }
}

