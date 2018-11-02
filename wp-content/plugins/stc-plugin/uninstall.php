<?php

/**
 *  triggered on uninstall 
 * 
 * @package STCPlugin
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

// Clear database stored data
$scans = get_posts( array( 'post_type' => 'scans', 'numberposts' => -1) );
foreach( $scans as $scan ) {
    wp_delete_post( $scan->ID, true);
}
