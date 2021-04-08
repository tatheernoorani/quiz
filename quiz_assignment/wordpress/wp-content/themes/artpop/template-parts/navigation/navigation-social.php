<?php
/**
 * Displays Social navigation
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>

	<nav class="social-links" role="navigation" aria-label="<?php esc_attr_e( 'Social Links', 'artpop' ); ?>">
		<?php
		wp_nav_menu( array(
			'theme_location'  => 'social_menu',
			'container'       => false,
			'menu_class'      => 'social-menu',
			'depth'           => 1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'fallback_cb'     => false,
		) );
		?>
	</nav>
