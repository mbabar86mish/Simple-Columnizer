<?php

/*
 * Plugin Name:       Simple Columnizer
 * Plugin URI:        https://mbabar2015.wordpress.com/
 * Description:       A plugin that generate responsive column and displays the column.
 * Version:           1.0
 * Author:            Muhammad Babar
 * Author URI:        mbabar86.php@gmail.com
 * Text Domain:       simple-columnizer
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
if (!defined('WPINC')) {
    die;
}
require_once plugin_dir_path(__FILE__) . 'includes/class-simple-columnizer.php';

function run_simple_columnizer() {
    $spmm = new Simple_Columnizer();
    $spmm->run();
}

run_simple_columnizer();
