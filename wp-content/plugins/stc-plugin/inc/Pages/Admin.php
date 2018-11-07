<?php
/** 
 * @package STCPlugin
 */

 namespace Inc\Pages;

 class Admin {
    public $stc_icon;

    function __construct() { 
        $this->stc_icon = PLUGIN_URL . 'assets/icons/st-symbol.png'; 
    } 

    public function register() {
        add_action('admin_menu', array( $this, 'add_admin_pages'));
    }

    function add_admin_pages() {
        add_menu_page(('ScanTrust Plugin'), 'ScanTrust', 'manage_options', 'scantrust_plugin', array( $this, 'admin_index'), $this->stc_icon, 110);
    }

    function admin_index() {
        // require template
        require_once PLUGIN_PATH . 'templates/admin.php';
    }

 }
