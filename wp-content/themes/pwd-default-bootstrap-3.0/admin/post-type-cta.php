<?php

function register_post_type_cta_init() {

    $post_type_labels = array(
        'name'              => _x( 'CTAs','post type general name','pwd'),
        'singular_name'     => _x( 'CTA','post type general name','pwd'),
        'add_new'           => __( 'Add New','pwd'),
        'add_new_item'      => __( 'Add New CTA','pwd'),
        'edit_item'         => __( 'Edit CTA','pwd'),
        'new_item'          => __( 'New CTA','pwd'),
        'view_item'         => __( 'View CTA','pwd'),
        'search_items'      => __( 'Search CTAs','pwd'),
        'not_found'         =>  __( 'No CTAs found','pwd'),
        'not_found_in_trash'=> __( 'No CTAs found in the trash','pwd'),
        'parent_item_colon' => ''
        );

    $args = array(
        'labels'            => $post_type_labels,
        'singular_label'    => _x( 'CTA', 'post type singular label','pwd'),
        'public'            => true,
        'show_ui'           => true,
        '_builtin'          => false,
        '_edit_link'        => 'post.php?post=%d',
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array( 'slug' => 'cta' ),
        'query_var'         => 'true',
        'menu_position'     => 11,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' ),
        'menu_icon'         =>'dashicons-welcome-widgets-menus',

        );

    // Register the post type
    register_post_type( 'cta',$args);

}
add_action( 'init', 'register_post_type_cta_init' );
?>