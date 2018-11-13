<?php
/** 
 * @package STCPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {

    public $settings;
    public $pages = array();
    public $subpages = array();

    public $shortcodes;

    public function __construct() 
    {
        parent::__construct();

        // helper class for settings
        $this->settings = new SettingsApi();

        // helper class to contain callbacks for the admin section
        $this->callbacks = new AdminCallbacks();

        $this->pages = [
            [
                'page_title' => 'ScanTrust Plugin', 
                'menu_title' => 'ScanTrust', 
                'capability' => 'manage_options',
                'menu_slug' => 'scantrust_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => $this->plugin_icon, 
                'position' => 110
            ]
        ];

        // no subpages needed for now.
        $this->subpages = [
            [
                'parent_slug' => 'scantrust_plugin', 
                'page_title' => 'Test the Endpoint and API', 
                'menu_title' => 'Test it out', 
                'capability' => 'manage_options',
                'menu_slug' => 'scantrust_plugin_endpoint',
                'callback' => array( $this->callbacks, 'endpointDashboard')
            ], 
            // [
            //     'parent_slug' => 'scantrust_plugin', 
            //     'page_title' => 'Custom Post Types', 
            //     'menu_title' => 'CPT', 
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'scantrust_plugin_cpt',
            //     'callback' => array($this->callbacks, 'cptDashboard')
            // ],
            // [
            //     'parent_slug' => 'scantrust_plugin', 
            //     'page_title' => 'Campaigns', 
            //     'menu_title' => 'Campaign Data', 
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'scantrust_plugin_campaigns',
            //     'callback' => function() { echo '<h1>Placeholder: Campaign Settings</h1>'; }
            // ],
            // [
            //     'parent_slug' => 'scantrust_plugin', 
            //     'page_title' => 'Product Settings', 
            //     'menu_title' => 'Product Data', 
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'scantrust_plugin_products',
            //     'callback' => function() { echo '<h1>Placeholder: Product Settings</h1>'; }
            // ],
            // [
            //     'parent_slug' => 'scantrust_plugin', 
            //     'page_title' => 'Scan Data Collection', 
            //     'menu_title' => 'Scan Data', 
            //     'capability' => 'manage_options',
            //     'menu_slug' => 'scantrust_plugin_scandata',
            //     'callback' => function() { echo '<h1>Placeholder: Scan Data Collection</h1>'; }
            // ]
        ];

    }

    public function setSettings() 
    {
        $args = array(
            array(
                'option_group'=> 'st_options_group',
                'option_name' => 'st_api_key',
                'callback' => array( $this->callbacks, 'stOptionsGroup')
            ),
            array(
                'option_group'=> 'st_options_group',
                'option_name' => 'st_api_url',
            ),
            array(
                'option_group'=> 'st_options_group',
                'option_name' => 'st_qr_queryvar',
            ),
            array(
                'option_group'=> 'st_options_group',
                'option_name' => 'st_uid_queryvar',
            ),
            array(
                'option_group'=> 'st_options_group',
                'option_name' => 'st_pojo_active',
            ),
            
        );
        $this->settings->setSettings( $args );
    } 

    public function setSections() 
    {
        $args = array(
            array(
                'id'=> 'st_admin_index',
                'title' => 'Endpoint and API settings',
                'callback' => array( $this->callbacks, 'stSections'),
                'page' => 'scantrust_plugin'
            )
        );
        $this->settings->setSections( $args );
    } 

    public function setFields() 
    {
        $args = array(
            array(
                'id'=> 'st_api_key',
                'title' => 'API Key',
                'callback' => array( $this->callbacks, 'stTextField'),
                'page' => 'scantrust_plugin',
                'section' => 'st_admin_index',
                'args' => array(
                    'label_for' => 'st_api_key',
                    'class' => 'textfield-class'
                ),
            ),
            array(
                'id'=> 'st_api_url',
                'title' => 'ScanTrust API',
                'callback' => array( $this->callbacks, 'stTextField'),
                'page' => 'scantrust_plugin',
                'section' => 'st_admin_index',
                'args' => array(
                    'label_for' => 'st_api_url',
                    'class' => 'textfield-class'
                )
            ),
            array(
                'id'=> 'st_qr_queryvar',
                'title' => 'QR tag',
                'callback' => array( $this->callbacks, 'stTextField'),
                'page' => 'scantrust_plugin',
                'section' => 'st_admin_index',
                'args' => array(
                    'label_for' => 'st_qr_queryvar',
                    'class' => 'textfield-short-class'
                )
            ),
            array(
                'id'=> 'st_uid_queryvar',
                'title' => 'Scan UID tag',
                'callback' => array( $this->callbacks, 'stTextField'),
                'page' => 'scantrust_plugin',
                'section' => 'st_admin_index',
                'args' => array(
                    'label_for' => 'st_uid_queryvar',
                    'class' => 'textfield-short-class'
                )
            ),
            array(
                'id'=> 'st_pojo_active',
                'title' => 'Provide POJO',
                'callback' => array( $this->callbacks, 'stCheckboxField'),
                'page' => 'scantrust_plugin',
                'section' => 'st_admin_index',
                'args' => array(
                    'label_for' => 'st_pojo_active',
                    'class' => 'checkbox-class'
                )
            )
            
        );
        $this->settings->setFields( $args );
    } 

    public function register() {
        // populate settings / sections / fields
        $this->setSettings();
        $this->setSections();
        $this->setFields();

        // build the admin menu
        $this->settings->addPages( $this->pages )->withSubPage('Admin')->addSubPages( $this->subpages )->register();
    }

 }
