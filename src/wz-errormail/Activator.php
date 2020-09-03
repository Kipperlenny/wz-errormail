<?php

namespace Wcustom\Wzerrormail;

use Wcustom\Wzerrormail\Admin\Admin;

/**
 * Fired after plugin loaded, for inital stuff
 *
 * @since      0.0.1
 * @package    Wcustom
 * @subpackage Wcustom/includes
 * @author     WebZap
 */
class Activator
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
    public function __construct( $version )
    {
        $this->version = $version;
    }

	/**
	 * Install our mu plugin file
	 *
	 * @since    0.0.1
	 */
    public static function activate()
	{
	    if(!is_dir(WPMU_PLUGIN_DIR)) {
	        mkdir(WPMU_PLUGIN_DIR);
	    }
	    
	    if(!is_file(WPMU_PLUGIN_DIR . '/mu-wz-errormail.php')) {
	        copy(WZERRORMAIL_PLUGIN_PATH . '/src/wz-errormail/files/mu-wz-errormail.php', WPMU_PLUGIN_DIR . '/mu-wz-errormail.php');
	    }
	}

}