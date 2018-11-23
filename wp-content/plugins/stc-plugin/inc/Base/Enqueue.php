<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
 {
    public function register() {
        // for non-admin FE: add_action( 'wp_enqueue_scripts', array( $this, 'enqueue'));
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue'));
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue'));
    }
    

    public function enqueue() {
        wp_enqueue_style( 'stc.css', $this->plugin_url . 'assets/stc.css' );
        wp_enqueue_script( 'stc.js', $this->plugin_url . 'assets/stc.js', array( 'jquery' ) );
    }

}