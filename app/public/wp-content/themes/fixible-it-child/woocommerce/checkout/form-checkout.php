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
   WORLD CLASS CHECKOUT V6 (PREMIUM SINGLE CARD)
   ========================================================= */
body.woocommerce-checkout { background-color: #F8F9FA !important; }
.fit-checkout-form-root { max-width: 1100px !important; margin: 40px auto !important; padding: 0 20px !important; }

/* Stepper */
.fit-stepper { display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 40px; font-weight: 600; font-size: 0.95rem; color: #94A3B8; }
.fit-stepper .active { color: #00A896; }
.fit-stepper .divider { color: #CBD5E1; }

/* Grid Layout */
.fit-classic-checkout-layout { display: grid !important; grid-template-columns: minmax(0, 1fr) 400px !important; gap: 40px !important; align-items: start !important; }

/* Left Column - Unified Form Card */
#customer_details { 
    background: #FFFFFF !important; 
    border: 1px solid #E2E8F0 !important; 
    border-radius: 16px !important; 
    padding: 40px !important; 
    box-shadow: 0 10px 40px rgba(16,42,53,0.04) !important; 
}

/* Headings */
.woocommerce-billing-fields h3, .woocommerce-shipping-fields h3, .woocommerce-additional-fields h3 {
    font-size: 1.3rem !important; font-weight: 800 !important; color: #102A35 !important;
    margin-bottom: 25px !important; padding-bottom: 15px !important; border-bottom: 2px solid #F1F5F9 !important;
    letter-spacing: -0.5px !important;
}

/* Unify the Additional Information box into the main form card */
.woocommerce-additional-fields, 
.woocommerce-shipping-fields {
    margin-top: 20px !important;
    padding-top: 20px !important;
    border-top: 1px solid #F1F5F9 !important;
}

/* Fields */
.woocommerce form .form-row { padding: 0 !important; margin-bottom: 20px !important; }
.woocommerce form .form-row label { font-size: 0.9rem !important; font-weight: 600 !important; color: #102A35 !important; margin-bottom: 8px !important; display: block !important; }
.woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, .woocommerce form .form-row select {
    width: 100% !important; height: 52px !important; padding: 0 18px !important; border: 1px solid #CBD5E1 !important;
    border-radius: 8px !important; background: #F8FAFC !important; color: #102A35 !important; font-size: 1rem !important;
    box-sizing: border-box !important; transition: all 0.2s ease !important;
}
.woocommerce form .form-row textarea { height: auto !important; min-height: 120px !important; padding: 18px !important; }
.woocommerce form .form-row input.input-text:focus, .woocommerce form .form-row textarea:focus, .woocommerce form .form-row select:focus {
    outline: none !important; background: #FFFFFF !important; border-color: #00A896 !important; box-shadow: 0 0 0 4px rgba(0,168,150,0.15) !important;
}

/* Custom Dropdown Arrow */
.woocommerce form .form-row select {
    appearance: none !important; -webkit-appearance: none !important;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2300A896' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e") !important;
    background-repeat: no-repeat !important; background-position: right 15px center !important; background-size: 20px !important; padding-right: 45px !important;
}

/* "Ship to a different address?" checkbox */
.woocommerce-shipping-fields { margin-top: 20px !important; }
#ship-to-different-address label { font-size: 1rem !important; font-weight: 600 !important; cursor: pointer !important; display: flex !important; align-items: center !important; gap: 10px !important; }
#ship-to-different-address input[type="checkbox"] { width: 20px !important; height: 20px !important; accent-color: #00A896 !important; margin: 0 !important; }

/* Right Column - Order Summary */
.fit-checkout-sidebar { position: sticky !important; top: 100px !important; min-width: 0 !important; }
.fit-order-summary-box {
    background: rgba(255, 255, 255, 0.8) !important; 
    backdrop-filter: blur(20px) !important;
    border: 1px solid #E2E8F0 !important; border-radius: 16px !important;
    padding: 35px !important; box-shadow: 0 15px 40px rgba(16,42,53,0.06) !important;
}
.fit-order-summary-box h3 { font-size: 1.3rem !important; font-weight: 800 !important; color: #102A35 !important; margin-bottom: 25px !important; padding-bottom: 15px !important; border-bottom: 2px solid #F1F5F9 !important; letter-spacing: -0.5px !important; }

/* Order Table */
#order_review table.shop_table { width: 100% !important; table-layout: fixed !important; border-collapse: collapse !important; }
#order_review table.shop_table th { font-size: 0.8rem !important; text-transform: uppercase !important; color: #64748B !important; font-weight: 700 !important; text-align: left !important; padding-bottom: 15px !important; border-bottom: 2px solid #F1F5F9 !important; }
#order_review table.shop_table td { padding: 15px 0 !important; border-bottom: 1px dashed #E2E8F0 !important; color: #102A35 !important; font-size: 0.95rem !important; text-align: left !important; vertical-align: top !important; }
#order_review table.shop_table td.product-total { text-align: right !important; font-weight: 700 !important; }
#order_review table.shop_table tfoot th { text-align: left !important; color: #64748B !important; font-weight: 600 !important; }
#order_review table.shop_table tfoot td { text-align: right !important; font-weight: 700 !important; color: #102A35 !important; }

/* Highlight Delivery Charge */
#order_review table.shop_table tfoot tr.woocommerce-shipping-totals th {
    color: #102A35 !important; font-weight: 700 !important; font-size: 0.95rem !important; vertical-align: middle !important;
}
#order_review table.shop_table tfoot tr.woocommerce-shipping-totals td {
    color: #00A896 !important; font-weight: 800 !important; font-size: 1.05rem !important; text-align: right !important;
}

/* Hide shipping method radio buttons in summary (force single clean view) */
#order_review ul#shipping_method { list-style: none !important; padding: 0 !important; margin: 0 !important; text-align: right !important; }
#order_review ul#shipping_method li { display: block !important; margin: 0 !important; }
#order_review ul#shipping_method li input { display: none !important; }
#order_review ul#shipping_method li label { font-weight: 800 !important; color: #00A896 !important; margin: 0 !important; cursor: default !important; }

/* Order Total */
#order_review table.shop_table tfoot tr.order-total th, #order_review table.shop_table tfoot tr.order-total td {
    font-size: 1.5rem !important; font-weight: 800 !important; color: #00A896 !important; border-bottom: none !important; padding-top: 25px !important;
}

/* Payment Section */
#payment { background: #F8FAFC !important; border: 1px solid #E2E8F0 !important; border-radius: 12px !important; padding: 25px !important; margin-top: 25px !important; }
#payment ul.payment_methods { list-style: none !important; padding: 0 !important; margin: 0 0 25px 0 !important; border-bottom: 1px solid #E2E8F0 !important; padding-bottom: 25px !important; }
#payment ul.payment_methods li { background: #FFFFFF !important; border: 1px solid #E2E8F0 !important; border-radius: 10px !important; padding: 18px 18px 18px 50px !important; position: relative !important; transition: all 0.25s ease !important; margin-bottom: 10px !important; }
#payment ul.payment_methods li:hover { border-color: #00A896 !important; box-shadow: 0 4px 12px rgba(0,168,150,0.08) !important; }
#payment ul.payment_methods li input[type="radio"] { position: absolute !important; left: 18px !important; top: 20px !important; width: 20px !important; height: 20px !important; display: inline-block !important; opacity: 1 !important; visibility: visible !important; accent-color: #00A896 !important; margin: 0 !important; }
#payment ul.payment_methods li label { font-weight: 700 !important; color: #102A35 !important; font-size: 1.05rem !important; cursor: pointer !important; display: inline-block !important; margin: 0 !important; }
#payment ul.payment_methods li .payment_box { margin-top: 15px !important; background: #F8FAFC !important; border: 1px solid #E2E8F0 !important; border-radius: 8px !important; padding: 15px 20px !important; font-size: 0.95rem !important; color: #475569 !important; display: block !important; }
#payment ul.payment_methods li .payment_box::before { display: none !important; }

/* Place Order Button */
#payment #place_order {
    width: 100% !important; height: 60px !important; background: #00A896 !important; color: #FFFFFF !important;
    font-size: 1.15rem !important; font-weight: 800 !important; text-transform: uppercase !important; letter-spacing: 0.05em !important;
    border: none !important; border-radius: 10px !important; cursor: pointer !important; transition: all 0.25s ease !important;
    box-shadow: 0 8px 25px rgba(0,168,150,0.3) !important;
}
#payment #place_order:hover { background: #102A35 !important; transform: translateY(-2px) !important; box-shadow: 0 12px 30px rgba(16,42,53,0.25) !important; }

/* Trust Badges */
.fit-checkout-trust { display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #E2E8F0; flex-wrap: wrap; gap: 10px; }
.fit-checkout-trust-item { display: flex; align-items: center; gap: 6px; font-size: 0.8rem; font-weight: 600; color: #64748B; }
.fit-checkout-trust-item svg { width: 16px; height: 16px; color: #00A896; }

/* Responsive */
@media (max-width: 992px) {
    .fit-classic-checkout-layout { grid-template-columns: 1fr !important; }
    .fit-checkout-sidebar { position: static !important; }
    #customer_details { padding: 25px !important; }
}
</style>

<div class="fit-checkout-form-root">
    <div class="fit-stepper">
        <span>1. Cart</span>
        <span class="divider">→</span>
        <span class="active">2. Checkout</span>
        <span class="divider">→</span>
        <span>3. Complete</span>
    </div>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        <div class="fit-classic-checkout-layout">
            <!-- Left: Form -->
            <div class="fit-checkout-main">
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
                
                <div class="fit-checkout-trust">
                    <div class="fit-checkout-trust-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        Secure
                    </div>
                    <div class="fit-checkout-trust-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
                        Genuine
                    </div>
                    <div class="fit-checkout-trust-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        Fast Delivery
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>