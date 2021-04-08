<?php
/**
 * The Header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-template-parts
 *
 * @package Artpop
 * @since Artpop 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
wp_body_open();
?>

<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="<?php artpop_header_class(); ?>">
			<div class="main-header" id="main-header">
				<?php get_template_part( 'template-parts/header/' . artpop_header_template() ); ?>
			</div>
			<div class="mobile-header" id="mobile-header">
				<div class="container">
					<div class="mobile-header-wrapper">
						<button class="menu-toggle" aria-controls="main-menu" aria-expanded="false"><i></i></button>
						<div class="site-branding">
							<?php artpop_custom_logo(); ?>
						</div>
						<?php artpop_search_popup(); ?>
					</div>
				</div>
			</div>
		</div>
	</header><!-- .site-header -->

	<?php artpop_featured_posts(); ?>

	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
