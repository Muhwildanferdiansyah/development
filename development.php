<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.yukdiorder.com/
 * @since             1.0.1
 * @package           Development
 *
 * @wordpress-plugin
 * Plugin Name:       development
 * Plugin URI:        https://www.yukdiorder.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            yukdiorder
 * Author URI:        https://www.yukdiorder.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       development
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('DEVELOPMENT_VERSION', '1.0.0');
require 'vendor/autoload.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Muhwildanferdiansyah/development',
	__FILE__,
	'development'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('your-token-here');
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-development-activator.php
 */
function activate_development()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-development-activator.php';
	Development_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-development-deactivator.php
 */
function deactivate_development()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-development-deactivator.php';
	Development_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_development');
register_deactivation_hook(__FILE__, 'deactivate_development');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-development.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_development()
{

	$plugin = new Development();
	$plugin->run();
}
run_development();
