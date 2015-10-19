<?php

class Responsive_Section_Generator_Admin {

    private $version;

    public function __construct($version) {
        $this->version = $version;
    }

    /**
     * Enqueues the style sheet responsible for styling the contents of this
     * meta box.
     */
    public function enqueue_styles() {
        wp_enqueue_style(
                'responsive-section-generator-bootstrap-admin', plugin_dir_url(__FILE__) . 'css/custom-bootstrap.css', array(), $this->version, FALSE
        );
    }

    public function enqueue_script() {

        wp_enqueue_script('responsive-section-generator-customjs', plugin_dir_url(__FILE__) . 'js/responsive_section_generator_custom.js');
    }

    public function section_widgets_init() {

        //This will generator widget area in widget amnagement page.
        register_sidebar(array(
            'name' => 'Responsive Sections Generator',
            'id' => 'responsive_section_generator',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));
    }

    public function register_responsive_section_manager_widget() {
        register_widget('Responsive_Section_Generator_Widget');
    }

    public function render_meta_box() {
        require_once plugin_dir_path(__FILE__) . 'partials/responsive-section-manager.php';
    }

}

?>