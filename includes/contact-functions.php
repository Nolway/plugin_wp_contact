<?php

add_action('admin_print_styles', 'myplugin_styles_scripts');

function myplugin_styles_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style('style', $plugin_url . '/assets/styles/plugin.css');
}

// Add contact button
add_action('wp_footer', 'contact_btn');

function contact_btn() {
    $btn = '<a href="#" class="contact-btn">
    <img class="contact-btn-img" src="'.plugins_url("plugin_wp_contact/assets/img/logo-contact.png").'" alt="Contact"></a>';
    echo $btn;
}

add_action('admin_menu','contact_plugin_setup_menu');

function contact_plugin_setup_menu () {
    add_menu_page('WP contact page', 'Contacts', 'manage_options', 'plugin_wp_contact/includes/contact-acp-page.php');
}

// Register style sheet
add_action('wp_enqueue_scripts', 'contact_plugin_styles');

function contact_plugin_styles() {
    // CSS
    wp_register_style('plugin_wp_contact', plugins_url('plugin_wp_contact/assets/styles/plugin.css'));
    wp_register_style('bootstrap_style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('plugin_wp_contact');
    wp_enqueue_style('bootstrap_style');

    // JS
	wp_register_script('bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap_js');
}

// Créer la page contact à l'activation du plugin
function create_contact_page() {
    $my_post = array(
        'post_title'    => wp_strip_all_tags('Contact'),
        'post_content'  => 'Contact Page',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page'
    );

    wp_insert_post($my_post);
}