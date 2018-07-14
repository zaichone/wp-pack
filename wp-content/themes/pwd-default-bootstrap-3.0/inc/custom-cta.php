<!--/ Start CTA Container /-->
<div class="cta-container">
  <div class="container"> 
    <div class="custom-cta row">

      <?php

      $args = array(
       'post_type'		 	=> 'cta',
       'orderby' 			=> 'menu_order',
       'order'				=> 'ASC',
       'posts_per_page' 	=> 3
       );
      $the_query = new WP_Query( $args );

      if($the_query->post_count>0){

       $i		= 0;
       $col 	= 3;

       while ($the_query->have_posts()) : $the_query->the_post(); ?>
       <div class="col-md-<?php echo  12/$col; ?> col-sm-<?php echo  12/$col; ?>">
        <div  id="cta-<?php the_ID();?>" class="cta col-<?php echo($i%$col); $i++; ?>">

          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
            <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail('medium');
            }
            else {
              echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.png" alt="" />';
            }
            ?>
          </a>
          <h2 class="cta-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
          <div class="cta-summary">
            <?php the_excerpt(); ?>
            <a class="post-readmore btn btn-warning" href="<?php the_permalink(); ?>">Read Detail</a>
          </div><!-- .entry-summary -->
        </div>
      </div>
      <?php

      endwhile;

    } 
    wp_reset_postdata();
    ?>
  </div>
  </div>
</div>
<!--/ ENDCTA Container /--> 

