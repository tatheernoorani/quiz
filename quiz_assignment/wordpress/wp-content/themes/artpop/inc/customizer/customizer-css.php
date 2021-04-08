<?php
/**
 * Add inline CSS for styles handled by the Theme customizer.
 *
 * @package Artpop
 * @since Artpop 1.0
 */


/**
* Get Contrast
*/
function artpop_get_brightness( $hex ) {
	// returns brightness value from 0 to 255
	// strip off any leading #
	$hex = str_replace( '#', '', $hex );

	$c_r = hexdec( substr( $hex, 0, 2 ) );
	$c_g = hexdec( substr( $hex, 2, 2 ) );
	$c_b = hexdec( substr( $hex, 4, 2 ) );

	return ( ( $c_r * 299 ) + ( $c_g * 587 ) + ( $c_b * 114 ) ) / 1000;
}

/**
 * Set the custom CSS via Customizer options.
 */
function artpop_custom_css() {
	$site_logo_size          = absint( get_theme_mod( 'site_logo_size', artpop_defaults( 'site_logo_size') ) );
	$site_title_color        = esc_attr( get_theme_mod( 'site_title_color' ) );
	$site_tagline_color      = esc_attr( get_theme_mod( 'site_tagline_color' ) );
	$accent_color            = esc_attr( get_theme_mod( 'accent_color' ) );

	$theme_css = "";

	// Site Logo Size
	if ( ! empty( $site_logo_size ) ) {
		$theme_css .= "
		@media screen and (min-width: 720px) { .mobile-header .site-logo {max-width: {$site_logo_size}px;} }
		@media screen and (min-width: 1024px) { .site-logo {max-width: {$site_logo_size}px;} }
		";
	}
	// Colors
	if ( ! empty( $site_title_color ) ) {
		$theme_css .= ".site-title a, .site-title a:hover {color: {$site_title_color};}";
	}
	if ( ! empty( $site_tagline_color ) ) {
		$theme_css .= ".site-description {color: {$site_tagline_color};}";
	}
	if ( ! empty( $accent_color ) ) {
		$theme_css .= "
		.entry-content .has-accent-color, a, .entry-title a:hover, .main-navigation ul ul li:hover > a, .cat-links a, .comment-metadata .comment-edit-link, .read-more:hover, .trending-posts-title h2 .divider, .related-posts-title .divider, .widget a:hover, .widget_text a, .widget_designlab_profile .more-link, .sidebar .widget_tag_cloud a:hover, .widget-title .divider, .posts-navigation a:hover, .post-navigation a:hover .meta-nav, .post-navigation a:hover .post-title, .author-link a:hover, .wp-block-latest-posts.is-grid li a:hover {
			color: {$accent_color};
		}
		.entry-content .has-accent-background-color, button, .button, input[type='button'], input[type='reset'], input[type='submit'], .read-more:after, .post-navigation a:hover .nav-arrow, .pagination .current, .pagination .page-numbers:hover, .post-edit-link, .reply a, .swiper .swiper-pagination-bullet-active, #sb_instagram .sbi_follow_btn a {
			background-color: {$accent_color};
		}
		.main-navigation ul ul, .entry-meta-top .comments-link > a:hover:after, .entry-meta-top .comments-link > span:hover:after, .header-4 .main-navigation > ul > li:focus > a:before, .header-4 .main-navigation > ul > li.current-menu-item > a:before, .tags-links a {
			border-color: {$accent_color};
		}
		.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .woocommerce-info:before {color: {$accent_color};}
		.woocommerce .woocommerce-info, .woocommerce div.product .woocommerce-tabs ul.tabs li.active {border-top-color: {$accent_color};}
		.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {background-color: {$accent_color};}
		";
		if ( artpop_get_brightness( $accent_color ) > 160 ) {
			$theme_css .= "
			button, .button, input[type='button'], input[type='reset'], input[type='submit'], .standard-post .read-more:after, .pagination .current, .pagination .page-numbers:hover, .post-edit-link, .reply a, #sb_instagram .sbi_follow_btn a {color: rgba(0,0,0,.8);}";
		}
	}
	return $theme_css;
}

/**
 * Enqueue the Customizer styles on the front-end.
 */
function artpop_custom_style() {
	$css = artpop_custom_css();
	if ( ! empty( $css ) ) {
		wp_add_inline_style( 'artpop-style', $css );
	}
}
add_action( 'wp_enqueue_scripts', 'artpop_custom_style' );

/**
  * Set the custom CSS via Customizer options.
  */
function artpop_editor_css() {
	$accent_color = esc_attr( get_theme_mod( 'accent_color' ) );

	$editor_css = "";

	// Accent Color
	if ( ! empty( $accent_color ) ) {
		$editor_css .= "
		.editor-styles-wrapper .wp-block a,
		.editor-styles-wrapper .wp-block a:hover,
		.wp-block-freeform.block-library-rich-text__tinymce a
		.wp-block-freeform.block-library-rich-text__tinymce a:hover,
		.editor-styles-wrapper .wp-block-quote:before,
		.editor-styles-wrapper .wp-block-latest-posts.is-grid li a:hover {
			color: {$accent_color};
		}";
	}
	return $editor_css;
}

/**
 * Enqueue Customizer settings into the block editor.
 */
function artpop_editor_style() {
	// Add Block styles.
	wp_enqueue_style( 'artpop-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add Google fonts.
	wp_enqueue_style( 'artpop-block-editor-fonts', artpop_fonts_url(), array(), null );
	// Add Customizer colors and fonts.
	wp_add_inline_style( 'artpop-block-editor-style', artpop_editor_css() );
}
add_action( 'enqueue_block_editor_assets', 'artpop_editor_style' );
