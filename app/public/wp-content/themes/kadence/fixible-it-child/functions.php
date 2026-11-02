<?php
/**
 * Fixible IT Child Theme Functions
 *
 * @package Fixible_IT
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue parent theme styles and Google Fonts.
 */
add_action( 'wp_enqueue_scripts', function() {
    // 1. Enqueue Google Fonts (Inter)
    wp_enqueue_style( 'fixible-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );

    // 2. Enqueue Parent Theme Style (Kadence)
    wp_enqueue_style( 'kadence-parent-style', get_template_directory_uri() . '/style.css' );

    // 3. Enqueue Child Theme Style
    wp_enqueue_style( 'fixible-child-style', get_stylesheet_uri(), array( 'kadence-parent-style' ), wp_get_theme()->get('Version') );
});