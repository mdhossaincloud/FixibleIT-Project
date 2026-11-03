<?php
/* Template Name: Fixible IT Homepage V2 */
get_header(); ?>

<style>
/* =========================================================
   PHASE 02: PREMIUM V2 HOMEPAGE (Broad Technology Focus)
   ========================================================= */
.fit-v2-wrapper { font-family: 'Inter', sans-serif; background-color: #F8F9FA; }
.fit-section { padding: 90px 20px; }
.fit-section-inner { max-width: 1240px; margin: 0 auto; }
.fit-section-header { text-align: center; margin-bottom: 60px; }
.fit-section-title { font-size: 2.4rem; color: #102A35; font-weight: 800; margin-bottom: 15px; letter-spacing: -0.5px; }
.fit-section-subtitle { font-size: 1.1rem; color: #6C757D; max-width: 700px; margin: 0 auto; line-height: 1.6; }

/* 1. HERO SECTION (ID-006) */
.fit-v2-hero { 
    display: grid; 
    grid-template-columns: 1.1fr 0.9fr; 
    align-items: center; 
    gap: 60px; 
    max-width: 1240px; 
    margin: 40px auto 0; 
    padding: 40px; 
    background: #ffffff; 
    border-radius: 20px; 
    box-shadow: 0 15px 50px rgba(16,42,53,0.06); 
}
.fit-v2-hero-content { padding: 20px; }
.fit-v2-hero-eyebrow { color: #00A896; font-weight: 700; letter-spacing: 2px; font-size: 0.85rem; text-transform: uppercase; display: inline-block; margin-bottom: 15px; background: rgba(0,168,150,0.1); padding: 6px 12px; border-radius: 4px; }
.fit-v2-hero-title { font-size: 3.2rem; color: #102A35; font-weight: 800; line-height: 1.15; margin: 0 0 20px 0; letter-spacing: -1px; }
.fit-v2-hero-desc { font-size: 1.15rem; color: #4B5563; margin-bottom: 35px; line-height: 1.6; }
.fit-v2-hero-actions { display: flex; gap: 15px; flex-wrap: wrap; }
.fit-v2-hero-image img { width: 100%; border-radius: 16px; object-fit: cover; aspect-ratio: 4/3; box-shadow: 0 10px 30px rgba(0,0,0,0.12); }

/* Trust Badges */
.fit-v2-trust { display: flex; justify-content: center; gap: 40px; margin: 40px auto 0; max-width: 1240px; flex-wrap: wrap; }
.fit-v2-trust-item { display: flex; align-items: center; gap: 10px; color: #4B5563; font-size: 0.95rem; font-weight: 500; }
.fit-v2-trust-item svg { stroke: #00A896; }

/* 2. CATEGORY GRID */
.fit-v2-category-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 25px; }
.fit-v2-cat-card { background: #fff; border: 1px solid #EAEAEA; border-radius: 16px; padding: 35px 20px; text-align: center; text-decoration: none; transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; position: relative; overflow: hidden; }
.fit-v2-cat-card:hover { transform: translateY(-8px); border-color: #00A896; box-shadow: 0 15px 30px rgba(0,168,150,0.12); }
.fit-v2-cat-icon { margin-bottom: 18px; background: #F8F9FA; padding: 15px; border-radius: 50%; }
.fit-v2-cat-card h3 { font-size: 1.05rem; color: #102A35; font-weight: 700; margin: 0; }

/* 3. IT SUPPORT SECTION */
.fit-v2-services-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; }
.fit-v2-service-card { background: #fff; border-radius: 16px; padding: 35px 25px; border: 1px solid #EAEAEA; transition: 0.3s; text-decoration: none; display: block; position: relative; }
.fit-v2-service-card:hover { border-color: #00A896; box-shadow: 0 10px 25px rgba(0,0,0,0.05); transform: translateY(-4px); }
.fit-v2-service-card h3 { font-size: 1.2rem; color: #102A35; margin-bottom: 12px; font-weight: 700; }
.fit-v2-service-card p { font-size: 0.95rem; color: #6C757D; line-height: 1.6; margin: 0; }

/* 4. ENQUIRY SECTION (New) */
.fit-v2-enquiry-wrap { background: #102A35; border-radius: 20px; padding: 60px; text-align: center; color: #fff; }
.fit-v2-enquiry-wrap h2 { font-size: 2.2rem; font-weight: 800; margin-bottom: 15px; }
.fit-v2-enquiry-wrap p { color: #9CA3AF; font-size: 1.1rem; margin-bottom: 35px; max-width: 600px; margin-left: auto; margin-right: auto; }
.fit-v2-enquiry-tags { display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-bottom: 40px; }
.fit-v2-enquiry-tag { background: rgba(255,255,255,0.1); padding: 8px 16px; border-radius: 20px; font-size: 0.9rem; color: #fff; }

/* 5. PC BUILDER FEATURE (ID-007) */
.fit-v2-pc-builder { display: grid; grid-template-columns: 1fr 1fr; background: #ffffff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
.fit-v2-pc-builder-content { padding: 60px; display: flex; flex-direction: column; justify-content: center; }
.fit-v2-pc-builder-content h2 { font-size: 2.2rem; color: #102A35; font-weight: 800; margin-bottom: 20px; }
.fit-v2-pc-builder-content p { color: #6C757D; font-size: 1.1rem; margin-bottom: 30px; line-height: 1.6; }
.fit-v2-pc-builder-image { position: relative; min-height: 400px; }
.fit-v2-pc-builder-image img { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; }

/* Responsive */
@media (max-width: 1024px) {
    .fit-v2-hero { grid-template-columns: 1fr; text-align: center; padding: 30px; }
    .fit-v2-hero-content { order: 2; }
    .fit-v2-hero-image { order: 1; }
    .fit-v2-hero-actions { justify-content: center; }
    .fit-v2-category-grid { grid-template-columns: repeat(3, 1fr); }
    .fit-v2-services-grid { grid-template-columns: repeat(2, 1fr); }
    .fit-v2-pc-builder { grid-template-columns: 1fr; }
}
@media (max-width: 576px) {
    .fit-section { padding: 60px 15px; }
    .fit-v2-hero-title { font-size: 2.2rem; }
    .fit-v2-category-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }
    .fit-v2-services-grid { grid-template-columns: 1fr; }
    .fit-v2-trust { flex-direction: column; gap: 15px; align-items: center; }
    .fit-v2-enquiry-wrap { padding: 40px 20px; }
    .fit-v2-pc-builder-content { padding: 40px 20px; }
}
</style>

<div class="fit-v2-wrapper">
    
    <!-- 1. HERO SECTION (Broad Technology Focus - ID-006) -->
    <section class="fit-v2-hero">
        <div class="fit-v2-hero-content">
            <span class="fit-v2-hero-eyebrow">FIXIBLE IT | YOUR TECHNOLOGY DESTINATION</span>
            <h1 class="fit-v2-hero-title">Technology for Every Need.<br>Solutions That Move You Forward.</h1>
            <p class="fit-v2-hero-desc">Discover IT products, networking essentials, mobile accessories, smart tech gadgets, PC components and professional IT solutions—all in one place.</p>
            
            <div class="fit-v2-hero-actions">
                <a href="/shop/" class="fit-btn fit-btn-primary" style="padding: 16px 32px; font-size: 1.05rem; font-weight: 600;">Explore Products</a>
                <a href="/it-services/" class="fit-btn fit-btn-outline" style="padding: 16px 32px; font-size: 1.05rem; font-weight: 600; border-color: #102A35; color: #102A35;">Get IT Support</a>
            </div>
        </div>
        <div class="fit-v2-hero-image">
            <!-- APPROVED HERO IMAGE: ID-006 -->
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-006__fixibleit-pc-builder-rgb-build.jpg" alt="Premium Technology and PC Setup" loading="eager">
        </div>
    </section>

    <!-- Trust Badges -->
    <div class="fit-v2-trust">
        <div class="fit-v2-trust-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
            100% Genuine Products
        </div>
        <div class="fit-v2-trust-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            Nationwide Delivery
        </div>
        <div class="fit-v2-trust-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            Cash on Delivery
        </div>
    </div>

    <!-- 2. EXPLORE TECHNOLOGY COLLECTION -->
    <section class="fit-section fit-bg-white" style="margin-top: 40px;">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">Explore Our Technology Collection</h2>
                <p class="fit-section-subtitle">From everyday tech essentials to professional IT equipment, discover products for work, home and business.</p>
            </div>
            
            <!-- Note: Ensure these categories exist in WooCommerce. If not, they will 404. -->
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

    <!-- 3. IT SUPPORT & SOLUTIONS (Moved Up) -->
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
                <a href="/it-services/" class="fit-btn fit-btn-outline" style="padding: 14px 32px; font-weight: 600; border-color: #102A35; color: #102A35;">Explore All IT Services</a>
            </div>
        </div>
    </section>

    <!-- 4. FEATURED TECHNOLOGY & BEST PICKS -->
    <section class="fit-section fit-bg-white">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">Featured Technology & Best Picks</h2>
                <p class="fit-section-subtitle">Explore our latest computer components, accessories and technology essentials.</p>
            </div>
            
            <div class="fit-featured-products-wrap" style="margin-bottom: 40px;">
                <!-- Note: Check if you have "Featured" products in WooCommerce. If not, change orderby="date" to "popularity" or just use a generic title like "Latest Arrivals" -->
                <?php echo do_shortcode('[products limit="4" columns="4" visibility="visible" status="publish" orderby="date"]'); ?>
            </div>
            
            <div style="text-align: center;">
                <a href="/shop/" class="fit-btn fit-btn-outline" style="padding: 14px 32px; font-weight: 600; border-color: #102A35; color: #102A35;">View All Products</a>
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
                    <!-- Links to Contact Page or your existing Form. Adjust the URL if needed. -->
                    <a href="/contact/" class="fit-btn fit-btn-primary" style="padding: 14px 32px; font-weight: 600;">Discuss Your IT Requirement</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. PC BUILDER FEATURE (ID-007) -->
    <section class="fit-section fit-bg-white">
        <div class="fit-section-inner">
            <div class="fit-v2-pc-builder">
                <div class="fit-v2-pc-builder-content">
                    <h2>Build a PC That Works for You.</h2>
                    <p>Explore PC configurations and hardware possibilities for your personal, professional or performance needs.</p>
                    <a href="/pc-builder/" class="fit-btn fit-btn-primary" style="padding: 16px 32px; align-self: flex-start;">Explore PC Builder</a>
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