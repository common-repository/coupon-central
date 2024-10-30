<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Coupon category service class
 */
if (!class_exists('SDCOUPON_Category_Service')) {
    class SDCOUPON_Category_Service
    {
        /**
         * Coupon category term ID
         *
         * @var Int
         */
        public $categoryId;

        /**
         * Class constructor
         *
         * @param Int $categoryId. Coupon category term ID
         */
        public function __construct(Int $categoryId)
        {
            $this->categoryId = $categoryId;
        }

        /**
         * Get category data
         *
         * @return Object
         */
        public function getCategoryData()
        {
            $categoryData = get_term($this->categoryId);
            $categoryData->icon = $this->getCategoryIcon();
            $categoryData->short_description = $this->getCategoryShortDescription();

            return apply_filters('sdcc_category_data', $categoryData);
        }

        /**
         * Get category logo icon url
         *
         * @return String
         */
        public function getCategoryIcon()
        {
            $icon = get_term_meta($this->categoryId, '_sd_coupon_category_icon', true);
            if (!$icon || $icon == '') {
                $defaultIcon = SDCOUPON_PLUGIN_URL . 'assets/images/logo-placeholder.png';
                $icon = apply_filters('sdcc_default_category_icon', $defaultIcon);
            }
            return esc_url($icon);
        }

        /**
         * Get category description
         *
         * @return String
         */
        public function getCategoryShortDescription()
        {
            return wpautop(wp_kses_post(get_term_meta($this->categoryId, '_sd_coupon_category_short_description', true)));
        }
    }
}
