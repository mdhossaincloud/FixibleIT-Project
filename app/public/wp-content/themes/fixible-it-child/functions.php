<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

// 1. Enqueue Styles and Scripts
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'fixible-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null );
    wp_enqueue_style( 'kadence-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'fixible-child-style', get_stylesheet_uri(), array( 'kadence-parent-style' ), time() );
    
    if ( is_cart() || is_checkout() || is_page_template('page-pc-builder.php') ) {
        wp_dequeue_style( 'kadence-woocommerce' );
    }

    wp_enqueue_script( 'fixible-main-js', get_stylesheet_directory_uri() . '/assets/js/frontend.js', array('jquery'), time(), true );
    wp_localize_script( 'fixible-main-js', 'fit_ajax', array( 
        'url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'fit_ajax_nonce' )
    ) );
}, 999 );

// 2. Auto Create Pages & Menus
add_action( 'init', 'fit_setup_structure' );
function fit_setup_structure() {
    if ( get_option( 'fit_structure_created_v7' ) ) return;
    $pages = array(
        'IT Services' => 'page-it-services.php', 'Office Network' => 'page-service-network.php',
        'CCTV Surveillance' => 'page-service-cctv.php', 'PC Repair' => 'page-service-repair.php',
        'Server IT' => 'page-service-server.php', 'About Us' => 'page-about.php',
        'Contact' => 'page-contact.php', 'Support' => 'page-support.php',
        'PC Builder' => 'page-pc-builder.php', 'Compare' => 'page-compare.php', 'Track Order' => 'page-track.php'
    );
    foreach ( $pages as $title => $template ) {
        $existing = get_page_by_title( $title );
        if ( ! $existing ) {
            $id = wp_insert_post( array( 'post_title' => $title, 'post_type' => 'page', 'post_status' => 'publish' ) );
            if ( $id && ! is_wp_error( $id ) ) update_post_meta( $id, '_wp_page_template', $template );
        } else {
            update_post_meta( $existing->ID, '_wp_page_template', $template );
        }
    }
    update_option( 'fit_structure_created_v7', true );
}

// 3. Register Shop Sidebar
add_action( 'widgets_init', 'fit_register_shop_sidebar' );
function fit_register_shop_sidebar() {
    register_sidebar( array(
        'name' => 'Shop Sidebar (Filters)', 'id' => 'shop-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s fit-widget-box">',
        'after_widget' => '</div>', 'before_title' => '<h4 class="fit-widget-title">', 'after_title' => '</h4>',
    ) );
}

// 4. WooCommerce Layout Fixes (12 per page)
add_filter( 'loop_shop_per_page', function() { return 12; }, 20 );

