<?php

class Contact_Widget extends WP_Widget {
	/**
	 * Créer le widget
	 */
	function __construct() {
		parent::__construct(
			'contact_widget',
			esc_html__('Widget informations de contact', 'text_domain'),
			array(
                'classname' => 'Contact Form Widget',
                'description' => esc_html__( 'Un widget du plugin plugin-wp-contact', 'text_domain'),
            )
		);
	}

	/**
	 * Affichage en front
	 */
	public function widget($args, $instance) {
		extract($args);

        $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $email = isset( $instance['email'] ) ? $instance['email'] : '';
        $phone = isset( $instance['phone'] ) ?$instance['phone'] : '';
        $address = isset( $instance['address'] ) ?$instance['address'] : '';

        echo $before_widget;

        // Affichage
        echo '<div>';

            if ($title) {
                echo $before_title . $title . $after_title;
            }

            if ($email) {
                echo '<a href="mailto:"'. $email . '>' . $email . '</a>';
            }

            if ($phone) {
                echo '<p>' . $phone . '</p>';
            }

            if ($address) {
                echo '<p>' . $address . '</p>';
            }

        echo '</div>';
        echo $after_widget;
	}

	/**
	 * Formulaire en back
	 */
	public function form($instance) {

        // Valeurs par défaut
        $defaults = array(
			'title' => '',
			'phone' => '',
			'email' => '',
			'address' => ''
        );

        extract(wp_parse_args((array) $instance, $defaults)); ?>
            <!-- Widget title field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Titre du widget', 'text_domain'); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p>

            <!-- Email field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php _e('Email :', 'text_domain'); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="email" value="<?php echo esc_attr($email); ?>" />
            </p>

            <!-- Phone field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php _e('Téléphone :', 'text_domain'); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
            </p>

            <!--  Address field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php _e('Adresse :', 'text_domain'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
            </p>
            
            <?php
        }

	/**
	 * Sauvegarde des valeurs rentrées dans le formulaire
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
        $instance['email']     = isset( $new_instance['email'] ) ? wp_strip_all_tags( $new_instance['email'] ) : '';
        $instance['phone'] = isset( $new_instance['phone'] ) ? wp_kses_post( $new_instance['phone'] ) : '';
        $instance['address'] = isset( $new_instance['address'] ) ? wp_kses_post( $new_instance['address'] ) : '';
        return $instance;
	}
} 

// Hook 'widgets_init' pour charger la fonction 'contact_info_widgets'
add_action('widgets_init', 'contact_info_widgets');

// Déclarer le/les widget(s)
function contact_info_widgets() {
    register_widget('Contact_Widget');
}
