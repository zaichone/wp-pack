<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */

get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="content" class="site-content" role="main">

                    <header class="page-header">
                        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'pwd' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header><!-- .page-header -->
                    
                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'search' ); ?>

                    <?php endwhile; ?>

                    <?php pwd_content_nav( 'nav-below' ); ?>

                <?php else : ?>

                    <?php get_template_part( 'no-results', 'search' ); ?>

                <?php endif; ?>
            </div><!-- #content .site-content -->

        </div>
        <div class="col-md-4"><?php get_sidebar(); ?></div>
    </div>

</div>
<?php get_footer(); ?>