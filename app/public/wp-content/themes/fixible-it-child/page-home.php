<?php
/* Template Name: Fixible IT Homepage */
get_header(); ?>

<div class="fit-home-wrapper">
    
    <!-- 1. HERO SECTION -->
    <section class="fit-home-hero" style="position: relative; overflow: hidden;">
        <div class="fit-hero-content" style="position: relative; z-index: 2;">
            <!-- Brand Logo -->
            <div style="margin-bottom: 20px;">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/fixible-logo.png" alt="Fixible IT Logo" style="max-height: 70px; width: auto; margin: 0 auto; display: block;">
            </div>

            <span class="fit-hero-eyebrow">TECHNOLOGY MADE PRACTICAL</span>
            <h1 class="fit-hero-title">The Right Technology.<br>The Right Support.</h1>
            <p class="fit-hero-subtitle">Explore essential tech products, build your ideal PC, and get professional IT support for your home or business.</p>
            
            <div class="fit-hero-actions">
                <a href="/shop/" class="fit-btn fit-btn-primary">Shop Products</a>
                <a href="/it-services/" class="fit-btn fit-btn-navy">Explore IT Services</a>
                <a href="/pc-builder/" class="fit-btn fit-btn-outline">Build a PC</a>
            </div>

            <div class="fit-hero-trust">
                <div class="fit-trust-item">🛡️ 100% Genuine Products</div>
                <div class="fit-trust-item">🚚 Fast Delivery in Dhaka</div>
                <div class="fit-trust-item">💳 Cash on Delivery</div>
            </div>
        </div>
    </section>

    <!-- 2. SHOP BY CATEGORY -->
    <section class="fit-section fit-bg-white">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">Explore Technology Essentials</h2>
                <p class="fit-section-subtitle">Find the right components, accessories and technology for your setup.</p>
            </div>
            
            <div class="fit-category-grid">
                <!-- PC Components -->
                <a href="/product-category/pc-components-and-building/" class="fit-cat-card">
                    <div class="fit-cat-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                    </div>
                    <h3>PC Components</h3>
                </a>
                <!-- CCTV -->
                <a href="/product-category/cctv-and-surveillance/" class="fit-cat-card">
                    <div class="fit-cat-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    </div>
                    <h3>CCTV & Surveillance</h3>
                </a>
                <!-- Networking -->
                <a href="/product-category/networking/" class="fit-cat-card">
                    <div class="fit-cat-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                    </div>
                    <h3>Networking</h3>
                </a>
                <!-- Accessories -->
                <a href="/product-category/desktop-and-computer-accessories/" class="fit-cat-card">
                    <div class="fit-cat-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"></rect><path d="M6 8h.01"></path><path d="M10 8h.01"></path><path d="M14 8h.01"></path><path d="M18 8h.01"></path><path d="M8 12h.01"></path><path d="M12 12h.01"></path><path d="M16 12h.01"></path><path d="M7 16h10"></path></svg>
                    </div>
                    <h3>Accessories</h3>
                </a>
                <!-- Office IT -->
                <a href="/product-category/office-and-productivity/" class="fit-cat-card">
                    <div class="fit-cat-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </div>
                    <h3>Office IT</h3>
                </a>
            </div>
        </div>
    </section>

    <!-- 3. FEATURED PRODUCTS -->
    <section class="fit-section fit-bg-light">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">Technology Worth Exploring.</h2>
                <p class="fit-section-subtitle">Discover selected products for everyday computing, productivity and connectivity.</p>
            </div>
            
            <div class="fit-featured-products-wrap">
                <?php echo do_shortcode('[products limit="4" columns="4" visibility="visible" status="publish" orderby="date"]'); ?>
            </div>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="/shop/" class="fit-btn fit-btn-outline">View All Products</a>
            </div>
        </div>
    </section>

    <!-- 4. PC BUILDER CTA -->
    <section class="fit-cta-banner fit-cta-navy">
        <div class="fit-cta-content">
            <h2>Build a PC That Fits Your Needs.</h2>
            <p>Explore compatible components and plan your PC configuration with our PC Builder.</p>
            <a href="/pc-builder/" class="fit-btn fit-btn-primary" style="margin-top: 15px;">Start Building</a>
        </div>
    </section>

    <!-- 5. PROFESSIONAL IT SERVICES -->
    <section class="fit-section fit-bg-white">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">IT Support Beyond Products.</h2>
                <p class="fit-section-subtitle">Practical technology services for homes, offices and businesses.</p>
            </div>
            
            <div class="fit-services-grid">
                <a href="/cctv-surveillance/" class="fit-service-card">
                    <div class="fit-service-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    </div>
                    <h3>CCTV Solutions</h3>
                    <p>Analog, IP, and Wi-Fi CCTV installation and monitoring.</p>
                </a>
                <a href="/office-network/" class="fit-service-card">
                    <div class="fit-service-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg>
                    </div>
                    <h3>Network Solutions</h3>
                    <p>Structured cabling, LAN setup, and business Wi-Fi deployment.</p>
                </a>
                <a href="/pc-repair/" class="fit-service-card">
                    <div class="fit-service-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                    </div>
                    <h3>PC & Laptop Repair</h3>
                    <p>Hardware diagnostics, upgrades, and thermal servicing.</p>
                </a>
                <a href="/server-it/" class="fit-service-card">
                    <div class="fit-service-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--fit-teal)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                    </div>
                    <h3>Server & IT Support</h3>
                    <p>Rack mounting, UPS integration, and workstation deployment.</p>
                </a>
            </div>
            
            <div style="text-align: center; margin-top: 40px;">
                <a href="/it-services/" class="fit-btn fit-btn-outline">Explore All IT Services</a>
            </div>
        </div>
    </section>

    <!-- 6. SHOPPING CONFIDENCE -->
    <section class="fit-section fit-bg-light">
        <div class="fit-section-inner">
            <div class="fit-section-header">
                <h2 class="fit-section-title">A Convenient Way to Shop.</h2>
            </div>
            
            <div class="fit-confidence-grid">
                <div class="fit-confidence-item">
                    <div class="fit-conf-icon">💳</div>
                    <h4>Cash on Delivery</h4>
                    <p>Pay when you receive your product.</p>
                </div>
                <div class="fit-confidence-item">
                    <div class="fit-conf-icon">📦</div>
                    <h4>Steadfast Courier</h4>
                    <p>Reliable and secure delivery partner.</p>
                </div>
                <div class="fit-confidence-item">
                    <div class="fit-conf-icon">🚚</div>
                    <h4>Nationwide Delivery</h4>
                    <p>Inside Dhaka: ৳80<br>Outside Dhaka: ৳150</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. FINAL CTA -->
    <section class="fit-cta-banner fit-cta-light">
        <div class="fit-cta-content">
            <h2>Need Help Choosing the Right Solution?</h2>
            <p>Talk to Fixible IT about your product requirements or IT service needs.</p>
            <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-top: 25px;">
                <a href="/contact/" class="fit-btn fit-btn-navy">Contact Us</a>
                <a href="https://wa.me/8801608630784" target="_blank" class="fit-btn fit-whatsapp-cta" style="background-color: #25D366 !important; color: #fff !important;">WhatsApp Us</a>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>