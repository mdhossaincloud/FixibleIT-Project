<?php
/**
 * City Based Shipping for Bangladesh 
 *
 * Adds city/state‑aware shipping rates to WooCommerce for Bangladeshi stores.  The plugin
 * automatically selects the appropriate shipping method based on whether the customer
 * is located in Dhaka or anywhere else in Bangladesh.  You can match shipping rates
 * by the instance ID of your flat rate methods or by their labels, and you can
 * optionally override the costs and labels displayed at checkout.  The plugin
 * includes a settings page under WooCommerce → City Based Shipping where these
 * options can be configured.  It also listens for changes on the checkout city
 * and state fields via JavaScript so that shipping totals update immediately.
 *
 * @package   CityBasedShippingForBangladesh
 * @author    Md Shorov Abedin
 * @copyright Copyright (c) 2025, Md Shorov Abedin
 *
 * @wordpress-plugin
 * Plugin Name: City Based Shipping for Bangladesh
 * Plugin URI:  https://github.com/ovick1997/city-based-shipping-bd
 * Description: Adds city‑based shipping rates for WooCommerce stores in Bangladesh. Automatically picks the correct rate for Dhaka vs. all other districts, with optional cost and label overrides.
 * Version:     1.0.1
 * Author:      Md Shorov Abedin
 * Author URI:  https://shorovabedin.com
 * Text Domain: city-based-shipping-for-bangladesh
 * Domain Path: /languages
 * License:     GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.8
 * Tested up to: 6.8
 * Requires PHP: 7.4
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists( 'City_Based_Shipping_For_Bangladesh' ) ) {
    /**
     * Main plugin class.
     *
     * Handles plugin initialization, settings, shipping rate filtering and
     * front‑end scripts.  Implements the singleton pattern to avoid
     * multiple instantiations.
     */
    class City_Based_Shipping_For_Bangladesh {
        /**
         * Option key used to store plugin settings.
         *
         * @var string
         */
        const OPTION_KEY = 'city_based_shipping_bd_options';

        /**
         * Current plugin version.
         *
         * @var string
         */
        const VERSION = '1.0.1';

        /**
         * Singleton instance.
         *
         * @var self|null
         */
        private static $instance = null;

        /**
         * Returns the singleton instance.
         *
         * @return self
         */
        public static function instance() {
            if ( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor.
         *
         * Registers hooks on instantiation.  The constructor is
         * private to enforce the singleton pattern.
         */
        private function __construct() {
            // No need to call load_plugin_textdomain() when hosted on WordPress.org.
            if ( is_admin() ) {
                add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
                add_action( 'admin_init', array( $this, 'register_settings' ) );
            }
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
            add_filter( 'woocommerce_package_rates', array( $this, 'filter_shipping_rates' ), 999, 2 );
        }

        /**
         * Adds the settings submenu under WooCommerce.
         *
         * @return void
         */
        public function add_settings_page() {
            add_submenu_page(
                'woocommerce',
                __( 'City Based Shipping', 'city-based-shipping-for-bangladesh' ),
                __( 'City Based Shipping', 'city-based-shipping-for-bangladesh' ),
                'manage_options',
                'city-based-shipping-for-bangladesh',
                array( $this, 'render_settings_page' )
            );
        }

        /**
         * Registers plugin settings using the WordPress Settings API.
         *
         * @return void
         */
        public function register_settings() {
            register_setting( 'city_based_shipping_bd', self::OPTION_KEY, array( $this, 'sanitize_options' ) );

            add_settings_section(
                'city_based_shipping_bd_general',
                __( 'General Settings', 'city-based-shipping-for-bangladesh' ),
                '__return_false',
                'city_based_shipping_bd'
            );

            add_settings_field(
                'inside_label',
                __( 'Inside Dhaka Label', 'city-based-shipping-for-bangladesh' ),
                array( $this, 'render_text_field' ),
                'city_based_shipping_bd',
                'city_based_shipping_bd_general',
                array(
                    'id'    => 'inside_label',
                    'label' => __( 'This should match the label of your Dhaka flat rate method.', 'city-based-shipping-for-bangladesh' ),
                )
            );

            add_settings_field(
                'inside_id',
                __( 'Inside Dhaka Method ID', 'city-based-shipping-for-bangladesh' ),
                array( $this, 'render_number_field' ),
                'city_based_shipping_bd',
                'city_based_shipping_bd_general',
                array(
                    'id'    => 'inside_id',
                    'label' => __( 'The instance ID of your Dhaka flat rate method (optional).', 'city-based-shipping-for-bangladesh' ),
                    'type'  => 'number',
                )
            );

            add_settings_field(
                'inside_cost',
                __( 'Inside Dhaka Cost', 'city-based-shipping-for-bangladesh' ),
                array( $this, 'render_number_field' ),
                'city_based_shipping_bd',
                'city_based_shipping_bd_general',
                array(
                    'id'    => 'inside_cost',
                    'label' => __( 'Override cost for Dhaka shipping (leave empty to use WooCommerce cost).', 'city-based-shipping-for-bangladesh' ),
                    'type'  => 'number',
                    'step'  => '0.01',
                )
            );

            add_settings_field(
                'outside_label',
                __( 'Outside Dhaka Label', 'city-based-shipping-for-bangladesh' ),
                array( $this, 'render_text_field' ),
                'city_based_shipping_bd',
                'city_based_shipping_bd_general',
                array(
                    'id'    => 'outside_label',
                    'label' => __( 'This should match the label of your Outside flat rate method.', 'city-based-shipping-for-bangladesh' ),
                )
            );

            add_settings_field(
                'outside_id',
                __( 'Outside Dhaka Method ID', 'city-based-shipping-for-bangladesh' ),
                array( $this, 'render_number_field' ),
                'city_based_shipping_bd',
                'city_based_shipping_bd_general',
                array(
                    'id'    => 'outside_id',
                    'label' => __( 'The instance ID of your Outside flat rate method (optional).', 'city-based-shipping-for-bangladesh' ),
                    'type'  => 'number',
                )
            );

            add_settings_field(
                'outside_cost',
                __( 'Outside Dhaka Cost', 'city-based-shipping-for-bangladesh' ),
                array( $this, 'render_number_field' ),
                'city_based_shipping_bd',
                'city_based_shipping_bd_general',
                array(
                    'id'    => 'outside_cost',
                    'label' => __( 'Override cost for Outside shipping (leave empty to use WooCommerce cost).', 'city-based-shipping-for-bangladesh' ),
                    'type'  => 'number',
                    'step'  => '0.01',
                )
            );

            add_settings_field(
                'override_costs',
                __( 'Override Costs', 'city-based-shipping-for-bangladesh' ),
                array( $this, 'render_checkbox_field' ),
                'city_based_shipping_bd',
                'city_based_shipping_bd_general',
                array(
                    'id'    => 'override_costs',
                    'label' => __( 'Check to override the WooCommerce flat rate costs with the amounts above.', 'city-based-shipping-for-bangladesh' ),
                )
            );
        }

        /**
         * Sanitizes options before saving.
         *
         * @param array $input Raw submitted values.
         * @return array Sanitized values.
         */
        public function sanitize_options( $input ) {
            $options = get_option( self::OPTION_KEY, array() );
            $new     = array();

            $new['inside_label']  = isset( $input['inside_label'] ) ? sanitize_text_field( $input['inside_label'] ) : ( isset( $options['inside_label'] ) ? $options['inside_label'] : '' );
            $new['outside_label'] = isset( $input['outside_label'] ) ? sanitize_text_field( $input['outside_label'] ) : ( isset( $options['outside_label'] ) ? $options['outside_label'] : '' );

            $new['inside_id']  = isset( $input['inside_id'] ) ? absint( $input['inside_id'] ) : ( isset( $options['inside_id'] ) ? absint( $options['inside_id'] ) : 0 );
            $new['outside_id'] = isset( $input['outside_id'] ) ? absint( $input['outside_id'] ) : ( isset( $options['outside_id'] ) ? absint( $options['outside_id'] ) : 0 );

            $new['override_costs'] = isset( $input['override_costs'] ) ? 1 : 0;

            $new['inside_cost']  = isset( $input['inside_cost'] ) && '' !== $input['inside_cost'] ? floatval( $input['inside_cost'] ) : ( isset( $options['inside_cost'] ) ? (float) $options['inside_cost'] : 0.0 );
            $new['outside_cost'] = isset( $input['outside_cost'] ) && '' !== $input['outside_cost'] ? floatval( $input['outside_cost'] ) : ( isset( $options['outside_cost'] ) ? (float) $options['outside_cost'] : 0.0 );

            return $new;
        }

        /**
         * Renders a simple text input field.
         *
         * @param array $args Field arguments passed from add_settings_field().
         * @return void
         */
        public function render_text_field( $args ) {
            $options = get_option( self::OPTION_KEY );
            $id      = $args['id'];
            $value   = isset( $options[ $id ] ) ? $options[ $id ] : '';
            printf(
                '<input type="text" id="%1$s" name="%2$s[%1$s]" value="%3$s" class="regular-text" />',
                esc_attr( $id ),
                esc_attr( self::OPTION_KEY ),
                esc_attr( $value )
            );
            if ( ! empty( $args['label'] ) ) {
                printf( '<p class="description">%s</p>', esc_html( $args['label'] ) );
            }
        }

        /**
         * Renders a number input field.
         *
         * @param array $args Field arguments passed from add_settings_field().
         * @return void
         */
        public function render_number_field( $args ) {
            $options = get_option( self::OPTION_KEY );
            $id      = $args['id'];
            $value   = isset( $options[ $id ] ) ? $options[ $id ] : '';
            $type    = isset( $args['type'] ) ? $args['type'] : 'number';
            $step    = isset( $args['step'] ) ? $args['step'] : '1';
            printf(
                '<input type="%4$s" step="%5$s" id="%1$s" name="%2$s[%1$s]" value="%3$s" class="small-text" />',
                esc_attr( $id ),
                esc_attr( self::OPTION_KEY ),
                esc_attr( $value ),
                esc_attr( $type ),
                esc_attr( $step )
            );
            if ( ! empty( $args['label'] ) ) {
                printf( '<p class="description">%s</p>', esc_html( $args['label'] ) );
            }
        }

        /**
         * Renders a checkbox input field.
         *
         * @param array $args Field arguments passed from add_settings_field().
         * @return void
         */
        public function render_checkbox_field( $args ) {
            $options = get_option( self::OPTION_KEY );
            $id      = $args['id'];
            $checked = isset( $options[ $id ] ) ? (bool) $options[ $id ] : false;
            printf(
                '<label><input type="checkbox" id="%1$s" name="%2$s[%1$s]" value="1" %3$s /> %4$s</label>',
                esc_attr( $id ),
                esc_attr( self::OPTION_KEY ),
                checked( $checked, true, false ),
                isset( $args['label'] ) ? esc_html( $args['label'] ) : ''
            );
        }

        /**
         * Renders the plugin settings page.
         *
         * @return void
         */
        public function render_settings_page() {
            if ( ! current_user_can( 'manage_options' ) ) {
                return;
            }
            ?>
            <div class="wrap">
                <h1><?php esc_html_e( 'City Based Shipping', 'city-based-shipping-for-bangladesh' ); ?></h1>
                <form action="options.php" method="post">
                    <?php
                    settings_fields( 'city_based_shipping_bd' );
                    do_settings_sections( 'city_based_shipping_bd' );
                    submit_button();
                    ?>
                </form>
            </div>
            <?php
        }

        /**
         * Enqueues front‑end scripts on the checkout page.
         *
         * Registers and enqueues the JavaScript file that listens for
         * changes to the city/state fields and triggers an AJAX
         * recalculation of shipping rates.
         *
         * @return void
         */
        public function enqueue_scripts() {
            if ( ! is_checkout() ) {
                return;
            }
            wp_register_script(
                'city-based-shipping-for-bangladesh',
                plugins_url( 'assets/js/city-based-shipping-for-bangladesh.js', __FILE__ ),
                array( 'jquery' ),
                self::VERSION,
                true
            );
            wp_enqueue_script( 'city-based-shipping-for-bangladesh' );
        }

        /**
         * Determines whether the destination address is in Dhaka.
         *
         * Checks the WooCommerce package, and falls back to the
         * customer’s shipping/billing data if necessary.  It checks the
         * destination state for the ISO 3166‑2 code `BD-13` (or just `13`) and
         * performs a case‑insensitive comparison of the city name against
         * “Dhaka” in both English and Bangla.
         *
         * @param array $package Shipping package passed from WooCommerce.
         * @return bool True if the destination is Dhaka, otherwise false.
         */
        protected function is_destination_dhaka( $package ) {
            if ( isset( $package['destination']['state'] ) && ! empty( $package['destination']['state'] ) ) {
                $state = strtoupper( $package['destination']['state'] );
                if ( 'BD-13' === $state || '13' === $state ) {
                    return true;
                }
            }
            if ( isset( $package['destination']['city'] ) && $package['destination']['city'] ) {
                $city = mb_strtolower( $package['destination']['city'], 'UTF-8' );
                if ( false !== strpos( $city, 'dhaka' ) || false !== strpos( $city, 'ঢাকা' ) ) {
                    return true;
                }
            }
            if ( WC()->customer ) {
                $state = WC()->customer->get_shipping_state();
                $city  = WC()->customer->get_shipping_city();
                if ( $state ) {
                    $state = strtoupper( $state );
                    if ( 'BD-13' === $state || '13' === $state ) {
                        return true;
                    }
                }
                if ( $city ) {
                    $city_lc = mb_strtolower( $city, 'UTF-8' );
                    if ( false !== strpos( $city_lc, 'dhaka' ) || false !== strpos( $city_lc, 'ঢাকা' ) ) {
                        return true;
                    }
                }
            }
            return false;
        }

        /**
         * Filters WooCommerce shipping rates to keep only the relevant rate.
         *
         * @param array $rates   Available shipping rates.
         * @param array $package Shipping package data.
         * @return array Filtered shipping rates.
         */
        public function filter_shipping_rates( $rates, $package ) {
            if ( ! is_array( $rates ) ) {
                return $rates;
            }
            $options = get_option( self::OPTION_KEY );
            if ( ! is_array( $options ) ) {
                $options = array();
            }
            $inside_label  = isset( $options['inside_label'] ) ? trim( $options['inside_label'] ) : '';
            $outside_label = isset( $options['outside_label'] ) ? trim( $options['outside_label'] ) : '';
            $inside_id     = isset( $options['inside_id'] ) ? (int) $options['inside_id'] : 0;
            $outside_id    = isset( $options['outside_id'] ) ? (int) $options['outside_id'] : 0;
            $override      = ! empty( $options['override_costs'] );
            $inside_cost   = isset( $options['inside_cost'] ) ? (float) $options['inside_cost'] : 0.0;
            $outside_cost  = isset( $options['outside_cost'] ) ? (float) $options['outside_cost'] : 0.0;

            $is_dhaka = $this->is_destination_dhaka( $package );
            $keep     = array();
            foreach ( $rates as $rate_id => $rate ) {
                $match     = false;
                $method_id = 0;
                if ( method_exists( $rate, 'get_instance_id' ) ) {
                    $method_id = (int) $rate->get_instance_id();
                }
                if ( ! $method_id && isset( $rate->id ) && is_string( $rate->id ) ) {
                    $parts = explode( ':', $rate->id );
                    if ( isset( $parts[1] ) ) {
                        $method_id = (int) $parts[1];
                    }
                }
                $label_lc = mb_strtolower( $rate->get_label(), 'UTF-8' );
                if ( $is_dhaka ) {
                    if ( $inside_id && $method_id === $inside_id ) {
                        $match = true;
                    } elseif ( $inside_label && false !== strpos( $label_lc, mb_strtolower( $inside_label, 'UTF-8' ) ) ) {
                        $match = true;
                    }
                    if ( $match ) {
                        if ( $override && $inside_cost >= 0 ) {
                            $rate->cost = $inside_cost;
                            if ( isset( $rate->taxes ) && is_array( $rate->taxes ) ) {
                                foreach ( $rate->taxes as $tax_key => $tax_value ) {
                                    $rate->taxes[ $tax_key ] = 0;
                                }
                            }
                            if ( ! empty( $inside_label ) ) {
                                $rate->set_label( $inside_label );
                            }
                        }
                        $keep[ $rate_id ] = $rate;
                    }
                } else {
                    if ( $outside_id && $method_id === $outside_id ) {
                        $match = true;
                    } elseif ( $outside_label && false !== strpos( $label_lc, mb_strtolower( $outside_label, 'UTF-8' ) ) ) {
                        $match = true;
                    }
                    if ( $match ) {
                        if ( $override && $outside_cost >= 0 ) {
                            $rate->cost = $outside_cost;
                            if ( isset( $rate->taxes ) && is_array( $rate->taxes ) ) {
                                foreach ( $rate->taxes as $tax_key => $tax_value ) {
                                    $rate->taxes[ $tax_key ] = 0;
                                }
                            }
                            if ( ! empty( $outside_label ) ) {
                                $rate->set_label( $outside_label );
                            }
                        }
                        $keep[ $rate_id ] = $rate;
                    }
                }
            }
            return ! empty( $keep ) ? array_values( $keep ) : $rates;
        }
    }
}

// Initialise plugin.
City_Based_Shipping_For_Bangladesh::instance();