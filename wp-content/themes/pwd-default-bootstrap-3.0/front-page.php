<?php

/**
 * The template for displaying front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */



get_header(); ?>


<?php get_template_part( 'inc/custom', 'cta' ); ?>

<div id="front-page" class="front-content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>
</div> <!-- #front-page .site-content -->


<?php //get_template_part( 'inc/custom', 'cta-masonry' ); ?>

<?php //get_template_part( 'inc/custom', 'service-carousel' ); ?>

<?php //get_template_part( 'inc/custom', 'service-icon' ); ?>

<?php //get_template_part( 'inc/custom', 'service-list' ); ?>

<?php //get_template_part( 'inc/custom', 'service-tabs' ); ?>

<?php //get_template_part( 'inc/custom', 'product-filter' ); ?>

<?php //get_template_part( 'inc/custom', 'testimonial' ); ?>

<?php //get_template_part( 'inc/custom', 'brands' ); ?>

<div class="clear"></div>

<?php get_footer(); ?>