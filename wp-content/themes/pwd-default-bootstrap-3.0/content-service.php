<?php
/**
 * The template used for displaying page content in single-service.php
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="thumbnail">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
          <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('medium');
        }
        else {
            echo '<img alt="file name" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.png" />';
        }
        ?>
    </a>
</div>      
<header class="entry-header">
  <h2 class="entry-title"><?php the_title(); ?></h2>
</header><!-- .entry-header -->



<div class="entry-content">
  <?php the_excerpt(); ?>
</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
