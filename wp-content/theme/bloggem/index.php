<?php
/**
 * The main template file
 */

get_header();
?>

<?php if ( is_home() && is_front_page() && get_theme_mod( 'bloggem_display_cover_section', true ) ) : ?>
	<section class="row align-items-center justify-content-center bd-cover-section">
		<div class="col-md-12">
			<div class="bd-cover-img" style="background-image: url('<?php echo esc_attr( get_theme_mod( 'bloggem_cover_img', get_template_directory_uri() . '/assets/images/cover-img.jpg' ) ); ?>')">
				<div class="bd-cover-content d-flex justify-content-center align-items-center">
					<div class="col-md-8 text-center">
						<h2 class="bd-cover-title"><?php echo esc_attr( get_theme_mod( 'bloggem_cover_title', __( 'Create A Beautiful Blog Easily.', 'bloggem' ) ) ); ?></h2>
						<p class="bd-cover-subtitle"><?php echo esc_attr( get_theme_mod( 'bloggem_cover_subtitle', __( 'BlogGem is simple and easy to use blog theme. It is designed and developed primarily to create professional blogging websites.', 'bloggem' ) ) ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<div class="row justify-content-center">

	<?php if ( get_theme_mod( 'bloggem_sidebar_position', 'right' ) === 'left' ) : ?>
		<div class="col-md-3 be-sidebar-width">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>

	<div id="primary" class="col-md-9 content-area be-content-width">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if ( get_theme_mod( 'bloggem_sidebar_position', 'right' ) === 'right' ) : ?>
		<div class="col-md-3 be-sidebar-width">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();
