<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package Artpop
 * @since Artpop 1.0
 */
// WooCommerce Sidebar Settings
if ( artpop_is_woocommerce_active() ) {
	$woo_shop_sidebar    = get_theme_mod( 'woo_shop_sidebar', artpop_defaults( 'woo_shop_sidebar' ) );
	$woo_product_sidebar = get_theme_mod( 'woo_product_sidebar', artpop_defaults( 'woo_product_sidebar' ) );
	if ( ( is_shop() || is_product_category() || is_product_tag() ) && ! $woo_shop_sidebar ) {
		return;
	} elseif ( is_product() && ! $woo_product_sidebar ) {
		return;
	} elseif ( is_checkout() || is_cart() || is_account_page() ) {
		return;
	}
}
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">

	<div class="sidebar-inner">
		<?php
		if ( artpop_is_woocommerce_active() && is_woocommerce() ) {
			if ( is_active_sidebar( 'shop-sidebar' ) ) dynamic_sidebar( 'shop-sidebar' );
		} else {
			if ( is_active_sidebar( 'sidebar-1' ) ) dynamic_sidebar( 'sidebar-1' );
		}
		?>
	</div>

</aside><!-- #secondary -->
