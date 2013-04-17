##Requires WordPress installed

Add this to top of /index.php

    define("WP_USE_THEMES", false);
    if(!strpos($_SERVER['REQUEST_URI'], 'admin') && !strpos($_SERVER['REQUEST_URI'], 'downloader')) {
        require_once('wordpress/wp-load.php'); 
    }


##Prevent Autoloading WordPress files

Add to /lib/Varien/Autoload.php line 93:

    if(!file_exists(stream_resolve_include_path($classFile))){
        return null;
    }

##Duplicate "__()" function 

Remove depreciated function from /app/code/core/Mage/Core/functions.php on line 96

    // function __()
    // {
    //    return Mage::app()->getTranslator()->translate(func_get_args());
    // }
