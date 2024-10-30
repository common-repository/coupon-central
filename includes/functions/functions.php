<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

if (!function_exists('sdcc_render_media_button')) {
    /**
     * Render media button
     *
     * @param String $targetPreview
     * @param String $targetInput
     * @param String $value
     * @return Html view
     */
    function sdcc_render_media_button(String $targetPreview, String $targetInput, String $value)
    {
        $mediaBtnData = [
            'preview-target-id' => $targetPreview,
            'input-target-id' => $targetInput,
        ];
        
        include SDCOUPON_PLUGIN_PATH . 'views/share/add-media-button.php';
    }
}
