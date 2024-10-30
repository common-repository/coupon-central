<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Frontend scripts class
 */
if (!class_exists('SDCOUPON_Frontend_Script')) {
    class SDCOUPON_Frontend_Script
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_action('wp_enqueue_scripts', array($this, 'scripts'));
        }

        public function scripts()
        {
            wp_enqueue_style('sdcc-frontend', SDCOUPON_PLUGIN_URL . 'assets/css/frontend-coupon-central.css', array(), '1.0.0', 'all');

            wp_register_script('sdcc-frontend-script', SDCOUPON_PLUGIN_URL . 'assets/js/frontend-coupon-central.js', array('jquery', 'clipboard'), false);
            wp_localize_script(
                'sdcc-frontend-script',
                'sdcc_script',
                array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('sdcc-script-nonce'),
                    'show_more_text' => __('Show more', 'sd_coupon_central'),
                    'show_less_text' => __('Show less', 'sd_coupon_central'),
                    'copied_text' => __('Copied', 'sd_coupon_central'),
                    'something_wrong_text' => __('Something went wrong', 'sd_coupon_central')
                )
            );
            wp_enqueue_script('sdcc-frontend-script');
        }
    }

    $SDCOUPON_Frontend_Script = new SDCOUPON_Frontend_Script();
}
