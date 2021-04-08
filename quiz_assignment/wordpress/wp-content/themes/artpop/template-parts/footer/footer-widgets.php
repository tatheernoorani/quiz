<?php
/**
 * Displays the Footer Widget Area.
 *
 * @package Artpop
 * @since Artpop 1.0
 */
?>

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
	<div class="widget-area" role="complementary">
		<div class="container">
			<div class="row">
				<div class="column" id="footer-area-1">
					<?php if ( is_active_sidebar( 'footer-1' ) ) {
						dynamic_sidebar( 'footer-1' );
					} ?>
				</div>
				<div class="column" id="footer-area-2">
					<?php if ( is_active_sidebar( 'footer-2' ) ) {
						dynamic_sidebar( 'footer-2' );
					} ?>
				</div>
				<div class="column" id="footer-area-3">
					<?php if ( is_active_sidebar( 'footer-3' ) ) {
						dynamic_sidebar( 'footer-3' );
					} ?>
				</div>
			</div>
		</div>
	</div><!-- .widget-area -->
<?php endif; ?>
