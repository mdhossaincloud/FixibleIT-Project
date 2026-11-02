<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class FIT_Ajax {
    public static function init() {
        add_action( 'wp_ajax_fit_submit_quote', array( __CLASS__, 'submit_quote' ) );
        add_action( 'wp_ajax_nopriv_fit_submit_quote', array( __CLASS__, 'submit_quote' ) );
        add_action( 'wp_ajax_fit_submit_ticket', array( __CLASS__, 'submit_ticket' ) );
        add_action( 'wp_ajax_nopriv_fit_submit_ticket', array( __CLASS__, 'submit_ticket' ) );
        add_action( 'wp_ajax_fit_submit_service', array( __CLASS__, 'submit_service' ) );
        add_action( 'wp_ajax_nopriv_fit_submit_service', array( __CLASS__, 'submit_service' ) );
        add_action( 'wp_ajax_fit_track_request', array( __CLASS__, 'track_request' ) );
        add_action( 'wp_ajax_nopriv_fit_track_request', array( __CLASS__, 'track_request' ) );
    }

    public static function track_request() {
        check_ajax_referer( 'fit_ajax_nonce', '_ajax_nonce' );
        
        $ref = sanitize_text_field( $_POST['ref_no'] );
        if(empty($ref)) wp_send_json_error( array( 'message' => 'Please enter a reference number.' ) );

        global $wpdb;
        
        // Check Quotes
        $quote = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}fit_quotes WHERE ref_no = %s", $ref ) );
        if($quote) {
            wp_send_json_success( array( 
                'type' => 'Quotation',
                'status' => strtoupper($quote->status),
                'date' => date('d M, Y', strtotime($quote->created_at)),
                'name' => $quote->customer_name,
                'total' => 'BDT ' . number_format($quote->total_price)
            ));
        }

        // Check Services
        $service = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}fit_service_enquiries WHERE ref_no = %s", $ref ) );
        if($service) {
            wp_send_json_success( array( 
                'type' => 'Service Enquiry',
                'status' => strtoupper($service->status),
                'date' => date('d M, Y', strtotime($service->created_at)),
                'name' => $service->customer_name,
                'total' => 'N/A'
            ));
        }

        // Check Tickets
        $ticket = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}fit_tickets WHERE ref_no = %s", $ref ) );
        if($ticket) {
            wp_send_json_success( array( 
                'type' => 'Support Ticket',
                'status' => strtoupper($ticket->status),
                'date' => date('d M, Y', strtotime($ticket->created_at)),
                'name' => $ticket->customer_name,
                'total' => 'N/A'
            ));
        }

        wp_send_json_error( array( 'message' => 'No record found for this reference number.' ) );
    }

    public static function submit_service() {
        check_ajax_referer( 'fit_ajax_nonce', '_ajax_nonce' );
        global $wpdb;
        $ref = 'FIT-SRV-' . date('Y') . '-' . rand(10000, 99999);
        $wpdb->insert( $wpdb->prefix . 'fit_service_enquiries', array(
            'ref_no' => $ref, 'service_type' => sanitize_text_field($_POST['service_type']), 
            'customer_name' => sanitize_text_field($_POST['name']), 'customer_phone' => sanitize_text_field($_POST['phone']), 
            'company_name' => sanitize_text_field($_POST['company']), 'location' => sanitize_text_field($_POST['location']),
            'requirements' => sanitize_textarea_field($_POST['requirements']), 'status' => 'new'
        ));

        $html = '<div style="text-align:center; padding:20px;"><div style="width:50px; height:50px; background:#00A896; color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:24px; margin:0 auto 15px;">✓</div><h3 style="color:var(--fit-navy); margin-bottom:10px;">Enquiry Submitted!</h3><p style="color:var(--fit-muted); font-size:0.9rem; margin-bottom:15px;">Our engineers will contact you shortly.</p><div style="background:var(--fit-off-white); padding:10px; border-radius:4px; border:1px solid #eaeaea; font-size:0.9rem;">Reference: <strong style="color:var(--fit-teal-dark);">' . $ref . '</strong></div></div>';
        wp_send_json_success( array( 'html' => $html ) );
    }

    public static function submit_quote() {
        check_ajax_referer( 'fit_ajax_nonce', '_ajax_nonce' );
        global $wpdb;
        $ref = 'FIT-Q-' . date('Y') . '-' . rand(10000, 99999);
        $wpdb->insert( $wpdb->prefix . 'fit_quotes', array( 
            'ref_no' => $ref, 'customer_name' => sanitize_text_field($_POST['name']), 
            'customer_phone' => sanitize_text_field($_POST['phone']), 
            'build_data' => wp_json_encode($_POST['build']), 
            'total_price' => floatval($_POST['total']), 'status' => 'pending' 
        ) );
        
        $html = '<div style="text-align:center; padding:20px;"><div style="width:50px; height:50px; background:#00A896; color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:24px; margin:0 auto 15px;">✓</div><h3 style="color:var(--fit-navy); margin-bottom:10px;">Quote Requested!</h3><p style="color:var(--fit-muted); font-size:0.9rem; margin-bottom:15px;">We will verify availability and contact you.</p><div style="background:var(--fit-off-white); padding:10px; border-radius:4px; border:1px solid #eaeaea; font-size:0.9rem;">Reference: <strong style="color:var(--fit-teal-dark);">' . $ref . '</strong></div></div>';
        wp_send_json_success( array( 'html' => $html ) );
    }

    public static function submit_ticket() {
        check_ajax_referer( 'fit_ajax_nonce', '_ajax_nonce' );
        global $wpdb;
        $ref = 'FIT-SUP-' . date('Y') . '-' . rand(10000, 99999);
        $wpdb->insert( $wpdb->prefix . 'fit_tickets', array( 
            'ref_no' => $ref, 'customer_name' => sanitize_text_field($_POST['name']), 
            'customer_phone' => sanitize_text_field($_POST['phone']), 
            'subject' => sanitize_text_field($_POST['subject']), 
            'priority' => sanitize_text_field($_POST['priority']), 
            'description' => sanitize_textarea_field($_POST['description']), 'status' => 'open' 
        ) );
        
        $html = '<div style="text-align:center; padding:20px;"><div style="width:50px; height:50px; background:#00A896; color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:24px; margin:0 auto 15px;">✓</div><h3 style="color:var(--fit-navy); margin-bottom:10px;">Ticket Created!</h3><p style="color:var(--fit-muted); font-size:0.9rem; margin-bottom:15px;">Our support team will contact you.</p><div style="background:var(--fit-off-white); padding:10px; border-radius:4px; border:1px solid #eaeaea; font-size:0.9rem;">Reference: <strong style="color:var(--fit-teal-dark);">' . $ref . '</strong></div></div>';
        wp_send_json_success( array( 'html' => $html ) );
    }
}