<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FIT_DB {

    // ============================================================
    // PHASE 09A PATCH: Version-aware init() safety net
    // Ensures tables are created even if activation hook is missed.
    // Uses dbDelta() which is idempotent (safe to run multiple times).
    // ============================================================
    const DB_VERSION = '2.1.1';

    public static function init() {
        $installed_version = get_option( 'fit_db_version', '0' );
        if ( version_compare( $installed_version, self::DB_VERSION, '<' ) ) {
            self::create_tables();
            update_option( 'fit_db_version', self::DB_VERSION );
        }
    }

    public static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        // 1. Quotations Table
        $table_quotes = $wpdb->prefix . 'fit_quotes';
        $sql_quotes = "CREATE TABLE $table_quotes (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            ref_no varchar(50) NOT NULL,
            customer_name varchar(100) NOT NULL,
            customer_phone varchar(20) NOT NULL,
            build_data longtext NOT NULL,
            total_price decimal(10,2) NOT NULL,
            status varchar(20) DEFAULT 'pending' NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id),
            UNIQUE KEY ref_no (ref_no)
        ) $charset_collate;";

        // 2. Support Tickets Table
        $table_tickets = $wpdb->prefix . 'fit_tickets';
        $sql_tickets = "CREATE TABLE $table_tickets (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            ref_no varchar(50) NOT NULL,
            customer_name varchar(100) NOT NULL,
            customer_phone varchar(20) NOT NULL,
            subject varchar(200) NOT NULL,
            priority varchar(20) NOT NULL,
            description text NOT NULL,
            status varchar(20) DEFAULT 'open' NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id),
            UNIQUE KEY ref_no (ref_no)
        ) $charset_collate;";

        // 3. Service Enquiries Table
        $table_services = $wpdb->prefix . 'fit_service_enquiries';
        $sql_services = "CREATE TABLE $table_services (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            ref_no varchar(50) NOT NULL,
            service_type varchar(50) NOT NULL,
            customer_name varchar(100) NOT NULL,
            customer_phone varchar(20) NOT NULL,
            company_name varchar(100) DEFAULT '' NOT NULL,
            location varchar(255) DEFAULT '' NOT NULL,
            requirements text NOT NULL,
            status varchar(20) DEFAULT 'new' NOT NULL,
            created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id),
            UNIQUE KEY ref_no (ref_no)
        ) $charset_collate;";

        dbDelta( $sql_quotes );
        dbDelta( $sql_tickets );
        dbDelta( $sql_services );
    }
}