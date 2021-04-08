<?php
/**
 * Theme Customizer functionality
 *
 * @package Artpop
 * @since Artpop 1.0
 */


/**
 * Customizer Settings.
 */
function artpop_theme_customizer( $wp_customize ) {

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Add refresh method for Custom Logo
	$wp_customize->get_setting( 'custom_logo' )->transport = "refresh";

	// Change default WordPress controls.
	$wp_customize->get_section( 'title_tagline' )->priority = 2;
	$wp_customize->get_control( 'custom_logo' )->section = 'site_logo';
	$wp_customize->get_control( 'custom_logo' )->priority = 2;
	$wp_customize->get_section( 'colors' )->priority = 9;
	$wp_customize->get_section( 'static_front_page' )->panel = 'home_panel';
	$wp_customize->get_section( 'static_front_page' )->priority = 1;

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'artpop_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'artpop_customize_partial_blogdescription',
		)
	);

	// Add custom controls.
	require get_parent_theme_file_path( '/inc/customizer/' . 'controls.php' );

	// Add categories.
	$blog_categories = artpop_get_categories();

	/* Panels */
	$wp_customize->add_panel( 'home_panel', array(
		'title'    => __( 'Homepage', 'artpop' ),
		'priority' => 6,
	) );

	/* Sections */
	$wp_customize->add_section( 'custom_links', array(
		'title'    => __('Artpop Links', 'artpop'),
		'priority' => 1,
	) );
	$wp_customize->add_section( 'site_logo', array(
		'title'       => __( 'Site Logo', 'artpop' ),
		'description' => __( 'Settings for Site Logo.', 'artpop' ),
		'priority'    => 3,
	) );
	$wp_customize->add_section( 'site_options', array(
		'title'       => __( 'Site Options', 'artpop' ),
		'description' => __( 'Main Theme Settings.', 'artpop' ),
		'priority'    => 4,
	) );
	$wp_customize->add_section( 'header_options', array(
		'title'       => __( 'Header', 'artpop' ),
		'description' => __( 'Settings for Site Header.', 'artpop' ),
		'priority'    => 5,
	) );
	$wp_customize->add_section( 'home_options', array(
		'title'       => __( 'Homepage Layout', 'artpop' ),
		'description' => __( 'Settings for Blog Homepage (Your Homepage displays your Latest Posts)', 'artpop' ),
		'priority'    => 2,
		'panel'       => 'home_panel',
	) );
	$wp_customize->add_section( 'home_featured_posts', array(
		'title'    => __( 'Featured Posts', 'artpop' ),
		'priority' => 3,
		'panel'    => 'home_panel',
	) );
	$wp_customize->add_section( 'archive_options', array(
		'title'       => __( 'Archive', 'artpop' ),
		'description' => __( 'Settings for Category, Tag, Search and Archive Pages.', 'artpop' ),
		'priority'    => 7,
	) );
	$wp_customize->add_section( 'post_options', array(
		'title'       => __( 'Post', 'artpop' ),
		'description' => __( 'Settings for Single Post.', 'artpop' ),
		'priority'    => 8,
	) );
	$wp_customize->add_section( 'footer_options', array(
		'title'       => __( 'Footer', 'artpop' ),
		'description' => __( 'Settings for Site Footer.', 'artpop' ),
		'priority'    => 9,
	) );

	/* Controls */

	// Custom Links
	$wp_customize->add_setting('artpop_links', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new Artpop_Customize_Important_Links( $wp_customize, 'artpop_links', array(
		'section' => 'custom_links',
	) ) );

	// Site Options
	$wp_customize->add_setting( 'site_sidebar_options_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Heading( $wp_customize, 'site_sidebar_options_title', array(
		'label'    => __( 'Sidebar Options', 'artpop' ),
		'section'  => 'site_options',
	) ) );
	$wp_customize->add_setting( 'site_home_sidebar', array(
		'default'           => artpop_defaults( 'site_home_sidebar' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'site_home_sidebar', array(
		'label'    => __( 'Enable Sidebar on Blog Homepage', 'artpop' ),
		'section'  => 'site_options',
		'type'     => 'checkbox',
	) );
	$wp_customize->add_setting( 'site_archive_sidebar', array(
		'default'           => artpop_defaults( 'site_archive_sidebar' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'site_archive_sidebar', array(
		'label'    => __( 'Enable Sidebar on Archive and Search pages', 'artpop' ),
		'section'  => 'site_options',
		'type'     => 'checkbox',
	) );
	$wp_customize->add_setting( 'site_post_sidebar', array(
		'default'           => artpop_defaults( 'site_post_sidebar' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'site_post_sidebar', array(
		'label'    => __( 'Enable Sidebar on Single Post', 'artpop' ),
		'section'  => 'site_options',
		'type'     => 'checkbox',
	) );
	$wp_customize->add_setting( 'site_separator_1', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new Artpop_Customize_Separator( $wp_customize, 'site_separator_1', array(
		'section'         => 'site_options',
		'active_callback' => 'artpop_woocommerce_callback',
	) ) );
	$wp_customize->add_setting( 'woo_sidebar_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Heading( $wp_customize, 'woo_sidebar_title', array(
		'label'           => __( 'WooCommerce Sidebar', 'artpop' ),
		'section'         => 'site_options',
		'active_callback' => 'artpop_woocommerce_callback',
	) ) );
	$wp_customize->add_setting( 'woo_shop_sidebar', array(
		'default'           => artpop_defaults( 'woo_shop_sidebar' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'woo_shop_sidebar', array(
		'label'           => __( 'Enable Sidebar on Shop and Product Archive', 'artpop' ),
		'section'         => 'site_options',
		'type'            => 'checkbox',
		'active_callback' => 'artpop_woocommerce_callback',
	) );
	$wp_customize->add_setting( 'woo_product_sidebar', array(
		'default'           => artpop_defaults( 'woo_product_sidebar' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'woo_product_sidebar', array(
		'label'           => __( 'Enable Sidebar on Single Product Page', 'artpop' ),
		'section'         => 'site_options',
		'type'            => 'checkbox',
		'active_callback' => 'artpop_woocommerce_callback',
	) );
	$wp_customize->add_setting( 'site_separator_2', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new Artpop_Customize_Separator( $wp_customize, 'site_separator_2', array(
		'section' => 'site_options',
	) ) );
	$wp_customize->add_setting( 'site_fallback_image_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Heading( $wp_customize, 'site_fallback_image_title', array(
		'label'    => __( 'Fallback Image', 'artpop' ),
		'section'  => 'site_options',
	) ) );
	$wp_customize->add_setting( 'site_show_fallback_image', array(
		'default'           => artpop_defaults( 'site_show_fallback_image' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'site_show_fallback_image', array(
		'label'       => __( 'Display Fallback Image', 'artpop' ),
		'description' => __( 'A default fallback image will be used when a post is missing a featured image. (Only on Homepage and Archives)', 'artpop' ),
		'section'     => 'site_options',
		'type'        => 'checkbox',
	) );
	$wp_customize->add_setting( 'site_upsell_link', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Upsell( $wp_customize, 'site_upsell_link', array(
		'label'   => __( 'Need more options?', 'artpop' ),
		'section' => 'site_options',
	) ) );

	// Header Options
	$wp_customize->add_setting( 'header_layout', array(
		'default'           => artpop_defaults( 'header_layout' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Radio_Image(
		$wp_customize,
		'header_layout',
			array(
			'choices' => array(
				'header-1' => array(
					'img'  => get_template_directory_uri() . '/inc/customizer/images/header-01.svg',
				),
				'header-2' => array(
					'img'  => get_template_directory_uri() . '/inc/customizer/images/header-02.svg',
				),
			),
			'label'   => __( 'Header Layout', 'artpop' ),
			'section' => 'header_options',
			)
	) );
	$wp_customize->add_setting( 'header_menu_options_title', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Heading( $wp_customize, 'header_menu_options_title', array(
		'label'    => __( 'Header Options', 'artpop' ),
		'section'  => 'header_options',
	) ) );
	$wp_customize->add_setting( 'header_sticky', array(
		'default' => artpop_defaults( 'header_sticky' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_sticky', array(
		'label'    => __( 'Sticky header on scroll', 'artpop' ),
		'section'  => 'header_options',
		'type'     => 'checkbox',
	) );
	$wp_customize->add_setting( 'header_show_social_menu', array(
		'default'           => artpop_defaults( 'header_show_social_menu' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_show_social_menu', array(
		'label'       => __( 'Display Social Icons', 'artpop' ),
		'description' => __( 'To add Social Icons create a new menu, add custom links to your Social Media and assign the menu to Social Menu location.', 'artpop' ),
		'section'     => 'header_options',
		'type'        => 'checkbox',
	) );
	$wp_customize->add_setting( 'header_show_search_icon', array(
		'default'           => artpop_defaults( 'header_show_search_icon' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_show_search_icon', array(
		'label'    => __( 'Display Search Icon', 'artpop' ),
		'section'  => 'header_options',
		'type'     => 'checkbox',
	) );
	$wp_customize->add_setting( 'header_show_woo_cart', array(
		'default'           => artpop_defaults( 'header_show_woo_cart' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_show_woo_cart', array(
		'label'           => __( 'Display WooCommerce Cart Link', 'artpop' ),
		'section'         => 'header_options',
		'type'            => 'checkbox',
		'active_callback' => 'artpop_woocommerce_callback',
	) );
	$wp_customize->add_setting( 'header_upsell_link', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Upsell( $wp_customize, 'header_upsell_link', array(
		'label'   => __( 'Need more options?', 'artpop' ),
		'section' => 'header_options',
	) ) );

	// Site Logo
	$wp_customize->add_setting( 'site_logo_size', array(
		'default'           => artpop_defaults( 'site_logo_size' ),
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'site_logo_size', array(
		'label'       => __( 'Logo Max Width (Desktop and Tablet)', 'artpop' ),
		'description' => __( 'Enter a value in pixel. The Logo image will fit all the available space, depends on the Site Header Layout.', 'artpop' ),
		'section'     => 'site_logo',
		'type'        => 'numeric',
		'priority'    => 2,
	) );
	$wp_customize->add_setting( 'site_logo_show_tagline', array(
		'default'           => artpop_defaults( 'site_logo_show_tagline' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'site_logo_show_tagline', array(
		'label'    => __( 'Display Tagline below Site Title/Logo', 'artpop' ),
		'section'  => 'site_logo',
		'type'     => 'checkbox',
		'priority' => 3,
	) );

	// Homepage Options
	$wp_customize->add_setting( 'home_custom_blog_title', array(
		'default'           => artpop_defaults( 'home_custom_blog_title' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'home_custom_blog_title', array(
		'label'       => __( 'Blog Title', 'artpop' ),
		'description' => __( 'Add a custom Blog Title to your Homepage.', 'artpop' ),
		'section'     => 'home_options',
		'type'        => 'text',
	) );
	$wp_customize->add_setting( 'home_custom_blog_description', array(
		'default'           => artpop_defaults( 'home_custom_blog_description' ),
		'sanitize_callback' => 'artpop_sanitize_html',
	) );
	$wp_customize->add_control( 'home_custom_blog_description', array(
		'label'       => __( 'Blog Title Description', 'artpop' ),
		'description' => __( 'Add a custom text below Blog Title. HTML tags are allowed: strong, em, b, i, br.', 'artpop' ),
		'section'     => 'home_options',
		'type'        => 'textarea',
	) );
	$wp_customize->add_setting( 'home_separator_1', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new Artpop_Customize_Separator( $wp_customize, 'home_separator_1', array(
		'section' => 'home_options',
	) ) );
	$wp_customize->add_setting( 'home_layout', array(
		'default'           => artpop_defaults( 'home_layout' ),
		'sanitize_callback' => 'artpop_sanitize_choices',
	) );
	$wp_customize->add_control( 'home_layout', array(
		'label'    => __( 'Homepage Layout', 'artpop' ),
		'section'  => 'home_options',
		'type'     => 'radio',
		'choices'  => array(
			'grid-half'  => __('Grid 2 Columns', 'artpop'),
			'grid-third' => __('Grid 3 Columns', 'artpop'),
	) ) );
	$wp_customize->add_setting( 'home_upsell_link', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Upsell( $wp_customize, 'home_upsell_link', array(
		'label'   => __( 'Need more options?', 'artpop' ),
		'section' => 'home_options',
	) ) );

	// Featured Posts
	$wp_customize->add_setting( 'home_show_featured_posts', array(
		'default'           => artpop_defaults( 'home_show_featured_posts' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'home_show_featured_posts', array(
		'label'       => __( 'Display Featured Posts', 'artpop' ),
		'description' => __( 'Check this option to display Featured Posts at the top of the Homepage.', 'artpop' ),
		'section'     => 'home_featured_posts',
		'type'        => 'checkbox',
	) );
	$wp_customize->add_setting( 'home_featured_posts_layout', array(
		'default'           => artpop_defaults( 'home_featured_posts_layout' ),
		'sanitize_callback' => 'artpop_sanitize_choices',
	) );
	$wp_customize->add_control( 'home_featured_posts_layout', array(
		'label'    => __( 'Layout', 'artpop' ),
		'section'  => 'home_featured_posts',
		'type'     => 'radio',
		'choices'  => array(
			'featured-grid'     => __( 'Grid (5 Posts)', 'artpop' ),
			'featured-carousel' => __( 'Carousel (6 Posts)', 'artpop' ),
	) ) );
	$wp_customize->add_setting('home_featured_posts_cat', array(
		'default'           => artpop_defaults( 'home_featured_posts_cat' ),
		'sanitize_callback' => 'artpop_sanitize_choices',
	) );
	$wp_customize->add_control('home_featured_posts_cat', array(
		'label'       => __( 'Category', 'artpop' ),
		'description' => __('Select a category.', 'artpop'),
		'section'     => 'home_featured_posts',
		'type'        => 'select',
		'choices'     => $blog_categories
	) );
	$wp_customize->add_setting( 'home_exclude_featured_posts', array(
		'default'           => artpop_defaults( 'home_exclude_featured_posts' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'home_exclude_featured_posts', array(
		'label'       => __( 'Avoid duplicate posts', 'artpop' ),
		'description' => __('Enable this option to remove Featured Posts from the Homepage.', 'artpop'),
		'section'     => 'home_featured_posts',
		'type'        => 'checkbox',
	) );

	// Archive Options
	$wp_customize->add_setting( 'archive_layout', array(
		'default'           => artpop_defaults( 'archive_layout' ),
		'sanitize_callback' => 'artpop_sanitize_choices',
	) );
	$wp_customize->add_control( 'archive_layout', array(
		'label'    => __( 'Archive Layout', 'artpop' ),
		'section'  => 'archive_options',
		'type'     => 'radio',
		'choices'  => array(
			'grid-half'  => __('Grid 2 Columns', 'artpop'),
			'grid-third' => __('Grid 3 Columns', 'artpop'),
	) ) );

	// Post Options
	$wp_customize->add_setting( 'post_show_breadcrumbs', array(
		'default'           => artpop_defaults( 'post_show_breadcrumbs' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'post_show_breadcrumbs', array(
		'label'       => __( 'Display Breadcrumbs Navigation', 'artpop' ),
		'description' => __( 'Display Yoast SEO breadcrumbs at the top of the Post. (Yoast SEO 2.3 or higher is required)', 'artpop' ),
		'section'     => 'post_options',
		'type'        => 'checkbox',
	) );
	$wp_customize->add_setting( 'post_show_author_bio', array(
		'default'           => artpop_defaults( 'post_show_author_bio' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'post_show_author_bio', array(
		'label'   => __( 'Display Author Bio', 'artpop' ),
		'section' => 'post_options',
		'type'    => 'checkbox',
	) );

	// Footer Options
	$wp_customize->add_setting( 'footer_show_social_menu', array(
		'default'           => artpop_defaults( 'footer_show_social_menu' ),
		'sanitize_callback' => 'artpop_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'footer_show_social_menu', array(
		'label'       => __( 'Display Social Icons', 'artpop' ),
		'description' => __( 'To add Social Icons create a new menu, add custom links to your Social Media and assign the menu to Social Menu location.', 'artpop' ),
		'section'     => 'footer_options',
		'type'        => 'checkbox',
	) );

	// Colors
	$wp_customize->add_setting( 'site_title_color', array(
		'default'           => artpop_defaults( 'site_title_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_color', array(
		'label'    => __( 'Site Title color', 'artpop' ),
		'section'  => 'colors',
		'priority' => 2,
	) ) );
	$wp_customize->add_setting( 'site_tagline_color', array(
		'default'           => artpop_defaults( 'site_tagline_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_tagline_color', array(
		'label'    => __( 'Site Tagline color', 'artpop' ),
		'section'  => 'colors',
		'priority' => 3,
	) ) );
	$wp_customize->add_setting( 'color_separator_1', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control( new Artpop_Customize_Separator( $wp_customize, 'color_separator_1', array(
		'priority' => 4,
		'section'  => 'colors',
	) ) );
	$wp_customize->add_setting( 'accent_color', array(
		'default'           => artpop_defaults( 'accent_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'label'    => __( 'Accent color', 'artpop' ),
		'priority' => 5,
		'section'  => 'colors',
	) ) );
	$wp_customize->add_setting( 'colors_upsell_link', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Artpop_Customize_Upsell( $wp_customize, 'colors_upsell_link', array(
		'label'   => __( 'Need more options?', 'artpop' ),
		'section' => 'colors',
	) ) );
}
add_action('customize_register', 'artpop_theme_customizer');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function artpop_customize_preview_js() {
	wp_enqueue_script( 'artpop-customizer-js', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), '20191205', true );
}
add_action( 'customize_preview_init', 'artpop_customize_preview_js' );

/**
 * Loads custom stylesheet.
 */
function artpop_customizer_style() {
	wp_enqueue_style('artpop-customizer-styles', get_template_directory_uri() . '/assets/css/customize-style.css', array(), '20200827' );
}
add_action( 'customize_controls_enqueue_scripts', 'artpop_customizer_style' );

/**
 * Render the site title for the selective refresh partial.
 */
function artpop_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function artpop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
