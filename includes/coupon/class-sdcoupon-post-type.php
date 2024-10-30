<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Coupon post type class
 */
if (!class_exists('SDCOUPON_Post_Type')) {
    class SDCOUPON_Post_Type
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_action('init', array($this, 'register_coupon_post_type'));

            add_action('init', array($this, 'control_coupon_post_ui'));
        }

        /**
         * Register coupon custom post type
         *
         * @return void
         */
        public static function register_coupon_post_type()
        {
            $labels = [
                'name' => _x('Coupons', 'Post type general name', 'sd_coupon_central'),
                'singular_name' => _x('Coupon', 'Post type singular name', 'sd_coupon_central'),
                'menu_name' => _x('Coupons', 'Admin menu text', 'sd_coupon_central'),
                'name_admin_bar' => _x('New Coupon', 'Add New on Toolbar', 'sd_coupon_central'),
                'add_new' => __('Add New', 'sd_coupon_central'),
                'add_new_item' => __('Add New Coupon', 'sd_coupon_central'),
                'new_item' => __('New Coupon', 'sd_coupon_central'),
                'edit_item' => __('Edit Coupon', 'sd_coupon_central'),
                'view_item' => __('View Coupon', 'sd_coupon_central'),
                'all_items' => __('All Coupons', 'sd_coupon_central'),
                'search_items' => __('Search Coupons', 'sd_coupon_central'),
                'parent_item_colon' => __('Parent Coupons:', 'sd_coupon_central'),
                'not_found' => __('No coupons found.', 'sd_coupon_central'),
                'not_found_in_trash' => __('No coupons found in Trash.', 'sd_coupon_central'),
                'archives' => _x('Coupon archives', 'The post type archive label used in nav menus.', 'sd_coupon_central'),
                'insert_into_item' => _x('Insert into coupon', 'Used when inserting media', 'sd_coupon_central'),
                'uploaded_to_this_item' => _x('Uploaded to this coupon', 'Used when viewing media attached to a post', 'sd_coupon_central'),
                'filter_item_list' => _x('Filter coupon list', 'Screen reader text for the filter links heading on the post type listing screen', 'sd_coupon_central'),
                'items_list_navigation' => _x('Coupons list navigation', 'Screen reader text for the pagination heading on the post type listing screen', 'sd_coupon_central'),
                'items_list' => _x('Coupons list', 'Screen reader text for the items list heading on the post type listing screen', 'sd_coupon_central'),
            ];

            $args = [
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => [
                    'slug' => apply_filters('sdcoupon_coupon_post_type_slug', 'coupon'),
                    'with_front' => true
                ],
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position ' => 6,
                'supports ' => [
                    'thumbnail',
                    'author',
                    'comments',
                    'custom-fields',
                    'revisions',
                    'excerpt'
                ],
                'show_in_rest' => true,
                'show_in_admin_bar' => true,
                'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg width="20" height="20" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg"><path fill="black" d="M512 448q0-53-37.5-90.5t-90.5-37.5-90.5 37.5-37.5 90.5 37.5 90.5 90.5 37.5 90.5-37.5 37.5-90.5zm1067 576q0 53-37 90l-491 492q-39 37-91 37-53 0-90-37l-715-716q-38-37-64.5-101t-26.5-117v-416q0-52 38-90t90-38h416q53 0 117 26.5t102 64.5l715 714q37 39 37 91zm384 0q0 53-37 90l-491 492q-39 37-91 37-36 0-59-14t-53-45l470-470q37-37 37-90 0-52-37-91l-715-714q-38-38-102-64.5t-117-26.5h224q53 0 117 26.5t102 64.5l715 714q37 39 37 91z"/></svg>'),
                'taxonomies' => ['sd_coupon_category', 'sd_coupon_store']
            ];

            register_post_type('sd_coupon', $args);
        }

        /**
         * Control coupon post UI
         *
         * @return void
         */
        public function control_coupon_post_ui()
        {
            // remove_post_type_support('sd_coupon', 'editor');
            add_post_type_support('sd_coupon', 'thumbnail');
            add_post_type_support('sd_coupon', 'author');
            add_post_type_support('sd_coupon', 'comments');
            add_post_type_support('sd_coupon', 'custom-fields');
            add_post_type_support('sd_coupon', 'revisions');
            add_post_type_support('sd_coupon', 'excerpt');
        }
    }

    $SDCOUPON_Post_Type = new SDCOUPON_Post_Type();
}
