<?php

/**
 * Template Name: Full-width
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

	<header class="page-header has-breadcrumbs">
		<h1 class="entry-title"><?php echo get_the_title($parent_id );?></h1>
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="col-md-12">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>