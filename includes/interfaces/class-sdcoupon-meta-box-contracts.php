<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Metabox interface
 */
if (!interface_exists('SDCOUPON_Meta_Box_Contracts')) {
    interface SDCOUPON_Meta_Box_Contracts
    {
        /**
         * Generate nonce field
         *
         * @return void
         */
        public function nonceField();

        /**
         * Add meta boxes
         *
         * @return void
         */
        public function meta_boxes();

        /**
         * Save meta box
         *
         * @param Int $post_id
         * @param Onject $post
         * @return void
         */
        public function save_meta_box(Int $post_id, $post);
    }
}
