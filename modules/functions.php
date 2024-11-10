<?php

function custom_theme_scripts()
{


   
  
    //wp_enqueue_style('faicons-v5-css',  'https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css');  
    wp_enqueue_style('faicons-v6-css',  'https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css'); 
    //wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css');
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');

    wp_enqueue_style('theme-css', get_template_directory_uri() . '/assets/dist/css/style.min.css'); // Main CSS

    wp_register_style( 'theme-woocommerce', get_template_directory_uri() . '/assets/dist/css/woocommerce.css' ); // Woo
	
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'theme-woocommerce' );
	}

    
    wp_enqueue_script('jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true); // Jquery
    wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), '1.16.0', true); // Popper
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), '1.0.0', true); // Bootstrap

    //wp_enqueue_script('smoothscroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js', array(), '1.4.10', true); // Smooth Scroll
    //wp_enqueue_script('rellax-js',  'https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js', array(), '1.1.2', true); // Rellax JS
    //wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.8.1', true);
    
    
    wp_enqueue_script('app-js', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0.0', true); // Main JS
}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');

//Disbale Core Upadates
function remove_core_updates()
{
	global $wp_version;
	return (object) array('last_checked' => time(), 'version_checked' => $wp_version,);
}
add_filter('pre_site_transient_update_core', 'remove_core_updates');
add_filter('pre_site_transient_update_plugins', 'remove_core_updates');
add_filter('pre_site_transient_update_themes', 'remove_core_updates');


// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false', 100);
add_filter('use_block_editor_for_post', '__return_false', 10);
// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter('use_widgets_block_editor', '__return_false');


// Widgets
include 'theme-widgets.php';

//Customizer
include 'customizer.php';

//Woo
include 'woo-functions.php';

//SHORTCODES
include 'shortcodes/social-contacts.php';

// Custom Posts
include 'custom-posts/cp-services.php';
include 'custom-posts/cp-testimonials.php';
include 'custom-posts/cp-logos.php';

//WPB Widgets
include 'vc_widgets/wpb-counterbox.php';
include 'vc_widgets/wpb-buttonwithicon.php';
include 'vc_widgets/wpb-services.php';
include 'vc_widgets/wpb-blogs.php';


//WPB Sidebars
include 'sidebars/contact-info.php';
include 'sidebars/social-media.php';


//WPB Custom Fields
include 'custom-fields.php';
