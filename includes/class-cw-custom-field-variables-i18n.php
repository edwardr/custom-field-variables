<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://codewrangler.io
 * @since      1.0.0
 *
 * @package    CW_Custom_Field_Variables
 * @subpackage CW_Custom_Field_Variables/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    CW_Custom_Field_Variables
 * @subpackage CW_Custom_Field_Variables/includes
 * @author     Edward Jenkins <erjenkins1@gmail.com>
 */
class CW_Custom_Field_Variables_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cw-custom-field-variables',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
