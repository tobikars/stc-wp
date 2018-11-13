<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Base;

class ShortCodesManager 
{
    public function register() 
    {
        add_shortcode('tk', array( $this,'test_shortcode'));
        add_shortcode('st_api_key', array( $this,'st_api_key'));
        
    }

    // Function to add subscribe text to posts and pages
    public function test_shortcode() {
        return '<h1>First name: ' . get_option("first_name") . '</h1>';
    }

    public function st_api_key() {
        $key = get_option("st_api_key");
        return 'API Key: ' .  ( isset($key) ? '(not set yet)' : $key );
    }


}