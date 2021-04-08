<?php
/**
 * Create Getting Started Page Menu Item.
 */
function artpop_admin_menu() {
	add_theme_page( 'Getting Started', 'Getting Started', 'manage_options', 'getting_started.php', 'artpop_getting_started', 100  );
}
add_action( 'admin_menu', 'artpop_admin_menu' );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function artpop_admin_style( $hook ) {
	if ( 'appearance_page_getting_started' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'artpop-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', array(), '20201110' );
}
add_action( 'admin_enqueue_scripts', 'artpop_admin_style' );


function artpop_getting_started() { ?>

	<div class="wrap about-wrap full-width-layout">
		<section class="dl-getting-started">

			<h1>
				<?php _e('Getting started', 'artpop'); ?>
			</h1>
			<p class="about-text">
				<?php
				$my_theme = wp_get_theme();
				printf(
					__( 'Thanks for choosing %s Theme!', 'artpop' ),
					$my_theme->get( 'Name' )
				);
				?>
			</p>

			<div class="dl-flex-row">
				<div class="dl-column">
					<div class="dl-content">
						<span class="dashicons dashicons-book large-icon"></span>
						<h3><?php _e( 'Documentation', 'artpop' ); ?></h3>
						<p>
							<?php printf(
							__( 'Follow our detailed <a href="%s" target="_blank">documentation</a> to help you to setup and use this theme.', 'artpop' ),
							esc_url( 'https://designlabthemes.com/artpop-documentation/?utm_source=getting_started_page&utm_medium=wordpress_dashboard&utm_campaign=artpop_getting_started' )
							); ?>
						</p>
						<p>
							<a class="button button-primary" href="<?php echo esc_url( 'https://designlabthemes.com/artpop-documentation/?utm_source=getting_started_page&utm_medium=wordpress_dashboard&utm_campaign=artpop_getting_started' ); ?>" target="_blank"><?php _e( 'Theme Documentation', 'artpop' ); ?></a>
						</p>
					</div>
				</div>
				<div class="dl-column">
					<div class="dl-content">
						<span class="dashicons dashicons-download large-icon"></span>
						<h3><?php _e( 'Demo Content', 'artpop' ); ?></h3>
						<p>
							<?php printf(
							__( 'You can <a href="%s" target="_blank">install our demo content</a> to give you a head start in setting up your site.', 'artpop' ),
							esc_url( 'https://www.designlabthemes.com/import-demo-content-wordpress/?utm_source=getting_started_page&utm_medium=wordpress_dashboard&utm_campaign=artpop_getting_started' )
							); ?>
						</p>
						<p>
							<a class="button button-primary" href="<?php echo esc_url( 'https://www.designlabthemes.com/import-demo-content-wordpress/?utm_source=getting_started_page&utm_medium=wordpress_dashboard&utm_campaign=artpop_getting_started' ); ?>" target="_blank"><?php _e( 'Download Demo Content', 'artpop' ); ?></a>
						</p>
					</div>
				</div>
				<div class="dl-column">
					<div class="dl-content">
						<span class="dashicons dashicons-awards large-icon"></span>
						<h3><?php _e( 'Try Artpop Pro', 'artpop' ); ?></h3>
						<p><?php _e( 'Need more customizations and flexibility?', 'artpop' ); ?></p>
						<p><?php _e( 'Premium Support, more Theme options, One Click Demo Content Import and more.', 'artpop' ); ?></p>
						<p>
							<a class="button button-primary" href="<?php echo esc_url( 'https://designlabthemes.com/artpop-pro-wordpress-theme/?utm_source=getting_started_page&utm_medium=wordpress_dashboard&utm_campaign=artpop_getting_started' ); ?>" target="_blank"><?php _e( 'View Artpop Pro', 'artpop' ); ?></a>
						</p>
					</div>
				</div>
			</div>

		</section>
	</div>

<?php }
