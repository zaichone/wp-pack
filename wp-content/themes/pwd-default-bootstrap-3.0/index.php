<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

		<div class="col-md-8 col-sm-8">
			
			<div id="content" class="site-content archive-content" role="main">

				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
						?>
					<?php endwhile; ?>
					<?php pwd_content_nav( 'nav-below' ); ?>
				<?php else : ?>
					<?php get_template_part( 'no-results', 'index' ); ?>
				<?php endif; ?>
			</div><!-- #content .site-content -->
		</div>
		<div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
	</div>
</div>
<?php get_footer(); ?>