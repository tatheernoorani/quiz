<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Artpop
 * @since Artpop 1.0
 */

get_header(); ?>

<header class="page-header">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title">
			<?php printf( __( 'Search Results for: %s', 'artpop' ), '<strong>' . get_search_query() . '</strong>' ); ?>
		</h1>
	<?php else : ?>
		<h1 class="page-title">
			<?php _e( 'Nothing Found', 'artpop' ); ?>
		</h1>
	<?php endif; ?>
</header>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<section class="posts-loop <?php echo esc_attr( get_theme_mod( 'archive_layout', artpop_defaults( 'archive_layout' ) ) . '-style' ); ?>">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', artpop_archive_template() );

				endwhile;
				?>
			</section>

			<?php
			the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => esc_html( '&lsaquo;' ),
				'next_text' => esc_html( '&rsaquo;' ),
			) );
			?>

		<?php
		else :
		?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'artpop' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
// Sidebar
if ( get_theme_mod( 'site_archive_sidebar', artpop_defaults( 'site_archive_sidebar' ) ) ) {
	get_sidebar();
}
?>

<?php
get_footer();
?>
