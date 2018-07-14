<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */
?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?> class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(); ?></title>
	<?php if(pwd_get_option('favicon')){ ?>
	<link rel="icon" type="image/png" href="<?php echo pwd_get_option('favicon') ?>">
	<?php }else{ ?>
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,300,600,800' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header" role="banner">

			<div class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->

					<div class="navbar-header">
						
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a id="logo" class="navbar-brand"  href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php if(pwd_get_option('logo')){ ?>
							<img src="<?php echo pwd_get_option('logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> logo">
							<?php }else{ ?>
							<span><?php bloginfo( 'name' ); ?></span>	
							<?php } ?>
						</a>

					</div>


					<div class="navbar-collapse collapse ">

						<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'nav navbar-nav','container' => 'ul' , 'walker' => new wp_bootstrap_navwalker(),'fallback_cb' => '' )); ?>

						<ul class="nav-user nav navbar-nav navbar-right">
							<?php /* ?>
							<?php if ( is_user_logged_in() ) { ?>
							<li class="logout"><a class="btn"<a href="<?php echo wp_logout_url(get_permalink() ); ?>" title="Logout"><i class="fa fa-sign-out"></i> Logout</a></li>
							<?php } else { ?>
							<li class="login"><a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login"><i class="fa fa-sign-in"></i> Login</a></li>
							<li class="register"><a class="btn" href="<?php echo wp_registration_url(); ?>" title="Register"><i class="fa fa-user"></i> Register</a></li>
							<?php } ?>
							<?php */ ?>
							<li class="site-phone"><a href="tel:<?php echo pwd_get_option('phone'); ?>"><i class="fa fa-phone"></i> <?php echo pwd_get_option('phone'); ?></a></li>
						</ul>

					</div>


				</div><!-- /.container-->
			</div>

			<?php /* ?>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<span class="site-title">
							<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php if(pwd_get_option('logo')){ ?>
								<img src="<?php echo pwd_get_option('logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> logo">
								<?php }else{ ?>
								<?php bloginfo( 'name' ); ?>
								<?php } ?>
							</a>
						</span>
					</div>
					<div class="col-md-8">
						<div class="header-widgets">
							<div class="widget widget-socials">
								<ul class="socials">
									<?php if(pwd_get_option("facebook")){ ?>    <li class="social facebook"><a href="<?php echo pwd_get_option("facebook"); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
									<?php if(pwd_get_option("twitter")){ ?>     <li class="social twitter"><a href="<?php echo pwd_get_option("twitter"); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
									<?php if(pwd_get_option("google-plus")){ ?> <li class="social google-plus"><a href="<?php echo pwd_get_option("google-plus"); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
									<?php if(pwd_get_option("instagram")){ ?> 	<li class="social instagram"><a href="<?php echo pwd_get_option("instagram"); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
									<?php if(pwd_get_option("youtube")){ ?>     <li class="social youtube"><a href="<?php echo pwd_get_option("youtube"); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php } ?>
									<?php if(pwd_get_option("linkedin")){ ?>    <li class="social linkedin"><a href="<?php echo pwd_get_option("linkedin"); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
									<?php if(pwd_get_option("feed")){ ?>        <li class="social feed"><a href="<?php echo pwd_get_option("feed"); ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php } ?>
								</ul>
							</div>
							<!-- <div class="widget">
								<p class="phone-number"><?php echo pwd_get_option('phone'); ?></p>
								<p class="email"><?php echo  pwd_get_option('email'); ?></p>
							</div> -->
						</div>

					</div>
				</div>
			</div>
			<?php */  ?>
		</header><!-- #masthead .site-header -->





		<div id="featured-aside" class="site-featured">

			<?php

			$header_image 			= get_header_image();
			$header_image_width 	= get_custom_header()->width;
			$header_image_height 	= get_custom_header()->height;

			if ( is_singular() && has_post_thumbnail( $post->ID ) && ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_height ) ) ) && $image[1] >= $header_image_width ) :
				// Houston, we have a new header image!
				$header_image =  $image[0]; 
			endif;
			?>
			<div class="site-header-image-bg" style="width:100%; height:<?php echo $header_image_height; ?>px; background:url(<?php echo $header_image; ?>) center center no-repeat;">

				<?php 
				if(is_front_page()){
					get_template_part( 'inc/custom', 'slideshow' );
				}
				?>

			</div>
		</div><!-- #featured-aside -->

		<?php  if( pwd_get_option('tagline') && is_front_page()){ ?>

		<div id="tagline" class="site-tagline">
			<div class="container">

				<?php echo pwd_get_option('tagline'); ?>
				
			</div>
		</div>

		<?php } ?>

		<div id="main" class="site-main">
