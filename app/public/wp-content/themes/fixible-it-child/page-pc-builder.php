<?php
/* Template Name: Fixible PC Builder */
get_header(); ?>

<style>
/* =========================================================
   PREMIUM PC BUILDER UI (Isolated & Bulletproof)
   ========================================================= */
body.page-template-page-pc-builder {
    background-color: #F8F9FA !important;
}

.fit-pc-wrapper {
    max-width: 1240px !important;
    margin: 40px auto !important;
    padding: 0 20px !important;
    width: 100% !important;
    box-sizing: border-box !important;
}

.fit-pc-header {
    text-align: center !important;
    margin-bottom: 40px !important;
}
.fit-pc-header h1 {
    font-size: 2.2rem !important;
    font-weight: 800 !important;
    color: #102A35 !important;
    margin-bottom: 10px !important;
}
.fit-pc-header p {
    font-size: 1.05rem !important;
    color: #6C757D !important;
    max-width: 600px !important;
    margin: 0 auto !important;
}

/* Flex Layout to prevent squishing */
.fit-pc-layout {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    gap: 30px !important;
    align-items: flex-start !important;
    width: 100% !important;
}

/* Left Column: Steps */
.fit-pc-steps {
    flex: 1 1 0% !important; /* Magic fix for shrinking */
    min-width: 0 !important;
}

.fit-pc-step-card {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 12px !important;
    margin-bottom: 16px !important;
    box-shadow: 0 2px 8px rgba(16,42,53,0.03) !important;
    transition: border-color 0.2s ease !important;
}
.fit-pc-step-card:hover {
    border-color: #00A896 !important;
}

.fit-pc-step-header {
    display: flex !important;
    align-items: center !important;
    gap: 15px !important;
    padding: 16px 20px !important;
    border-bottom: 1px solid #EAEAEA !important;
    background: #F8F9FA !important;
    border-radius: 12px 12px 0 0 !important;
}
.fit-pc-step-num {
    background: #102A35 !important;
    color: #FFF !important;
    width: 28px !important;
    height: 28px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 50% !important;
    font-size: 0.85rem !important;
    font-weight: 700 !important;
    flex-shrink: 0 !important;
}
.fit-pc-step-header h3 {
    margin: 0 !important;
    font-size: 1.1rem !important;
    font-weight: 700 !important;
    color: #102A35 !important;
}

.fit-pc-step-body {
    padding: 20px !important;
}

/* Form Elements */
.fit-pc-select {
    width: 100% !important;
    height: 52px !important;
    padding: 0 16px !important;
    border: 1px solid #D1D5DB !important;
    border-radius: 8px !important;
    background-color: #FFFFFF !important;
    color: #102A35 !important;
    font-size: 0.95rem !important;
    font-family: inherit !important;
    appearance: none !important;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236C757D'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: right 16px center !important;
    background-size: 18px !important;
    cursor: pointer !important;
    transition: border-color 0.2s, box-shadow 0.2s !important;
}
.fit-pc-select:focus {
    outline: none !important;
    border-color: #00A896 !important;
    box-shadow: 0 0 0 3px rgba(0,168,150,0.15) !important;
}
.fit-pc-select:disabled {
    background-color: #F3F4F6 !important;
    color: #9CA3AF !important;
    cursor: not-allowed !important;
}

.fit-pc-select-row {
    display: flex !important;
    gap: 10px !important;
    margin-bottom: 10px !important;
    align-items: center !important;
}

/* Buttons */
.fit-pc-add-btn, .fit-pc-remove-btn {
    background: #FFFFFF !important;
    border: 1px solid #D1D5DB !important;
    color: #102A35 !important;
    padding: 0 16px !important;
    height: 52px !important;
    border-radius: 8px !important;
    font-weight: 600 !important;
    font-size: 0.9rem !important;
    cursor: pointer !important;
    transition: all 0.2s !important;
    white-space: nowrap !important;
}
.fit-pc-add-btn {
    width: 100% !important;
    margin-top: 10px !important;
    background: #F8F9FA !important;
    border-style: dashed !important;
}
.fit-pc-add-btn:hover {
    background: #E6F7F5 !important;
    border-color: #00A896 !important;
    color: #00A896 !important;
}
.fit-pc-remove-btn:hover {
    background: #FEE2E2 !important;
    border-color: #EF4444 !important;
    color: #EF4444 !important;
}

