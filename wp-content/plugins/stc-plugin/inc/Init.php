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
            Base\SettingsLinks::class
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

// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;


//     function register() {
//         // for non-admin FE: add_action( 'wp_enqueue_scripts', array( $this, 'enqueue'));
//         add_action( 'admin_enqueue_scripts', array( $this, 'enqueue'));
//         add_action('admin_menu', array( $this, 'add_admin_pages'));
//         add_filter("plugin_action_links_$this->plugin", array( $this, 'settings_link'));
//     }

//     function settings_link( $links ) {
//         // add custom settings link
//         $settings_link = '<a href="admin.php?page=scantrust_plugin">Settings</a>';
//         array_push($links, $settings_link);

//         return $links;
//     }

//     function add_admin_pages() {
//         add_menu_page(('ScanTrust Plugin'), 'ScanTrust', 'manage_options', 'scantrust_plugin', array( $this, 'admin_index'), plugins_url('/assets/icons/st-symbol.png' , __FILE__ ) , 110);
//     }

//     function admin_index() {
//         // require template
//         require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
//     }

//     function uninstall() {
//         // delete custom post type
//         // delete all the plugin data from the DB
//     }

//     function custom_post_type() {
//         register_post_type( 'scanresult', ['public' => true, 'label' => 'Scan Results']);
//     }



//     function activate() {
//         Activate::activate();
//     }

//     function deactivate() {
//         Deactivate::deactivate();
//     }

// }

// $stcPlugin = new STCPlugin();
// $stcPlugin->register();

// // activation:
// register_activation_hook( __FILE__, array( $stcPlugin, 'activate') );

// // deactivation:
// register_deactivation_hook( __FILE__, array( $stcPlugin, 'deactivate') );

// }