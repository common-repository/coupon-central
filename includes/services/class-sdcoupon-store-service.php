<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Store service class
 */
if (!class_exists('SDCOUPON_Store_Service')) {
    class SDCOUPON_Store_Service
    {
        /**
         * Store term ID
         *
         * @var Int
         */
        public $storeId;

        /**
         * Class constructor
         *
         * @param Int $storeId. Store term ID
         */
        public function __construct(Int $storeId)
        {
            $this->storeId = $storeId;
        }

        /**
         * Get store data
         *
         * @return Object
         */
        public function getStoreData()
        {
            $storeData = get_term($this->storeId);
            $storeData->logo = $this->getStoreLogo();
            $storeData->short_description = $this->getStoreShortDescription();

            return apply_filters('sdcc_store_data', $storeData);
        }

        /**
         * Get store logo url
         *
         * @return String
         */
        public function getStoreLogo()
        {
            $logo = get_term_meta($this->storeId, '_sd_coupon_store_logo', true);
            if (!$logo || $logo == '') {
                $defaultLogo = SDCOUPON_PLUGIN_URL . 'assets/images/logo-placeholder.png';
                $logo = apply_filters('sdcc_default_store_logo', $defaultLogo);
            }
            return esc_url($logo);
        }

        /**
         * Get store description
         *
         * @return String
         */
        public function getStoreShortDescription()
        {
            return wpautop(wp_kses_post(get_term_meta($this->storeId, '_sd_coupon_store_short_description', true)));
        }
    }
}
