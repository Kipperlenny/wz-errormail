<?php
/**
 * Plugin Name: fire me first WZerrormail
 * Description: This is a helper plugin, to fire WZerrormail first
 * Author:      WebZap
 * License:     GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

// Basic security, prevents file from being loaded directly.
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

if(!defined('RECOVERY_MODE_EMAIL')) {
    define("RECOVERY_MODE_EMAIL", 'info@wp247.de');
}

add_filter( 'recovery_mode_email', function( $email ) {
    $email['to'] = 'info@wp247.de';
    return $email;
});