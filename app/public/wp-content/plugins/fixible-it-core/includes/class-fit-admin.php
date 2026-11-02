<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FIT_Admin {
    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
    }

    public static function add_menu() {
        add_menu_page( 'Fixible IT', 'Fixible IT', 'manage_options', 'fit-quotes', array( __CLASS__, 'render_quotes' ), 'dashicons-clipboard', 26 );
        add_submenu_page( 'fit-quotes', 'Quotations', 'Quotations', 'manage_options', 'fit-quotes', array( __CLASS__, 'render_quotes' ) );
        add_submenu_page( 'fit-quotes', 'Service Enquiries', 'Service Enquiries', 'manage_options', 'fit-services', array( __CLASS__, 'render_services' ) );
        add_submenu_page( 'fit-quotes', 'Support Tickets', 'Support Tickets', 'manage_options', 'fit-tickets', array( __CLASS__, 'render_tickets' ) );
    }

    public static function render_quotes() {
        global $wpdb;
        $quotes = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}fit_quotes ORDER BY id DESC" );
        echo '<div class="wrap"><h1>Customer Quotations</h1><table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Ref</th><th>Customer</th><th>Phone</th><th>Total</th><th>Status</th><th>Date</th></tr></thead><tbody>';
        foreach($quotes as $q) { 
            echo "<tr><td><strong>{$q->ref_no}</strong></td><td>{$q->customer_name}</td><td>{$q->customer_phone}</td><td>BDT {$q->total_price}</td><td><span style='background:#ffba00; padding:3px 8px; border-radius:3px; color:#000;'>{$q->status}</span></td><td>{$q->created_at}</td></tr>"; 
        }
        echo '</tbody></table></div>';
    }

    public static function render_services() {
        global $wpdb;
        $services = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}fit_service_enquiries ORDER BY id DESC" );
        echo '<div class="wrap"><h1>IT Service Enquiries</h1><table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Ref</th><th>Service</th><th>Customer</th><th>Phone</th><th>Location</th><th>Requirements</th><th>Date</th></tr></thead><tbody>';
        foreach($services as $s) { 
            echo "<tr><td><strong>{$s->ref_no}</strong></td><td>{$s->service_type}</td><td>{$s->customer_name}</td><td>{$s->customer_phone}</td><td>{$s->location}</td><td>" . substr($s->requirements, 0, 50) . "...</td><td>{$s->created_at}</td></tr>"; 
        }
        echo '</tbody></table></div>';
    }

    public static function render_tickets() {
        global $wpdb;
        $tickets = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}fit_tickets ORDER BY id DESC" );
        echo '<div class="wrap"><h1>Support Tickets</h1><table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Ref</th><th>Customer</th><th>Phone</th><th>Subject</th><th>Priority</th><th>Status</th></tr></thead><tbody>';
        foreach($tickets as $t) { 
            echo "<tr><td><strong>{$t->ref_no}</strong></td><td>{$t->customer_name}</td><td>{$t->customer_phone}</td><td>{$t->subject}</td><td>{$t->priority}</td><td>{$t->status}</td></tr>"; 
        }
        echo '</tbody></table></div>';
    }
}