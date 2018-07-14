<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */
add_filter( 'cmb_meta_boxes', 'pwd_cmb_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function pwd_cmb_metaboxes( array $meta_boxes ) {


	# Example Functions
	# https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/blob/master/example-functions.php

	$prefix = 'pwd_';

	//	$meta_boxes[] = array(
	//		'id'         => 'about_page_metabox',
	//		'title'      => 'About Page Metabox',
	//		'pages'      => array( 'page', ), // Post type
	//		'context'    => 'normal',
	//		'priority'   => 'high',
	//		'show_names' => true, // Show field names on the left
	//		'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
	//		'fields' => array(
	//			array(
	//				'name' => 'Test Text',
	//				'desc' => 'field description (optional)',
	//				'id'   => $prefix . 'test_text',
	//				'type' => 'text',
	//			),
	//		)
	//	);


$meta_boxes[] = array(
		'id'         => 'fontawesome_metabox',
		'title'      => 'Icon',
			'pages'      => array( 'service', ), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Font Awesome',
					'desc' => 'See: <a target="_blank" href="http://fontawesome.io/icons/">http://fontawesome.io/icons/</a>',
					'id'   => $prefix . 'fa_icon',
					'type' => 'text_medium',
					),
				)
			);



	$meta_boxes['testimonialt_page_metabox'] = array(
		'id'         => 'about_page_metabox',
		'title'      => __( 'Testimonial info', 'cmb' ),
		'pages'      => array( 'testimonial', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Client Name', 'cmb' ),
				'desc' => __( 'The name of the client giving this testimonial', 'cmb' ),
				'id'   => 'testimonial_client_name',
				'type' => 'text',
				),
			array(
				'name' => __( 'Company Name', 'cmb' ),
				'desc' => __( 'The company which this client represents', 'cmb' ),
				'id'   => 'testimonial_client_company_name',
				'type' => 'text',
				),
			array(
				'name' => __( 'Email', 'cmb' ),
				'desc' => __( 'Contact email address of whom is giving the testimonial', 'cmb' ),
				'id'   => 'testimonial_client_email',
				'type' => 'text_email',
				),
			array(
				'name' => __( 'Website', 'cmb' ),
				'desc' => __( 'Website of whom is giving the testimonial', 'cmb' ),
				'id'   => 'testimonial_client_company_website',
				'type' => 'text_url',
				),
			)
		);
return $meta_boxes;
}
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once get_template_directory().'/lib/cmb/init.php';
}