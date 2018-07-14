<?php
/**
 * Template Name: Services
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

<div class="container">
	<div class="row">

	   <div class="col-md-12">
            <header class="page-header has-breadcrumbs">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
            </header><!-- .entry-header -->
        </div>

		<div class="col-md-12">
			<div id="content" role="main">
			
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>

				<?php 
				
				$args = array(
					'post_type' 		=> 'service',
					'orderby' 			=> 'menu_order',
					'order'				=> 'ASC',
					'posts_per_page' 	=> -1
					);
				
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) :
					echo '<div class="row">';
					while ( $the_query->have_posts() ) : $the_query->the_post();
						echo '<div class="col-md-4 col-sm-4">';
						get_template_part( 'content','service');
						echo '</div>';
					endwhile;
					echo '</div>';
				endif; 
				wp_reset_postdata();
				?>

			</div><!-- #content -->
		</div>
	</div>
</div>

<?php get_footer(); ?>