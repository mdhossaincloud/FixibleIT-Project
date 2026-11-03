<?php
/* Template Name: Fixible PC Builder Dropdown */
get_header(); ?>

<style>
/* =========================================================
   PREMIUM PC BUILDER V2 (Compact Dropdown UI)
   ========================================================= */
body.page-template-page-pc-builder {
    background-color: #F8F9FA !important;
}

.fit-pcb-wrapper {
    max-width: 1280px !important;
    margin: 40px auto !important;
    padding: 0 20px !important;
    width: 100% !important;
    box-sizing: border-box !important;
}

.fit-pcb-header {
    text-align: center !important;
    margin-bottom: 40px !important;
}
.fit-pcb-header h1 {
    font-size: 2.4rem !important;
    font-weight: 800 !important;
    color: #102A35 !important;
    margin-bottom: 10px !important;
}
.fit-pcb-header p {
    font-size: 1.1rem !important;
    color: #6C757D !important;
    max-width: 600px !important;
    margin: 0 auto !important;
}

/* Flex Layout */
.fit-pcb-layout {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    gap: 30px !important;
    align-items: flex-start !important;
    width: 100% !important;
}

/* Left Column: Steps */
.fit-pcb-steps {
    flex: 1 1 0% !important;
    min-width: 0 !important;
}

/* Step Card */
.fit-pcb-step-card {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 12px !important;
    margin-bottom: 20px !important;
    box-shadow: 0 2px 10px rgba(16,42,53,0.03) !important;
    transition: border-color 0.2s ease, box-shadow 0.2s ease !important;
}
.fit-pcb-step-card:hover {
    border-color: #00A896 !important;
    box-shadow: 0 4px 15px rgba(0,168,150,0.08) !important;
}

