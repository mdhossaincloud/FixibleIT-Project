<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>

<!-- ============================================================
     SHOP SIDEBAR — CONSOLIDATED STICKY FIX
     Single source of truth. Do NOT duplicate these rules elsewhere.
     ============================================================ -->
<style>
@media (min-width: 993px) {

    /* ---- 1. Kill sticky-breakers on every ancestor wrapper ---- */
    body.woocommerce-shop .site,
    body.woocommerce-shop #wrapper,
    body.woocommerce-shop .site-container,
    body.woocommerce-shop .site-inner,
    body.woocommerce-shop #inner-wrap,
    body.woocommerce-shop .site-content-contain,
    body.woocommerce-shop .content-wrap,
    body.woocommerce-shop #content,
    body.woocommerce-shop #primary,
    body.woocommerce-shop #main,
    body.woocommerce-shop .content-area,
    body.woocommerce-shop .site-main,
    body.woocommerce-shop .entry,
    body.woocommerce-shop .entry-content,
    body.woocommerce-shop .entry-content-wrap,
    body.woocommerce-shop .fit-container,
    body.woocommerce-shop .fit-shop-layout {
        overflow: visible !important;
        overflow-x: visible !important;
        overflow-y: visible !important;
        transform: none !important;
        filter: none !important;
        perspective: none !important;
        contain: none !important;
        clip-path: none !important;
    }

    /* ---- 2. Flex layout, top-aligned ---- */
    body.woocommerce-shop .fit-shop-layout {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: flex-start !important;
        gap: 30px !important;
        width: 100% !important;
    }

    /* ---- 3. Sidebar: sticky + internal scroll ---- */
    body.woocommerce-shop .fit-shop-sidebar {
        flex: 0 0 280px !important;
        align-self: flex-start !important;

        position: -webkit-sticky !important;
        position: sticky !important;
        top: 100px !important;              /* ← header height অনুযায়ী adjust করুন */
        z-index: 9 !important;

        max-height: calc(100vh - 120px) !important;
        overflow-y: auto !important;
        overscroll-behavior: contain !important;

        background: #FFFFFF !important;
        border: 1px solid #EAEAEA !important;
        border-radius: 12px !important;
        padding: 20px !important;
        box-shadow: 0 4px 15px rgba(16,42,53,0.05) !important;
        box-sizing: border-box !important;
    }

    /* ---- 4. Products column ---- */
    body.woocommerce-shop .fit-shop-content {
        flex: 1 1 0% !important;
        min-width: 0 !important;
    }

    /* ---- 5. Scrollbar styling ---- */
    body.woocommerce-shop .fit-shop-sidebar::-webkit-scrollbar {
        width: 6px !important;
    }
    body.woocommerce-shop .fit-shop-sidebar::-webkit-scrollbar-track {
        background: #F1F5F9 !important;
        border-radius: 8px !important;
    }
    body.woocommerce-shop .fit-shop-sidebar::-webkit-scrollbar-thumb {
        background: #00A896 !important;
        border-radius: 8px !important;
    }

    /* ---- 6. Widget separators ---- */
    body.woocommerce-shop .fit-shop-sidebar .widget {
        margin-bottom: 20px !important;
        padding-bottom: 20px !important;
        border-bottom: 1px solid #EAEAEA !important;
    }
    body.woocommerce-shop .fit-shop-sidebar .widget:last-child {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
        border-bottom: none !important;
    }
}
</style>

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