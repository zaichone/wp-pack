<?php
function register_post_type_brand_init() {

	$post_type_labels = array(
		'name' 				 => _x( 'Brands', 'post type general name' ),
		'singular_name' 	 => _x( 'Brand', 'post type singular name' ),
		'add_new' 			 => _x( 'Add New', 'brand item' ),
		'add_new_item' 		 => __( 'Add New Brand' ),
		'edit_item' 		 => __( 'Edit Brand' ),
		'new_item' 			 => __( 'New Brand' ),
		'view_item' 		 => __( 'View Brand' ),
		'search_items' 		 => __( 'Search Brands' ),
		'not_found' 		 =>  __( 'No Brands found' ),
		'not_found_in_trash' => __( 'No Brands found in the trash' ),
		'parent_item_colon'  => ''
		);

	$args = array(
		'labels' 			=> $post_type_labels,
		'singular_label' 	=> _x( 'Brand', 'post type singular label' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'_builtin' 			=> false,
		'_edit_link' 		=> 'post.php?post=%d',
		'capability_type' 	=> 'post',
		'hierarchical' 		=> false,
		'rewrite' 			=> array( 'slug' => 'brand' ),
		'query_var' 		=> 'brand',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' ),
		'menu_position' 	=> 5
		);
	// Register the post type
	register_post_type( 'brand',$args);


}

add_action( 'init', 'register_post_type_brand_init' );