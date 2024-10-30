<?php

$targetPreview = 'sdcc-coupon-category-icon-preview';
$targetInput = 'sdcc-coupon-category-icon-input';
sdcc_render_media_button($targetPreview, $targetInput, $value);

?>

<?php include_once SDCOUPON_PLUGIN_PATH . 'views/share/add-media-button.php'; ?>

<input 
    type="hidden" 
    name="sd_coupon_category_icon" 
    id="<?php echo $targetInput ?>" 
    value="<?php echo esc_attr($value); ?>"
>