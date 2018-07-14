<div class="products-fillter" role="main">

	<div class="container">

		<div class="control-bar sandbox-control-bar clearfix">
			<h3 class="pull-left">Our Products</h3>
			<div class="btn-filters pull-right">
				<span class="btn filter active" data-filter="all">All</span>
				<?php

				$terms = get_terms( 'product_category' );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					foreach ( $terms as $term ) {	
						echo '<span class="btn filter" data-filter=".product-cat-'.$term->slug.'">'.$term->name.'</span>';
					}
				}

				?>
			</div>
			
		</div>

		<?php
		$i = 1;		
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12,
			);

		$product_query = new WP_Query( $args );

		if ( $product_query->have_posts() ) {

			echo '<div class="products-fullter products row">';

			while ( $product_query->have_posts() ) { $product_query->the_post();

				$product_categories = get_the_terms( get_the_id(), 'product_category' );

				$product_filter =  "";

				if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ){
					foreach ( $product_categories as $product_category ) {	
						$product_filter .=' product-cat-'.$product_category->slug;
					}
				} 
			
				?>
				
				<div class="<?php echo $hidden_items; ?>col-sm-4 col-md-4 mix <?php echo $product_filter; ?>">
					<div class="product">
						<a class="product-thumbnail" href="<?php the_permalink(); ?>">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('gallery',array('class'=>'img-responsive'));
							}
							else {
								echo '<img class="img-responsive" alt="file name" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.png" />';
							}
							?>
						</a>
						<h3><?php the_title(); ?></h3>
					</div>
				</div>

				<?php
				
			}
			
			echo '</div>';
		}
		wp_reset_postdata();
		?>


		<!-- <div class="page-section-footer clearfix">		
			<hr>
		</div> -->


</div>

<script type="text/javascript">

	jQuery(document).ready(function($) {
		$('.products-fullter').mixItUp(
		{
			animation: {
				duration: 400,
				effects: 'fade stagger(0ms) scale(0.39)',
				easing: 'cubic-bezier(0.39, 0.575, 0.565, 1)'
			}
		}
		); 
	});

</script>

</div>