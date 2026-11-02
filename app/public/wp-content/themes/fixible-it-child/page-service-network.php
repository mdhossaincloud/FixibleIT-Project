<?php
/* Template Name: Service - Network */
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fit-container">
            <div class="fit-about-hero" style="text-align: center; margin-bottom: 40px;">
                <h1 class="fit-page-title">Office Network Infrastructure</h1>
                <p class="fit-page-subtitle">Reliable, scalable networking for your office.</p>
            </div>
            
            <div class="fit-service-page-layout">
                <div class="fit-service-content-card">
                    <h3 style="color:var(--fit-navy); margin-bottom:20px; font-size: 1.4rem;">What we offer:</h3>
                    <ul class="fit-premium-list">
                        <li>Structured Cat6/Cat6A cabling</li>
                        <li>LAN infrastructure planning</li>
                        <li>Switch installation & configuration</li>
                        <li>Business Wi-Fi & access point deployment</li>
                        <li>VLAN implementation</li>
                        <li>Network testing & documentation</li>
                    </ul>
                </div>
                <div class="fit-service-form-col">
                    <div class="fit-support-form-card">
                        <div class="fit-service-form-wrap">
                            <?php echo do_shortcode('[fit_service_form type="Network Infrastructure"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>