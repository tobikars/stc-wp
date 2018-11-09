<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    /* Dashboard links
    */
    public function adminDashboard() {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    public function endpointDashboard() {
        return require_once( "$this->plugin_path/templates/endpoints.php" );
    }

    public function cptDashboard() {
        return require_once( "$this->plugin_path/templates/cpt.php" );
    }
    
    /* settings */
    public function stOptionsGroup( $input) {
        return $input;
    }

    public function stSections() {
        echo 'This is a section.';
    }

    // generic text field callback for admin section.
    public function stTextField($args) {
        $fieldname = $args['label_for'];
        $value = esc_attr( get_option( $fieldname ));
        echo '<input type="text" class="regular-text" name="' . $fieldname . '" value="' . $value . '" placeholder=" no value yet for ' . $fieldname . ' ">';
    }

}