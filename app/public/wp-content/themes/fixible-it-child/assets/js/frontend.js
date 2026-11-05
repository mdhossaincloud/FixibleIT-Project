jQuery(document).ready(function($) {

    // ==========================================
    // 1. COMPARE LOGIC
    // ==========================================
    function updateCompareUI() {
        var compareList = JSON.parse(localStorage.getItem('fit_compare')) || [];
        $('#fit-compare-count').text(compareList.length);
        if(compareList.length > 0) {
            $('#fit-floating-compare-btn').css('display', 'flex'); 
        } else {
            $('#fit-floating-compare-btn').css('display', 'none'); 
        }
    }
    updateCompareUI();

    $(document).on('click', '.fit-add-to-compare', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var btn = $(this);
        var productId = btn.data('product-id').toString();
        var compareList = JSON.parse(localStorage.getItem('fit_compare')) || [];

        if(compareList.includes(productId)) {
            alert('This product is already in your compare list!');
            return;
        }
        if(compareList.length >= 3) {
            alert('You can compare up to 3 products at a time.');
            return;
        }

        compareList.push(productId);
        localStorage.setItem('fit_compare', JSON.stringify(compareList));
        
        btn.text('✓ Added').css({'background': '#00A896', 'color': '#fff', 'border-color': '#00A896'});
        updateCompareUI();
    });

    // ==========================================
    // 2. BULLETPROOF BUY NOW REDIRECTION
    // ==========================================
    $(document).on('click', '.fit-buy-now-btn, .fit-msb-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var form = btn.closest('form.cart');
        if(form.length === 0) { form = $('form.cart').first(); }
        if(form.length === 0) return;

        var product_id = form.find('button[name="add-to-cart"]').val() || form.find('input[name="product_id"]').val();
        if (!product_id) { product_id = btn.val(); }
        
        var qty = form.find('input[name="quantity"]').val() || 1;
        var redirect_url = '/?add-to-cart=' + product_id + '&quantity=' + qty + '&fit_buy_now=1';

        if (form.hasClass('variations_form')) {
            var variation_id = form.find('input[name="variation_id"]').val();
            if (!variation_id || variation_id == 0) {
                alert('Please select product options before buying.');
                return;
            }
            redirect_url += '&variation_id=' + variation_id;
            
            form.find('.variations select').each(function() {
                var name = $(this).attr('name');
                var val = $(this).val();
                if (val) redirect_url += '&' + name + '=' + val;
            });
        }

        btn.text('Processing...').prop('disabled', true);
        window.location.href = redirect_url;
    });

    // ==========================================
    // 3. QUANTITY PLUS / MINUS BUTTONS
    // ==========================================
    function initQtyButtons() {
        $('form.cart .quantity').each(function() {
            var $qty = $(this);
            var $input = $qty.find('input.qty');
            if ($input.length === 0) return;
            $qty.find('label').hide();
            if ($qty.find('.fit-qty-btn').length === 2) return; 
            $qty.find('.fit-qty-btn').remove();
            if (!$input.parent().hasClass('fit-qty-wrapper')) {
                $input.wrap('<div class="fit-qty-wrapper"></div>');
            }
            var $wrapper = $qty.find('.fit-qty-wrapper');
            $wrapper.prepend('<button type="button" class="fit-qty-btn fit-qty-minus">-</button>');
            $wrapper.append('<button type="button" class="fit-qty-btn fit-qty-plus">+</button>');
        });
    }
    initQtyButtons();

    $(document).on('updated_wc_div woocommerce_variation_has_changed', function() {
        setTimeout(initQtyButtons, 50);
    });

    $(document).on('click', '.fit-qty-minus', function(e) {
        e.preventDefault();
        var $input = $(this).closest('.fit-qty-wrapper').find('input.qty');
        var val = parseFloat($input.val()) || 0;
        var min = parseFloat($input.attr('min')) || 1;
        if(val > min) { $input.val(val - 1).trigger('change'); }
    });

    $(document).on('click', '.fit-qty-plus', function(e) {
        e.preventDefault();
        var $input = $(this).closest('.fit-qty-wrapper').find('input.qty');
        var val = parseFloat($input.val()) || 0;
        var max = parseFloat($input.attr('max'));
        if(max && val >= max) return; 
        $input.val(val + 1).trigger('change');
    });

    // ==========================================
    // 4. SMART TRACKING LOGIC (WO & REF)
    // ==========================================
    $('#fit-track-form').on('submit', function(e) {
        e.preventDefault();
        let btn = $(this).find('button');
        let ref = $('#track_ref').val().trim();
        let action = 'fit_track_request';
        let cleanRef = ref.replace('#', '');

        // If input is purely numeric, treat as WooCommerce Order ID
        if (/^\d+$/.test(cleanRef)) {
            action = 'fit_track_wc_order';
        }

        btn.text('Searching...').prop('disabled', true);
        $('#fit-track-result').html('<p style="text-align:center;">Loading...</p>');

        $.ajax({
            url: fit_ajax.url, type: 'POST', dataType: 'json',
            data: { action: action, _ajax_nonce: fit_ajax.nonce, ref_no: ref, order_id: cleanRef }
        }).done(function(res) {
            if(res.success) {
                let html = `<div class="fit-track-result-box">
                    <h3>${res.data.type} Found</h3>
                    <p><strong>Reference:</strong> ${ref}</p>
                    <p><strong>Customer:</strong> ${res.data.name}</p>
                    <p><strong>Date:</strong> ${res.data.date}</p>
                    <p><strong>Status:</strong> <span class="fit-track-status">${res.data.status}</span></p>
                </div>`;
                $('#fit-track-result').html(html);
            } else {
                $('#fit-track-result').html('<p style="color:#e63946; text-align:center; font-weight:600; padding: 20px; background: #FEE2E2; border-radius: 8px;">' + res.data.message + '</p>');
            }
            btn.text('Track Now').prop('disabled', false);
        }).fail(function() {
            $('#fit-track-result').html('<p style="color:#e63946; text-align:center;">Server Error.</p>');
            btn.text('Track Now').prop('disabled', false);
        });
    });

});
// ==========================================
// HIDE CART BADGE IF ZERO
// ==========================================
jQuery(document).ready(function($) {
    function updateCartBadgeUI() {
        let badge = $('.kadence-header-cart .header-cart-total, .kadence-header-cart .cart-total');
        if (badge.length > 0) {
            let count = parseInt(badge.first().text().trim(), 10);
            if (isNaN(count) || count === 0) {
                badge.css({'display': 'none', 'visibility': 'hidden', 'opacity': '0'});
            } else {
                badge.css({'display': 'flex', 'visibility': 'visible', 'opacity': '1'});
            }
        }
    }

    // Initial load
    updateCartBadgeUI();

    // Run on WooCommerce AJAX updates
    $(document.body).on('added_to_cart wc_fragments_refreshed wc_fragments_loaded updated_wc_div', function() {
        setTimeout(updateCartBadgeUI, 100);
    });
});

// ==========================================
// FORCE HIDE 0 BADGE (AJAX SAFE)
// ==========================================
jQuery(document).ready(function($) {
    function checkCartBadge() {
        let badge = $('.kadence-header-cart .header-cart-total, .kadence-header-cart .cart-total');
        if (badge.length > 0) {
            let text = badge.first().text().trim();
            if (text === '0' || text === '') {
                badge.css({'display': 'none', 'visibility': 'hidden'});
            } else {
                badge.css({'display': 'flex', 'visibility': 'visible'});
            }
        }
    }
    
    // Check on page load
    checkCartBadge();
    
    // Check when WooCommerce updates the cart via AJAX
    $(document.body).on('added_to_cart wc_fragments_refreshed wc_fragments_loaded updated_wc_div', function() {
        setTimeout(checkCartBadge, 100);
    });
});