/* Step Header */
.fit-pcb-step-header {
    display: flex !important;
    align-items: center !important;
    gap: 15px !important;
    padding: 18px 20px !important;
    border-bottom: 1px solid #F3F4F6 !important;
    background: #FAFAFA !important;
    border-radius: 12px 12px 0 0 !important;
}
.fit-pcb-step-num {
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
.fit-pcb-step-header img {
    width: 24px !important;
    height: 24px !important;
    object-fit: contain !important;
    opacity: 0.8 !important;
}
.fit-pcb-step-header h3 {
    margin: 0 !important;
    font-size: 1.1rem !important;
    font-weight: 700 !important;
    color: #102A35 !important;
}

/* Step Body */
.fit-pcb-step-body {
    padding: 20px !important;
}

/* Select Row */
.fit-pcb-select-row {
    display: flex !important;
    gap: 12px !important;
    margin-bottom: 12px !important;
    align-items: center !important;
}

/* Premium Dropdown */
.fit-pc-select {
    width: 100% !important;
    height: 50px !important;
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

/* Buttons */
.fit-pcb-add-btn, .fit-pcb-remove-btn {
    background: #FFFFFF !important;
    border: 1px solid #D1D5DB !important;
    color: #102A35 !important;
    padding: 0 16px !important;
    height: 50px !important;
    border-radius: 8px !important;
    font-weight: 600 !important;
    font-size: 0.9rem !important;
    cursor: pointer !important;
    transition: all 0.2s !important;
    white-space: nowrap !important;
}
.fit-pcb-add-btn {
    width: 100% !important;
    margin-top: 10px !important;
    background: #F8F9FA !important;
    border-style: dashed !important;
}
.fit-pcb-add-btn:hover {
    background: #E6F7F5 !important;
    border-color: #00A896 !important;
    color: #00A896 !important;
}
.fit-pcb-remove-btn:hover {
    background: #FEE2E2 !important;
    border-color: #EF4444 !important;
    color: #EF4444 !important;
}

/* Compatibility Message */
.fit-pc-compat-msg {
    margin-top: 10px !important;
    padding: 10px 15px !important;
    border-radius: 6px !important;
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    display: none;
}
.fit-pc-compat-error {
    background: #FEE2E2 !important; color: #991B1B !important; display: block !important;
}

/* Right Column: Summary */
.fit-pcb-summary {
    flex: 0 0 380px !important;
    width: 380px !important;
    position: sticky !important;
    top: 30px !important;
    background: #102A35 !important;
    border-radius: 16px !important;
    box-shadow: 0 10px 30px rgba(16,42,53,0.15) !important;
    padding: 30px !important;
    box-sizing: border-box !important;
    color: #ffffff !important;
}
.fit-pcb-summary h3 {
    font-size: 1.3rem !important;
    color: #ffffff !important;
    margin: 0 0 20px 0 !important;
    padding-bottom: 15px !important;
    border-bottom: 1px solid rgba(255,255,255,0.1) !important;
}

.fit-pcb-summary-list {
    max-height: 400px !important;
    overflow-y: auto !important;
    margin-bottom: 20px !important;
    padding-right: 10px !important;
}
.fit-pcb-summary-list::-webkit-scrollbar { width: 6px; }
.fit-pcb-summary-list::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 10px; }

.fit-pcb-summary-item {
    display: flex !important;
    justify-content: space-between !important;
    font-size: 0.9rem !important;
    padding: 10px 0 !important;
    border-bottom: 1px dashed rgba(255,255,255,0.1) !important;
    color: #D1D5DB !important;
}
.fit-pcb-summary-item span:last-child {
    font-weight: 600 !important;
    color: #ffffff !important;
}

.fit-pcb-total-row {
    display: flex !important;
    justify-content: space-between !important;
    font-size: 1.4rem !important;
    font-weight: 800 !important;
    color: #00A896 !important;
    padding: 20px 0 !important;
    border-top: 2px solid rgba(255,255,255,0.1) !important;
    margin-bottom: 20px !important;
}

.fit-pcb-save-btn {
    width: 100% !important;
    background: #00A896 !important;
    color: #FFF !important;
    padding: 18px !important;
    font-size: 1.1rem !important;
    font-weight: 700 !important;
    border: none !important;
    border-radius: 8px !important;
    cursor: pointer !important;
    transition: background 0.2s !important;
    text-transform: uppercase !important;
    letter-spacing: 0.05em !important;
}
.fit-pcb-save-btn:hover {
    background: #007A6D !important;
}

/* Modal */
.fit-pcb-modal {
    display: none;
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(16,42,53,0.8);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(4px);
}
.fit-pcb-modal.active { display: flex; }
.fit-pcb-modal-content {
    background: #FFF;
    width: 100%;
    max-width: 500px;
    padding: 30px;
    border-radius: 16px;
    position: relative;
    max-height: 90vh;
    overflow-y: auto;
}

/* Responsive */
@media (max-width: 992px) {
    .fit-pcb-layout {
        flex-direction: column !important;
        flex-wrap: wrap !important;
    }
    .fit-pcb-summary {
        flex: 1 1 100% !important;
        width: 100% !important;
        position: static !important;
    }
}
</style>

<div class="fit-pcb-wrapper">
    
    <div class="fit-pcb-header">
        <h1>Advanced PC Builder</h1>
        <p>Select components to see live pricing and check compatibility instantly.</p>
    </div>

    <div class="fit-pcb-layout">
        
        <!-- Left: Configuration Steps -->
        <div class="fit-pcb-steps">
            
            <?php 
            // Components array with Icons
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
                <div class="fit-pcb-step-card" data-step="<?php echo $data['id']; ?>">
                    <div class="fit-pcb-step-header">
                        <span class="fit-pcb-step-num"><?php echo $step_num; ?></span>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/<?php echo esc_attr($data['icon']); ?>" alt="<?php echo esc_attr($cat_name); ?>" onerror="this.style.display='none'">
                        <h3><?php echo $cat_name; ?></h3>
                    </div>
                    <div class="fit-pcb-step-body">
                        <div class="fit-multi-select-group" data-max="<?php echo $data['max']; ?>" id="group-<?php echo $data['id']; ?>">
                            
                            <div class="fit-pcb-select-row">
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
                                        $socket = get_post_meta(get_the_ID(), '_fit_socket', true) ?: $product->get_attribute('socket');
                                        $ram = get_post_meta(get_the_ID(), '_fit_ram_type', true) ?: $product->get_attribute('memory type');
                                        $wattage = get_post_meta(get_the_ID(), '_fit_wattage', true) ?: $product->get_attribute('wattage');
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
                                <button type="button" class="fit-pcb-remove-btn" style="display:none;">−</button>
                            </div>
                            
                            <?php if($is_multiple): ?>
                                <button type="button" class="fit-pcb-add-btn fit-add-more-btn" data-target="<?php echo $data['id']; ?>">+ Add Another <?php echo explode('(', $cat_name)[0]; ?></button>
                            <?php endif; ?>
                        </div>
                        
                        <?php if($data['id'] == 'mb' || $data['id'] == 'ram' || $data['id'] == 'psu'): ?>
                            <div class="fit-pc-compat-msg" id="msg-<?php echo $data['id']; ?>"></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
                $step_num++;
            endforeach; 
            ?>

        </div>

        <!-- Right: Sticky Summary -->
        <div class="fit-pcb-summary">
            <h3>Your Build</h3>
            <div class="fit-pcb-summary-list" id="fit-summary-list">
                <p style="color: #9CA3AF; font-style: italic; font-size: 0.9rem;">No components selected yet.</p>
            </div>
            <div class="fit-pcb-total-row">
                <span>Total:</span>
                <span id="fit-total-price">BDT 0</span>
            </div>
            <button class="fit-pcb-save-btn fit-save-build-btn">Request Quote</button>
        </div>
    </div>
</div>

<!-- Modal (Hidden by default) -->
<div id="fit-quote-modal" class="fit-pcb-modal">
    <div class="fit-pcb-modal-content">
        <span class="fit-modal-close" style="position:absolute; right:20px; top:20px; cursor:pointer; font-size:1.5rem;">&times;</span>
        <h2 style="font-size: 1.4rem; margin-bottom: 5px; color:#102A35;">Request Quotation</h2>
        <p style="color: #6C757D; font-size: 0.9rem; margin-bottom: 20px;">Review your configuration and submit your details.</p>
        
        <div id="fit-modal-recap" style="background: #F8F9FA; padding: 15px; border-radius: 8px; margin-bottom: 20px; max-height: 150px; overflow-y: auto; font-size: 0.9rem; color: #4B5563;"></div>

        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; font-size:0.9rem; color: #102A35;">Your Name *</label>
            <input type="text" id="fit-q-name" style="width:100%; height:44px; padding:0 15px; border:1px solid #ddd; border-radius:6px;" placeholder="e.g., Rahim Uddin" required>
        </div>
        <div style="margin-bottom:20px;">
            <label style="display:block; margin-bottom:5px; font-weight:600; font-size:0.9rem; color: #102A35;">Mobile Number *</label>
            <input type="tel" id="fit-q-phone" style="width:100%; height:44px; padding:0 15px; border:1px solid #ddd; border-radius:6px;" placeholder="017XXXXXXXX" required>
        </div>
        
        <button class="fit-pcb-save-btn" id="fit-submit-quote-btn" style="width:100%; padding:14px;">Submit Request</button>
        <p id="fit-quote-status" style="text-align:center; margin-top:15px; font-weight: 600; color:#00A896;"></p>
    </div>
</div>

<!-- JavaScript Logic (Preserved & Adapted for Dropdowns) -->
<script>
jQuery(document).ready(function($) {
    
    // Function to calculate total and update summary
    function updateSummary() {
        let total = 0;
        let summaryHtml = '';
        let modalRecap = '';
        let selectedBuild = {};

        $('.fit-multi-select-group').each(function() {
            let groupId = $(this).attr('id').replace('group-', '');
            let selectedItems = [];

            $(this).find('select').each(function() {
                let val = $(this).val();
                let name = $(this).find(':selected').data('name');
                let price = parseFloat($(this).find(':selected').data('price')) || 0;

                if(val !== '0' && val !== '' && name) {
                    total += price;
                    selectedItems.push(val);
                    
                    summaryHtml += `<div class="fit-pcb-summary-item"><span>${name}</span><span>BDT ${price.toLocaleString()}</span></div>`;
                    modalRecap += `<div style="padding:5px 0; border-bottom:1px solid #eee;">${name}</div>`;
                }
            });

            if(selectedItems.length > 0) {
                selectedBuild[groupId] = selectedItems;
            }
        });

        if(total === 0) {
            $('#fit-summary-list').html('<p style="color: #9CA3AF; font-style: italic; font-size: 0.9rem;">No components selected yet.</p>');
            $('#fit-modal-recap').html('<p style="text-align:center;">No components selected.</p>');
        } else {
            $('#fit-summary-list').html(summaryHtml);
            $('#fit-modal-recap').html(modalRecap);
        }

        $('#fit-total-price').text('BDT ' + total.toLocaleString('en-IN'));
        window.currentTotal = total;
        window.selectedBuild = selectedBuild;
    }

    // Handle Select Change
    $(document).on('change', '.fit-pc-select', function() {
        validateCompatibility();
        updateSummary();
    });

    // Compatibility Validation Logic
    function validateCompatibility() {
        // CPU -> Motherboard Check
        let cpuSocket = $('.fit-cpu-select').find(':selected').data('socket');
        let mbSocket = $('.fit-mb-select').find(':selected').data('socket');
        let mbMsg = $('#msg-mb');

        if(cpuSocket && mbSocket) {
            if(cpuSocket !== mbSocket) {
                mbMsg.text('Incompatible! CPU socket (' + cpuSocket + ') does not match Motherboard (' + mbSocket + ').').addClass('fit-pc-compat-error');
                $('.fit-mb-select').css('border-color', '#EF4444');
            } else {
                mbMsg.text('Compatible!').css({'background':'#D1FAE5', 'color':'#065F46', 'display':'block'}).removeClass('fit-pc-compat-error');
                $('.fit-mb-select').css('border-color', '#00A896');
            }
        } else {
            mbMsg.hide();
            $('.fit-mb-select').css('border-color', '#D1D5DB');
        }

        // Motherboard -> RAM Check
        let mbRam = $('.fit-mb-select').find(':selected').data('ram');
        let ramType = $('.fit-ram-select').find(':selected').data('ram');
        let ramMsg = $('#msg-ram');

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

    // Add More Row Logic
    $('.fit-add-more-btn').on('click', function() {
        let targetId = $(this).data('target');
        let group = $('#group-' + targetId);
        let max = parseInt(group.data('max'));
        let currentRows = group.find('.fit-pcb-select-row').length;

        if(currentRows >= max) {
            alert('You can only select up to ' + max + ' items for this category.');
            return;
        }

        let originalRow = group.find('.fit-pcb-select-row').first();
        let newRow = originalRow.clone();
        newRow.find('select').val('0');
        newRow.find('.fit-pcb-remove-btn').show();
        
        $(this).before(newRow);
    });

    // Remove Row Logic
    $(document).on('click', '.fit-pcb-remove-btn', function() {
        $(this).closest('.fit-pcb-select-row').remove();
        updateSummary();
    });

    // Modal Open
    $('.fit-save-build-btn').on('click', function() {
        let totalText = document.getElementById('fit-total-price').innerText;
        let numericString = totalText.replace(/[^0-9.]/g, ''); 
        let total = parseFloat(numericString) || 0;
        
        if(total === 0) { 
            alert('Please select at least one component before requesting a quote.'); 
            return; 
        }
        $('#fit-quote-modal').addClass('active');
    });

    // Modal Close
    $('.fit-modal-close').on('click', function() {
        $('#fit-quote-modal').removeClass('active');
    });

    // Submit Quote via AJAX
    $('#fit-submit-quote-btn').on('click', function() {
        let name = $('#fit-q-name').val();
        let phone = $('#fit-q-phone').val();
        if(!name || !phone) {
            alert('Please enter your name and phone number.');
            return;
        }

        let btn = $(this);
        btn.text('Submitting...').prop('disabled', true);

        $.ajax({
            url: fit_ajax.url,
            type: 'POST',
            data: {
                action: 'fit_submit_quote',
                _ajax_nonce: fit_ajax.nonce,
                name: name,
                phone: phone,
                build: window.selectedBuild,
                total: window.currentTotal
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