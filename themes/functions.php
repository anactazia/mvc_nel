<?php
//
// Helpers for theming, available for all themes in their template files and functions.php.
// This file is included right before the themes own functions.php
// 
 
// 
// Print debuginformation from the framework.
// 
function get_debug() {
  // Only if debug is wanted.
  $nel = CNel::Instance();
  if(empty($nel->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($nel->config['debug']['db-num-queries']) && $nel->config['debug']['db-num-queries'] && isset($nel->db)) {
    $flash = $nel->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $nel->db->GetNumQueries() . " queries.</p>";
  }
  if(isset($nel->config['debug']['db-queries']) && $nel->config['debug']['db-queries'] && isset($nel->db)) {
    $flash = $nel->session->GetFlash('database_queries');
    $queries = $nel->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }
  if(isset($nel->config['debug']['timer']) && $nel->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $nel->timer['first'], 5)*1000 . " msecs.</p>";
  }
  if(isset($nel->config['debug']['nel']) && $nel->config['debug']['nel']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CNel:</p><pre>" . htmlent(print_r($nel, true)) . "</pre>";
  }
  if(isset($nel->config['debug']['session']) && $nel->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CNel->session:</p><pre>" . htmlent(print_r($nel->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }
  return $html;
}


// 
// Get messages stored in flash-session.
// 
function get_messages_from_session() {
  $messages = CNel::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}


// 
// Prepend the base_url.
// 
function base_url($url=null) {
  return CNel::Instance()->request->base_url . trim($url, '/');
}


// 
// Create a url to an internal resource.
// 
function create_url($url=null) {
  return CNel::Instance()->request->CreateUrl($url);
}


// 
// Prepend the theme_url, which is the url to the current theme directory.
// 
function theme_url($url) {
  $nel = CNel::Instance();
  return "{$nel->request->base_url}themes/{$nel->config['theme']['name']}/{$url}";
}


// 
// Return the current url.
// 
function current_url() {
  return CNel::Instance()->request->current_url;
}


// 
// Render all views.
// 
function render_views() {
  return CNel::Instance()->views->Render();
}
