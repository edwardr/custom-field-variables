<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://codewrangler.io
 * @since      1.0.0
 *
 * @package    CW_Custom_Field_Variables
 * @subpackage CW_Custom_Field_Variables/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    CW_Custom_Field_Variables
 * @subpackage CW_Custom_Field_Variables/public
 * @author     Edward Jenkins <erjenkins1@gmail.com>
 */
class CW_Custom_Field_Variables_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	public function fetch_variable_names( $content ) {
			$result = array();
			$regex = "/{%([a-zA-Z0-9 -_]*)%}/";
			preg_match_all($regex, $content, $result);

			return $result[1];
	}


	public function process_editor_variables( $content ) {

		global $post;

		if( !isset( $post->ID ) ) {
			return;
		}

		$variables = $this->fetch_variable_names( $content, '{%', '%}');

		if( empty( $variables ) ) {
			return $content;
		} else {
			foreach( $variables as $variable ) {
				$k = get_post_meta( $post->ID, $variable, true );
				$content = str_replace( '{%' . $variable . '%}', $k, $content );
			}
		}

		return $content;
	}

}
