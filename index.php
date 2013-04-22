<?php
//
// All requests routed through here. This is an overview of what actaully happens during
// a request.
// 
// @package NelCore
// 

// ---------------------------------------------------------------------------------------
//
// PHASE: BOOTSTRAP
//
define('NEL_INSTALL_PATH', dirname(__FILE__));
define('NEL_SITE_PATH', NEL_INSTALL_PATH . '/site');

require(NEL_INSTALL_PATH.'/src/bootstrap.php');

$nel = CNel::Instance();


// ---------------------------------------------------------------------------------------
//
// PHASE: FRONTCONTROLLER ROUTE
//
$nel->FrontControllerRoute();


// ---------------------------------------------------------------------------------------
//
// PHASE: THEME ENGINE RENDER
//
$nel->ThemeEngineRender();
