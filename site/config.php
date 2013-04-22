<?php
//
// Site configuration, this file is changed by user per site.
// 
//

//
// Set level of error reporting
//
error_reporting(-1);
ini_set('display_errors', 1);

// 
// Set what to show as debug or developer information in the get_debug() theme helper.
// 
$nel->config['debug']['nel'] = false;
$nel->config['debug']['session'] = false;
$nel->config['debug']['timer'] = true;
$nel->config['debug']['db-num-queries'] = true;
$nel->config['debug']['db-queries'] = true;

// 
// Set database(s).
// 
$nel->config['database'][0]['dsn'] = 'sqlite:' . NEL_SITE_PATH . '/data/.ht.sqlite';

// 
// What type of urls should be used?
// 
// default      = 0      => index.php/controller/method/arg1/arg2/arg3
// clean        = 1      => controller/method/arg1/arg2/arg3
// querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
// 
$nel->config['url_type'] = 1;

// 
// Set a base_url to use another than the default calculated
// 
    $nel->config['base_url'] = null;

//
// Define session name
//
$nel->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
$nel->config['session_key'] = 'nel';

//
// Define server timezone
//
$nel->config['timezone'] = 'Europe/Stockholm';

//
// Define internal character encoding
//
$nel->config['character_encoding'] = 'UTF-8';

// 
// Define language
// 
$nel->config['language'] = 'en';

//
// Define the controllers, their classname and enable/disable them.
// 
// The array-key is matched against the url, for example:
// the url 'developer/dump' would instantiate the controller with the key "developer", that is
// CCDeveloper and call the method "dump" in that class. This process is managed in:
// $nel->FrontControllerRoute();
// which is called in the frontcontroller phase from index.php.
//
$nel->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
);
    
// 
// Settings for the theme.
// 
$nel->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core',
);
