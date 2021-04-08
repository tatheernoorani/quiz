<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Artpop
 * @since Artpop 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'artpop' ); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">

				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'artpop' ); ?></p>

				<?php get_search_form(); ?>

			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
