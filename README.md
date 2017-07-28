Custom Field Variables
===

## Description

Enables the display of custom-field variables in the WordPress post editor via a TinyMCE button. Works well with custom post types as well as default post types.

Use the TinyMCE button to choose from a list of custom fields attached to the post to insert, or manually specify a custom field to display using the following syntax:

`{%custom_field_name%}`

This repository is primarily for development, so if you're looking to use Site Announcements on your WordPress site, please download/install the plugin from the official WordPress plugin repository:

https://wordpress.org/plugins/custom-field-variables/

## Installation

1. Upload `custom-field-variables` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Edit a post, page or custom post type, and use the TinyMCE toolbar button to insert field content.

## Frequently Asked Questions

# Are there limitations on the types of data that can be displayed?

This plugin assumes you want to output the raw content of the custom field, and works best for string values -- i.e. a custom field with an alphanumeric value. It will not properly display custom field content outside of that realm, such as fields containing arrays, JSON, or other structured data.

# Development

Contributions are welcome and always appreciated, as are bug/issue reports.