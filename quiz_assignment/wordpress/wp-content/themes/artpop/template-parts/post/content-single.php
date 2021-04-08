<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'artpop-single' ); ?>>

	<?php
	// Yoast SEO Breadcrumbs
	if ( function_exists( 'yoast_breadcrumb' ) && get_theme_mod( 'post_show_breadcrumbs', artpop_defaults( 'post_show_breadcrumbs' ) ) ) {
		yoast_breadcrumb('<p class="breadcrumbs">','</p>');
	}
	?>

	<header class="entry-header">
		<div class="entry-header-text">
			<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
			<div class="entry-meta">
				<?php artpop_posted_on(); ?>
			</div>
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

<?php
// Author bio
if ( get_theme_mod( 'post_show_author_bio', artpop_defaults( 'post_show_author_bio' ) ) && is_single() && get_the_author_meta( 'description' ) ) {
	get_template_part( 'template-parts/post/entry-author-bio' );
}
?>
