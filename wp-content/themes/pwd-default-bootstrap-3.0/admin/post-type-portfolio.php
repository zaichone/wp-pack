<?php
function register_post_type_portfolio_init() {
	$labels = array(
		'name' 					=> _x( 'Portfolios','post type general name','pwd'),
		'singular_name' 		=> _x( 'Portfolio','post type general name','pwd'),
		'add_new' 				=>  __( 'Add New','pwd'),
		'add_new_item' 			=>  __( 'Add New Portfolio','pwd'),
		'edit_item' 			=>  __( 'Edit Portfolio','pwd'),
		'new_item' 				=>  __( 'New Portfolio','pwd'),
		'all_items' 			=>  __( 'All Portfolios','pwd'),
		'view_item' 			=>  __( 'View Portfolio','pwd'),
		'search_items' 			=>  __( 'Search Portfolios','pwd'),
		'not_found' 			=>  __( 'No portfolios found','pwd'),
		'not_found_in_trash' 	=>  __( 'No portfolios found in Trash', 'pwd'),
		'menu_name' 			=>  __( 'Portfolios','pwd'),
		);
	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true, 
		'show_in_menu' 			=> true, 
		'query_var' 			=> true,
		'rewrite' 				=> array( 'slug' => 'portfolio' ),
		'capability_type' 		=> 'page',
		'has_archive' 			=> true, 
		'hierarchical' 			=> true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'supports' 				=> array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' )
		); 
	register_post_type( 'portfolio', $args );

  // Register and configure Portfolio Category taxonomy
	$taxonomy_labels = array(
		'name'              => _x( 'Portfolio Categories','taxonomy general name', 'pwd' ),
		'singular_name'     => _x( 'Portfolio Category','taxonomy general name', 'pwd' ),
		'search_items'      =>  __( 'Search Portfolio Categories','pwd' ),
		'all_items'         => __( 'All Portfolio Categories','pwd'),
		'parent_item'       => __( 'Parent Portfolio Categories','pwd'),
		'parent_item_colon' => __( 'Parent Portfolio Category','pwd'),
		'edit_item'         => __( 'Edit Portfolio Category','pwd'),
		'update_item'       => __( 'Update Portfolio Category','pwd'),
		'add_new_item'      => __( 'Add New Portfolio Category','pwd'),
		'new_item_name'     => __( 'New Portfolio Category','pwd'),
		'menu_name'         => __( 'Categories','pwd')
		);
	register_taxonomy( 'portfolio_category', 'portfolio', array(
		'hierarchical'      => true,
		'labels'            => $taxonomy_labels,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolios' )
		)
	);
}


add_action( 'init', 'register_post_type_portfolio_init' );
add_filter( 'manage_edit-portfolio_columns', 'wpdt_portfolio_columns');
function wpdt_portfolio_columns ( $columns ) {
	unset( $columns['date'] );
	$columns['portfolio_category']            = 'Category';
   // $columns['date']                        = 'Date';
	return $columns;
}

add_action( 'manage_posts_custom_column', 'wpdt_portfolio_column',10,2 );
function wpdt_portfolio_column ( $column, $post_id ) {
	global $post;
	if( $post->post_type != 'portfolio' ) return;
	switch( $column ) {
		case 'portfolio_category':
		$list = get_the_term_list( $post->ID, 'portfolio_category');

		echo $list == '' ? '<em>N/A</em>' : $list;
		break;
		default:
		$value = get_post_meta( $post->ID, $column, true );
		echo $value == '' ? '<em>N/A</em>' : $value;
	}
}
?>