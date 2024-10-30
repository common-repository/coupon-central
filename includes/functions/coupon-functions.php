<?php

if (!function_exists('sdcc_coupon_store')) {
    /**
     * Get coupon store
     *
     * @param Int $couponId
     * @param Bool $single
     * @return Object
     */
    function sdcc_coupon_store(Int $couponId)
    {
        $coupon = new SDCOUPON_Coupon_Service($couponId);
        return $coupon->getStore();
    }
}

if (!function_exists('sdcc_coupon_categories')) {
    /**
     * Get coupon categories
     *
     * @param Int $couponId
     * @return Array
     */
    function sdcc_coupon_categories(Int $couponId)
    {
        $coupon = new SDCOUPON_Coupon_Service($couponId);
        return $coupon->getCategories();
    }
}

if (!function_exists('sdcc_coupon_image')) {
    /**
     * Get coupon image
     *
     * @param Int $couponId
     * @return String
     */
    function sdcc_coupon_image(Int $couponId)
    {
        $coupon = new SDCOUPON_Coupon_Service($couponId);
        return $coupon->getCouponImage();
    }
}

if (!function_exists('sdcc_is_exclusive_coupon')) {
    /**
     * Is exclusive coupon
     *
     * @param Int $couponId
     * @return Boolean
     */
    function sdcc_is_exclusive_coupon(Int $couponId)
    {
        $coupon = new SDCOUPON_Coupon_Service($couponId);
        return $coupon->isExclusive();
    }
}

if (!function_exists('sdcc_coupon_exp_date')) {
    /**
     * Coupon expired date
     *
     * @param Int $couponId
     * @return String
     */
    function sdcc_coupon_exp_date(Int $couponId)
    {
        $coupon = new SDCOUPON_Coupon_Service($couponId);
        return $coupon->expiredDate();
    }
}

if (!function_exists('sdcc_coupon_code')) {
    /**
     * Coupon code
     *
     * @param Int $couponId
     * @return String
     */
    function sdcc_coupon_code(Int $couponId)
    {
        $coupon = new SDCOUPON_Coupon_Service($couponId);
        return $coupon->couponCode();
    }
}

if (!function_exists('sdcc_coupon_link')) {
    /**
     * Coupon link
     *
     * @param Int $couponId
     * @return String
     */
    function sdcc_coupon_link(Int $couponId)
    {
        $coupon = new SDCOUPON_Coupon_Service($couponId);
        return $coupon->couponLink();
    }
}

if (!function_exists('sdcc_coupon_meta')) {
    function sdcc_coupon_meta()
    {
        if (get_post_type() != 'sd_coupon') {
            return;
        } ?>
        <div class="sdcc-coupon__meta">
            <ul>
                <li>
                    <?php
                        printf(
                            /* translators: %s: Post Date */
                            esc_html__('Posted on %s', 'sd_coupon_central'),
            '<a href="'.esc_url(get_permalink()).'">'.
                            '<time datetime="'.esc_attr(get_the_date('c')).'">'.esc_html(get_the_date()).'</time>'.
                            '</a>'
        ); ?>
                </li>
                <li>
                    <?php
                        printf(
                            /* translators: %s: Post Author */
                            esc_html__('By %s', 'sd_coupon_central'),
            '<a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.esc_html(get_the_author()).'</a>'
        ); ?>
                </li>
            </ul>
        </div>
        <?php
    }
}
