<?php

// Add Section
$wp_customize->add_section( 'bloggem_theme_general_settings', array(
	'title'             => __( 'Theme Options', 'bloggem' ),
	'priority'          => 30,
) );



$wp_customize->add_setting( 'bloggem_logo_height', array(
	'default'           => 60,
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'bloggem_logo_height', array(
	'label'             => __( 'Enter logo height (in px)', 'bloggem' ),
	'type'              => 'number',
	'section'           => 'title_tagline',
	'setting'           => 'bloggem_logo_height',
	'priority'          => '9',
) );



$wp_customize->add_setting( 'bloggem_style', array(
	'default'           => 'style1',
	'sanitize_callback' => 'esc_html',
) );

$wp_customize->add_control( 'bloggem_style', array(
	'label'       => __( 'Choose Style', 'bloggem' ),
	'type'        => 'select',
	'section'     => 'bloggem_theme_general_settings',
	'setting'     => 'bloggem_style',
	'description' => esc_html__( 'Choose from different combinations of color & fonts.', 'bloggem' ),
	'choices' => array(
		'style1' => __( 'Style 1 (Default)', 'bloggem' ),
		'style2' => __( 'Style 2', 'bloggem' ),
		'style3' => __( 'Style 3', 'bloggem' ),
		'style4' => __( 'Style 4', 'bloggem' ),
		'style5' => __( 'Style 5', 'bloggem' ),
	  )
) );



$wp_customize->add_setting( 'bloggem_sidebar_position', array(
	'default'           => 'right',
	'sanitize_callback' => 'esc_html',
) );

$wp_customize->add_control( 'bloggem_sidebar_position', array(
	'label'             => __( 'Sidebar Position', 'bloggem' ),
	'type'              => 'select',
	'section'           => 'bloggem_theme_general_settings',
	'setting'           => 'bloggem_sidebar_position',
	'choices'           => array(
		'right'         => __( 'Right', 'bloggem' ),
		'left'          => __( 'Left', 'bloggem' ),
		'hide'          => __( 'Hide Sidebar', 'bloggem' ),
	  )
) );



$wp_customize->add_setting( 'bloggem_display_full_blog', array(
	'default'           => false,
	'sanitize_callback' => 'esc_html',
) );

$wp_customize->add_control( 'bloggem_display_full_blog', array(
	'label'             => __( 'Display full posts on the Homepage', 'bloggem' ),
	'type'              => 'checkbox',
	'section'           => 'bloggem_theme_general_settings',
	'setting'           => 'bloggem_display_full_blog',
	'active_callback'   => 'is_home',
	'description'       => esc_html__( 'By default, excerpt is displayed on the blog homepage.', 'bloggem' ),
) );



$wp_customize->add_setting( 'bloggem_sticky_navbar', array(
	'default'           => true,
	'sanitize_callback' => 'esc_html',
) );

$wp_customize->add_control( 'bloggem_sticky_navbar', array(
	'label'             => __( 'Stick the Navbar to top', 'bloggem' ),
	'type'              => 'checkbox',
	'section'           => 'bloggem_theme_general_settings',
	'setting'           => 'bloggem_sticky_navbar',
	'description'       => esc_html__( 'Select this setting if you want to keep navigation bar fixed at top while scrolling.', 'bloggem' ),
) );



$wp_customize->add_setting( 'bloggem_hide_breadcrumb', array(
	'default'           => false,
	'sanitize_callback' => 'esc_html',
) );

$wp_customize->add_control( 'bloggem_hide_breadcrumb', array(
	'label'             => __( 'Hide breadcrumbs on single post/page', 'bloggem' ),
	'type'              => 'checkbox',
	'section'           => 'bloggem_theme_general_settings',
	'setting'           => 'bloggem_hide_breadcrumb',
	'description'       => esc_html__( 'Select this setting if you want to hide breadcrumbs displayed on the single blog post/page.', 'bloggem' ),
) );



$wp_customize->add_setting( 'bloggem_display_cover_section', array(
	'default'           => true,
	'sanitize_callback' => 'esc_html',
) );

$wp_customize->add_control( 'bloggem_display_cover_section', array(
	'label'             => __( 'Display cover section on Homepage', 'bloggem' ),
	'type'              => 'checkbox',
	'section'           => 'bloggem_theme_general_settings',
	'setting'           => 'bloggem_display_cover_section',
	'active_callback'   => 'is_home',
	'description'       => esc_html__( 'Uncheck this setting if you want to hide cover section from the blog homepage.', 'bloggem' ),
) );



$wp_customize->add_setting('bloggem_cover_img', array(
    'default'           => get_template_directory_uri() . '/assets/images/cover-img.jpg',
	'sanitize_callback' => 'bloggem_sanitize_image',
));

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bloggem_cover_img', array(
    'label'           => __('Cover Section Image', 'bloggem'),
    'section'         => 'bloggem_theme_general_settings',
    'setting'         => 'bloggem_cover_img',
	'active_callback' => 'bloggem_is_cover_active',
)));



$wp_customize->add_setting( 'bloggem_cover_title', array(
	'default'           => __( 'Create A Beautiful Blog Easily.', 'bloggem' ),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'bloggem_cover_title', array(
	'label'           => __( 'Title on Cover Section', 'bloggem' ),
	'type'            => 'text',
	'section'         => 'bloggem_theme_general_settings',
	'setting'         => 'bloggem_cover_title',
	'active_callback' => 'bloggem_is_cover_active',
) );

$wp_customize->get_setting( 'bloggem_cover_title' )->transport = 'postMessage';


$wp_customize->add_setting( 'bloggem_cover_subtitle', array(
	'default'           => __( 'BlogGem is simple and easy to use blog theme. It is designed and developed primarily to create professional blogging websites.', 'bloggem' ),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'bloggem_cover_subtitle', array(
	'label'           => __( 'Sub-title on Cover Section', 'bloggem' ),
	'type'            => 'textarea',
	'section'         => 'bloggem_theme_general_settings',
	'setting'         => 'bloggem_cover_subtitle',
	'active_callback' => 'bloggem_is_cover_active',
) );

$wp_customize->get_setting( 'bloggem_cover_subtitle' )->transport = 'postMessage';



$wp_customize->add_setting( 'bloggem_view_docs_button', array(
	'default'           => '',
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'bloggem_view_docs_button', array(
	'label'       => __( 'View Documentation', 'bloggem' ),
	'type'        => 'hidden',
	'section'     => 'bloggem_theme_general_settings',
	'setting'     => 'bloggem_view_docs_button',
	'description' => wp_kses_post( __( '<a href="https://wp-points.com/how-to-setup-bloggem-theme/" target="_blank" class="button">View Documentation</a>', 'bloggem' ) ),
) );


$wp_customize->add_setting( 'bloggem_upgrade_msg', array(
	'default'           => '',
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'bloggem_upgrade_msg', array(
	'label'       => __( 'Take your website to the next level!', 'bloggem' ),
	'type'        => 'hidden',
	'section'     => 'bloggem_theme_general_settings',
	'setting'     => 'bloggem_upgrade_msg',
	'description' => wp_kses_post( __( '<p>With the premium version, you get more premium features with professional technical support.</p><p>You can also improve your website’s speed and performance. Your website can be further optimized for better search engine ranking.</p> <a href="https://wp-points.com/themes/bloggem-pro/" target="_blank" class="button button-primary">Learn More</a> <a href="https://bloggem-pro.wp-points.com/" target="_blank" class="button button-primary bd-ml-5">View Pro Demo</a>', 'bloggem' ) ),
) );
