<?php
function register_post_type_product_init() {
  $labels = array(
    'name' 					=> _x( 'Products','post type general name','pwd'),
    'singular_name' 		=> _x( 'Product','post type general name','pwd'),
    'add_new' 				=> __( 'Add New','pwd'),
    'add_new_item' 			=> __( 'Add New Product','pwd'),
    'edit_item' 			=> __( 'Edit Product','pwd'),
    'new_item' 				=> __( 'New Product','pwd'),
    'all_items' 			=> __( 'All Products','pwd'),
    'view_item' 			=> __( 'View Product','pwd'),
    'search_items' 			=> __( 'Search Products','pwd'),
    'not_found' 			=> __( 'No products found','pwd'),
    'not_found_in_trash' 	=> __( 'No products found in Trash', 'pwd'),
    'menu_name' 			=> __( 'Products','pwd'),
  );
  $args = array(
    'labels' 				=> $labels,
    'public' 				=> true,
    'publicly_queryable' 	=> true,
    'show_ui' 				=> true, 
    'show_in_menu' 			=> true, 
    'query_var' 			=> true,
    'rewrite' 				=> array( 'slug' => 'product' ),
    'capability_type' 		=> 'page',
    'has_archive' 			=> true, 
    'hierarchical' 			=> true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-cart',
    'supports' 				=> array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' )
  ); 
  register_post_type( 'product', $args );

    // Register and configure Product Category taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Product Categories','taxonomy general name', 'pwd' ),
        'singular_name'     => _x( 'Product Category','taxonomy general name', 'pwd' ),
        'search_items'      =>  __( 'Search Product Categories','pwd' ),
        'all_items'         => __( 'All Product Categories','pwd'),
        'parent_item'       => __( 'Parent Product Categories','pwd'),
        'parent_item_colon' => __( 'Parent Product Category','pwd'),
        'edit_item'         => __( 'Edit Product Category','pwd'),
        'update_item'       => __( 'Update Product Category','pwd'),
        'add_new_item'      => __( 'Add New Product Category','pwd'),
        'new_item_name'     => __( 'New Product Category','pwd'),
        'menu_name'         => __( 'Categories','pwd')
        );

    register_taxonomy( 'product_category', 'product', array(
        'hierarchical'  => true,
        'labels'        => $taxonomy_labels,
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => array( 'slug' => 'products' )
        )
    );

}
add_action( 'init', 'register_post_type_product_init' );
?>