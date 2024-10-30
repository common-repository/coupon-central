<fieldset>
    <div>
        <div class="logo-preview<?php echo !$logo ? ' sdcc-hide' : '' ?>">
            <img id="sd_coupon_store_logo_preview" src="<?php echo esc_attr($logo) ?>">
        </div>

        <button 
            type="button" 
            class="button" 
            id="sd_coupon_store_logo_btn" 
            data-target-input="#sd_coupon_store_logo_input"
            data-target-preview="#sd_coupon_store_logo_preview"
        >
            <?php _e('Choose Logo', 'sd_coupon_central')?>
        </button>

        <input 
            type="hidden" 
            name="sd_coupon_store_logo" 
            id="sd_coupon_store_logo_input" 
            value="<?php echo esc_attr($logo); ?>"
        >
    </div>
</fieldset>