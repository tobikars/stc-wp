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

// ScanTrustConsumer STC Plugin
class STCPlugin 
{
    function __construct() { 
        add_action( 'init', array( $this, 'custom_post_type' ) );
    } 

    function activate() {
        // generated a custom post type
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
    }

    function uninstall() {
        // delete custom post type
        // delete all the plugin data from the DB
    }

    function custom_post_type() {
        register_post_type( 'scanresult', ['public' => true, 'label' => 'Scan Results']);
    }

}

if ( class_exists( 'STCPlugin') ) {
    $stcPlugin = new STCPlugin();
}

// activation:
register_activation_hook( __FILE__, array( $stcPlugin, 'activate') );

// deactivation:
register_deactivation_hook( __FILE__, array( $stcPlugin, 'deactivate') );

// uninstall:
// not done for now. 