.fit-pc-compat-msg {
    margin-top: 10px !important;
    padding: 10px !important;
    border-radius: 6px !important;
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    display: none;
}
.fit-pc-compat-error {
    background: #FEE2E2 !important; color: #991B1B !important; display: block !important;
}

/* Right Column: Summary (Sticky) */
.fit-pc-summary {
    flex: 0 0 380px !important; /* Fixed width prevents squishing */
    width: 380px !important;
    position: sticky !important;
    top: 30px !important;
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 12px !important;
    box-shadow: 0 8px 30px rgba(16,42,53,0.06) !important;
    padding: 25px !important;
    box-sizing: border-box !important;
}
.fit-pc-summary h3 {
    font-size: 1.2rem !important;
    color: #102A35 !important;
    margin: 0 0 20px 0 !important;
    padding-bottom: 15px !important;
    border-bottom: 1px solid #EAEAEA !important;
}

.fit-pc-summary-list {
    max-height: 400px !important;
    overflow-y: auto !important;
    margin-bottom: 20px !important;
}
.fit-pc-summary-item {
    display: flex !important;
    justify-content: space-between !important;
    font-size: 0.9rem !important;
    padding: 8px 0 !important;
    border-bottom: 1px dashed #EAEAEA !important;
    color: #4B5563 !important;
}
.fit-pc-summary-item span:last-child {
    font-weight: 600 !important;
    color: #102A35 !important;
}

.fit-pc-total-row {
    display: flex !important;
    justify-content: space-between !important;
    font-size: 1.3rem !important;
    font-weight: 800 !important;
    color: #00A896 !important;
    padding: 20px 0 !important;
    border-top: 2px solid #EAEAEA !important;
    margin-bottom: 20px !important;
}

.fit-pc-save-btn {
    width: 100% !important;
    background: #00A896 !important;
    color: #FFF !important;
    padding: 16px !important;
    font-size: 1.05rem !important;
    font-weight: 700 !important;
    border: none !important;
    border-radius: 8px !important;
    cursor: pointer !important;
    transition: background 0.2s !important;
    text-transform: uppercase !important;
    letter-spacing: 0.05em !important;
}
.fit-pc-save-btn:hover {
    background: #102A35 !important;
}

/* Modal */
.fit-pc-modal {
    display: none;
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(16,42,53,0.6);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}
.fit-pc-modal.active { display: flex; }
.fit-pc-modal-content {
    background: #FFF;
    width: 100%;
    max-width: 500px;
    padding: 30px;
    border-radius: 12px;
    position: relative;
    max-height: 90vh;
    overflow-y: auto;
}

/* Mobile */
@media (max-width: 992px) {
    .fit-pc-layout {
        flex-direction: column !important;
        flex-wrap: wrap !important;
    }
    .fit-pc-summary {
        flex: 1 1 100% !important;
        width: 100% !important;
        position: static !important;
    }
}
</style>

