<?php
/**
 * Plugin Name: Fixible IT Core
 * Description: Core business logic for Fixible IT.
 * Version: 2.1.1
 * Author: Fixible IT
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'FIT_PATH', plugin_dir_path( __FILE__ ) );

// Include required files
require_once FIT_PATH . 'includes/class-fit-db.php';
require_once FIT_PATH . 'includes/class-fit-pc-builder.php'; 
require_once FIT_PATH . 'includes/class-fit-ajax.php';
require_once FIT_PATH . 'includes/class-fit-admin.php';

// ============================================================
// PHASE 09A PATCH: Register activation hook (NEW - 5 lines)
// Fires FIT_DB::create_tables() only on plugin activation.
// ============================================================
register_activation_hook( __FILE__, 'fit_core_activate' );
function fit_core_activate() {
    if ( class_exists( 'FIT_DB' ) ) {
        FIT_DB::create_tables();
    }
}

add_action( 'plugins_loaded', 'fit_init_plugin' );
function fit_init_plugin() {
    if ( class_exists( 'FIT_DB' ) ) FIT_DB::init();
    if ( class_exists( 'FIT_PC_Builder' ) ) FIT_PC_Builder::init();
    if ( class_exists( 'FIT_Ajax' ) ) FIT_Ajax::init();
    if ( class_exists( 'FIT_Admin' ) ) FIT_Admin::init();
}