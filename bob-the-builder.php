<?php
/**
 * Plugin Name: Bob The Builder
 * Description: A plugin to demonstrate new WordPress build system.
 * Version: 1.0.0
 * Author: Utsav Ladani
 * Author URI: https://profile.wordpress.org/utsavladani/
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: bob-the-builder
 */

namespace BobTheBuilder;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

include_once __DIR__ . '/build/index.php';

function btb_init() {
    // add_menu_page( 'Title', 'Menu', 'capability', $url, '', 'icon', 20 );

    // Standalone page
    add_menu_page(
        'BTB Homepage (Standalone)',
        'BTB Standalone',
        'manage_options',
        'btb-homepage',
        'btb_homepage_render_page',
    );

    $url = admin_url( 'admin.php?page=btb-homepage-wp-admin&p=' . urlencode( '/' ) );

    // WP Admin integrated page
    add_menu_page(
        'BTB Homepage (WP Admin)',
        'BTB WP Admin',
        'manage_options',
        $url,
        '',
    );
}
add_action( 'init', __NAMESPACE__ . '\btb_init' );

function btb_enqueue_scripts() {
    wp_enqueue_script( 'btb-logger' );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\btb_enqueue_scripts' );
