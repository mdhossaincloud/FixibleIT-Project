jQuery(document).ready(function($) {
    
    // ==========================================
    // 1. UTILITIES & NORMALIZATION
    // ==========================================
    function normalizeStr(str) {
        return str ? str.toString().toLowerCase().replace(/[^a-z0-9]/g, '') : '';
    }

    // ==========================================
    // 2. SUMMARY UPDATE
    // ==========================================
    function updateSummary() {
        let total = 0;
        let summaryHtml = '';
        let modalRecapHtml = '';
        let selectedComponents = {};
        
        $('.fit-select').each(function() {
            let val = $(this).val();
            if(val && val !== '0') {
                let name = $(this).find('option:selected').data('name');
                let price = parseFloat($(this).find('option:selected').data('price')) || 0;
                let groupLabel = $(this).closest('.fit-builder-step').find('h3').text().trim();
                
                total += price;
                
                if(!selectedComponents[groupLabel]) selectedComponents[groupLabel] = [];
                selectedComponents[groupLabel].push({ name: name, price: price });
                
                summaryHtml += `<div style="display:flex; justify-content:space-between; margin-bottom:8px; border-bottom:1px dashed #eee; padding-bottom:5px;"><span><strong>${groupLabel}:</strong><br>${name}</span> <span style="white-space:nowrap;">BDT ${price.toLocaleString()}</span></div>`;
                modalRecapHtml += `<div style="display:flex; justify-content:space-between; margin-bottom:5px;"><span>${name}</span> <span>BDT ${price.toLocaleString()}</span></div>`;
            }
        });
        
        if(total === 0) {
            $('#fit-summary-list').html('<p style="color: var(--fit-muted); font-style: italic;">No components selected yet.</p>');
            $('#fit-modal-recap').html('<p style="color: var(--fit-muted); font-style: italic; text-align:center;">No components selected.</p>');
        } else {
            $('#fit-summary-list').html(summaryHtml);
            $('#fit-modal-recap').html(modalRecapHtml);
        }
        
        $('#fit-total-price').text('BDT ' + total.toLocaleString('en-IN'));
        window.currentTotal = total;
        window.selectedBuild = selectedComponents;
    }

    // ==========================================
    // 3. COMPATIBILITY LOGIC
    // ==========================================
    $('.fit-cpu-select').on('change', function() {
        let cpuSocket = normalizeStr($(this).find('option:selected').data('socket'));
        $('.fit-mb-select').val('0').prop('disabled', true);
        $('#group-ram .fit-select').val('0').prop('disabled', true);
        $('#msg-mb, #msg-ram').html('');
        
        if(cpuSocket) {
            $('.fit-mb-select').prop('disabled', false);
            let matchFound = false;
            $('.fit-mb-select option').each(function() {
                if($(this).val() === '0') return;
                let mbSocket = normalizeStr($(this).data('socket'));
                if(!mbSocket || mbSocket === cpuSocket) { $(this).show(); if(mbSocket) matchFound = true; } else { $(this).hide(); }
            });
            $('#msg-mb').html(matchFound ? `<span style="color:var(--fit-teal); font-size:0.85rem;">✓ Showing compatible motherboards (${cpuSocket.toUpperCase()}).</span>` : `<span style="color:#f39c12; font-size:0.85rem;">⚠ No exact socket match. Showing unverified boards.</span>`);
        } else {
            $('.fit-mb-select').prop('disabled', false).find('option').show();
            $('#msg-mb').html(`<span style="color:#e63946; font-size:0.85rem;">CPU socket unknown. Compatibility cannot be verified.</span>`);
        }
        updateSummary();
    });

    $('.fit-mb-select').on('change', function() {
        let mbRam = normalizeStr($(this).find('option:selected').data('ram'));
        $('#group-ram .fit-select').val('0');
        $('#msg-ram').html('');
        
        if(mbRam) {
            $('#group-ram .fit-select').prop('disabled', false);
            let matchFound = false;
            $('#group-ram .fit-select option').each(function() {
                if($(this).val() === '0') return;
                let ramType = normalizeStr($(this).data('ram'));
                if(!ramType || ramType === mbRam) { $(this).show(); if(ramType) matchFound = true; } else { $(this).hide(); }
            });
            $('#msg-ram').html(matchFound ? `<span style="color:var(--fit-teal); font-size:0.85rem;">✓ Showing compatible RAM (${mbRam.toUpperCase()}).</span>` : `<span style="color:#f39c12; font-size:0.85rem;">⚠ No exact RAM match. Showing unverified.</span>`);
        } else {
            $('#group-ram .fit-select').prop('disabled', false).find('option').show();
            $('#msg-ram').html(`<span style="color:#e63946; font-size:0.85rem;">Motherboard RAM type unknown. Verification required.</span>`);
        }
        updateSummary();
    });

    $('.fit-psu-select').on('change', function() {
        let psuWattage = parseInt($(this).find('option:selected').data('wattage')) || 0;
        let requiredWattage = 450; 
        if($('.fit-gpu-select').val() !== '0') requiredWattage += 150;
        
        if(psuWattage > 0) {
            if(psuWattage >= requiredWattage) $('#msg-psu').html(`<span style="color:var(--fit-teal); font-size:0.85rem;">✓ ${psuWattage}W PSU is sufficient.</span>`);
            else $('#msg-psu').html(`<span style="color:#e63946; font-size:0.85rem;">⚠ Warning: ${psuWattage}W might be insufficient.</span>`);
        } else {
            $('#msg-psu').html(`<span style="color:#6c757d; font-size:0.85rem;">PSU wattage unverified.</span>`);
        }
        updateSummary();
    });

    $(document).on('change', '.fit-select', function() { updateSummary(); });

    // ==========================================
    // 4. ADD / REMOVE MULTI-SELECT
    // ==========================================
    $(document).on('click', '.fit-add-more-btn', function(e) {
        e.preventDefault();
        let group = $(this).closest('.fit-multi-select-group');
        let maxAllowed = parseInt(group.data('max'));
        let currentRows = group.find('.fit-select-row').length;
        
        if(currentRows >= maxAllowed) { alert('You can only add up to ' + maxAllowed + ' items here.'); return; }

        let lastRow = group.find('.fit-select-row').last();
        let newRow = lastRow.clone();
        newRow.find('.fit-select').val('0');
        newRow.find('.fit-remove-btn').show();
        newRow.insertBefore($(this));
        
        if(currentRows + 1 >= maxAllowed) $(this).hide();
    });

    $(document).on('click', '.fit-remove-btn', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to remove this component?')) {
            let group = $(this).closest('.fit-multi-select-group');
            $(this).closest('.fit-select-row').remove();
            
            let maxAllowed = parseInt(group.data('max'));
            let currentRows = group.find('.fit-select-row').length;
            if(currentRows < maxAllowed) group.find('.fit-add-more-btn').show();
            updateSummary();
        }
    });

    // ==========================================
    // 5. MODAL & QUOTE SUBMIT
    // ==========================================
    $('.fit-save-build-btn').on('click', function() {
        if(!window.currentTotal || window.currentTotal === 0) { alert('Please select components first.'); return; }
        $('#fit-quote-modal').css('display', 'flex');
    });
    $('.fit-modal-close').on('click', function() { $('#fit-quote-modal').hide(); });

    $('#fit-submit-quote-btn').on('click', function() {
        let btn = $(this); btn.text('Processing...').prop('disabled', true);
        $.ajax({
            url: fit_ajax.url, type: 'POST', dataType: 'json',
            data: { action: 'fit_submit_quote', _ajax_nonce: fit_ajax.nonce, name: $('#fit-q-name').val(), phone: $('#fit-q-phone').val(), build: window.selectedBuild, total: window.currentTotal }
        }).done(function(res) {
            if(res.success) $('.fit-modal-content').html(res.data.html + '<button class="fit-btn fit-btn-primary" style="width:100%; margin-top:20px;" onclick="location.reload()">Done</button>');
            else { alert(res.data.message || 'Error.'); btn.text('Submit Request').prop('disabled', false); }
        }).fail(function() { alert('Server Error.'); btn.text('Submit Request').prop('disabled', false); });
    });

    // ==========================================
    // 6. SERVICE FORM AJAX
    // ==========================================
    $(document).on('submit', '.fit-service-form', function(e) {
        e.preventDefault();
        let form = $(this); let btn = form.find('button[type="submit"]'); let msg = form.find('.fit-form-msg');
        btn.text('Submitting...').prop('disabled', true);
        $.ajax({
            url: fit_ajax.url, type: 'POST', dataType: 'json',
            data: { action: 'fit_submit_service', _ajax_nonce: fit_ajax.nonce, service_type: form.data('service'), name: form.find('input[name="name"]').val(), phone: form.find('input[name="phone"]').val(), company: form.find('input[name="company"]').val(), location: form.find('input[name="location"]').val(), requirements: form.find('textarea[name="requirements"]').val() }
        }).done(function(res) {
            if(res.success) form.parent('.fit-service-form-wrap').html(res.data.html);
            else { msg.html('<span style="color:red;">' + res.data.message + '</span>'); btn.text('Submit Enquiry').prop('disabled', false); }
        }).fail(function() { msg.html('<span style="color:red;">Server error.</span>'); btn.text('Submit Enquiry').prop('disabled', false); });
    });

    // ==========================================
    // 7. SUPPORT FORM AJAX
    // ==========================================
    $('#fit-support-form').on('submit', function(e) {
        e.preventDefault();
        let btn = $('#fit-support-btn'); btn.text('Submitting...').prop('disabled', true);
        $.ajax({
            url: fit_ajax.url, type: 'POST', dataType: 'json',
            data: { action: 'fit_submit_ticket', _ajax_nonce: fit_ajax.nonce, name: $('#sup-name').val(), phone: $('#sup-phone').val(), subject: $('#sup-subject').val(), priority: $('#sup-priority').val(), description: $('#sup-desc').val() }
        }).done(function(res) {
            if(res.success) $('#fit-support-container').html(res.data.html);
            else { alert('Error.'); btn.text('Submit Ticket').prop('disabled', false); }
        }).fail(function() { alert('Server error.'); btn.text('Submit Ticket').prop('disabled', false); });
    });

    // ==========================================
    // 8. TRACKING AJAX
    // ==========================================
    $('#fit-track-form').on('submit', function(e) {
        e.preventDefault();
        let btn = $(this).find('button');
        let ref = $('#track_ref').val();
        btn.text('Searching...').prop('disabled', true);
        $('#fit-track-result').html('<p style="text-align:center;">Loading...</p>');

        $.ajax({
            url: fit_ajax.url, type: 'POST', dataType: 'json',
            data: { action: 'fit_track_request', _ajax_nonce: fit_ajax.nonce, ref_no: ref }
        }).done(function(res) {
            if(res.success) {
                let html = `<div style="background:var(--fit-off-white); padding:20px; border-radius:8px; border:1px solid #eaeaea;">
                    <h3 style="color:var(--fit-teal-dark); margin-bottom:15px;">${res.data.type} Found</h3>
                    <p style="margin-bottom:8px;"><strong>Reference:</strong> ${ref}</p>
                    <p style="margin-bottom:8px;"><strong>Customer:</strong> ${res.data.name}</p>
                    <p style="margin-bottom:8px;"><strong>Date:</strong> ${res.data.date}</p>
                    <p style="margin-bottom:8px;"><strong>Status:</strong> <span style="background:var(--fit-teal); color:#fff; padding:3px 8px; border-radius:3px;">${res.data.status}</span></p>
                </div>`;
                $('#fit-track-result').html(html);
            } else {
                $('#fit-track-result').html('<p style="color:#e63946; text-align:center; font-weight:600;">' + res.data.message + '</p>');
            }
            btn.text('Track Now').prop('disabled', false);
        }).fail(function() {
            $('#fit-track-result').html('<p style="color:#e63946; text-align:center;">Server Error.</p>');
            btn.text('Track Now').prop('disabled', false);
        });
    });

});