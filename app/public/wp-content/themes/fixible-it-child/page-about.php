<?php
/* Template Name: Fixible About Us - Premium V2 */
get_header(); ?>

<style>
/* =========================================================
   PREMIUM ABOUT US PAGE (V2 - PROFESSIONAL & CAREER FOCUSED)
   ========================================================= */
body.page-template-page-about { background-color: #F8F9FA !important; }
.fit-about-wrapper { font-family: 'Inter', sans-serif; overflow-x: hidden; }

/* 1. Premium Hero Section with Background Image */
.fit-about-hero { 
    position: relative; 
    text-align: center; 
    padding: 140px 20px; 
    /* New Image: ID-066 (SSD Memory) */
    background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-066__fixibleit-category-ssd-memory.jpg?v=202611051234?v=202611051230');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
/* Dark Navy Overlay for Text Readability */
.fit-about-hero::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(16, 42, 53, 0.85); /* Deep Navy Glass Overlay */
    z-index: 1;
}
.fit-about-hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
}
.fit-about-hero h1 { 
    font-size: 3.4rem; 
    color: #FFFFFF !important; /* White text */
    font-weight: 800; 
    margin-bottom: 20px; 
    letter-spacing: -0.5px; 
    line-height: 1.2; 
}
.fit-about-hero p { 
    font-size: 1.25rem; 
    color: #E2E8F0 !important; /* Light grey text */
    max-width: 800px; 
    margin: 0 auto; 
    line-height: 1.6; 
}

