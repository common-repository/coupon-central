<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Translation class
 */
if (!class_exists('SDCOUPON_Translation')) {
    class SDCOUPON_Translation
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_action('init', array($this, 'translation'));
        }

        /**
         * Add translation
         *
         * @return void
         */
        public function translation()
        {
            load_plugin_textdomain('sd_coupon_central', false, 'coupon-central/languages');
        }
    }
    
    $SDCOUPON_Translation = new SDCOUPON_Translation();
}
