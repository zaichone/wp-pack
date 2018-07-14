<div id="service-tabs">

	<?php 

	$args = array(
		'post_type' 		=> 'service',
		'orderby' 			=> 'menu_order',
		'order'				=> 'ASC',
		'posts_per_page' 	=> -1
		);

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) :

		$pwd_tab_nav 		= '';
	$pwd_tab_content 	= '';

	while ( $the_query->have_posts() ) : $the_query->the_post();

	//$pwd_tab_nav 	 	.='<li><a href="#pwd-tabs-'.get_the_id().'"><i class="fa '.get_post_meta(get_the_id(),'pwd_fa_icon','true' ).'"></i><span>'.get_the_title().'</span></a></li>';
	
	$pwd_tab_nav 	 	.='<li><a href="#pwd-tabs-'.get_the_id().'"><span>'.get_the_title().'</span></a></li>';
	
	$pwd_tab_content 	.= '<div id="pwd-tabs-'.get_the_id().'" class="ui-tabs-pane service-tabs-content">';
	$pwd_tab_content 	.= '	<div class="container">';
	$pwd_tab_content 	.= '		<h2 class="service-tabs-content-title">'.get_the_title().'</h2>';
	$pwd_tab_content 	.= '		<div class="row">';
	$pwd_tab_content 	.= '			<div class="col-md-5"><div class="thumbnail">'.get_the_post_thumbnail(get_the_id(),'medium',array('class'=>'img-responsive')).'</div></div>';
	$pwd_tab_content 	.= '			<div class="col-md-7">'.wpautop(get_the_content()).'</div>';
	$pwd_tab_content 	.= '		</div>';
	$pwd_tab_content 	.= '	</div>';
	$pwd_tab_content 	.= '</div>';

	endwhile;

	?>

	<div id="pwd-tabs" class="service-tabs">
		<div class="service-tabs-header">
			<div class="container">
				<ul class="ui-tabs-nav service-tabs-nav"><?php echo $pwd_tab_nav; ?></ul>
			</div>
		</div>
		<?php echo $pwd_tab_content; ?>
	</div>


	<script type="text/javascript">

		jQuery(document).ready(function($) {

			$('#pwd-tabs').tabs({ hide: { effect: "fade", duration: 400 } });

		});

	</script> 




	<?php 

	endif; 
	wp_reset_postdata();

	?>

</div>