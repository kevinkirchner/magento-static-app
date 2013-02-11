<?php 

// Show Errors
ini_set('display_errors', true);
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

// Configure Static App
$config = array(
    'mage_version' => '1.7',
    'store_name' => 'Static App',
    'custom_theme' => 'custom', // directory in /app/ and /skin for custom templates and stylesheets
    'default_theme' => 'default'
);


