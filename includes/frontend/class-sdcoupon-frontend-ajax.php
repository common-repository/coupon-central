<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Frontend ajax class
 */
if (!class_exists('SDCOUPON_Frontend_ajax')) {
    class SDCOUPON_Frontend_ajax
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_action('wp_ajax_sdcc_copy_click', array($this, 'copy_click'));
            add_action('wp_ajax_nopriv_sdcc_copy_click', array($this, 'copy_click'));

            add_action('wp_ajax_sdcc_coupon_link_click', array($this, 'coupon_link_click'));
            add_action('wp_ajax_nopriv_sdcc_coupon_link_click', array($this, 'coupon_link_click'));
        }

        /**
         * Ajax action on click coupon code copy button
         *
         * @return Json response
         */
        public function copy_click()
        {
            check_ajax_referer('sdcc-script-nonce', 'nonce_ajax');

            if (!isset($_POST['coupon_id'])) {
                wp_send_json_error(['message' => __('Bad params', 'sd_coupon_central')], 400);
            }

            $couponId = intval($_POST['coupon_id']);
            $coupon = get_post($couponId);

            do_action('sdcc_copy_code_click', $coupon);

            wp_send_json_success(['message' => __('Success', 'sd_coupon_central')]);
        }

        /**
         * On coupon link click ajax action
         *
         * @return Json response
         */
        public function coupon_link_click()
        {
            check_ajax_referer('sdcc-script-nonce', 'nonce_ajax');

            if (!isset($_POST['coupon_id'])) {
                wp_send_json_error(['message' => __('Bad params', 'sd_coupon_central')], 400);
            }

            $couponId = intval($_POST['coupon_id']);
            $coupon = get_post($couponId);

            do_action('sdcc_coupon_link_click', $coupon);

            wp_send_json_success([
                'message' => __('Success', 'sd_coupon_central'),
                'data' => sdcc_coupon_link($coupon->ID)
            ]);
        }
    }
    
    $SDCOUPON_Frontend_ajax = new SDCOUPON_Frontend_ajax();
}
