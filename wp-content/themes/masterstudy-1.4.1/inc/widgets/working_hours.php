<?php

class Stm_Working_Hours extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'working_hours', // Base ID
			__('Working Hours', 'stm_domain'), // Name
			array( 'description' => __( 'Office working hours', 'stm_domain' ), ) // Args
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
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}
        
        
        $days = array(
	        'monday' => __( 'Monday', 'stm_domain' ), 
			'tuesday' => __( 'Tuesday', 'stm_domain' ), 
			'wednesday' => __( 'Wednesday', 'stm_domain' ), 
			'thursday' => __( 'Thursday', 'stm_domain' ), 
			'friday' => __( 'Friday', 'stm_domain' ), 
			'saturday' => __( 'Saturday', 'stm_domain' ), 
			'sunday' => __( 'Sunday', 'stm_domain' )
        ); ?>
        
	        <table class="table_working_hours">
		        <?php foreach($days as $key => $day): ?>
		        	<?php if(!empty($instance[$key])): ?>
						<tr class="opened">
							<td class="day_label h6"><?php echo esc_attr($day); ?></td>
							<td class="day_value h6"><?php echo esc_attr($instance[$key]); ?></td>
						</tr>
					<?php else: ?>
						<tr class="closed">
							<td class="day_label h6"><?php echo esc_attr($day); ?></td>
							<td class="day_value closed h6"><span><?php _e('Closed', 'stm_domain'); ?></span></td>
						</tr>
					<?php endif; ?>
		        <?php endforeach; ?>
	        </table>

		<?php echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$title = '';
		$monday = '';
		$tuesday = '';
		$wednesday = '';
		$thursday = '';
		$friday = '';
		$saturday = '';
		$sunday = '';

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = __( 'Working hours', 'stm_domain' );
		}

		if ( isset( $instance[ 'monday' ] ) ) {
			$monday = $instance[ 'monday' ];
		}
		
		if ( isset( $instance[ 'tuesday' ] ) ) {
			$tuesday = $instance[ 'tuesday' ];
		}
		
		if ( isset( $instance[ 'wednesday' ] ) ) {
			$wednesday = $instance[ 'wednesday' ];
		}
		
		if ( isset( $instance[ 'thursday' ] ) ) {
			$thursday = $instance[ 'thursday' ];
		}
		
		if ( isset( $instance[ 'friday' ] ) ) {
			$friday = $instance[ 'friday' ];
		}
		
		if ( isset( $instance[ 'saturday' ] ) ) {
			$saturday = $instance[ 'saturday' ];
		}
		
		if ( isset( $instance[ 'sunday' ] ) ) {
			$sunday = $instance[ 'sunday' ];
		}

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'stm_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'monday' ) ); ?>"><?php _e( 'Monday', 'stm_domain' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'monday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'monday' ) ); ?>" type="text" value="<?php echo esc_attr( $monday ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tuesday' ) ); ?>"><?php _e( 'Tuesday', 'stm_domain' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tuesday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tuesday' ) ); ?>" type="text" value="<?php echo esc_attr( $tuesday ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'wednesday' ) ); ?>"><?php _e( 'Wednesday', 'stm_domain' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wednesday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wednesday' ) ); ?>" type="text" value="<?php echo esc_attr( $wednesday ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'thursday' ) ); ?>"><?php _e( 'Thursday', 'stm_domain' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'thursday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thursday' ) ); ?>" type="text" value="<?php echo esc_attr( $thursday ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'friday' ) ); ?>"><?php _e( 'Friday', 'stm_domain' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'friday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'friday' ) ); ?>" type="text" value="<?php echo esc_attr( $friday ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'saturday' ) ); ?>"><?php _e( 'Saturday', 'stm_domain' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'saturday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'saturday' ) ); ?>" type="text" value="<?php echo esc_attr( $saturday ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sunday' ) ); ?>"><?php _e( 'Sunday', 'stm_domain' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sunday' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sunday' ) ); ?>" type="text" value="<?php echo esc_attr( $sunday ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? esc_attr( $new_instance['title'] ) : '';
		$instance['monday'] = ( ! empty( $new_instance['monday'] ) ) ? esc_attr( $new_instance['monday'] ) : '';
		$instance['tuesday'] = ( ! empty( $new_instance['tuesday'] ) ) ? esc_attr( $new_instance['tuesday'] ) : '';
		$instance['wednesday'] = ( ! empty( $new_instance['wednesday'] ) ) ? esc_attr( $new_instance['wednesday'] ) : '';
		$instance['thursday'] = ( ! empty( $new_instance['thursday'] ) ) ? esc_attr( $new_instance['thursday'] ) : '';
		$instance['friday'] = ( ! empty( $new_instance['friday'] ) ) ? esc_attr( $new_instance['friday'] ) : '';
		$instance['saturday'] = ( ! empty( $new_instance['saturday'] ) ) ? esc_attr( $new_instance['saturday'] ) : '';
		$instance['sunday'] = ( ! empty( $new_instance['sunday'] ) ) ? esc_attr( $new_instance['sunday'] ) : '';

		return $instance;
	}

}

function register_working_hours_widget() {
	register_widget( 'Stm_Working_Hours' );
}
add_action( 'widgets_init', 'register_working_hours_widget' );