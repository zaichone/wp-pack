<?php

add_action('admin_init', 'theme_uc_AdminInit');
add_action('admin_menu', 'theme_uc_adminMenu');
function  theme_uc_AdminInit(){

		/* Register our script. */
		wp_register_script('pwd-under-construction', get_template_directory_uri().'/inc/under-construction/under-construction.js');
	}
function  theme_uc__setting()
{
	require_once ('setting.php');
}
function  theme_uc_adminMenu()
{
	$page = 'under-construction-setting';
	/* Using registered $page handle to hook script load */

	add_action('admin_print_scripts-settings_page_'.$page, 'theme_uc_EnqueueScripts');
	add_options_page('Under Construction Settings', 'Under Construction', 'manage_options', $page , 'theme_uc__setting');
}
function  theme_uc_EnqueueScripts()
{
	wp_enqueue_script('pwd-under-construction');
}


function theme_uc_getCustomHTML(){

	return do_shortcode(html_entity_decode(stripslashes(get_option('theme_uc_HTML'))));
}
function theme_uc_template_redirect() {

 		if (!is_user_logged_in() and get_option('theme_uc_ActivationStatus') )
			{
				$array = get_option('underConstructionIPWhitelist');
				$displayStatusCodeIs =  get_option('theme_uc_DisplayOption'); 

				if(!is_array($array)){
					$array = array();
				}

				if(!in_array($_SERVER['REMOTE_ADDR'], $array)){
					//send a 503 if the setting requires it
					if ($displayStatusCodeIs == 503)
					{
						header('HTTP/1.1 503 Service Unavailable');
					}
					//send a 503 if the setting requires it
					if ($displayStatusCodeIs == 301)
					{
						header( "HTTP/1.1 301 Moved Permanently" );
						header( "Location: " . get_option('theme_uc_RedirectURL') );
					}
					if ($displayStatusCodeIs==0) //they want the default!
					{
						require_once ('defaultMessage.php');
						theme_uc_displayDefaultComingSoonPage();
						die();
					}
					if ($displayStatusCodeIs==1) //they want the default with custom text!
					{
						require_once ('defaultMessage.php');
						$theme_uc_CustomText			= get_option('theme_uc_CustomText');

						$theme_uc_getCustomPageTitle	= $theme_uc_CustomText['pageTitle'];
						$theme_uc_getCustomHeaderText	= $theme_uc_CustomText['headerText'];
						$theme_uc_getCustomHeaderImage	= $theme_uc_CustomText['headerImage'];
						$theme_uc_getCustomBodyText		= $theme_uc_CustomText['bodyText'];

						theme_uc_displayComingSoonPage($theme_uc_getCustomPageTitle,$theme_uc_getCustomHeaderText,$theme_uc_getCustomHeaderImage,$theme_uc_getCustomBodyText);

						die();
					}
					if ($displayStatusCodeIs==2) //they want custom HTML!
					{
						echo html_entity_decode(theme_uc_getCustomHTML(), ENT_QUOTES);
						die();
					}
				}
			}
		}
add_action('template_redirect', 'theme_uc_template_redirect', 1);