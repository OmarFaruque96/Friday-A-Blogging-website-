<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BlogGem
 */

get_header();
?>

<div class="row align-items-center justify-content-center">
	<div class="col-md-12">
		<div class="be-single-header">
			<div class="be-thumb-content">
				<div class="be-thumb-content-center">
					<header class="page-header <?php if ( get_theme_mod( 'bloggem_sidebar_position', 'right' ) === 'hide' ) : echo "text-center"; endif; ?>">
						<h1 class="page-title h4">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'bloggem' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</header><!-- .page-header -->
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

<div class="row justify-content-center">

	<?php if ( get_theme_mod( 'bloggem_sidebar_position', 'right' ) === 'left' ) : ?>
		<div class="col-md-3 be-sidebar-width">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>

	<section id="primary" class="col-md-9 content-area be-content-width">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php if ( get_theme_mod( 'bloggem_sidebar_position', 'right' ) === 'right' ) : ?>
		<div class="col-md-3 be-sidebar-width">
			<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();
