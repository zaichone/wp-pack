<?php

function register_post_type_team_init() {

	$post_type_labels = array(
		'name' 				=> _x( 'Teams','post type general name','pwd'),
		'singular_name' 	=> _x( 'Team','post type general name','pwd'),
		'add_new' 			=> _x( 'Add New', 'team item','pwd'),
		'add_new_item' 		=> __( 'Add New Team','pwd'),
		'edit_item' 		=> __( 'Edit Team','pwd'),
		'new_item' 			=> __( 'New Team','pwd'),
		'view_item' 		=> __( 'View Team','pwd'),
		'search_items' 		=> __( 'Search Teams','pwd'),
		'not_found' 		=> __( 'No Teams found','pwd'),
		'not_found_in_trash'=> __( 'No Teams found in the trash','pwd'),
		'parent_item_colon' => ''
		);

	$args = array(
		'labels' 			=> $post_type_labels,
		'singular_label' 	=> _x( 'Team', 'post type singular label','pwd'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'_builtin' 			=> false,
		'_edit_link' 		=> 'post.php?post=%d',
		'capability_type' 	=> 'post',
		'hierarchical' 		=> false,
		'rewrite' 			=> array( 'slug' => 'team','pwd'),
		'query_var' 		=> 'true',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' ),
		'menu_position' 	=> 10,
		'menu_icon'			=> 'dashicons-groups'
		);
	// Register the post type
	register_post_type( 'team',$args);


	// Register and configure Team Category taxonomy
	// $taxonomy_labels = array(
	// 	'name' 					=> _x( 'Team Categories', 'taxonomy general name','pwd'),
	// 	'singular_name' 		=> _x( 'Team Category', 'taxonomy singular name','pwd'),
	// 	'search_items' 			=>  __( 'Search Team Categories','pwd'),
	// 	'all_items' 			=> __( 'All Team Categories','pwd'),
	// 	'parent_item' 			=> __( 'Parent Team Categories','pwd'),
	// 	'parent_item_colon' 	=> __( 'Parent Team Category','pwd'),
	// 	'edit_item' 			=> __( 'Edit Team Category','pwd'),
	// 	'update_item' 			=> __( 'Update Team Category','pwd'),
	// 	'add_new_item' 			=> __( 'Add New Team Category','pwd'),
	// 	'new_item_name' 		=> __( 'New Team Category','pwd'),
	// 	'menu_name' 			=> __( 'Categories','pwd')
	// 	);

	// register_taxonomy( 'team_category', 'team', array(
	// 	'hierarchical' 	=> true,
	// 	'labels' 		=> $taxonomy_labels,
	// 	'show_ui' 		=> true,
	// 	'query_var' 	=> true,
	// 	'rewrite' 		=> array( 'slug' => 'teams','pwd')
	// 	)
	// );

}

add_action( 'init', 'register_post_type_team_init','pwd');
