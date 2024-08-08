<?php

# Custom hierarchical taxonomy (like categories)
register_taxonomy(
	'app_career_type', # Taxonomy name
	array( 'app_career' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'              => __( 'Types', 'app' ),
			'singular_name'     => __( 'Custom Taxonomy', 'app' ),
			'search_items'      => __( 'Search Types', 'app' ),
			'all_items'         => __( 'All Types', 'app' ),
			'parent_item'       => __( 'Parent Custom Taxonomy', 'app' ),
			'parent_item_colon' => __( 'Parent Custom Taxonomy:', 'app' ),
			'view_item'         => __( 'View Custom Taxonomy', 'app' ),
			'edit_item'         => __( 'Edit Custom Taxonomy', 'app' ),
			'update_item'       => __( 'Update Custom Taxonomy', 'app' ),
			'add_new_item'      => __( 'Add New Custom Taxonomy', 'app' ),
			'new_item_name'     => __( 'New Custom Taxonomy Name', 'app' ),
			'menu_name'         => __( 'Types', 'app' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'career-type' ),
	)
);

register_taxonomy(
	'app_project_type', # Taxonomy name
	array( 'app_work' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'              => __( 'Types', 'app' ),
			'singular_name'     => __( 'Custom Taxonomy', 'app' ),
			'search_items'      => __( 'Search Types', 'app' ),
			'all_items'         => __( 'All Types', 'app' ),
			'parent_item'       => __( 'Parent Custom Taxonomy', 'app' ),
			'parent_item_colon' => __( 'Parent Custom Taxonomy:', 'app' ),
			'view_item'         => __( 'View Custom Taxonomy', 'app' ),
			'edit_item'         => __( 'Edit Custom Taxonomy', 'app' ),
			'update_item'       => __( 'Update Custom Taxonomy', 'app' ),
			'add_new_item'      => __( 'Add New Custom Taxonomy', 'app' ),
			'new_item_name'     => __( 'New Custom Taxonomy Name', 'app' ),
			'menu_name'         => __( 'Types', 'app' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-type' ),
	)
);

register_taxonomy(
	'news_press_category', # Taxonomy name
	array( 'news_press' ), # Post Types
	array( # Arguments
		'labels'            => array(
			'name'              => __( 'Categories', 'app' ),
			'singular_name'     => __( 'Category', 'app' ),
			'search_items'      => __( 'Search Category', 'app' ),
			'all_items'         => __( 'All Category', 'app' ),
			'parent_item'       => __( 'Parent Category', 'app' ),
			'parent_item_colon' => __( 'Parent Category:', 'app' ),
			'view_item'         => __( 'View Category', 'app' ),
			'edit_item'         => __( 'Edit Category', 'app' ),
			'update_item'       => __( 'Update Category', 'app' ),
			'add_new_item'      => __( 'Add New Category', 'app' ),
			'new_item_name'     => __( 'New Category Name', 'app' ),
			'menu_name'         => __( 'Category', 'app' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'news_press_category' ),
	)
);
