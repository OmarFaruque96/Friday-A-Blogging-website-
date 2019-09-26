<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogGem
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'be-one-post' ); ?>>

	<?php if ( ! is_singular() ) : ?>
		<header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title h4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						bloggem_posted_on();
						bloggem_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php
				endif;
			?>
		</header><!-- .entry-header -->

		<?php bloggem_post_thumbnail(); ?>
	<?php endif; ?>

	<?php if( is_singular() || get_theme_mod( 'bloggem_display_full_blog' ) ) : ?>
		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bloggem' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bloggem' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
	<?php else : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<div class="mt-4 mb-4">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-sm cont-btn"><?php esc_html_e( 'Continue Reading', 'bloggem' ); ?> <small class="fas fa-arrow-right ml-1"></small></a>
			</div>
		</div><!-- .entry-summary -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php bloggem_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
