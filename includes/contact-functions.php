<?php

add_action('admin_print_styles', 'myplugin_styles_scripts');

function myplugin_styles_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style('style', $plugin_url . '/assets/styles/plugin.css');
}

add_action('admin_menu','contact_plugin_setup_menu');

function contact_plugin_setup_menu() {
    add_menu_page('WP contact page', 'Contacts', 'manage_options', 'plugin_wp_contact/includes/contact-acp-page.php');
    add_submenu_page('plugin_wp_contact/includes/contact-acp-page.php', 'Custom', 'Custom', 'manage_options', 'plugin_wp_contact/includes/contact-acp-form-page.php');
}

// Register style sheet
add_action('wp_enqueue_scripts', 'contact_plugin_assets');

function contact_plugin_assets() {
    // CSS
    wp_register_style('plugin_wp_contact', plugins_url('plugin_wp_contact/assets/styles/plugin.css'));
    wp_register_style('bootstrap_style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('plugin_wp_contact');
    wp_enqueue_style('bootstrap_style');

    // JS
	wp_register_script('bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
	wp_register_script('toggle_js', plugins_url('plugin_wp_contact/assets/js/toggle.js'));
    wp_enqueue_script('bootstrap_js');
    wp_enqueue_script('toggle_js');
}

// Créer la page contact à l'activation du plugin
function create_contact_page() {
    $contact_page_title = 'Contactez-nous';
    $contact_page_content = 'Contact Page';
    $page_check = get_page_by_title($contact_page_title);
    
    $contact_page = array(
        'post_title'    => wp_strip_all_tags($contact_page_title),
        'post_content'  => $contact_page_content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page'
    );

    wp_insert_post($contact_page);
}

add_filter('contact_form', 'my_custom_form');


add_action('wp_footer', 'bottom_fixed_form');