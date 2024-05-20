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
		'menu_icon' => 'dashicons-groups',
		'taxonomies' => array( 'category' ),
	);
		
	// Registering your Custom Post Type
	register_post_type( 'team', $args );
	
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

add_action( 'init', 'register_hire_developer', 0 );