<div class="fit-pc-wrapper">
    
    <div class="fit-pc-header">
        <h1>Advanced PC Builder</h1>
        <p>Select your components. We verify compatibility and calculate the total instantly.</p>
    </div>

    <div class="fit-pc-layout">
        
        <!-- Left: Steps -->
        <div class="fit-pc-steps">
            
            <?php 
            // Added 'icon' key to the array
            $components = [
                'Processors (CPU)' => ['id' => 'cpu', 'max' => 1, 'icon' => 'icon-cpu.svg'],
                'Motherboards' => ['id' => 'mb', 'max' => 1, 'icon' => 'icon-motherboards.svg'],
                'Desktop & Laptop RAM' => ['id' => 'ram', 'max' => 4, 'icon' => 'icon-ram.svg'],
                'Graphics Cards (GPU)' => ['id' => 'gpu', 'max' => 1, 'icon' => 'icon-gpu.svg'],
                'Internal Storage (SSD / HDD)' => ['id' => 'storage', 'max' => 4, 'icon' => 'icon-hdd.svg'],
                'Power Supplies (PSU)' => ['id' => 'psu', 'max' => 1, 'icon' => 'icon-psu.svg'],
                'Casings' => ['id' => 'case', 'max' => 1, 'icon' => 'icon-casings.svg'],
                'CPU Coolers, Fans & Thermal' => ['id' => 'cooler', 'max' => 1, 'icon' => 'icon-cooler.svg'],
                'Monitors' => ['id' => 'monitor', 'max' => 3, 'icon' => 'icon-monitors.svg'],
                'Keyboards, Mice & Combos' => ['id' => 'peripherals', 'max' => 3, 'icon' => 'icon-keyboards-mouse.svg'],
                'UPS & Power Protection' => ['id' => 'ups', 'max' => 2, 'icon' => 'icon-ups.svg']
            ];

            $step_num = 1;
            foreach($components as $cat_name => $data) : 
                $is_multiple = $data['max'] > 1;
            ?>
                <div class="fit-pc-step-card" data-step="<?php echo $data['id']; ?>">
                    <div class="fit-pc-step-header">
                        <span class="fit-pc-step-num"><?php echo $step_num; ?></span>
                        
                        <!-- Added Icon Here -->
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/<?php echo esc_attr($data['icon']); ?>" alt="<?php echo esc_attr($cat_name); ?>" style="width: 24px; height: 24px; object-fit: contain;">
                        
                        <h3><?php echo $cat_name; ?></h3>
                    </div>
                    <div class="fit-pc-step-body">
                        <div class="fit-multi-select-group" data-max="<?php echo $data['max']; ?>" id="group-<?php echo $data['id']; ?>">
                            <div class="fit-pc-select-row">
                                <select class="fit-pc-select fit-<?php echo $data['id']; ?>-select" name="<?php echo $data['id']; ?>">
                                    <option value="0" data-name="" data-price="0">Select <?php echo $cat_name; ?></option>
                                    <?php
                                    $args = array(
                                        'post_type' => 'product', 
                                        'posts_per_page' => -1, 
                                        'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'name', 'terms' => $cat_name))
                                    );
                                    $q = new WP_Query($args);
                                    while($q->have_posts()) : $q->the_post(); global $product;
                                        $socket = get_post_meta(get_the_ID(), '_fit_socket', true);
                                        if(!$socket) { $socket = $product->get_attribute('socket'); }
                                        $ram = get_post_meta(get_the_ID(), '_fit_ram_type', true);
                                        if(!$ram) { $ram = $product->get_attribute('memory type'); }
                                        $wattage = get_post_meta(get_the_ID(), '_fit_wattage', true);
                                        if(!$wattage) { $wattage = $product->get_attribute('wattage'); }
                                        $price = $product->get_price(); 
                                        if(empty($price)) continue;
                                    ?>
                                        <option value="<?php echo esc_attr(get_the_ID()); ?>" 
                                                data-name="<?php echo esc_attr(get_the_title()); ?>" 
                                                data-socket="<?php echo esc_attr($socket); ?>" 
                                                data-ram="<?php echo esc_attr($ram); ?>" 
                                                data-wattage="<?php echo esc_attr($wattage); ?>" 
                                                data-price="<?php echo esc_attr($price); ?>">
                                            <?php echo esc_html(get_the_title()); ?> (BDT <?php echo number_format($price); ?>)
                                        </option>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </select>
                                <button type="button" class="fit-pc-remove-btn" style="display:none;">−</button>
                            </div>
                            <?php if($is_multiple): ?>
                                <button type="button" class="fit-pc-add-btn fit-add-more-btn" data-target="<?php echo $data['id']; ?>">+ Add More</button>
                            <?php endif; ?>
                        </div>
                        <?php if($data['id'] == 'mb' || $data['id'] == 'ram' || $data['id'] == 'psu'): ?>
                            <div class="fit-pc-compat-msg fit-compat-msg" id="msg-<?php echo $data['id']; ?>"></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
                $step_num++;
            endforeach; 
            ?>

            <!-- Extras -->
            <div class="fit-pc-step-card" data-step="extras">
                <div class="fit-pc-step-header">
                    <span class="fit-pc-step-num"><?php echo $step_num; ?></span>
                    <h3>Extra Components / Accessories</h3>
                </div>
                <div class="fit-pc-step-body">
                    <div class="fit-multi-select-group" data-max="5" id="group-extras">
                        <div class="fit-pc-select-row">
                            <select class="fit-pc-select fit-extras-select" name="extras[]">
                                <option value="0" data-name="" data-price="0">Select Additional Item</option>
                                <?php
                                $args_extras = array('post_type' => 'product', 'posts_per_page' => -1);
                                $q_extras = new WP_Query($args_extras);
                                while($q_extras->have_posts()) : $q_extras->the_post(); global $product;
                                    $price = $product->get_price(); 
                                    if(empty($price)) continue;
                                ?>
                                    <option value="<?php echo esc_attr(get_the_ID()); ?>" 
                                            data-name="<?php echo esc_attr(get_the_title()); ?>" 
                                            data-price="<?php echo esc_attr($price); ?>">
                                        <?php echo esc_html(get_the_title()); ?> (BDT <?php echo number_format($price); ?>)
                                    </option>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </select>
                            <button type="button" class="fit-pc-remove-btn" style="display:none;">−</button>
                        </div>
                        <button type="button" class="fit-pc-add-btn fit-add-more-btn" data-target="extras">+ Add More</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right: Sticky Summary -->
        <div class="fit-pc-summary">
            <h3>Build Summary</h3>
            <div class="fit-pc-summary-list" id="fit-summary-list">
                <p style="color: #6C757D; font-style: italic; font-size: 0.9rem;">No components selected yet.</p>
            </div>
            <div class="fit-pc-total-row">
                <span>Total:</span>
                <span id="fit-total-price">BDT 0</span>
            </div>
            <button class="fit-pc-save-btn fit-save-build-btn">Save & Request Quote</button>
        </div>
    </div>
