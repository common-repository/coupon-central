<?php

/**
 * Plugin Name: Coupon Central
 * Plugin URI: https://www.samudradigital.com
 * Description: Turn your Wordpress site into coupon central.
 * Version: 1.0.1
 * Author: Kasmin
 * Author URI: https://github.com/wakamin
 * License: GPL-2.0+
 * License URI: http://www.gnu.local/license/gpl-2.0.txt
 * Text Domain: sd_coupon_central
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit();
}

// Constants
define('SDCOUPON_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SDCOUPON_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Initialize
require_once SDCOUPON_PLUGIN_PATH . 'init.php';
