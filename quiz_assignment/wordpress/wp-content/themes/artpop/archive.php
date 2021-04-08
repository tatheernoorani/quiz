<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Artpop
 * @since Artpop 1.0
 */

get_header(); ?>

<header class="page-header">
	<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
</header>

<div id="primary" class="content-area">
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
				'prev_text' => '&lsaquo;',
				'next_text' => '&lsaquo;',
			) );
			?>

		<?php
		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
// Sidebar
if ( get_theme_mod( 'site_archive_sidebar', artpop_defaults( 'site_archive_sidebar' ) ) ) {
	get_sidebar();
}
?>

<?php
get_footer();
?>
