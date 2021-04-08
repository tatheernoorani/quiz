<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-post' ); ?>>

	<?php
	if ( has_post_thumbnail() ) {
	?>
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'large' ); ?>
			</a>
		</figure>
	<?php
	} else {
		artpop_fallback_image();
	}
	?>

	<div class="entry-header">
		<?php if ( 'post' === get_post_type() ) { ?>
			<div class="entry-meta">
				<?php
				artpop_time_link();
				artpop_category_link();
				?>
			</div>
		<?php } ?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>">
				<?php if( is_sticky() ) echo artpop_get_svg( array( 'icon' => 'bookmark' ) ); ?>
				<?php the_title(); ?>
			</a>
		</h2>
	</div>

</article><!-- #post-## -->
