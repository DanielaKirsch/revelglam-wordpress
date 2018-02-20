<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://revelglam.com
 * @since             0.1
 * @package           revelglam
 *
 * @wordpress-plugin
 * Plugin Name:       Revel Glam
 * Plugin URI:        https://revelglam.com
 * Description:       
 * Version:           0.11
 * Author:            Revel Glam
 * Author URI:        http://revelglam.com/
 * Text Domain:       revelglam
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-revelglam-activator.php
 */
function activate_revelglam() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-revelglam-activator.php';
	revelglam_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-revelglam-deactivator.php
 */
function deactivate_revelglam() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-revelglam-deactivator.php';
	revelglam_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_revelglam' );
register_deactivation_hook( __FILE__, 'deactivate_revelglam' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-revelglam.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1
 */
function run_revelglam() {
	$plugin = new revelglam();
	$plugin->run();
}
run_revelglam();
