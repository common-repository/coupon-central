<?php

$targetPreview = 'sdcc-store-logo-preview';
$targetInput = 'sdcc-store-logo-input';
sdcc_render_media_button($targetPreview, $targetInput, $value);

?>

<?php include_once SDCOUPON_PLUGIN_PATH . 'views/share/add-media-button.php'; ?>

<input 
    type="hidden" 
    name="sd_coupon_store_logo" 
    id="<?php echo $targetInput ?>" 
    value="<?php echo esc_attr($value); ?>"
>