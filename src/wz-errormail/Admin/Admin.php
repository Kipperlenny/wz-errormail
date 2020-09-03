<?php

namespace Wcustom\Wzerrormail\Admin;

use Wcustom\Wzerrormail\{Helper};

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Wcustom
 * @subpackage Wcustom/admin
 * @author     WebZap
 */
class Admin
{
    
    /**
     * The version of this plugin.
     *
     * @since    0.0.1
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    
    /**
     * Initialize the class and set its properties.
     *
     * @since    0.0.1
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $version = 1 )
    {
        $this->version = $version;
    }
	
	/**
	 * Add a flash notice to {prefix}options table until a full page refresh is done
	 *
	 * @param string $notice our notice message
	 * @param string $type This can be "info", "warning", "error" or "success", "warning" as default
	 * @param boolean $dismissible set this to TRUE to add is-dismissible functionality to your notice
	 * @return void
	 */
	public function add_flash_notice( $notice = "", $type = "warning", $dismissible = true )
	{
	    // Here we return the notices saved on our option, if there are not notices, then an empty array is returned
	    $notices = get_option( "wz-errormail_flash_notices", array() );
	    
	    $dismissible_text = ( $dismissible ) ? "is-dismissible" : "";
	    
	    // We add our new notice.
	    $notices[md5($notice)] = array(
	        "notice" => $notice,
	        "type" => $type,
	        "dismissible" => $dismissible_text
	    );
	    
	    // Then we update the option with our notices array
	    update_option("wz-errormail_flash_notices", $notices );
	}
	
	/**
	 * Function executed when the 'admin_notices' action is called, here we check if there are notices on
	 * our database and display them, after that, we remove the option to prevent notices being displayed forever.
	 * @return void
	 */
	public function display_flash_notices()
	{
	    $notices = get_option( "wz-errormail_flash_notices", array() );
	    
	    // Iterate through our notices to be displayed and print them.
	    foreach ( $notices as $notice ) {
	        printf('<div class="notice notice-%1$s %2$s"><p>%3$s</p></div>',
	            $notice['type'],
	            $notice['dismissible'],
	            $notice['notice']
	            );
	    }
	    
	    // Now we reset our options to prevent notices being displayed forever.
	    if( ! empty( $notices ) ) {
	        delete_option( "wz-errormail_flash_notices", array() );
	    }
	}
	
	/**
	 * check if all plugins are activated
	 */
	public function plugins_not_activated()
	{
	    
	}
	
	# get credentials
	public function connect_fs()
	{
	    global $wp_filesystem;
	    
	    if( false === ($credentials = request_filesystem_credentials('')) )
	    {
	        return false;
	    }
	    
	    //check if credentials are correct or not.
	    if(!WP_Filesystem($credentials))
	    {
	        request_filesystem_credentials('');
	        return false;
	    }
	    
	    return true;
	}
}