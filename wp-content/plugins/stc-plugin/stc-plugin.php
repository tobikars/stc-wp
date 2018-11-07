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

//autoload from Inc folder:
if ( file_exists( dirname( __FILE__ ). '/vendor/autoload.php')) {
    require_once dirname( __FILE__ ). '/vendor/autoload.php';
}

// Run during plugin activation and deactivation:
function activate_stc_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_stc_plugin' );

function deactivate_stc_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_stc_plugin' );

if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
