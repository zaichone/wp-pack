<?php

/**
 * The template for displaying all pages.
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
    <div class="row">

        <div class="col-md-9 col-sm-9">

           <div id="content" class="site-content" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="page-header has-breadcrumbs">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
                    </header><!-- .entry-header -->
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->
            <?php endwhile; ?>

        </div><!-- #content .site-content -->

    </div><!-- .col-md-8 -->

    <div class="col-md-3 col-sm-3">
        <?php get_sidebar('service'); ?>
    </div><!-- col-md-4 -->

</div><!-- .row -->
</div><!-- .containe -->

<?php get_footer(); ?>