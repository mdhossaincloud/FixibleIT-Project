<?php
/* Template Name: Service - PC Repair */
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fit-container">
            <div class="fit-about-hero" style="text-align: center; margin-bottom: 40px;">
                <h1 class="fit-page-title">PC Repair & Upgrades</h1>
                <p class="fit-page-subtitle">Fast, reliable diagnostics and hardware upgrades.</p>
            </div>
            
            <div class="fit-service-page-layout">
                <div class="fit-service-content-card">
                    <h3 style="color:var(--fit-navy); margin-bottom:20px; font-size: 1.4rem;">Our Repair Services:</h3>
                    <ul class="fit-premium-list">
                        <li>Desktop and laptop diagnostics</li>
                        <li>Hardware troubleshooting</li>
                        <li>SSD and RAM upgrades</li>
                        <li>Windows and driver installation</li>
                        <li>Thermal paste & fan cleaning</li>
                        <li>Custom PC assembly</li>
                    </ul>
                </div>
                <div class="fit-service-form-col">
                    <div class="fit-support-form-card">
                        <div class="fit-service-form-wrap">
                            <?php echo do_shortcode('[fit_service_form type="PC Repair & Upgrade"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>