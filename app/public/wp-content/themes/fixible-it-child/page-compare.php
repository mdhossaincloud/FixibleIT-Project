<?php
/* Template Name: Compare Products */
get_header(); ?>

<div class="fit-container" style="padding: 60px 20px !important;">
    <h1 class="fit-page-title">Compare Products</h1>
    <div id="fit-compare-container" style="margin-top: 40px; overflow-x: auto;">
        <p style="text-align: center; color: var(--fit-muted);">Loading comparison data...</p>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    let compareList = localStorage.getItem('fit_compare');
    if(!compareList || JSON.parse(compareList).length === 0) {
        $('#fit-compare-container').html('<div style="text-align:center; padding:50px; background:#f8f9fa; border-radius:8px;"><p style="font-size:1.2rem; color:#6c757d;">No products added to compare yet.</p><a href="/shop/" class="fit-btn fit-btn-primary" style="margin-top:15px;">Go to Shop</a></div>');
        return;
    }
    
    let ids = JSON.parse(compareList);
    $.ajax({
        url: '/wp-json/wp/v2/product?include=' + ids.join(',') + '&_embed',
        method: 'GET',
        success: function(data) {
            let html = '<table style="width:100%; border-collapse:collapse; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05);"><thead><tr style="background:#f8f9fa; border-bottom:2px solid #eaeaea;"><th style="padding:20px; text-align:left; width:200px;">Feature</th>';
            data.forEach(function(product) {
                html += '<th style="padding:20px; text-align:center; font-size:1.1rem; color:#102A35;">' + product.title.rendered + '</th>';
            });
            html += '</tr></thead><tbody>';
            
            // Image
            html += '<tr style="border-bottom:1px solid #eaeaea;"><td style="padding:20px; font-weight:600;">Image</td>';
            data.forEach(function(product) {
                let img = product._embedded['wp:featuredmedia'] ? product._embedded['wp:featuredmedia'][0].source_url : 'https://via.placeholder.com/150';
                html += '<td style="padding:20px; text-align:center;"><img src="' + img + '" style="max-width:120px; height:auto;"></td>';
            });
            html += '</tr>';
            
            // Price & Action
            html += '<tr style="border-bottom:1px solid #eaeaea;"><td style="padding:20px; font-weight:600;">Action</td>';
            data.forEach(function(product) {
                html += '<td style="padding:20px; text-align:center;"><a href="' + product.link + '" class="fit-btn fit-btn-primary" style="padding:10px 20px; font-size:0.9rem;">View Product</a></td>';
            });
            html += '</tr>';

            // Excerpt
            html += '<tr><td style="padding:20px; font-weight:600;">Summary</td>';
            data.forEach(function(product) {
                let cleanDesc = product.excerpt.rendered.replace(/<[^>]*>?/gm, '').substring(0, 100) + '...';
                html += '<td style="padding:20px; text-align:center; color:#6c757d; font-size:0.9rem;">' + cleanDesc + '</td>';
            });
            html += '</tr>';

            html += '</tbody></table>';
            html += '<div style="margin-top: 30px; text-align:right;"><button onclick="localStorage.removeItem(\'fit_compare\'); location.reload();" class="fit-btn" style="background:#e63946; color:#fff;">Clear Compare</button></div>';
            
            $('#fit-compare-container').html(html);
        }
    });
});
</script>

<?php get_footer(); ?>