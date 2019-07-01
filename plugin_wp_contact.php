<?php
/*
Plugin Name: Plugin wp contact
Plugin URI: http://wordpress.org/plugins/wyp/
Description: Add contact form for users if they want to contact administrators
Author: ESGI Team
Version : 0.1
*/

require_once plugin_dir_path(__FILE__). 'includes/contact-functions.php';
require_once plugin_dir_path(__FILE__). 'includes/db-functions.php';

// Hooks
register_activation_hook(__FILE__, 'create_plugin_database_table');
register_activation_hook(__FILE__, 'contact_install_data');
register_activation_hook(__FILE__, 'create_contact_page');
