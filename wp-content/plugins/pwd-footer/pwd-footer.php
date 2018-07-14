<?php
/*
Plugin Name: PWD Footer V.3
Plugin URI: http://www.perth-web-design.com.au/
Description: pwd , seoco , nutwork.
Version: 3.0
Author: wisan
Author URI: http://www.perth-web-design.com.au/
*/



if(!defined("PWD_FOOTER_WEBSERVICE_URL")){
	define("PWD_FOOTER_WEBSERVICE_URL", "http://footer.pmweb.com.au");
 	//define("PWD_FOOTER_WEBSERVICE_URL", "http://localhost/pwd-footer-master");
}


//$webservice_site_default_data_url   = 'http://footer.pmweb.com.au/wp-admin/admin-ajax.php?action=pwd_footer_json&domain=localhost&page=frontpage&type=json';


function pwd_footer_network_get_option($key,$name){

	$pwd_footer_network = get_option('pwd_footer_network',true);
	$pwd_footer_network_option = unserialize($pwd_footer_network);
		//print_r($value);
	$value = $pwd_footer_network_option[$key][$name];
	return $value;
}

function pwd_footer_network_is_page(){
	if(is_front_page() or is_home()){
		return 'frontpage';
	}else{
		return 'innerpage';
	}
}

function pwd_footer_network_update_data(){

	$domain   = $_SERVER['SERVER_NAME'];
	$page     = pwd_footer_network_is_page();
	
	$url 	  = PWD_FOOTER_WEBSERVICE_URL.'/wp-admin/admin-ajax.php?action=pwd_footer_json&domain='.$domain.'&page='.$page.'&type=json&site_url='.esc_url(site_url()).'&status=Online&name='.urlencode(get_bloginfo('name'));

	//echo "<hr /><strong> Data : </strong>".$url.'<hr />';

	$response = wp_remote_get($url);



	//print_r($response);


	if( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		echo "Something went wrong: $error_message";
	} else {

		$data  = array();

		$data['site']['name'] 				= get_bloginfo('name');
		$data['site']['domain'] 			= $domain;
		$data['site']['site_url'] 			= site_url();
		$data['site']['site_type'] 			= '';
		$data['site']['site_remark'] 		= '';
		$data['site']['site_status'] 		= 'Online';

		$links = json_decode(wp_remote_retrieve_body($response));

		   // echo '<pre>';
		   // print_r($links );
		   // echo '</pre>';

		if(count($links)>0){

			foreach ($links as $key => $link) {
				$data['links'][$key]['link_id'] 		= $link->link_id;
				$data['links'][$key]['link_url'] 		= $link->link_url;
				$data['links'][$key]['link_name'] 		= $link->link_name;
				$data['links'][$key]['link_image']	 	= $link->link_image;
				$data['links'][$key]['link_target'] 	= $link->link_target;
				$data['links'][$key]['link_description']= $link->link_description;
				$data['links'][$key]['link_page'] 		= $link->link_page;
				$data['links'][$key]['link_visible'] 	= $link->link_visible;
				$data['links'][$key]['link_owner'] 		= $link->link_owner;
				$data['links'][$key]['link_rating'] 	= $link->link_rating;
				$data['links'][$key]['link_updated'] 	= $link->link_updated;
				$data['links'][$key]['link_rel'] 		= $link->link_rel;
				$data['links'][$key]['link_notes'] 		= $link->link_notes;
				$data['links'][$key]['link_rss'] 		= $link->link_rss;
				$data['links'][$key]['link_default'] 	= $link->link_default;
				$data['links'][$key]['link_status'] 	= $link->link_status;
				$data['links'][$key]['link_order'] 		= $link->link_order;
			}	
		}	

		$pwd_footer_network_option = maybe_serialize($data );

		update_option( 'pwd_footer_network' ,$pwd_footer_network_option);

	}
}



add_action( 'wp_ajax_pwd_footer_update', 'pwd_footer_network_update_data_callback' );
add_action( 'wp_ajax_nopriv_pwd_footer_update', 'pwd_footer_network_update_data_callback' );

