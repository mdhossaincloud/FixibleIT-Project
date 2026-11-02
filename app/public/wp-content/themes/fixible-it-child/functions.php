<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

// 1. Enqueue Styles and Scripts
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'fixible-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null );
    wp_enqueue_style( 'kadence-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'fixible-child-style', get_stylesheet_uri(), array( 'kadence-parent-style' ), time() );
    
    // Kadence-এর ভাঙা WooCommerce CSS শুধু এই ৩টি পেজে বন্ধ করে দেওয়া হলো
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
        'IT Services' => 'page-it-services.php',
        'Office Network' => 'page-service-network.php',
        'CCTV Surveillance' => 'page-service-cctv.php',
        'PC Repair' => 'page-service-repair.php',
        'Server IT' => 'page-service-server.php',
        'About Us' => 'page-about.php',
        'Contact' => 'page-contact.php',
        'Support' => 'page-support.php',
        'PC Builder' => 'page-pc-builder.php',
        'Compare' => 'page-compare.php',
        'Track Order' => 'page-track.php'
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
        'name'          => 'Shop Sidebar (Filters)',
        'id'            => 'shop-sidebar',
        'description'   => 'Add WooCommerce filter widgets here for the Shop page.',
        'before_widget' => '<div id="%1$s" class="widget %2$s fit-widget-box">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="fit-widget-title">',
        'after_title'   => '</h4>',
    ) );
}

// 4. WooCommerce Layout Fixes
add_filter( 'loop_shop_columns', function() { return 3; }, 999 );
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
            <div class="fit-form-group"><label>Project Requirements *</label><textarea name="requirements" rows="3" required placeholder="Describe your needs..."></textarea></div>
            <button type="submit" class="fit-btn fit-btn-primary" style="width:100%;">Submit Enquiry</button>
            <div class="fit-form-msg" style="margin-top:15px; text-align:center;"></div>
        </form>
    </div>
    <?php return ob_get_clean();
}

// =========================================
// 7. CHECKOUT SHIPPING & PAYMENT FIXES
// =========================================

// Rename "State" to "Division"
add_filter( 'woocommerce_checkout_fields', 'fit_rename_state_to_division' );
function fit_rename_state_to_division( $fields ) {
    if ( isset( $fields['billing']['billing_state'] ) ) {
        $fields['billing']['billing_state']['label'] = 'Division';
        $fields['billing']['billing_state']['placeholder'] = 'Select Division';
        $fields['billing']['billing_state']['required'] = true;
    }
    if ( isset( $fields['shipping']['shipping_state'] ) ) {
        $fields['shipping']['shipping_state']['label'] = 'Division';
        $fields['shipping']['shipping_state']['placeholder'] = 'Select Division';
        $fields['shipping']['shipping_state']['required'] = true;
    }
    return $fields;
}

// Bulletproof Shipping Rate (Dhaka = 80, Others = 150)
add_filter( 'woocommerce_package_rates', 'fit_apply_division_shipping_rate', 20, 2 );
function fit_apply_division_shipping_rate( $rates, $package ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) { return $rates; }
    
    $division = WC()->customer->get_shipping_state();
    if ( empty( $division ) ) { $division = WC()->customer->get_billing_state(); }
    if ( empty( $division ) ) { return $rates; }
    
    $division_clean = strtolower( trim( (string) $division ) );
    
    $is_dhaka = (
        $division_clean === 'dhaka' ||
        $division_clean === 'bd-13' ||
        strpos( $division_clean, 'dhaka' ) !== false
    );
    
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

// Disable Shipping Cache on Checkout
add_filter( 'woocommerce_shipping_rates_cache_enabled', 'fit_disable_shipping_cache' );
function fit_disable_shipping_cache( $enabled ) {
    if ( is_checkout() ) { return false; }
    if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() && isset( $_GET['wc-ajax'] ) && 'update_order_review' === $_GET['wc-ajax'] ) {
        return false;
    }
    return $enabled;
}

// COD Payment Box-এ Total Amount দেখানোর জন্য
add_filter( 'woocommerce_gateway_description', 'fit_custom_cod_description', 20, 2 );
function fit_custom_cod_description( $description, $payment_id ) {
    if ( 'cod' === $payment_id ) {
        $total = WC()->cart->get_total();
        $description = '<div style="margin-top: 10px; padding: 12px 15px; background: #F8F9FA; border: 1px solid #00A896; border-radius: 6px; font-weight: 700; color: #102A35;">Total COD Amount: <span style="color: #00A896; font-size: 1.15rem;">' . wp_strip_all_tags( $total ) . '</span></div>';
    }
    return $description;
}
// Shop Page-এ ডিফল্ট ৩০টি প্রোডাক্ট এবং ড্রপডাউন অপশন
add_filter( 'loop_shop_per_page', 'fit_custom_products_per_page', 20 );
function fit_custom_products_per_page( $cols ) {
    $per_page = isset( $_GET['per_page'] ) ? absint( $_GET['per_page'] ) : 30;
    return $per_page;
}

add_action( 'woocommerce_before_shop_loop', 'fit_add_products_per_page_dropdown', 20 );
function fit_add_products_per_page_dropdown() {
    $current = isset( $_GET['per_page'] ) ? absint( $_GET['per_page'] ) : 30;
    ?>
    <form method="get" class="fit-per-page-form" style="float: right; margin-left: 15px; margin-bottom: 20px;">
        <select name="per_page" id="fit-per-page" onchange="this.form.submit()" style="padding: 8px 12px; border-radius: 6px; border: 1px solid #ddd; background: #fff;">
            <option value="30" <?php selected( $current, 30 ); ?>>Show 30</option>
            <option value="50" <?php selected( $current, 50 ); ?>>Show 50</option>
            <option value="100" <?php selected( $current, 100 ); ?>>Show 100</option>
        </select>
    </form>
    <?php
}