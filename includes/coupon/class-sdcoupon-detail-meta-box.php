<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Coupon detail metabox class
 */
if (!class_exists('SDCOUPON_Detail_Meta_Box')) {
    class SDCOUPON_Detail_Meta_Box
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_filter('sd_coupon_detail_meta_boxes', array($this, 'coupon_detail_meta_boxes'));
        }

        /**
         * Add fields to coupon detail metabox
         *
         * @param Array $metaBoxes
         * @return Array
         */
        public function coupon_detail_meta_boxes(array $metaBoxes)
        {
            $newMetaBoxes = [
                [
                    'key' => '_sd_coupon_store',
                    'name' => __('Store', 'sd_coupon_central'),
                    'field_type' => 'select',
                    'options' => 'sdcc_coupon_store_options',
                    'wide_field' => false,
                    'sort_order' => 5
                ],
                [
                    'key' => '_sd_coupon_link',
                    'name' => __('Link', 'sd_coupon_central'),
                    'field_type' => 'text',
                    'wide_field' => true,
                    'sort_order' => 10
                ],
                [
                    'key' => '_sd_coupon_code',
                    'name' => __('Coupon Code', 'sd_coupon_central'),
                    'field_type' => 'text',
                    'wide_field' => false,
                    'sort_order' => 20
                ],
                [
                    'key' => '_sd_coupon_expired_date',
                    'name' => __('Expired Date', 'sd_coupon_central'),
                    'field_type' => 'datepicker',
                    'sort_order' => 30
                ],
                [
                    'key' => '_sd_coupon_is_exclusive',
                    'name' => __('Exclusive', 'sd_coupon_central'),
                    'field_type' => 'checkbox',
                    'sort_order' => 40
                ],
                [
                    'key' => '_sd_coupon_image',
                    'name' => __('Coupon Image', 'sd_coupon_central'),
                    'field_type' => 'media',
                    'sort_order' => 50
                ],
            ];
            
            return array_merge($metaBoxes, $newMetaBoxes);
        }
    }

    $SDCOUPON_Detail_Meta_Box = new SDCOUPON_Detail_Meta_Box();
}