function pwd_footer_network_update_data_callback(){

	pwd_footer_network_update_data();
	echo "updated";
	die();
}


function pwd_footer_v2(){
	pwd_footer_network();
}

function pwd_footer_network(){
	

	if(!get_option('pwd_footer_network')){
		pwd_footer_network_update_data();
	}

	$domain = pwd_footer_network_get_option('site','domain');
	$page   = pwd_footer_network_is_page();

	$remote_url = PWD_FOOTER_WEBSERVICE_URL.'/wp-admin/admin-ajax.php?action=pwd_footer_json&domain='.$domain.'&page='.$page.'&type=html';

	//echo $remote_url;

	/* Form a cache key from the query */
	$cache_key = 'pwd_footer_network:'.md5( serialize($remote_url));
	$cache = wp_cache_get( $cache_key );
	if ( false !== $cache ) {
		$cache = apply_filters('pwd_footer_network', $cache, $remote_url);
		echo $cache;
	}

	
	$response = wp_remote_get($remote_url);

	$pwd_footer_links = "";


	if( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		echo "Something went wrong: $error_message";
	} else {

		$pwd_footer_links =  wp_remote_retrieve_body($response);
	}

	/* Add to cache and filter */
	wp_cache_add( $cache_key, $pwd_footer_links, 24*60*60 );

	$pwd_footer_links = apply_filters('pwd_get_footer_links', $pwd_footer_links);

	echo $pwd_footer_links;

	$pwd_footer_css	= get_option('pwd_footer_css'); 
    
    if($pwd_footer_css){ ?>
    	
    	<style type="text/css">
			<?php echo $pwd_footer_css	; ?>
		</style>

        <?php }

}


function shortcod_pwd_footer_network( $atts ){
	$output = '';
	ob_start();
	pwd_footer_network();
	$output = ob_get_contents();
	ob_end_clean();
	
	return $output;
}
add_shortcode( 'pwd_footer', 'shortcod_pwd_footer_network' );




function pwd_footer_network_enqueue_style() {
	wp_enqueue_style( 'pwd-footer-network',plugins_url('/pwd-footer.css', __FILE__));
}
add_action( 'wp_enqueue_scripts', 'pwd_footer_network_enqueue_style' );

// create custom plugin settings menu
add_action('admin_menu', 'pwd_footer_network_create_menu');

function pwd_footer_network_create_menu() {

	$page = 'pwd-footer-network-settings';
	
	add_options_page('PWD Footer Settings', 'PWD Footer', 'manage_options', $page , 'pwd_footer_network_settings_page');
	
	//call register settings function
	add_action( 'admin_init', 'register_pwd_footer_network_settings' );
	
	add_action( 'admin_init', 'pwd_footer_network_setting_redirect' );
	
}


function register_pwd_footer_network_settings() {
	//register our settings
	register_setting( 'pwd_footer_network-settings-group', 'pwd_footer_network');

}


register_activation_hook(   __FILE__, 'pwd_footer_network_activation' );

function pwd_footer_network_activation(){

	pwd_footer_network_update_data();

	add_option('pwd_footer_network_do_activation_redirect', true);
	
}

function pwd_footer_network_setting_redirect() {
	if (get_option('pwd_footer_network_do_activation_redirect', false)) {
		delete_option('pwd_footer_network_do_activation_redirect');
		wp_redirect( admin_url('options-general.php?page=pwd-footer-network-settings') );
	}
}

register_deactivation_hook( __FILE__, 'pwd_footer_network_deactivation' );
function pwd_footer_network_deactivation() {
	
	delete_option( 'pwd_footer_network');
	delete_option( 'pwd_footer_network_do_activation_redirect');

	$domain   = $_SERVER['SERVER_NAME'];
	$url 	  = PWD_FOOTER_WEBSERVICE_URL.'/wp-admin/admin-ajax.php?action=pwd_footer_deactivation&domain='.$domain.'&status=Offline';

	$response = wp_remote_get($url);
	
}


