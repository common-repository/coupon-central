<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Coupon page class
 */
if (!class_exists('SDCOUPON_Coupon_Page')) {
    class SDCOUPON_Coupon_Page
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_filter('template_include', array($this, 'coupon_page'));
        }

        public function coupon_page(String $template)
        {
            if (!is_single()) {
                return $template;
            }

            global $post;

            if ($post->post_type != 'sd_coupon') {
                return $template;
            }

            $theme_files = ['single-sd_coupon.php'];
            $theme_template = locate_template($theme_files, false);
            if ($theme_template != '') {
                return $theme_template;
            } else {
                return SDCOUPON_PLUGIN_PATH . '/views/frontend/coupon/coupon-page.php';
            }

            return $template;
        }
    }

    $SDCOUPON_Coupon_Page = new SDCOUPON_Coupon_Page();
}
