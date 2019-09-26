<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogGem
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div id="" class="main-site-container">

		<header id="masthead" class="site-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="site-branding">
							<div class="">
								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<h2 class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
									<?php
								endif;
								$bloggem_description = get_bloginfo( 'description', 'display' );
								if ( $bloggem_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $bloggem_description ); /* WPCS: xss ok. */ ?></p>
								<?php endif; ?>
							</div>
							<?php if ( is_active_sidebar( 'sidebar-header-right' ) ) : ?>
							<div class="dg-header-right">
								<?php dynamic_sidebar( 'sidebar-header-right' ); ?>
							</div>
							<?php endif; ?>
						</div><!-- .site-branding -->
					</div>
				</div>
			</div>
		</header><!-- #masthead -->

		<div class="main-nav-bg <?php if ( get_theme_mod( 'bloggem_sticky_navbar', true ) ) : echo 'sticky-top'; endif; ?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<nav id="site-navigation" class="main-navigation">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								) );
								?>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="content" class="site-content">
			<div class="container">
