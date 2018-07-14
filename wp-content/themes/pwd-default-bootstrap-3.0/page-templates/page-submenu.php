<?php

/**
 * Template Name: Pages Menu by child
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
		<h1 class="entry-title"><?php echo get_the_title($parent_id );?></h1>
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
	</header><!-- .entry-header -->
	<div class="row">
		
		<div class="col-md-8 col-sm-8">

			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="page-content">
						<?php the_content(); ?>
					</div>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- #content .site-content -->
		</div>


		<div class="col-md-4 col-sm-4">
			<div id="sidebar" class="widget-area">
			<?php
				$parent_id =0;
				
				if($post->post_parent){

					$ancestors=get_post_ancestors($post->ID);
					$root=count($ancestors)-1;
					$parent_id = $ancestors[$root];


					$children = wp_list_pages("title_li=&child_of=".$parent_id."&echo=0");
				}else{
					$parent_id = $post->ID;
					$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				}

				if ($children) { ?>

				<div class="widget widget-child-menu widget_nav_menu">
					<!-- <h3 class="widget-title"> Menu</h3> -->
					<ul class="menu">
						<li <?php if(!$post->post_parent){ echo 'class="current_page_item"'; } ?>><a href="<?php echo get_the_permalink( $parent_id ) ?>"><?php echo get_the_title($parent_id); ?></a></li>
						<?php echo $children; ?>
					</ul>
				</div>
				<?php } ?>
		</div>
	</div>

</div>
</div>


<?php get_footer(); ?>