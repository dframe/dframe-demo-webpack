<?php 
$debugAllowed = array(
    '127.0.0.1',
    '::1',
);

# DEBUG configuration
if(isset($_SERVER['REMOTE_ADDR']) AND in_array($_SERVER['REMOTE_ADDR'], $debugAllowed)) {
    ini_set("display_errors", "on");  # Debug setings
    error_reporting(E_ALL);           # Debug setings
    define('MOD_REWRITE', false);     # Mod rewrite (ex. task=page&action=login -> page/login )
    define('setErrorLog', true);      # DB show error

} else {
    ini_set("display_errors", "off"); # Debug setings
    error_reporting(E_ALL);           # Debug setings
    define('MOD_REWRITE', false);     # Mod rewrite (ex. task=page&action=login -> page/login )
    define('setErrorLog', false);     # DB show error

}

# Application configuration
define('appDir', dirname(__FILE__).'/');

# Website configuration
define('VERSION', "Dframe"); # Version aplication
define('SALT', "YOURSALT123"); # SALT

if(isset($_SERVER['REMOTE_ADDR']) AND ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' OR $_SERVER['REMOTE_ADDR'] == '::1')){
	define('HTTP_HOST', $_SERVER['HTTP_HOST'].'/Dframe-demo');
    define('site_url', 'http://'.$_SERVER['HTTP_HOST'].'/Dframe-demo'); # Url address

}else{
	define('HTTP_HOST', 'website.url');
    define('site_url', 'http://website.url'); # Url address
}


# Database configuration
define('DB_HOST', ""); # Database Host (localhost)
define('DB_USER', ""); # Database Username
define('DB_PASS', ""); # Database Password
define('DB_DATABASE', ""); # Databese Name