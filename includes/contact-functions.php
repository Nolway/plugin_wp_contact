<?php

function contact_btn() {
    $btn = '<a href="#" class="contact-btn">
    <img class="contact-btn-img" src="'.plugins_url("plugin_wp_contact/assets/img/logo-contact.png").'" alt="Contact"></a>';
    echo $btn;
}
    
add_action('wp_footer', 'contact_btn');

function my_thank_you_text ( $content ) {
    return $content .= '<p>Thank you for reading!</p>';
}

add_action('admin_menu','test_plugin_setup_menu');

function test_plugin_setup_menu () {
      add_menu_page('WP contact page', 'Contacts', 'manage_options', 'contact-plugin', 'contact_plugin_page_content' );
}

// Register style sheet
add_action('wp_enqueue_scripts', 'btn_plugin_styles');

// Register style sheet
function btn_plugin_styles() {
    wp_register_style('plugin_wp_contact', plugins_url('plugin_wp_contact/assets/styles/plugin.css'));
    wp_enqueue_style('plugin_wp_contact');
}

function create_contact_page() {
    $my_post = array(
        'post_title'    => wp_strip_all_tags('Contact'),
        'post_content'  => 'Contact Page',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page'
    );

    // Insert la page dans la bdd
    wp_insert_post($my_post);
}