<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fit-container fit-shop-layout">
            
            <!-- Left Sidebar (Filters) -->
            <aside class="fit-shop-sidebar">
                <?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'shop-sidebar' ); ?>
                <?php else : ?>
                    <div class="fit-widget-box" style="text-align: center; color: var(--fit-muted); font-size: 0.9rem;">
                        <p>Please add filter widgets from <br> <strong>Appearance → Widgets → Shop Sidebar</strong>.</p>
                    </div>
                <?php endif; ?>
            </aside>

            <!-- Right Content (Products) -->
            <div class="fit-shop-content">
                <?php if ( woocommerce_product_loop() ) {
                    do_action( 'woocommerce_before_shop_loop' );
                    woocommerce_product_loop_start();
                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();
                            wc_get_template_part( 'content', 'product' );
                        }
                    }
                    woocommerce_product_loop_end();
                    do_action( 'woocommerce_after_shop_loop' );
                } else {
                    do_action( 'woocommerce_no_products_found' );
                } ?>
            </div>
            
        </div>
    </main>
</div>

<?php get_footer( 'shop' ); ?>