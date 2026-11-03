<?php
/* Template Name: Contact V2.5 */
get_header(); ?>

<style>
/* =========================================================
   PREMIUM CONTACT PAGE V2.5
   ========================================================= */
body.page-template-page-contact {
    background-color: #F8F9FA !important;
}

.fit-contact-v25-wrapper {
    max-width: 1240px !important;
    margin: 40px auto !important;
    padding: 0 20px !important;
    box-sizing: border-box !important;
}

.fit-contact-v25-header {
    text-align: center !important;
    margin-bottom: 60px !important;
}
.fit-contact-v25-header h1 {
    font-size: 2.8rem !important;
    font-weight: 800 !important;
    color: #102A35 !important;
    margin-bottom: 15px !important;
    letter-spacing: -0.5px !important;
}
.fit-contact-v25-header p {
    font-size: 1.15rem !important;
    color: #6C757D !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    line-height: 1.6 !important;
}

.fit-contact-v25-layout {
    display: grid !important;
    grid-template-columns: 1fr 1.25fr !important;
    gap: 40px !important;
    align-items: start !important;
}

/* Left Column: Info & WhatsApp */
.fit-contact-v25-info-col {
    display: flex !important;
    flex-direction: column !important;
    gap: 25px !important;
}

.fit-contact-v25-card {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 16px !important;
    padding: 35px !important;
    box-shadow: 0 4px 20px rgba(16,42,53,0.03) !important;
}

.fit-contact-v25-item {
    display: flex !important;
    gap: 20px !important;
    margin-bottom: 25px !important;
    align-items: flex-start !important;
}
.fit-contact-v25-item:last-child {
    margin-bottom: 0 !important;
}

