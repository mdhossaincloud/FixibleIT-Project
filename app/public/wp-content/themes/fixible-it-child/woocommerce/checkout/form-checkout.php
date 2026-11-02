<?php
defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_before_checkout_form', $checkout );

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}
?>

<style>
/* =========================================================
   PREMIUM CHECKOUT UI (Scoped & Bulletproof)
   ========================================================= */
body.woocommerce-checkout {
    background-color: #F8F9FA !important;
}

.fit-checkout-form-root {
    display: block !important;
    max-width: 1200px !important;
    margin: 0 auto !important;
    padding: 20px !important;
}
.fit-classic-checkout-layout {
    display: grid !important;
    grid-template-columns: minmax(0, 1fr) 400px !important;
    gap: 30px !important;
    align-items: start !important;
}

/* Left Column Cards */
#customer_details {
    display: flex !important;
    flex-direction: column !important;
    gap: 20px !important;
}
#customer_details .col-1,
#customer_details .col-2 {
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 12px !important;
    padding: 30px !important;
    box-shadow: 0 4px 15px rgba(16,42,53,0.03) !important;
    width: 100% !important;
    float: none !important;
    transition: all 0.25s ease !important;
}
#customer_details .col-1:hover,
#customer_details .col-2:hover {
    box-shadow: 0 8px 25px rgba(16,42,53,0.06) !important;
}

/* Headings */
.fit-checkout-title h2,
.woocommerce-billing-fields h3,
.woocommerce-shipping-fields h3,
.woocommerce-additional-fields h3 {
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    color: #102A35 !important;
    margin-bottom: 20px !important;
    padding-bottom: 15px !important;
    border-bottom: 2px solid #F1F5F9 !important;
}
.fit-checkout-title p {
    color: #64748B !important;
    font-size: 0.95rem !important;
    margin-bottom: 25px !important;
}

/* Form Fields */
.woocommerce form .form-row {
    padding: 0 !important;
    margin-bottom: 18px !important;
}
.woocommerce form .form-row label {
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    color: #475569 !important;
    margin-bottom: 6px !important;
    display: block !important;
}
.woocommerce form .form-row input.input-text,
.woocommerce form .form-row textarea,
.woocommerce form .form-row select {
    width: 100% !important;
    height: 48px !important;
    padding: 0 16px !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 8px !important;
    background: #F8FAFC !important;
    color: #102A35 !important;
    font-size: 0.95rem !important;
    box-sizing: border-box !important;
    transition: all 0.2s ease !important;
}
.woocommerce form .form-row textarea {
    height: auto !important;
    min-height: 100px !important;
    padding: 12px 16px !important;
}
.woocommerce form .form-row input.input-text:focus,
.woocommerce form .form-row textarea:focus,
.woocommerce form .form-row select:focus {
    outline: none !important;
    background: #FFFFFF !important;
    border-color: #00A896 !important;
    box-shadow: 0 0 0 3px rgba(0,168,150,0.15) !important;
}

/* Right Column Summary Box */
.fit-checkout-sidebar {
    position: sticky !important;
    top: 30px !important;
    min-width: 0 !important;
}
.fit-order-summary-box {
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 12px !important;
    padding: 30px !important;
    box-shadow: 0 8px 30px rgba(16,42,53,0.06) !important;
}
.fit-order-summary-box h3 {
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    color: #102A35 !important;
    margin-bottom: 20px !important;
    padding-bottom: 15px !important;
    border-bottom: 2px solid #F1F5F9 !important;
}

/* Order Table */
#order_review table.shop_table {
    width: 100% !important;
    table-layout: fixed !important;
    border-collapse: collapse !important;
}
#order_review table.shop_table th {
    font-size: 0.8rem !important;
    text-transform: uppercase !important;
    color: #64748B !important;
    font-weight: 700 !important;
    text-align: left !important;
    padding-bottom: 15px !important;
    border-bottom: 2px solid #F1F5F9 !important;
}
#order_review table.shop_table td {
    padding: 15px 0 !important;
    border-bottom: 1px dashed #E2E8F0 !important;
    color: #334155 !important;
    font-size: 0.95rem !important;
    text-align: left !important;
    vertical-align: top !important;
}
#order_review table.shop_table td.product-total {
    text-align: right !important;
    font-weight: 600 !important;
    color: #102A35 !important;
}
#order_review table.shop_table tfoot th {
    text-align: left !important;
    color: #64748B !important;
    font-weight: 500 !important;
}
#order_review table.shop_table tfoot td {
    text-align: right !important;
    font-weight: 600 !important;
    color: #102A35 !important;
}
#order_review table.shop_table tfoot tr.order-total th,
#order_review table.shop_table tfoot tr.order-total td {
    font-size: 1.25rem !important;
    font-weight: 800 !important;
    color: #00A896 !important;
    border-bottom: none !important;
    padding-top: 20px !important;
}

/* =========================================
   SHIPPING OPTION (Shipment Row Fix)
   ========================================= */
