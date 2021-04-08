<?php
/**
 * Displays Main navigation
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>

	<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'artpop' ); ?>">
		<?php
		wp_nav_menu( array(
			'theme_location'      => 'main_menu',
			'menu_id'             => 'main-menu',
			'menu_class'          => 'main-menu',
			'show_sub_menu_icons' => true,
			'container'           => false,
			'fallback_cb'         => 'artpop_fallback_menu'
		) );
		?>
	</nav>
