<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="fit-dashboard-wrapper" style="background:#fff; padding:30px; border-radius:8px; border:1px solid #eaeaea;">
    <p style="font-size:1.1rem; color:#102A35; margin-bottom:20px;">
        <?php
        printf(
            esc_html__( 'Hello %1$s (not %1$s? %2$sLog out%3$s)', 'woocommerce' ),
            '<strong>' . esc_html( $current_user->display_name ) . '</strong>',
            '<a href="' . esc_url( wc_logout_url() ) . '">',
            '</a>'
        );
        ?>
    </p>

    <div style="background:#f8f9fa; padding:20px; border-radius:6px; border:1px solid #eaeaea;">
        <p style="margin:0; color:#6c757d;">
            <?php
            printf(
                esc_html__( 'From your account dashboard you can view your %1$srecent orders%2$s, manage your %3$sshipping and billing addresses%4$s, and %5$sedit your password and account details%6$s.', 'woocommerce' ),
                '<a href="' . esc_url( wc_get_endpoint_url( 'orders' ) ) . '">',
                '</a>',
                '<a href="' . esc_url( wc_get_endpoint_url( 'edit-address' ) ) . '">',
                '</a>',
                '<a href="' . esc_url( wc_get_endpoint_url( 'edit-account' ) ) . '">',
                '</a>'
            );
            ?>
        </p>
    </div>
</div>
<?php
do_action( 'woocommerce_account_dashboard' );
do_action( 'woocommerce_before_my_account' );