<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class ShortCodesManager extends BaseController
{
    public function register() 
    {
        // templated shortcodes each have a template file
        $shortCodes = [
            'st_json',
            'st_scan',
            'st_code',
            'st_product',
            'st_brand',
            'st_campaign',
        ];
        
        foreach( $shortCodes as $shortcode ) {
            add_shortcode($shortcode, array( $this,'loadTemplate'));    
        }
    }

    public function loadTemplate($atts, $content, $name ) {
        ob_start();
        require_once("$this->plugin_path/templates/shortcodes/$name.php");
        return ob_get_clean();
    }

}