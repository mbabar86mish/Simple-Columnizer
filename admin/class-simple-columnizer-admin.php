<?php

class Simple_Columnizer_Admin {

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
                'simple-columnizer-bootstrap-admin', plugin_dir_url(__FILE__) . 'css/custom-bootstrap.css', array(), $this->version, FALSE
        );
    }

    public function enqueue_script() {

        wp_enqueue_script('simple-columnizer-customjs', plugin_dir_url(__FILE__) . 'js/simple_columnizer_custom.js');
    }

    public function section_widgets_init() {

        //This will generator widget area in widget amnagement page.
        register_sidebar(array(
            'name' => 'Columnizer Widget Area',
            'id' => 'columnizer_section_generator',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="rounded">',
            'after_title' => '</h2>',
        ));
    }

    public function register_columnizer_section_manager_widget() {
        register_widget('Simple_Columnizer_Widget');
    }

}

?>