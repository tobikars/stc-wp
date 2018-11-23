<?php
/** 
 * @package STCPlugin
 */

namespace Inc;

 final class Init 
 {
    /* 
    *  store all the classes into a services array.
    *  instantiate all the classes in the array
    *  for each class, call the register() method if it exists. 
    */
    public static function get_services() {
        return [ 
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\JsObjectsManager::class,
            Base\ShortCodesManager::class
        ];
    }
    
    public static function register_services() {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register')) {
                $service->register();
            }
        }
    }

    private static function instantiate( $class ) {
        $service = new $class();
        return $service;
    }

 }
