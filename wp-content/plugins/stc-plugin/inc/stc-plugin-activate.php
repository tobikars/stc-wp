<?php
/** 
 * @package STCPlugin
 */


 class StcPluginActivate 
 {
     public static function activate() {
         flush_rewrite_rules();
         
     }
 }