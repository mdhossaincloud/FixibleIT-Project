<?php
/**
 * The template for displaying the footer
 */
?>

<style>
/* =========================================================
   PREMIUM FOOTER STYLES
   ========================================================= */
.fit-footer {
    background-color: #102A35 !important;
    color: #b0c4de !important;
    padding: 70px 20px 20px 20px !important;
    margin-top: 80px !important;
    font-family: 'Inter', sans-serif !important;
}

.fit-footer-inner {
    max-width: 1200px !important;
    margin: 0 auto !important;
    display: grid !important;
    grid-template-columns: repeat(4, 1fr) !important;
    gap: 40px !important;
}

.fit-footer-col h4 {
    color: #FFFFFF !important;
    font-size: 1.15rem !important;
    font-weight: 700 !important;
    margin-bottom: 20px !important;
    position: relative !important;
    padding-bottom: 12px !important;
}
.fit-footer-col h4::after {
    content: '' !important;
    position: absolute !important;
    left: 0 !important;
    bottom: 0 !important;
    width: 40px !important;
    height: 2px !important;
    background-color: #00A896 !important;
}

.fit-footer-col p {
    font-size: 0.95rem !important;
    line-height: 1.7 !important;
    margin-bottom: 15px !important;
}

.fit-footer-col ul {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}
.fit-footer-col ul li {
    margin-bottom: 12px !important;
}
.fit-footer-col ul li a {
    color: #b0c4de !important;
    text-decoration: none !important;
    font-size: 0.95rem !important;
    transition: all 0.25s ease !important;
    display: inline-block !important;
}
.fit-footer-col ul li a:hover {
    color: #00A896 !important;
    transform: translateX(5px) !important;
}

/* Contact Info Block */
.fit-footer-contact li {
    display: flex !important;
    align-items: flex-start !important;
    gap: 12px !important;
    font-size: 0.95rem !important;
    line-height: 1.5 !important;
}
.fit-footer-contact li span {
    color: #00A896 !important;
    font-size: 1.2rem !important;
    margin-top: 2px !important;
}

/* Footer Bottom */
.fit-footer-bottom {
    max-width: 1200px !important;
    margin: 50px auto 0 auto !important;
    padding-top: 20px !important;
    border-top: 1px solid rgba(255,255,255,0.1) !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    flex-wrap: wrap !important;
    gap: 15px !important;
    font-size: 0.85rem !important;
}
.fit-footer-bottom p {
    margin: 0 !important;
}
.fit-footer-payments {
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    color: #FFFFFF !important;
    font-weight: 600 !important;
}

/* Responsive */
@media (max-width: 992px) {
    .fit-footer-inner {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}
@media (max-width: 768px) {
    .fit-footer-inner {
        grid-template-columns: 1fr !important;
    }
    .fit-footer-bottom {
        flex-direction: column !important;
        text-align: center !important;
    }
}
</style>

<footer class="fit-footer">
    <div class="fit-footer-inner">
        
        <!-- Column 1: About -->
        <div class="fit-footer-col">
            <h4>Fixible IT</h4>
            <p>Your premier destination for genuine PC components, advanced custom builds, and professional IT services in Bangladesh.</p>
            <p><strong>Business Hours:</strong><br>10:00 AM - 10:00 PM</p>
        </div>

        <!-- Column 2: Quick Links -->
        <div class="fit-footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/shop/">Shop Products</a></li>
                <li><a href="/pc-builder/">Advanced PC Builder</a></li>
                <li><a href="/it-services/">IT Services</a></li>
                <li><a href="/about-us/">About Us</a></li>
                <li><a href="/contact/">Contact Us</a></li>
            </ul>
        </div>

        <!-- Column 3: Customer Support -->
        <div class="fit-footer-col">
            <h4>Customer Support</h4>
            <ul>
                <li><a href="/support/">Technical Support Portal</a></li>
                <li><a href="/track-order/">Track Your Order</a></li>
                <li><a href="/compare/">Compare Products</a></li>
                <li><a href="/legal/">Terms & Conditions</a></li>
                <li><a href="/legal/">Privacy Policy</a></li>
            </ul>
        </div>

        <!-- Column 4: Contact Info -->
        <div class="fit-footer-col">
            <h4>Get in Touch</h4>
            <ul class="fit-footer-contact">
                <li>
                    <span>📍</span>
                    <div>Baigartek, Sagupta R/A,<br>Pallabi, Mirpur 12,<br>Dhaka, Bangladesh.</div>
                </li>
                <li>
                    <span>📞</span>
                    <div>+880 1608 630784<br><small>(Call & WhatsApp)</small></div>
                </li>
                <li>
                    <span>✉️</span>
                    <div>fixibleit@gmail.com</div>
                </li>
            </ul>
        </div>

    </div>

    <!-- Footer Bottom -->
    <div class="fit-footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Fixible IT. All Rights Reserved.</p>
        <div class="fit-footer-payments">
            <span>💳 Cash on Delivery</span>
            <span>🚚 Steadfast Courier</span>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/8801608630784" target="_blank" class="fit-whatsapp-float" title="Chat with us on WhatsApp">
    <svg width="35" height="35" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg"><path d="M12.031 0C5.385 0 0 5.384 0 12.031c0 2.127.553 4.198 1.603 6.023L.155 24l6.104-1.603A11.956 11.956 0 0012.03 24c6.646 0 12.031-5.385 12.031-12.031S18.677 0 12.031 0zm0 21.985a9.93 9.93 0 01-5.078-1.393l-.364-.216-3.774.99.997-3.68-.237-.377A9.919 9.919 0 012.045 12.03c0-5.504 4.478-9.982 9.982-9.982 5.504 0 9.982 4.478 9.982 9.982s-4.478 9.985-9.982 9.985zm5.477-7.487c-.3-.15-1.774-.876-2.049-.976-.276-.1-.476-.15-.676.15-.2.3-.775.976-.95 1.176-.175.2-.35.225-.65.075-.3-.15-1.267-.467-2.413-1.488-.892-.795-1.495-1.777-1.67-2.077-.175-.3-.018-.462.132-.612.135-.134.3-.35.45-.525.15-.175.2-.3.3-.5.1-.2.05-.375-.025-.525-.075-.15-.676-1.625-.926-2.225-.244-.584-.493-.505-.676-.514-.175-.008-.375-.01-.575-.01-.2 0-.525.075-.8.375-.275.3-1.05 1.025-1.05 2.5s1.075 2.9 1.225 3.1c.15.2 2.115 3.229 5.125 4.525.716.309 1.275.493 1.712.631.75.238 1.434.204 1.975.124.618-.092 1.774-.725 2.024-1.425.25-.7.25-1.3.175-1.425-.075-.125-.275-.2-.575-.35z"/></svg>
</a>

<!-- Compare Floating Bar -->
<?php if ( is_shop() || is_product_category() || is_product() ) : ?>
<div id="fit-compare-bar">
    <div class="fit-compare-inner">
        <span>You have <strong id="fit-compare-count">0</strong> products to compare.</span>
        <a href="/compare/">Compare Now →</a>
    </div>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>