<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

?>

<table class="sdcc-mbox-form-table" role="presentation">
    <tbody>
        <?php foreach ($this->couponDetailsMetaBoxes as $mBox): ?>
        <?php
            if ($mBox['key'] == '_sd_coupon_store') {
                $store = sdcc_coupon_store($post->ID);
                $value = $store->term_id;
            } else {
                $value = esc_attr(get_post_meta($post->ID, $mBox['key'], true));
            }
        ?>
            <tr>
                <th scope="row">
                    <label for="sd_coupon_code"><?php echo $mBox['name'] ?></label>
                </th>
                <td>
                    <?php if ($mBox['field_type'] == 'text'): ?>
                        <input type="text" class="<?php echo $mBox['wide_field'] ? 'widefat' : '' ?>" name="<?php echo $mBox['key'] ?>" id="<?php echo $mBox['key'] ?>" value="<?php echo $value ?>" />
                    <?php endif; ?>

                    <?php if ($mBox['field_type'] == 'select'): ?>
                        <select name="<?php echo $mBox['key'] ?>" id="<?php echo $mBox['key'] ?>" class="sdcc-select2">
                            <?php $options = call_user_func($mBox['options']); ?>
                            <?php foreach ($options as $option): ?>
                                <option value="<?php echo esc_attr($option['value']) ?>" <?php selected($value, esc_attr($option['value'])) ?>><?php echo esc_attr($option['text']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>

                    <?php if ($mBox['field_type'] == 'datepicker'): ?>
                        <input type="text" class="sdcc-datepicker" name="<?php echo $mBox['key'] ?>" id="<?php echo $mBox['key'] ?>" value="<?php echo $value ?>" />
                    <?php endif; ?>

                    <?php if ($mBox['field_type'] == 'checkbox'): ?>
                        <input type="checkbox" name="<?php echo $mBox['key'] ?>" id="<?php echo $mBox['key'] ?>" value="yes" <?php echo $value == 'yes' ? 'checked' : '' ?> />
                    <?php endif; ?>

                    <?php if ($mBox['field_type'] == 'media'): ?>
                        <?php
                            $targetPreview = $mBox['key'];
                            $targetInput = $targetPreview . '-input';
                            sdcc_render_media_button($targetPreview, $targetInput, $value);
                        ?>
                        <input type="hidden" name="<?php echo $mBox['key'] ?>" id="<?php echo $targetInput ?>" value="<?php echo $value ?>" />
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>