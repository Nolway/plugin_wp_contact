<?php

function html_contact_form($email, $subject, $content) {
    echo '
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre adresse email">
            </div>
            <div class="form-group">
                <label for="subject">Sujet : </label>
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Sujet du message">
            </div>
            <div class="form-group">
                <label for="content">Votre message :</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Envoyer" />
        </form>
    ';
}

function form_validation($email, $subject, $content) {
    global $reg_errors;
    $reg_errors = new WP_Error;

    if (empty($email)) {    
        $reg_errors->add('field', '
            <div class="alert alert-danger">
                <span>Le champ email n\'est pas rempli</span>
            </div>
        ');
    }

    if (empty($subject)) {
        $reg_errors->add('field', '
            <div class="alert alert-danger">
                <span>Le champ sujet n\'est pas rempli</span>
            </div>
        ');
    }

    if (empty($content)) {
        $reg_errors->add('field', '
            <div class="alert alert-danger">
                <span>Le champ message n\'est pas rempli</span>
            </div>
            '
        );
    }

    if (is_wp_error($reg_errors)) {
        foreach ($reg_errors->get_error_messages() as $error) {
            echo $error;
        }
    }
}

function insert_complete_form() {
    global $reg_errors, $email, $subject, $content, $wpdb;
    $table = 'wp_contact';
    
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
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

        echo '
            <div class="alert alert-success">
                <span>Votre message a bien été envoyé !</span>
            </div>   
        ';
    }
}

function custom_contact_form_function() {
    if (isset($_POST['submit'])) {
        form_validation(
            $_POST['email'],
            $_POST['subject'],
            $_POST['content']
        );
         
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

add_shortcode('contact_form', 'contact_form_shortcode');

function contact_form_shortcode() {
	ob_start();
	custom_contact_form_function();
	return ob_get_clean();
}
