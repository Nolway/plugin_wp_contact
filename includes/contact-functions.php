<?php

add_action('the_content', 'my_thank_you_text');

function my_thank_you_text ( $content ) {
    return $content .= '<p>Thank you for reading!</p>';
}

add_action('admin_menu','test_plugin_setup_menu');

function test_plugin_setup_menu () {
      add_menu_page('WP contact page', 'Contacts', 'manage_options', 'contact-plugin', 'contact_plugin_page_content' );
}

function contact_plugin_page_content () {
      echo"<h1>Page du plugin de contact</h1>";
}