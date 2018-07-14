<!--/ Start Image Slider Container /-->
<div class="slidercontainer"> 
	<!--/ Start Image Slider /-->
	<div class="sliderarea">
		<div class="custom-slideshows" class="bxslider">
			<?php

			$args = array(
				'post_type'		 	=> 'slideshow',
				'orderby' 			=> 'menu_order',
				'order'				=> 'ASC',
				'posts_per_page' 	=> -1
				);

			$the_query = new WP_Query( $args );
			$bxcount = 0;

			if($the_query->post_count>0){
				$bxcount = $the_query->post_count;
				while ( $the_query->have_posts() ) : $the_query->the_post();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
				?>

				<div class="slide" style="background:url(<?php echo $image[0]; ?>)  no-repeat scroll center center  transparent; ">
					<div class="container">
						<div class="slide-info">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				
				<?php
				endwhile;
			}
			
			/* Restore original Post Data 
			 * NB: Because we are using new WP_Query we aren't stomping on the 
			 * original $wp_query and it does not need to be reset.
			*/
			wp_reset_postdata();
			?>
		</div>
	</div>
	<!--/ END Image Slider /--> 
</div>
<!--/ END Image Slider Container /--> 

<script type="text/javascript">

	jQuery(document).ready(function($) {
		$('.custom-slideshows').bxSlider({
			mode			: 'fade', 
			infiniteLoop	: true, 
			controls		: true, 
			speed			: 1000,
			pager			: false,
			auto			: <?php echo ($bxcount>1)? 'true' : 'false'; ?>, 
			pause			: 5000,
			touchEnabled	: false,
			nextText		: '<i class="fa fa-angle-right"></i>',
			prevText		: '<i class="fa fa-angle-left"></i>'
		});
	});

</script> 
