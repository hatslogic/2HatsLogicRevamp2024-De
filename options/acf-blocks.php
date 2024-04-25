<?php
/**
 * 	Register ACF Blocks Category
 */
add_filter( 'block_categories_all', 'app_block_categories', 10, 2 );
function app_block_categories( $categories, $post ) {
	return array_merge(
		array(
			array(
				'title' => __( 'Custom Blocks', 'app' ),
				'slug' 	=> 'app-blocks',
				'icon'  => 'schedule',
			),
		),
		$categories
	);
}

add_action( 'acf/init', 'app_init_acf_block_types' );
function app_init_acf_block_types() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		// Headline
		acf_register_block_type( array(
			'name'				=> 'free_',
			'title'				=> __( 'Free Consultation', 'app' ),
			'description'		=> __( 'Displays free consultation modal', 'app' ),
			'render_template'	=> 'fragments/blocks/free-consultation.php',
			'category'			=> 'app-blocks',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'headline', 'alternative', 'custom', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );
	}
}