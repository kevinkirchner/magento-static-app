<?php
    global $app;
    global $handle;
    
    // TODO: Check if files exists, otherwise, stop and display svn script to run
/*  
    $ cd static/;
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/js/ js
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/app/design/frontend/base/default/template/ app/default/template
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/skin/frontend/base/default/ skin/default
    $ find . -type d -name .svn -print0 | xargs -0 rm -rf
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/skin/frontend/default/default/css skin/default/css
    $ svn checkout http://svn.magentocommerce.com/source/branches/1.7/skin/frontend/default/default/images skin/default/images --force
    $ find . -type d -name .svn -print0 | xargs -0 rm -rf
*/
    
    
    // Set global fallback template

    // Add Default Blocks
    // TODO: add global messages when url has params
    if (isset($_GET['msg'])) {
        $msgType = $_GET['msg'];
    }

    // Add Custom JS
    // Add Custom CSS 
    

    // Home Page
    if ($handle == 'cms_index_index') {
        // TODO: add a "addCmsBlock" method and use it here
        // $app->addChildBlock('content', '', 'cms/pages/home.phtml', 'home', '', true);
    }


    