</div>

<!-- Modal (Hidden by default) -->
<div id="fit-quote-modal" class="fit-pc-modal">
    <div class="fit-pc-modal-content">
        <span class="fit-modal-close" style="position:absolute; right:20px; top:20px; cursor:pointer; font-size:1.5rem;">&times;</span>
        <h2 style="font-size: 1.4rem; margin-bottom: 5px; color:#102A35;">Request Quotation</h2>
        <p style="color: #6C757D; font-size: 0.9rem; margin-bottom: 20px;">Review your configuration and submit your details.</p>
        
        <div id="fit-modal-recap" style="background: #F8F9FA; padding: 15px; border-radius: 8px; margin-bottom: 20px; max-height: 150px; overflow-y: auto; font-size: 0.9rem;"></div>

        <div class="fit-form-group" style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; font-size:0.9rem;">Your Name *</label>
            <input type="text" id="fit-q-name" style="width:100%; height:44px; padding:0 15px; border:1px solid #ddd; border-radius:6px;" placeholder="e.g., Rahim Uddin" required>
        </div>
        <div class="fit-form-group" style="margin-bottom:20px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; font-size:0.9rem;">Mobile Number *</label>
            <input type="tel" id="fit-q-phone" style="width:100%; height:44px; padding:0 15px; border:1px solid #ddd; border-radius:6px;" placeholder="017XXXXXXXX" required>
        </div>
        
        <button class="fit-pc-save-btn" id="fit-submit-quote-btn" style="width:100%; padding:14px;">Submit Request</button>
        <p id="fit-quote-status" style="text-align:center; margin-top:15px; font-weight: 600; color:#00A896;"></p>
    </div>
</div>

