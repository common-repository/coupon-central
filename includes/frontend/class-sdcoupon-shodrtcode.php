<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Coupon page class
 */
if (!class_exists('SDCOUPON_Shortcode')) {
    class SDCOUPON_Shortcode
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_shortcode('sdcc_coupon', array($this, 'coupon_shortcode'));
        }

        public function coupon_shortcode($atts, $content, $tag)
        {
            extract(shortcode_atts([
                'id' => null
            ], $atts, $tag));

            if (is_null($id)) {
                return;
            }
            
            global $post;
            $post = get_post($atts['id']);
            setup_postdata($post);

            ob_start();

            do_action('sdcc_coupon_shortcode_before', $post);
            include SDCOUPON_PLUGIN_PATH . 'views/frontend/coupon/coupon-card.php';
            do_action('sdcc_coupon_shortcode_after', $post);

            wp_reset_postdata();
            
            $output = ob_get_clean();
            return $output;
        }
    }

    $SDCOUPON_Shortcode = new SDCOUPON_Shortcode();
}
