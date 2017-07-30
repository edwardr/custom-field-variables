<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://codewrangler.io
 * @since             1.0.0
 * @package           CW_Custom_Field_Variables
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Field Variables
 * Plugin URI:        https://codewrangler.io
 * Description:       Enables the display of custom-field variables in the WordPress post editor via a TinyMCE button. Works well with custom post types as well as default post types.
 * Version:           1.0.1
 * Author:            codeWrangler, Inc.
 * Author URI:        https://codewrangler.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cw-custom-field-variables
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cw-custom-field-variables-activator.php
 */
function activate_cw_custom_field_variables() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cw-custom-field-variables-activator.php';
	CW_Custom_Field_Variables_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cw-custom-field-variables-deactivator.php
 */
function deactivate_cw_custom_field_variables() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cw-custom-field-variables-deactivator.php';
	CW_Custom_Field_Variables_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cw_custom_field_variables' );
register_deactivation_hook( __FILE__, 'deactivate_cw_custom_field_variables' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cw-custom-field-variables.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cw_custom_field_variables() {

	$plugin = new CW_Custom_Field_Variables();
	$plugin->run();

}
run_cw_custom_field_variables();
