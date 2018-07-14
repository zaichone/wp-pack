<?php

function register_post_type_faq_init() {

  $labels = array(
    'name' 					=> _x( 'FAQs','post type general name','pwd'),
    'singular_name' 		=> _x( 'FAQ','post type general name','pwd'),
    'add_new' 				=> __( 'Add New','pwd'),
    'add_new_item' 			=> __( 'Add New FAQ','pwd'),
    'edit_item' 			=> __( 'Edit FAQ','pwd'),
    'new_item' 				=> __( 'New FAQ','pwd'),
    'all_items' 			=> __( 'All FAQs','pwd'),
    'view_item' 			=> __( 'View FAQ','pwd'),
    'search_items' 			=> __( 'Search FAQs','pwd'),
    'not_found' 			=> __( 'No faqs found','pwd'),
    'not_found_in_trash' 	=> __( 'No faqs found in Trash','pwd'), 
    'menu_name' 			=> __( 'FAQs','pwd'),
    );

  $args = array(
    'labels' 				=> $labels,
    'public' 				=> true,
    'publicly_queryable' 	=> true,
    'show_ui' 				=> true, 
    'show_in_menu' 			=> true, 
    'query_var' 			=> true,
    'rewrite' 				=> array( 'slug' => 'faq' ),
    'capability_type' 		=> 'page',
    'has_archive' 			=> true, 
    'hierarchical' 			=> true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-info',
    'supports' 				=> array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' )
    ); 

  register_post_type( 'faq', $args );

  $taxonomy_labels = array(
    'name'              => _x( 'FAQ Categories','taxonomy general name','pwd'),
    'singular_name'     => _x( 'FAQ Category','taxonomy general name','pwd'),
    'search_items'      =>  __( 'Search FAQ Categories','pwd' ),
    'all_items'         => __( 'All FAQ Categories','pwd' ),
    'parent_item'       => __( 'Parent FAQ Categories','pwd' ),
    'parent_item_colon' => __( 'Parent FAQ Category','pwd' ),
    'edit_item'         => __( 'Edit FAQ Category','pwd' ),
    'update_item'       => __( 'Update FAQ Category','pwd' ),
    'add_new_item'      => __( 'Add New FAQ Category','pwd' ),
    'new_item_name'     => __( 'New FAQ Category','pwd' ),
    'menu_name'         => __( 'Categories','pwd' )
    );

  register_taxonomy( 'faq_category', 'faq', array(
    'hierarchical'  => true,
    'labels'        => $taxonomy_labels,
    'show_ui'       => true,
    'query_var'     => true,
    'rewrite'       => array( 'slug' => 'faqs','pwd' )
    )
  );

}

add_action( 'init', 'register_post_type_faq_init','pwd' );


add_filter( 'manage_edit-faq_columns', 'pwd_faq_columns');

function pwd_faq_columns ( $columns ) {

    unset( $columns['date'] );
    $columns['faq_category']            = 'Category';

   // $columns['date']                            = 'Date';

    return $columns;

}

add_action( 'manage_posts_custom_column', 'pwd_faq_column',10,2 );

function pwd_faq_column ( $column, $post_id ) {

    global $post;

    if( $post->post_type != 'faq') return;

    switch( $column ) {

        case 'faq_category':

        $list = get_the_term_list( $post->ID, 'faq_category', null, ', ', null );
        echo $list == '' ? '<em>N/A</em>' : $list;

        break;


        default:

        $value = get_post_meta( $post->ID, $column, true );
        echo $value == '' ? '<em>N/A</em>' : $value;

    }

}

?>