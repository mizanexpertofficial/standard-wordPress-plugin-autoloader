<?php

/**
 * Plugin Name:       Standard WordPress Plugin Autoloader
 * Plugin URI:        https://mizanexpert.com/
 * Description:       Standard WordPress Plugin Autoloader
 * Version:           1.0.0
 * Author:            MizanExpert
 * Author URI:        https://mizanexpert.com/
 * Text Domain:       swpa
 * Domain Path:       /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . '/includes/autoloader.php';

\MizanExpert\Autoloader::get_instance()->register();
\MizanExpert\Autoloader::get_instance()->add_namespace(
    'MizanExpert',
    realpath(plugin_dir_path(__FILE__) . '/includes')
);
