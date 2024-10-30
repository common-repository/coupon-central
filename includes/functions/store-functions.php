<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

if (!function_exists('sdcc_store_data')) {
    /**
     * Get store description
     *
     * @param Int $storeId. Store term ID
     * @return Object
     */
    function sdcc_store_data(Int $storeId)
    {
        $service = new SDCOUPON_Store_Service($storeId);
        return $service->getStoreData();
    }
}

if (!function_exists('sdcc_store_logo')) {
    /**
     * Get store logo
     *
     * @param Int $storeId. Store term ID
     * @return String
     */
    function sdcc_store_logo(Int $storeId)
    {
        $service = new SDCOUPON_Store_Service($storeId);
        return $service->getStoreLogo();
    }
}

if (!function_exists('sdcc_store_short_description')) {
    /**
     * Get store description
     *
     * @param Int $storeId. Store term ID
     * @return String
     */
    function sdcc_store_short_description(Int $storeId)
    {
        $service = new SDCOUPON_Store_Service($storeId);
        return $service->getStoreShortDescription();
    }
}

if (!function_exists('sdcc_coupon_store_options')) {
    /**
     * Get store taxonomy terms for options field
     *
     * @return Array
     */
    function sdcc_coupon_store_options()
    {
        $storesTermTax = get_terms([
            'taxonomy' => 'sd_coupon_store',
            'orderby' => 'name',
            'hide_empty' => false,
            'hide_empty' => false,
        ]);

        $stores = [];
        foreach ($storesTermTax as $store) {
            $stores[] = [
                'value' => $store->term_id,
                'text' => $store->name
            ];
        }

        return $stores;
    }
}
