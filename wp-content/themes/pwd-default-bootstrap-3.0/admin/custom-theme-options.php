<?php

/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */

//define('NHP_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('NHP_Options')){
	require_once( get_template_directory().'/lib/options/options.php' );
}


/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */


function setup_framework_options(){

$args = array();
$sections = array();
$sections[] = array(
				'title' => __('Home', 'nhp-opts'),
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_020_home.png',
				'fields' => array(
						array(
							'id' => 'logo',
							'type' => 'upload',
							'title' => __('Upload Logo', 'nhp-opts'), 
							'sub_desc' => __('Shortcode : [pwd_option id="logo"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts')
						),

						
						array(
							'id' => 'favicon',
							'type' => 'upload',
							'title' => __('Upload Favicon', 'nhp-opts'), 
							'sub_desc' => __('Shortcode : [pwd_option id="favicon"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts')
						),

						array(
							'id' => 'tagline',
							'type' => 'editor',
							'title' => __('Tagline', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="tagline"]', 'nhp-opts'),
							'desc' => __('HTML is allowed in here.', 'nhp-opts'),
							'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
							'std' => ''
						),

					)
	);

$sections[] = array(
		'title' => __('Pages', 'nhp-opts'),
		'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_039_notes.png',
		'fields' => array(

			array(
				'id' => 'page_on_contact',
				'type' => 'pages_select',
				'title' => __('Contact us Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_on_contact"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),

			array(
				'id' => 'page_for_faqs',
				'type' => 'pages_select',
				'title' => __('FAQs Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_faqs"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),


			array(
				'id' => 'page_for_services',
				'type' => 'pages_select',
				'title' => __('Services Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_services"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),

			array(
				'id' => 'page_for_products',
				'type' => 'pages_select',
				'title' => __('Products Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_products"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),
				array(
				'id' => 'page_for_projects',
				'type' => 'pages_select',
				'title' => __('Projects Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_projects"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),
				array(
				'id' => 'page_for_teams',
				'type' => 'pages_select',
				'title' => __('Teams Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_teams"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),

				array(
				'id' => 'page_for_brands',
				'type' => 'pages_select',
				'title' => __('Brands Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_brands"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),

				array(
				'id' => 'page_for_galleries',
				'type' => 'pages_select',
				'title' => __('Galleris Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_galleries"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),

				array(
				'id' => 'page_for_testimonials',
				'type' => 'pages_select',
				'title' => __('Testimonials Page', 'nhp-opts'), 
				'sub_desc' => __('Shortcode : [pwd_option id="page_for_testimonials"]', 'nhp-opts'),
				'desc' => __('', 'nhp-opts')
				),

			)
);

	
$sections[] = array(
				'title' => __('Contact Details', 'nhp-opts'),
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_267_credit_card.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array(
						array(
							'id' => 'location', //must be unique
							'type' => 'text',
							'title' => __('Location name', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="location"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts'),

						),

						array(
							'id' => 'phone',
							'type' => 'text',
							'title' => __('Phone number', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="phone"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts'),
							//'validate' => '',
							'msg' => '',
							'std' => '',
							//'class' => 'regular-text'
						),
						
						array(
							'id' => 'fax',
							'type' => 'text',
							'title' => __('Fax', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="fax"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts'),
							//'validate' => '',
							'msg' => '',
							'std' => '',
							//'class' => ''
						),
						
						array(
							'id' => 'email',
							'type' => 'text',
							'title' => __('Email address', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="email"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts'),
							'validate' => 'email',
							'msg' => '',
							'std' => '',
							//'class' => ''
						),

						array(
							'id' => 'address',
							'type' => 'textarea',
							'title' => __('Address', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="address"]', 'nhp-opts'),
							'desc' => __('HTML is allowed in here.', 'nhp-opts'),
							'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
							'std' => ''
						),

						array(
							'id' => 'map_image',
							'type' => 'upload',
							'title' => __('Upload Image Map', 'nhp-opts'), 
							'sub_desc' => __('Shortcode : [pwd_option id="map_image"]', 'nhp-opts'),
							'desc' => __('This is the description field, again good for additional info.', 'nhp-opts')
						),

						array(
							'id' => 'map_url',
							'type' => 'text',
							'title' => __('Map Url', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="map_url"].', 'nhp-opts'),
							'desc' => __('', 'nhp-opts'),
							'validate' => 'url',
							'std' => '#'
						),

						array(
							'id' => 'map_lat',
							'type' => 'text',
							'title' => __('Latitude', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="map_lat"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts'),
							'validate' => 'numeric',
							'std' => '#'

						),


						array(
							'id' => 'map_lng',
							'type' => 'text',
							'title' => __('Longitude', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="map_lat"]', 'nhp-opts'),
							'desc' => __('', 'nhp-opts'),
							'validate' => 'numeric',
							'std' => '#'
						),

						

						array(
							'id' => 'map_zoom',
							'type' => 'select',
							'title' => __('Map Zoom Levels', 'nhp-opts'), 
							'sub_desc' => __('Shortcode : [pwd_option id="map_zoom"]'),
							'desc' => __('', 'nhp-opts'),
							'options' => array(
											'1' => 'Level 1',
											'2' => 'Level 2',
											'3' => 'Level 3',
											'4' => 'Level 4',
											'5' => 'Level 5',
											'6' => 'Level 6',
											'7' => 'Level 7',
											'8' => 'Level 8',
											'9' => 'Level 9',
											'10' => 'Level 10',
											'11' => 'Level 11',
											'12' => 'Level 12',
											'13' => 'Level 13',
											'14' => 'Level 14',
											'15' => 'Level 15',
											'16' => 'Level 16',
											'17' => 'Level 17'
											),//Must provide key => value pairs for select options
							'std' => '8'
						),


						array(
							'id' => 'facebook',
							'type' => 'text',
							'title' => __('Facebook', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="facebook"]', 'nhp-opts'),
							'desc' => __('URL', 'nhp-opts'),
							'validate' => 'url'
							),

						array(
							'id' => 'twitter',
							'type' => 'text',
							'title' => __('Twitter', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="twitter"]', 'nhp-opts'),
							'desc' => __('URL', 'nhp-opts'),
							'validate' => 'url'
							),

						array(
							'id' => 'google-plus',
							'type' => 'text',
							'title' => __('Google +', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="google-plus"]', 'nhp-opts'),
							'desc' => __('URL', 'nhp-opts'),
							'validate' => 'url'
							),

						array(
							'id' => 'youtube',
							'type' => 'text',
							'title' => __('Youtube', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="youtube"]', 'nhp-opts'),
							'desc' => __('URL', 'nhp-opts'),
							'validate' => 'url'
							),

						array(
							'id' => 'instagram',
							'type' => 'text',
							'title' => __('Instagram', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="instagram"]', 'nhp-opts'),
							'desc' => __('URL', 'nhp-opts'),
							'validate' => 'url'
							),


						array(
							'id' => 'linkedin',
							'type' => 'text',
							'title' => __('Linkedin', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="linkedin"]', 'nhp-opts'),
							'desc' => __('URL', 'nhp-opts'),
							'validate' => 'url'
							),

						array(
							'id' => 'feed',
							'type' => 'text',
							'title' => __('Feed', 'nhp-opts'),
							'sub_desc' => __('Shortcode : [pwd_option id="feed"]', 'nhp-opts'),
							'desc' => __('URL', 'nhp-opts'),
							'validate' => 'url'
							),
						
					)
	);

				

	$tabs = array();
		

	if (function_exists('wp_get_theme')){
		$theme_data 		= wp_get_theme();
		$theme_uri			= $theme_data->get('ThemeURI');
		$description 		= $theme_data->get('Description');
		$author 			= $theme_data->get('Author');
		$version 			= $theme_data->get('Version');
		$tags 				= $theme_data->get('Tags');
	}else{
		$theme_data 		= get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
		$theme_uri 			= $theme_data['URI'];
		$description 		= $theme_data['Description'];
		$author 			= $theme_data['Author'];
		$version			= $theme_data['Version'];
		$tags 				= $theme_data['Tags'];
	}	


	$theme_info  = '<div class="nhp-opts-section-desc">';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'nhp-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'nhp-opts').$author.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'nhp-opts').$version.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="nhp-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'nhp-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$tabs['theme_info'] = array(
					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'nhp-opts'),
					'content' => $theme_info
					);
	

	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){
		$content = file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html');
		if(!empty($content)){
		$tabs['theme_docs'] = array(
						'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_071_book.png',
						'title' => __('Documentation', 'nhp-opts'),
						'content' => $content
						);

		}

	}//if
	

	//Set it to dev mode to view the class settings/info in the form - default is false	
	//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
	//$args['google_api_key'] = '***';


	//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
	//$args['stylesheet_override'] = true;


	//Add HTML before the form
	//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'nhp-opts');


	//Choose to disable the import/export feature
	$args['show_import_export'] = false;

	//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
	$args['opt_name'] = 'pwd';

	//Custom menu icon
	//$args['menu_icon'] = '';
	//Custom menu title for options page - default is "Options"

	$args['menu_title'] = __('Theme Options', 'nhp-opts');


	//Custom Page Title for options page - default is "Options"
	$args['page_title'] = __('Theme Options', 'nhp-opts');


	//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
	$args['page_slug'] = 'theme_options';
	//Custom page capability - default is set to "manage_options"
	//$args['page_cap'] = 'manage_options';
	//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
	$args['page_type'] = 'submenu';
	if(PWD_DEV_MODE){
		$args['dev_mode'] =  true;
	}else{
		$args['dev_mode'] = false;
	}


	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function

add_action('init', 'setup_framework_options', 0);


/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */

function add_another_section($sections){
	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'nhp-opts'),
				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);

	return $sections;

}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');

/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	//$args['dev_mode'] = false;

	return $args;

}//function

//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');


/*
 * 
 * Custom function for the callback referenced above
 *
 */

function my_custom_field($field, $value){

	print_r($field);

	print_r($value);



}//function



/*
 * 
 * Custom function for the callback validation referenced above
 *
 */

function validate_callback_function($field, $value, $existing_value){

	$error = false;
	$value =  'just testing';
	/*
	do your validation
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/

	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;

}//function


$pwd_options = get_option('pwd');

/*
 * Load Theme Options Shortcode
 */

function pwd_options_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
	), $atts ) );


	global $pwd_options;
	if(!empty($pwd_options[$id])){
		return $pwd_options[$id];
	}else{
		return "";
	}
}

add_shortcode( 'pwd_option', 'pwd_options_shortcode' );

?>