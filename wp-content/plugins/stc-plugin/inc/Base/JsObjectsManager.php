<?php
/** 
 * @package STCPlugin
 */
namespace Inc\Base;
use \Inc\Base\BaseController;

class JsObjectsManager extends BaseController
{
    public function register() { 
        // this is set for use in PAGES and POSTS, NOT on the backend.       
        // add_filter( 'query_vars', array($this, 'add_custom_query_vars') );
        // function add_custom_query_vars( $vars ){
        //     $vars = ["uid", "qr"];
        //     return $vars;
        // }
        // get the options:
        $st_api_key      = get_option( "st_api_key" );
        $st_api_url      = get_option( "st_api_url" );
        $st_qr_queryvar  = get_option( "st_qr_queryvar" );
        $st_uid_queryvar = get_option( "st_uid_queryvar" );
        $st_pojo_active  = get_option( "st_pojo_active" );
        $st_jquery_active  = get_option( "st_jquery_active" );
        
        $st_api_key_msg = $st_api_url_msg = $st_qr_queryvar_msg = $st_uid_queryvar_msg = $OPTION_NOT_SET = '<span class="msg-error">Option not set.</span>';
        if (!empty($st_api_key)) $st_api_key_msg = $st_api_key;
        if (!empty($st_api_url)) $st_api_url_msg = $st_api_url;
        if (!empty($st_qr_queryvar)) $st_qr_queryvar_msg = $st_qr_queryvar;
        if (!empty($st_uid_queryvar)) $st_uid_queryvar_msg = $st_uid_queryvar;        

        // parameters: 
        $st_qr = filter_input( INPUT_GET, $st_qr_queryvar, FILTER_SANITIZE_STRING );
        $st_uid = filter_input( INPUT_GET, $st_uid_queryvar, FILTER_SANITIZE_STRING );

        $CONFIG_MSG = '<h1 class="msg-ok">Good to go, getting Results:</h1>';
        if (empty($st_qr) || empty($st_uid)) $CONFIG_MSG = '<h1 class="msg-ok">Good to go (using demo code):</h1>';
        
        if (empty($st_qr)) $st_qr = "DD599859850418MPP051822749258AF";
        if (empty($st_uid)) $st_uid = "4083e7e5-1dc3-4d97-918f-84a91a6a8492";
        if (empty($st_qr_queryvar)) $st_qr_queryvar = "qr";
        if (empty($st_uid_queryvar)) $st_uid_queryvar = "uid";

        $st_uid_msg = $st_qr_msg = $URL_VAR_NOT_FOUND = '<span class="msg-error">(not found in the URL)</span>';
        if (!empty($st_qr)) $st_qr_msg = $st_qr;
        if (!empty($st_uid)) $st_uid_msg = $st_uid;

        $good_to_go = false; // needed before we load the JS

        if ( empty($st_api_key) || empty($st_api_url)) {
            $CONFIG_MSG = '<h1 class="msg-error">Options not set. No data retrieved.</h1>';
        } else {
            // put some error handling here (empty for now).
            $good_to_go = true; // needed before we load for JS 
        }

        // all the stuff we pass to JS goes here:
        $passToJS = array(
            'st_api_key' => $st_api_key,
            'st_api_url' => $st_api_url,
            'st_qr' => $st_qr,
            'st_uid' => $st_uid,            
            'st_qr_queryvar' => $st_qr_queryvar,
            'st_uid_queryvar' => $st_uid_queryvar,
            'st_api_key_msg' => $st_api_key_msg,
            'st_api_url_msg' => $st_api_url_msg,
            'st_qr_msg' => $st_qr_msg,
            'st_uid_msg' => $st_uid_msg,
            'st_qr_queryvar_msg' => $st_qr_queryvar_msg,
            'st_uid_queryvar_msg' => $st_uid_queryvar_msg,
            'good_to_go' => $good_to_go,
            'st_pojo_active' => $st_pojo_active,
            'config_check_msg' => $CONFIG_MSG,
            'st_jquery_active' => $st_jquery_active
        );

        //wp_enqueue_script( 'stc.js', $this->plugin_url . 'assets/stc.js' );
        wp_enqueue_script( 'stc.js', $this->plugin_url . 'assets/stc.js', array( 'jquery' ), '1.0.0', true );
        wp_localize_script('stc.js', 'stParams', $passToJS);
    }

}