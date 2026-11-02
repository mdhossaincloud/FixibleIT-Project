<?php
/* Template Name: Support Portal */
get_header(); ?>

<style>
.fit-support-wrapper { max-width: 1140px !important; margin: 40px auto !important; padding: 0 20px !important; }
.fit-support-header { text-align: center !important; margin-bottom: 50px !important; }
.fit-support-header h1 { font-size: 2.5rem !important; font-weight: 800 !important; color: #102A35 !important; margin-bottom: 10px !important; }
.fit-support-header p { font-size: 1.1rem !important; color: #6C757D !important; max-width: 600px !important; margin: 0 auto !important; }

.fit-support-layout { display: grid !important; grid-template-columns: 1fr 1.4fr !important; gap: 40px !important; align-items: start !important; }
.fit-support-info-col { display: flex !important; flex-direction: column !important; gap: 20px !important; }
.fit-support-card {
    background: #FFFFFF !important; border: 1px solid #EAEAEA !important; border-radius: 12px !important;
    padding: 30px !important; box-shadow: 0 4px 15px rgba(16,42,53,0.03) !important; transition: all 0.3s ease !important;
}
.fit-support-card:hover { transform: translateY(-3px) !important; box-shadow: 0 10px 25px rgba(16,42,53,0.06) !important; border-color: #00A896 !important; }
.fit-support-card h3 { font-size: 1.2rem !important; color: #102A35 !important; margin-bottom: 20px !important; border-bottom: 2px solid #F8F9FA !important; padding-bottom: 12px !important; }
.fit-support-item { display: flex !important; gap: 15px !important; margin-bottom: 20px !important; align-items: flex-start !important; }
.fit-support-icon { width: 40px !important; height: 40px !important; background: rgba(0,168,150,0.1) !important; color: #00A896 !important; border-radius: 8px !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 1.2rem !important; flex-shrink: 0 !important; }
.fit-support-text strong { display: block !important; font-size: 1rem !important; color: #102A35 !important; margin-bottom: 2px !important; }
.fit-support-text span { display: block !important; color: #6C757D !important; font-size: 0.9rem !important; }

.fit-support-form-card { background: #FFFFFF !important; border: 1px solid #EAEAEA !important; border-radius: 12px !important; padding: 40px !important; box-shadow: 0 4px 15px rgba(16,42,53,0.03) !important; }
.fit-support-form-card h3 { font-size: 1.4rem !important; color: #102A35 !important; margin-bottom: 25px !important; }

@media (max-width: 992px) { .fit-support-layout { grid-template-columns: 1fr !important; } }
</style>

<div class="fit-support-wrapper">
    <div class="fit-support-header">
        <h1>Technical Support Portal</h1>
        <p>Submit a ticket and our L1/L2 engineers will assist you. We typically respond within 2-4 business hours.</p>
    </div>

    <div class="fit-support-layout">
        <!-- Left: Info -->
        <div class="fit-support-info-col">
            <div class="fit-support-card">
                <h3>Contact Channels</h3>
                <div class="fit-support-item">
                    <div class="fit-support-icon">✉️</div>
                    <div class="fit-support-text">
                        <strong>Email Support</strong>
                        <span>fixibleit@gmail.com</span>
                    </div>
                </div>
                <div class="fit-support-item">
                    <div class="fit-support-icon">📞</div>
                    <div class="fit-support-text">
                        <strong>WhatsApp / Call</strong>
                        <span>01608630784</span>
                    </div>
                </div>
                <div class="fit-support-item">
                    <div class="fit-support-icon">🕒</div>
                    <div class="fit-support-text">
                        <strong>Support Hours</strong>
                        <span>10:00 AM - 10:00 PM</span>
                    </div>
                </div>
            </div>

            <div class="fit-support-card" style="background:#F8F9FA !important;">
                <h3 style="border:none; margin-bottom:10px;">Track Your Ticket</h3>
                <p style="color:#6C757D; font-size:0.9rem; margin-bottom:15px;">Already have a ticket? Check the current status of your support request.</p>
                <a href="/track-order/" class="fit-btn fit-btn-navy" style="width: 100%; text-align: center; padding: 12px; background:#102A35 !important; border-radius:8px; color:#fff; font-weight:600; text-decoration:none;">Track Status</a>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="fit-support-form-card">
            <h3>Submit a Support Ticket</h3>
            <div id="fit-support-container">
                <form id="fit-support-form" class="fit-service-form">
                    <div class="fit-form-group" style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Full Name *</label>
                        <input type="text" id="sup-name" style="width:100%; height:50px; padding:0 15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA;" placeholder="Your name" required>
                    </div>
                    <div class="fit-form-group" style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Phone Number *</label>
                        <input type="tel" id="sup-phone" style="width:100%; height:50px; padding:0 15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA;" placeholder="017XXXXXXXX" required>
                    </div>
                    <div class="fit-form-group" style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Subject *</label>
                        <input type="text" id="sup-subject" style="width:100%; height:50px; padding:0 15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA;" placeholder="Short description of the issue" required>
                    </div>
                    <div class="fit-form-group" style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Priority</label>
                        <select id="sup-priority" style="width:100%; height:50px; padding:0 15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA; color:#102A35;">
                            <option value="Low">Low - General Inquiry</option>
                            <option value="Medium" selected>Medium - Software/Hardware Issue</option>
                            <option value="High (Urgent)">High - Business Critical</option>
                        </select>
                    </div>
                    <div class="fit-form-group" style="margin-bottom:25px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Describe the Issue *</label>
                        <textarea id="sup-desc" rows="5" style="width:100%; padding:15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA;" placeholder="Please provide as much detail as possible..." required></textarea>
                    </div>
                    <button type="submit" class="fit-btn fit-btn-primary" id="fit-support-btn" style="width:100%; padding:16px; font-size:1.05rem; background:#00A896 !important; border:none; border-radius:8px; color:#fff; font-weight:700; cursor:pointer;">Submit Ticket</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>