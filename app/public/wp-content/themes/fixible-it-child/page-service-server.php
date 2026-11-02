<?php
/* Template Name: Service - Server IT */
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fit-container">
            <div class="fit-about-hero" style="text-align: center; margin-bottom: 40px;">
                <h1 class="fit-page-title">Server & Office IT Infrastructure</h1>
                <p class="fit-page-subtitle">Robust server room setup and office IT deployment.</p>
            </div>
            
            <div class="fit-service-page-layout">
                <div class="fit-service-content-card">
                    <h3 style="color:var(--fit-navy); margin-bottom:20px; font-size: 1.4rem;">Our Infrastructure Services:</h3>
                    <ul class="fit-premium-list">
                        <li>Physical server installation</li>
                        <li>Rack, UPS, and PDU installation</li>
                        <li>Patch panel and switch integration</li>
                        <li>Small server-room preparation</li>
                        <li>Workstation deployment</li>
                        <li>IT inventory documentation</li>
                    </ul>
                </div>
                <div class="fit-service-form-col">
                    <div class="fit-support-form-card">
                        <div class="fit-service-form-wrap">
                            <?php echo do_shortcode('[fit_service_form type="Server & IT Infrastructure"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>