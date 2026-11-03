<?php
/* Template Name: Support Portal V2 */
get_header(); ?>

<style>
/* =========================================================
   PREMIUM SUPPORT PORTAL V2
   ========================================================= */
body.page-template-page-support {
    background-color: #F8F9FA !important;
}

.fit-support-v2-wrapper {
    max-width: 1240px !important;
    margin: 40px auto !important;
    padding: 0 20px !important;
    box-sizing: border-box !important;
}

.fit-support-v2-header {
    text-align: center !important;
    margin-bottom: 60px !important;
}
.fit-support-v2-header h1 {
    font-size: 2.8rem !important;
    font-weight: 800 !important;
    color: #102A35 !important;
    margin-bottom: 15px !important;
    letter-spacing: -0.5px !important;
}
.fit-support-v2-header p {
    font-size: 1.15rem !important;
    color: #6C757D !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    line-height: 1.6 !important;
}

.fit-support-v2-layout {
    display: grid !important;
    grid-template-columns: 1fr 1.4fr !important;
    gap: 40px !important;
    align-items: start !important;
}

/* Left Column: Info Cards */
.fit-support-v2-info-col {
    display: flex !important;
    flex-direction: column !important;
    gap: 25px !important;
}

.fit-support-v2-card {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 16px !important;
    padding: 35px !important;
    box-shadow: 0 4px 20px rgba(16,42,53,0.03) !important;
}
.fit-support-v2-card h3 {
    font-size: 1.3rem !important;
    color: #102A35 !important;
    margin-bottom: 25px !important;
    font-weight: 700 !important;
    padding-bottom: 15px !important;
    border-bottom: 2px solid #F1F5F9 !important;
}

.fit-support-v2-item {
    display: flex !important;
    gap: 20px !important;
    margin-bottom: 25px !important;
    align-items: flex-start !important;
}
.fit-support-v2-item:last-child {
    margin-bottom: 0 !important;
}
.fit-support-v2-icon {
    width: 48px !important;
    height: 48px !important;
    background: rgba(0,168,150,0.1) !important;
    color: #00A896 !important;
    border-radius: 12px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-shrink: 0 !important;
}
.fit-support-v2-text strong {
    display: block !important;
    font-size: 1.05rem !important;
    color: #102A35 !important;
    margin-bottom: 4px !important;
    font-weight: 700 !important;
}
.fit-support-v2-text span {
    display: block !important;
    color: #6C757D !important;
    font-size: 0.95rem !important;
    line-height: 1.5 !important;
}

/* Track Ticket Card */
.fit-support-v2-track-card {
    background: #102A35 !important;
    border: none !important;
    color: #fff !important;
}
.fit-support-v2-track-card h3 {
    color: #fff !important;
    border-bottom-color: rgba(255,255,255,0.1) !important;
}
.fit-support-v2-track-card p {
    color: #9CA3AF !important;
    font-size: 0.95rem !important;
    margin-bottom: 25px !important;
    line-height: 1.6 !important;
}
.fit-support-v2-track-btn {
    display: block !important;
    width: 100% !important;
    text-align: center !important;
    padding: 14px !important;
    background: #00A896 !important;
    color: #fff !important;
    font-weight: 700 !important;
    border-radius: 8px !important;
    text-decoration: none !important;
    transition: background 0.25s ease !important;
}
.fit-support-v2-track-btn:hover {
    background: #007A6D !important;
}

/* Right Column: Form Card */
.fit-support-v2-form-card {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 16px !important;
    padding: 45px !important;
    box-shadow: 0 8px 30px rgba(16,42,53,0.06) !important;
}
.fit-support-v2-form-card h3 {
    font-size: 1.5rem !important;
    color: #102A35 !important;
    margin-bottom: 10px !important;
    font-weight: 800 !important;
}
.fit-support-v2-form-desc {
    color: #6C757D !important;
    font-size: 0.95rem !important;
    margin-bottom: 30px !important;
    padding-bottom: 20px !important;
    border-bottom: 1px solid #F1F5F9 !important;
}