function pwd_footer_network_settings_page() {
	?>
	<div class="wrap">
		<h2>PWD Footer info</h2>
		<br />
		<form method="post" action="options.php">


			<?php  pwd_footer_network_update_data(); ?>


			<?php //settings_fields( 'pwd_footer_network-settings-group' ); ?>

			<?php

			$pwd_footer_network = get_option('pwd_footer_network',true);


			$datas = unserialize($pwd_footer_network);

			echo '';

			echo '<strong>Site Name: </strong>'.$datas['site']['name'].'<br />';
			echo '<strong>Site Domain: </strong>'.$datas['site']['domain'].'<br />';
			echo '<strong>Site Url: </strong>'.$datas['site']['site_url'].'<br />';
			echo '<strong>Site Status: </strong>'.$datas['site']['site_status'].'<br />';

			echo '<hr />';

			echo pwd_footer_network();

			?>
			<h3> php code </h3>

			<pre><code>&lt;?php  if( function_exists('pwd_footer_v2')){ pwd_footer_v2(); } ?&gt</code><br /> or <br /><code>&lt;?php  if( function_exists('pwd_footer_network')){ pwd_footer_network(); } ?&gt</code></pre>
			

			<style type="text/css">
			
				.pwd-footer-link { display: inline-block; list-style: none outside none; padding: 0; margin:0 0 0 5px; }
				.pwd-footer-link li { display:block; float:left; margin-left: 3px; }
				.pwd-footer-link li a {  }
				.pwd-footer-link li a img { border: medium none; display: block; opacity: 0.8; }
				.pwd-footer-link li a:hover img { opacity: 1; }

			</style>

		</form>
	</div>
	<?php }



	add_action( 'wp_ajax_pwd_footer_get_old_options', 'pwd_footer_get_old_options_callback' );
	add_action( 'wp_ajax_nopriv_pwd_footer_get_old_options', 'pwd_footer_get_old_options_callback' );

	function pwd_footer_get_old_options_callback(){

		$domain   	= $_SERVER['SERVER_NAME'];
		
		$data  		= array();
		$links 		= array();

		$data['site']['name'] 				= get_bloginfo('name');
		$data['site']['domain'] 			= $domain;
		$data['site']['site_url'] 			= site_url();
		$data['site']['site_type'] 			= '';
		$data['site']['site_remark'] 		= '';
		$data['site']['site_status'] 		= 'Online';
		
		
		if(get_option('pwd_url')){

			$links[0]['link_url'] 			= get_option('pwd_url');
			$links[0]['link_name'] 			= get_option('pwd_img_keyword');
			$links[0]['link_image']	 		= get_option('pwd_img_url');
			$links[0]['link_target'] 		= '_blank';
			$links[0]['link_description']	= get_option('pwd_img_keyword');
			$links[0]['link_page'] 			= 'innerpage';
			$links[0]['link_visible'] 		= 'Y';
			$links[0]['link_rating'] 		= 1;
			$links[0]['link_rel'] 			= (get_option('home_nofollow'))? 'nofollow' : '';
			$links[0]['link_status'] 		= 1;
			$links[0]['link_order'] 		= 1;

			$links[1]['link_url'] 			= get_option('pwd_url');
			$links[1]['link_name'] 			= get_option('pwd_img_keyword');
			$links[1]['link_image']	 		= get_option('pwd_img_url');
			$links[1]['link_target'] 		= '_blank';
			$links[1]['link_description']	= get_option('pwd_img_keyword');
			$links[1]['link_page'] 			= 'frontpage';
			$links[1]['link_visible'] 		= 'Y';
			$links[1]['link_rating'] 		= 2;
			$links[1]['link_rel'] 			= (get_option('inner_nofollow'))? 'nofollow' : '';
			$links[1]['link_status'] 		= 1;
			$links[1]['link_order'] 		= 2;

		}


		if(get_option('seoco_url')){

			$links[3]['link_url'] 			= get_option('seoco_url');
			$links[3]['link_name'] 			= get_option('seoco_img_keyword');
			$links[3]['link_image']	 		= get_option('seoco_img_url');
			$links[3]['link_target'] 		= '_blank';
			$links[3]['link_description']	= get_option('seoco_img_keyword');
			$links[3]['link_page'] 			= 'innerpage';
			$links[3]['link_visible'] 		= 'Y';
			$links[3]['link_rating'] 		= 3;
			$links[3]['link_rel'] 			= (get_option('home_nofollow'))? 'nofollow' : '';
			$links[3]['link_status'] 		= 1;
			$links[3]['link_order'] 		= 3;

			$links[4]['link_url'] 			= get_option('seoco_url');
			$links[4]['link_name'] 			= get_option('seoco_img_keyword');
			$links[4]['link_image']	 		= get_option('seoco_img_url');
			$links[4]['link_target'] 		= '_blank';
			$links[4]['link_description']	= get_option('seoco_img_keyword');
			$links[4]['link_page'] 			= 'frontpage';
			$links[4]['link_visible'] 		= 'Y';
			$links[4]['link_rating'] 		= 4;
			$links[4]['link_rel'] 			= (get_option('inner_nofollow'))? 'nofollow' : '';
			$links[4]['link_status'] 		= 1;
			$links[4]['link_order'] 		= 4;

		}


		if(get_option('nutwork_url')){

			$links[5]['link_url'] 			= get_option('nutwork_url');
			$links[5]['link_name'] 			= get_option('nutwork_img_keyword');
			$links[5]['link_image']	 		= get_option('nutwork_img_url');
			$links[5]['link_target'] 		= '_blank';
			$links[5]['link_description']	= get_option('nutwork_img_keyword');
			$links[5]['link_page'] 			= 'innerpage';
			$links[5]['link_visible'] 		= 'Y';
			$links[5]['link_rating'] 		= 5;
			$links[5]['link_rel'] 			= (get_option('home_nofollow'))? 'nofollow' : '';
			$links[5]['link_status'] 		= 1;
			$links[5]['link_order'] 		= 5;

			$links[6]['link_url'] 			= get_option('nutwork_url');
			$links[6]['link_name'] 			= get_option('nutwork_img_keyword');
			$links[6]['link_image']	 		= get_option('nutwork_img_url');
			$links[6]['link_target'] 		= '_blank';
			$links[6]['link_description']	= get_option('nutwork_img_keyword');
			$links[6]['link_page'] 			= 'frontpage';
			$links[6]['link_visible'] 		= 'Y';
			$links[6]['link_rating'] 		= 6;
			$links[6]['link_rel'] 			= (get_option('inner_nofollow'))? 'nofollow' : '';
			$links[6]['link_status'] 		= 1;
			$links[6]['link_order'] 		= 6;

		}


		foreach ($links as $key => $link) {
			//$data['links'][$key]['link_id'] 		= $link['link_id'];
			$data['links'][$key]['link_url'] 		= $link['link_url'];
			$data['links'][$key]['link_name'] 		= $link['link_name'];
			$data['links'][$key]['link_image']	 	= $link['link_image'];
			$data['links'][$key]['link_target'] 	= $link['link_target'];
			$data['links'][$key]['link_description']= $link['link_description'];
			$data['links'][$key]['link_page'] 		= $link['link_page'];
			$data['links'][$key]['link_visible'] 	= $link['link_visible'];
			//$data['links'][$key]['link_owner'] 		= $link['link_owner'];
			$data['links'][$key]['link_rating'] 	= $link['link_rating'];
			//$data['links'][$key]['link_updated'] 	= $link['link_updated'];
			$data['links'][$key]['link_rel'] 		= $link['link_rel'];
			//$data['links'][$key]['link_notes'] 		= $link['link_notes'];
			//$data['links'][$key]['link_rss'] 		= $link['link_rss'];
			$data['links'][$key]['link_default'] 	= 0;
			$data['links'][$key]['link_status'] 	= $link['link_status'];
			$data['links'][$key]['link_order'] 		= $link['link_order'];
		}	


		//$pwd_footer_network_option = maybe_serialize($data );

		//echo '<pre>';
		//print_r($data);
		//echo '</pre>';
		
		@wp_send_json($data);  


		die();

	}



