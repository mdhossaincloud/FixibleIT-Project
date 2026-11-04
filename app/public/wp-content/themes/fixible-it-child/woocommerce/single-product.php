<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' ); ?>

<div class="fit-single-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php wc_get_template_part( 'content', 'single-product' ); ?>
    <?php endwhile; ?>
</div>

<?php get_footer( 'shop' ); ?>