<?php
/**
 * Theme Fragment bootstrap code.
 */
require_once( 'Theme_Fragment.php' );

/**
 * Generic usage shortcut
 * Example usage:
 * - app_render_fragment('layout-block-left');
 * - app_render_fragment(array('layout-block-left', 'layout-block'), array('name'=>'John Doe'));
 */
if ( ! function_exists( 'app_render_fragment' ) ) {
	function app_render_fragment( $fragments, $context=array() ) {
		Theme_Fragment::create( $fragments, $context )->render();
	}
}
