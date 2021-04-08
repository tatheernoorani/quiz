<?php
/**
 * Customizer callbacks
 *
 * @package Artpop
 * @since Artpop 1.0
 */


/**
 * Callback for WooCommerce.
 */
function artpop_woocommerce_callback( $control ) {
	if ( artpop_is_woocommerce_active() ) {
		return true;
	} else {
		return false;
	}
}
