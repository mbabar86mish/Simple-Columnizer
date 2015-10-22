<?php

class Simple_Columnizer {

    protected $loader;
    protected $plugin_slug;
    protected $version;
    public $section_style = array();
    public $column_classes = array();
    public $total_section = 12;

    public function __construct() {
        $this->plugin_slug = 'simple-columnizer';
        $this->version = '1.0';
        //Filter to handle responsive section style
        add_filter('columnizer_style_filter', array($this, 'columnizer_style_filter_func'));
        add_filter('columnizer_total_sections_filter', array($this, 'columnizer_total_sections_filter_func'));
        add_filter('columnizer_column_classes_filter', array($this, 'columnizer_column_classes_filter_func'));


        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->generate_shortcode();
    }

    private function load_dependencies() {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-simple-columnizer-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-simple-columnizer-widget.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-simple-columnizer-short-code.php';
        require_once plugin_dir_path(__FILE__) . '/class-simple-columnizer-loader.php';
        $this->loader = new Simple_Columnizer_Loader();
    }

    private function generate_shortcode() {
        $shortcode = new Simple_Columnizer_Short_Code($this->get_version());
    }

    private function define_admin_hooks() {
        $admin = new Simple_Columnizer_Admin($this->get_version());
        $this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_script');
        $this->loader->add_action('widgets_init', $admin, 'section_widgets_init');
        $this->loader->add_action('widgets_init', $admin, 'register_columnizer_section_manager_widget');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_version() {
        return $this->version;
    }

    public function columnizer_total_sections_filter_func($arg) {
        if (is_int($arg) && intval($arg) > 0) {
            $this->total_section = $arg;
        }

        return $this->total_section;
    }

    public function columnizer_column_classes_filter_func($arg) {


        $this->column_classes = array(
            "Large devices Desktops" => array(
                'col-lg-1',
                'col-lg-2',
                'col-lg-3',
                'col-lg-4',
                'col-lg-5',
                'col-lg-6',
                'col-lg-7',
                'col-lg-8',
                'col-lg-9',
                'col-lg-10',
                'col-lg-11',
                'col-lg-12',
                'col-lg-offset-1',
                'col-lg-offset-2',
                'col-lg-offset-3',
                'col-lg-offset-4',
                'col-lg-offset-5',
                'col-lg-offset-6',
                'col-lg-offset-7',
                'col-lg-offset-8',
                'col-lg-offset-9',
                'col-lg-offset-10',
                'col-lg-offset-11',
                'col-lg-offset-12',
                'col-lg-push-1',
                'col-lg-push-2',
                'col-lg-push-3',
                'col-lg-push-4',
                'col-lg-push-5',
                'col-lg-push-6',
                'col-lg-push-7',
                'col-lg-push-8',
                'col-lg-push-9',
                'col-lg-push-10',
                'col-lg-push-11',
                'col-lg-push-12',
                'col-lg-pull-1',
                'col-lg-pull-2',
                'col-lg-pull-3',
                'col-lg-pull-4',
                'col-lg-pull-5',
                'col-lg-pull-6',
                'col-lg-pull-7',
                'col-lg-pull-8',
                'col-lg-pull-9',
                'col-lg-pull-10',
                'col-lg-pull-11',
                'col-lg-pull-12',
            ),
            "Medium devices Desktops" => array(
                'col-md-1',
                'col-md-2',
                'col-md-3',
                'col-md-4',
                'col-md-5',
                'col-md-6',
                'col-md-7',
                'col-md-8',
                'col-md-9',
                'col-md-10',
                'col-md-11',
                'col-md-12',
                'col-md-offset-1',
                'col-md-offset-2',
                'col-md-offset-3',
                'col-md-offset-4',
                'col-md-offset-5',
                'col-md-offset-6',
                'col-md-offset-7',
                'col-md-offset-8',
                'col-md-offset-9',
                'col-md-offset-10',
                'col-md-offset-11',
                'col-md-offset-12',
                'col-md-push-1',
                'col-md-push-2',
                'col-md-push-3',
                'col-md-push-4',
                'col-md-push-5',
                'col-md-push-6',
                'col-md-push-7',
                'col-md-push-8',
                'col-md-push-9',
                'col-md-push-10',
                'col-md-push-11',
                'col-md-push-12',
                'col-md-pull-1',
                'col-md-pull-2',
                'col-md-pull-3',
                'col-md-pull-4',
                'col-md-pull-5',
                'col-md-pull-6',
                'col-md-pull-7',
                'col-md-pull-8',
                'col-md-pull-9',
                'col-md-pull-10',
                'col-md-pull-11',
                'col-md-pull-12',
            ),
            "Small devices Tablets" => array(
                'col-sm-1',
                'col-sm-2',
                'col-sm-3',
                'col-sm-4',
                'col-sm-5',
                'col-sm-6',
                'col-sm-7',
                'col-sm-8',
                'col-sm-9',
                'col-sm-10',
                'col-sm-11',
                'col-sm-12',
                'col-sm-offset-1',
                'col-sm-offset-2',
                'col-sm-offset-3',
                'col-sm-offset-4',
                'col-sm-offset-5',
                'col-sm-offset-6',
                'col-sm-offset-7',
                'col-sm-offset-8',
                'col-sm-offset-9',
                'col-sm-offset-10',
                'col-sm-offset-11',
                'col-sm-offset-12',
                'col-sm-push-1',
                'col-sm-push-2',
                'col-sm-push-3',
                'col-sm-push-4',
                'col-sm-push-5',
                'col-sm-push-6',
                'col-sm-push-7',
                'col-sm-push-8',
                'col-sm-push-9',
                'col-sm-push-10',
                'col-sm-push-11',
                'col-sm-push-12',
                'col-sm-pull-1',
                'col-sm-pull-2',
                'col-sm-pull-3',
                'col-sm-pull-4',
                'col-sm-pull-5',
                'col-sm-pull-6',
                'col-sm-pull-7',
                'col-sm-pull-8',
                'col-sm-pull-9',
                'col-sm-pull-10',
                'col-sm-pull-11',
                'col-sm-pull-12',
            ),
            "Extra small devices Phones" => array(
                'col-xs-1',
                'col-xs-2',
                'col-xs-3',
                'col-xs-4',
                'col-xs-5',
                'col-xs-6',
                'col-xs-7',
                'col-xs-8',
                'col-xs-9',
                'col-xs-10',
                'col-xs-11',
                'col-xs-12',
                'col-xs-offset-1',
                'col-xs-offset-2',
                'col-xs-offset-3',
                'col-xs-offset-4',
                'col-xs-offset-5',
                'col-xs-offset-6',
                'col-xs-offset-7',
                'col-xs-offset-8',
                'col-xs-offset-9',
                'col-xs-offset-10',
                'col-xs-offset-11',
                'col-xs-offset-12',
                'col-xs-push-1',
                'col-xs-push-2',
                'col-xs-push-3',
                'col-xs-push-4',
                'col-xs-push-5',
                'col-xs-push-6',
                'col-xs-push-7',
                'col-xs-push-8',
                'col-xs-push-9',
                'col-xs-push-10',
                'col-xs-push-11',
                'col-xs-push-12',
                'col-xs-pull-1',
                'col-xs-pull-2',
                'col-xs-pull-3',
                'col-xs-pull-4',
                'col-xs-pull-5',
                'col-xs-pull-6',
                'col-xs-pull-7',
                'col-xs-pull-8',
                'col-xs-pull-9',
                'col-xs-pull-10',
                'col-xs-pull-11',
                'col-xs-pull-12',
            )
        );

        if (is_array($arg)) {
            $this->column_classes = array_merge($this->column_classes, $arg);
        }
        return $this->column_classes;
    }

    public function columnizer_style_filter_func($arg) {

        $this->section_style = array(
            'default' => array(
                'container_wrapper_start' => '<div class="row">',
                'container_wrapper_end' => '</div>',
                'icon_wrapper_start' => '<div %s%>',
                'icon_wrapper_end' => '</div>',
                'title_wrapper_start' => '<h4 %s%>',
                'title_wrapper_end' => '</h4>',
                'content_wrapper_start' => '<p %s%>',
                'content_wrapper_end' => '</p>'
            ),
            'style 1' => array(
                'container_wrapper_start' => '<div class="row">',
                'container_wrapper_end' => '</div>',
                'icon_wrapper_start' => '<span %s%>',
                'icon_wrapper_end' => '</span>',
                'title_wrapper_start' => '<h3 %s%>',
                'title_wrapper_end' => '</h3>',
                'content_wrapper_start' => '<p %s%>',
                'content_wrapper_end' => '</p>'
            )
        );

        if (is_array($arg)) {
            $this->section_style = array_merge($this->section_style, $arg);
        }

        return $this->section_style;
    }

}
