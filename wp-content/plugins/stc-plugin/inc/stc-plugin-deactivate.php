<?php
/** 
 * @package STCPlugin
 */


 class StcPluginDeactivate 
 {
     public static function deactivate() {
         flush_rewrite_rules();
         
     }
 }