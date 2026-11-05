<?php
/* Template Name: Fixible IT Homepage V2 */
get_header(); ?>

<style>
/* =========================================================
   FIXIBLE IT — PREMIUM V2 HOMEPAGE (With Hero Slider)
   ========================================================= */
.fit-v2-wrapper { font-family: 'Inter', sans-serif; background-color: #F8F9FA; overflow-x: hidden; }
.fit-section { padding: 90px 20px; }
.fit-section-inner { max-width: 1240px; margin: 0 auto; }
.fit-section-header { text-align: center; margin-bottom: 60px; }
.fit-section-title { font-size: 2.4rem; color: #102A35; font-weight: 800; margin-bottom: 15px; letter-spacing: -0.5px; }
.fit-section-subtitle { font-size: 1.1rem; color: #6C757D; max-width: 700px; margin: 0 auto; line-height: 1.6; }

/* 1. PREMIUM HERO SLIDER */
.fit-hero-slider-section {
    position: relative;
    height: 85vh; /* স্ক্রিনের ৮৫% উচ্চতা */
    min-height: 600px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background-color: #102A35;
    margin-bottom: 60px;
}
.fit-hero-slider {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    z-index: 1;
}
.fit-slide {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    animation: fitFadeSlider 42s infinite; /* ৫টি ছবি, প্রতি ৫ সেকেন্ডে পরিবর্তন */
}
.fit-slide:nth-child(1) { animation-delay: 0s; }
    .fit-slide:nth-child(2) { animation-delay: 6s; }
    .fit-slide:nth-child(3) { animation-delay: 12s; }
    .fit-slide:nth-child(4) { animation-delay: 18s; }
    .fit-slide:nth-child(5) { animation-delay: 24s; }
    .fit-slide:nth-child(6) { animation-delay: 30s; }
    .fit-slide:nth-child(7) { animation-delay: 36s; }

@keyframes fitFadeSlider {
        0% { opacity: 0; transform: scale(1); }
        1% { opacity: 1; }
        13% { opacity: 1; transform: scale(1.05); }
        14.28% { opacity: 0; }
        100% { opacity: 0; }
    }
.fit-hero-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(90deg, rgba(16, 42, 53, 0.9) 0%, rgba(16, 42, 53, 0.6) 50%, rgba(16, 42, 53, 0.2) 100%);
    z-index: 2;
}
.fit-hero-content-box {
    position: relative;
    z-index: 3;
    max-width: 800px;
    margin-left: 5%;
    color: #FFFFFF;
    padding: 0 20px;
}
.fit-hero-eyebrow {
    display: inline-block;
    font-size: 0.85rem;
    font-weight: 700;
    color: #00A896;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 20px;
    background: rgba(0, 168, 150, 0.15);
    padding: 8px 16px;
    border-radius: 20px;
    border: 1px solid rgba(0, 168, 150, 0.3);
    backdrop-filter: blur(5px);
}
.fit-hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    color: #FFFFFF !important;
    margin-bottom: 20px;
    line-height: 1.15;
    letter-spacing: -0.02em;
}
.fit-hero-subtitle {
    font-size: 1.2rem;
    color: #E2E8F0;
    margin-bottom: 40px;
    line-height: 1.6;
}
.fit-hero-actions {
    display: flex;
    gap: 15px;
}

/* 2. TRUST BADGES */
.fit-v2-trust {
    max-width: 1240px; 
    margin: -30px auto 60px; 
    background: #fff; 
    padding: 30px; 
    border-radius: 12px; 
    box-shadow: 0 10px 30px rgba(16,42,53,0.05); 
    position: relative; 
    z-index: 10; 
    display: flex; 
    justify-content: space-around; 
    flex-wrap: wrap; 
    gap: 20px;
}
.fit-v2-trust-item { 
    display: flex; 
    align-items: center; 
    gap: 10px; 
    font-weight: 600; 
    color: #102A35; 
    font-size: 1rem;
}
.fit-v2-trust-item svg { stroke: #00A896; }

/* 3. CATEGORY GRID */
.fit-v2-category-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
.fit-v2-cat-card { background: #fff; border: 1px solid #EAEAEA; border-radius: 12px; padding: 30px 20px; text-align: center; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 15px; transition: all 0.3s ease; }
.fit-v2-cat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(16,42,53,0.08); border-color: #00A896; }
.fit-v2-cat-icon { width: 64px; height: 64px; background: rgba(0, 168, 150, 0.08); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
.fit-v2-cat-card h3 { font-size: 1.1rem; color: #102A35; margin: 0; font-weight: 700; }

/* 4. SERVICES GRID */
.fit-v2-services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px; }
.fit-v2-service-card { background: #fff; border: 1px solid #EAEAEA; border-radius: 12px; padding: 30px; text-decoration: none; display: flex; flex-direction: column; gap: 10px; transition: all 0.3s ease; }
.fit-v2-service-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(16,42,53,0.08); border-color: #00A896; }
.fit-v2-service-card h3 { font-size: 1.2rem; color: #102A35; margin: 0; font-weight: 700; }
.fit-v2-service-card p { color: #6C757D; font-size: 0.95rem; margin: 0; line-height: 1.5; }

/* 5. ENQUIRY SECTION */
.fit-v2-enquiry-wrap { background: #102A35; padding: 60px 40px; border-radius: 20px; text-align: center; color: #fff; }
.fit-v2-enquiry-wrap h2 { color: #fff !important; font-size: 2rem; margin-bottom: 15px; }
.fit-v2-enquiry-wrap p { color: #b0c4de; font-size: 1.1rem; max-width: 700px; margin: 0 auto 30px auto; }
.fit-v2-enquiry-tags { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-bottom: 40px; }
.fit-v2-enquiry-tag { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 30px; font-size: 0.9rem; font-weight: 500; }

/* 6. PC BUILDER SECTION */
.fit-v2-pc-builder { display: flex; align-items: center; gap: 50px; background: #102A35; border-radius: 20px; overflow: hidden; color: #fff; }
.fit-v2-pc-builder-content { flex: 1; padding: 50px; }
.fit-v2-pc-builder-content h2 { color: #fff !important; font-size: 2.2rem; font-weight: 800; margin-bottom: 15px; }
.fit-v2-pc-builder-content p { color: #b0c4de; font-size: 1.1rem; margin-bottom: 30px; }
.fit-v2-pc-builder-image { flex: 1; height: 100%; min-height: 400px; }
.fit-v2-pc-builder-image img { width: 100%; height: 100%; object-fit: cover; }

/* RESPONSIVE */
@media (max-width: 992px) {
    .fit-hero-title { font-size: 2.8rem; }
    .fit-v2-pc-builder { flex-direction: column; }
    .fit-v2-pc-builder-image { min-height: 300px; width: 100%; }
    .fit-v2-pc-builder-content { padding: 30px; text-align: center; }
    .fit-v2-pc-builder-content .fit-btn { margin: 0 auto; }
}
@media (max-width: 768px) {
    .fit-hero-slider-section { height: 70vh; min-height: 500px; }
    .fit-hero-content-box { margin-left: 0; text-align: center; }
    .fit-hero-title { font-size: 2.2rem; }
    .fit-hero-actions { flex-direction: column; align-items: center; }
    .fit-hero-actions .fit-btn { width: 100%; max-width: 300px; text-align: center; }
    .fit-hero-overlay { background: rgba(16, 42, 53, 0.85); }
}
</style>

<div class="fit-v2-wrapper">
    
    <!-- 1. HERO SECTION (Premium Slider) -->
    <section class="fit-hero-slider-section">
        <!-- Background Slider Images -->
        <div class="fit-hero-slider">
            <div class="fit-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-004__fixibleit-pc-builder-rgb-build-02.jpg');"></div>
            <div class="fit-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-043__fixibleit-service-network-switch-cabling.jpg');"></div>
            <div class="fit-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-016__fixibleit-pc-builder-white-build-detail-01.jpg');"></div>
            <div class="fit-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-029__fixibleit-networking-server-rack.jpg');"></div>
            <div class="fit-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-050__fixibleit-service-hardware-installation.jpg');"></div>
            <div class="fit-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-060__fixibleit-service-router-connectivity.jpg');"></div>
            <div class="fit-slide" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-007__fixibleit-pc-builder-liquid-cooling.jpg');"></div>
        </div>

        <!-- Dark Overlay -->
        <div class="fit-hero-overlay"></div>

        <!-- Hero Content -->
        <div class="fit-hero-content-box">
            <span class="fit-hero-eyebrow">FIXIBLE IT | YOUR TECHNOLOGY DESTINATION</span>
            <h1 class="fit-hero-title">Technology for Every Need.<br>Solutions That Move You Forward.</h1>
            <p class="fit-hero-subtitle">Discover IT products, networking essentials, mobile accessories, smart tech gadgets, PC components and professional IT solutions—all in one place.</p>
            
            <div class="fit-hero-actions">
                <a href="/shop/" class="fit-btn fit-btn-primary" style="padding: 16px 32px; font-size: 1.05rem; font-weight: 600; background: #00A896; color: #fff; border-radius: 8px; text-decoration: none;">Explore Products</a>
                <a href="/it-services/" class="fit-btn" style="padding: 16px 32px; font-size: 1.05rem; font-weight: 600; border: 2px solid #fff; color: #fff; background: transparent; border-radius: 8px; text-decoration: none;">Get IT Support</a>
            </div>
        </div>
    </section>

    <!-- Trust Badges -->
    <div class="fit-v2-trust">
        <div class="fit-v2-trust-item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
            100% Genuine Products
        </div>
        <div class="fit-v2-trust-item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            Nationwide Delivery
        </div>
        <div class="fit-v2-trust-item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            Cash on Delivery
        </div>
    </div>

    <!-- 2. EXPLORE TECHNOLOGY COLLECTION -->
    <section class="fit-section fit-bg-white" style="margin-top: 40px; background: #fff;">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">Explore Our Technology Collection</h2>
                <p class="fit-section-subtitle">From everyday tech essentials to professional IT equipment, discover products for work, home and business.</p>
            </div>
            
            <div class="fit-v2-category-grid">
                <a href="/product-category/pc-components-and-building/" class="fit-v2-cat-card">
                    <div class="fit-v2-cat-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00A896" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line></svg></div>
                    <h3>PC Components</h3>
                </a>
                <a href="/product-category/networking/" class="fit-v2-cat-card">
                    <div class="fit-v2-cat-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00A896" stroke-width="2"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg></div>
                    <h3>Networking</h3>
                </a>
                <a href="/product-category/cctv-and-surveillance/" class="fit-v2-cat-card">
                    <div class="fit-v2-cat-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00A896" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg></div>
                    <h3>CCTV & Surveillance</h3>
                </a>
                <a href="/product-category/desktop-and-computer-accessories/" class="fit-v2-cat-card">
                    <div class="fit-v2-cat-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00A896" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="M6 8h.01"></path><path d="M10 8h.01"></path><path d="M14 8h.01"></path><path d="M18 8h.01"></path><path d="M8 12h.01"></path><path d="M12 12h.01"></path><path d="M16 12h.01"></path><path d="M7 16h10"></path></svg></div>
                    <h3>Accessories</h3>
                </a>
                <a href="/product-category/office-and-productivity/" class="fit-v2-cat-card">
                    <div class="fit-v2-cat-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#00A896" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg></div>
                    <h3>Office IT</h3>
                </a>
            </div>
        </div>
    </section>

    <!-- 3. IT SUPPORT & SOLUTIONS -->
    <section class="fit-section">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">Professional IT Support & Solutions</h2>
                <p class="fit-section-subtitle">From everyday technical assistance to networking and IT implementation, find practical support for your technology requirements.</p>
            </div>
            
            <div class="fit-v2-services-grid">
                <a href="/pc-repair/" class="fit-v2-service-card">
                    <h3>PC & Laptop Repair</h3>
                    <p>Hardware inspection, troubleshooting and repair assistance.</p>
                </a>
                <a href="/office-network/" class="fit-v2-service-card">
                    <h3>Networking Solutions</h3>
                    <p>LAN setup, structured cabling and business Wi-Fi deployment.</p>
                </a>
                <a href="/cctv-surveillance/" class="fit-v2-service-card">
                    <h3>CCTV Solutions</h3>
                    <p>Analog, IP, and Wi-Fi CCTV installation and monitoring.</p>
                </a>
                <a href="/server-it/" class="fit-v2-service-card">
                    <h3>Server & IT Support</h3>
                    <p>Rack mounting, UPS integration, and workstation deployment.</p>
                </a>
            </div>
            
            <div style="text-align: center; margin-top: 40px;">
                <a href="/it-services/" class="fit-btn" style="padding: 14px 32px; font-weight: 600; border: 2px solid #102A35; color: #102A35; background: transparent; border-radius: 8px; text-decoration: none;">Explore All IT Services</a>
            </div>
        </div>
    </section>

    <!-- 4. FEATURED TECHNOLOGY & BEST PICKS -->
    <section class="fit-section fit-bg-white" style="background: #fff;">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">Featured Technology & Best Picks</h2>
                <p class="fit-section-subtitle">Explore our latest computer components, accessories and technology essentials.</p>
            </div>
            
            <div class="fit-featured-products-wrap" style="margin-bottom: 40px;">
<?php echo do_shortcode('[products limit="6" columns="3" visibility="featured" status="publish"]'); ?>
            </div>
            
            <div style="text-align: center;">
                <a href="/shop/" class="fit-btn" style="padding: 14px 32px; font-weight: 600; border: 2px solid #102A35; color: #102A35; background: transparent; border-radius: 8px; text-decoration: none;">View All Products</a>
            </div>
        </div>
    </section>

    <!-- 5. ENQUIRY SECTION -->
    <section class="fit-section">
        <div class="fit-section-inner">
            <div class="fit-v2-enquiry-wrap">
                <h2>Have an IT Requirement? Let's Discuss Your Solution.</h2>
                <p>Whether you need technology products, networking equipment, installation, IT support or a tailored implementation, tell us what you need.</p>
                
                <div class="fit-v2-enquiry-tags">
                    <span class="fit-v2-enquiry-tag">Product Enquiry</span>
                    <span class="fit-v2-enquiry-tag">IT Support Request</span>
                    <span class="fit-v2-enquiry-tag">Network Installation</span>
                    <span class="fit-v2-enquiry-tag">CCTV / Security</span>
                    <span class="fit-v2-enquiry-tag">Business IT Requirement</span>
                </div>
                
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="/contact/" class="fit-btn fit-btn-primary" style="padding: 14px 32px; font-weight: 600; background: #00A896; color: #fff; border-radius: 8px; text-decoration: none;">Discuss Your IT Requirement</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. PC BUILDER FEATURE (ID-007) -->
    <section class="fit-section fit-bg-white" style="background: #fff; padding-bottom: 120px;">
        <div class="fit-section-inner">
            <div class="fit-v2-pc-builder">
                <div class="fit-v2-pc-builder-content">
                    <h2>Build a PC That Works for You.</h2>
                    <p>Explore PC configurations and hardware possibilities for your personal, professional or performance needs.</p>
                    <a href="/pc-builder/" class="fit-btn fit-btn-primary" style="padding: 16px 32px; background: #00A896; color: #fff; border-radius: 8px; text-decoration: none; font-weight: 600;">Explore PC Builder</a>
                </div>
                <div class="fit-v2-pc-builder-image">
                    <!-- APPROVED SECONDARY IMAGE: ID-007 -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-007__fixibleit-pc-builder-liquid-cooling.jpg" alt="Liquid Cooling PC Build" loading="lazy">
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>