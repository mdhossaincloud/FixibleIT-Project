<?php
/* Template Name: Compare Products */
get_header(); ?>

<div class="fit-container" style="padding: 60px 20px !important;">
    <h1 class="fit-page-title" style="color: var(--fit-navy); font-weight: 700; text-align: center;">Compare Products</h1>
    <div id="fit-compare-container" style="margin-top: 40px; overflow-x: auto;">
        <p style="text-align: center; color: var(--fit-muted);">Loading comparison data...</p>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    let compareList = localStorage.getItem('fit_compare');
    
    // Check if empty
    if(!compareList || JSON.parse(compareList).length === 0) {
        $('#fit-compare-container').html('<div style="text-align:center; padding:50px; background:#f8f9fa; border-radius:8px;"><p style="font-size:1.2rem; color:#6c757d;">No products added to compare yet.</p><a href="/shop/" class="fit-btn fit-btn-primary" style="margin-top:15px; display:inline-block; background:var(--fit-teal); color:#fff; padding:10px 20px; border-radius:4px; text-decoration:none;">Go to Shop</a></div>');
        return;
    }
    
    let ids = JSON.parse(compareList);
    
    // Fetch data using WP REST API
    $.ajax({
        url: '/wp-json/wp/v2/product?include=' + ids.join(',') + '&_embed',
        method: 'GET',
        success: function(data) {
            if(!data || data.length === 0) {
                 $('#fit-compare-container').html('<div style="text-align:center; padding:50px;"><p style="color:#6c757d;">Products not found. They may have been removed.</p></div>');
                 return;
            }

            let html = '<table style="width:100%; border-collapse:collapse; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05);"><thead><tr style="background:#f8f9fa; border-bottom:2px solid #eaeaea;"><th style="padding:20px; text-align:left; width:150px; color:var(--fit-navy);">Feature</th>';
            
            data.forEach(function(product) {
                html += '<th style="padding:20px; text-align:center; font-size:1.1rem; color:#102A35; font-weight:700;">' + product.title.rendered + '</th>';
            });
            html += '</tr></thead><tbody>';

            // Image Row
            html += '<tr style="border-bottom:1px solid #eaeaea;"><td style="padding:20px; font-weight:600; color:var(--fit-navy);">Image</td>';
            data.forEach(function(product) {
                let img = product._embedded['wp:featuredmedia'] ? product._embedded['wp:featuredmedia'][0].source_url : 'https://via.placeholder.com/150';
                html += '<td style="padding:20px; text-align:center;"><img src="' + img + '" style="max-width:120px; height:auto; border-radius:6px;"></td>';
            });
            html += '</tr>';

            // Action Row
            html += '<tr style="border-bottom:1px solid #eaeaea;"><td style="padding:20px; font-weight:600; color:var(--fit-navy);">Action</td>';
            data.forEach(function(product) {
                html += '<td style="padding:20px; text-align:center;">';
                html += '<a href="' + product.link + '" class="fit-btn fit-btn-primary" style="padding:8px 15px; font-size:0.9rem; display:inline-block; margin-bottom:10px; background:var(--fit-teal); color:#fff; text-decoration:none; border-radius:4px;">View Product</a><br>';
                html += '<button class="fit-remove-compare-btn" data-id="' + product.id + '" style="background:#e63946; color:#fff; border:none; padding:8px 15px; border-radius:4px; cursor:pointer; font-size:0.9rem;">Remove</button>';
                html += '</td>';
            });
            html += '</tr>';

            // Summary Row
            html += '<tr><td style="padding:20px; font-weight:600; color:var(--fit-navy);">Summary</td>';
            data.forEach(function(product) {
                let cleanDesc = product.excerpt.rendered.replace(/<[^>]*>?/gm, '').substring(0, 100) + '...';
                html += '<td style="padding:20px; text-align:center; color:#6c757d; font-size:0.9rem; line-height:1.6;">' + cleanDesc + '</td>';
            });
            html += '</tr>';

            html += '</tbody></table>';
            html += '<div style="margin-top: 30px; text-align:right;"><button onclick="localStorage.removeItem(\'fit_compare\'); location.reload();" class="fit-btn" style="background:#e63946; color:#fff; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; font-weight:600;">Clear All</button></div>';
            
            $('#fit-compare-container').html(html);
        },
        error: function() {
            $('#fit-compare-container').html('<p style="color:#e63946; text-align:center;">Error loading products. Please try again.</p>');
        }
    });

    // Remove individual product from compare list
    $(document).on('click', '.fit-remove-compare-btn', function() {
        let idToRemove = $(this).data('id').toString();
        let compareList = JSON.parse(localStorage.getItem('fit_compare')) || [];
        // Filter out the specific ID
        compareList = compareList.filter(id => id.toString() !== idToRemove);
        localStorage.setItem('fit_compare', JSON.stringify(compareList));
        location.reload(); // Reload page to update UI
    });
});
</script>

<?php get_footer(); ?>