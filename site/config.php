<?php
/**
* Site configuration, this file is changed by user per site.
*
*/

/**
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);


define('KMOM', 'kmom06');

/**
* Set what to show as debug or developer information in the get_debug() theme helper.
*/
$nel->config['debug']['nel'] = false;
$nel->config['debug']['session'] = false;
$nel->config['debug']['timer'] = true;
$nel->config['debug']['db-num-queries'] = true;
$nel->config['debug']['db-queries'] = true;


/**
* Set database(s).
*/
$nel->config['database'][0]['dsn'] = 'sqlite:' . NEL_SITE_PATH . '/data/.ht.sqlite';


/**
* What type of urls should be used?
*
* default = 0 => index.php/controller/method/arg1/arg2/arg3
* clean = 1 => controller/method/arg1/arg2/arg3
* querystring = 2 => index.php?q=controller/method/arg1/arg2/arg3
*/
$nel->config['url_type'] = 1;


/**
* Set a base_url to use another than the default calculated
*/
$nel->config['base_url'] = null;


/**
* How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
*/
$nel->config['hashing_algorithm'] = 'sha1salt';


/**
* Allow or disallow creation of new user accounts.
*/
$nel->config['create_new_users'] = true;


/**
* Define session name
*/
$nel->config['session_name'] = preg_replace('/[:\.\/-_]/', '', __DIR__);
$nel->config['session_key'] = 'nel';


/**
* Define default server timezone when displaying date and times to the user. All internals are still UTC.
*/
$nel->config['timezone'] = 'Europe/Stockholm';


/**
* Define internal character encoding
*/
$nel->config['character_encoding'] = 'UTF-8';


/**
* Define language
*/
$nel->config['language'] = 'en';


/**
* Define the controllers, their classname and enable/disable them.
*
* The array-key is matched against the url, for example:
* the url 'developer/dump' would instantiate the controller with the key "developer", that is
* CCDeveloper and call the method "dump" in that class. This process is managed in:
* $nel->FrontControllerRoute();
* which is called in the frontcontroller phase from index.php.
*/
$nel->config['controllers'] = array(
  'index' => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'theme'     => array('enabled' => true,'class' => 'CCTheme'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
  'content' => array('enabled' => true,'class' => 'CCContent'),
  'blog' => array('enabled' => true,'class' => 'CCBlog'),
  'page' => array('enabled' => true,'class' => 'CCPage'),
  'user' => array('enabled' => true,'class' => 'CCUser'),
  'acp' => array('enabled' => true,'class' => 'CCAdminControlPanel'),
);

/**
* Settings for the theme.
*/
$nel->config['theme'] = array(
  'name'            => 'grid',            // The name of the theme in the theme directory
  'stylesheet'      => 'style.php',       // Main stylesheet to include in template files
  'template_file'   => 'index.tpl.php',   // Default template file, else use default.tpl.php
  // A list of valid theme regions
  'regions' => array('flash','featured-first','featured-middle','featured-last',
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
  // Add static entries for use in the template file.
  'data' => array(
    'header' => 'Nel',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'penguin.png',
    'logo' => 'penguin.png',
    'logo_width'  => 80,
    'logo_height' => 80,
    'footer' => '<p>Nel by Anactazia based on Lydia &copy; by Mikael Roos (mos@dbwebb.se)</p>',
  ),
);
