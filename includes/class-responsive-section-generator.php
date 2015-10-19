<?php

class Responsive_Section_Generator {

    protected $loader;
    protected $plugin_slug;
    protected $version;
    public $section_style = array();
    public $total_section = 12;

    public function __construct() {
        $this->plugin_slug = 'responsive-section-generator-slug';
        $this->version = '0.1.0';
        //Filter to handle responsive section style
        add_filter('responsive_style_filter', array($this, 'responsive_style_filter_func'));
        add_filter('responsive_total_sections_filter', array($this, 'responsive_total_sections_filter_func'));


        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->generate_shortcode();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-responsive-section-generator-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-responsive-section-generator-widget.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-responsive-section-short-code.php';
        require_once plugin_dir_path(__FILE__) . '/class-responsive-section-generator-loader.php';
        $this->loader = new Responsive_Section_Generator_Loader();
    }

    private function generate_shortcode() {
        $shortcode = new Responsive_Section_Short_Code($this->get_version());
    }

    private function define_admin_hooks() {
        $admin = new Responsive_Section_Generator_Admin($this->get_version());
        $this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_script');
        $this->loader->add_action('widgets_init', $admin, 'section_widgets_init');
        $this->loader->add_action('widgets_init', $admin, 'register_responsive_section_manager_widget');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_version() {
        return $this->version;
    }

    public function responsive_total_sections_filter_func($arg) {
        if (is_int($arg) && intval($arg) > 0) {
            $this->total_section = $arg;
        }

        return $this->total_section;
    }

    public function responsive_style_filter_func($arg) {

        $this->section_style = array(
            'default' => array(
                'container_wrapper_start' => '<div class="row">',
                'container_wrapper_end' => '</div>',
                'icon_wrapper_start' => '<div>',
                'icon_wrapper_end' => '</div>',
                'title_wrapper_start' => '<h4>',
                'title_wrapper_end' => '</h4>',
                'content_wrapper_start' => '<p>',
                'content_wrapper_end' => '</p>'
            ),
            'style 1' => array(
                'container_wrapper_start' => '<div class="row">',
                'container_wrapper_end' => '</div>',
                'icon_wrapper_start' => '<span>',
                'icon_wrapper_end' => '</span>',
                'title_wrapper_start' => '<h3>',
                'title_wrapper_end' => '</h3>',
                'content_wrapper_start' => '<p>',
                'content_wrapper_end' => '</p>'
            )
        );

        if (is_array($arg)) {
            $this->section_style = array_merge($this->section_style, $arg);
        }

        return $this->section_style;
    }

}
