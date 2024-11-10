<?php
function vcsite_settings_customize_register($wp_customize)
{
    // Settings-------------------------
    $wp_customize->add_section(
        'vcsite_settings_option',
        array(
            'title'       => __('Contact & Social Links', 'vc-site-settings'),
            'priority'    => 120,
            'capability'  => 'edit_theme_options',
            'description' => __('<h2>Shortcodes:</h2><ul><li>Social Link [social_media]</li><li>Phone [phone]</li><li>FAX [fax]</li><li>EMAIL [emailAddress]</li><li>ADDRESS [address]</li></ul>', 'vc-site-settings'),
        )
    );

    $wp_customize->add_setting('topbar_setting', array('default' => 'true'));
    $wp_customize->add_control('topbar', array(
        'label'      => __('Topbar Enable/Disable', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'topbar_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'topbar_setting',
    ));

    $wp_customize->add_setting('bottom_setting', array('default' => ''));
    $wp_customize->add_control('bottom', array(
        'label'      => __('Sub Footer Enable/Disable', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'bottom_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'bottom_setting',
    ));

    $socialMedia = array(
        'Facebook' => 'fb',
        'Twitter' => 'tw',
        'LinkedIn' => 'ln',
        'Instagram' => 'in',
        'Youtube' => 'yt',
    );
    foreach ($socialMedia as $key => $valu) {
        $wp_customize->add_setting('social_media_' . $valu, array('default' => 'https://'));
        $wp_customize->add_control('link_textbox_' . $valu, array(
            'label'      => __($key . ' Link', 'vc-site-settings'),
            'description' => __('Get Value by get_theme_mod(\'social_media_' . $valu . '\');', 'vc-site-settings'),
            'section'    => 'vcsite_settings_option',
            'settings'   => 'social_media_' . $valu,
        ));
    }

    $wp_customize->add_setting('phone_text_setting', array('default' => '+00 000 000000'));
    $wp_customize->add_control('phone_text', array(
        'label'      => __('Phone Number', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'phone_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'phone_text_setting',
    ));
    $wp_customize->add_setting('fax_text_setting', array('default' => '+00 000 000000'));
    $wp_customize->add_control('fax_text', array(
        'label'      => __('FAX Number', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'fax_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'fax_text_setting',
    ));
    $wp_customize->add_setting('emailid_text_setting', array('default' => 'admin@domainname.com'));
    $wp_customize->add_control('emailid_text', array(
        'label'      => __('Email Address', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'emailid_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'emailid_text_setting',
    ));
    $wp_customize->add_setting('address_text_setting', array('default' => 'house no , road , city , country , zip'));
    $wp_customize->add_control('address_text', array(
        'label'      => __('Business Address', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'address_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'address_text_setting',
    ));

    $wp_customize->add_setting('map_url_setting', array('default' => 'https://maps.google.com/'));
    $wp_customize->add_control('map_url', array(
        'label'      => __('Google Map URL', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'map_url_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'map_url_setting',
    ));



    // Settings-------------------------
}
add_action('customize_register', 'vcsite_settings_customize_register');



function vcsite_settings_tracking_customize_register($wp_customize)
{
    // Settings-------------------------
    $wp_customize->add_section(
        'vcsite_settings_track_option',
        array(
            'title'       => __('Tracking JS', 'vc-site-settings'),
            'priority'    => 120,
            'capability'  => 'edit_theme_options',
            'description' => __('<ul><li>Enable Tracking Will Activate all Tracking codes.</li><li>Default / Blank Values Will not Activate the Tracking Code.</li></ul>', 'vc-site-settings'),
        )
    );

    $wp_customize->add_setting('enable_tracking_codes', array(
        'default'    => '1'
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'enable_tracking_codes',
            array(
                'label'     => __('Enable Tracking Codes', 'dd_theme'),
                'description' => __('Get Value by get_theme_mod(\'enable_tracking_codes\');', 'vc-site-settings'),
                'section'   => 'vcsite_settings_track_option',
                'settings'  => 'enable_tracking_codes',
                'type'      => 'checkbox',
            )
        )
    );

    $wp_customize->add_setting('ga_url_setting', array('default' => 'UA-XXXXX-Y'));
    $wp_customize->add_control('ga_url', array(
        'label'      => __('Google Analytics ID', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'ga_url_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_track_option',
        'settings'   => 'ga_url_setting',
    ));

    $wp_customize->add_setting('gtag_url_setting', array('default' => 'UA-XXXXX-Y'));
    $wp_customize->add_control('gtag_url', array(
        'label'      => __('Google TAGS ID', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'gtag_url_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_track_option',
        'settings'   => 'gtag_url_setting',
    ));

    $wp_customize->add_setting('fbpixel_url_setting', array('default' => 'XXX-XXX-XXX'));
    $wp_customize->add_control('fbpixel_url', array(
        'label'      => __('Facebook Pixel ID', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'fbpixel_url_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_track_option',
        'settings'   => 'fbpixel_url_setting',
    ));

    // Settings-------------------------
}
add_action('customize_register', 'vcsite_settings_tracking_customize_register');


