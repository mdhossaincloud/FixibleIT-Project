<?php
/* Template Name: Fixible IT Services */
get_header(); ?>

<style>
/* =========================================================
   PREMIUM IT SERVICES PAGE (V2 - WORLD CLASS)
   ========================================================= */
body.page-template-page-it-services { background-color: #F8F9FA !important; }
.fit-its-wrapper { font-family: 'Inter', sans-serif; overflow-x: hidden; }

/* 1. Full Width Hero */
.fit-its-hero { 
    position: relative; 
    text-align: center; 
    padding: 120px 20px; 
    background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-029__fixibleit-networking-server-rack.jpg');
    background-size: cover;
    background-position: center;
}
.fit-its-hero::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(16, 42, 53, 0.85); /* Deep Navy Overlay */
    z-index: 1;
}
.fit-its-hero-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }
.fit-its-hero-content h1 { font-size: 3.5rem; color: #FFFFFF !important; font-weight: 800; margin-bottom: 20px; line-height: 1.2; letter-spacing: -0.5px; }
.fit-its-hero-content p { font-size: 1.25rem; color: #E2E8F0 !important; margin-bottom: 40px; line-height: 1.6; }
.fit-its-hero-actions { display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; }
.fit-its-hero-actions .fit-btn { padding: 16px 32px; font-size: 1.05rem; font-weight: 600; border-radius: 8px; }

/* 2. Services Grid */
.fit-its-section { padding: 90px 20px; max-width: 1240px; margin: 0 auto; }
.fit-its-title { text-align: center; margin-bottom: 60px; }
.fit-its-title h2 { font-size: 2.4rem; color: #102A35; font-weight: 800; margin-bottom: 15px; }
.fit-its-title p { color: #6C757D; font-size: 1.1rem; max-width: 700px; margin: 0 auto; }
.fit-its-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }

/* Premium Glass Card */
.fit-its-card { 
    background: #FFFFFF; border: 1px solid #EAEAEA; border-radius: 16px; 
    overflow: hidden; box-shadow: 0 4px 20px rgba(16,42,53,0.04); 
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); 
    display: flex; flex-direction: column;
}
.fit-its-card:hover { transform: translateY(-8px); box-shadow: 0 15px 40px rgba(16,42,53,0.08); border-color: #00A896; }
.fit-its-card img { width: 100%; height: 220px; object-fit: cover; transition: transform 0.5s ease; }
.fit-its-card:hover img { transform: scale(1.05); }
.fit-its-card-body { padding: 30px; flex-grow: 1; display: flex; flex-direction: column; }
.fit-its-card-body h3 { font-size: 1.25rem; color: #102A35; margin-bottom: 12px; font-weight: 700; }
.fit-its-card-body p { font-size: 0.95rem; color: #6C757D; line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }
.fit-its-card-link { display: inline-flex; align-items: center; color: #00A896; font-weight: 700; font-size: 0.9rem; text-decoration: none; transition: gap 0.2s; }
.fit-its-card-link:hover { gap: 8px; }

/* 3. Process Section */
.fit-its-process { background: #FFFFFF; padding: 90px 20px; border-top: 1px solid #F1F5F9; }
.fit-its-process-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; text-align: center; }
.fit-its-step { position: relative; padding: 20px; }
.fit-its-step-num { background: #F8FAFB; color: #00A896; border: 2px solid #00A896; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 1.4rem; font-weight: 800; margin: 0 auto 20px; box-shadow: 0 4px 15px rgba(0,168,150,0.15); transition: all 0.3s; }
.fit-its-step:hover .fit-its-step-num { background: #00A896; color: #FFF; transform: scale(1.1); }
.fit-its-step h4 { color: #102A35; font-size: 1.15rem; margin-bottom: 10px; font-weight: 700; }
.fit-its-step p { color: #6C757D; font-size: 0.95rem; line-height: 1.5; }

/* 4. CTA Section */
.fit-its-cta { background: #102A35; color: #fff; padding: 80px 20px; text-align: center; border-radius: 24px; max-width: 1200px; margin: 60px auto; }
.fit-its-cta h2 { font-size: 2.2rem; margin-bottom: 15px; font-weight: 800; color: #FFF !important; }
.fit-its-cta p { margin-bottom: 30px; color: #B0C4DE; font-size: 1.1rem; }
.fit-its-cta .fit-btn { padding: 16px 32px; font-size: 1.05rem; font-weight: 600; }

/* Responsive */
@media (max-width: 992px) {
    .fit-its-hero { padding: 100px 20px; background-attachment: scroll; }
    .fit-its-hero-content h1 { font-size: 2.8rem; }
    .fit-its-grid { grid-template-columns: repeat(2, 1fr); }
    .fit-its-process-inner { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 576px) {
    .fit-its-grid { grid-template-columns: 1fr; }
    .fit-its-process-inner { grid-template-columns: 1fr; gap: 40px; }
    .fit-its-hero-content h1 { font-size: 2.2rem; }
}
</style>

<div class="fit-its-wrapper">
    <!-- Hero Section -->
    <section class="fit-its-hero">
        <div class="fit-its-hero-content">
            <h1>IT Solutions That Keep You Moving.</h1>
            <p>Professional computer, hardware, and networking support. We focus on outcomes, not just tickets—so your business runs seamlessly.</p>
            <div class="fit-its-hero-actions">
                <a href="/support/" class="fit-btn fit-btn-primary" style="background: #00A896; color: #fff;">Request IT Support</a>
                <a href="#services" class="fit-btn" style="background: transparent; border: 2px solid #fff; color: #fff;">Explore Services</a>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section id="services" class="fit-its-section">
        <div class="fit-its-title">
            <h2>What We Do</h2>
            <p>Comprehensive IT services tailored for your needs. From single PC repairs to enterprise networking—we handle it effortlessly.</p>
        </div>
        <div class="fit-its-grid">
            <!-- Card 1 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-060__fixibleit-service-router-connectivity.jpg" alt="Desktop & Laptop Repair" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Desktop & Laptop Repair</h3>
                    <p>Hardware inspection, troubleshooting, and repair assistance to get your devices back up and running fast.</p>
                    <a href="/support/" class="fit-its-card-link">Get Support →</a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-042__fixibleit-service-computer-repair.jpg" alt="PC Assembly & Hardware Upgrade" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>PC Assembly & Upgrade</h3>
                    <p>Custom PC assembly, component upgrades, and hardware compatibility guidance for optimal performance.</p>
                    <a href="/pc-builder/" class="fit-its-card-link">Build a PC →</a>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-050__fixibleit-service-hardware-installation.jpg" alt="Hardware Installation" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Hardware Installation</h3>
                    <p>Component installation, hardware setup, and compatibility checks for a seamless upgrade experience.</p>
                    <a href="/support/" class="fit-its-card-link">Get Support →</a>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-053__fixibleit-service-network-installation.jpg" alt="LAN & Network Setup" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>LAN & Network Setup</h3>
                    <p>Structured cabling, local network installation, and basic network setup for reliable connectivity.</p>
                    <a href="/support/" class="fit-its-card-link">Get Support →</a>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-048__fixibleit-service-pc-assembly.jpg" alt="Computer Maintenance" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Maintenance & Diagnostics</h3>
                    <p>Hardware checks, issue identification, and proactive maintenance assistance to prevent downtime.</p>
                    <a href="/support/" class="fit-its-card-link">Get Support →</a>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-054__fixibleit-service-hardware-maintenance.jpg" alt="Router & Wi-Fi Configuration" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Router & Wi-Fi Config</h3>
                    <p>Router setup, connectivity configuration, and troubleshooting assistance for uninterrupted internet.</p>
                    <a href="/support/" class="fit-its-card-link">Get Support →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="fit-its-process">
        <div class="fit-its-title">
            <h2>Understand. Recommend. Support.</h2>
            <p>A simple, transparent process designed to get you back to work faster.</p>
        </div>
        <div class="fit-its-process-inner">
            <div class="fit-its-step">
                <div class="fit-its-step-num">1</div>
                <h4>Tell Us Your Requirement</h4>
                <p>Reach out with your IT problem or hardware need. We listen first.</p>
            </div>
            <div class="fit-its-step">
                <div class="fit-its-step-num">2</div>
                <h4>We Understand Your Needs</h4>
                <p>Our experts analyze the situation to find the most practical approach.</p>
            </div>
            <div class="fit-its-step">
                <div class="fit-its-step-num">3</div>
                <h4>Discuss a Solution</h4>
                <p>We present a transparent, practical solution and pricing with no surprises.</p>
            </div>
            <div class="fit-its-step">
                <div class="fit-its-step-num">4</div>
                <h4>Move Forward</h4>
                <p>We execute the service efficiently and get you back on track.</p>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="fit-its-cta">
        <h2>Need Help With Your IT Setup?</h2>
        <p>Contact our team for professional assistance. We typically respond within 2-4 business hours.</p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="/support/" class="fit-btn fit-btn-primary" style="background: #00A896; color: #fff;">Submit a Ticket</a>
            <a href="/contact/" class="fit-btn" style="background: transparent; border: 2px solid #fff; color: #fff;">Contact Us</a>
        </div>
    </section>
</div>

<?php get_footer(); ?>