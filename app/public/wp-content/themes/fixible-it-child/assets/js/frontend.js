jQuery(document).ready(function($) {

    // 1. Compare Logic
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

    // 2. Buy Now Logic
    $(document).on('click', '.fit-buy-now-btn, .fit-msb-btn', function(e) {
        e.preventDefault();
        var form = $(this).closest('form.cart');
        if(form.length === 0) { form = $('form.cart').first(); }

        if(form.length > 0) {
            var btn = $(this);
            
            if (form.hasClass('variations_form')) {
                var variation_id = form.find('input[name="variation_id"]').val();
                if (!variation_id || variation_id == 0) {
                    alert('Please select product options before buying.');
                    return;
                }
            }

            btn.text('Processing...').prop('disabled', true);
            form.append('<input type="hidden" name="fit_buy_now" value="1">');
            form.off('submit').submit(); 
        }
    });

    // 3. Quantity Plus/Minus
    if ($('form.cart .quantity').length > 0) {
        $('form.cart .quantity').append('<button type="button" class="fit-qty-btn fit-qty-minus">-</button>');
        $('form.cart .quantity').prepend('<button type="button" class="fit-qty-btn fit-qty-plus">+</button>');
        $('form.cart .quantity input.qty').css({'text-align': 'center', '-moz-appearance': 'textfield'});
    }
    
    $(document).on('click', '.fit-qty-plus', function(e) {
        e.preventDefault();
        var input = $(this).closest('.quantity').find('input.qty');
        var val = parseFloat(input.val()) || 0;
        var max = parseFloat(input.attr('max'));
        if(max && val >= max) return;
        input.val(val + 1).trigger('change');
    });

    $(document).on('click', '.fit-qty-minus', function(e) {
        e.preventDefault();
        var input = $(this).closest('.quantity').find('input.qty');
        var val = parseFloat(input.val()) || 0;
        var min = parseFloat(input.attr('min')) || 1;
        if(val <= min) return;
        input.val(val - 1).trigger('change');
    });
});