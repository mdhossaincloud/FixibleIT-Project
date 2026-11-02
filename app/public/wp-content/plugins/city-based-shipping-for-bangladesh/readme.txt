=== City Based Shipping for Bangladesh ===
Contributors: iamovk
Tags: woocommerce, shipping, bangladesh, checkout, rates
Requires at least: 5.8
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.1
License: GPL2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: city-based-shipping-for-bangladesh

Adds automatic city-based shipping rates for WooCommerce stores in Bangladesh (Dhaka vs outside Dhaka).


== Description ==

City Based Shipping for Bangladesh provides an easy way to configure different flat rate shipping costs for customers inside Dhaka and those elsewhere in Bangladesh.  Simply set up two WooCommerce Flat Rate methods in your shipping zone (one for Dhaka and one for outside Dhaka) and then configure their instance IDs and labels on the plugin settings page.  The plugin will hide the wrong rate at checkout and can even override the cost and label displayed.  City and state field changes update totals in real time thanks to a small JavaScript helper.

* Match shipping methods by instance ID or label.
* Optionally override the cost and label of each rate at checkout.
* Watches the city and state fields (including Select2 dropdowns) and refreshes shipping instantly.
* Tested with WooCommerce and the standard checkout fields; supports Bangladesh districts.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory or install it directly through the WordPress plugin installer.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to **WooCommerce → Settings → Shipping** and ensure you have a Flat Rate for Dhaka and another for outside Dhaka.  Note the instance IDs shown in the URL when editing each method.
4. Navigate to **WooCommerce → City Based Shipping** and enter:
    * The labels of your Dhaka and outside Dhaka shipping methods.
    * The instance IDs (optional but recommended for reliable matching).
    * Optionally, override costs for each rate if you wish to ignore WooCommerce flat rate settings.
5. Save changes.  Shipping options will now automatically adjust based on the customer’s selected city/state in checkout.

== Frequently Asked Questions ==

= Where do I find the method instance IDs? =

When editing a Flat Rate method in WooCommerce, look at the URL in your browser.  It will contain `instance_id=123`.  Use that number in the plugin settings for the corresponding rate.

= Does this work with City dropdowns instead of text inputs? =

Yes.  The included JavaScript listens for changes on both text inputs and dropdowns, including those enhanced with Select2.

= Can I use this plugin for countries other than Bangladesh? =

The plugin’s detection logic is tailored to Bangladesh.  It identifies Dhaka using the ISO 3166‑2 code `BD-13` (or just `13`) and by matching the city name (English and Bangla).  If you wish to adapt the plugin for other locales, you can fork it and adjust the `is_destination_dhaka()` method.

== Screenshots ==

1. Settings page showing options for labels, instance IDs and cost overrides.
2. Checkout page automatically showing the correct rate based on the selected city.

== Changelog ==

= 1.0.1 =
* Updated plugin header and slug to match WordPress.org guidelines.
* Added GPL license header and removed deprecated load_plugin_textdomain() call.
* Updated Tested up to header to WordPress 6.8.

= 1.0.0 =
* Initial release on WordPress.org.

== Upgrade Notice ==

= 1.0.1 =
This update aligns the plugin slug and text domain with WordPress.org expectations, adds a license header, and bumps the tested up to version.