<!-- JavaScript (Unchanged Logic, updated selectors) -->
<script>
jQuery(document).ready(function($) {
    // Add More logic
    $('.fit-add-more-btn').on('click', function() {
        var target = $(this).data('target');
        var group = $('#group-' + target);
        var max = parseInt(group.data('max'));
        var currentRows = group.find('.fit-pc-select-row').length;
        
        if(currentRows >= max) {
            alert('You can only select up to ' + max + ' items for this category.');
            return;
        }

        var originalRow = group.find('.fit-pc-select-row').first();
        var newRow = originalRow.clone();
        newRow.find('select').val('0');
        newRow.find('button').show(); // Show remove button
        
        $(this).before(newRow);
    });

    // Remove Row logic
    $(document).on('click', '.fit-pc-remove-btn', function() {
        $(this).closest('.fit-pc-select-row').remove();
        calculateTotal();
    });

    // On select change
    $(document).on('change', '.fit-pc-select', function() {
        validateCompatibility();
        calculateTotal();
    });

    function validateCompatibility() {
        // CPU & MB Socket Check
        var cpuSocket = $('.fit-cpu-select').find(':selected').data('socket');
        var mbSocket = $('.fit-mb-select').find(':selected').data('socket');
        var mbMsg = $('#msg-mb');
        
        if(cpuSocket && mbSocket) {
            if(cpuSocket !== mbSocket) {
                mbMsg.text('Incompatible! CPU socket (' + cpuSocket + ') does not match Motherboard socket (' + mbSocket + ').').addClass('fit-pc-compat-error');
                $('.fit-mb-select').css('border-color', '#EF4444');
            } else {
                mbMsg.text('Compatible!').css({'background':'#D1FAE5', 'color':'#065F46', 'display':'block'}).removeClass('fit-pc-compat-error');
                $('.fit-mb-select').css('border-color', '#00A896');
            }
        } else {
            mbMsg.hide();
            $('.fit-mb-select').css('border-color', '#D1D5DB');
        }

        // MB & RAM Type Check
        var mbRam = $('.fit-mb-select').find(':selected').data('ram');
        var ramType = $('.fit-ram-select').find(':selected').data('ram');
        var ramMsg = $('#msg-ram');

        if(mbRam && ramType) {
            if(mbRam !== ramType) {
                ramMsg.text('Incompatible! Motherboard requires ' + mbRam + ' but selected RAM is ' + ramType + '.').addClass('fit-pc-compat-error');
                $('.fit-ram-select').css('border-color', '#EF4444');
            } else {
                ramMsg.text('Compatible!').css({'background':'#D1FAE5', 'color':'#065F46', 'display':'block'}).removeClass('fit-pc-compat-error');
                $('.fit-ram-select').css('border-color', '#00A896');
            }
        } else {
            ramMsg.hide();
            $('.fit-ram-select').css('border-color', '#D1D5DB');
        }
    }

    function calculateTotal() {
        var total = 0;
        var summaryHtml = '';
        var hasItems = false;

        $('.fit-multi-select-group').each(function() {
            $(this).find('select').each(function() {
                var price = parseFloat($(this).find(':selected').data('price')) || 0;
                var name = $(this).find(':selected').data('name');

                if(price > 0) {
                    hasItems = true;
                    total += price;
                    summaryHtml += '<div class="fit-pc-summary-item"><span>' + name + '</span><span>BDT ' + price.toLocaleString() + '</span></div>';
                }
            });
        });

        if(hasItems) {
            $('#fit-summary-list').html(summaryHtml);
        } else {
            $('#fit-summary-list').html('<p style="color: #6C757D; font-style: italic; font-size: 0.9rem;">No components selected yet.</p>');
        }
        $('#fit-total-price').text('BDT ' + total.toLocaleString());
    }

    // Modal Logic
    $('.fit-save-build-btn').on('click', function() {
        var recap = '';
        var build_data = {}; 
        
        $('.fit-multi-select-group').each(function() {
            var groupId = $(this).attr('id').replace('group-', '');
            var selectedItems = [];

            $(this).find('select').each(function() {
                var val = $(this).val();
                var name = $(this).find(':selected').data('name');
                if(val !== '0' && val !== '' && name) { 
                    recap += '<div style="padding:5px 0; border-bottom:1px solid #eee;">' + name + '</div>'; 
                    selectedItems.push(val);
                }
            });
            
            if(selectedItems.length > 0) {
                build_data[groupId] = selectedItems;
            }
        });
        
        if(!recap) {
            alert('Please select at least one component.');
            return;
        }

        $('#fit-modal-recap').html(recap);
        $('#fit-quote-modal').addClass('active');
    });

    $('.fit-modal-close').on('click', function() {
        $('#fit-quote-modal').removeClass('active');
    });

    // Submit Quote Ajax
    $('#fit-submit-quote-btn').on('click', function() {
        var name = $('#fit-q-name').val();
        var phone = $('#fit-q-phone').val();
        if(!name || !phone) {
            alert('Please enter your name and phone number.');
            return;
        }

        // Rebuild build_data to send
        var build_data = {}; 
        $('.fit-multi-select-group').each(function() {
            var groupId = $(this).attr('id').replace('group-', '');
            var selectedItems = [];
            $(this).find('select').each(function() {
                var val = $(this).val();
                if(val !== '0' && val !== '') { selectedItems.push(val); }
            });
            if(selectedItems.length > 0) { build_data[groupId] = selectedItems; }
        });

        var btn = $(this);
        btn.text('Submitting...').prop('disabled', true);

        $.ajax({
            url: fit_ajax.url,
            type: 'POST',
            data: {
                action: 'fit_submit_quote',
                _ajax_nonce: fit_ajax.nonce,
                name: name,
                phone: phone,
                build: build_data, // Now sends array data properly
                total: $('#fit-total-price').text().replace('BDT ', '').replace(/,/g, '')
            },
            success: function(response) {
                if(response.success) {
                    $('#fit-quote-status').html(response.data.html);
                    btn.hide();
                } else {
                    alert('Something went wrong.');
                    btn.text('Submit Request').prop('disabled', false);
                }
            }
        });
    });
});
</script>

<?php get_footer(); ?>