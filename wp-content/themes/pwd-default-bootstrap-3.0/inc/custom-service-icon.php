<div class="service-icon">
	<div class="container">
		<div class="row">

			<?php
			$args = array(
				'post_type' 		=> 'service',
				'orderby' 			=> 'menu_order',
				'order'				=> 'ASC',
				'posts_per_page' 	=> -1
				);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :

				while ( $the_query->have_posts() ) : $the_query->the_post();

			?>

			<div class="col-md-3 col-sm-3">
				<div class="service">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
						<i class="fa <?php echo get_post_meta(get_the_id(),'pwd_fa_icon','true' ); ?>"></i>
					</a>					
					<h3 class="service-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
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

