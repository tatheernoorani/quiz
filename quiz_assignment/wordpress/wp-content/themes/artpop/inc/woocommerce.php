<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Artpop
 * @since Artpop 1.0
 */


// Declare WooCommerce support.
function artpop_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'gallery_thumbnail_image_width' => 150,
			'product_grid'                  => array(
				'default_rows'    => 3,
				'min_rows'        => 2,
				'max_rows'        => 8,
				'default_columns' => 3,
				'min_columns'     => 2,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'artpop_woocommerce_setup' );

// Remove default WooCommerce wrapper.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Wraps all WooCommerce content in wrappers which match the theme markup.
add_action('woocommerce_before_main_content', 'artpop_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'artpop_wrapper_end', 10);

function artpop_wrapper_start() {
	echo '<div id="primary" class="content-area"><main id="main" class="site-main"><div class="woocommerce-content">';
}
function artpop_wrapper_end() {
	echo '</div></main></div>';
}

// Displays a link to the cart including the number of items present and the cart total.
function artpop_woocommerce_cart_link() {
	if( get_theme_mod( 'header_show_woo_cart', artpop_defaults( 'header_show_woo_cart' ) ) ) {
		$cart_url = wc_get_cart_url();
		echo '<div class="woo-cart-link"><a href="' . esc_url( $cart_url ) . '" title="' . esc_attr__( 'Checkout', 'artpop' ) . '">' . '<span class="woo-cart-icon">' . artpop_get_svg( array( 'icon' => 'shopping-cart' ) ) . '</span></a></div>';
	}
}
