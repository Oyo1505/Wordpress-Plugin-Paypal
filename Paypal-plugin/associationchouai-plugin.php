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
				array('Description' =>  __( 'Sample widget based on WPBeginner Tutorial', 'paypal_widget_domain' ),)
				);
		}
	
		//front-end display
	public function widget($args, $instance){

		$title = apply_filters( 'widget_title', $instance['title']) ;
		$button = $instance ['button'];
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
		            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
			">
            <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
            <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
        </form>
		<?php
		}elseif($instance['button'] == 'button-2'){

		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		            <input type="hidden" name="cmd" value="_s-xclick">
		            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
			">
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

<?php
}
 
 // Updating widget replacing old instances with new

	public function update($new_instance, $old_instance){

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['button']	= strip_tags($new_instance['button'] );
						
						

		return $instance;
		
	}

}// class paypal_widget end here


	// Register and load the widget


	function paypal_load_widget() {
   		 register_widget( 'WP_paypal_widget' );
	}

	add_action( 'widgets_init', 'paypal_load_widget' );
?>