<?php
/**
 * Coupon page template
 */

get_header(); ?>

<main id="sdcc-coupon-page" role="main">

	<?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
            <?php the_post(); ?>

            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                <header class="sdcc-entry-header<?php echo !has_post_thumbnail() ? ' no-thumbnail' : '' ?>">
                    <?php if (has_post_thumbnail() && !post_password_required()): ?>
                        <figure class="sdcc-featured-image">
                            <?php the_post_thumbnail(); ?>
                        </figure><!-- .featured-image -->
                        <div class="sdcc-ft-overlay">&nbsp;</div>
                    <?php endif; ?>
                    
                    <div class="sdcc-coupon">
                        <?php the_title('<h1 class="sdcc-coupon__entry-title">', '</h1>') ?>
                        <div class="sdcc-code">
                            <div class="sdcc-code__input"><?php echo sdcc_coupon_code(get_the_ID()) ?></div>
                            <button id="sdcc-copy-code" class="sdcc-cp-btn sdcc-code__copy-btn" type="button" data-id="<?php echo esc_attr(get_the_ID()) ?>" data-clipboard-text="<?php echo sdcc_coupon_code(get_the_ID()) ?>">
                                <?php esc_html_e('Copy', 'sd_coupon_central') ?>
                            </button>
                        </div>
                        <div class="sdcc-coupon__data">
                            <div class="sdcc-coupon__exp">
                                <?php echo sprintf(__('Expired at: %s', 'sd_coupon_central'), sdcc_coupon_exp_date(get_the_ID())) ?>
                            </div>
                            <div class="sdcc-coupon__store">
                                <?php $store = sdcc_coupon_store(get_the_ID()); ?>
                                <a href="<?php echo esc_url(get_term_link($store->term_id, 'sd_coupon_store'))?>">
                                    <?php echo $store->name ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="sdcc-coupon__btn-wrapper">
                            <button type="button" id="sdcc-coupon-link" class="sdcc-cp-btn sdcc-cp-btn--block" data-id="<?php echo get_the_ID() ?>">
                                <?php esc_html_e('Go to Shop', 'sd_coupon_central') ?>
                            </button>
                        </div>
                        <?php sdcc_coupon_meta() ?>
                    </div><!-- .sdcc-coupon -->
                </header><!-- .entry-header -->

                <div class="sdcc-entry-content">
                    <?php the_content(__('Continue reading', 'sd_coupon_central')); ?>
                </div><!-- .entry-content -->

                <div class="sdcc-section-inner">
                    <?php
                        wp_link_pages();
                        edit_post_link();
                    ?>
                </div><!-- .section-inner -->

                <?php if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && ! post_password_required()): ?>
                    <div class="sdcc-comments-wrapper">
                        <?php comments_template(); ?>
                    </div><!-- .comments-wrapper -->
                <?php endif; ?>

            </article><!-- .post -->
        <?php endwhile; ?>
    <?php endif; ?>

</main><!-- #site-content -->

<?php
get_footer();
