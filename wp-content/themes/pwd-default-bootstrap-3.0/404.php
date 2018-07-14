<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="content" role="main">

				<div id="main">
					<div class="not-found">
						<strong>404</strong>
						<h1><?php _e('The page cannot be found.', 'pwd' ); ?></h1>
						<hr>

						<?php get_search_form(); ?>
						<p>
							Please use search box or <a href="<?php echo esc_url( home_url( '/' ) ); ?>">return back</a>
						</p>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>