// 5. Currency Symbol Fix
add_filter( 'woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2 );
function change_existing_currency_symbol( $custom_currency_symbol, $currency ) {
    if( $currency == 'BDT' ) { $custom_currency_symbol = 'BDT '; }
    return $custom_currency_symbol;
}
add_filter( 'woocommerce_price_format', function() { return '%1$s%2$s'; } );

// 6. Service Form Shortcode
add_shortcode('fit_service_form', 'fit_render_service_form');
function fit_render_service_form($atts) {
    $a = shortcode_atts( array( 'type' => 'General IT Service' ), $atts );
    ob_start(); ?>
    <div class="fit-service-form-wrap">
        <form class="fit-service-form" data-service="<?php echo esc_attr($a['type']); ?>">
            <h3 style="margin-bottom:20px; color:var(--fit-navy);">Request a Quote</h3>
            <div class="fit-form-group"><label>Your Name *</label><input type="text" name="name" required></div>
            <div class="fit-form-group"><label>Mobile Number *</label><input type="tel" name="phone" required></div>
            <div class="fit-form-group"><label>Project Requirements *</label><textarea name="requirements" rows="3" required></textarea></div>
            <button type="submit" class="fit-btn fit-btn-primary" style="width:100%;">Submit Enquiry</button>
            <div class="fit-form-msg" style="margin-top:15px; text-align:center;"></div>
        </form>
    </div>
    <?php return ob_get_clean();
}

// 7. CHECKOUT SHIPPING & PAYMENT FIXES
add_filter( 'woocommerce_checkout_fields', 'fit_rename_state_to_division' );
function fit_rename_state_to_division( $fields ) {
    if ( isset( $fields['billing']['billing_state'] ) ) {
        $fields['billing']['billing_state']['label'] = 'Division';
        $fields['billing']['billing_state']['placeholder'] = 'Select Division';
        $fields['billing']['billing_state']['required'] = true;
    }
    return $fields;
}

add_filter( 'woocommerce_package_rates', 'fit_apply_division_shipping_rate', 20, 2 );
function fit_apply_division_shipping_rate( $rates, $package ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) { return $rates; }
    $division = WC()->customer->get_shipping_state();
    if ( empty( $division ) ) { $division = WC()->customer->get_billing_state(); }
    if ( empty( $division ) ) { return $rates; }
    $division_clean = strtolower( trim( (string) $division ) );
    $is_dhaka = ( $division_clean === 'dhaka' || $division_clean === 'bd-13' || strpos( $division_clean, 'dhaka' ) !== false );
    $cost  = $is_dhaka ? 80 : 150;
    $label = $is_dhaka ? 'Delivery Inside Dhaka' : 'Delivery Outside Dhaka';
    foreach ( $rates as $rate_key => $rate ) {
        if ( strpos( $rate_key, 'flat_rate' ) === 0 ) {
            $rates[$rate_key]->cost  = $cost;
            $rates[$rate_key]->label = $label;
        }
    }
    return $rates;
}

add_filter( 'woocommerce_shipping_rates_cache_enabled', 'fit_disable_shipping_cache' );
function fit_disable_shipping_cache( $enabled ) {
    if ( is_checkout() ) { return false; }
    if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() && isset( $_GET['wc-ajax'] ) && 'update_order_review' === $_GET['wc-ajax'] ) { return false; }
    return $enabled;
}

add_filter( 'woocommerce_gateway_description', 'fit_custom_cod_description', 20, 2 );
function fit_custom_cod_description( $description, $payment_id ) {
    if ( 'cod' === $payment_id ) {
        $total = WC()->cart->get_total();
        $description = '<div style="margin-top: 10px; padding: 12px 15px; background: #F8F9FA; border: 1px solid #00A896; border-radius: 6px; font-weight: 700; color: #102A35;">Total COD Amount: <span style="color: #00A896; font-size: 1.15rem;">' . wp_strip_all_tags( $total ) . '</span></div>';
    }
    return $description;
}

// 8. SINGLE PRODUCT BUTTONS (V3 Stable)
if ( ! function_exists( 'fit_add_single_product_extra_buttons' ) ) {
    add_action( 'woocommerce_after_add_to_cart_button', 'fit_add_single_product_extra_buttons' );
    function fit_add_single_product_extra_buttons() {
        global $product;
        $product_id = $product->get_id();
        ?>
        <button type="button" name="fit_buy_now" value="<?php echo esc_attr( $product_id ); ?>" class="button alt fit-buy-now-btn" style="background: var(--fit-teal); color: white; margin-left: 10px; font-weight: 600;">Buy Now</button>
        <a href="#" class="fit-add-to-compare button" data-product-id="<?php echo esc_attr( $product_id ); ?>" style="margin-left: 10px; background: transparent; border: 1px solid var(--fit-navy); color: var(--fit-navy); font-weight: 600; display: inline-block; padding: 12px 20px; text-decoration: none; border-radius: 4px;">+ Compare</a>
        <?php
    }
}

if ( ! function_exists( 'fit_redirect_to_checkout_after_buy_now' ) ) {
    add_filter( 'woocommerce_add_to_cart_redirect', 'fit_redirect_to_checkout_after_buy_now' );
    function fit_redirect_to_checkout_after_buy_now( $url ) {
        if ( isset( $_REQUEST['fit_buy_now'] ) ) { return wc_get_checkout_url(); }
        return $url;
    }
}

