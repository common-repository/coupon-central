<?php

if (!class_exists('SDCOUPON_Widget_Random_Coupons')) {
    class SDCOUPON_Widget_Random_Coupons extends WP_Widget
    {
        public function __construct()
        {
            parent::__construct(
                'sdcoupon_widget_random_coupons',
                esc_html__('Random Coupons', 'lorach'),
                array(
                'description' => esc_html__('Display random coupons', 'lorach'),
                'customize_selective_refresh' => true
            )
            );
        }

        public function form($instance)
        {
            if (isset($instance['title'])) {
                $title = $instance['title'];
            } else {
                $title = 'Random Coupons';
            }
        
            if (isset($instance['count'])) {
                $count = $instance['count'];
            } else {
                $count = 3;
            } ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php esc_html_e('Title:', 'lorach') ?></label>
            <input type="text" id="<?php echo $this->get_field_id('title') ?>" class="widefat" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($title) ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count') ?>"><?php esc_html_e('Number of Posts:', 'lorach') ?></label>
            <input type="number" min="1" id="<?php echo $this->get_field_id('count') ?>" class="widefat" name="<?php echo $this->get_field_name('count') ?>" value="<?php echo intval($count) ?>" />
        </p>
        <?php
        }

        public function widget($args, $instance)
        {
            echo $args['before_widget'];
            if (isset($instance['title']) && !empty($instance['title'])) {
                $title = apply_filters('widget_title', $instance['title']);
                echo $args['before_title'] . esc_html($title) . $args['after_title'];
            }

            $randomCoupons = new WP_Query(
                array(
                'ignore_sticky_posts' => true,
                'post_type' => 'sd_coupon',
                'posts_per_page' => isset($instance['count']) ? intval($instance['count']) : 3,
                'orderby' => 'rand',
            )
            );

            if ($randomCoupons->have_posts()) {
                echo '<div class="widget-rc">';
                while ($randomCoupons->have_posts()) {
                    $randomCoupons->the_post();
                    echo '<div class="widget-rc__item">';
                    echo '<div class="widget-rc__image">';
                    echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">';
                    echo '<img src="'.sdcc_coupon_image(get_the_ID()).'" alt="<?php echo get_the_title() ?>">';
                    echo '</a>';
                    echo '</div>';
                    echo '<h3 class="widget-rc__title">';
                    echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
                    echo '</h3>';
                    echo '</div>';
                }
                echo '</div>';
            }

            echo $args['after_widget'];
        }

        public function update($new_instance, $old_instance)
        {
            $instance = array();
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['count'] = intval($new_instance['count']);
            return $instance;
        }
    }

    function lorach_register_widget_random_coupons()
    {
        register_widget('SDCOUPON_Widget_Random_Coupons');
    }
    add_action('widgets_init', 'lorach_register_widget_random_coupons');
}
