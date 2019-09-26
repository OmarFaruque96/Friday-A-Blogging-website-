<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package BlogGem
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bloggem_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( get_theme_mod( 'bloggem_sidebar_position', 'right' ) === 'left' ) {
		$classes[] = 'bd-left-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'bloggem_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bloggem_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'bloggem_pingback_header' );

/**
* Breadcrumb Trail Customization
*/
function bloggem_breadcrumb_trail() {
	$breadcrumb_defaults = array(
		'browse_tag'      => 'h6',
		'show_browse'     => false,
		'labels' => array(
			'home' => '<i class="fas fa-home"></i>'
		),
	);
	if ( function_exists( 'breadcrumb_trail' ) ) :
		breadcrumb_trail( $breadcrumb_defaults );
	endif;
}

/**
* Add classes to navigation buttons
*/
add_filter( 'next_posts_link_attributes', 'bloggem_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'bloggem_posts_link_attributes' );
add_filter( 'next_comments_link_attributes', 'bloggem_comments_link_attributes' );
add_filter( 'previous_comments_link_attributes', 'bloggem_comments_link_attributes' );

function bloggem_posts_link_attributes() {
    return 'class="btn btn-sm cont-btn nav-btn no-underl mb-4"';
}

function bloggem_comments_link_attributes() {
    return 'class="btn btn-sm cont-btn nav-btn no-underl mb-4"';
}

/**
* Check if cover section is displayed
*/
function bloggem_is_cover_active() {
	if( ! is_home() ) {
		return false;
	}
	if( get_theme_mod( 'bloggem_display_cover_section', true ) ) {
		return true;
	}
	return false;
}


/**
 * Image sanitization callback
 */
function bloggem_sanitize_image( $image, $setting ) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}



/**
* Greet new users & guide them to help page
*/
function bloggem_admin_notice(){
	if ( is_admin() ) {
		bloggem_greet_user();
	}
}
$intro_notice_dismissed = get_option( 'bloggem-intro-dismissed' );
if( empty( $intro_notice_dismissed ) ) {
	add_action('admin_notices', 'bloggem_admin_notice');
}

function bloggem_greet_user() {
	echo '<div class="notice bloggem-intro-notice notice-success is-dismissible">';
	echo wp_kses_post( __( '<p style="margin-bottom: 5px;">Welcome! Thank you for choosing BlogGem. You can always reach out to us on the support forum if you need any help. If you like our work, please support us by providing a review with 5-star ratings. Please don\'t forget to take a look at premium version of this theme.', 'bloggem' ) );
	echo "<p><a href='https://wp-points.com/how-to-setup-bloggem-theme/' class='button button-primary' target='_blank' style=''>";
	esc_html_e( 'View Documentation', 'bloggem' );
	echo "</a><a href='https://wordpress.org/support/theme/bloggem/reviews/#new-post' class='' target='_blank' style='margin-left: 10px;'>";
	esc_html_e( 'Rate us 5 stars', 'bloggem' );
	echo "</a><a href='#' class='bd-notice-dismiss' style='margin-left: 10px;float: right;'>";
	esc_html_e( 'Don\'t display this again!', 'bloggem' );
	echo '</a></p></div>';
}


// Enqueue dismiss script
function bloggem_admin_scripts() {
	wp_enqueue_script( 'bloggem-admin', get_template_directory_uri() . '/assets/js/bloggem-admin.js' );
}
$intro_notice_dismissed = get_option( 'bloggem-intro-dismissed' );
if( empty( $intro_notice_dismissed ) ) {
	add_action( 'admin_enqueue_scripts' , 'bloggem_admin_scripts' );
}

// Update option if notice dismissed
add_action( 'wp_ajax_bloggem-intro-dismissed', 'bloggem_dismiss_intro_notice' );
function bloggem_dismiss_intro_notice() {
	update_option( 'bloggem-intro-dismissed', 1 );
}
