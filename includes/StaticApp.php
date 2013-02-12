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
            $theme = isset($this->_data['template']['theme']) ? $this->_data['template']['theme'] : $this->getTheme(true);
            $templatePath = 'app/' . $theme . '/template/' . $this->_data['template']['path'];
            if (file_exists($templatePath)) {
                include_once( $templatePath );
            } else {
                include_once( 'app/default/template/' . $this->_data['template']['path'] );
            }
        } else {
            throw new Exception("No template was set. Use StaticApp::setTemplate('path')", 1);
        }
        return $this;
    }
    
    // Add Block
    public function addBlock($template, $name, $alias='', $type='core/template', $theme='default')
    {
        $blockReference = $alias ? $alias : $name;
        $theme = $theme ? $theme : $this->getTheme();
        $path = file_exists('app/' . $theme . '/template/' . $template) ? 'app/' . $theme . '/template/' . $template : 'app/default/template/' . $template;
        $blockData = array(
            'template' => $path,
            'name' => $name,
            'alias' => $alias,
            'type' => $type,
            'theme' => $theme
        );
        $this->_blocks[ $blockReference ] = $blockData;
        return $this;
    }
    
    // Add CSS
    
    // Add JS
    
    // Add Item 
    
    // Add CMS Block
    public function addCmsBlock($structuralBlock, $template, $name, $alias='', $type='cms/block', $theme='default')
    {
        $blockData = array(
            'template' => $template,
            'name' => $name,
            'alias' => $alias,
            'type' => $type,
            'theme' => $theme
        );
        
        if ( !isset($this->_blocks[$structuralBlock]) ) {
            $this->_blocks[ $structuralBlock ] = array(
                'blocks' => $blockData
            );
        } else {
            $this->_blocks[$structuralBlock]['blocks'] = $blockData;
        }
        return $this;
    }

    // Add Content Block
    public function addContentBlock($structuralBlock, $template, $name, $alias='', $type='core/template', $theme='default')
    {
        $blockReference = $alias ? $alias : $name;
        $theme = $theme ? $theme : $this->getTheme();
        $path = file_exists('app/' . $theme . '/template/' . $template) ? 'app/' . $theme . '/template/' . $template : 'app/default/template/' . $template;
        $blockData = array(
            'template' => $path,
            'name' => $name,
            'alias' => $alias,
            'type' => $type,
            'theme' => $default
        );
        
        if ( !isset($this->_blocks[$structuralBlock]) ) {
            $this->_blocks[ $structuralBlock ] = array(
                'blocks' => $blockData
            );
        } else {
            $this->_blocks[$structuralBlock]['blocks'] = $blockData;
        }
        return $this;
    }
}