<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */

?>

</div><!-- #main .site-main -->

<footer class="site-footer" role="contentinfo">
	<div class="footer-content">
		<div class="container">
			<div id="footer-sidebar" class="row">
				<?php dynamic_sidebar( 'sidebar-footer' ); ?>
			</div>
		</div>
	</div> 

	<!-- .footer-info -->

	<div class="footer-info">

		<div class="container">

			<div class="row">

				<!--/ Start Copyright Info /-->

				<div class="col-md-6">
					<div class="site-copyright">
						<?php do_action( 'pwd_copyright' ); ?><?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class'=>'list-inline pull-left', 'container' => 'ul','fallback_cb' => '', ) ); ?>
					</div>
				</div>

				<!--/ End Copyright Info /-->

				<div class="col-md-6 ">
					<div class="site-info">
						<?php if( function_exists('pwd_footer_v2')){ pwd_footer_v2(); } ?>
						<?php /*?><p><span>Website by</span> <a href="http://www.perth-web-design.com.au" id="pwdlogo" target="_blank">Perth Web Design</a></p><?php */?>
					</div>
				</div><!-- .site-info -->

			</div> 

		</div><!-- .container -->            

	</div><!-- END .footer-info -->



</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>