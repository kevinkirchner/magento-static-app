<?php
    global $app;
    global $handle;
        
    // TODO: Check if files exists, otherwise, stop and display svn script to run
/*  
    $ cd static/;
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/js/ js
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/app/design/frontend/base/default/template/ app/default/template
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/skin/frontend/base/default/ skin/default
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/app/design/frontend/default/modern/template app/modern/template
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/skin/frontend/default/modern/ skin/modern
    $ find . -type d -name .svn -print0 | xargs -0 rm -rf
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/skin/frontend/default/default/css skin/default/css
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/skin/frontend/default/default/images skin/default/images --force
    $ find . -type d -name .svn -print0 | xargs -0 rm -rf
*/
    
    
    // Set global fallback template
    $app->setTemplate('page/1column.phtml', $app->getTheme(true));

    // Add Default Blocks/*
    $app->addBlock( 'page/html/head.phtml', 'head', '', 'page/html_head', $app->getTheme(true) )
        ->addBlock( 'page/html/header.phtml', 'header', '', 'page/html', $app->getTheme(true) )
            ->addBlock( 'catalogsearch/form.mini.phtml', 'top.search', 'topSearch', 'core/template', $app->getTheme(true) )
            ->addContentBlock( 'topMenu', 'page/html/topmenu.phtml', 'catalog.topnav', '', 'page/html_topmenu', $app->getTheme(true) )
        ->addBlock( 'page/html/footer.phtml', 'footer', '', 'page/html', $app->getTheme(true) );

    
    if (isset($_GET['msg'])) {
        $msgType = $_GET['msg'];
        // TODO: add global messages when url has params
    }

    // Add Custom JS
    $app->addCss('styles.css', $app->getTheme(true));
    $app->addCss('widgets.css', $app->getTheme(true));
        
    // Add Custom CSS 
    $app->addExternalJs('http://www.google-analytics.com/ga.js', $app->getTheme(true), 'async=""');
    $app->addJs('lib/ccard.js', $app->getTheme(true));
    $app->addJs('prototype/prototype.js', $app->getTheme(true));
    $app->addJs('prototype/validation.js', $app->getTheme(true));
    $app->addJs('scriptaculous/builder.js', $app->getTheme(true));
    $app->addJs('scriptaculous/effects.js', $app->getTheme(true));
    $app->addJs('scriptaculous/dragdrop.js', $app->getTheme(true));
    $app->addJs('scriptaculous/controls.js', $app->getTheme(true));
    $app->addJs('scriptaculous/slider.js', $app->getTheme(true));
    $app->addJs('varien/js.js', $app->getTheme(true));
    $app->addJs('varien/form.js', $app->getTheme(true));
    $app->addJs('varien/google.js', $app->getTheme(true));
    $app->addJs('varien/menu.js', $app->getTheme(true));
    $app->addJs('mage/translate.js', $app->getTheme(true));
    $app->addJs('mage/cookies.js', $app->getTheme(true));

    // Home Page
    if ($handle == 'cms_index_index') {
        
    }


    