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

	<div class="row">

		<div class="col-md-8">
			<div id="content" class="site-content" role="main">

				<div class="archive-header page-header has-breadcrumbs">

					<h1 class="entry-title"> SERVICES</h1>

				</div><!-- .entry-header -->

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
		<div class="col-md-4"><?php get_sidebar(); ?></div>
	</div>
</div>


<?php get_footer(); ?>