<?php

/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */



get_header(); ?>

<div class="container">

	<div class="col-md-12">	

		<div class="archive-header page-header">

			<h1 class="entry-title">

				<?php

				if ( is_category() ) {
					printf( __( 'Category : %s', 'pwd' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				} elseif ( is_tag() ) {
					printf( __( 'Tag : %s', 'pwd' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				} elseif ( is_author() ) {

					the_post();

					printf( __( 'Author : %s', 'pwd' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );

					rewind_posts();

				} elseif ( is_day() ) {
					printf( __( 'Daily : %s', 'pwd' ), '<span>' . get_the_date() . '</span>' );
				} elseif ( is_month() ) {
					printf( __( 'Monthly : %s', 'pwd' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
				} elseif ( is_year() ) {
					printf( __( 'Yearly : %s', 'pwd' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
				} else {
					_e( 'Archives', 'pwd' );
				}

				?>

			</h1>
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>

		</div><!-- .entry-header -->
	</div>

	<div class="row">
		<div class="col-md-8 col-sm-8">

			<div id="content" class="site-content archive-content" role="main">

				<?php

				if ( is_category() ) {

					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
				} elseif ( is_tag() ) {

					$tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				}

				?>

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() ); ?>

					<?php endwhile; ?>

					<?php pwd_content_nav( 'nav-below' ); ?>

				<?php else : ?>
					<?php get_template_part( 'no-results', 'archive' ); ?>
				<?php endif; ?>

			</div>
		</div>
		<div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
	</div>
</div>


<?php get_footer(); ?>