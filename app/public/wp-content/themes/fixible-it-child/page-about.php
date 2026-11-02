<?php
/* Template Name: About Us */
get_header(); ?>

<style>
.fit-about-wrapper {
    max-width: 1140px !important; margin: 40px auto !important; padding: 0 20px !important;
}
.fit-about-hero {
    text-align: center !important; padding: 60px 20px !important;
    background: linear-gradient(180deg, #FFFFFF 0%, #F8F9FA 100%) !important;
    border-radius: 16px !important; border: 1px solid #EAEAEA !important; margin-bottom: 50px !important;
}
.fit-about-hero h1 { font-size: 2.8rem !important; font-weight: 800 !important; color: #102A35 !important; margin-bottom: 15px !important; }
.fit-about-hero p { font-size: 1.15rem !important; color: #6C757D !important; max-width: 700px !important; margin: 0 auto !important; line-height: 1.6 !important; }

.fit-about-grid { display: grid !important; grid-template-columns: repeat(3, 1fr) !important; gap: 30px !important; margin-bottom: 50px !important; }
.fit-about-card {
    background: #FFFFFF !important; border: 1px solid #EAEAEA !important; border-radius: 12px !important;
    padding: 35px 25px !important; text-align: center !important; transition: all 0.3s ease !important;
    box-shadow: 0 4px 15px rgba(16,42,53,0.02) !important;
}
.fit-about-card:hover { transform: translateY(-5px) !important; box-shadow: 0 15px 35px rgba(16,42,53,0.08) !important; border-color: #00A896 !important; }
.fit-about-icon { font-size: 2.5rem !important; margin-bottom: 20px !important; display: inline-block !important; }
.fit-about-card h3 { font-size: 1.25rem !important; color: #102A35 !important; margin-bottom: 15px !important; font-weight: 700 !important; }
.fit-about-card p { color: #6C757D !important; font-size: 0.95rem !important; line-height: 1.6 !important; margin: 0 !important; }

.fit-about-cta {
    background: #102A35 !important; border-radius: 16px !important; padding: 60px 30px !important;
    text-align: center !important; color: #FFFFFF !important;
}
.fit-about-cta h2 { font-size: 2rem !important; color: #FFFFFF !important; margin-bottom: 15px !important; }
.fit-about-cta p { font-size: 1.1rem !important; color: #B0C4DE !important; margin-bottom: 30px !important; }
.fit-about-cta .fit-btn { margin: 0 10px !important; }

@media (max-width: 992px) { .fit-about-grid { grid-template-columns: 1fr !important; } }
</style>

<div class="fit-about-wrapper">
    <div class="fit-about-hero">
        <h1>Tech Made Reliable.</h1>
        <p>Fixible IT is Bangladesh's premier destination for genuine PC components, advanced custom builds, and professional IT services. We bridge the gap between complex technology and everyday usability.</p>
    </div>

    <div class="fit-about-grid">
        <div class="fit-about-card">
            <div class="fit-about-icon">🎯</div>
            <h3>Our Mission</h3>
            <p>To eliminate the guesswork from technology purchases. Whether you're building a high-end gaming rig or setting up an office network, we provide the exact parts and expert support you need.</p>
        </div>
        <div class="fit-about-card">
            <div class="fit-about-icon">🛡️</div>
            <h3>100% Genuine Products</h3>
            <p>We source directly from authorized distributors. Every product comes with official warranty support. No grey market, no compromises. Just pure, reliable technology.</p>
        </div>
        <div class="fit-about-card">
            <div class="fit-about-icon">⚙️</div>
            <h3>Expert Support</h3>
            <p>Our support engineers are always ready. From software troubleshooting to complex networking setups, we stand by you long after the purchase.</p>
        </div>
    </div>

    <div class="fit-about-cta">
        <h2>Need a Custom Quote?</h2>
        <p>Use our Advanced PC Builder or contact our sales team for bulk orders.</p>
        <a href="/pc-builder/" class="fit-btn fit-btn-primary" style="background:#00A896 !important;">Build a PC</a>
        <a href="/contact/" class="fit-btn fit-btn-outline" style="border-color:#fff !important; color:#fff !important;">Contact Us</a>
    </div>
</div>

<?php get_footer(); ?>