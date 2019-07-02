<?php

function custom_input_shortcode($atts){
    // return "<h2>Bienvenue chez karac !</h2>";
    extract(shortcode_atts(
        array(

    ), $atts));

    return "
        <div class='form-group'>
            <label for='firstname'>Nom</label>
            <input form='test' type='text' class='form-control' id='firstname' placeholder='Entrez votre nom'>
        </div>
    ";
}
add_shortcode('custom_input', 'custom_input_shortcode');