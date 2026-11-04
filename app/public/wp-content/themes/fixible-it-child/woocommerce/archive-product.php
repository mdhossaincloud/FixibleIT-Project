<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>

<div class="fit-v3-shop-header">
    <h1>Explore Our Products</h1>
    <p>Discover premium PC components and IT hardware.</p>
</div>

<div class="fit-v3-shop-container">
    <div class="fit-v3-toolbar">
        <?php woocommerce_result_count(); ?>
        <?php woocommerce_catalog_ordering(); ?>
    </div>

    <div class="fit-v3-layout">
        <aside class="fit-v3-sidebar">
            <?php if ( is_active_sidebar( 'shop-sidebar' ) ) : dynamic_sidebar( 'shop-sidebar' ); else : ?>
                <p style="color: #6c757d; text-align: center; font-size: 0.9rem;">Add filter widgets from <br> <strong>Appearance → Widgets → Shop Sidebar</strong>.</p>
            <?php endif; ?>
        </aside>

        <div class="fit-v3-main">
            <?php if ( woocommerce_product_loop() ) { ?>
                <?php
                do_action( 'woocommerce_before_shop_loop' );
                woocommerce_product_loop_start();
                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) { the_post(); wc_get_template_part( 'content', 'product' ); }
                }
                woocommerce_product_loop_end();
                do_action( 'woocommerce_after_shop_loop' );
                ?>
            <?php } else { do_action( 'woocommerce_no_products_found' ); } ?>
        </div>
    </div>
</div>

<?php get_footer( 'shop' ); ?>