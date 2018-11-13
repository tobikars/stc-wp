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
        return require_once( "$this->plugin_path/templates/api.php" );
    }

    public function cptDashboard() {
        return require_once( "$this->plugin_path/templates/cpt.php" );
    }
    
    /* settings */
    public function stOptionsGroup( $input) {
        return $input;
    }

    public function stSections() {
        echo <<<EOS
            <p>This section controls the API-key needed to retrieve the details from the ScanTrust system, as well as the type of data that gets returned.<br>
            By default, all shortcodes are active for use in pages / posts. See the <b>Shortcodes tab</b> for more details.<br>
            To also make the data available as Javascript Objects, please check the <b>Provide POJO</b> checkbox.</p>
EOS
            ;
    }

    // generic textfield callback for admin section
    public function stTextField($args) {
        $fieldname = $args['label_for'];
        $class = $args['class'];
        $value = esc_attr( get_option( $fieldname ));
        echo '<input type="text" class="' . $class . '" name="' . $fieldname . '" size="200" value="' . $value . '" placeholder="no value yet for ' . $fieldname . ' ">';
    }

    // generic checkbox callback for admin section
    public function stCheckboxField($args) {
        $fieldname = $args['label_for'];
        $class = $args['class'];
        $checked = esc_attr( get_option( $fieldname ));
        echo '<input type="checkbox" class="' . $class . '" name="' . $fieldname . '" value="1" ' . ($checked ? 'checked' : '') . '>';
    }


}