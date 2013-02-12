<?php 

// Show Errors
ini_set('display_errors', true);
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

// Allow file_exists
ini_set('allow_url_fopen', true);

// Configure Static App
$config = array(
    'mage_version' => '1.7',
    'store_name' => 'Static App',
    'custom_theme' => 'custom', // directory in /app/ and /skin for custom templates and stylesheets
    // 'logo_filename' => 'skin/images/logo.png',
    'default_theme' => 'modern'
);


