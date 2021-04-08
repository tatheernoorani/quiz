<?php
/**
 * Customizer defaults
 *
 * @package Artpop
 * @since Artpop 1.0
 */


/**
 * Get the default option for Artpop's Customizer settings.
 *
 */
function artpop_defaults( $name ) {
	static $defaults;

	if ( ! $defaults ) {
		$defaults = apply_filters(
			'artpop_defaults', array(

				// Site Logo
				'site_logo_size'               => 160,
				'site_logo_show_tagline'       => '',

				// Site options
				'site_home_sidebar'            => '',
				'site_archive_sidebar'         => '',
				'site_post_sidebar'            => '',
				'site_show_fallback_image'     => true,

				// Header options
				'header_layout'                => 'header-1',
				'header_sticky'                => true,
				'header_show_social_menu'      => true,
				'header_show_search_icon'      => true,
				'header_show_woo_cart'         => true,

				// Homepage options
				'home_custom_blog_title'       => '',
				'home_custom_blog_description' => '',
				'home_layout'                  => 'grid-third',

				// Featured Posts
				'home_show_featured_posts'     => true,
				'home_featured_posts_layout'   => 'featured-grid',
				'home_featured_posts_cat'      => 'all',
				'home_exclude_featured_posts'  => true,

				// Archive options
				'archive_layout'               => 'grid-third',

				// Post options
				'post_show_breadcrumbs'        => '',
				'post_show_author_bio'         => true,

				// Footer options
				'footer_show_social_menu'      => true,

				// Colors
				'site_title_color'             => '#F02E90',
				'site_tagline_color'           => '#9D9E9E',
				'accent_color'                 => '#0BAAB0',
				'post_title_color'             => '#000000',
				'header_background_color'      => '#ffffff',
				'footer_background_color'      => '#ffffff',

				// WooCommerce
				'woo_shop_sidebar'             => '',
				'woo_product_sidebar'          => '',
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
