<?php
    $handle = 'cms_index_index';
    include_once('includes/bootstrap.php'); 
    global $app;
    
    // 1. Set Template: (default: 'page/1column.phtml')
    // $app->setTemplate('page/1column.phtml');

    // 2. Add Custom JS
    
    // 3. Add Custom CSS 

    // 4. Add Blocks
    $app->addCmsBlock('content', 'cms/pages/home.phtml', 'home', '', $app->getTheme() );
    
    // 5. Run Page
	$app->run('Home');
