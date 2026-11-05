<?php
/* Template Name: Fixible About Us */
get_header(); ?>

<style>
/* Scoped CSS for About Us */
.fit-about-wrapper { background-color: #F8F9FA; font-family: 'Inter', sans-serif; }
.fit-about-hero { text-align: center; padding: 80px 20px; background: #fff; }
.fit-about-hero h1 { font-size: 3rem; color: #102A35; font-weight: 800; margin-bottom: 20px; }
.fit-about-hero p { font-size: 1.2rem; color: #6C757D; max-width: 800px; margin: 0 auto; }
.fit-about-section { padding: 80px 20px; max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; }
.fit-about-section.reverse { direction: rtl; }
.fit-about-section.reverse .fit-about-content { direction: ltr; }
.fit-about-content h2 { font-size: 2.2rem; color: #102A35; font-weight: 700; margin-bottom: 20px; }
.fit-about-content p { font-size: 1rem; color: #4B5563; line-height: 1.8; margin-bottom: 15px; }
.fit-about-image img { width: 100%; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); aspect-ratio: 4/3; object-fit: cover; }
.fit-about-values { background: #fff; padding: 80px 20px; text-align: center; }
.fit-about-values-grid { max-width: 1200px; margin: 40px auto 0; display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
.fit-about-value-item { padding: 30px; border: 1px solid #EAEAEA; border-radius: 12px; transition: 0.3s; }
.fit-about-value-item:hover { border-color: #00A896; box-shadow: 0 5px 15px rgba(0,168,150,0.1); }
.fit-about-value-item h4 { color: #102A35; font-size: 1.2rem; margin-bottom: 10px; }
.fit-about-value-item p { color: #6C757D; font-size: 0.95rem; }
@media (max-width: 992px) {
    .fit-about-section { grid-template-columns: 1fr; }
    .fit-about-section.reverse { direction: ltr; }
    .fit-about-values-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 576px) {
    .fit-about-values-grid { grid-template-columns: 1fr; }
    .fit-about-hero h1 { font-size: 2.2rem; }
}
</style>

<div class="fit-about-wrapper">
    <!-- Hero -->
    <section class="fit-about-hero">
        <h1>Technology Made Practical. Solutions Made Personal.</h1>
        <p>Your trusted destination for computer products, custom PC solutions and practical IT services.</p>
    </section>

    <!-- Our Story -->
    <section class="fit-about-section">
        <div class="fit-about-content">
            <h2>Built Around Your Technology Needs</h2>
            <p>Fixible IT brings computer products, PC customization and practical IT solutions together to help individuals and businesses make better technology decisions.</p>
            <p>Our focus is on understanding real requirements and making technology more accessible through suitable products, practical solutions and helpful guidance.</p>
        </div>
        <div class="fit-about-image">
            <!-- ID-010: Company Environment -->
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-010__fixibleit-about-company-environment.jpg" alt="Fixible IT Company Environment" loading="lazy">
        </div>
    </section>

    <!-- Our Approach -->
    <section class="fit-about-section reverse" style="background: #fff; max-width: 100%; padding-left: 10%; padding-right: 10%;">
        <div class="fit-about-content">
            <h2>Understand. Recommend. Support.</h2>
            <p>We believe the right technology solution starts with understanding the actual requirement.</p>
            <p><strong>1. Understand —</strong> Learn what the customer actually needs.</p>
            <p><strong>2. Recommend —</strong> Suggest practical and suitable technology solutions.</p>
            <p><strong>3. Support —</strong> Help customers move forward with clarity and confidence.</p>
        </div>
        <div class="fit-about-image">
            <!-- ID-038: Customer Approach -->
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-038__fixibleit-about-customer-approach.jpg" alt="Customer-focused Approach" loading="lazy">
        </div>
    </section>

    <!-- Technical Expertise -->
    <section class="fit-about-section">
        <div class="fit-about-content">
            <h2>Practical Knowledge. Technology That Works.</h2>
            <p>From computer components and custom PC builds to hardware troubleshooting and networking, our expertise covers the full spectrum of IT.</p>
            <ul style="list-style: none; padding: 0; color: #4B5563;">
                <li style="margin-bottom: 10px;">✔ Computer components and hardware.</li>
                <li style="margin-bottom: 10px;">✔ Custom PC builds and upgrades.</li>
                <li style="margin-bottom: 10px;">✔ Hardware troubleshooting.</li>
                <li style="margin-bottom: 10px;">✔ Installation and networking.</li>
            </ul>
        </div>
        <div class="fit-about-image">
            <!-- ID-058: Technical Expertise -->
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-058__fixibleit-about-technical-expertise.jpg" alt="Technical Expertise" loading="lazy">
        </div>
    </section>

    <!-- Our Vision -->
    <section class="fit-about-section reverse" style="background: #fff; max-width: 100%; padding-left: 10%; padding-right: 10%;">
        <div class="fit-about-content">
            <h2>Our Vision</h2>
            <p>Become a trusted technology destination for individuals and businesses. We aim to make technology accessible and practical for everyone.</p>
        </div>
        <div class="fit-about-image">
            <!-- ID-063: Technology Vision -->
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-063__fixibleit-about-technology-vision.png" alt="Technology Vision" loading="lazy">
        </div>
    </section>

    <!-- Core Values -->
    <section class="fit-about-values">
        <h2 style="color: #102A35; font-size: 2rem; margin-bottom: 10px;">Our Core Values</h2>
        <div class="fit-about-values-grid">
            <div class="fit-about-value-item">
                <h4>Customer-First Thinking</h4>
                <p>Your needs guide every decision we make.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Practical Recommendations</h4>
                <p>We suggest solutions that actually work for you.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Quality-Conscious Choices</h4>
                <p>We prioritize reliability and genuine products.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Clear Communication</h4>
                <p>No confusing jargon, just straightforward advice.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Continuous Improvement</h4>
                <p>We constantly learn and adapt to new technologies.</p>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>