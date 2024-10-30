<?php
/**
 * Coupon archive template
 */

get_header();

// Get store ID, store term ID
$termId = get_queried_object_id();
$qryObject = get_queried_object();
$taxonomy = $qryObject->taxonomy;
?>

<main class="sdcc-archive">

    <?php if ($taxonomy == 'sd_coupon_store'): ?>
        <?php $store = sdcc_store_data($termId); ?>
        
        <header class="sdcc-archive__header sdcc-archive__header--store">
            <div class="sdcc-store-logo">
                <img src="<?php echo sdcc_store_logo($termId) ?>" alt="<?php echo esc_attr($store->name) ?>" />
            </div>

            <h1 class="sdcc-archive__title"><?php echo get_the_archive_title() ?></h1>

            <div class="sdcc-archive__short-desc"><?php echo $store->short_description ?></div>
        </header>
    <?php endif; ?>

    <?php if ($taxonomy == 'sd_coupon_category'): ?>
        <?php $category = sdcc_category_data($termId); ?>
        
        <header class="sdcc-archive__header sdcc-archive__header--category">
            <div class="sdcc-category-logo">
                <img src="<?php echo sdcc_category_icon($termId) ?>" alt="<?php echo esc_attr($category->name) ?>" />
            </div>

            <h1 class="sdcc-archive__title"><?php echo get_the_archive_title() ?></h1>

            <div class="sdcc-archive__short-desc"><?php echo $category->short_description ?></div>
        </header>
    <?php endif; ?>

    <div class="sdcc-archive__content">
        <div class="sdcc-archive__coupon-list">
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        // get_template_part('template-parts/content', get_post_type());

                        include SDCOUPON_PLUGIN_PATH . 'views/frontend/coupon/coupon-card.php';
                    }
                }
            ?>
        </div>
        
        <?php the_archive_description('<p class="sdcc-archive__description">', '</p>'); ?>
    </div>
    
</main>

<?php
get_footer();
