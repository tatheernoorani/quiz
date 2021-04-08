<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Artpop
 * @since Artpop 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		$custom_blog_title       = get_theme_mod( 'home_custom_blog_title', artpop_defaults( 'home_custom_blog_title' ) );
		$custom_blog_description = get_theme_mod( 'home_custom_blog_description', artpop_defaults( 'home_custom_blog_description' ) );

		if ( ! empty( $custom_blog_title  ) ) :
		?>
			<div class="section-header">
				<div class="section-title">
					<span><?php echo esc_html( $custom_blog_title ); ?></span>
				</div>
				<?php if ( ! empty( $custom_blog_description ) ) echo '<p>' . wp_kses_post( $custom_blog_description ) . '</p>'; ?>
			</div>
		<?php
		endif;
		?>

		<?php
		if ( have_posts() ) : ?>

			<section class="posts-loop <?php echo esc_attr( get_theme_mod( 'home_layout', artpop_defaults( 'home_layout' ) ) . '-style' ); ?>">
				<?php /* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/content', artpop_home_template() );

				endwhile;
				?>
			</section>

			<?php
			the_posts_pagination( array(
				'mid_size' => 2,
				'prev_text' => '&lsaquo;',
				'next_text' => '&rsaquo;',
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
if ( get_theme_mod( 'site_home_sidebar', artpop_defaults( 'site_home_sidebar' ) ) ) {
	get_sidebar();
}
?>

<?php
get_footer();
?>
