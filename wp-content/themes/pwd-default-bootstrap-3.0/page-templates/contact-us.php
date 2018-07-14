<?php
/**
 * Template Name: Contact us
 *
 * This is the template that displays Full-width pages.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */
get_header(); ?>
<div id="contact-map"> &nbsp; <!-- GOOGLE MAP API --> </div>

<?php

$address = esc_attr(strip_tags(do_shortcode('[pwd_option id="address"]')));
$address = str_replace("\r", '',  $address);
$address = str_replace("\n", ' ', $address);
$address = str_replace("\t", ' ', $address);
$lat 	= do_shortcode('[pwd_option id="map_lat"]');
$lng 	= do_shortcode('[pwd_option id="map_lng"]');
$zoom 	= do_shortcode('[pwd_option id="map_zoom"]');

?>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	/* <![CDATA[ */
	function initialize() {
		var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
		var mapOptions = {
			center: myLatlng,
			zoom: <?php echo $zoom; ?>,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl:false,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL
			},
			scrollwheel: false
		};
		var map = new google.maps.Map(document.getElementById("contact-map"), mapOptions); 
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:"<?php echo $address;  ?>"
			// icon:"<?php echo get_template_directory_uri(); ?>/images/map-marker.png"
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	/* ]]> */
</script>

<div class="container">
	
	<div class="row">
		<div class="col-md-12">

			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
				 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="contact-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'pwd' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'pwd' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-<?php the_ID(); ?> -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
		</div><!-- #content .site-content -->

	</div>
</div>

</div>
<?php get_footer(); ?>