// 9. WhatsApp Floating Button
add_action('wp_footer', 'fit_add_floating_whatsapp_button');
function fit_add_floating_whatsapp_button() {
    $whatsapp_url = 'https://wa.me/8801608630784';
    ?>
    <a href="<?php echo esc_url($whatsapp_url); ?>" class="fit-floating-wa" target="_blank" rel="noopener noreferrer">
        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M16 0C7.163 0 0 7.163 0 16c0 2.825.736 5.482 2.024 7.787L0 32l8.482-2.222A15.91 15.91 0 0 0 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333c-2.633 0-5.103-.76-7.17-2.072l-.515-.318-5.328 1.396 1.422-5.193-.336-.535A13.27 13.27 0 0 1 2.667 16c0-7.36 5.973-13.333 13.333-13.333S29.333 8.64 29.333 16 23.36 29.333 16 29.333z" fill="#FFF"/><path d="M23.837 19.58c-.41-.205-2.426-1.197-2.802-1.334-.376-.136-.65-.205-.924.205-.275.41-1.062 1.334-1.302 1.608-.24.274-.48.308-.89.103-.41-.205-1.73-.638-3.295-2.034-1.218-1.087-2.04-2.428-2.28-2.838-.24-.41-.026-.632.18-.836.184-.184.41-.48.616-.72.205-.24.274-.41.41-.684.137-.274.068-.513-.034-.718-.103-.205-.924-2.223-1.266-3.044-.333-.8-.672-.692-.924-.705-.24-.012-.513-.014-.788-.014-.274 0-.718.103-1.094.513-.376.41-1.436 1.402-1.436 3.42 0 2.017 1.47 3.966 1.676 4.24.205.274 2.893 4.417 7.01 6.195.98.423 1.745.676 2.343.866.985.313 1.88.268 2.588.163.79-.117 2.426-.992 2.768-1.95.342-.958.342-1.78.24-1.95-.103-.172-.376-.275-.786-.48z" fill="#FFF"/></svg>
    </a>
    <?php
}

// 10. Professional Compare Dock (Bottom Left)
add_action('wp_footer', 'fit_professional_compare_dock', 99);
function fit_professional_compare_dock() {
    ?>
    <a href="/compare/" id="fit-floating-compare-btn" aria-label="Compare Products">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 3h5v5"></path><path d="M4 20L21 3"></path><path d="M21 16v5h-5"></path><path d="M15 15l6 6"></path><path d="M4 4l5 5"></path></svg>
        <span>Compare</span>
        <span id="fit-compare-count" class="fit-compare-badge">0</span>
    </a>
    <?php
}
// =========================================
// REMOVE COUNTRY FIELD FROM CHECKOUT
// =========================================
add_filter( 'woocommerce_checkout_fields', 'fit_remove_checkout_country_field' );
function fit_remove_checkout_country_field( $fields ) {
    // Remove Billing Country
    unset( $fields['billing']['billing_country'] );
    
    // Remove Shipping Country
    unset( $fields['shipping']['shipping_country'] );
    
    return $fields;
}

// =========================================
// PREMIUM CHECKOUT: DIVISION DROPDOWN
// =========================================
add_filter( 'woocommerce_checkout_fields', 'fit_custom_bd_divisions_checkout_fields', 20 );
function fit_custom_bd_divisions_checkout_fields( $fields ) {
    // Define the 8 Divisions of Bangladesh
    $divisions = array(
        ''           => 'Select Division',
        'Dhaka'      => 'Dhaka',
        'Chattogram' => 'Chattogram',
        'Rajshahi'   => 'Rajshahi',
        'Khulna'     => 'Khulna',
        'Barishal'   => 'Barishal',
        'Sylhet'     => 'Sylhet',
        'Rangpur'    => 'Rangpur',
        'Mymensingh' => 'Mymensingh'
    );

    // 1. Billing Division Dropdown
    if ( isset( $fields['billing']['billing_state'] ) ) {
        $fields['billing']['billing_state']['type'] = 'select';
        $fields['billing']['billing_state']['options'] = $divisions;
        $fields['billing']['billing_state']['label'] = 'Division (Billing)';
        $fields['billing']['billing_state']['required'] = true;
        $fields['billing']['billing_state']['priority'] = 60; // Move it up slightly
    }

    // 2. Shipping Division Dropdown
    if ( isset( $fields['shipping']['shipping_state'] ) ) {
        $fields['shipping']['shipping_state']['type'] = 'select';
        $fields['shipping']['shipping_state']['options'] = $divisions;
        $fields['shipping']['shipping_state']['label'] = 'Division (Shipping)';
        $fields['shipping']['shipping_state']['required'] = true;
        $fields['shipping']['shipping_state']['priority'] = 60;
    }

    return $fields;
}


