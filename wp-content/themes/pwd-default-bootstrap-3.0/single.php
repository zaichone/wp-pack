<?php

/**
 * The Template for displaying all single posts.
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */


get_header(); ?>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="page-header page-for-posts-header  has-breadcrumbs">
				<h1 class="entry-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
				<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
			</div><!-- .entry-header -->
		</div>
		
		<div class="col-md-8">
			<div id="content" class="site-content archive-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
					<?php pwd_content_nav( 'nav-below' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template

					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
					?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- .col-md-8 -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- col-md-4 -->
		
	</div><!-- .row -->
</div>

<?php get_footer(); ?>