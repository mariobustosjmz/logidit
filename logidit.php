<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/mariobustosjmz
 * @since             1.0.0
 * @package           Logidit
 *
 * @wordpress-plugin
 * Plugin Name:       Logidit - Login Editor
 * Plugin URI:        https://github.com/mariobustosjmz/logidit
 * Description:       Simple Plugin para Cambiar el estilo del Login  Administrador.
 * Version:           1.1.1
 * Author:            Mario Bustos
 * Author URI:        https://github.com/mariobustosjmz
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       logidit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-logidit-activator.php
 */
function activate_logidit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-logidit-activator.php';
	Logidit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-logidit-deactivator.php
 */
function deactivate_logidit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-logidit-deactivator.php';
	Logidit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_logidit' );
register_deactivation_hook( __FILE__, 'deactivate_logidit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-logidit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_logidit() {

	$plugin = new Logidit();
	$plugin->run();

}
run_logidit();
