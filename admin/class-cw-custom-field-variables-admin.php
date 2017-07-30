<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codewrangler.io
 * @since      1.0.0
 *
 * @package    CW_Custom_Field_Variables
 * @subpackage CW_Custom_Field_Variables/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    CW_Custom_Field_Variables
 * @subpackage CW_Custom_Field_Variables/admin
 * @author     Edward Jenkins <erjenkins1@gmail.com>
 */
class CW_Custom_Field_Variables_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cw_Custom_Field_Variables_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cw_Custom_Field_Variables_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cw-custom-field-variables-admin.css', array(), $this->version, 'all' );

	}

	public function register_tinymce_buttons( $buttons ) {
		array_push( $buttons, 'custom-field-variable' );
		return $buttons;
	}

	public function register_tinymce_script( $plugin_array ) {
		$plugin_array['cw_custom_field_variable'] = plugins_url( '/js/cw-custom-field-variables-admin.js',__FILE__ );
		return $plugin_array;
	}

	public function get_custom_fields() {
		$pid = esc_attr( $_POST['id'] );

		$fields = get_post_meta( $pid );

		$return = array();
		$ignore = array('_edit_lock', '_edit_last');

		foreach( $fields as $k => $v ) {
			if( !in_array( $k, $ignore ) ) {
				$return[] = array('text' => $k, 'value' => $k );
			}
		}

		if( empty( $return ) ) {
			$return[] = array('text' => __('No Custom Fields Currently Exist'), 'value' => 0 );
		}

		echo json_encode( $return );
		wp_die();
	}

	/**
	 * Makes the localization array available to the tinyMCE script
	 * @since 1.0.1
	 */
	
	public function localize_tinymce_script() {
		?>
		<!-- tinyMCE CW Custom Field Plugin -->
		<script type='text/javascript'>
			var cwcustomFieldVariables = {
				'title': "<?php _e('Custom Field Variable', 'cw-custom-field-variables' ); ?>",
				'editor_title' : "<?php _e('Insert a Custom Field Variable', 'cw-custom-field-variables' ); ?>",
				'label' : "<?php _e('Choose a Field', 'cw-custom-field-variables' ); ?>",
				'insert' : "<?php _e('Insert Field Variable', 'cw-custom-field-variables' ); ?>",
				'close' : "<?php _e('Close', 'cw-custom-field-variables' ); ?>",
			};
		</script>
		<!-- tinyMCE CW Custom Field Plugin -->
		<?php
	}

}
