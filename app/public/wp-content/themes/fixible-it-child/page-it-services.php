<?php
/* Template Name: Fixible IT Services */
get_header(); ?>

<style>
/* Scoped CSS for IT Services */
.fit-its-wrapper { background-color: #F8F9FA; font-family: 'Inter', sans-serif; }
.fit-its-hero { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; padding: 80px 20px; max-width: 1200px; margin: 0 auto; }
.fit-its-hero-content h1 { font-size: 3rem; color: #102A35; font-weight: 800; margin-bottom: 20px; line-height: 1.2; }
.fit-its-hero-content p { font-size: 1.1rem; color: #6C757D; margin-bottom: 30px; }
.fit-its-hero-image img { width: 100%; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); object-fit: cover; aspect-ratio: 4/3; }
.fit-its-section { padding: 80px 20px; max-width: 1200px; margin: 0 auto; }
.fit-its-title { text-align: center; margin-bottom: 50px; }
.fit-its-title h2 { font-size: 2.2rem; color: #102A35; font-weight: 700; margin-bottom: 10px; }
.fit-its-title p { color: #6C757D; font-size: 1.1rem; }
.fit-its-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
.fit-its-card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(16,42,53,0.05); transition: transform 0.3s ease; }
.fit-its-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
.fit-its-card img { width: 100%; height: 200px; object-fit: cover; }
.fit-its-card-body { padding: 25px; }
.fit-its-card-body h3 { font-size: 1.3rem; color: #102A35; margin-bottom: 10px; font-weight: 700; }
.fit-its-card-body p { font-size: 0.95rem; color: #6C757D; line-height: 1.6; }
.fit-its-process { background: #fff; padding: 80px 20px; }
.fit-its-process-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; text-align: center; }
.fit-its-step-num { background: #00A896; color: #fff; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 1.2rem; font-weight: bold; margin: 0 auto 15px; }
.fit-its-step h4 { color: #102A35; font-size: 1.1rem; margin-bottom: 10px; }
.fit-its-step p { color: #6C757D; font-size: 0.9rem; }
.fit-its-cta { background: #102A35; color: #fff; padding: 60px 20px; text-align: center; border-radius: 12px; max-width: 1200px; margin: 40px auto; }
.fit-its-cta h2 { font-size: 2rem; margin-bottom: 15px; }
.fit-its-cta p { margin-bottom: 25px; color: #ccc; }
@media (max-width: 992px) {
    .fit-its-hero { grid-template-columns: 1fr; padding: 40px 20px; }
    .fit-its-grid { grid-template-columns: repeat(2, 1fr); }
    .fit-its-process-inner { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 576px) {
    .fit-its-grid { grid-template-columns: 1fr; }
    .fit-its-process-inner { grid-template-columns: 1fr; gap: 30px; }
    .fit-its-hero-content h1 { font-size: 2.2rem; }
}
</style>

<div class="fit-its-wrapper">
    <!-- Hero Section -->
    <section class="fit-its-hero">
        <div class="fit-its-hero-content">
            <h1>IT Solutions That Keep You Moving.</h1>
            <p>Professional computer, hardware and networking support for your everyday technology needs.</p>
            <a href="/support/" class="fit-btn fit-btn-primary" style="margin-right: 15px;">Request IT Support</a>
            <a href="#services" class="fit-btn fit-btn-outline">Explore Services</a>
        </div>
        <div class="fit-its-hero-image">
            <!-- ID-042: Hero Image -->
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-042__fixibleit-service-computer-repair.jpg" alt="Computer Repair Service" loading="eager">
        </div>
    </section>

    <!-- Services Grid -->
    <section id="services" class="fit-its-section">
        <div class="fit-its-title">
            <h2>What We Do</h2>
            <p>Comprehensive IT services tailored for your needs.</p>
        </div>
        <div class="fit-its-grid">
            <!-- Card 1 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-042__fixibleit-service-computer-repair.jpg" alt="Desktop & Laptop Repair" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Desktop & Laptop Repair</h3>
                    <p>Hardware inspection, troubleshooting and repair assistance.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-048__fixibleit-service-pc-assembly.jpg" alt="PC Assembly & Hardware Upgrade" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>PC Assembly & Upgrade</h3>
                    <p>Custom PC assembly, component upgrades and hardware compatibility guidance.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-050__fixibleit-service-hardware-installation.jpg" alt="Hardware Installation" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Hardware Installation</h3>
                    <p>Component installation, hardware setup and compatibility checks.</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-053__fixibleit-service-network-installation.jpg" alt="LAN & Network Setup" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>LAN & Network Setup</h3>
                    <p>Structured cabling, local network installation and basic network setup.</p>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-054__fixibleit-service-hardware-maintenance.jpg" alt="Computer Maintenance" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Maintenance & Diagnostics</h3>
                    <p>Hardware checks, issue identification and maintenance assistance.</p>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="fit-its-card">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-060__fixibleit-service-router-connectivity.jpg" alt="Router & Wi-Fi Configuration" loading="lazy">
                <div class="fit-its-card-body">
                    <h3>Router & Wi-Fi Config</h3>
                    <p>Router setup, connectivity configuration and troubleshooting assistance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="fit-its-process">
        <div class="fit-its-title">
            <h2>A Simple Process. Practical Solutions.</h2>
        </div>
        <div class="fit-its-process-inner">
            <div class="fit-its-step">
                <div class="fit-its-step-num">1</div>
                <h4>Tell Us Your Requirement</h4>
                <p>Reach out with your IT problem or hardware need.</p>
            </div>
            <div class="fit-its-step">
                <div class="fit-its-step-num">2</div>
                <h4>We Understand Your Needs</h4>
                <p>Our experts analyze the situation to find the best approach.</p>
            </div>
            <div class="fit-its-step">
                <div class="fit-its-step-num">3</div>
                <h4>Discuss a Solution</h4>
                <p>We present a transparent, practical solution and pricing.</p>
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
        <p>Contact our team for professional assistance.</p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="/support/" class="fit-btn fit-btn-primary">Request a Service</a>
            <a href="/contact/" class="fit-btn fit-btn-outline" style="border-color: #fff; color: #fff;">Contact Us</a>
        </div>
    </section>
</div>

<?php get_footer(); ?>