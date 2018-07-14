<!--/ Start Brands Container /-->

<div class="brands-container"> 
	<div class="container">
		<div class="brands-warp">
			<h2 class="section-title">Our Brands</h2>
			<div class="custom-brands" >
				<div class="brands bxslider">
					<?php

					$args = array(
						'post_type'		 	=> 'brand',
						'orderby' 			=> 'menu_order',
						'order'				=> 'ASC',
						'posts_per_page' 	=> -1
						);
					$the_query = new WP_Query( $args );
					$bxcount = 0;

					if($the_query->post_count>0){

						$bxcount = $the_query->post_count;

						while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="brand">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
								<?php
								if ( has_post_thumbnail() ) {
									 the_post_thumbnail('medium',array('class'=>'img-responsive'));
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.png" alt="" />';
								}
								?>
							</a>
						</div>
						<?php
						endwhile;
					}

					wp_reset_postdata();
					?>
				</div>

			</div>
		</div>
	</div>
</div>

<!--/ END Brands Container /--> 

<script type="text/javascript">

	jQuery(document).ready(function($) {
		$('.custom-brands .brands').bxSlider({
			minSlides		: 1,
			maxSlides		: 6,
			slideWidth		: 190,
			slideMargin		: 0,
			touchEnabled	: false,
			controls		: true, 
			pager			: false,
			nextText		: '<i class="fa fa-chevron-right"></i>',
			prevText		: '<i class="fa fa-chevron-left"></i>'
		});
	});

</script> 
