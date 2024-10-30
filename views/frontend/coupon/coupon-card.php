<div class="sdcc-card sdcc-card--list">
    <div class="sdcc-card__image">
        <img src="<?php echo sdcc_coupon_image(get_the_ID()) ?>" alt="<?php echo get_the_title() ?>">
    </div>
    <div class="sdcc-card__title-and-excerpt">
        <h2 class="sdcc-card__title">
            <a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php the_title() ?></a>
        </h2>
        <div class="sdcc-card__excerpt">
            <?php the_excerpt() ?>
            <a href="#" class="sdcc-card__excerpt-show" data-type="more" title="<?php esc_html_e('Show more', 'sd_coupon_central') ?>">
                <?php esc_html_e('Show more', 'sd_coupon_central') ?>
            </a>
        </div>
    </div>
    <div class="sdcc-card__cta-btn-wrapper">
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>" class="button sdcc-card__cta-btn">
            <?php esc_html_e('Read more', 'sd_coupon_central') ?>
        </a>
    </div>

    <?php if (sdcc_is_exclusive_coupon(get_the_ID())): ?>
        <div class="sdcc-card__exclusive" title="<?php echo esc_html_e('Exclusive', 'sd_coupon_central') ?>">&#10003;</div>
    <?php endif; ?>
    
    <div class="sdcc-card__expired">
        <?php echo sprintf(__('Expired: %s', 'sd_coupon_central'), sdcc_coupon_exp_date(get_the_ID())) ?>
    </div>
</div>
