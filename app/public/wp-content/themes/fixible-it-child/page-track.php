<?php
/* Template Name: Track Order / Ticket */
get_header(); ?>

<style>
/* Premium Track Order UI */
body.page-template-page-track { background-color: #F8F9FA !important; }
.fit-track-wrapper { max-width: 700px !important; margin: 60px auto !important; padding: 0 20px !important; }
.fit-track-header { text-align: center; margin-bottom: 40px; }
.fit-track-header h1 { font-size: 2.5rem; font-weight: 800; color: #102A35; margin-bottom: 10px; }
.fit-track-header p { color: #64748B; font-size: 1.1rem; }
.fit-track-card { background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 20px; padding: 50px 40px; box-shadow: 0 15px 40px rgba(16,42,53,0.05); text-align: center; }
.fit-track-input { width: 100%; max-width: 450px; height: 56px; padding: 0 20px; border: 1px solid #CBD5E1; border-radius: 10px; font-size: 1.05rem; color: #102A35; margin-bottom: 20px; transition: 0.3s; box-sizing: border-box; }
.fit-track-input:focus { outline: none; border-color: #00A896; box-shadow: 0 0 0 4px rgba(0,168,150,0.15); }
.fit-track-btn { height: 56px; padding: 0 40px; background: #102A35; color: #FFF; border: none; border-radius: 10px; font-size: 1.05rem; font-weight: 700; cursor: pointer; transition: 0.3s; }
.fit-track-btn:hover { background: #00A896; transform: translateY(-2px); }
#fit-track-result { margin-top: 30px; text-align: left; }
.fit-track-result-box { background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 12px; padding: 25px; }
.fit-track-result-box h3 { margin-top: 0; color: #00A896; font-size: 1.3rem; font-weight: 800; margin-bottom: 15px; }
.fit-track-result-box p { margin-bottom: 10px; font-size: 1rem; color: #102A35; }
.fit-track-result-box strong { color: #64748B; font-weight: 600; display: inline-block; width: 100px; }
.fit-track-status { background: #00A896; color: #FFF; padding: 4px 12px; border-radius: 6px; font-weight: 700; font-size: 0.9rem; display: inline-block; }
</style>

<div class="fit-track-wrapper">
    <div class="fit-track-header">
        <h1>Track Your Request</h1>
        <p>Enter your WooCommerce Order ID (e.g., 1234) or Reference Number (e.g., FIT-Q-2026-12345).</p>
    </div>

    <div class="fit-track-card">
        <form id="fit-track-form">
            <input type="text" id="track_ref" class="fit-track-input" placeholder="Enter Order ID or Reference Number" required>
            <br>
            <button type="submit" class="fit-track-btn">Track Now</button>
        </form>
        <div id="fit-track-result"></div>
    </div>
</div>

<?php get_footer(); ?>