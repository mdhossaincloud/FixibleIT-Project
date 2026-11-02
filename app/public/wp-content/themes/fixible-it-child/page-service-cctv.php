<?php
/* Template Name: Service - CCTV */
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fit-container">
            <div class="fit-about-hero" style="text-align: center; margin-bottom: 40px;">
                <h1 class="fit-page-title">CCTV Surveillance Solutions</h1>
                <p class="fit-page-subtitle">Secure your premises with professional-grade surveillance.</p>
            </div>
            
            <div class="fit-service-page-layout">
                <div class="fit-service-content-card">
                    <h3 style="color:var(--fit-navy); margin-bottom:20px; font-size: 1.4rem;">Our CCTV Services:</h3>
                    <ul class="fit-premium-list">
                        <li>Analog HD, IP, and Wi-Fi CCTV solutions</li>
                        <li>DVR/XVR/NVR installation</li>
                        <li>Camera placement and cabling</li>
                        <li>HDD and recording configuration</li>
                        <li>Remote viewing setup</li>
                        <li>Existing CCTV troubleshooting</li>
                    </ul>
                </div>
                <div class="fit-service-form-col">
                    <div class="fit-support-form-card">
                        <div class="fit-service-form-wrap">
                            <?php echo do_shortcode('[fit_service_form type="CCTV Surveillance"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>