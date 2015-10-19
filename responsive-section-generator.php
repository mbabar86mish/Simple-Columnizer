<?php

/*
 * Plugin Name:       Responsive Section Generator
 * Plugin URI:        https://mbabar2015.wordpress.com/
 * Description:       Single Post Meta Manager displays the post meta data associated with a given post.
 * Description:       A plugin that generate responsive sections and displays the sections.
 * Version:           0.1.0
 * Author:            Muhammad Babar
 * Author URI:        mbabar86.php@gmail.com
 * Text Domain:       responsive-section-generator-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
if (!defined('WPINC')) {
    die;
}
require_once plugin_dir_path(__FILE__) . 'includes/class-responsive-section-generator.php';

function run_responsive_section_generator() {
    $spmm = new Responsive_Section_Generator();
    $spmm->run();
}

run_responsive_section_generator();
