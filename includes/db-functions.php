<?php

global $contact_db_version;
$contact_db_version = '1.0';

function create_plugin_database_table()
{
    global $wpdb, $contact_db_version;

    $table_name = $wpdb->prefix.'contact';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
        subject TINYTEXT NOT NULL,
        content TEXT NOT NULL,
        email VARCHAR(150) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";
      
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    add_option('contact_db_version', $contact_db_version);
    $table_name = $wpdb->prefix . 'contact';
}

function get_all_contacts () {
    global $wpdb;

    $table_name = $wpdb->prefix.'contact';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "SELECT * FROM $table_name;";
    return $wpdb->get_results($sql);
}

function contact_install_data() {
	global $wpdb;
	
	$email = 'esgiteam@myges.com';
	$subject = 'Test';
	$content = 'Test';
	$table_name = $wpdb->prefix.'contact';
	$wpdb->insert( 
		$table_name, 
		array( 
			'email' => $email, 
			'subject' => $subject, 
			'content' => $content, 
		) 
	);
}