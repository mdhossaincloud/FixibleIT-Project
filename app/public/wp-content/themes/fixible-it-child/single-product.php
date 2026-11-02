<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>

<style>
/* =========================================================
   PREMIUM SINGLE PRODUCT UI
   ========================================================= */
body.single-product { background-color: #F8F9FA !important; }
.fit-product-wrapper { max-width: 1200px !important; margin: 40px auto !important; padding: 20px !important; }
.fit-product-layout {
    display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 50px !important;
    align-items: start !important; background: #FFFFFF !important; padding: 40px !important;
    border-radius: 16px !important; border: 1px solid #EAEAEA !important; box-shadow: 0 4px 20px rgba(16,42,53,0.04) !important;
}
.fit-product-gallery { width: 100% !important; text-align: center !important; background: #F8F9FA !important; border-radius: 12px !important; padding: 20px !important; border: 1px solid #EAEAEA !important; }
.fit-product-gallery img { max-width: 100% !important; max-height: 500px !important; object-fit: contain !important; border-radius: 8px !important; }
.fit-product-summary { width: 100% !important; }
.fit-product-summary .product_title { font-size: 2rem !important; font-weight: 800 !important; color: #102A35 !important; line-height: 1.2 !important; margin-bottom: 10px !important; }
.fit-product-summary .product-price { font-size: 1.8rem !important; font-weight: 700 !important; color: #00A896 !important; margin-bottom: 20px !important; padding-bottom: 20px !important; border-bottom: 1px solid #EAEAEA !important; }
.fit-product-summary .product-desc { color: #6C757D !important; font-size: 1rem !important; line-height: 1.6 !important; margin-bottom: 30px !important; }

.fit-product-actions { display: flex !important; flex-direction: column !important; gap: 15px !important; }
.fit-product-actions form.cart { display: flex !important; gap: 15px !important; width: 100% !important; }
.fit-qty-wrapper { display: flex !important; align-items: center !important; border: 1px solid #EAEAEA !important; border-radius: 8px !important; background: #F8F9FA !important; overflow: hidden !important; height: 52px !important; }
.fit-qty-btn { background: transparent !important; border: none !important; width: 45px !important; height: 100% !important; font-size: 1.2rem !important; font-weight: 600 !important; color: #102A35 !important; cursor: pointer !important; }
.fit-qty-btn:hover { background: #EAEAEA !important; }
.fit-qty-input { width: 50px !important; height: 100% !important; border: none !important; background: transparent !important; text-align: center !important; font-size: 1.1rem !important; font-weight: 600 !important; }
.fit-product-actions .single_add_to_cart_button { flex: 1 !important; height: 52px !important; background: #00A896 !important; color: #fff !important; border-radius: 8px !important; font-size: 1rem !important; font-weight: 600 !important; text-transform: uppercase !important; border: none !important; cursor: pointer !important; transition: 0.3s !important; }
.fit-product-actions .single_add_to_cart_button:hover { background: #102A35 !important; }
.fit-buy-now-btn { height: 52px !important; background: #102A35 !important; color: #fff !important; border-radius: 8px !important; font-size: 1rem !important; font-weight: 600 !important; display: flex !important; align-items: center !important; justify-content: center !important; text-decoration: none !important; transition: 0.3s !important; }
.fit-buy-now-btn:hover { background: #00A896 !important; }

/* Compare Button */
.fit-compare-btn {
    height: 52px !important; width: auto !important; padding: 0 25px !important;
    display: inline-flex !important; align-items: center !important; justify-content: center !important;
    margin-top: 25px !important; border: 1px solid #EAEAEA !important; background: transparent !important;
    border-radius: 8px !important; color: #102A35 !important; font-weight: 600 !important;
    font-size: 0.95rem !important; gap: 8px !important; cursor: pointer !important; transition: all 0.3s ease !important;
}
.fit-compare-btn:hover { border-color: #00A896 !important; color: #00A896 !important; background: rgba(0, 168, 150, 0.05) !important; }
.fit-compare-btn.added { border-color: #00A896 !important; background: #00A896 !important; color: #fff !important; }

.fit-trust-badges { margin-top: 30px !important; padding-top: 25px !important; border-top: 1px solid #EAEAEA !important; display: flex !important; flex-direction: column !important; gap: 15px !important; }
.fit-trust-badge-item { display: flex !important; align-items: center !important; gap: 12px !important; font-size: 0.95rem !important; color: #6C757D !important; }

@media (max-width: 992px) {
    .fit-product-layout { grid-template-columns: 1fr !important; padding: 20px !important; gap: 30px !important; }
    .fit-compare-btn { width: 100% !important; }
}
</style>

<div class="fit-product-wrapper">
    <?php while ( have_posts() ) : the_post(); global $product; ?>
        <div class="fit-product-layout">
            <!-- Left: Gallery -->
            <div class="fit-product-gallery">
                <?php echo woocommerce_get_product_thumbnail( 'woocommerce_single' ); ?>
            </div>

            <!-- Right: Summary -->
            <div class="fit-product-summary">
                <h1 class="product_title"><?php the_title(); ?></h1>
                <div class="product-price"><?php echo $product->get_price_html(); ?></div>
                <div class="product-desc"><?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?></div>

                <?php if ( $product->is_in_stock() ) : ?>
                    <div class="fit-product-actions">
                        <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                            <div class="fit-qty-wrapper">
                                <button type="button" class="fit-qty-btn fit-qty-minus">−</button>
                                <input type="number" class="input-text qty text fit-qty-input" step="1" min="<?php echo esc_attr( $product->get_min_purchase_quantity() ); ?>" max="<?php echo esc_attr( $product->get_max_purchase_quantity() ); ?>" name="quantity" value="<?php echo esc_attr( $product->get_min_purchase_quantity() ); ?>" title="Qty" size="4" inputmode="numeric" autocomplete="off">
                                <button type="button" class="fit-qty-btn fit-qty-plus">+</button>
                            </div>
                            <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt">Add to Cart</button>
                        </form>
                        <a href="<?php echo esc_url( add_query_arg( 'add-to-cart', $product->get_id(), wc_get_checkout_url() ) ); ?>" class="fit-btn fit-buy-now-btn">⚡ Buy Now</a>
                    </div>
                <?php else : ?>
                    <p style="color: #e63946; font-weight: 600; padding: 15px; background: #ffe8e8; border-radius: 6px;">Out of Stock</p>
                <?php endif; ?>

                <!-- Compare Button -->
                <button type="button" class="fit-compare-btn" data-id="<?php echo $product->get_id(); ?>" data-name="<?php echo esc_attr($product->get_name()); ?>">
                    <span>⚖️</span> <span class="compare-text">Add to Compare</span>
                </button>

                <div class="fit-trust-badges">
                    <div class="fit-trust-badge-item"><span>🚚</span> <span><strong>Fast Delivery:</strong> Inside Dhaka 24-48h</span></div>
                    <div class="fit-trust-badge-item"><span>🛡️</span> <span><strong>Official Warranty:</strong> 100% Genuine Product</span></div>
                    <div class="fit-trust-badge-item"><span>💳</span> <span><strong>Secure Payment:</strong> Cash on Delivery Available</span></div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<script>
jQuery(document).ready(function($) {
    // Qty Logic
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

    // Compare Logic (Fixed)
    $('.fit-compare-btn').on('click', function() {
        var btn = $(this);
        var productId = btn.data('id');
        var compareList = JSON.parse(localStorage.getItem('fit_compare') || '[]');

        if(compareList.includes(productId)) {
            // Remove
            compareList = compareList.filter(id => id !== productId);
            btn.removeClass('added').find('.compare-text').text('Add to Compare');
        } else {
            // Add
            compareList.push(productId);
            btn.addClass('added').find('.compare-text').text('Added ✔');
        }

        localStorage.setItem('fit_compare', JSON.stringify(compareList));

        // Update floating bar if exists
        if ($('#fit-compare-count').length) {
            $('#fit-compare-count').text(compareList.length);
            if(compareList.length > 0) {
                $('#fit-compare-bar').css('display', 'block');
            } else {
                $('#fit-compare-bar').css('display', 'none');
            }
        }
    });

    // Check initial state
    var currentCompareList = JSON.parse(localStorage.getItem('fit_compare') || '[]');
    var thisId = $('.fit-compare-btn').data('id');
    if(currentCompareList.includes(thisId)) {
        $('.fit-compare-btn').addClass('added').find('.compare-text').text('Added ✔');
    }
});
</script>
<?php get_footer( 'shop' ); ?>