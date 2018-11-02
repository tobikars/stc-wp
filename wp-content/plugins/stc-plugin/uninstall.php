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
$scanresults = get_posts( array( 'post_type' => 'scanresult', 'numberposts' => -1) );
foreach( $scanresults as $scanresult ) {
    wp_delete_post( $scanresult->ID, true);
}
