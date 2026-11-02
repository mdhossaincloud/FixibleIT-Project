# FIXIBLE IT - PROTECTED DESIGN & ARCHITECTURE STANDARD
- **PRIORITY:** CRITICAL (DO NOT BREAK)
- **STATUS:** PROTECTED
- **LAST UPDATED:** November 2026

## 1. Brand Identity & Colors
- **Primary Navy:** `#102A35` (Headings, Main Text, Dark Buttons)
- **Primary Teal:** `#00A896` (Brand Accent, Primary Buttons, Hover States)
- **Teal Dark:** `#007A6D` (Text Highlights)
- **Off-White:** `#F8F9FA` (Page Backgrounds)
- **White:** `#FFFFFF` (Card Backgrounds)
- **Border:** `#EAEAEA` or `#E2E8F0` (Subtle Borders)

## 2. Typography
- **Font Family:** 'Inter', sans-serif
- **Headings:** Bold (700/800), Color: Navy
- **Body:** Regular (400/500), Color: Muted Gray (#6C757D)

## 3. Button & Interaction System
- **Primary Button (`.fit-btn` / `.fit-btn-primary`):** Teal background, White text, Border-radius: 8px.
- **Secondary Button (`.fit-btn-navy`):** Navy background, White text.
- **Hover Effects:** MUST have `transform: translateY(-2px)` and smooth shadow (`transition: all 0.25s ease`).
- **Compare Button:** Height: 52px, Width: auto (not full width), Margin-top: 25px.

## 4. Page Layout Architecture (CRITICAL RULES)
- **Cart & Checkout:** Must use 2-column Grid. Left side items/form, Right side summary. Do NOT let Kadence theme override this.
- **PC Builder:** Must use Grid layout (`1fr 350px`). Sticky summary on right.
- **Shop Page:** Grid layout (`280px 1fr`). Sidebar filter on left.
- **No Global Overwrites:** Never use `display: block` on Kadence wrappers globally. Use Scoped CSS inside PHP files (like `page-pc-builder.php`) to ensure 100% isolation.

## 5. Theme Override Rules
- **Kadence WooCommerce CSS:** The default Kadence Woo CSS (`kadence-woocommerce`) is dequeued via `functions.php` on Cart, Checkout, and PC Builder pages to prevent layout collapsing.
- **Protected Pages:** Homepage and IT Services page are LOCKED. Do not touch their layout, PHP files, or specific CSS.

## 6. Production Constraints (For Next Phase)
- **Asset Versioning:** Replace `time()` in `functions.php` with a static string (e.g., `'1.0.0'`) for production caching.
- **Database:** Custom tables (`wp_fit_quotes`, `wp_fit_tickets`, `wp_fit_service_enquiries`) must be verified after migration.