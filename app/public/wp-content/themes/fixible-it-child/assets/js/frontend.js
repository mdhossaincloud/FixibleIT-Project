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
        
        btn.text('? Added').css({'background': '#00A896', 'color': '#fff', 'border-color': '#00A896'});
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

});
// ==========================================
// FORCE CART BADGE UPDATE (WooCommerce AJAX)
// ==========================================
jQuery(document).ready(function($) {
    // Listen to WooCommerce AJAX events
    $(document.body).on('added_to_cart wc_fragments_refreshed wc_fragments_loaded', function() {
        // Find the count from the refreshed fragments or the hidden input
        var cartCount = $('.woocommerce-cart-count').text() || $('.header-cart-total').text();
        
        // If WooCommerce doesn't output it natively, we parse it from the fragment
        // Fallback: just let the theme handle it, but ensure our element is not empty
        if (!cartCount || cartCount === '') {
             // Sometimes the count is stored in a data attribute or hidden element
             var total = $('.kadence-header-cart .cart-total').text();
             if (total) { $('.header-cart-total').text(total); }
        }
    });
});
