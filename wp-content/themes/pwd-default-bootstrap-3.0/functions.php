<?php

/**
 * PWD Default Theme functions and definitions
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */

 /**
 * Set the Disabling the File Editor
 */

define('DISALLOW_FILE_EDIT', FALSE );


/**
 * Set the Developer Mode , Theme Option,
 *
 * @package PWD Default Theme
 */

define('PWD_DEV_MODE', false);



if(PWD_DEV_MODE){
	define('DISALLOW_FILE_EDIT', TRUE);
}

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since PWD Default Theme 1.0
 */

if ( ! isset( $content_width ) )

	$content_width = 640; /* pixels */



/*
 * Load Theme Options
 */

require( get_template_directory() . '/admin/custom-theme-options.php' );

/*
 * Get Theme Option by pwd option id
 */

function pwd_get_option($pwd_option_id = ""){
	return do_shortcode('[pwd_option id="'.$pwd_option_id.'"]');
}



/*
 * Load Post Type  compatibility file.
 */

require( get_template_directory() . '/admin/post-type-slideshow.php' );
require( get_template_directory() . '/admin/post-type-cta.php' );
require( get_template_directory() . '/admin/post-type-service.php' );
//require( get_template_directory() . '/admin/post-type-testimonial.php' );
//require( get_template_directory() . '/admin/post-type-faq.php' );

// require( get_template_directory() . '/admin/post-type-team.php' );
// require( get_template_directory() . '/admin/post-type-gallery.php' );
// require( get_template_directory() . '/admin/post-type-product.php' );
// require( get_template_directory() . '/admin/post-type-project.php' );

// require( get_template_directory() . '/admin/post-type-brand.php' );



/*
 * Load PWD Custom Custom-Metaboxes-and-Fields compatibility file.
 */

require( get_template_directory() . '/admin/custom-meta-boxes.php' );


/*
 * Load PWD Custom loign logo compatibility file.
 */

require( get_template_directory() . '/lib/pwd-login/pwd-login.php' );


/*
 * Load Under Construction compatibility file.
 */

require( get_template_directory() . '/lib/under-construction/under-construction.php' );



if ( ! function_exists( 'pwd_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since PWD Default Theme 1.0
 */

function pwd_setup() {



	/**
	 * Custom template tags for this theme.
	 */

	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that wp_bootstrap_navwalker independently of the theme templates
	 */
	require( get_template_directory() . '/inc/wp_bootstrap_navwalker.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */

	require( get_template_directory() . '/inc/extras.php' );



	/**
	 * Customizer additions
	 */

	//require( get_template_directory() . '/inc/customizer.php' );



	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on PWD Default Theme, use a find and replace
	 * to change 'pwd' to the name of your theme in all the template files
	 */

	//load_theme_textdomain( 'pwd', get_template_directory() . '/languages' );



	/**
	 * Add default posts and comments RSS feed links to head
	 */

	add_theme_support( 'automatic-feed-links' );



	/**
	 * Enable support for Post Thumbnails
	 * Doc http://codex.wordpress.org/Function_Reference/add_theme_support
	 */

	add_theme_support( 'post-thumbnails' );

	//add_image_size( $name, $width, $height, $crop );



	/**
	 * This theme uses wp_nav_menu() in one location.
	 */

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pwd' ),
		'footer' => __( 'Footer Menu', 'pwd' ),
		) );



	/**
	 * Enable support for Post Formats
	 */

	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

}

endif; // pwd_setup

add_action( 'after_setup_theme', 'pwd_setup' );



/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */

function pwd_register_custom_background() {

	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
		);



	$args = apply_filters( 'pwd_custom_background_args', $args );


	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {

		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}

}

// add_action( 'after_setup_theme', 'pwd_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 * @since PWD Default Theme 2.0
 */