/* Form Fields Override */
.fit-support-v2-form-card .fit-form-group {
    margin-bottom: 20px !important;
}
.fit-support-v2-form-card label {
    display: block !important;
    margin-bottom: 8px !important;
    font-weight: 600 !important;
    color: #102A35 !important;
    font-size: 0.9rem !important;
}
.fit-support-v2-form-card input,
.fit-support-v2-form-card select,
.fit-support-v2-form-card textarea {
    width: 100% !important;
    height: 52px !important;
    padding: 0 18px !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 8px !important;
    background: #F8FAFC !important;
    color: #102A35 !important;
    font-size: 0.95rem !important;
    transition: all 0.2s ease !important;
    box-sizing: border-box !important;
}
.fit-support-v2-form-card textarea {
    height: auto !important;
    min-height: 140px !important;
    padding: 18px !important;
}
.fit-support-v2-form-card input:focus,
.fit-support-v2-form-card select:focus,
.fit-support-v2-form-card textarea:focus {
    outline: none !important;
    background: #FFFFFF !important;
    border-color: #00A896 !important;
    box-shadow: 0 0 0 3px rgba(0,168,150,0.15) !important;
}

/* Submit Button */
.fit-support-v2-submit {
    width: 100% !important;
    padding: 16px !important;
    background: #00A896 !important;
    color: #fff !important;
    font-size: 1.05rem !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.05em !important;
    border: none !important;
    border-radius: 8px !important;
    cursor: pointer !important;
    transition: all 0.25s ease !important;
    margin-top: 10px !important;
}
.fit-support-v2-submit:hover {
    background: #102A35 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 15px rgba(16,42,53,0.2) !important;
}

/* Responsive */
@media (max-width: 992px) {
    .fit-support-v2-layout {
        grid-template-columns: 1fr !important;
    }
    .fit-support-v2-form-card {
        padding: 30px !important;
    }
}
</style>

<div class="fit-support-v2-wrapper">
    <div class="fit-support-v2-header">
        <h1>Technical Support Portal</h1>
        <p>Submit a ticket and our L1/L2 engineers will assist you. We typically respond within 2-4 business hours.</p>
    </div>

    <div class="fit-support-v2-layout">
        <!-- Left: Info -->
        <div class="fit-support-v2-info-col">
            <div class="fit-support-v2-card">
                <h3>Contact Channels</h3>
                <div class="fit-support-v2-item">
                    <div class="fit-support-v2-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div class="fit-support-v2-text">
                        <strong>Email Support</strong>
                        <span>fixibleit@gmail.com</span>
                    </div>
                </div>
                <div class="fit-support-v2-item">
                    <div class="fit-support-v2-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div class="fit-support-v2-text">
                        <strong>WhatsApp / Call</strong>
                        <span>01608630784</span>
                    </div>
                </div>
                <div class="fit-support-v2-item">
                    <div class="fit-support-v2-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div class="fit-support-v2-text">
                        <strong>Support Hours</strong>
                        <span>10:00 AM - 10:00 PM</span>
                    </div>
                </div>
            </div>

            <div class="fit-support-v2-card fit-support-v2-track-card">
                <h3>Track Your Ticket</h3>
                <p>Already have a ticket? Check the current status of your support request.</p>
                <a href="/track-order/" class="fit-support-v2-track-btn">Track Status</a>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="fit-support-v2-form-card">
            <h3>Submit a Support Ticket</h3>
            <p class="fit-support-v2-form-desc">Please fill out the form below with your issue details. Our team will get back to you shortly.</p>
            
            <div id="fit-support-container">
                <!-- Important: Keeping all IDs and removing duplicate class -->
                <form id="fit-support-form">
                    <div class="fit-form-group">
                        <label>Full Name *</label>
                        <input type="text" id="sup-name" placeholder="Your name" required>
                    </div>
                    <div class="fit-form-group">
                        <label>Phone Number *</label>
                        <input type="tel" id="sup-phone" placeholder="017XXXXXXXX" required>
                    </div>
                    <div class="fit-form-group">
                        <label>Subject *</label>
                        <input type="text" id="sup-subject" placeholder="Short description of the issue" required>
                    </div>
                    <div class="fit-form-group">
                        <label>Priority</label>
                        <select id="sup-priority">
                            <option value="Low">Low - General Inquiry</option>
                            <option value="Medium" selected>Medium - Software/Hardware Issue</option>
                            <option value="High (Urgent)">High - Business Critical</option>
                        </select>
                    </div>
                    <div class="fit-form-group">
                        <label>Describe the Issue *</label>
                        <textarea id="sup-desc" rows="5" placeholder="Please provide as much detail as possible..." required></textarea>
                    </div>
                    <button type="submit" id="fit-support-btn" class="fit-support-v2-submit">Submit Ticket</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>