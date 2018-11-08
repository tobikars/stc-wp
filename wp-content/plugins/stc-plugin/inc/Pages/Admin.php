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


    public function __construct() 
    {
        parent::__construct();

        $this->settings = new SettingsApi();

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

        $this->subpages = [
            [
                'parent_slug' => 'scantrust_plugin', 
                'page_title' => 'Endpoint & API Settings', 
                'menu_title' => 'Endpoint', 
                'capability' => 'manage_options',
                'menu_slug' => 'scantrust_plugin_endpoint',
                'callback' => array( $this->callbacks, 'endpointDashboard')
            ], 
            [
                'parent_slug' => 'scantrust_plugin', 
                'page_title' => 'Custom Post Types', 
                'menu_title' => 'CPT', 
                'capability' => 'manage_options',
                'menu_slug' => 'scantrust_plugin_cpt',
                'callback' => array($this->callbacks, 'cptDashboard')
            ],
            [
                'parent_slug' => 'scantrust_plugin', 
                'page_title' => 'Campaigns', 
                'menu_title' => 'Campaign Data', 
                'capability' => 'manage_options',
                'menu_slug' => 'scantrust_plugin_campaigns',
                'callback' => function() { echo '<h1>Placeholder: Campaign Settings</h1>'; }
            ],
            [
                'parent_slug' => 'scantrust_plugin', 
                'page_title' => 'Product Settings', 
                'menu_title' => 'Product Data', 
                'capability' => 'manage_options',
                'menu_slug' => 'scantrust_plugin_products',
                'callback' => function() { echo '<h1>Placeholder: Product Settings</h1>'; }
            ],
            [
                'parent_slug' => 'scantrust_plugin', 
                'page_title' => 'Scan Data Collection', 
                'menu_title' => 'Scan Data', 
                'capability' => 'manage_options',
                'menu_slug' => 'scantrust_plugin_scandata',
                'callback' => function() { echo '<h1>Placeholder: Scan Data Collection</h1>'; }
            ]
        ];

    }

    public function register() {
        $this->settings->addPages( $this->pages )->withSubPage('Admin')->addSubPages( $this->subpages )->register();
    }

 }
