<?php
/* Template Name: Legal Page */
get_header(); ?>
<div id="primary" class="content-area"><main class="site-main">
<div class="fit-container" style="max-width: 800px; padding: 60px 20px !important;">
    
    <h1 class="fit-page-title"><?php the_title(); ?></h1>
    <div style="background: var(--fit-white); padding: 40px; border-radius: 8px; border: 1px solid var(--fit-border); line-height: 1.8; color: var(--fit-muted);">
        <p><strong>Last Updated: October 2026</strong></p>
        <p>Welcome to Fixible IT. By using our website and services, you agree to the following policies.</p>
        
        <h3 style="color:var(--fit-navy); margin-top: 30px;">1. General Information</h3>
        <p>This is a placeholder for your <?php echo strtolower(get_the_title()); ?> details. You can edit this page directly from the WordPress admin panel to add your specific business policies.</p>
        
        <h3 style="color:var(--fit-navy); margin-top: 30px;">2. Policy Details</h3>
        <p>All products sold are subject to manufacturer warranty. Services are provided based on technical assessment. Please contact our support team for specific inquiries regarding returns, shipping timelines, or privacy concerns.</p>
        
        <h3 style="color:var(--fit-navy); margin-top: 30px;">3. Contact</h3>
        <p>For any questions, please email us at support@fixibleit.com or call +880 1700 000000.</p>
    </div>
</div>
</main></div>
<?php get_footer(); ?>