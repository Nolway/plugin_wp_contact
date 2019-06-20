<?php

function contact_btn() {
    $btn = '<a href="#" class="contact-btn">
    <img class="contact-btn-img" src="'.plugins_url("plugin_wp_contact/assets/img/logo-contact.png").'" alt="Contact"></a>';
    echo $btn;
}
    
add_action('wp_footer', 'contact_btn');

// Register style sheet
add_action('wp_enqueue_scripts', 'btn_plugin_styles');

// Register style sheet
function btn_plugin_styles() {
    wp_register_style('plugin_wp_contact', plugins_url('plugin_wp_contact/assets/styles/plugin.css'));
    wp_enqueue_style('plugin_wp_contact');
}