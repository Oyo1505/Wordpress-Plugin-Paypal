<?php
/*
 Plugin Name: PayPal Widget
 Description : Just a button Paypal.
*/



/* Start Adding Functions Below this Line */

class WP_paypal_widget extends WP_Widget {



		public function __construct() {


			parent::__construct(
				// Base ID of your widget
				'WP_paypal_widget',
				// Widget name will appear in UI
				__('Paypal Widget'),
				// Widget Description
				array('Description' =>  __( 'Just a Paypal Button, For fun', 'paypal_widget_domain' ),)
				);
		}

		//front-end display
	public function widget($args, $instance){

		$title = apply_filters( 'widget_title', $instance['title']) ;
		$button = $instance ['button'];
		//$key = $instance['key']
		// before and after widget arguments are defined by themes

		echo $args['before_widget'];
		if ( ! empty( $title ) ){
		echo $args['before_title'] . $title . $args['after_title'];
		}
		// This is where you run the code and display the output
		if($instance['button'] == 'button-1'){
		?>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		            <input type="hidden" name="cmd" value="_s-xclick">
		        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7----- <?php echo $instance['key'] ?> -----END PKCS7----- ">
            <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
            <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
        </form>
		<?php
		}elseif($instance['button'] == 'button-2'){

		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		            <input type="hidden" name="cmd" value="_s-xclick">
		            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7----- <?php echo $instance['key'] ?> -----END PKCS7----- ">

            <input type="image" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_xpressCheckout.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
        </form>

		<?php
		}

		//echo __( 'Paypal Donation ', 'paypal_widget_domain' );
		echo $args['after_widget'];


		}

		// Widget Backend display

		public  function form( $instance ) {

			if ( isset($instance[ 'title' ]) ) {

			$title = $instance[ 'title' ];

			}
			else {

			$title = __( 'New title', 'paypal_widget_domain' );

			}

			/* Stop Adding Functions Below this Line */

			// Widget admin form
?>

<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"> <?php _e('Title:');?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

</p>

<p>

		<label for="<?php echo $this->get_field_id( 'button' ); ?>"> <?php _e('Button:');?></label>
			<select name="<?php echo $this->get_field_name('button'); ?>">
				<option value="button-1" <?php echo $instance['button'] != 'button-2' ? ' selected="selected"' : ''; ?>><?php _e( 'Button 1', 'paypal_widget_domain'); ?></option>
				<option value="button-2" <?php echo $instance['button'] == 'button-2' ? ' selected="selected"' : ''; ?>><?php _e( 'Button 2', 'paypal_widget_domain' ); ?></option>

			</select>

</p>

<p>
	<label for="<?php echo $this->get_field_id('key');?>"> <?php _e('Paypal_ID');?></label>
	<input type="text" name="<?php echo $this->get_field_name('key'); ?>" value="<?php echo $instance['key']; ?> " >
</p>

<?php
}

 // Updating widget replacing old instances with new

	public function update($new_instance, $old_instance){

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['button']	= strip_tags($new_instance['button'] );
		$instance['key']	= strip_tags($new_instance['key'] );


		return $instance;

	}

}// class paypal_widget end here


	// Register and load the widget


	function paypal_load_widget() {
   		 register_widget( 'WP_paypal_widget' );
	}

	add_action( 'widgets_init', 'paypal_load_widget' );
?>
