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

<?php wp_footer(); ?>
</body>
</html>