add_filter( 'woocommerce_package_rates', 'fit_custom_shipping_rates_v2', 99, 2 );
function fit_custom_shipping_rates_v2( $rates, $package ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) { return $rates; }
    
    // Get selected Division
    $division = WC()->customer->get_shipping_state();
    if ( empty( $division ) ) {
        $division = WC()->customer->get_billing_state();
    }
    
    $division_clean = strtolower( trim( (string) $division ) );
    $is_dhaka = ( $division_clean === 'dhaka' || $division_clean === 'bd-13' || strpos( $division_clean, 'dhaka' ) !== false );
    
    // Clear ALL existing default shipping rates (removes 'Flat Rate' completely)
    $new_rates = array();
    
    // If a division is selected, apply our custom rate
    if ( ! empty( $division ) ) {
        $cost  = $is_dhaka ? 80 : 150;
        $label = $is_dhaka ? 'Inside Dhaka (Home Delivery)' : 'Outside Dhaka (Courier)';
        
        $rate_id = 'fit_custom_rate';
        $new_rates[$rate_id] = new WC_Shipping_Rate(
            $rate_id,
            $label,
            $cost,
            array(),
            'fit_custom_method',
            0
        );
    }
    
    return $new_rates;
}


// =========================================
// PREMIUM SHIPPING LOGIC: DELIVERY CHARGE
// =========================================
add_filter( 'woocommerce_package_rates', 'fit_bulletproof_shipping_rates', 9999, 2 );
function fit_bulletproof_shipping_rates( $rates, $package ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) { return $rates; }
    
    $division = WC()->customer->get_shipping_state();
    if ( empty( $division ) ) {
        $division = WC()->customer->get_billing_state();
    }
    
    $division_clean = strtolower( trim( (string) $division ) );
    $is_dhaka = ( $division_clean === 'dhaka' || $division_clean === 'bd-13' || strpos( $division_clean, 'dhaka' ) !== false );
    
    // Forcefully clear ALL default WooCommerce shipping rates
    $new_rates = array();
    
    // If Division is selected, create our custom Delivery Charge
    if ( ! empty( $division ) ) {
        $cost  = $is_dhaka ? 80 : 150;
        $label = $is_dhaka ? 'Delivery Charge (Inside Dhaka)' : 'Delivery Charge (Outside Dhaka)';
        
        $rate_id = 'fit_delivery_charge';
        $new_rates[$rate_id] = new WC_Shipping_Rate(
            $rate_id,
            $label,
            $cost,
            array(),
            'fit_custom_method',
            0
        );
    }
    
    return $new_rates;
}

// =========================================
// PREMIUM CHECKOUT LOGIC (V3 - BULLETPROOF)
// =========================================

// 1. Division Dropdown with AJAX update class
add_filter( 'woocommerce_checkout_fields', 'fit_custom_bd_divisions_checkout_fields_v3', 20 );
function fit_custom_bd_divisions_checkout_fields_v3( $fields ) {
    $divisions = array(
        ''           => 'Select Division',
        'Dhaka'      => 'Dhaka',
        'Chattogram' => 'Chattogram',
        'Rajshahi'   => 'Rajshahi',
        'Khulna'     => 'Khulna',
        'Barishal'   => 'Barishal',
        'Sylhet'     => 'Sylhet',
        'Rangpur'    => 'Rangpur',
        'Mymensingh' => 'Mymensingh'
    );

    if ( isset( $fields['billing']['billing_state'] ) ) {
        $fields['billing']['billing_state']['type'] = 'select';
        $fields['billing']['billing_state']['options'] = $divisions;
        $fields['billing']['billing_state']['label'] = 'Division (Billing)';
        $fields['billing']['billing_state']['class'] = array( 'form-row-wide', 'update_totals_on_change' ); // AJAX trigger
        $fields['billing']['billing_state']['required'] = true;
    }
    if ( isset( $fields['shipping']['shipping_state'] ) ) {
        $fields['shipping']['shipping_state']['type'] = 'select';
        $fields['shipping']['shipping_state']['options'] = $divisions;
        $fields['shipping']['shipping_state']['label'] = 'Division (Shipping)';
        $fields['shipping']['shipping_state']['class'] = array( 'form-row-wide', 'update_totals_on_change' ); // AJAX trigger
        $fields['shipping']['shipping_state']['required'] = true;
    }
    return $fields;
}

