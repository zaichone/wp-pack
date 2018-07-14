<?php
function pwd_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_template_directory_uri() ?>/lib/pwd-login/logo-login.png);
            padding-bottom: 0px;
            margin-bottom0;
			background-size: auto auto;
			height: 80px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'pwd_login_logo' );

function pwd_login_logo_url() {
    return 'http://www.digitalmonopoly.com.au/';
}
add_filter( 'login_headerurl', 'pwd_login_logo_url' );

function pwd_login_logo_url_title() {
    return 'Digital Monopoly';
}
add_filter( 'login_headertitle', 'pwd_login_logo_url_title' );

function pwd_login_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_template_directory_uri() . '/lib/pwd-login/style-login.css'; ?>" type="text/css" media="all" />
    <?php }
add_action( 'login_enqueue_scripts', 'pwd_login_stylesheet' );