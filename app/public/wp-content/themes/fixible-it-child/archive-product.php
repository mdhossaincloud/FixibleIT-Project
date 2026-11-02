<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>

<style>
/* =========================================================
   PREMIUM SHOP PAGE UI (Scoped & Bulletproof)
   ========================================================= */
body.post-type-archive-product {
    background-color: #F8F9FA !important;
}

.fit-shop-wrapper {
    max-width: 1240px !important;
    margin: 40px auto !important;
    padding: 0 20px !important;
}

.fit-shop-layout {
    display: grid !important;
    grid-template-columns: 280px minmax(0, 1fr) !important;
    gap: 30px !important;
    align-items: start !important;
    width: 100% !important;
}

/* Sidebar */
.fit-shop-sidebar {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 12px !important;
    padding: 25px !important;
    box-shadow: 0 4px 15px rgba(16,42,53,0.03) !important;
    position: sticky !important;
    top: 30px !important;
}
.fit-shop-sidebar h2, 
.fit-shop-sidebar h4, 
.fit-widget-title {
    font-size: 1.1rem !important;
    font-weight: 700 !important;
    color: #102A35 !important;
    margin-bottom: 20px !important;
    padding-bottom: 15px !important;
    border-bottom: 2px solid #F8F9FA !important;
}
/* Fix huge price slider */
.fit-shop-sidebar .price_slider_wrapper .ui-slider { margin: 15px 0; }
.fit-shop-sidebar .price_slider_amount button { background: #102A35 !important; color: #fff !important; border-radius: 6px !important; padding: 8px 15px !important; }

/* Main Content */
.fit-shop-content {
    min-width: 0 !important;
    width: 100% !important;
}
/* Reset WooCommerce default wrapper */
.fit-shop-content .woocommerce-notices-wrapper,
.fit-shop-content .woocommerce-result-count,
.fit-shop-content .woocommerce-ordering {
    margin-bottom: 20px !important;
}
.fit-shop-content .woocommerce-ordering select {
    padding: 8px 12px !important;
    border-radius: 6px !important;
    border: 1px solid #ddd !important;
}

/* Product Grid */
.fit-shop-content ul.products {
    display: grid !important;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)) !important;
    gap: 25px !important;
    margin: 0 !important;
    padding: 0 !important;
    list-style: none !important;
}
.fit-shop-content ul.products li.product {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 12px !important;
    padding: 20px !important;
    margin: 0 !important;
    width: 100% !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    text-align: center !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 2px 8px rgba(16,42,53,0.02) !important;
}
.fit-shop-content ul.products li.product:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 10px 25px rgba(16,42,53,0.08) !important;
    border-color: #00A896 !important;
}
.fit-shop-content ul.products li.product img {
    max-height: 180px !important;
    width: auto !important;
    object-fit: contain !important;
    margin-bottom: 15px !important;
}
.fit-shop-content ul.products li.product .woocommerce-loop-product__title {
    font-size: 1rem !important;
    font-weight: 600 !important;
    color: #102A35 !important;
    margin-bottom: 10px !important;
    flex-grow: 1 !important;
}
.fit-shop-content ul.products li.product .price {
    font-size: 1.1rem !important;
    font-weight: 700 !important;
    color: #00A896 !important;
    margin-bottom: 15px !important;
}
.fit-shop-content ul.products li.product .button {
    background: #00A896 !important;
    color: #fff !important;
    border-radius: 6px !important;
    padding: 10px 20px !important;
    font-weight: 600 !important;
    width: 100% !important;
    text-align: center !important;
    transition: all 0.3s ease !important;
}
.fit-shop-content ul.products li.product .button:hover {
    background: #102A35 !important;
}

/* Pagination */
.woocommerce-pagination ul.page-numbers {
    display: flex !important;
    justify-content: center !important;
    gap: 8px !important;
    margin-top: 40px !important;
    border: none !important;
}
.woocommerce-pagination ul.page-numbers li {
    border: none !important;
}
.woocommerce-pagination ul.page-numbers li a,
.woocommerce-pagination ul.page-numbers li span {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 40px !important;
    height: 40px !important;
    border-radius: 6px !important;
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    color: #102A35 !important;
    font-weight: 600 !important;
    text-decoration: none !important;
}
.woocommerce-pagination ul.page-numbers li span.current,
.woocommerce-pagination ul.page-numbers li a:hover {
    background: #00A896 !important;
    color: #FFFFFF !important;
    border-color: #00A896 !important;
}

/* Mobile */
@media (max-width: 992px) {
    .fit-shop-layout { grid-template-columns: 1fr !important; }
    .fit-shop-sidebar { position: static !important; display: none !important; }
}
</style>

<div class="fit-shop-wrapper">
    <div class="fit-shop-layout">
        
        <!-- Left Sidebar -->
        <aside class="fit-shop-sidebar">
            <?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'shop-sidebar' ); ?>
            <?php else : ?>
                <div style="text-align: center; color: #6C757D; font-size: 0.9rem;">
                    <p>Please add filter widgets from <br> <strong>Appearance → Widgets → Shop Sidebar</strong>.</p>
                </div>
            <?php endif; ?>
        </aside>

        <!-- Right Content -->
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
</div>

<?php get_footer( 'shop' ); ?>