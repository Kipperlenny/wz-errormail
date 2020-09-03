<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              *
 * @since             0.0.3
 * @package           WZerrormail
 *
 * @wordpress-plugin
 * Plugin Name:       WZerrormail
 * Plugin URI:        *
 * Description:       Ermöglicht das Ändern des Critical Error Mail Receiver
 * Version:           0.0.4
 * Author:            WebZap
 * Author URI:        https://webzap.eu
 * Text Domain:       wz-errormail
 * Domain Path:       /languages
 */

namespace Wcustom\Wzerrormail;

use Wcustom\Wzerrormail\{Wcustom, Activator, Deactivator};

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'WZERRORMAIL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
require_once("vendor/autoload.php");

$myUpdateChecker = \Puc_v4_Factory::buildUpdateChecker(
    'https://wpupdate.webhilfe.eu/?action=get_metadata&slug=wz-errormail', //Metadata URL.
    __FILE__, //Full path to the main plugin file.
    'wz-errormail' //Plugin slug. Usually it's the same as the name of the directory.
);


$plugin = new Wcustom();
$plugin->run();

register_activation_hook( __FILE__, ["Wcustom\Wzerrormail\Activator", 'activate'] );
register_deactivation_hook( __FILE__, ["Wcustom\Wzerrormail\Deactivator", 'deactivate'] );