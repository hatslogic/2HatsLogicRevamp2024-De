<?php
require_once( 'Theme_Avatar.php' );

/**
 * Register an attachment to serve as a default avatar throughout the site
 */
function app_register_default_avatar( $attachment_id ) {
	Theme_Avatar::register_default_avatar( $attachment_id );
}

/**
 * Register a user meta key which will be checked for a valid attachment id
 * whenever an avatar has to be displayed for a site user
 *
 * Can be called multiple times to register fallbacks
 */
function app_register_avatar_user_meta_key( $meta_key ) {
	Theme_Avatar::register_avatar_user_meta_key( $meta_key );
}

Theme_Avatar::apply_hooks();