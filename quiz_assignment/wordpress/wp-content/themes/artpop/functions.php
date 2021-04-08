<?php
/**
 * Artpop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Artpop
 * @since Artpop 1.0
 */


if ( ! function_exists( 'artpop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function artpop_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'artpop' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnail
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'artpop-fullwidth', 1200, 800, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 760;

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main_menu'   => esc_html__( 'Main Menu', 'artpop' ),
		'social_menu' => esc_html__( 'Social Menu', 'artpop' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'artpop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Set up the WordPress Custom Logo Feature.
	add_theme_support( 'custom-logo', array(
		'height'      => 600,
		'width'       => 400,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( array( 'assets/css/editor-style.css', artpop_fonts_url() ) );

	// Add custom editor font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'artpop' ),
				'size'      => 14,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'artpop' ),
				'size'      => 16,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'artpop' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Larger', 'artpop' ),
				'size'      => 32,
				'slug'      => 'larger',
			),
			array(
				'name'      => __( 'Huge', 'artpop' ),
				'size'      => 48,
				'slug'      => 'huge',
			),
		)
	);

	// Add support for custom color scheme.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Accent Color', 'artpop' ),
			'slug'  => 'accent',
			'color' => esc_attr( get_theme_mod( 'accent_color', artpop_defaults( 'accent_color' ) ) ),
		),
		array(
			'name'  => __( 'Black', 'artpop' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
		array(
			'name'  => __( 'Dark', 'artpop' ),
			'slug'  => 'dark',
			'color' => '#2c2d2e',
		),
		array(
			'name'  => __( 'Gray', 'artpop' ),
			'slug'  => 'gray',
			'color' => '#4b4c4d',
		),
		array(
			'name'  => __( 'Light Gray', 'artpop' ),
			'slug'  => 'light-gray',
			'color' => '#9d9e9e',
		),
		array(
			'name'  => __( 'White', 'artpop' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
	) );
}
endif;
add_action( 'after_setup_theme', 'artpop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function artpop_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$site_home_sidebar    = get_theme_mod( 'site_home_sidebar', artpop_defaults( 'site_home_sidebar' ) );
	$site_archive_sidebar = get_theme_mod( 'site_archive_sidebar', artpop_defaults( 'site_archive_sidebar' ) );
	$site_post_sidebar    = get_theme_mod( 'site_post_sidebar', artpop_defaults( 'site_post_sidebar' ) );

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1156;
	} elseif ( is_home() && ! $site_home_sidebar ) {
		$content_width = 1156;
	} elseif ( ( is_archive() || is_search() ) && ! $site_archive_sidebar ) {
		$content_width = 1156;
	} elseif ( is_single() && ! $site_post_sidebar ) {
		$content_width = 1156;
	} elseif ( is_page_template( 'templates/full-width.php' ) || is_page_template( 'templates/no-sidebar.php' ) ) {
		$content_width = 1156;
	}

	$GLOBALS['content_width'] = apply_filters( 'artpop_content_width', $content_width );
}
add_action( 'template_redirect', 'artpop_content_width', 0 );