// 2. Force Custom Shipping Rate (Delivery Charge)
add_filter( 'woocommerce_package_rates', 'fit_bulletproof_shipping_rates_v3', 9999, 2 );
function fit_bulletproof_shipping_rates_v3( $rates, $package ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) { return $rates; }
    
    $division = WC()->customer->get_shipping_state();
    if ( empty( $division ) ) {
        $division = WC()->customer->get_billing_state();
    }
    
    $division_clean = strtolower( trim( (string) $division ) );
    $is_dhaka = ( $division_clean === 'dhaka' || $division_clean === 'bd-13' || strpos( $division_clean, 'dhaka' ) !== false );
    
    // Clear ALL default rates (removes Flat Rate)
    $new_rates = array();
    
    if ( ! empty( $division ) ) {
        $cost  = $is_dhaka ? 80 : 150;
        $label = $is_dhaka ? 'Inside Dhaka' : 'Outside Dhaka';
        
        $rate_id = 'fit_delivery_charge';
        $new_rates[$rate_id] = new WC_Shipping_Rate(
            $rate_id,
            $label,
            $cost,
            array(),
            'fit_custom_method',
            0
        );
    }
    return $new_rates;
}

// =========================================
// CHECKOUT: PHONE MANDATORY, EMAIL OPTIONAL
// =========================================
if ( ! function_exists( 'fit_custom_checkout_phone_email_fields' ) ) {
    add_filter( 'woocommerce_checkout_fields', 'fit_custom_checkout_phone_email_fields', 25 );
    function fit_custom_checkout_phone_email_fields( $fields ) {
        // Make Phone Mandatory
        if ( isset( $fields['billing']['billing_phone'] ) ) {
            $fields['billing']['billing_phone']['required'] = true;
            $fields['billing']['billing_phone']['label'] = 'Phone Number *';
        }

        // Make Email Optional
        if ( isset( $fields['billing']['billing_email'] ) ) {
            $fields['billing']['billing_email']['required'] = false;
            $fields['billing']['billing_email']['label'] = 'Email Address';
        }

        return $fields;
    }
}
// =========================================
// BD E-COMMERCE MINIMAL CHECKOUT FIELDS
// =========================================
add_filter( 'woocommerce_checkout_fields', 'fit_bd_minimal_checkout_fields', 30 );
function fit_bd_minimal_checkout_fields( $fields ) {
    
    // 1. Merge First & Last Name into a single "Full Name" field
    unset($fields['billing']['billing_last_name']);
    $fields['billing']['billing_first_name']['label'] = 'Full Name';
    $fields['billing']['billing_first_name']['placeholder'] = 'Enter your full name';
    $fields['billing']['billing_first_name']['class'] = array('form-row-wide');
    $fields['billing']['billing_first_name']['priority'] = 10;

    // 2. Phone Number (Required)
    $fields['billing']['billing_phone']['priority'] = 20;
    $fields['billing']['billing_phone']['class'] = array('form-row-wide'); 
    $fields['billing']['billing_phone']['label'] = 'Mobile Number *';

    // 3. Division (State) Dropdown
    $fields['billing']['billing_state']['priority'] = 30;
    $fields['billing']['billing_state']['class'] = array('form-row-first');
    $fields['billing']['billing_state']['label'] = 'Division *';

    // 4. City / Thana
    $fields['billing']['billing_city']['label'] = 'Thana / Area *';
    $fields['billing']['billing_city']['placeholder'] = 'e.g., Mirpur, Savar';
    $fields['billing']['billing_city']['priority'] = 40;
    $fields['billing']['billing_city']['class'] = array('form-row-last');

    // 5. Full Address
    $fields['billing']['billing_address_1']['label'] = 'Full Address (House, Road, Block) *';
    $fields['billing']['billing_address_1']['placeholder'] = 'House #, Road #, Area details';
    $fields['billing']['billing_address_1']['priority'] = 50;
    $fields['billing']['billing_address_1']['class'] = array('form-row-wide');
    
    // 6. Remove unnecessary fields
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);

    // 7. Email (Optional)
    $fields['billing']['billing_email']['priority'] = 60;
    $fields['billing']['billing_email']['required'] = false;
    $fields['billing']['billing_email']['class'] = array('form-row-wide');
    $fields['billing']['billing_email']['label'] = 'Email Address';

    // 8. Remove Shipping Fields entirely (Force ship to billing address)
    unset($fields['shipping']);
    
    // 9. Order notes
    $fields['order']['order_comments']['placeholder'] = 'Special delivery instructions (optional)';
    $fields['order']['order_comments']['label'] = 'Order Notes';

    return $fields;
}

