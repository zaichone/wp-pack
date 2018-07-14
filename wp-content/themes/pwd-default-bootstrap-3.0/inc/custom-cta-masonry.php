<!--/ Start CTA Container /-->
<div class = "cta-masonry-container">
  <div class="container"> 
    <div class="custom-cta-masonry" class="custom-cta 1">

      <?php

      $args = array(
       'post_type'		 	=> 'service',
       'orderby' 			=> 'menu_order',
       'order'				=> 'ASC',
       'posts_per_page' 	=> -1
       );
      $the_query = new WP_Query( $args );

      if($the_query->post_count>0){

       $i		= 0;
       $col 	= 3;

       while ($the_query->have_posts()) : $the_query->the_post(); ?>

       <div class="item col-md-3 <?php echo get_post_meta(get_the_id(),'col-md-',true ); ?> col-sm-<?php echo get_post_meta(get_the_id(),'col-sm-',true );  ?>">
        <div  id="cta-masonry-<?php the_ID();?>" class="cta col-<?php echo($i%$col); $i++; ?>">

          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
            <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail('medium',array('class'=>'img-responsive'));
            }
            else {
              echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.png" alt="" />';
            }
            ?>
          </a>
          
        </div>
      </div>
      <?php

      endwhile;

    } 
    wp_reset_postdata();
    ?>
  </div>
</div>

<script type="text/javascript">

  jQuery(document).ready(function($) {

    var $container = $('.custom-cta-masonry');

    $container.imagesLoaded( function() {
      $container.masonry({
       // columnWidth: 200,
        itemSelector: '.item'
      });
    });


  });

</script> 



</div>
<!--/ ENDCTA Container /--> 

