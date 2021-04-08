<?php
/**
 * Template part for displaying page content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'artpop-single' ); ?>>

	<header class="entry-header">
		<div class="entry-header-text">
			<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
		</div>
		<?php
		if ( has_post_thumbnail() ) :
		?>
			<figure class="entry-thumbnail aspect-ratio-16x10">
				<?php the_post_thumbnail( 'artpop-fullwidth' ); ?>
			</figure>
		<?php
		endif;
		?>
	</header>

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'artpop' ),
				'after'  => '</div>',
				'link_before' => '<span class="page-link">',
				'link_after' => '</span>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php artpop_entry_footer(); ?>
	</footer>

</article><!-- #post-## -->
