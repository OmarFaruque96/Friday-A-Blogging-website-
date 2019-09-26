<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
					<header class="page-header">
						<h1 class="page-title h4"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bloggem' ); ?></h1>
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

	<div id="primary" class="col-md-9 content-area be-content-width">
		<main id="main" class="site-main">

			<section class="error-404 not-found">

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bloggem' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts', array(), array(
						'before_title' => '<h5 class="widget-title mt-4">',
						'after_title'  => '</h5>',
					) );
					?>

					<div class="widget widget_categories">
						<h5 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'bloggem' ); ?></h5>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
						the_widget( 'WP_Widget_Tag_Cloud',array(), array(
							'before_title' => '<h5 class="widget-title mt-4">',
							'after_title'  => '</h5>',
						) );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

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