.fit-contact-v25-icon {
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

.fit-contact-v25-text strong {
    display: block !important;
    font-size: 1.05rem !important;
    color: #102A35 !important;
    margin-bottom: 4px !important;
    font-weight: 700 !important;
}
.fit-contact-v25-text span {
    display: block !important;
    color: #6C757D !important;
    font-size: 0.95rem !important;
    line-height: 1.5 !important;
}

/* WhatsApp CTA */
.fit-contact-v25-wa-btn {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    width: 100% !important;
    padding: 16px !important;
    background: #25D366 !important;
    color: #fff !important;
    font-weight: 700 !important;
    border-radius: 12px !important;
    text-decoration: none !important;
    transition: all 0.25s ease !important;
    box-shadow: 0 4px 15px rgba(37,211,102,0.3) !important;
}
.fit-contact-v25-wa-btn:hover {
    background: #1EBE5B !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 25px rgba(37,211,102,0.4) !important;
    color: #fff !important;
}

/* Right Column: Form */
.fit-contact-v25-form-card {
    background: #FFFFFF !important;
    border: 1px solid #EAEAEA !important;
    border-radius: 16px !important;
    padding: 45px !important;
    box-shadow: 0 8px 30px rgba(16,42,53,0.06) !important;
    position: relative !important;
}

/* Badge */
.fit-contact-v25-badge {
    display: inline-block !important;
    background: rgba(0,168,150,0.1) !important;
    color: #00A896 !important;
    padding: 6px 14px !important;
    border-radius: 20px !important;
    font-size: 0.8rem !important;
    font-weight: 700 !important;
    margin-bottom: 15px !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

.fit-contact-v25-form-card h3 {
    font-size: 1.6rem !important;
    color: #102A35 !important;
    margin-bottom: 10px !important;
    font-weight: 800 !important;
}
.fit-contact-v25-form-desc {
    color: #6C757D !important;
    font-size: 0.95rem !important;
    margin-bottom: 30px !important;
    padding-bottom: 20px !important;
    border-bottom: 1px solid #F1F5F9 !important;
}

/* Form Fields */
.fit-contact-v25-form-card .fit-form-group {
    margin-bottom: 20px !important;
}
.fit-contact-v25-form-card label {
    display: block !important;
    margin-bottom: 8px !important;
    font-weight: 600 !important;
    color: #102A35 !important;
    font-size: 0.9rem !important;
}
.fit-contact-v25-form-card input,
.fit-contact-v25-form-card textarea {
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
.fit-contact-v25-form-card textarea {
    height: auto !important;
    min-height: 140px !important;
    padding: 18px !important;
}
.fit-contact-v25-form-card input:focus,
.fit-contact-v25-form-card textarea:focus {
    outline: none !important;
    background: #FFFFFF !important;
    border-color: #00A896 !important;
    box-shadow: 0 0 0 3px rgba(0,168,150,0.15) !important;
}

/* Submit Button */
.fit-contact-v25-submit {
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
.fit-contact-v25-submit:hover {
    background: #102A35 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 15px rgba(16,42,53,0.2) !important;
}

/* Success/Error Msg */
.fit-contact-v25-form-card .fit-form-msg {
    margin-top: 15px !important;
    padding: 12px !important;
    border-radius: 6px !important;
    text-align: center !important;
    font-weight: 600 !important;
    display: none;
}

/* Responsive */
@media (max-width: 992px) {
    .fit-contact-v25-layout {
        grid-template-columns: 1fr !important;
    }
    .fit-contact-v25-form-card {
        padding: 30px !important;
    }
}
</style>

<div class="fit-contact-v25-wrapper">
    <div class="fit-contact-v25-header">
        <h1>Get in Touch</h1>
        <p>We are here to help. Reach out to us for any product or service inquiries.</p>
    </div>

    <div class="fit-contact-v25-layout">
        <!-- Left: Info -->
        <div class="fit-contact-v25-info-col">
            <div class="fit-contact-v25-card">
                <div class="fit-contact-v25-item">
                    <div class="fit-contact-v25-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <div class="fit-contact-v25-text">
                        <strong>Business Address</strong>
                        <span>Baigartek, Sagupta R/A, Pallabi, Mirpur 12, Dhaka, Bangladesh.</span>
                    </div>
                </div>
                <div class="fit-contact-v25-item">
                    <div class="fit-contact-v25-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div class="fit-contact-v25-text">
                        <strong>Phone / WhatsApp</strong>
                        <span>01608630784</span>
                    </div>
                </div>
                <div class="fit-contact-v25-item">
                    <div class="fit-contact-v25-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div class="fit-contact-v25-text">
                        <strong>Email Support</strong>
                        <span>fixibleit@gmail.com</span>
                    </div>
                </div>
                <div class="fit-contact-v25-item">
                    <div class="fit-contact-v25-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div class="fit-contact-v25-text">
                        <strong>Business Hours</strong>
                        <span>10:00 AM - 10:00 PM (Everyday)</span>
                    </div>
                </div>
            </div>
            
            <!-- WhatsApp CTA Button -->
            <a href="https://wa.me/8801608630784" target="_blank" class="fit-contact-v25-wa-btn">
                <svg width="24" height="24" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <path d="M16 0C7.163 0 0 7.163 0 16c0 2.825.736 5.482 2.024 7.787L0 32l8.482-2.222A15.91 15.91 0 0 0 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333c-2.633 0-5.103-.76-7.17-2.072l-.515-.318-5.328 1.396 1.422-5.193-.336-.535A13.27 13.27 0 0 1 2.667 16c0-7.36 5.973-13.333 13.333-13.333S29.333 8.64 29.333 16 23.36 29.333 16 29.333z"/>
                    <path d="M23.837 19.58c-.41-.205-2.426-1.197-2.802-1.334-.376-.136-.65-.205-.924.205-.275.41-1.062 1.334-1.302 1.608-.24.274-.48.308-.89.103-.41-.205-1.73-.638-3.295-2.034-1.218-1.087-2.04-2.428-2.28-2.838-.24-.41-.026-.632.18-.836.184-.184.41-.48.616-.72.205-.24.274-.41.41-.684.137-.274.068-.513-.034-.718-.103-.205-.924-2.223-1.266-3.044-.333-.8-.672-.692-.924-.705-.24-.012-.513-.014-.788-.014-.274 0-.718.103-1.094.513-.376.41-1.436 1.402-1.436 3.42 0 2.017 1.47 3.966 1.676 4.24.205.274 2.893 4.417 7.01 6.195.98.423 1.745.676 2.343.866.985.313 1.88.268 2.588.163.79-.117 2.426-.992 2.768-1.95.342-.958.342-1.78.24-1.95-.103-.172-.376-.275-.786-.48z"/>
                </svg>
                Chat on WhatsApp
            </a>
        </div>

        <!-- Right: Form -->
        <div class="fit-contact-v25-form-card">
            <div class="fit-contact-v25-badge">Quick Response</div>
            <h3>Send a Message</h3>
            <p class="fit-contact-v25-form-desc">Fill out the form below and our team will get back to you within 2-4 hours.</p>
            
            <div class="fit-service-form-wrap">
                <!-- IMPORTANT: Preserved all existing classes and attributes -->
                <form class="fit-service-form" data-service="Contact Form">
                    <div class="fit-form-group">
                        <label>Your Name *</label>
                        <input type="text" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="fit-form-group">
                        <label>Mobile Number *</label>
                        <input type="tel" name="phone" placeholder="017XXXXXXXX" required>
                    </div>
                    <div class="fit-form-group">
                        <label>Message *</label>
                        <textarea name="requirements" rows="5" placeholder="How can we help you?" required></textarea>
                    </div>
                    <button type="submit" class="fit-contact-v25-submit">Send Message</button>
                    <div class="fit-form-msg"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>