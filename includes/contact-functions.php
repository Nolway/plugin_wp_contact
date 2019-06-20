<?php

// add_filter('wp_title', 'wyp_modify_page_title', 20) ;
// function wyp_modify_page_title($title) {
//     return $title . ' | test WYP !' ;
// }

add_action( 'the_content', 'my_thank_you_text' );

function my_thank_you_text ( $content ) {
    return $content .= '<p>Thank you for reading!</p>';
}