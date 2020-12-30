<?php

namespace Wcustom\Wzerrormail;

use Wcustom\Wzerrormail\{Loader, I18n, CustomFields, Cron};
use Wcustom\Wzerrormail\Admin\Admin;

/**
 * The admin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      0.0.1
 * @package    Wcustom
 * @subpackage Wcustom/includes
 * @author     WebZap
 */
class Wcustom
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      Wcustom_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.0.1
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.0.3
	 */
	public function __construct()
	{
		$this->plugin_name = 'wz-errormail';
		$this->version = '0.0.7';
		
		$this->load_dependencies();
		
		$this->define_cron_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wcustom_Loader. Orchestrates the hooks of the plugin.
	 * - Wcustom_i18n. Defines internationalization functionality.
	 * - Wcustom_Admin. Defines all hooks for the admin area.
	 * - Wcustom_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function load_dependencies()
	{
	    $this->loader = new Loader($this->version);
	    
	    return true;
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wcustom_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function set_locale()
	{

	    $plugin_i18n = new I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_admin_hooks()
	{

	}
	
	/**
	 * Register all of the hooks related to the ajax functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_ajax_hooks()
	{
	    
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_public_hooks()
	{   
	    
	}
	
	/**
	 * Register all of the hooks related to the redirect functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	public function define_redirect_hooks()
	{
	    global $wp_query;
	}
	
	/**
	 * Register all of the hooks related to the user-facing functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	public function define_user_hooks()
	{
	    
	}
	
	/**
	 * Register all of the hooks related to DB manipulation
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_db_hooks()
	{
	    
	}
	
	/**
	 * Register all of the hooks related to the cron functionality
	 * of the plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 */
	private function define_cron_hooks()
	{
	    
	    $plugin_cron = new Cron();
	    
	    $this->loader->add_action( 'init', $plugin_cron, 'unschedule_jquery_event', 100 );
	}
	
	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.0.1
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.0.1
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.0.1
	 * @return    Wcustom_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.0.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}

}