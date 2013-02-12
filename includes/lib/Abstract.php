<?php 
/**
 * Abstract.php
 *
 * @copyright   Copyright (c) 2012 Classy Llama Studios LLC
 * @author      Kevin Kirchner <kevin@classyllama.com>
 */
class StaticApp_Abstract extends Mage
{
    protected $_structuralBlocks = array();
    
    function __construct()
    {
        $this->_structuralBlocks = array('content', 'left', 'right', 'topMenu');
        return $this;
    }
    
    // getChildHtml
    public function getChildHtml($blockId='')
    {
        $html = '';
        if ( isset($this->_blocks[$blockId]) ) {
            if (in_array($blockId, $this->_structuralBlocks)) {
                $contentBlocks = $this->_blocks[$blockId];
                foreach ($contentBlocks as $cmsBlockId => $cmsBlockData) {
                    $html .= $this->toHtml( $contentBlocks[$cmsBlockId]['template'] );
                }
            } else {
                $html = $this->toHtml( $this->_blocks[$blockId]['template'] );
            }
        }
        return $html;
    }
    
    // toHtml
    public function toHtml($path)
    {
        ob_start();
        require( $path );
        return ob_get_clean();
    }
    
    // _getTheme
    protected function _getTheme($default=false)
    {
        $theme = $default ? 'default_theme' : 'custom_theme';
        return isset($this->_config[ $theme ]) ? $this->_config[ $theme ] : 'default';
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
    
    
}
 