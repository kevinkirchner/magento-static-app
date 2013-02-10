<?php 

// Show Errors
ini_set('display_errors', true);
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

// Configure Static App
$config = array(
    'mage_version' => '1.7',
    'store_name' => 'Static App',
    'theme' => 'custom' // directory in /static/app/ and /static/skin for custom templates and stylesheets
    
);
