<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           SGCA_API
 *
 * @wordpress-plugin
 * Plugin Name:       SGCA API
 * Plugin URI:        #
 * Description:       Display recent post from another WP website by using WP REST API.
 * Version:           1.0.0
 * Author:            SGCArena
 * Author URI:        https://www.sgcarena.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sgca-api
 * Domain Path:       /languages
 */

// Disable direct file access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SGCA_API_VERSION', '1.0.0' );

/**
 * Register Gutenbarg Block
 * by help of ACF
 * */
require_once plugin_dir_path( __FILE__ ) . 'includes/register-blocks.php';
