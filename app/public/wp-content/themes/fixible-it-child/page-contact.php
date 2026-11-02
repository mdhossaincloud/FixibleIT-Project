<?php
/* Template Name: Contact */
get_header(); ?>

<style>
.fit-contact-wrapper { max-width: 1140px !important; margin: 40px auto !important; padding: 0 20px !important; }
.fit-contact-header { text-align: center !important; margin-bottom: 50px !important; }
.fit-contact-header h1 { font-size: 2.5rem !important; font-weight: 800 !important; color: #102A35 !important; margin-bottom: 10px !important; }
.fit-contact-header p { font-size: 1.1rem !important; color: #6C757D !important; }

.fit-contact-layout { display: grid !important; grid-template-columns: 1fr 1.3fr !important; gap: 40px !important; align-items: start !important; }
.fit-contact-info-col { display: flex !important; flex-direction: column !important; gap: 20px !important; }
.fit-contact-card {
    background: #FFFFFF !important; border: 1px solid #EAEAEA !important; border-radius: 12px !important;
    padding: 30px !important; box-shadow: 0 4px 15px rgba(16,42,53,0.03) !important; transition: all 0.3s ease !important;
}
.fit-contact-card:hover { transform: translateY(-3px) !important; box-shadow: 0 10px 25px rgba(16,42,53,0.06) !important; border-color: #00A896 !important; }
.fit-contact-item { display: flex !important; gap: 15px !important; margin-bottom: 25px !important; align-items: flex-start !important; }
.fit-contact-item:last-child { margin-bottom: 0 !important; }
.fit-contact-icon { width: 45px !important; height: 45px !important; background: rgba(0,168,150,0.1) !important; color: #00A896 !important; border-radius: 10px !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 1.3rem !important; flex-shrink: 0 !important; }
.fit-contact-text strong { display: block !important; font-size: 1.05rem !important; color: #102A35 !important; margin-bottom: 4px !important; }
.fit-contact-text span { display: block !important; color: #6C757D !important; font-size: 0.95rem !important; line-height: 1.5 !important; }

.fit-contact-form-card { background: #FFFFFF !important; border: 1px solid #EAEAEA !important; border-radius: 12px !important; padding: 40px !important; box-shadow: 0 4px 15px rgba(16,42,53,0.03) !important; }
.fit-contact-form-card h3 { font-size: 1.4rem !important; color: #102A35 !important; margin-bottom: 25px !important; border-bottom: 2px solid #F8F9FA !important; padding-bottom: 15px !important; }

@media (max-width: 992px) { .fit-contact-layout { grid-template-columns: 1fr !important; } }
</style>

<div class="fit-contact-wrapper">
    <div class="fit-contact-header">
        <h1>Get in Touch</h1>
        <p>We are here to help. Reach out to us for any product or service inquiries.</p>
    </div>

    <div class="fit-contact-layout">
        <!-- Left: Info -->
        <div class="fit-contact-info-col">
            <div class="fit-contact-card">
                <div class="fit-contact-item">
                    <div class="fit-contact-icon">📍</div>
                    <div class="fit-contact-text">
                        <strong>Business Address</strong>
                        <span>Baigartek, Sagupta R/A, Pallabi, Mirpur 12, Dhaka, Bangladesh.</span>
                    </div>
                </div>
                <div class="fit-contact-item">
                    <div class="fit-contact-icon">📞</div>
                    <div class="fit-contact-text">
                        <strong>Phone / WhatsApp</strong>
                        <span>01608630784</span>
                    </div>
                </div>
                <div class="fit-contact-item">
                    <div class="fit-contact-icon">✉️</div>
                    <div class="fit-contact-text">
                        <strong>Email Support</strong>
                        <span>fixibleit@gmail.com</span>
                    </div>
                </div>
                <div class="fit-contact-item">
                    <div class="fit-contact-icon">🕒</div>
                    <div class="fit-contact-text">
                        <strong>Business Hours</strong>
                        <span>10:00 AM - 10:00 PM (Everyday)</span>
                    </div>
                </div>
            </div>
            <a href="https://wa.me/8801608630784" target="_blank" class="fit-btn fit-btn-primary" style="width:100%; background-color:#25D366 !important; padding: 15px !important; font-size: 1.05rem !important;">Chat on WhatsApp</a>
        </div>

        <!-- Right: Form -->
        <div class="fit-contact-form-card">
            <h3>Send a Message</h3>
            <div class="fit-service-form-wrap">
                <form class="fit-service-form" data-service="Contact Form">
                    <div class="fit-form-group" style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Your Name *</label>
                        <input type="text" name="name" style="width:100%; height:50px; padding:0 15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA;" required>
                    </div>
                    <div class="fit-form-group" style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Mobile Number *</label>
                        <input type="tel" name="phone" style="width:100%; height:50px; padding:0 15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA;" required>
                    </div>
                    <div class="fit-form-group" style="margin-bottom:25px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#102A35;">Message *</label>
                        <textarea name="requirements" rows="5" style="width:100%; padding:15px; border:1px solid #EAEAEA; border-radius:8px; background:#F8F9FA;" required placeholder="How can we help you?"></textarea>
                    </div>
                    <button type="submit" class="fit-btn fit-btn-primary" style="width:100%; padding:16px; font-size:1.05rem; background:#00A896 !important; border:none; border-radius:8px; color:#fff; font-weight:700; cursor:pointer;">Send Message</button>
                    <div class="fit-form-msg" style="margin-top:15px; text-align:center; font-weight:600; color:#00A896;"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>