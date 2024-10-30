<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

if (!function_exists('sdcc_category_data')) {
    /**
     * Get category data
     *
     * @param Int $categoryId. Coupon category term ID
     * @return Object
     */
    function sdcc_category_data(Int $categoryId)
    {
        $service = new SDCOUPON_Category_Service($categoryId);
        return $service->getCategoryData();
    }
}

if (!function_exists('sdcc_category_icon')) {
    /**
     * Get category icon
     *
     * @param Int $categoryId. Coupon category term ID
     * @return String
     */
    function sdcc_category_icon(Int $categoryId)
    {
        $service = new SDCOUPON_Category_Service($categoryId);
        return $service->getCategoryIcon();
    }
}

if (!function_exists('sdcc_category_short_description')) {
    /**
     * Get category short description
     *
     * @param Int $categoryId. Coupon category term ID
     * @return String
     */
    function sdcc_category_short_description(Int $categoryId)
    {
        $service = new SDCOUPON_Category_Service($categoryId);
        return $service->getCategoryShortDescription();
    }
}
