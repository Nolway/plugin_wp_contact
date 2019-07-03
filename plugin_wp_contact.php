<?php
/*
Plugin Name: Plugin wp contact
Plugin URI: http://wordpress.org/plugins/wyp/
Description: Add contact form for users if they want to contact administrators
Author: ESGI Team
Version : 0.1
*/

require_once plugin_dir_path(__FILE__). 'includes/db-functions.php';
require_once plugin_dir_path(__FILE__). 'includes/contact-functions.php';
require_once plugin_dir_path(__FILE__). 'shortcodes/contact-form-shortcode.php';
require_once plugin_dir_path(__FILE__). 'shortcodes/fixed-contact-form-shortcode.php';

// Hooks
register_activation_hook(__FILE__, 'create_plugin_database_table');
register_activation_hook(__FILE__, 'contact_install_data');
register_activation_hook(__FILE__, 'create_contact_page');

add_action('admin_enqueue_scripts', 'admin_style');
function admin_style() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style('admin-styles', $plugin_url . '/assets/styles/plugin.css');
}