<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Coupon metabox
 */
if (!class_exists('SDCOUPON_Meta_Box')) {
    class SDCOUPON_Meta_Box implements SDCOUPON_Meta_Box_Contracts
    {
        public $couponDetailsMetaBoxes;

        /**
         * Class constructor
         */
        public function __construct()
        {
            add_action('init', array($this, 'init_set_coupon_details_meta_boxes'));

            add_action('add_meta_boxes', array($this, 'meta_boxes'));

            add_action('save_post', array($this, 'save_meta_box'), 10, 2);
        }

        /**
         * Initialize coupon details meta boxes
         *
         * @return void
         */
        public function init_set_coupon_details_meta_boxes()
        {
            $this->setCouponDetailsMetaBoxes(apply_filters('sd_coupon_detail_meta_boxes', []));
        }

        /**
         * Set coupon details meta boxes
         *
         * @param Array $metaBoxes
         * @return void
         */
        public function setCouponDetailsMetaBoxes(array $metaBoxes)
        {
            $this->couponDetailsMetaBoxes = $metaBoxes;
        }

        /**
         * Nonce field
         *
         * @return void
         */
        public function nonceField()
        {
            wp_nonce_field('sd_coupon_update_post_metabox', 'sd_coupon_update_post_nonce');
        }

        /**
         * Add coupon metaboxes
         *
         * @return void
         */
        public function meta_boxes()
        {
            // Coupon detail
            $couponDetailsMetaBoxes = $this->couponDetailsMetaBoxes;

            array_multisort(
                array_map(function ($el) {
                    return $el['sort_order'];
                }, $couponDetailsMetaBoxes),
                SORT_ASC,
                $couponDetailsMetaBoxes
            );

            add_meta_box('sd_coupon_detail', __('Coupon Detail', 'sd_coupon_central'), array($this, 'coupon_detail_html'), 'sd_coupon', 'normal');
        }

        /**
         * Save coupon metabox
         *
         * @param Int $post_id
         * @param Object $post
         * @return void
         */
        public function save_meta_box(Int $post_id, $post)
        {
            $edit_cap = get_post_type_object($post->post_type)->cap->edit_post;
            if (!current_user_can($edit_cap, $post_id)) {
                return;
            }

            if (!isset($_POST['sd_coupon_update_post_nonce']) ||
                !wp_verify_nonce($_POST['sd_coupon_update_post_nonce'], 'sd_coupon_update_post_metabox')
            ) {
                return;
            }

            foreach ($this->couponDetailsMetaBoxes as $mBox) {
                // Update meta box coupon details
                if (array_key_exists($mBox['key'], $_POST)) {
                    $value = sanitize_text_field($_POST[$mBox['key']]);

                    if ($mBox['key'] == '_sd_coupon_store') {
                        wp_set_object_terms($post_id, (int)$value, 'sd_coupon_store');
                    } else {
                        update_post_meta(
                            $post_id,
                            $mBox['key'],
                            $value
                        );
                    }
                } else {
                    if ($mBox['field_type'] == 'checkbox') {
                        update_post_meta($post_id, $mBox['key'], '');
                    }
                }
            }
        }

        /**
         * Coupon detail metabox html form
         *
         * @param Object $post
         * @return Html view
         */
        public function coupon_detail_html($post)
        {
            $this->nonceField();
            include_once SDCOUPON_PLUGIN_PATH . 'views/admin/coupon/meta-box/coupon-detail.php';
        }
    }
    $SDCOUPON_Meta_Box = new SDCOUPON_Meta_Box();
}
