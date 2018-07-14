<?php

/**
 * Template Name: Contact Sidebar
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

<div class="container">
	<header class="page-header has-breadcrumbs">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
	</header><!-- .entry-header -->
	<div class="row">
		<div class="col-md-9 col-sm-9">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- #content .site-content -->
		</div>
		<div class="col-md-3 col-sm-3">
			<?php get_sidebar('page'); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>