<?php
function register_post_type_slideshow_init() {
  $labels = array(
    'name'                  => _x( 'Slideshows','post type general name','pwd'),
    'singular_name'         => _x( 'Slideshow','post type general name','pwd'),
    'add_new'               => __( 'Add New','pwd'),
    'add_new_item'          => __( 'Add New Slideshow','pwd'),
    'edit_item'             => __( 'Edit Slideshow','pwd'),
    'new_item'              => __( 'New Slideshow','pwd'),
    'all_items'             => __( 'All Slideshows','pwd'),
    'view_item'             => __( 'View Slideshow','pwd'),
    'search_items'          => __( 'Search Slideshows','pwd'),
    'not_found'             => __(  'No slideshows found','pwd'),
    'not_found_in_trash'    => __( 'No slideshows found in Trash', 'pwd'),
    'menu_name'             => __( 'Slideshows','pwd'),

  );
  $args = array(
    'labels'                => $labels,
    'public'                => false,
    'publicly_queryable'    => false,
    'show_ui'               => true, 
    'show_in_menu'          => true, 
    'query_var'             => false,
    'rewrite'               => array( 'slug' => 'slideshow' ),
    'capability_type'       => 'post',
    'has_archive'           => true, 
    'hierarchical'          => false,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-slides',
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' )
  ); 
  register_post_type( 'slideshow', $args );
}
add_action( 'init', 'register_post_type_slideshow_init' );
?>