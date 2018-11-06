<?php
/** 
 * @package STCPlugin
 */

 /*
 Plugin Name: ScanTrust Consumer Plugin
 Plugin URI: http://localhost:8000
 Description: This is the Official ScanTrust Plugin for Wordpress. It can be used to display code, scan, product and scm data.
 Version: 0.0.1
 Author: Tobias Kars
 Author URI: https://www.linkedin.com/in/tobikars/
 License: GPLv2 or later
 Text Domain: scantrust-plugin
 */

/*
ScanTrust Consumer Plugin For Wordpress
Copyright (C) 2018 Tobias Kars

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

For a copy of the full GNU General Public License see https://www.gnu.org/licenses/gpl-2.0.txt, 
or write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

defined( 'ABSPATH' ) or die( ' Wordpress needs to be running, or NO ACCESS FOR YOU!' );

if ( file_exists( dirname( __FILE__ ). '/vendor/autoload.php')) {
    require_once dirname( __FILE__ ). '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;

if (!class_exists('STCPlugin')) {

// ScanTrustConsumer STC Plugin
class STCPlugin 
{
    public $plugin;

    function __construct() { 
        // add_action( 'init', array( $this, 'custom_post_type' ) );
        $this->plugin = plugin_basename( __FILE__ );
    } 

    function register() {
        // for non-admin FE: add_action( 'wp_enqueue_scripts', array( $this, 'enqueue'));
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue'));
        add_action('admin_menu', array( $this, 'add_admin_pages'));
        add_filter("plugin_action_links_$this->plugin", array( $this, 'settings_link'));
    }

    function settings_link( $links ) {
        // add custom settings link
        $settings_link = '<a href="admin.php?page=scantrust_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    function add_admin_pages() {
        // add_menu_page(('ScanTrust Plugin'), 'ScanTrust', 'manage_options', 'scantrust_plugin', array( $this, 'admin_index'), 'dashicons-location-alt' , 110);
        add_menu_page(('ScanTrust Plugin'), 'ScanTrust', 'manage_options', 'scantrust_plugin', array( $this, 'admin_index'), plugins_url('/assets/icons/st-symbol.png' , __FILE__ ) , 110);
        
    }

    function admin_index() {
        // require template
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
    }

    function uninstall() {
        // delete custom post type
        // delete all the plugin data from the DB
    }

    function custom_post_type() {
        register_post_type( 'scanresult', ['public' => true, 'label' => 'Scan Results']);
    }


    function enqueue() {
        //enqueue 
        wp_enqueue_style('stcstyle', plugins_url('/assets/css/stc.css' , __FILE__ ) );
        wp_enqueue_script('stc.js', plugins_url('/assets/js/stc.js' , __FILE__ ) );
    }

    function activate() {
        Activate::activate();
    }

    function deactivate() {
        Deactivate::deactivate();
    }

}

$stcPlugin = new STCPlugin();
$stcPlugin->register();

// activation:
// require_once plugin_dir_path( __FILE__ ) . 'inc/stc-plugin-activate.php';
register_activation_hook( __FILE__, array( $stcPlugin, 'activate') );

// deactivation:
// require_once plugin_dir_path( __FILE__ ) . 'inc/stc-plugin-deactivate.php';
register_deactivation_hook( __FILE__, array( $stcPlugin, 'deactivate') );

}