// =========================================
// FORCE CLEAN EMAIL LABEL
// =========================================
add_filter( 'woocommerce_checkout_fields', 'fit_clean_email_label', 999 );
function fit_clean_email_label( $fields ) {
    if ( isset( $fields['billing']['billing_email'] ) ) {
        $fields['billing']['billing_email']['label'] = 'Email Address';
    }
    return $fields;
}

// =========================================
// FORCE SHIPPING UPDATE ON DIVISION CHANGE
// =========================================
add_filter( 'woocommerce_checkout_fields', 'fit_force_division_ajax_update', 9999 );
function fit_force_division_ajax_update( $fields ) {
    if ( isset( $fields['billing']['billing_state'] ) ) {
        // Add the class that triggers the AJAX update in WooCommerce
        if ( ! in_array( 'update_totals_on_change', $fields['billing']['billing_state']['class'] ) ) {
            $fields['billing']['billing_state']['class'][] = 'update_totals_on_change';
        }
    }
    return $fields;
}

// =========================================
// CUSTOMER PORTAL: CUSTOM MENU LINKS
// =========================================
add_filter( 'woocommerce_account_menu_items', 'fit_add_portal_menu_links' );
function fit_add_portal_menu_links( $items ) {
    $new_items = array();
    foreach ( $items as $key => $value ) {
        $new_items[ $key ] = $value;
        // Insert after Orders
        if ( 'orders' === $key ) {
            $new_items['track_order'] = 'Track Order';
            $new_items['support_center'] = 'Support Center';
        }
    }
    return $new_items;
}

add_action( 'template_redirect', 'fit_redirect_portal_links' );
function fit_redirect_portal_links() {
    if ( is_account_page() ) {
        global $wp;
        if ( isset( $wp->query_vars['track_order'] ) ) {
            wp_safe_redirect( home_url( '/track-order/' ) );
            exit;
        }
        if ( isset( $wp->query_vars['support_center'] ) ) {
            wp_safe_redirect( home_url( '/support/' ) );
            exit;
        }
    }
}

// Safe URL filter for custom menu items (No 404 errors)
add_filter( 'woocommerce_get_endpoint_url', 'fit_custom_portal_links', 10, 4 );
function fit_custom_portal_links( $url, $endpoint, $value, $permalink ) {
    if ( 'track_order' === $endpoint ) {
        return home_url( '/track-order/' );
    }
    if ( 'support_center' === $endpoint ) {
        return home_url( '/support/' );
    }
    return $url;
}

