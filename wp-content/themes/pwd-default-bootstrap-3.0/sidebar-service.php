<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */
?>
<div id="sidebar" class="widget-area" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-service' ); ?>
</div>
<!-- #secondary .widget-area --> 
