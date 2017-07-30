=== Custom Field Variables ===
Contributors: wpnook
Donate link: https://codewrangler.io
Tags: custom-fields, tinymce, meta
Requires at least: 4.0
Tested up to: 4.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enables the display of custom-field variables in the WordPress post editor via a TinyMCE button. Works well with custom post types as well as default post types.

== Description ==

Enables the display of custom-field variables in the WordPress post editor via a TinyMCE button. Works well with custom post types as well as default post types.

Use the TinyMCE button to choose from a list of custom fields attached to the post to insert, or manually specify a custom field to display using the following syntax:

`{%custom_field_name%}`

== Installation ==

1. Upload `custom-field-variables` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Edit a post, page or custom post type, and use the TinyMCE toolbar button to insert field content.

== Frequently Asked Questions ==

= Are there limitations on the types of data that can be displayed? =

This plugin assumes you want to output the raw content of the custom field, and works best for string values -- i.e. a custom field with an alphanumeric value. It will not properly display custom field content outside of that realm, such as fields containing arrays, JSON, or other structured data.

== Screenshots ==

1. Example of variables used in post editor.
2. Example output of said variables.
3. TinyMCE toolbar modal for selecting and inserting custom-field variables.

== Changelog ==

= 1.0.1 =
Adds localization to tinyMCE script and POT file

= 1.0.0 =
Initial release.