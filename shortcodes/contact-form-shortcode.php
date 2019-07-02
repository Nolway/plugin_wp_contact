<?php

function html_contact_form($email, $subject, $content) {
    echo '
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" class="form-control" id="email" required value="'.(isset($_POST['email']) ? $email : null).'" placeholder="Entrez votre adresse email">
            </div>
            <div class="form-group">
                <label for="subject">Sujet : </label>
                <input type="text" name="subject" class="form-control" id="subject" required value="'.(isset($_POST['subject']) ? $subject : null).'" placeholder="Sujet du message">
            </div>
            <div class="form-group">
                <label for="content">Votre message :</label>
                <textarea class="form-control" name="content" id="content" rows="3" required value="'.(isset($_POST['content']) ? $content : null).'"></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Envoyer" />
        </form>
    ';
}

// function form_validation($email, $subject, $content) {
//     global $reg_errors;
//     $reg_errors = new WP_Error;

//     if (empty($email) || empty($subject) || empty($content)) {
//         $reg_errors->add('field', 'Les champs ne sont pas remplies');
//     }

//     if (email_exists($email)) {
//         $reg_errors->add( 'email', 'adresse email déjà utilisée');
//     }

//     if (is_wp_error($reg_errors)) {
//         foreach ($reg_errors->get_error_messages() as $error) {
//             echo '<div>';
//             echo '<strong>ERREUR : </strong>:';
//             echo $error . '<br/>';
//             echo '</div>';
//         }
//     }
// }

function insert_complete_form() {
    global $email, $subject, $content, $wpdb;
    $table = 'wp_contact';
    
    $wpdb->insert($table, array(
        'email' => $email,
        'subject' => $subject,
        'content' => $content
    ),
    array(
        '%s',
        '%s',
        '%s'
    ));
}

function custom_contact_form_function() {
    if (isset($_POST['submit'])) {
        // form_validation(
        //     $_POST['email'],
        //     $_POST['subject'],
        //     $_POST['content']
        // );
         
        // sanitize user form input
        global $email, $subject, $content;
        $email      =   sanitize_email($_POST['email']);
        $subject    =   sanitize_text_field($_POST['subject']);
        $content    =   esc_textarea($_POST['content']);
 
        // call @function insert_complete_form to send message
        // only when no WP_error is found
        insert_complete_form(
            $email,
            $subject,
            $content
        );
    }
 
    html_contact_form(
        $email,
        $subject,
        $content
    );
}

add_shortcode('sitepoint_contact_form', 'contact_form_shortcode');

function contact_form_shortcode() {
	ob_start();
	custom_contact_form_function();
	return ob_get_clean();
}
