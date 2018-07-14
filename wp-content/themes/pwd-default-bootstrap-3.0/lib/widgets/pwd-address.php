<?php

/**
 * Adds PWD_Address_Widget widget.
 */

class PWD_Address_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {

		parent::__construct(

			'pwd_address_widget', // Base ID
			__('PWD Address Widget', 'pwd'), // Name
			array( 'description' => __( 'A PWD Address Widget', 'pwd' ), ) // Args

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

		echo $args['before_widget'];

	
		if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];

		
		?>

        <div class="pwd-address">

            <?php if(pwd_get_option("map_image")){ ?>

        		<p class="image-map">
                	<a href="<?php echo pwd_get_option("map_url"); ?>" target="_blank">
                    	<img src="<?php echo pwd_get_option("map_image"); ?>" alt="<?php echo esc_attr(pwd_get_option("address")); ?>" class="mini-map" />
                    </a>
                </p>
        	<?php } ?>

            <h3 class="location"><?php echo pwd_get_option("location"); ?></h3>
            <p class="address"><i class="fa fa-map-marker"></i> <?php echo pwd_get_option("address"); ?></p>

            <?php if(pwd_get_option("phone")){ ?><p class="phone"><a href="tel:<?php echo pwd_get_option("phone"); ?>"><i class="fa fa-phone"></i> <?php echo pwd_get_option("phone"); ?></a></p><?php }?>
            <?php if(pwd_get_option("fax")){ ?><p class="fax"><i class="fa fa-print"></i> <?php echo pwd_get_option("fax"); ?></p><?php } ?>
            <?php if(pwd_get_option("email")){ ?><p class="email"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo pwd_get_option("email"); ?>"><?php echo pwd_get_option("email"); ?></a></p><?php } ?>

        


        </div>

        

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

       <div class="pwd-address">
        
            <?php if(pwd_get_option("map_image")){ ?>

        		<p class="image-map">
                	<a href="<?php echo pwd_get_option("map_url"); ?>" target="_blank">
                    	<img src="<?php echo pwd_get_option("map_image"); ?>" alt="<?php echo esc_attr(pwd_get_option("address")); ?>" class="mini-map" />
                    </a>
                </p>
        	<?php } ?>

            <h3 class="location"><?php echo pwd_get_option("location"); ?></h3>
            <p class="address"><i class="fa fa-map-marker"></i> <?php echo pwd_get_option("address"); ?></p>

            <?php if(pwd_get_option("phone")){ ?><p class="phone"><i class="fa fa-phone"></i> <?php echo pwd_get_option("phone"); ?></p><?php }?>
            <?php if(pwd_get_option("fax")){ ?><i class="fa fa-print"></i> <?php echo pwd_get_option("fax"); ?></p><?php } ?>
            <?php if(pwd_get_option("email")){ ?><p class="email"><i class="fa fa-envelope"></i> <?php echo pwd_get_option("email"); ?></p><?php } ?>
        </div>
        

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


} // class PWD_Address_Widget

register_widget( 'PWD_Address_Widget' );
