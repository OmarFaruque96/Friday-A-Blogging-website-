<?php
/**
 * BlogGem functions and definitions
 */


/**
* Sets up theme defaults and registers support for various WordPress features.
*/
if ( ! function_exists( 'bloggem_setup' ) ) :

	function bloggem_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'bloggem', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bloggem' ),
		) );

		// Switch default core markup to output valid HTML5
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bloggem_custom_background_args', array(
			'default-color' => 'efefef',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Set post thumbnail size
		set_post_thumbnail_size( 1366, 900 );

		// Add theme support for editor styles
		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor-style.css' );

	}
endif;
add_action( 'after_setup_theme', 'bloggem_setup' );


/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*/
function bloggem_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bloggem_content_width', 980 );
}
add_action( 'after_setup_theme', 'bloggem_content_width', 0 );


/**
* Register widget area.
*/
function bloggem_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bloggem' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bloggem' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Right', 'bloggem' ),
		'id'            => 'sidebar-header-right',
		'description'   => esc_html__( 'Add widgets here.', 'bloggem' ),
		'before_widget' => '<section id="%1$s" class="widget header-right-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'bloggem_widgets_init' );


/**
* Enqueue scripts and styles.
*/
function bloggem_scripts() {
	wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/assets/css/fontawesome-all.css', array(), '5.0.6', 'all' );
	wp_enqueue_style( 'slicknavcss', get_template_directory_uri() . '/assets/css/slicknav.css', array(), 'v1.0.10', 'all' );
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.3.1', 'all' );
	wp_enqueue_style( 'bloggem-style', get_stylesheet_uri(), array(), 'v1.0.0', 'all' );

	if( get_theme_mod( 'bloggem_style' ) === 'style2' ) {
		wp_enqueue_style( 'bloggem-fonts2', '//fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap' );
		wp_enqueue_style( 'bloggem-style2', get_template_directory_uri() . '/assets/css/theme-style2.css', array( 'bloggem-style' ), 'v1.0.0', 'all' );
	}
	if( get_theme_mod( 'bloggem_style' ) === 'style3' ) {
		wp_enqueue_style( 'bloggem-fonts3', '//fonts.googleapis.com/css?family=Roboto:400,700&display=swap' );
		wp_enqueue_style( 'bloggem-style3', get_template_directory_uri() . '/assets/css/theme-style3.css', array( 'bloggem-style' ), 'v1.0.0', 'all' );
	}
	if( get_theme_mod( 'bloggem_style' ) === 'style4' ) {
		wp_enqueue_style( 'bloggem-fonts4', '//fonts.googleapis.com/css?family=Lato:400,700&display=swap' );
		wp_enqueue_style( 'bloggem-style4', get_template_directory_uri() . '/assets/css/theme-style4.css', array( 'bloggem-style' ), 'v1.0.0', 'all' );
	}
	if( get_theme_mod( 'bloggem_style' ) === 'style5' ) {
		wp_enqueue_style( 'bloggem-fonts4', '//fonts.googleapis.com/css?family=Montserrat:700|Source+Sans+Pro&display=swap' );
		wp_enqueue_style( 'bloggem-style5', get_template_directory_uri() . '/assets/css/theme-style5.css', array( 'bloggem-style' ), 'v1.0.0', 'all' );
	}

	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), 'v1.0.10', true );
	wp_enqueue_script( 'bloggem-theme', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bloggem_scripts' );


/**
* Implement the Custom Header feature.
*/
require get_template_directory() . '/inc/custom-header.php';


/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';


/**
* Functions which enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';


/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';


/**
* Load Jetpack compatibility file.
*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
* Load WooCommerce compatibility file.
*/
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
* Add Breadcrumb to the theme
*/
require get_template_directory() . '/inc/lib/breadcrumb-trail/breadcrumb-trail.php';
