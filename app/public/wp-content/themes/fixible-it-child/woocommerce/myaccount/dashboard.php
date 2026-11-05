<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="fit-portal-dashboard">
    <!-- Welcome Banner -->
    <div class="fit-portal-welcome">
        <h2>Welcome back, <?php echo esc_html( $current_user->display_name ); ?>! 👋</h2>
        <p>Here is an overview of your account and recent activity.</p>
    </div>

    <!-- Quick Actions Grid -->
    <div class="fit-portal-grid">
        <!-- Orders Card -->
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>" class="fit-portal-card">
            <div class="fit-portal-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
            </div>
            <h3>My Orders</h3>
            <p>View your recent orders, track status, and download invoices.</p>
        </a>

        <!-- Addresses Card -->
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>" class="fit-portal-card">
            <div class="fit-portal-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
            <h3>Addresses</h3>
            <p>Manage your billing and shipping addresses for faster checkout.</p>
        </a>

        <!-- Account Details Card -->
        <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>" class="fit-portal-card">
            <div class="fit-portal-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </div>
            <h3>Account Details</h3>
            <p>Update your name, email address, and change your password securely.</p>
        </a>

        <!-- Support Card -->
        <a href="/support/" class="fit-portal-card">
            <div class="fit-portal-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
            </div>
            <h3>Need Help?</h3>
            <p>Contact our support team for technical assistance or inquiries.</p>
        </a>
    </div>

    <!-- Logout Link -->
    <div class="fit-portal-logout">
        <a href="<?php echo esc_url( wc_logout_url() ); ?>">Log out of your account &rarr;</a>
    </div>
</div>

<?php
do_action( 'woocommerce_account_dashboard' );
do_action( 'woocommerce_before_my_account' );