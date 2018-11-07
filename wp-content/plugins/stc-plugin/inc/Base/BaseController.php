<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin;
    public $plugin_icon;

    public function __construct() {
        // point 2 directories UP from the class:
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2) );
        
        // go up 3 directories to get the plugin name: 
        $this->plugin = plugin_basename( dirname( __FILE__, 3) . '/stc-plugin.php' );
        
        // icon to be used
        $this->plugin_icon = $this->plugin_url . 'assets/icons/st-symbol.png'; 
    }
}