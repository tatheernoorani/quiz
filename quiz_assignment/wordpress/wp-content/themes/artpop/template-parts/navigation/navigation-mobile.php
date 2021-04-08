<?php
/**
 * Displays Sidebar Navigation
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?>

<span id="side-panel-overlay" class="side-panel-overlay"></span>
<aside id="side-panel" class="side-panel">
	<div class="side-panel-inner">
		<nav id="mobile-navigation" class="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'artpop' ); ?>">
			<button id="side-panel-close" class="side-panel-close"><i></i></button>
			<?php
			wp_nav_menu( array(
				'theme_location'        => 'main_menu',
				'menu_id'               => 'mobile-menu',
				'menu_class'            => 'main-menu mobile-menu',
				'show_sub_menu_toggles' => true,
				'container'             => false,
				'fallback_cb'           => 'artpop_fallback_menu'
			) );
			?>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'social_menu',
				'container'       => false,
				'menu_class'      => 'social-menu',
				'depth'           => 1,
				'link_before'     => '<span class="screen-reader-text">',
				'link_after'      => '</span>',
				'fallback_cb'     => '',
			) );
			?>
		</nav>
	</div>
</aside>
