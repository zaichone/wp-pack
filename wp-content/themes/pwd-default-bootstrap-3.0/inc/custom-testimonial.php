<!--/ Start Testimonial Slider Container /-->
<div id="testimonials"> 
	<div class="container">
		<div id="slider-testimonials">

			<?php 
			$query_args = array(
				'post_type'		 	=> 'testimonial',
				'orderby' 			=> 'rand',
				'order'				=> 'ASC',
				'posts_per_page' 	=> 4
				);

			$the_query 	= new WP_Query( $query_args );
			$bxcount 	= 0;
			$pager 		= "";
			$i = 0;

			if($the_query->post_count>0){

				$bxcount = $the_query->post_count;

				while ( $the_query->have_posts() ) : $the_query->the_post();

				$i++;
				?>

				<div class="testimonial">
					<div class="text">
						<?php the_excerpt(); ?>
					</div>
					<div class="info">
						<span class="name"> - <?php echo get_post_meta( get_the_ID(), 'testimonial_client_name',true) ?></span>
						<?php if(get_post_meta( get_the_ID(), 'testimonial_client_name',true)){ ?>
						<span class="company"> , 
							<?php if(get_post_meta( get_the_ID(), 'testimonial_client_website',true)){ ?><a href="<?php echo get_post_meta( get_the_ID(), 'testimonial_client_company_website',true) ?>"><?php } ?>
							<?php echo get_post_meta( get_the_ID(), 'testimonial_client_company_name',true) ?>
							<?php if(get_post_meta( get_the_ID(), 'testimonial_client_website',true)){ ?></a><?php } ?>
						</span>
						<?php } ?>
					</div>
				</div>

				<?php
				endwhile;

			}else{
				?>
				<div class="testimonial">
					<div class="text">
						<div class="open">"</div>	
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit consectetur est ut condimentum. Fusce hendrerit eget mi in lacinia. Etiam vel enim sed lectus cursus scelerisque id vitae nibh.</p>
						<div class="close">"</div>
					</div>
					<div class="info">
						<span class="name">Jame</span>

						<span class="company"> , 
							<a href="#">Company</a>
						</span>

					</div>
				</div>

				<?php
			}

			wp_reset_postdata();

			?>

		</div>
		<script type="text/javascript">

			jQuery(document).ready(function($) {
				$('#slider-testimonials').bxSlider({
					mode			: 'fade', 
					infiniteLoop	: true, 
					controls		: false, 
					speed			: 1000,
					pager			: false,
					auto			: <?php echo ($bxcount>1)? 'true' : 'false'; ?>, 
					pause			: 5000,
				});
			});

		</script>	
	</div>
</div>
<!--/ END Testimonial Slider Container /--> 
