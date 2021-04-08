<?php
/*
 * Template Name: Full Width Template
 * Template Post Type: post, page
 *
 * @package Artpop
 * @since Artpop 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) : the_post();
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article><!-- #post-## -->

			<?php
			endwhile; // End of the loop.
			?>

		<?php endif; ?>
	</main><!-- #main -->
</div>

<?php get_footer(); ?>
