<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

/**
 * Coupon archive / list class
 */
if (!class_exists('SDCOUPON_Coupon_Archive')) {
    class SDCOUPON_Coupon_Archive
    {
        /**
         * Class constructor
         */
        public function __construct()
        {
            add_filter('template_include', array($this, 'coupon_list'));

            add_filter('get_the_archive_title', array($this, 'remove_title_prefix'));
        }

        /**
         * Is realated to coupon taxonomy
         *
         * @return boolean
         */
        public function isRelatedCouponTaxonomy()
        {
            $qryObject = get_queried_object();
            $taxonomy = $qryObject->taxonomy;

            $coupon_taxs = ['sd_coupon_category', 'sd_coupon_store'];
            if (!in_array($taxonomy, $coupon_taxs)) {
                return false;
            }
            
            return true;
        }

        /**
         * Set coupon archive / list template file
         *
         * @param String $template
         * @return String
         */
        public function coupon_list(String $template)
        {
            if (!is_archive()) {
                return $template;
            }

            if ($this->isRelatedCouponTaxonomy()) {
                $theme_files = ['archive-sd_coupon.php'];
                $theme_template = locate_template($theme_files, false);
                if ($theme_template != '') {
                    return $theme_template;
                } else {
                    return SDCOUPON_PLUGIN_PATH . '/views/frontend/coupon/coupon-archive.php';
                }
            }

            return $template;
        }

        /**
         * Remove archive title prefix
         *
         * @param String $title
         * @return String
         */
        public function remove_title_prefix(String $title)
        {
            if (!is_archive()) {
                return $title;
            }

            if (is_rtl()) {
                return $title;
            }

            if ($this->isRelatedCouponTaxonomy()) {
                // Split the title into parts so we can wrap them with spans.
                $title_parts = explode(': ', $title, 2);

                // Glue it back together again.
                if (! empty($title_parts[1])) {
                    $title = wp_kses(
                        $title_parts[1],
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    );
                    $title = '<span class="screen-reader-text">' . esc_html($title_parts[0]) . ': </span>' . $title;
                }
            }

            return $title;
        }
    }
    
    $SDCOUPON_Coupon_Archive = new SDCOUPON_Coupon_Archive();
}
