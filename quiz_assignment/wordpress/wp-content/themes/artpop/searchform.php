<?php
/**
 * Displays the searchform of the theme.
 *
 * @package Artpop
 * @since Artpop 1.0
 */

// Generate a unique ID for each form.
$unique_id = artpop_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="search-form clear" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'artpop' ); ?></span>
		<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'artpop' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
		<?php echo artpop_get_svg( array( 'icon' => 'search' ) ); ?>
		<span class="screen-reader-text"><?php _ex( 'Search', 'submit button', 'artpop' ); ?></span>
	</button>
</form>
