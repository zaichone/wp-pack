<?php
/**
 * PWD Default Theme Theme Customizer
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.2
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since PWD Default Theme 1.2
 */
function pwd_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	 $theme_slug = get_option( 'stylesheet' );

	 $wp_customize->add_section($theme_slug.'_color_scheme', array(
        'title'    => __('Color Scheme', $theme_slug.''),
        'priority' => 50,
    ));

	}
	
add_action( 'customize_register', 'pwd_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since PWD Default Theme 1.2
 */
function pwd_customize_preview_js() {
	wp_enqueue_script( 'pwd_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'pwd_customize_preview_js' );
