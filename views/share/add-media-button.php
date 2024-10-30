<div class="sdcc-media">
    <div class="sdcc-media__image-preview-wrapper<?php echo !$value || $value == '' ? ' sdcc-hide' : '' ?>">
        <img id="<?php echo $mediaBtnData['preview-target-id'] ?>" src="<?php echo $value ?>">
    </div>

    <div class="sdcc-media__add-btn-wrapper">
        <button 
            type="button" 
            class="button sdcc-media__add-btn"
            data-target-input="#<?php echo $mediaBtnData['input-target-id'] ?>"
            data-target-preview="#<?php echo $mediaBtnData['preview-target-id'] ?>"
        >
            <?php _e('Choose Media', 'sd_coupon_central')?>
        </button>
    </div>

    <div class="sdcc-media__remove-wrapper<?php echo !$value || $value == '' ? ' sdcc-hide' : '' ?>"">
        <a 
            href="#"
            class="sdcc-text-danger sdcc-media__remove"
            data-target-input="#<?php echo $mediaBtnData['input-target-id'] ?>"
            data-target-preview="#<?php echo $mediaBtnData['preview-target-id'] ?>"
        >
            <?php _e('Remove', 'sd_coupon_central'); ?>
        </a>
    </div>
</div>