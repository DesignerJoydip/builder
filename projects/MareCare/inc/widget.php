<?php
/**
 * Adds Foo_Widget widget.
 */
class Homequick_Service_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'Home Quick Services', 'home_quick_service_widget' ), // Name
			array( 'description' => esc_html__( 'This is a Home Quick Service Block Widget', 'home_quick_service_widget' ), ) // Args
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			echo $args['before_quick_image'];
				echo '<img src="'.$instance['quick_image'].'" alt="" border="0">';
			echo $args['after_quick_image'];
			echo $args['before_descrp'] . apply_filters( 'widget_descrp', $instance['quick_description'] ) . $args['after_descrp'];
			echo $args['before_quick_btn_title'];
				echo '<a class="btn btn-lg btnicon" href="'.$instance['quick_btn_url'].'">'.$instance['quick_btn_title'].'<i class="fa fa-angle-right"></i></a>';
			echo $args['after_quick_btn_title'];

		}		
		//echo esc_html__( 'Hello, World!', 'home_quick_service_widget' );
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'home_quick_service_widget' );
		$quick_description = ! empty( $instance['quick_description'] ) ? $instance['quick_description'] : esc_html__( '', 'home_quick_service_widget' );
		$quick_image = ! empty( $instance['quick_image'] ) ? $instance['quick_image'] : esc_html__( '', 'home_quick_service_widget' );
		$quick_btn_title = ! empty( $instance['quick_btn_title'] ) ? $instance['quick_btn_title'] : esc_html__( '', 'home_quick_service_widget' );
		$quick_btn_url = ! empty( $instance['quick_btn_url'] ) ? $instance['quick_btn_url'] : esc_html__( '', 'home_quick_service_widget' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'home_quick_service_widget' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label>Description</label>

		<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quick_description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quick_description' ) ); ?>"><?php echo esc_attr( $quick_description ); ?></textarea>
		
	  	</p>

	  	<script type="text/javascript">
			jQuery(document).ready(function() {
			    var $ = jQuery;
			    if ($('.set_custom_images').length > 0) {
			        if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
			            $(document).on('click', '.set_custom_images', function(e) {
			                e.preventDefault();
			                var button = $(this);
			                var id = button.prev();
			                wp.media.editor.send.attachment = function(props, attachment) {
			                    id.val(attachment.url);
			                    button.closest('.thumbRow').find(".process_custom_images_thumb").attr("src", attachment.url);
			                    //alert(rr);
			                    //$(".process_custom_images_thumb").attr("src", attachment.url);
		                    	$(".process_custom_images").trigger('change');
			                };
			                wp.media.editor.open(button);
			                return false;
			            });
			            $(document).on('click', '.delete_custom_images', function(e) {
			            	var button = $(this);
			            	button.closest('.thumbRow').find(".process_custom_images_thumb").attr("src", '');
			            	button.closest('.thumbRow').find(".process_custom_images").val('');
			            	button.closest('.thumbRow').find(".process_custom_images").trigger('change');
		            	/*$(".process_custom_images").val('');
		            	$(".process_custom_images").trigger('change');
		            	$(".process_custom_images_thumb").attr("src", "");*/
		            });
			        }
			    }
			});
		</script>
		<div class="thumbRow" style="width:100%; display:inline-block;">
		<p>
		<img class="process_custom_images_thumb" style="float:left; margin-right: 20px;" src="<?php echo esc_attr( $quick_image ); ?>" width="100px" height="100px" style="margin:0px 0px">
		    <input class="widefat process_custom_images" id="process_custom_images" name="<?php echo esc_attr( $this->get_field_name( 'quick_image' ) ); ?>" type="hidden" value="<?php echo esc_attr( $quick_image ); ?>">
		     	<button class="set_custom_images button" style="margin-top:40px;">Set Image</button>
		    	<a class="delete_custom_images button" style="margin-top:40px;">Delete</a>
		</p>
		</div>
		<p>
		<label>Button Title</label>

		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quick_btn_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quick_btn_title' ) ); ?>" type="text" value="<?php echo esc_attr( $quick_btn_title ); ?>">
		
	  	</p>
	  	<p>
		<label>Button URL</label>

		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quick_btn_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quick_btn_url' ) ); ?>" type="text" value="<?php echo esc_attr( $quick_btn_url ); ?>">
		
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['quick_description'] = ( ! empty( $new_instance['quick_description'] ) ) ? sanitize_text_field( $new_instance['quick_description'] ) : '';
		$instance['quick_image'] = ( ! empty( $new_instance['quick_image'] ) ) ? sanitize_text_field( $new_instance['quick_image'] ) : '';
		$instance['quick_btn_title'] = ( ! empty( $new_instance['quick_btn_title'] ) ) ? sanitize_text_field( $new_instance['quick_btn_title'] ) : '';
		$instance['quick_btn_url'] = ( ! empty( $new_instance['quick_btn_url'] ) ) ? sanitize_text_field( $new_instance['quick_btn_url'] ) : '';
		

		return $instance;
	}

} // class Foo_Widget


// register Foo_Widget widget
function register_Homequick_Service_Widget() {
    register_widget( 'Homequick_Service_Widget' );
}
add_action( 'widgets_init', 'register_Homequick_Service_Widget' );