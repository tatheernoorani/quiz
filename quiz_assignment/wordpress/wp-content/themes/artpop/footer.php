<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		<div class="footer-content">
			<div class="container">
				<?php
				$footer_menu = has_nav_menu( 'footer-menu' );
				?>
				<div class="footer-wrapper <?php if ( $footer_menu ) echo esc_attr( 'has-footer-menu' ); ?>">
					<?php
					if ( get_theme_mod( 'footer_show_social_menu', artpop_defaults( 'footer_show_social_menu' ) ) ) {
						get_template_part( 'template-parts/navigation/navigation', 'social' );
					}
					?>
					<?php
					if ( $footer_menu ) :
					?>
						<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Navigation', 'artpop' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'footer-menu',
									'container'      => false,
									'depth'          => 1,
									'menu_class'     => 'footer-menu',
									'fallback_cb'    => false,
								) );
							?>
						</nav>
					<?php
					endif;
					?>
					<div class="footer-credits">
						<?php artpop_credits(); ?>
						<span>
							<?php
							printf( esc_html_x( 'Theme by %s', 'Translators: $s = name of the theme developer', 'artpop' ), '<a href="https://www.designlabthemes.com">' . esc_html__( 'Design Lab', 'artpop' ) . '</a>' );
							?>
						</span>
						<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( '<span>', '</span>' );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- .site-footer -->

</div><!-- #page -->

<?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
<?php wp_footer(); ?>

</body>
</html>
