<?php 
// Load the rest of the classes
require_once('lib/Mage.php');
require_once('lib/Abstract.php');
require_once('lib/GenerateXML.php');
require_once('lib/Template.php');
require_once('lib/Head.php');

/**
 * StaticApp.php
 *
 * @copyright   Copyright (c) 2012 Classy Llama Studios LLC
 * @author      Kevin Kirchner <kevin@classyllama.com>
 */
class StaticApp extends StaticApp_Abstract
{
    
    public function run($pageTitle='')
    {
        // Store the page title
        $this->_data['page_title'] = $pageTitle;
        
        // include the template that was set
        if ( isset($this->_data['template']) ) {
            $theme = $this->_data['template']['default'] ? $this->_config['default_theme'] : $this->_config['custom_theme'];
            $templatePath = 'app/' . $theme . '/template/' . $this->_data['template']['path'];
            include_once( $templatePath );
        } else {
            throw new Exception("No template was set. Use StaticApp::setTemplate('path')", 1);
        }
        return $this;
    }
    
    // Set Config
    public function setConfig($config)
    {
        $this->_config = $config;
        return $this;
    }
    
    // Set Template
    public function setTemplate($path, $default=false)
    {
        $this->_data['template'] = array(
            'path' => $path,
            'default' => $default
        );
        return $this;
    }

    // Set Handle
    public function setHandle($handle)
    {
        $this->_data['handle'] = $handle;
        return $this;
    }
    
    // TODO: make add block methods to pull them with getChildHtml
    // Add Block
    
    // Add CSS
    
    // Add JS
    
    // Add Item 
    
    // Add CMS Block
    
}