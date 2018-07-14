<?php

function register_post_type_testimonial_init() {

	// Setup core dependencies
	$post_type_labels = array(
		'name' 				=> _x( 'Testimonials','post type general name','pwd'),
		'singular_name' 	=> _x( 'Testimonial','post type general name','pwd'),
		'add_new' 			=> _x( 'Add New', 'testimonial item','pwd'),
		'add_new_item' 		=> __( 'Add New Testimonial','pwd'),
		'edit_item' 		=> __( 'Edit Testimonial','pwd'),
		'new_item' 			=> __( 'New Testimonial','pwd'),
		'view_item' 		=> __( 'View Testimonial','pwd'),
		'search_items' 		=> __( 'Search Testimonials','pwd'),
		'not_found' 		=>  __( 'No Testimonials found','pwd'),
		'not_found_in_trash'=> __( 'No Testimonials found in the trash','pwd'),
		'parent_item_colon' => ''
		);

	$args = array(
		'labels' 			=> $post_type_labels,
		'singular_label' 	=> _x( 'Testimonial', 'post type singular label','pwd'),
		'public' 			=> true,
		'show_ui' 			=> true,
		'_builtin' 			=> false,
		'_edit_link' 		=> 'post.php?post=%d',
		'capability_type' 	=> 'post',
		'hierarchical' 		=> false,
		'rewrite' 			=> array( 'slug' => 'testimonial','pwd'),
		'query_var' 		=> 'testimonial',
		'supports' 			=> array( 'title', 'editor', 'thumbnail','pwd'),
		'menu_position' 	=> 8,
		'menu_icon'			=> 'dashicons-format-status'
		);
	// Register the post type
	register_post_type( 'testimonial',$args);


	// Register and configure Testimonial Category taxonomy
	$taxonomy_labels = array(
		'name' 					=> _x( 'Testimonial Categories', 'taxonomy general name','pwd'),
		'singular_name' 		=> _x( 'Testimonial Category', 'taxonomy singular name','pwd'),
		'search_items' 			=>  __( 'Search Testimonial Categories','pwd'),
		'all_items' 			=> __( 'All Testimonial Categories','pwd'),
		'parent_item' 			=> __( 'Parent Testimonial Categories','pwd'),
		'parent_item_colon' 	=> __( 'Parent Testimonial Category','pwd'),
		'edit_item' 			=> __( 'Edit Testimonial Category','pwd'),
		'update_item' 			=> __( 'Update Testimonial Category','pwd'),
		'add_new_item' 			=> __( 'Add New Testimonial Category','pwd'),
		'new_item_name' 		=> __( 'New Testimonial Category','pwd'),
		'menu_name' 			=> __( 'Categories','pwd')
		);

	register_taxonomy( 'testimonial_category', 'testimonial', array(
		'hierarchical' 	=> true,
		'labels' 		=> $taxonomy_labels,
		'show_ui' 		=> true,
		'query_var' 	=> true,
		'rewrite' 		=> array( 'slug' => 'testimonials','pwd')
		)
	);

}

add_action( 'init', 'register_post_type_testimonial_init','pwd');



add_filter( 'manage_edit-testimonial_columns', 'pwd_testimonial_columns');

function pwd_testimonial_columns ( $columns ) {

	unset( $columns['date']);

	unset( $columns['wpseo-score']);
	unset( $columns['wpseo-title']);
	unset( $columns['wpseo-metadesc']);
	unset( $columns['wpseo-focuskw']);

	$columns['testimonial_thumbnail'] 			= 'Thumbnail';
	$columns['testimonial_client_name'] 		= 'Client';
	$columns['testimonial_client_company_name'] = 'Company';
	$columns['testimonial_category'] 			= 'Category';

	$columns['wpseo-score'] 			= 'SEO';
	$columns['wpseo-title'] 			= 'SEO Title';
	$columns['wpseo-metadesc'] 			= 'Meta Desc';
	$columns['wpseo-focuskw'] 			= 'Focus KW';
	
	return $columns;

}

add_action( 'manage_posts_custom_column', 'pwd_testimonial_column',10,2 );

function pwd_testimonial_column ( $column, $post_id ) {

	global $post;

	if( $post->post_type != 'testimonial') return;

	switch( $column ) {

		case 'testimonial_category':

		$list = get_the_term_list( $post->ID, 'testimonial_category', null, ', ', null );
		echo $list == '' ? '<em>N/A</em>' : $list;

		break;

		case 'testimonial_shortcode':
		echo sprintf( '[testimonial id="%s"]', $post->ID );
		break;

		case 'testimonial_thumbnail':

		if( has_post_thumbnail( $post->ID ) )
			echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), array( 64, 64 ) );
		else
			echo 'No thumbnail supplied';

		break;

		default:

		$value = get_post_meta( $post->ID, $column, true );
		echo $value == '' ? '<em>N/A</em>' : $value;

	}

}