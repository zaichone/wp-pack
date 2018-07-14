<?php
/**
 * @package PWD Default Theme
 * @since PWD Default Theme 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'pwd' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php pwd_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'pwd' ) );
			if ( $categories_list) :
				?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'pwd' ), $categories_list ); ?>
			</span>
		<?php endif; // End if categories ?>
		<?php
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'pwd' ) );
		if ( $tags_list ) :
			?>
		<span class="sep"> | </span>
		<span class="tags-links">
			<?php printf( __( 'Tagged %1$s', 'pwd' ), $tags_list ); ?>
		</span>
	<?php endif; // End if $tags_list ?>
<?php endif; // End if 'post' == get_post_type() ?>
<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
	<span class="sep"> | </span>
	<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pwd' ), __( '1 Comment', 'pwd' ), __( '% Comments', 'pwd' ) ); ?></span>
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'pwd' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
