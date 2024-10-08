<?php
function register_team() {
  
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Teams', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Teams', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Team', 'twentythirteen' ),
		'all_items'           => __( 'Teams', 'twentythirteen' ),
		'view_item'           => __( 'View Team', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Team', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Team', 'twentythirteen' ),
		'update_item'         => __( 'Update Team', 'twentythirteen' ),
		'search_items'        => __( 'Search Team', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
		  
	// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'Team', 'twentythirteen' ),
		'description'         => __( 'Showcase of teams', 'twentythirteen' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		// 'menu_position'       => 30,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
		'show_in_rest'        => false,
		'menu_icon' => 'dashicons-groups'
	);
		
	// Registering your Custom Post Type
	register_post_type( 'teams', $args );
	
}

add_action( 'init', 'register_team', 0 );

function register_testimonial() {
  
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Testimonials', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Testimonial', 'twentythirteen' ),
		'all_items'           => __( 'Testimonials', 'twentythirteen' ),
		'view_item'           => __( 'View Testimonial', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Testimonial', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Testimonial', 'twentythirteen' ),
		'update_item'         => __( 'Update Testimonial', 'twentythirteen' ),
		'search_items'        => __( 'Search Testimonial', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
		  
	// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'Testimonial', 'twentythirteen' ),
		'description'         => __( 'Showcase of testimonial', 'twentythirteen' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => true,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		// 'menu_position'       => 30,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'menu_icon' => 'dashicons-format-quote'
	);
		
	// Registering your Custom Post Type
	register_post_type( 'testimonial', $args );
	
}

add_action( 'init', 'register_testimonial', 0 );

function register_case_study() {
  
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Case Studies', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Case Studies', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Case Study', 'twentythirteen' ),
		'all_items'           => __( 'Case Studies', 'twentythirteen' ),
		'view_item'           => __( 'View Case Study', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Case Study', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Case Study', 'twentythirteen' ),
		'update_item'         => __( 'Update Case Study', 'twentythirteen' ),
		'search_items'        => __( 'Search Case Study', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
		  
	// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'case-study', 'twentythirteen' ),
		'description'         => __( 'Showcase of case studies', 'twentythirteen' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		// 'menu_position'       => 30,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'menu_icon' => 'dashicons-portfolio',
		'taxonomies' => array( 'category' ),
		'rewrite' => array( 'slug' => 'case-studies' )
	);
		
	// Registering your Custom Post Type
	register_post_type( 'case-study', $args );
	
}

add_action( 'init', 'register_case_study', 0 );

function register_service() {
  
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Services', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Service', 'twentythirteen' ),
		'all_items'           => __( 'Services', 'twentythirteen' ),
		'view_item'           => __( 'View Service', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Service', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Service', 'twentythirteen' ),
		'update_item'         => __( 'Update Service', 'twentythirteen' ),
		'search_items'        => __( 'Search Service', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
		  
	// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'service', 'twentythirteen' ),
		'description'         => __( 'Showcase of services', 'twentythirteen' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		// 'menu_position'       => 30,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'menu_icon' => 'dashicons-screenoptions',
		'taxonomies' => array( 'category' ),
	);
		
	// Registering your Custom Post Type
	register_post_type( 'service', $args );
	
}

add_action( 'init', 'register_service', 0 );

function register_hire_developer() {
  
	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Hire Developers', 'Post Type General Name', 'twentythirteen' ),
		'singular_name'       => _x( 'Hire a developer', 'Post Type Singular Name', 'twentythirteen' ),
		'menu_name'           => __( 'Hire Developers', 'twentythirteen' ),
		'parent_item_colon'   => __( 'Parent Hire a developer', 'twentythirteen' ),
		'all_items'           => __( 'Hire Developers', 'twentythirteen' ),
		'view_item'           => __( 'View Hire a developer', 'twentythirteen' ),
		'add_new_item'        => __( 'Add New Hire a developer', 'twentythirteen' ),
		'add_new'             => __( 'Add New', 'twentythirteen' ),
		'edit_item'           => __( 'Edit Hire a developer', 'twentythirteen' ),
		'update_item'         => __( 'Update Hire a developer', 'twentythirteen' ),
		'search_items'        => __( 'Search Hire a developer', 'twentythirteen' ),
		'not_found'           => __( 'Not Found', 'twentythirteen' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
	);
		  
	// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'hide-developer', 'twentythirteen' ),
		'description'         => __( 'Showcase of services', 'twentythirteen' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes', 'comments', 'revisions', 'custom-fields', ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		// 'menu_position'       => 30,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'menu_icon' => 'dashicons-shortcode',
		'taxonomies' => array( 'category' ),
	);
		
	// Registering your Custom Post Type
	register_post_type( 'hide-developer', $args );
	
}

// add_action( 'init', 'register_hire_developer', 0 );

function register_help_desk() {

	$labels = [
		"name" => esc_html__( "Help Desk", "hatslogic" ),
		"singular_name" => esc_html__( "Help Desk", "hatslogic" ),
		"menu_name" => esc_html__( "Help Desk", "hatslogic" ),
	];

	$args = [
		"label" => esc_html__( "Help Desk", "hatslogic" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "help-desk", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-editor-help",
		"supports" => [ "title", "editor", "excerpt", "custom-fields", "revisions", "thumbnail", "author", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "help-desk", $args );
}

add_action( 'init', 'register_help_desk' );

// help_desk_category taxonomy
function register_help_desk_category() {
	$labels = array(
		'name'              => _x( 'Help Desk Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Help Desk Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Help Desk Categories' ),
		'all_items'         => __( 'All Help Desk Categories' ),
		'parent_item'       => __( 'Parent Help Desk Category' ),
		'parent_item_colon' => __( 'Parent Help Desk Category:' ),
		'edit_item'         => __( 'Edit Help Desk Category' ),
		'update_item'       => __( 'Update Help Desk Category' ),
		'add_new_item'      => __( 'Add New Help Desk Category' ),
		'new_item_name'     => __( 'New Help Desk Category Name' ),
		'menu_name'         => __( 'Help Desk Category' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'help-desk-category' ),
	);
	register_taxonomy( 'help_desk_category', array( 'help-desk' ), $args );
}

add_action( 'init', 'register_help_desk_category' );