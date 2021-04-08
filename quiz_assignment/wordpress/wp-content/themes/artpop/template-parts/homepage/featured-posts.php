<?php
/**
 * The template for displaying Featured Posts
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>

<?php
// Featured Posts Settings
$fp_layout = esc_attr( get_theme_mod( 'home_featured_posts_layout', artpop_defaults( 'home_featured_posts_layout' ) ) );
$fp_cat    = esc_attr( get_theme_mod( 'home_featured_posts_cat', artpop_defaults( 'home_featured_posts_cat' ) ) );
if( $fp_layout == 'featured-carousel' ) {
	$fp_count = 6;
} else {
	$fp_count = 5;
}

$query_args = array (
	'post_type'        => 'post',
	'posts_per_page'   => $fp_count,
	'orderby'          => 'date',
	'order'            => 'DESC',
);

if( is_numeric( $fp_cat ) ) {
	$query_args['cat'] = $fp_cat;
}

$fp_query = new WP_Query ($query_args);
$i = 1;
?>

<section class="featured-posts-area <?php if( $fp_layout == 'featured-carousel' ) echo 'swiper'; ?> <?php echo $fp_layout; ?>">

	<?php if( 'featured-carousel' == $fp_layout ) { ?>

		<div class="swiper-container featured-posts-swiper">
			<div class="swiper-wrapper">
				<?php
				if ( $fp_query->have_posts() ) :

					while ( $fp_query->have_posts() && $i <= $fp_count ) : $fp_query->the_post();
					?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'swiper-slide featured-post' ); ?>>

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
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
						</article>

					<?php
					$i++; endwhile;
					wp_reset_postdata();

				endif;
				?>
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>

	<?php } else { ?>

		<div class="container">
			<div class="row">
				<?php
				if ( $fp_query->have_posts() ) :
					while ( $fp_query->have_posts() && $i <= $fp_count ) : $fp_query->the_post();
				?>

					<?php if( $i == 1 || $i == 2 || $i == 4 ) echo '<div class="column">'; ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-post' ); ?>>
							<?php
							if ( has_post_thumbnail() ) {
							?>
								<figure class="entry-thumbnail aspect-ratio-4x3">
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
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>

							<?php if ( $i == 1 ) { ?>
								<div class="entry-summary">
									<?php the_excerpt(); ?>
								</div>
							<?php } ?>
						</article>
					<?php if( $i == 1 || $i == 3 || $i == 5 ) echo '</div>'; ?>

				<?php
					$i++;
					endwhile; wp_reset_postdata();
				endif;
				?>
			</div>
		</div>

	<?php } ?>

</section>
