<?php 

// Include configuration file
include_once('Configuration.php');

// Load up the app
include_once('StaticApp.php');

// Instantiate the app
$app = new StaticApp();

// Set config from Configuration.php
global $config;
$app->setConfig( $config );

// Set handle from the page
global $handle;
if ($handle) {
    $app->setHandle( $handle );
}

// Load Default Pages
include_once('default.php');