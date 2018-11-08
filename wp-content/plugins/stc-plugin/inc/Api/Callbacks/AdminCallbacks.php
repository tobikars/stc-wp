<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function adminDashboard() {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    public function endpointDashboard() {
        return require_once( "$this->plugin_path/templates/endpoints.php" );
    }

    public function cptDashboard() {
        return require_once( "$this->plugin_path/templates/cpt.php" );
    }

}