#order_review .woocommerce-shipping-totals th,
#order_review .woocommerce-shipping-totals td {
    padding: 15px 0 !important;
    vertical-align: top !important;
}
#order_review ul#shipping_method {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}
#order_review ul#shipping_method li {
    background: #F8FAFC !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 6px !important;
    padding: 10px 12px !important;
    margin-bottom: 5px !important;
    display: flex !important;
    align-items: flex-start !important;
    transition: all 0.2s ease !important;
}
#order_review ul#shipping_method li:hover {
    border-color: #00A896 !important;
}
#order_review ul#shipping_method li input[type="radio"] {
    display: inline-block !important;
    visibility: visible !important;
    opacity: 1 !important;
    margin: 3px 10px 0 0 !important;
    accent-color: #00A896 !important;
    flex-shrink: 0 !important;
}
#order_review ul#shipping_method li label {
    font-weight: 600 !important;
    color: #102A35 !important;
    font-size: 0.85rem !important;
    line-height: 1.4 !important;
    margin: 0 !important;
    cursor: pointer !important;
    display: inline-block !important;
    width: 100% !important;
}

/* Payment Methods */
#payment {
    background: #F8FAFC !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 10px !important;
    padding: 20px !important;
    margin-top: 20px !important;
}
#payment ul.payment_methods {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 0 20px 0 !important;
    border-bottom: 1px solid #E2E8F0 !important;
    padding-bottom: 20px !important;
}
#payment ul.payment_methods li {
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 8px !important;
    padding: 16px 16px 16px 45px !important;
    position: relative !important;
    transition: all 0.25s ease !important;
}
#payment ul.payment_methods li:hover {
    border-color: #00A896 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(0,168,150,0.1) !important;
}
/* Force Hidden Radio to Show */
#payment ul.payment_methods li input[type="radio"] {
    position: absolute !important;
    left: 15px !important;
    top: 18px !important;
    width: 18px !important;
    height: 18px !important;
    display: inline-block !important;
    opacity: 1 !important;
    visibility: visible !important;
    accent-color: #00A896 !important;
    margin: 0 !important;
}
/* Force Label to Show */
#payment ul.payment_methods li label {
    font-weight: 700 !important;
    color: #102A35 !important;
    font-size: 1.05rem !important;
    cursor: pointer !important;
    display: inline-block !important;
    margin: 0 !important;
    padding: 0 !important;
    text-indent: 0 !important;
    white-space: normal !important;
    overflow: visible !important;
    float: none !important;
}
#payment ul.payment_methods li .payment_box {
    margin-top: 10px !important;
    background: #F8FAFC !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 6px !important;
    padding: 12px 15px !important;
    font-size: 0.9rem !important;
    color: #64748B !important;
    display: block !important;
}
#payment ul.payment_methods li .payment_box::before {
    display: none !important;
}
#payment #place_order {
    width: 100% !important;
    height: 54px !important;
    background: #00A896 !important;
    color: #FFFFFF !important;
    font-size: 1.05rem !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.05em !important;
    border: none !important;
    border-radius: 8px !important;
    cursor: pointer !important;
    transition: all 0.25s ease !important;
    box-shadow: 0 4px 15px rgba(0,168,150,0.2) !important;
}
#payment #place_order:hover {
    background: #102A35 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(16,42,53,0.2) !important;
}

/* Coupon Notice Top Banner */
.woocommerce-form-coupon-toggle .woocommerce-info {
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
    border-left: 4px solid #00A896 !important;
    border-radius: 8px !important;
    color: #102A35 !important;
    font-size: 0.95rem !important;
    font-weight: 500 !important;
    padding: 16px 20px !important;
    margin-bottom: 30px !important;
    box-shadow: 0 4px 15px rgba(16,42,53,0.02) !important;
    max-width: 1200px !important;
    margin-left: auto !important;
    margin-right: auto !important;
}
.woocommerce-form-coupon-toggle .woocommerce-info a {
    color: #00A896 !important;
    text-decoration: underline !important;
    font-weight: 600 !important;
}

/* Responsive */
@media (max-width: 992px) {
    .fit-classic-checkout-layout {
        grid-template-columns: 1fr !important;
    }
    .fit-checkout-sidebar {
        position: static !important;
    }
}
</style>

<!-- FORM START -->
<form name="checkout" method="post" class="checkout woocommerce-checkout fit-checkout-form-root" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    
    <div class="fit-classic-checkout-layout">
        
        <!-- Left: Form -->
        <div class="fit-checkout-main">
            <div class="fit-checkout-title">
                <h2>Checkout Details</h2>
                <p>Complete your purchase by providing your details below.</p>
            </div>
            
            <?php if ( $checkout->get_checkout_fields() ) : ?>
                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                <div class="col2-set" id="customer_details">
                    <div class="col-1"><?php do_action( 'woocommerce_checkout_billing' ); ?></div>
                    <div class="col-2"><?php do_action( 'woocommerce_checkout_shipping' ); ?></div>
                </div>
                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
            <?php endif; ?>
        </div>

        <!-- Right: Summary -->
        <div class="fit-checkout-sidebar">
            <div class="fit-order-summary-box">
                <h3 id="order_review_heading"><?php esc_html_e( 'Order Summary', 'woocommerce' ); ?></h3>
                <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
                <div id="order_review" class="woocommerce-checkout-review-order">
                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                </div>
                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
            </div>
        </div>
        
    </div>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>