<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="fit-portal-returns">
    <div class="fit-portal-welcome">
        <h2>Returns & Refunds</h2>
        <p>Request a return or check the status of your existing requests.</p>
    </div>

    <?php wc_print_notices(); ?>

    <div class="fit-return-grid">
        <!-- Left: Request Form -->
        <div class="fit-return-form-box">
            <h3>Request a New Return</h3>
            <form method="post" action="">
                <?php wp_nonce_field( 'fit_return_action', 'fit_return_nonce' ); ?>
                <div class="fit-form-group">
                    <label>Select Order *</label>
                    <select name="return_order_id" required>
                        <option value="">Choose an order...</option>
                        <?php
                        $customer_orders = wc_get_orders( array(
                            'customer' => get_current_user_id(),
                            'limit' => -1,
                            'status' => array( 'completed', 'processing' ) // Only allow return for completed/processing
                        ) );
                        if ( ! empty( $customer_orders ) ) {
                            foreach ( $customer_orders as $order ) {
                                echo '<option value="' . esc_attr( $order->get_id() ) . '">#' . esc_html( $order->get_order_number() ) . ' - ' . wc_format_datetime( $order->get_date_created(), 'M d, Y' ) . '</option>';
                            }
                        } else {
                            echo '<option value="">No eligible orders found.</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="fit-form-group">
                    <label>Reason for Return *</label>
                    <select name="return_reason" required>
                        <option value="Damaged Item">Damaged Item</option>
                        <option value="Defective Item">Defective Item</option>
                        <option value="Wrong Item Received">Wrong Item Received</option>
                        <option value="Missing Parts">Missing Parts</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="fit-form-group">
                    <label>Additional Details *</label>
                    <textarea name="return_details" rows="4" required placeholder="Please describe the issue..."></textarea>
                </div>

                <button type="submit" name="fit_submit_return" class="fit-portal-btn">Submit Return Request</button>
            </form>
        </div>

        <!-- Right: Past Requests -->
        <div class="fit-return-history-box">
            <h3>Return History</h3>
            <?php
            $returns = get_posts( array(
                'post_type' => 'fit_return',
                'author' => get_current_user_id(),
                'posts_per_page' => -1,
            ) );
            
            if ( $returns ) {
                echo '<ul class="fit-return-list">';
                foreach ( $returns as $post ) {
                    $order_id = get_post_meta( $post->ID, '_fit_return_order_id', true );
                    $status = get_post_meta( $post->ID, '_fit_return_status', true );
                    $status_class = strtolower( str_replace( ' ', '-', $status ) );
                    echo '<li>';
                    echo '<div><strong>Order #' . esc_html( $order_id ) . '</strong><br><span>' . get_the_date( 'M d, Y', $post ) . '</span></div>';
                    echo '<span class="fit-status-badge ' . esc_attr( $status_class ) . '">' . esc_html( $status ) . '</span>';
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p style="color: #64748B;">No return requests found.</p>';
            }
            ?>
        </div>
    </div>
</div>