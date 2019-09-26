<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BlogGem
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="row align-items-center justify-content-center">
		<div class="col-md-12">
			<?php
			if ( get_the_post_thumbnail_url() ) :
				$bg_thumb_img_url = get_the_post_thumbnail_url();
			endif;
			?>
			<div class="be-single-header text-center <?php if ( get_the_post_thumbnail_url() ) : echo "be-bg-thumb-img"; endif; ?>" style="background-image: url('<?php if ( get_the_post_thumbnail_url() ) : echo esc_html( $bg_thumb_img_url );  endif; ?>'" >
				<div class="be-thumb-content">
					<div class="be-thumb-content-center">
						<?php the_title( '<h1 class="entry-title h4">', '</h1>' ); ?>
						<div class="entry-meta">
							<?php if ( ! get_theme_mod( 'bloggem_hide_breadcrumb' ) ) : ?>
								<?php bloggem_breadcrumb_trail(); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>

<div class="row be-single-page justify-content-center">

	<?php if ( get_theme_mod( 'bloggem_sidebar_position', 'right' ) === 'left' ) : ?>
		<div class="col-md-3 be-sidebar-width">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>

	<div id="primary" class="col-md-9 content-area be-content-width">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation( array(
				'next_text' => '<span class="be-post-nav-label btn btn-sm cont-btn nav-btn no-underl">' . esc_html__( 'Next', 'bloggem' ) . '<small class="fas fa-chevron-right ml-2"></small></span>',
				'prev_text' => '<span class="be-post-nav-label btn btn-sm cont-btn nav-btn no-underl"><small class="fas fa-chevron-left mr-2"></small>' . esc_html__( 'Previous', 'bloggem' ) . '</span>',
			) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
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
