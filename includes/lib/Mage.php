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
    
}
