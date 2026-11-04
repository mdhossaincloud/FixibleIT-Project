<?php
defined( 'ABSPATH' ) || exit;
global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<li <?php wc_product_class( 'fit-v3-card', $product ); ?>>
    <div class="fit-v3-image">
        <a href="<?php the_permalink(); ?>">
            <?php echo woocommerce_get_product_thumbnail(); ?>
        </a>
        <?php if ( $product->is_on_sale() ) : ?>
            <span class="fit-v3-badge">Sale</span>
        <?php endif; ?>
        
        <div class="fit-v3-hover-action">
            <?php if ( $product->is_in_stock() ) : ?>
                <?php woocommerce_template_loop_add_to_cart(); ?>
            <?php else : ?>
                <a href="<?php the_permalink(); ?>" class="button">Read More</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="fit-v3-content">
        <h2 class="fit-v3-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="fit-v3-price">
            <?php echo $product->get_price_html(); ?>
        </div>
    </div>
</li>