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
				'slug' 	=> 'app-sections',
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
			'name'				=> 'app_headline',
			'title'				=> __( 'Headline (alternative styling)', 'app' ),
			'description'		=> __( 'Displays a Headline', 'app' ),
			'render_template'	=> 'fragments/blocks/headline.php',
			'category'			=> 'app-sections',
			'icon'				=> 'heading',
			'keywords'			=> array( 'headline', 'alternative', 'custom', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );

		// Headline & Image
		acf_register_block_type( array(
			'name'				=> 'app_headline_and_image',
			'title'				=> __( 'Headline & Image', 'app' ),
			'description'		=> __( 'Displays a Headline & Image', 'app' ),
			'render_template'	=> 'fragments/blocks/headline-and-image.php',
			'category'			=> 'app-sections',
			'icon'				=> 'format-aside',
			'keywords'			=> array( 'headline', 'image', 'custom', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );

		// Post Content
		acf_register_block_type( array(
			'name'				=> 'app_post_content',
			'title'				=> __( 'Journal Content', 'app' ),
			'description'		=> __( 'Journal content', 'app' ),
			'render_template'	=> 'fragments/blocks/post-content.php',
			'category'			=> 'app-sections',
			'icon'				=> 'format-aside',
			'keywords'			=> array( 'headline', 'image', 'custom', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );

		// Content Download Form
		acf_register_block_type( array(
			'name'				=> 'app_content_download_form',
			'title'				=> __( 'Content Download Form', 'app' ),
			'description'		=> __( 'Content Download Form', 'app' ),
			'render_template'	=> 'fragments/blocks/content-download-form.php',
			'category'			=> 'app-sections',
			'icon'				=> 'format-aside',
			'keywords'			=> array( 'content', 'image', 'download', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );

		// Content Download Form
		acf_register_block_type( array(
			'name'				=> 'app_say_do_gap_ebook_download_form',
			'title'				=> __( 'Say Do Gap eBook Download Form', 'app' ),
			'description'		=> __( 'Say Do Gap eBook Download Form', 'app' ),
			'render_template'	=> 'fragments/blocks/say-do-gap-ebook-download-form.php',
			'category'			=> 'app-sections',
			'icon'				=> 'format-aside',
			'keywords'			=> array( 'content', 'image', 'download', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );

		// Content Download Form
		acf_register_block_type( array(
			'name'				=> 'app_checklist_download_form',
			'title'				=> __( 'Checklist Download Form', 'app' ),
			'description'		=> __( 'Checklist Download Form', 'app' ),
			'render_template'	=> 'fragments/blocks/checklist-download-form.php',
			'category'			=> 'app-sections',
			'icon'				=> 'format-aside',
			'keywords'			=> array( 'content', 'image', 'download', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );

		// Line Break
		acf_register_block_type( array(
			'name'				=> 'line_break',
			'title'				=> __( 'Line Break', 'app' ),
			'description'		=> __( 'Line Break', 'app' ),
			'render_template'	=> 'fragments/blocks/line-break.php',
			'category'			=> 'app-sections',
			'icon'				=> 'format-aside',
			'keywords'			=> array( 'content', 'image', 'download', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );
		
		// Grey Box Content for posts
		acf_register_block_type( array(
			'name'				=> 'grey_box_contnet',
			'title'				=> __( 'Grey Box Content', 'app' ),
			'description'		=> __( 'Grey Box Content', 'app' ),
			'render_template'	=> 'fragments/blocks/grey-box-content.php',
			'category'			=> 'app-sections',
			'icon'				=> 'format-aside',
			'keywords'			=> array( 'content', 'image', 'download', 'app', 'block' ),
			'mode' 				=> 'edit',
			'supports' 			=> array( 'mode' => false, 'align' => false )
		) );
	}
}