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
    // 2. BUY NOW LOGIC
    // ==========================================
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

    // ==========================================
    // 3. QUANTITY PLUS / MINUS BUTTONS
    // ==========================================
    function initQtyButtons() {
        $('form.cart .quantity').each(function() {
            var $qty = $(this);
            var $input = $qty.find('input.qty');
            
            if ($input.length === 0) return;

            // লেবেল লুকানো
            $qty.find('label').hide();

            // যদি আগেই বাটন থাকে তবে আর নতুন করে বসাবে না
            if ($qty.find('.fit-qty-btn').length === 2) {
                return; 
            }

            // আগের কোনো ভুল বাটন থাকলে মুছে ফেলবে
            $qty.find('.fit-qty-btn').remove();

            // ইনপুট বক্সকে র‍্যাপ করা (যদি আগে থেকে র‍্যাপ না করা থাকে)
            if (!$input.parent().hasClass('fit-qty-wrapper')) {
                $input.wrap('<div class="fit-qty-wrapper"></div>');
            }

            var $wrapper = $qty.find('.fit-qty-wrapper');

            // পরিষ্কারভাবে [ - ] [ Input ] [ + ] বসানো
            $wrapper.prepend('<button type="button" class="fit-qty-btn fit-qty-minus">-</button>');
            $wrapper.append('<button type="button" class="fit-qty-btn fit-qty-plus">+</button>');
        });
    }

    // পেজ লোডে রান হবে
    initQtyButtons();

    // ভ্যারিয়েশন চেঞ্জ হলে বা AJAX আপডেট হলে আবার রান হবে
    $(document).on('updated_wc_div woocommerce_variation_has_changed', function() {
        setTimeout(initQtyButtons, 50);
    });

    // মাইনাস (-) ক্লিক
    $(document).on('click', '.fit-qty-minus', function(e) {
        e.preventDefault();
        var $input = $(this).closest('.fit-qty-wrapper').find('input.qty');
        var val = parseFloat($input.val()) || 0;
        var min = parseFloat($input.attr('min')) || 1;
        if(val > min) {
            $input.val(val - 1).trigger('change');
        }
    });

    // প্লাস (+) ক্লিক
    $(document).on('click', '.fit-qty-plus', function(e) {
        e.preventDefault();
        var $input = $(this).closest('.fit-qty-wrapper').find('input.qty');
        var val = parseFloat($input.val()) || 0;
        var max = parseFloat($input.attr('max'));
        if(max && val >= max) return; 
        $input.val(val + 1).trigger('change');
    });

});