if ( ! function_exists( 'artpop_fonts_url' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function artpop_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Inter: on or off', 'artpop' ) ) {
		$fonts[] = 'Inter:400,400i,700,700i';
	}

	if ( 'off' !== _x( 'on', 'Quicksand: on or off', 'artpop' ) ) {
		$fonts[] = 'Quicksand:400,700';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'artpop' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family'  => urlencode( implode( '|', $fonts ) ),
			'subset'  => urlencode( $subsets ),
			'display' => 'fallback',
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Enqueue scripts and styles.
 */
function artpop_scripts() {

	// Add Google Fonts.
	wp_enqueue_style( 'artpop-fonts', artpop_fonts_url(), array(), null );

	// Theme stylesheet.
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'artpop-style', get_stylesheet_uri(), array(), $theme_version );

	// Main js.
	wp_enqueue_script( 'artpop-script', get_template_directory_uri() . '/assets/js/main.js', array(), '20210207', true );

	// Add Swiper.
	if ( is_home() && get_theme_mod( 'home_show_featured_posts', artpop_defaults( 'home_show_featured_posts' ) ) && 'featured-carousel' == get_theme_mod( 'home_featured_posts_layout', artpop_defaults( 'home_featured_posts_layout' ) ) ) {
		wp_enqueue_style( 'artpop-swiper-style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '6.1.2' );
		wp_enqueue_script( 'artpop-swiper-script', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '6.1.2', true );
		wp_add_inline_script( 'artpop-swiper-script', artpop_initialize_swiper() );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'artpop_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function artpop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'artpop' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here.', 'artpop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title divider"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 1', 'artpop' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here.', 'artpop' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title divider"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 2', 'artpop' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here.', 'artpop' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title divider"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 3', 'artpop' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here.', 'artpop' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title divider"><span>',
		'after_title'   => '</span></h3>',
	) );
	if ( artpop_is_woocommerce_active() ) {
		register_sidebar( array(
			'name'          => __( 'Shop Sidebar', 'artpop' ),
			'id'            => 'shop-sidebar',
			'description'   => __( 'Add widgets here.', 'artpop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title divider"><span>',
			'after_title'   => '</span></h3>',
		) );
	}
}
add_action( 'widgets_init', 'artpop_widgets_init' );

/**
 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function artpop_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#content">' . __( 'Skip to the content', 'artpop' ) . '</a>';
}
add_action( 'wp_body_open', 'artpop_skip_link', 5 );

/**
 * Adds a Sub Nav Toggle to the Mobile Menu.
 */
function artpop_add_sub_menu_toggles( $output, $item, $depth, $args ) {
	if ( isset( $args->show_sub_menu_toggles ) && $args->show_sub_menu_toggles && in_array( 'menu-item-has-children', $item->classes, true ) ) {
		$output = '<div class="menu-item-wrapper">' . $output . '<button class="sub-menu-toggle" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'artpop' ) . '</span>' . artpop_get_svg( array( 'icon' => 'chevron-down' )  ) . '</button></div>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'artpop_add_sub_menu_toggles', 10, 4 );

/**
 * Adds a Sub Nav Icons to the Main Menu.
 */
function artpop_add_sub_menu_icons( $output, $item, $depth, $args ) {
	if( isset( $args->show_sub_menu_icons ) && $args->show_sub_menu_icons && in_array( 'menu-item-has-children', $item->classes, true ) ) {
		$output = $output . '<span class="sub-menu-icon"></span>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'artpop_add_sub_menu_icons', 10, 4 );

/**
 * Adjustments to menu attributes to support WCAG 2.0 recommendations for flyout and dropdown menus.
 * @link https://www.w3.org/WAI/tutorials/menus/flyout/
 */
function artpop_add_menu_link_attributes( $atts, $item, $args, $depth ) {
	$item_has_children = in_array( 'menu-item-has-children', $item->classes );
	if ( $item_has_children ) {
		$atts['aria-haspopup'] = 'true';
		$atts['aria-expanded'] = 'false';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'artpop_add_menu_link_attributes', 10, 4 );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/defaults.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-css.php';
require get_template_directory() . '/inc/customizer/callbacks.php';
require get_template_directory() . '/inc/customizer/sanitization.php';

/**
 * Initialize Swiper.
 */
function artpop_initialize_swiper() {
	$swiper = "";
	if( get_theme_mod( 'home_show_featured_posts', artpop_defaults( 'home_show_featured_posts' ) ) ) {
		$swiper .= "var swiper = new Swiper('.featured-posts-swiper', {
			slidesPerView: 1,
			spaceBetween: 16,
			centeredSlides: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			breakpoints: {
				1024: {
					loop: true,
					slidesPerView: 2,
				},
				1440: {
					loop: true,
					slidesPerView: 3,
				},
			},
		});";
	}
	return $swiper;
}

/**
 * Load WooCommerce compatibility file.
 */

// Query WooCommerce activation
function artpop_is_woocommerce_active() {
	return class_exists( 'WooCommerce' ) ? true : false;
}

if( artpop_is_woocommerce_active() ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function artpop_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class for the Sidebar.
	$site_home_sidebar    = get_theme_mod( 'site_home_sidebar', artpop_defaults( 'site_home_sidebar' ) );
	$site_archive_sidebar = get_theme_mod( 'site_archive_sidebar', artpop_defaults( 'site_archive_sidebar' ) );
	$site_post_sidebar    = get_theme_mod( 'site_post_sidebar', artpop_defaults( 'site_post_sidebar' ) );

	if ( ! artpop_is_woocommerce_active() || ( artpop_is_woocommerce_active() && ! is_woocommerce() ) ) {
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'has-no-sidebar';
		} elseif ( is_home() && ! $site_home_sidebar ) {
				$classes[] = 'has-no-sidebar';
		} else if ( ( is_archive() || is_search() ) && ! $site_archive_sidebar ) {
				$classes[] = 'has-no-sidebar';
		} elseif ( is_single() && ! $site_post_sidebar ) {
				$classes[] = 'has-no-sidebar';
		}
	} else {
		$woo_shop_sidebar    = get_theme_mod( 'woo_shop_sidebar', artpop_defaults( 'woo_shop_sidebar' ) );
		$woo_product_sidebar = get_theme_mod( 'woo_product_sidebar', artpop_defaults( 'woo_product_sidebar' ) );
		if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
			$classes[] = 'has-no-sidebar';
		} elseif ( ( is_shop() || is_product_category() || is_product_tag() ) && ! $woo_shop_sidebar ) {
			$classes[] = 'has-no-sidebar';
		} elseif ( is_product() && ! $woo_product_sidebar ) {
			$classes[] = 'has-no-sidebar';
		} elseif ( is_checkout() || is_cart() || is_account_page() ) {
			$classes[] = 'has-no-sidebar';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'artpop_body_classes' );

/**
 * Fallback Menu.
 */
function artpop_fallback_menu() {
	$home_url = esc_url( home_url( '/' ) );
	echo '<ul class="main-menu"><li><a href="' . $home_url . '" rel="home">' . __( 'Home', 'artpop' ) . '</a></li></ul>';
}

/**
 * Fallback Image.
 */
function artpop_fallback_image() {
	if ( ! get_theme_mod( 'site_show_fallback_image', artpop_defaults( 'site_show_fallback_image' ) ) ) {
		return;
	}

	$fallback_image_url = get_template_directory_uri() . '/assets/images/fallback-image.png';
	echo '<figure class="entry-thumbnail">';
	echo '<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_the_title() ) . '">';
	echo '<img class="fallback-image" src="' . esc_url( $fallback_image_url ) . '" alt="' . __( 'Fallback image', 'artpop' ) . '" />';
	echo '</a>';
	echo '</figure>';
}

/**
 * Filter the except length.
 */
function artpop_excerpt_length( $excerpt_length ) {
	if ( is_admin() ) {
		return $excerpt_length;
	}
	return 20;
}
add_filter( 'excerpt_length', 'artpop_excerpt_length', 999 );

/**
 * Home Post Template.
 */
function artpop_home_template() {
	$home_post_template = get_theme_mod( 'home_layout', artpop_defaults( 'home_layout' ) );
	return sanitize_file_name( $home_post_template );
}

/**
 * Archive Post Template.
 */
function artpop_archive_template() {
	$archive_post_template = get_theme_mod( 'archive_layout', artpop_defaults( 'archive_layout' ) );
	return sanitize_file_name( $archive_post_template );
}

/**
 * Header Template.
 */
function artpop_header_template() {
	$header_template = get_theme_mod( 'header_layout', artpop_defaults( 'header_layout' ) );
	return sanitize_file_name( $header_template );
}

/**
 * Header Class.
 */
function artpop_header_class() {
	$header_class = get_theme_mod( 'header_layout', artpop_defaults( 'header_layout' ) );
	if( get_theme_mod( 'header_sticky', artpop_defaults( 'header_sticky' ) ) ) {
		$header_class .= ' is-fixed';
	}
	echo esc_attr( $header_class );
}

/**
 * Display Custom Logo/Site Title and Tagline.
 */
function artpop_custom_logo() {
	$t = 'p';
	if ( is_front_page() && is_home() ) {
		$t = 'h1';
	}
	$class = 'site-title';
	$title = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		$class = 'site-logo';
		$title = get_custom_logo();
	}
	echo wp_kses_post( '<' . $t . ' class="' . $class . '">' . $title . '</' . $t . '>' );

	$description = get_bloginfo( 'description', 'display' );
	if ( get_theme_mod( 'site_logo_show_tagline', artpop_defaults( 'site_logo_show_tagline' ) ) && ( $description || is_customize_preview() ) ) :
		echo '<p class="site-description">';
		echo $description;
		echo '</p>';
	endif;
}

/**
 * Display the Search Icon.
 */
function artpop_search_popup() {
	if ( get_theme_mod( 'header_show_search_icon', 1 ) ) :
		echo '<div class="search-popup">';
		echo '<button class="search-popup-button search-open">' . artpop_get_svg( array( 'icon' => 'search' ) ) . '</button>';
		echo '<div class="search-popup-inner">';
		echo '<button class="search-popup-button search-close">' . artpop_get_svg( array( 'icon' => 'x' ) ) . '</button>';
		get_search_form();
		echo '</div></div>';
	endif;
}

/**
 * Display Social Icons in the Header.
 */
function artpop_social_menu() {
	if ( get_theme_mod( 'header_show_social_menu', artpop_defaults( 'header_show_social_menu' ) ) ) {
		get_template_part( 'template-parts/navigation/navigation', 'social' );
	}
}

/**
 * Display Featured Posts.
 */
function artpop_featured_posts() {
	if ( get_theme_mod( 'home_show_featured_posts', artpop_defaults( 'home_show_featured_posts' ) ) && is_home() && ! is_paged() ) {
		get_template_part( 'template-parts/homepage/featured-posts' );
	}
}

/**
 * Exclude Featured Posts from the Main Loop to avoid duplicate posts.
 */
function artpop_get_duplicate_post_ids() {

	$featured_post_array = array();
	if ( get_theme_mod( 'home_show_featured_posts', artpop_defaults( 'home_show_featured_posts' ) ) && get_theme_mod( 'home_exclude_featured_posts', artpop_defaults( 'home_exclude_featured_posts' ) ) ) {

		$fp_layout = get_theme_mod( 'home_featured_posts_layout', artpop_defaults( 'home_featured_posts_layout' ) );
		$fp_cat_id = get_theme_mod( 'home_featured_posts_cat', artpop_defaults( 'home_featured_posts_cat' ) );
		if( $fp_layout == 'featured-carousel' ) {
			$fp_item = 6;
		} else {
			$fp_item = 5;
		}

		$args = array(
			'post_type'       => 'post',
			'posts_per_page'  => $fp_item,
			'orderby'         => 'date',
			'order'           => 'DESC',
		);

		if( is_numeric( $fp_cat_id ) ) {
			$args['cat'] = $fp_cat_id;
		}

		$featured_posts = get_posts( $args );

		if ( $featured_posts ) {
			foreach ( $featured_posts as $post ) :
			$featured_post_array[] = $post->ID;
			endforeach;
			wp_reset_postdata();
		}
	}
	return $featured_post_array;
}

// Retrieve list of duplicate posts.
$duplicate_posts = artpop_get_duplicate_post_ids();

if ( ! empty( $duplicate_posts ) ) {

function artpop_exclude_duplicate_posts( $query ) {
	if ( $query->is_main_query() && $query->is_home() ) {
		$query->set( 'post__not_in', artpop_get_duplicate_post_ids() );
	}
}
add_action( 'pre_get_posts', 'artpop_exclude_duplicate_posts' );

}

/**
 * Retrieve list of categories.
 */
function artpop_get_categories() {
	$categories     = array();
	$categories_obj = get_categories();
	foreach ( $categories_obj as $category ) {
		$categories[$category->cat_ID] = $category->cat_name;
	}
	$categories['all'] = __( 'All categories', 'artpop' );
	return $categories;
}

/**
 * Print Credits in the Footer.
 */
function artpop_credits() {
	$author  = get_bloginfo( 'name' );
	$date    = date_i18n(__( 'Y', 'artpop' ) );
	$credits = '&copy; ' . $date . ' ' . $author;
	echo '<span>' . esc_html( $credits ) . '</span>';
}

/**
 * Getting started
 */
require_once( get_template_directory() . '/inc/getting_started.php' );

/**
 * Add Upsell "pro" link to the customizer
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/customizer/customize-pro/class-customize.php' );
