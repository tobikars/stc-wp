<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Base;

class Enqueue 
 {
    public function register() {
        // for non-admin FE: add_action( 'wp_enqueue_scripts', array( $this, 'enqueue'));
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue'));
    }

    public function enqueue() {
        wp_enqueue_style( 'stc.css', PLUGIN_URL . 'assets/css/stc.css' );
        wp_enqueue_script( 'stc.js', PLUGIN_URL . 'assets/js/stc.js' );
    }

}