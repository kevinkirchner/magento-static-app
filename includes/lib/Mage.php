<?php 
/**
 * Mage.php
 *
 * @copyright   Copyright (c) 2012 Classy Llama Studios LLC
 * @author      Kevin Kirchner <kevin@classyllama.com>
 */
class Mage
{
    protected $_data = array();
    protected $_config = array();
    protected $_blocks = array();
    protected $_cmsBlocks = array();
    
    /**
     * Set/Get attribute wrapper
     *
     * @param   string $method
     * @param   array $args
     * @return  mixed
     */
    public function __call($method, $args)
    {
        switch (substr($method, 0, 3)) {
            case 'get' :
            case 'set' :
            case 'uns' :
            case 'has' :
                return '';
        }
    }

    public function __($value, $args=null)
    {
        return sprintf($value, $args);
    }
    
    public function helper($value='')
    {
        return $this;
    }
    
    public function getUrl($value='')
    {
        return '/static/#'.$value;
    }
    
    public function getTitle()
    {
        return isset($this->_data['page_title']) ? $this->_data['page_title'] : '';
    }
    
    public function getLogoSrc()
    {
        return isset($this->_config['logo_filename']) ? 'skin/' . $this->_getTheme() . '/images/' . $this->_config['logo_filename'] : 'skin/default/images/logo.gif';
    }
    
    public function getHtml($class='')
    {
        return '<li class="level0 nav-1 first level-top parent"><a class="level-top" href="http://demo.magentocommerce.com/catalog/category/view/s/bed-and-bath/id/10/"><span>Furniture</span></a><ul class="level0"><li class="level1 nav-1-1 first"><a href="http://demo.magentocommerce.com/catalog/category/view/s/living-room/id/22/" class=""><span>Living Room</span></a></li><li class="level1 nav-1-2 last"><a href="http://demo.magentocommerce.com/catalog/category/view/s/bedroom/id/23/" class=""><span>Bedroom</span></a></li></ul></li><li class="level0 nav-2 level-top parent"><a class="level-top" href="http://demo.magentocommerce.com/catalog/category/view/s/electronics/id/13/"><span>Electronics</span></a><ul class="level0"><li class="level1 nav-2-1 first"><a href="http://demo.magentocommerce.com/catalog/category/view/s/cellphones/id/8/"><span>Cell Phones</span></a></li><li class="level1 nav-2-2 parent"><a href="http://demo.magentocommerce.com/catalog/category/view/s/digital-cameras/id/12/"><span>Cameras</span></a><ul class="level1"><li class="level2 nav-2-2-1 first"><a href="http://demo.magentocommerce.com/catalog/category/view/s/accessories/id/25/"><span>Accessories</span></a></li><li class="level2 nav-2-2-2 last"><a href="http://demo.magentocommerce.com/catalog/category/view/s/digital-cameras/id/26/"><span>Digital Cameras</span></a></li></ul></li><li class="level1 nav-2-3 last parent"><a href="http://demo.magentocommerce.com/catalog/category/view/s/laptops/id/15/"><span>Computers</span></a><ul class="level1"><li class="level2 nav-2-3-1 first"><a href="http://demo.magentocommerce.com/catalog/category/view/s/build-your-own/id/27/"><span>Build Your Own</span></a></li><li class="level2 nav-2-3-2"><a href="http://demo.magentocommerce.com/catalog/category/view/s/laptops/id/28/"><span>Laptops</span></a></li><li class="level2 nav-2-3-3"><a href="http://demo.magentocommerce.com/catalog/category/view/s/hard-drives/id/29/"><span>Hard Drives</span></a></li><li class="level2 nav-2-3-4"><a href="http://demo.magentocommerce.com/catalog/category/view/s/monitors/id/30/"><span>Monitors</span></a></li><li class="level2 nav-2-3-5"><a href="http://demo.magentocommerce.com/catalog/category/view/s/ram-memory/id/31/"><span>RAM / Memory</span></a></li><li class="level2 nav-2-3-6"><a href="http://demo.magentocommerce.com/catalog/category/view/s/cases/id/32/"><span>Cases</span></a></li><li class="level2 nav-2-3-7"><a href="http://demo.magentocommerce.com/catalog/category/view/s/processors/id/33/"><span>Processors</span></a></li><li class="level2 nav-2-3-8 last"><a href="http://demo.magentocommerce.com/catalog/category/view/s/peripherals/id/34/"><span>Peripherals</span></a></li></ul></li></ul></li><li class="level0 nav-3 level-top parent"><a class="level-top" href="http://demo.magentocommerce.com/catalog/category/view/s/apparel/id/18/"><span>Apparel</span></a><ul class="level0"><li class="level1 nav-3-1 first"><a href="http://demo.magentocommerce.com/catalog/category/view/s/shirts/id/4/"><span>Shirts</span></a></li><li class="level1 nav-3-2 parent"><a href="http://demo.magentocommerce.com/catalog/category/view/s/shoes/id/5/"><span>Shoes</span></a><ul class="level1"><li class="level2 nav-3-2-1 first"><a href="http://demo.magentocommerce.com/catalog/category/view/s/mens-s-shoes/id/16/"><span>Mens</span></a></li><li class="level2 nav-3-2-2 last"><a href="http://demo.magentocommerce.com/catalog/category/view/s/women-s-shoes/id/17/"><span>Womens</span></a></li></ul></li><li class="level1 nav-3-3 last"><a href="http://demo.magentocommerce.com/catalog/category/view/s/college-hoodies/id/19/"><span>Hoodies</span></a></li></ul></li><li class="level0 nav-4 level-top"><a class="level-top" href="http://demo.magentocommerce.com/catalog/category/view/s/music/id/35/"><span>Music</span></a></li><li class="level0 nav-5 last level-top"><a class="level-top" href="http://demo.magentocommerce.com/catalog/category/view/s/ebooks/id/37/"><span>Ebooks</span></a></li>';
    }
}
