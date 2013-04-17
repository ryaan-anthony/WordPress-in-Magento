WordPress-in-Magento
====================

Requires WordPress installed.

Add this to top of /index.php

    define("WP_USE_THEMES", false);
    if(!strpos($_SERVER['REQUEST_URI'], 'admin') && !strpos($_SERVER['REQUEST_URI'], 'downloader')) {
        require_once('wordpress/wp-load.php'); 
    }
