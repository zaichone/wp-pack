<?php

/**
 * Adds PWD_Socials_Widget widget.
 */

class PWD_Socials_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */

    function __construct() {

        parent::__construct(

            'pwd_socials_widget', // Base ID
            __('PWD Socials Widget', 'pwd'), // Name
            array( 'description' => __( 'A PWD Socials Widget', 'pwd' ), ) // Args
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

        <ul class="socials">
            <?php if(pwd_get_option("facebook")){ ?>    <li class="social facebook"><a href="<?php echo pwd_get_option("facebook"); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
            <?php if(pwd_get_option("twitter")){ ?>     <li class="social twitter"><a href="<?php echo pwd_get_option("twitter"); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
            <?php if(pwd_get_option("google-plus")){ ?> <li class="social google-plus"><a href="<?php echo pwd_get_option("google-plus"); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li><?php } ?>
            <?php if(pwd_get_option("instagram")){ ?> <li class="social instagram"><a href="<?php echo pwd_get_option("instagram"); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li><?php } ?>
            <?php if(pwd_get_option("youtube")){ ?>     <li class="social youtube"><a href="<?php echo pwd_get_option("youtube"); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li><?php } ?>
            <?php if(pwd_get_option("linkedin")){ ?>    <li class="social linkedin"><a href="<?php echo pwd_get_option("linkedin"); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
            <?php if(pwd_get_option("feed")){ ?>        <li class="social feed"><a href="<?php echo pwd_get_option("feed"); ?>" target="_blank"><i class="fa fa-rss"></i></a></li><?php } ?>
        </ul>

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
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','pwd'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <ul class="socials">
            <?php if(pwd_get_option("facebook")){ ?><li class="social facebook"><a href="<?php echo pwd_get_option("facebook"); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li><?php } ?>
            <?php if(pwd_get_option("twitter")){ ?><li class="social twitter"><a href="<?php echo pwd_get_option("twitter"); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li><?php } ?>
            <?php if(pwd_get_option("linkedin")){ ?><li class="social linkedin"><a href="<?php echo pwd_get_option("linkedin"); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li><?php } ?>
        </ul>
        
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
} // class PWD_Socials_Widget


register_widget( 'PWD_Socials_Widget' );
    