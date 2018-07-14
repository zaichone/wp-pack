<?php
/**
 * Adds PWD_Testimonials_Widget widget.
 */
class PWD_Testimonials_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'pwd_testimonials_widget', // Base ID
			__('PWD Testimonials Widget', 'pwd'), // Name
			array( 'description' => __( 'A PWD Testimonials Widget', 'pwd' ), ) // Args
			);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		;
		echo $args['before_widget'];
		
		if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];
		
		?>
		<div id="testimonials-<?php echo $args['widget_id']; ?>" class="testimonials">
			
			<?php 
			$query_args = array(
				'post_type'		 	=> 'testimonial',
				'orderby' 			=> 'rand',
				'order'				=> 'ASC',
				'posts_per_page' 	=> 4
				);
			$the_query 	= new WP_Query( $query_args );
			$bxcount 	= 0;
			$pager 		= "";
			$i = 0;
			if($the_query->post_count>0){
				$bxcount = $the_query->post_count;
				while ( $the_query->have_posts() ) : $the_query->the_post();
				$i++;
				?>
				<div class="testimonial">
					<div class="text">
						<?php the_excerpt(); ?>
					</div>
					<div class="info">
						<span class="name"><?php echo get_post_meta( get_the_ID(), 'testimonial_client_name',true) ?></span>
						<?php if(get_post_meta( get_the_ID(), 'testimonial_client_name',true)){ ?>
						<span class="company"> , 
							<?php if(get_post_meta( get_the_ID(), 'testimonial_client_website',true)){ ?>
								<a href="<?php echo get_post_meta( get_the_ID(), 'testimonial_client_company_website',true) ?>">
							<?php } ?>
								<?php echo get_post_meta( get_the_ID(), 'testimonial_client_company_name',true) ?>
							<?php if(get_post_meta( get_the_ID(), 'testimonial_client_website',true)){ ?>/a><?php } ?>
						</span>
						<?php } ?>
					</div>
				</div>
				<?php
				endwhile;
				
			}else{
				?>
					<div class="testimonial">
					<div class="text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit consectetur est ut condimentum. Fusce hendrerit eget mi in lacinia. Etiam vel enim sed lectus cursus scelerisque id vitae nibh.</p>
					</div>
					<div class="info">
						<span class="name">Jame</span>
					
						<span class="company"> , 
							<a href="#">Company</a>
						</span>
					</div>
				</div>
				<?php
			}
			
			wp_reset_postdata();
			?>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('#testimonials-<?php echo $args['widget_id']; ?>').bxSlider({
					mode			: 'fade', 
					infiniteLoop	: true, 
					controls		: false, 
					speed			: 1000,
					pager			: false,
					auto			: <?php echo ($bxcount>1)? 'true' : 'false'; ?>, 
					pause			: 5000,
					touchEnabled	: false
				});
			});
		</script>	
			<?php
			echo $args['after_widget'];
		}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'pwd' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','pwd' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // class PWD_Testimonials_Widget


register_widget( 'PWD_Testimonials_Widget' );