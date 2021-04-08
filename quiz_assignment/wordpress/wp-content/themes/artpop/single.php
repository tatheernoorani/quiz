<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Artpop
 * @since Artpop 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/post/content', 'single' );

			the_post_navigation(
				array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'artpop' ) . '<span class="nav-arrow nav-arrow-right"></span>' . '</span>' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'artpop' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . '<span class="nav-arrow nav-arrow-left"></span>' . __( 'Previous', 'artpop' ) . '</span>' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'artpop' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
// Sidebar
if ( get_theme_mod( 'site_post_sidebar', artpop_defaults( 'site_post_sidebar' ) ) ) {
	get_sidebar();
}
?>

<?php
get_footer();
?>
