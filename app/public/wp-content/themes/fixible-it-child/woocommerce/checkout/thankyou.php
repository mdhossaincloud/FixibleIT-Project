<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="fit-thankyou-wrapper">
    <?php if ( $order ) : ?>

        <?php if ( $order->has_status( 'failed' ) ) : ?>

            <div class="fit-thankyou-hero fit-thankyou-failed">
                <div class="fit-thankyou-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                </div>
                <h1>Payment Failed</h1>
                <p>Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.</p>
                <div class="fit-thankyou-actions">
                    <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="button"><?php esc_html_e( 'Continue Shopping', 'woocommerce' ); ?></a>
                </div>
            </div>

        <?php else : ?>

            <div class="fit-thankyou-hero fit-thankyou-success">
                <div class="fit-thankyou-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </div>
                <h1>Thank You. Your Order is Confirmed!</h1>
                <p>We have received your order and are preparing it for dispatch. A confirmation has been sent to your phone/email.</p>
                
                <div class="fit-thankyou-actions">
                    <a href="/track-order/" class="button fit-btn-primary" style="background: #00A896; color: #fff; padding: 14px 30px; border-radius: 8px; text-decoration: none; font-weight: 700;">Track Your Order</a>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="button" style="background: #F8FAFC; color: #102A35; border: 1px solid #E2E8F0; padding: 14px 30px; border-radius: 8px; text-decoration: none; font-weight: 700; margin-left: 10px;">Continue Shopping</a>
                </div>
            </div>

            <div class="fit-thankyou-details-grid">
                
                <!-- Order Overview Card -->
                <div class="fit-thankyou-card">
                    <h2>Order Details</h2>
                    <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                        <li class="woocommerce-order-overview__order order">
                            <?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
                            <strong><?php echo $order->get_order_number(); ?></strong>
                        </li>
                        <li class="woocommerce-order-overview__date date">
                            <?php esc_html_e( 'Date:', 'woocommerce' ); ?>
                            <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
                        </li>
                        <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                            <li class="woocommerce-order-overview__email email">
                                <?php esc_html_e( 'Email:', 'woocommerce' ); ?>
                                <strong><?php echo $order->get_billing_email(); ?></strong>
                            </li>
                        <?php endif; ?>
                        <li class="woocommerce-order-overview__total total">
                            <?php esc_html_e( 'Total:', 'woocommerce' ); ?>
                            <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                        </li>
                        <?php if ( $order->get_payment_method_title() ) : ?>
                            <li class="woocommerce-order-overview__payment-method method">
                                <?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
                                <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Order Items Card -->
                <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
                <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

            </div>

        <?php endif; ?>

    <?php else : ?>

        <div class="fit-thankyou-hero">
            <p><?php esc_html_e( 'Thank you. Your order has been received.', 'woocommerce' ); ?></p>
        </div>

    <?php endif; ?>
</div>