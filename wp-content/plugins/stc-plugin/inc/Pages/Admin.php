<?php
/** 
 * @package STCPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;

class Admin extends BaseController {

    public function register() {
        add_action('admin_menu', array( $this, 'add_admin_pages'));
    }

    function add_admin_pages() {
        add_menu_page(('ScanTrust Plugin'), 'ScanTrust', 'manage_options', 'scantrust_plugin', array( $this, 'admin_index'), $this->plugin_icon, 110);
    }

    function admin_index() {
        // require template
        require_once $this->plugin_path . 'templates/admin.php';
    }

 }
