<?php 
/**
 * Abstract.php
 *
 * @copyright   Copyright (c) 2012 Classy Llama Studios LLC
 * @author      Kevin Kirchner <kevin@classyllama.com>
 */
class StaticApp_Abstract extends Mage
{
    // TODO: after added blocks to _data, loops through them and send through toHtml()
    // getChildHtml
    
    
    // toHtml
    public function toHtml($path)
    {
        ob_start();
        require( $path );
        return ob_get_clean();
    }
}
 