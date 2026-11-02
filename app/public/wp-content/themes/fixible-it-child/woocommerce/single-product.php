<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fit-container fit-product-page">
            <?php while ( have_posts() ) : the_post(); global $product; ?>

                <div class="fit-product-layout">
                    
                    <!-- Left: Gallery -->
                    <div class="fit-product-gallery">
                        <?php echo woocommerce_get_product_thumbnail( 'full' ); ?>
                    </div>

                    <!-- Right: Summary -->
                    <div class="fit-product-summary">
                        <h1 class="product_title"><?php the_title(); ?></h1>
                        
                        <div class="product-price">
                            <?php echo $product->get_price_html(); ?>
                        </div>

                        <div class="product-desc">
                            <?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
                        </div>

                        <!-- Product Actions Area -->
                        <?php if ( $product->is_in_stock() ) : ?>
                            <div class="fit-product-actions">
                                <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                                    
                                    <div class="fit-qty-wrapper">
                                        <button type="button" class="fit-qty-btn fit-qty-minus">−</button>
                                        <input type="number" class="input-text qty text fit-qty-input" step="1" min="<?php echo esc_attr( $product->get_min_purchase_quantity() ); ?>" max="<?php echo esc_attr( $product->get_max_purchase_quantity() ); ?>" name="quantity" value="<?php echo esc_attr( $product->get_min_purchase_quantity() ); ?>" title="Qty" size="4" inputmode="numeric" autocomplete="off">
                                        <button type="button" class="fit-qty-btn fit-qty-plus">+</button>
                                    </div>

                                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt fit-btn fit-btn-primary">Add to Cart</button>
                                </form>

                                <a href="<?php echo esc_url( add_query_arg( 'add-to-cart', $product->get_id(), wc_get_checkout_url() ) ); ?>" class="fit-btn fit-btn-navy fit-buy-now-btn">⚡ Buy Now</a>
                            </div>
                        <?php else : ?>
                            <p style="color: #e63946; font-weight: 600; padding: 15px; background: #ffe8e8; border-radius: 6px;">Out of Stock</p>
                        <?php endif; ?>

                        <button type="button" class="fit-action-btn fit-compare-btn" data-id="<?php echo $product->get_id(); ?>">
                            <span>⚖️</span> Add to Compare
                        </button>

                        <!-- Trust Badges -->
                        <div class="fit-trust-badges">
                            <div class="fit-trust-badge-item"><span>🚚</span> <span><strong>Fast Delivery:</strong> Inside Dhaka 24-48h</span></div>
                            <div class="fit-trust-badge-item"><span>🛡️</span> <span><strong>Official Warranty:</strong> 100% Genuine Product</span></div>
                            <div class="fit-trust-badge-item"><span>💳</span> <span><strong>Secure Payment:</strong> Cash on Delivery Available</span></div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </main>
</div>

<!-- Inline JS for Premium Quantity Buttons -->
<script>
jQuery(document).ready(function($) {
    $(document).on('click', '.fit-qty-plus', function(e) {
        e.preventDefault();
        var $input = $(this).siblings('.fit-qty-input');
        var currentVal = parseFloat($input.val());
        var max = parseFloat($input.attr('max'));
        var step = parseFloat($input.attr('step')) || 1;
        if (!max || currentVal < max) { $input.val(currentVal + step).trigger('change'); }
    });

    $(document).on('click', '.fit-qty-minus', function(e) {
        e.preventDefault();
        var $input = $(this).siblings('.fit-qty-input');
        var currentVal = parseFloat($input.val());
        var min = parseFloat($input.attr('min'));
        var step = parseFloat($input.attr('step')) || 1;
        if (!min || currentVal > min) { $input.val(currentVal - step).trigger('change'); }
    });
});
</script>

<?php get_footer( 'shop' ); ?>