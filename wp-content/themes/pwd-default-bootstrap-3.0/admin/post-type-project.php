<?php

function register_post_type_project_init() {

  $labels = array(
    'name' 					=> _x( 'Projects','post type general name','pwd'),
    'singular_name' 		=> _x( 'Project','post type general name','pwd'),
    'add_new' 				=>  __( 'Add New','pwd'),
    'add_new_item' 			=>  __( 'Add New Project','pwd'),
    'edit_item' 			=>  __( 'Edit Project','pwd'),
    'new_item' 				=>  __( 'New Project','pwd'),
    'all_items' 			=>  __( 'All Projects','pwd'),
    'view_item' 			=>  __( 'View Project','pwd'),
    'search_items' 			=>  __( 'Search Projects','pwd'),
    'not_found' 			=>  __( 'No projects found','pwd'),
    'not_found_in_trash' 	=>  __( 'No projects found in Trash', 'pwd'),
    'menu_name' 			=>  __( 'Projects','pwd'),
  );


  $args = array(
    'labels' 				=> $labels,
    'public' 				=> true,
    'publicly_queryable' 	=> true,
    'show_ui' 				=> true, 
    'show_in_menu' 			=> true, 
    'query_var' 			=> true,
    'rewrite' 				=> array( 'slug' => 'project' ),
    'capability_type' 		=> 'page',
    'has_archive' 			=> true, 
    'hierarchical' 			=> true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-portfolio',
    'supports' 				=> array( 'title', 'editor', 'thumbnail', 'excerpt','page-attributes' )
  ); 

  register_post_type( 'project', $args );

  // Register and configure Project Category taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Project Categories','taxonomy general name', 'pwd' ),
        'singular_name'     => _x( 'Project Category','taxonomy general name', 'pwd' ),
        'search_items'      =>  __( 'Search Project Categories','pwd' ),
        'all_items'         => __( 'All Project Categories','pwd'),
        'parent_item'       => __( 'Parent Project Categories','pwd'),
        'parent_item_colon' => __( 'Parent Project Category','pwd'),
        'edit_item'         => __( 'Edit Project Category','pwd'),
        'update_item'       => __( 'Update Project Category','pwd'),
        'add_new_item'      => __( 'Add New Project Category','pwd'),
        'new_item_name'     => __( 'New Project Category','pwd'),
        'menu_name'         => __( 'Categories','pwd')
        );

    register_taxonomy( 'project_category', 'project', array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'projects' )
        )
    );

}

add_action( 'init', 'register_post_type_project_init' );





add_filter( 'manage_edit-project_columns', 'pwd_project_columns');

function pwd_project_columns ( $columns ) {

    unset( $columns['date'] );
    $columns['project_category']            = 'Category';

   // $columns['date']                            = 'Date';

    return $columns;

}

add_action( 'manage_posts_custom_column', 'pwd_project_column',10,2 );

function pwd_project_column ( $column, $post_id ) {

    global $post;

    if( $post->post_type != 'project' ) return;

    switch( $column ) {

        case 'project_category':

        $list = get_the_term_list( $post->ID, 'project_category');
        echo 'SAMPC';
        echo $list == '' ? '<em>N/A</em>' : $list;

        break;


        default:

        $value = get_post_meta( $post->ID, $column, true );
        echo $value == '' ? '<em>N/A</em>' : $value;

    }

}

?>