function pwd_widgets_and_sidebars_init() {


	/****** register_widgets *********/

	require( get_template_directory() . '/lib/widgets/pwd-address.php' );
	require( get_template_directory() . '/lib/widgets/pwd-socials.php' );
	require( get_template_directory() . '/lib/widgets/pwd-testimonials.php' );
	

	/****** register_sidebars *********/

	register_sidebar( array(

		'name' => __( 'Sidebar Default', 'pwd' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	

	register_sidebar( array(
		'name' => __( 'Sidebar Pages', 'pwd' ),
		'id' => 'sidebar-page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );	

	register_sidebar( array(
		'name' => __( 'Sidebar Services', 'pwd' ),
		'id' => 'sidebar-service',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	

	register_sidebar( array(
		'name' => __( 'Sidebar Footer', 'pwd' ),
		'id' => 'sidebar-footer',
		'before_widget' => '<div id="%1$s" class="widget col-md-3 col-sm-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

}

add_action( 'widgets_init', 'pwd_widgets_and_sidebars_init' );

/**
 * Enqueue scripts and styles
 */

function pwd_scripts() {


/**
 * Function Reference/wp enqueue script
 * http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 */

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/style-bootstrap-theme.css' );

	wp_enqueue_style( 'style-bxslider', get_template_directory_uri() . '/lib/jquery.bxslider/jquery.bxslider.css');
	wp_enqueue_style( 'style-fancybox', get_template_directory_uri() . '/lib/jquery.fancybox/jquery.fancybox.css' );

	wp_enqueue_style( 'style-jquery-ui', get_template_directory_uri() . '/style-jquery-ui.css' );
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'style-responsive', get_template_directory_uri() . '/style-responsive.css' );

	wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/lib/jquery.bxslider/jquery.bxslider.min.js', array( 'jquery' ), '4', false );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/lib/jquery.fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '1.3.4', false );

	wp_enqueue_style( 'pace', get_template_directory_uri() . '/lib/pace/themes/pace-theme-flat-top.css' );
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/lib/pace/pace.min.js', array( 'jquery' ), '0.5.7', false);

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.js', array( 'jquery' ), '1.3.4', false  );
	wp_enqueue_script( 'rspond', get_template_directory_uri() . '/lib/rspond/respond.min.js', array( 'jquery' ), '1', false  );

	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.3.4', false  );
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/lib/mixitup/jquery.mixitup.min.js', array( 'jquery' ), '1', false  );

	//wp_enqueue_style( 'style-scrollUp', get_template_directory_uri() . '/lib/scrollup/css/themes/link.css' );
	//wp_enqueue_script( 'scrollUp', get_template_directory_uri() . '/lib/scrollup/jquery.scrollUp.min.js', array( 'jquery' ), '1', false  );

	wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/lib/sticky/jquery.sticky.js', array( 'jquery' ), '0.5.7', false);

	wp_enqueue_script( 'jquery-ui-core' );
	//wp_enqueue_script( 'jquery-ui-accordion' );
	//wp_enqueue_script( 'jquery-ui-tabs' );
	//wp_enqueue_script( 'jquery-masonry' );


	wp_enqueue_script( 'pwd-custom', get_template_directory_uri() . '/js/pwd-custom.js', array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}


}

add_action( 'wp_enqueue_scripts', 'pwd_scripts' );


/**
 * Implement the Custom Header feature
 */

require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Custom copyright text.
 */

function pwd_copyright(){

	echo "&copy; Copyright " . get_bloginfo( 'name' )." ". date("Y ") .'. All rights reserved.';

}

add_action('pwd_copyright','pwd_copyright');

/**
 * Control Excerpt Length using Filters
 * http://codex.wordpress.org/Function_Reference/the_excerpt
 */

function pwd_custom_excerpt_length( $length ) {

	global $post;
	switch($post->post_type){
		case "cta"      	: return 30; break;
		case "faq"  		: return 30; break;
		case "service"  	: return 10; break;
		case "testimonial"  : return 30; break;
		default         	: return 30;        
	}
}

add_filter( 'excerpt_length', 'pwd_custom_excerpt_length', 999 );


/**
 * Make the "read more" link to the post
 * http://codex.wordpress.org/Function_Reference/the_excerpt
 */

function pwd_new_excerpt_more($more) {

	global $post;

	switch($post->post_type){
		case "testimonial"  : return ''; break;
		case "cta"  		: return ''; break;
		case "service"  	: return ''; break;
		default         	: return ' <a class="post-readmore" href="'. get_permalink($post->ID) . '">Read More...</a>';
	}
}

add_filter('excerpt_more', 'pwd_new_excerpt_more');