<?php
defined( 'ABSPATH' ) || exit;
global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<li <?php wc_product_class( 'fit-custom-card', $product ); ?>>
    <div class="fit-card-img-wrap">
        <a href="<?php the_permalink(); ?>">
            <?php echo woocommerce_get_product_thumbnail(); ?>
        </a>
    </div>
    
    <h2 class="woocommerce-loop-product__title" style="font-size: 1.1rem; margin-bottom: 10px;">
        <a href="<?php the_permalink(); ?>" style="color: var(--fit-navy); text-decoration: none;"><?php the_title(); ?></a>
    </h2>
    
    <div class="fit-card-price" style="color: var(--fit-teal-dark); font-weight: 700; font-size: 1.2rem; margin-bottom: 15px;">
        <?php echo $product->get_price_html(); ?>
    </div>

    <div class="fit-card-action">
        <?php if ( $product->is_in_stock() ) : ?>
            <?php woocommerce_template_loop_add_to_cart(); ?>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>" class="button" style="background: #ccc !important;">Read More</a>
        <?php endif; ?>
    </div>
</li>