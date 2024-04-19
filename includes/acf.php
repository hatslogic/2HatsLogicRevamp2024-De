<?php
// Register Theme Options
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
	    'page_title' => __('Theme Options', 'sage'),
	    'menu_title' => __('Theme Options', 'sage'),
	    'menu_slug'  => 'theme-options-page',
	) );
}

// ACF get_field() fallback function
add_action( 'plugins_loaded', 'app_acf_get_field_fallback_function' );
function app_acf_get_field_fallback_function() {
	if( function_exists( 'get_field' ) ) {
		return;
	}

	function get_field( $key, $post_id = false, $format_value = true ) {
		if( $post_id ) {
			return get_post_meta( $post_id, $key, true );
		}

		global $post;
		return get_post_meta( $post->ID, $key, true );
	}
}

/**
 * Populate ACF select field Team Members options
 */
add_filter( 'acf/load_field/name=post_author', 'app_populate_post_authors_options' );
function app_populate_post_authors_options( $field ) {
	if ( ! class_exists( 'GFFormsModel' ) ) {
		return $field;
	}

	$choices = [
		0 => __( 'None', 'app' )
	];

	$authors = get_posts( array(
		'post_type'      => 'app_team_member',
		'posts_per_page' => -1
	) );

	foreach ( $authors as $author ) {
		$choices[ $author->ID ] = esc_html( $author->post_title );
	}

	$field['choices'] = $choices;

	return $field;
}

/**
 * Populate ACF select field options with Gravity Forms
 */
add_filter( 'acf/load_field/name=careers_contact_form', 'app_populate_gf_forms_ids' );
add_filter( 'acf/load_field/name=internship_contact_form', 'app_populate_gf_forms_ids' );
add_filter( 'acf/load_field/name=form_id', 'app_populate_gf_forms_ids' );
function app_populate_gf_forms_ids( $field ) {
	if ( ! class_exists( 'GFFormsModel' ) ) {
		return $field;
	}

	$choices = [];

	foreach ( \GFFormsModel::get_forms() as $form ) {
		$choices[ $form->id ] = $form->title;
	}

	$field['choices'] = $choices;

	return $field;
}