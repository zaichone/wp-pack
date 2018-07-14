<div class="our-team">

	<div class="container">

		<h2 class="section-title">Our Team</h2>

		<div class="row">

			<?php
			$args = array(
				'post_type' 		=> 'team',
				'orderby' 			=> 'menu_order',
				'order'				=> 'ASC',
				'posts_per_page' 	=> -1
				);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :

				while ( $the_query->have_posts() ) : $the_query->the_post();

			?>

			<div class="col-md-3 col-sm-3">
				<div class="team">
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('thumbnail',array('class'=>'img-responsive'));
							}
							else {
								echo '<img class="img-responsive" alt="file name" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.png" />';
							}
							?>
						</a>
					</div>

					<h3 class="team-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

					<div class="team-summary">
						<?php the_excerpt(); ?>
					</div>

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
