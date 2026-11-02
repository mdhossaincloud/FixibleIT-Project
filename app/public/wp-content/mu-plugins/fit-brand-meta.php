<?php
/**
 * Fixible IT — Brand meta tags (favicon, Open Graph).
 * Mu-plugin: auto-loaded by WordPress.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_head', function() {
    $base = get_stylesheet_directory_uri() . '/assets/images';
    ?>
    <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( $base . '/favicon.svg' ); ?>">
    <link rel="apple-touch-icon" href="<?php echo esc_url( $base . '/favicon.svg' ); ?>">
    <meta property="og:site_name" content="Fixible IT">
    <meta property="og:image" content="<?php echo esc_url( $base . '/og-share.svg' ); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/svg+xml">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo esc_url( $base . '/og-share.svg' ); ?>">
    <?php
}, 5 );