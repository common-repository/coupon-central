<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Plugin install class
 */
if (!class_exists('SDCOUPON_Install')) {
    class SDCOUPON_Install
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            register_activation_hook(SDCOUPON_PLUGIN_PATH . 'coupon-central.php', array($this, 'activate'));
        }

        /**
         * On activate plugin
         *
         * @return void
         */
        public function activate()
        {
            // Add custom post type
            SDCOUPON_Post_Type::register_coupon_post_type();

            // Add custom taxonomy
            SDCOUPON_Taxonomy::register_store_taxonomy();
            SDCOUPON_Taxonomy::register_coupon_category_taxonomy();

            // flush rewrite rules
            flush_rewrite_rules();
        }
    }
    
    $SDCOUPON_Install = new SDCOUPON_Install();
}
