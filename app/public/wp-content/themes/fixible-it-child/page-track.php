<?php
/* Template Name: Track Order / Ticket */
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="fit-container" style="max-width: 800px;">
            
            <div style="text-align: center; margin-bottom: 40px;">
                <h1 class="fit-page-title">Track Your Request</h1>
                <p class="fit-page-subtitle">Enter your Reference Number (e.g., FIT-Q-2026-12345) to check the status.</p>
            </div>

            <div style="background: #fff; padding: 40px; border-radius: 8px; border: 1px solid #eaeaea; text-align: center;">
                <form id="fit-track-form">
                    <input type="text" id="track_ref" placeholder="Enter Reference Number" style="width: 100%; max-width: 400px; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 1rem; margin-bottom: 20px;" required>
                    <button type="submit" class="fit-btn fit-btn-primary" style="padding: 12px 30px; font-size: 1rem;">Track Now</button>
                </form>
                <div id="fit-track-result" style="margin-top: 30px; text-align: left;"></div>
            </div>

        </div>
    </main>
</div>

<?php get_footer(); ?>