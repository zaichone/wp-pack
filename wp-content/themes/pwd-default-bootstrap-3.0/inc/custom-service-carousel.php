<div id="service-carousel">
	<div class="container-fluid">
		<div class="row">
			<div class="service-carousel">
				<?php
				$args = array(
					'post_type' 		=> 'service',
					'orderby' 			=> 'menu_order',
					'order'				=> 'ASC',
					'posts_per_page' 	=> 4
					);

				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :

					while ( $the_query->have_posts() ) : $the_query->the_post();

				?>

				<div class="col-md-3 col-sm-3 nopadding">
					<div class="service">
						<div class="thumbnail">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('gallery',array('class'=>'img-responsive'));
								}
								else {
									echo '<img class="img-responsive" alt="file name" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.png" />';
								}
								?>
							</a>
						</div>
						<h2 class="service-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>      
					</div>
				</div>
				<?php
				endwhile;
				endif; 
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		jQuery(document).ready(function($) {
			$('#service-carousel .service-carousel').bxSlider({
				minSlides: 1,
				maxSlides: 4,
				slideWidth: 500,
				slideMargin: 0,
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


</div>