/* 2. Why Choose Us (Customer Advantages) */
.fit-about-why { padding: 80px 20px; background: #FFFFFF; text-align: center; }
.fit-about-why h2 { font-size: 2.4rem; color: #102A35; font-weight: 800; margin-bottom: 15px; }
.fit-about-why p.sub { font-size: 1.1rem; color: #6C757D; max-width: 700px; margin: 0 auto 50px; }
.fit-about-why-grid { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; }
.fit-why-card { background: #F8F9FA; padding: 35px 25px; border-radius: 16px; border: 1px solid #EAEAEA; text-align: left; transition: all 0.3s ease; }
.fit-why-card:hover { background: #FFFFFF; border-color: #00A896; box-shadow: 0 10px 30px rgba(0,168,150,0.08); transform: translateY(-5px); }
.fit-why-icon { font-size: 2rem; margin-bottom: 15px; }
.fit-why-card h4 { font-size: 1.15rem; color: #102A35; font-weight: 700; margin-bottom: 10px; }
.fit-why-card p { font-size: 0.95rem; color: #6C757D; line-height: 1.6; margin: 0; }

/* 3. General Section Layout */
.fit-about-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
.fit-about-section { padding: 90px 0; display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
.fit-about-section.reverse { direction: rtl; }
.fit-about-section.reverse .fit-about-content { direction: ltr; }
.fit-about-content h2 { font-size: 2.4rem; color: #102A35; font-weight: 800; margin-bottom: 20px; line-height: 1.2; letter-spacing: -0.5px; }
.fit-about-content p { font-size: 1.05rem; color: #4B5563; line-height: 1.8; margin-bottom: 15px; }
.fit-about-content ul { list-style: none; padding: 0; margin: 20px 0 0 0; }
.fit-about-content li { font-size: 1.05rem; color: #102A35; font-weight: 500; margin-bottom: 12px; display: flex; align-items: flex-start; gap: 10px; }
.fit-about-content li span { color: #00A896; font-size: 1.2rem; line-height: 1.5; }

/* 4. Premium Image Hover Styling */
.fit-about-image { position: relative; }
.fit-about-image img {
    width: 100%; 
    height: 400px; 
    object-fit: cover; 
    border-radius: 20px; 
    box-shadow: 0 10px 30px rgba(16,42,53,0.06); 
    display: block;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}
.fit-about-image:hover img { 
    transform: translateY(-8px) scale(1.02); 
    box-shadow: 0 20px 50px rgba(16,42,53,0.15); 
}

/* 5. Life at Fixible IT (Career Advantages) */
.fit-about-careers { padding: 90px 20px; background: #102A35; color: #FFFFFF; }
.fit-about-careers .fit-about-container { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 60px; align-items: center; }
.fit-about-careers h2 { color: #FFFFFF; font-size: 2.6rem; font-weight: 800; margin-bottom: 20px; }
.fit-about-careers p { color: #B0C4DE; font-size: 1.05rem; line-height: 1.8; margin-bottom: 30px; }
.fit-career-list { list-style: none; padding: 0; margin: 0; }
.fit-career-list li { display: flex; align-items: flex-start; gap: 15px; margin-bottom: 20px; font-size: 1.05rem; color: #E2E8F0; }
.fit-career-list li span { color: #00A896; font-size: 1.4rem; line-height: 1; }

.fit-about-careers img { 
    width: 100%; 
    border-radius: 20px; 
    box-shadow: 0 15px 40px rgba(0,0,0,0.3); 
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
}
.fit-about-careers img:hover { 
    transform: translateY(-8px) scale(1.02); 
    box-shadow: 0 25px 60px rgba(0, 168, 150, 0.2); 
}

/* 6. Values Grid */
.fit-about-values { background: #FFFFFF; padding: 90px 20px; text-align: center; border-top: 1px solid #F1F5F9; }
.fit-about-values h2 { color: #102A35; font-size: 2.4rem; margin-bottom: 10px; font-weight: 800; }
.fit-about-values-grid { max-width: 1200px; margin: 50px auto 0; display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; }
.fit-about-value-item { background: #F8F9FA; padding: 35px 25px; border: 1px solid #EAEAEA; border-radius: 16px; transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; text-align: center; }
.fit-about-value-item:hover { background: #FFFFFF; border-color: #00A896; box-shadow: 0 10px 30px rgba(0,168,150,0.08); transform: translateY(-5px); }
.fit-about-value-item h4 { color: #102A35; font-size: 1.2rem; margin-bottom: 12px; font-weight: 700; }
.fit-about-value-item p { color: #6C757D; font-size: 0.95rem; line-height: 1.6; margin: 0; }

/* 7. Responsive */
@media (max-width: 992px) {
    .fit-about-hero { padding: 100px 20px; background-attachment: scroll; }
    .fit-about-why-grid { grid-template-columns: repeat(2, 1fr); }
    .fit-about-section { grid-template-columns: 1fr; padding: 60px 0; gap: 40px; }
    .fit-about-section.reverse { direction: ltr; }
    .fit-about-image img { height: 300px; }
    .fit-about-careers .fit-about-container { grid-template-columns: 1fr; gap: 40px; }
    .fit-about-values-grid { grid-template-columns: repeat(2, 1fr); }
    .fit-about-hero h1 { font-size: 2.4rem; }
}
@media (max-width: 576px) {
    .fit-about-why-grid { grid-template-columns: 1fr; }
    .fit-about-values-grid { grid-template-columns: 1fr; }
    .fit-about-hero h1 { font-size: 2rem; }
    .fit-about-content h2 { font-size: 1.8rem; }
    .fit-about-image img { height: 250px; }
}
</style>

<div class="fit-about-wrapper">
    <!-- 1. Premium Hero Section -->
    <section class="fit-about-hero">
        <div class="fit-about-hero-content">
            <h1>Technology Made Practical.<br>Solutions Made Personal.</h1>
            <p>We don't just sell IT products. We build technology partnerships that help individuals and businesses move forward with clarity and confidence.</p>
        </div>
    </section>

    <!-- 2. Why Choose Us -->
    <section class="fit-about-why">
        <h2>Why Choose Fixible IT?</h2>
        <p class="sub">We combine genuine products, practical expertise, and a customer-first approach to deliver an effortless technology experience.</p>
        <div class="fit-about-why-grid">
            <div class="fit-why-card">
                <div class="fit-why-icon">🛡️</div>
                <h4>100% Genuine Products</h4>
                <p>We source authentic components and hardware with official warranty support, so you never have to compromise on reliability.</p>
            </div>
            <div class="fit-why-card">
                <div class="fit-why-icon">⚡</div>
                <h4>Proactive, Local Support</h4>
                <p>Our team is local, responsive, and ready to solve issues before they disrupt your workflow—no long queues, no endless tickets.</p>
            </div>
            <div class="fit-why-card">
                <div class="fit-why-icon">💡</div>
                <h4>Practical Recommendations</h4>
                <p>We listen first. Then we recommend the right solution for your budget and requirements—not the most expensive one.</p>
            </div>
            <div class="fit-why-card">
                <div class="fit-why-icon">🤝</div>
                <h4>Long-Term Partnership</h4>
                <p>We focus on outcomes, not activity. Our goal is to be your trusted technology partner for years, not just for a single sale.</p>
            </div>
        </div>
    </section>

    <div class="fit-about-container">
        <!-- 3. Our Story -->
        <section class="fit-about-section">
            <div class="fit-about-content">
                <h2>Built Around Your Technology Needs</h2>
                <p>Fixible IT brings computer products, PC customization, and practical IT solutions together to help individuals and businesses make better technology decisions.</p>
                <p>Our focus is simple: understand real requirements, offer suitable products, and provide guidance that actually helps you move forward.</p>
            </div>
            <div class="fit-about-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-010__fixibleit-about-company-environment.jpg" alt="Fixible IT Company Environment" loading="lazy">
            </div>
        </section>

        <!-- 4. Our Approach -->
        <section class="fit-about-section reverse">
            <div class="fit-about-content">
                <h2>Understand. Recommend. Support.</h2>
                <p>We believe the right technology solution starts with understanding the actual requirement—not with a sales pitch.</p>
                <ul>
                    <li><span>✔</span> <div><strong>Understand —</strong> We learn what you actually need, your constraints, and your goals.</div></li>
                    <li><span>✔</span> <div><strong>Recommend —</strong> We suggest practical, suitable solutions that fit your budget and use case.</div></li>
                    <li><span>✔</span> <div><strong>Support —</strong> We help you implement and maintain the solution with clarity and confidence.</div></li>
                </ul>
            </div>
            <div class="fit-about-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-038__fixibleit-about-customer-approach.jpg" alt="Customer-focused Approach" loading="lazy">
            </div>
        </section>

        <!-- 5. Technical Expertise -->
        <section class="fit-about-section">
            <div class="fit-about-content">
                <h2>Practical Knowledge. Technology That Works.</h2>
                <p>From computer components and custom PC builds to hardware troubleshooting and networking, our expertise covers the full spectrum of IT.</p>
                <ul>
                    <li><span>✔</span> Computer components and genuine hardware.</li>
                    <li><span>✔</span> Custom PC builds and performance upgrades.</li>
                    <li><span>✔</span> Hardware troubleshooting and repair.</li>
                    <li><span>✔</span> Networking, installation, and IT support.</li>
                </ul>
            </div>
            <div class="fit-about-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-058__fixibleit-about-technical-expertise.jpg" alt="Technical Expertise" loading="lazy">
            </div>
        </section>
    </div>

    <!-- 6. Life at Fixible IT (Career Advantages) -->
    <section class="fit-about-careers">
        <div class="fit-about-container">
            <div>
                <h2>Build Your Career with Fixible IT</h2>
                <p>We are building the next generation of technology services in Bangladesh. If you love solving problems, take ownership of your work, and want to make a visible difference—we want to hear from you.</p>
                <ul class="fit-career-list">
                    <li><span>✦</span> <div><strong>Ownership & Growth:</strong> We give you real responsibility from day one. You will learn fast, take initiative, and see the impact of your work.</div></li>
                    <li><span>✦</span> <div><strong>Modern Technology Stack:</strong> Work with genuine hardware, custom builds, networking, and cloud-ready IT solutions—not outdated systems.</div></li>
                    <li><span>✦</span> <div><strong>Collaborative Culture:</strong> Join a smart, capable team that values clear thinking, strong execution, and mutual respect.</div></li>
                    <li><span>✦</span> <div><strong>Real Impact:</strong> Your work directly helps local businesses and individuals use technology better—every single day.</div></li>
                </ul>
            </div>
            <div>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-039__fixibleit-homepage-workstation-feature.jpg" alt="Life at Fixible IT" loading="lazy">
            </div>
        </div>
    </section>

    <!-- 7. Our Vision -->
    <div class="fit-about-container" style="padding-top: 40px; padding-bottom: 40px;">
        <section class="fit-about-section reverse" style="padding: 40px 0;">
            <div class="fit-about-content">
                <h2>Our Vision</h2>
                <p>To become Bangladesh's most trusted technology destination—where individuals and businesses can access genuine products, practical solutions, and expert guidance without complexity.</p>
            </div>
            <div class="fit-about-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ui/ID-063__fixibleit-about-technology-vision.png" alt="Technology Vision" loading="lazy">
            </div>
        </section>
    </div>

    <!-- 8. Core Values -->
    <section class="fit-about-values">
        <h2>Our Core Values</h2>
        <div class="fit-about-values-grid">
            <div class="fit-about-value-item">
                <h4>People Over Tickets</h4>
                <p>We prioritize real conversations and genuine help over robotic processes.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Practical Recommendations</h4>
                <p>We suggest solutions that actually work for your budget and use case.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Quality-Conscious Choices</h4>
                <p>We prioritize reliability, authenticity, and long-term performance.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Clear Communication</h4>
                <p>No confusing jargon—just straightforward advice you can trust.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Continuous Improvement</h4>
                <p>We constantly learn, adapt, and stay ahead of new technologies.</p>
            </div>
            <div class="fit-about-value-item">
                <h4>Accountability</h4>
                <p>We own our work, follow through on commitments, and deliver results.</p>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>