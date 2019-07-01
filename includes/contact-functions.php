<?php

add_action('admin_print_styles', 'myplugin_styles_scripts');

function myplugin_styles_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style('style', $plugin_url . '/assets/styles/plugin.css');
}

function contact_btn() {
    $btn = '<a href="#" class="contact-btn">
    <img class="contact-btn-img" src="'.plugins_url("plugin_wp_contact/assets/img/logo-contact.png").'" alt="Contact"></a>';
    echo $btn;
}
    
add_action('wp_footer', 'contact_btn');

function my_thank_you_text ( $content ) {
    return $content .= '<p>Thank you for reading!</p>';
}

add_action('admin_menu','contact_plugin_setup_menu');

function contact_plugin_setup_menu () {
      add_menu_page('WP contact page', 'Contacts', 'manage_options', 'plugin_wp_contact/includes/contact-acp-page.php');
}

// Register style sheet
add_action('wp_enqueue_scripts', 'btn_plugin_styles');

// Register style sheet
function btn_plugin_styles() {
    wp_register_style('plugin_wp_contact', plugins_url('plugin_wp_contact/assets/styles/plugin.css'));
    wp_enqueue_style('plugin_wp_contact');
}
