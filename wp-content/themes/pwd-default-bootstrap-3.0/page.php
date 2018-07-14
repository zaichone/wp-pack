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

        <div class="col-md-12">

            <header class="page-header has-breadcrumbs">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
            </header><!-- .entry-header -->
        </div>

        <div class="col-md-3 col-sm-3">
            <?php get_sidebar('page'); ?>
        </div>

        <div class="col-md-9 col-sm-9">
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="entry-content">

                        <?php the_content(); ?>

                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'pwd' ), 'after' => '</div>' ) ); ?>

                        <?php edit_post_link( __( 'Edit', 'pwd' ), '<span class="edit-link">', '</span>' ); ?>

                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->

                <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content .site-content -->
    </div>
</div>
</div>

<?php get_footer(); ?>