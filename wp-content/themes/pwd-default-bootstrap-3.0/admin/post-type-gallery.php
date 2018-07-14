<?php

function register_post_type_gallery_init() {

  $labels = array(
    'name' 					=> _x( 'Galleries','post type general name','pwd'),
    'singular_name' 		=> _x( 'Gallery','post type general name','pwd'),
    'add_new' 				=> __( 'Add New','pwd'),
    'add_new_item' 			=> __( 'Add New Gallery','pwd'),
    'edit_item' 			=> __( 'Edit Gallery','pwd'),
    'new_item' 				=> __( 'New Gallery','pwd'),
    'all_items' 			=> __( 'All Galleries','pwd'),
    'view_item' 			=> __( 'View Gallery','pwd'),
    'search_items' 			=> __( 'Search Galleries','pwd'),
    'not_found' 			=> __( 'No gallerys found','pwd'),
    'not_found_in_trash' 	=> __( 'No gallerys found in Trash', 'pwd'),
    'menu_name' 			=> __( 'Galleries','pwd'),
  );

  $args = array(
    'labels' 				=> $labels,
    'public' 				=> true,
    'publicly_queryable' 	=> true,
    'show_ui' 				=> true, 
    'show_in_menu' 			=> true, 
    'query_var' 			=> true,
    'rewrite' 				=> array( 'slug' => 'gallery' ),
    'capability_type' 		=> 'page',
    'has_archive' 			=> true, 
    'hierarchical' 			=> true,
    'menu_position'         => 5,
    'menu_icon'             =>'dashicons-format-gallery',
    'supports' 				=> array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' )
  ); 

  register_post_type( 'gallery', $args );

  // Register and configure Gallery Category taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Gallery Categories','taxonomy general name','pwd' ),
        'singular_name'     => _x( 'Gallery Category','taxonomy general name','pwd' ),
        'search_items'      =>  __( 'Search Gallery Categories','pwd'),
        'all_items'         => __( 'All Gallery Categories','pwd'),
        'parent_item'       => __( 'Parent Gallery Categories','pwd'),
        'parent_item_colon' => __( 'Parent Gallery Category','pwd'),
        'edit_item'         => __( 'Edit Gallery Category','pwd'),
        'update_item'       => __( 'Update Gallery Category','pwd'),
        'add_new_item'      => __( 'Add New Gallery Category','pwd'),
        'new_item_name'     => __( 'New Gallery Category','pwd'),
        'menu_name'         => __( 'Categories','pwd')
        );

    register_taxonomy( 'gallery_category', 'gallery', array(
        'hierarchical' => true,
        'labels' => $taxonomy_labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'gallerys' )
        )
    );

}

add_action( 'init', 'register_post_type_gallery_init' );





add_filter( 'manage_edit-gallery_columns', 'pwd_gallery_columns');

function pwd_gallery_columns ( $columns ) {

    unset( $columns['date'] );
    $columns['gallery_category']            = 'Category';

   // $columns['date']                            = 'Date';

    return $columns;

}

add_action( 'manage_posts_custom_column', 'pwd_gallery_column',10,2 );

function pwd_gallery_column ( $column, $post_id ) {

    global $post;

    if( $post->post_type != 'gallery' ) return;

    switch( $column ) {

        case 'gallery_category':

        $list = get_the_term_list( $post->ID, 'gallery_category');
        echo 'SAMPC';
        echo $list == '' ? '<em>N/A</em>' : $list;

        break;


        default:

        $value = get_post_meta( $post->ID, $column, true );
        echo $value == '' ? '<em>N/A</em>' : $value;

    }

}

?>