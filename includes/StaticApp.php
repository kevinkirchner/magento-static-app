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
    
    /**
     * Add CSS file to HEAD entity
     *
     * @param string $name
     * @param string $params
     * @return Mage_Page_Block_Html_Head
     */
    public function addCss($name, $theme = 'default', $params = "")
    {
        $this->addItem('skin_css', $name, $theme, $params);
        return $this;
    }

    /**
     * Add JavaScript file to HEAD entity
     *
     * @param string $name
     * @param string $params
     * @return Mage_Page_Block_Html_Head
     */
    public function addJs($name, $theme = 'default', $params = "")
    {
        $this->addItem('js', $name, $theme, $params);
        return $this;
    }

    public function addExternalJs($url, $theme = 'default', $params = "")
    {
        $this->addItem('external_js', $url, $theme, $params);
        return $this;        
    }

    /**
     * Add HEAD Item
     *
     * Allowed types:
     *  - js
     *  - js_css
     *  - skin_js
     *  - skin_css
     *  - rss
     *
     * @param string $type
     * @param string $name
     * @param string $params
     * @param string $if
     * @param string $cond
     * @return Mage_Page_Block_Html_Head
     */
    public function addItem($type, $name, $theme = 'default', $params=null, $if=null, $cond=null)
    {
        if ($type==='skin_css' && empty($params)) {
            $params = 'media="all"';
        }
        $this->_data['items'][$type.'/'.$name] = array(
            'type'   => $type,
            'name'   => $name,
            'theme'  => $theme,
            'params' => $params,
            'if'     => $if,
            'cond'   => $cond,
       );
        return $this;
    }


    /**
     * print out css and js
     *
     * @return string
     * @author 
     **/
    public function getCssJsHtml()
    {
    	if (!is_null($this->_data) && isset($this->_data['items'])) {
    		$html = '';
    		$script = '<script type="text/javascript" src="%s"%s></script>';
    		$link = '<link rel="stylesheet" type="text/css" href="%s"%s />';
    		$items = $this->_data['items'];
    		foreach ($items as $key => $item) {
    			$html .= isset($item['if']) ? '<!--[if ' . $item['if'] . ']>' : '';
    			switch ($item['type']) {
	                case 'js_css':    // js/*.css
    					$html .= sprintf($link, 'js/'.$item['name'], $item['params']);
    					break;
	                case 'js':        // js/*.js
    					$html .= sprintf($script, 'js/'.$item['name'], $item['params']);
    					break;
	                case 'skin_css':  // skin/*/*.css
    					$html .= sprintf($link, 'skin/'.$item['theme'].'/css/'.$item['name'], $item['params']);
    					break;
	                case 'skin_js':   // skin/*/*.js
    					$html .= sprintf($script, 'skin/'.$item['theme'].'/css/'.$item['name'], $item['params']);
    					break;
                    case 'external_js':
                        $html .= sprintf($script, $item['name'], $item['params']);
                        break;
    				default:
    					# code...
    					break;
    			}
    			$html .= isset($item['if']) ? '<![endif-->' : '';
    		}
            return $html;
    	}
    }
    
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