<?php

namespace Wcustom\Wzerrormail;

use Wcustom\Wzerrormail\Admin\Admin;

/**
 *
 * This class defines all actions for the cron job. 
 *
 * @since      0.0.1
 * @package    Wcustom
 * @subpackage Wcustom/includes
 * @author     WebZap
 */
class Cron
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 */
	public function __construct( $plugin_name = null )
	{

		$this->plugin_name = $plugin_name;
	}

	/**
	 * Initialize all crons/schedules.
	 * Init for Cron to set function call in Wcustom::define_cron_hooks
	 *
	 * @since    0.0.1
	 * @param      string    $plugin_name       The name of the plugin.
	 */
	public function cron_activation()
	{

	}
	public function refresh_db()
	{
		global $wpdb;
		
	}

	public function cron_deactivation()
	{
	    
	}

	/**
	 * Add custom Interval for Cron
	 *
	 */
	public function add_intervals( $schedules )
	{
		$schedules['every_five_min'] = array(
				'interval' => 300,
				'display' => __( 'Once Every 5 Mins' ),
		);
		$schedules['every_fifteen_min'] = array(
		    'interval' => 900,
		    'display' => __( 'Once Every 15 Mins' ),
		);
		$schedules['secondhour'] = array(
		    'interval' => 3600*2,
		    'display' => __( 'Every second hour' ),
		);

		return $schedules;
	}
}