// =========================================
// SMART TRACKING: WOOCOMMERCE ORDER ID
// =========================================
add_action( 'wp_ajax_nopriv_fit_track_wc_order', 'fit_track_wc_order_callback' );
add_action( 'wp_ajax_fit_track_wc_order', 'fit_track_wc_order_callback' );
function fit_track_wc_order_callback() {
    check_ajax_referer( 'fit_ajax_nonce', '_ajax_nonce' );
    $order_id = isset($_POST['order_id']) ? absint($_POST['order_id']) : 0;
    
    if ( ! $order_id ) {
        wp_send_json_error( array( 'message' => 'Invalid Order ID.' ) );
    }
    $order = wc_get_order( $order_id );
    if ( ! $order ) {
        wp_send_json_error( array( 'message' => 'Order not found. Please check your Order ID.' ) );
    }
    
    wp_send_json_success( array(
        'type' => 'WooCommerce Order',
        'name' => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
        'date' => wc_format_datetime( $order->get_date_created() ),
        'status' => wc_get_order_status_name( $order->get_status() ),
    ) );
}

// =========================================
// CUSTOMER PORTAL: RETURN REQUEST SYSTEM
// =========================================

// 1. Register Endpoint & Menu Item
add_action( 'init', 'fit_add_return_endpoint' );
function fit_add_return_endpoint() {
    add_rewrite_endpoint( 'return-request', EP_ROOT | EP_PAGES );
}
add_filter( 'woocommerce_account_menu_items', 'fit_add_return_menu_link' );
function fit_add_return_menu_link( $items ) {
    $new_items = array();
    foreach ( $items as $key => $value ) {
        $new_items[ $key ] = $value;
        if ( 'orders' === $key ) {
            $new_items['return-request'] = 'Returns';
        }
    }
    return $new_items;
}

// 2. Register Custom Post Type for Returns
add_action( 'init', 'fit_register_return_cpt' );
function fit_register_return_cpt() {
    register_post_type( 'fit_return', array(
        'labels' => array( 'name' => 'Returns', 'singular_name' => 'Return Request' ),
        'public' => false,
        'show_ui' => true,
        'supports' => array( 'title', 'editor', 'custom-fields' ),
    ));
}

// 3. Handle Form Submission
add_action( 'template_redirect', 'fit_handle_return_submission' );
function fit_handle_return_submission() {
    if ( isset( $_POST['fit_submit_return'] ) && isset( $_POST['fit_return_nonce'] ) && wp_verify_nonce( $_POST['fit_return_nonce'], 'fit_return_action' ) ) {
        $user_id = get_current_user_id();
        $order_id = absint( $_POST['return_order_id'] );
        $reason = sanitize_text_field( $_POST['return_reason'] );
        $details = sanitize_textarea_field( $_POST['return_details'] );
        
        $order = wc_get_order( $order_id );
        // Security Check: Ensure order belongs to current user
        if ( $order && $order->get_user_id() === $user_id ) {
            $post_id = wp_insert_post( array(
                'post_title' => 'Return for Order #' . $order_id . ' by User ' . $user_id,
                'post_type' => 'fit_return',
                'post_status' => 'publish',
                'post_content' => $details,
                'meta_input' => array(
                    '_fit_return_order_id' => $order_id,
                    '_fit_return_reason' => $reason,
                    '_fit_return_user_id' => $user_id,
                    '_fit_return_status' => 'Pending',
                )
            ));
            if ( $post_id ) {
                wc_add_notice( 'Your return request has been submitted successfully. We will contact you soon.', 'success' );
            } else {
                wc_add_notice( 'Something went wrong. Please try again.', 'error' );
            }
        } else {
            wc_add_notice( 'Invalid Order ID or unauthorized access.', 'error' );
        }
    }
}

// =========================================
// RENDER RETURN REQUEST TEMPLATE
// =========================================
add_action( 'woocommerce_account_return-request_endpoint', 'fit_render_return_request_endpoint' );
function fit_render_return_request_endpoint() {
    wc_get_template( 'myaccount/return-request.php' );
}

// =========================================
// HIDE CART BADGE WHEN EMPTY (PHP FILTER)
// =========================================
add_filter( 'woocommerce_cart_contents_count', 'fit_hide_empty_cart_count', 99 );
function fit_hide_empty_cart_count( $count ) {
    return ( $count == 0 ) ? '' : $count;
}
