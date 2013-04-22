<?php
// 
// Holding a instance of CNel to enable use of $this in subclasses and provide some helpers.
// 
// @package NelCore
// 
class CObject {

// 
// Members
// 
public $config;
public $request;
public $data;
public $db;
public $views;
public $session;


// 
// Constructor
// 
protected function __construct() {
    $nel = CNel::Instance();
    $this->config = &$nel->config;
    $this->request = &$nel->request;
    $this->data = &$nel->data;
    $this->db = &$nel->db;
    $this->views = &$nel->views;
    $this->session = &$nel->session;
  }


// 
// Redirect to another url and store the session
// 
protected function RedirectTo($url) {
    $nel = CNel::Instance();
    if(isset($nel->config['debug']['db-num-queries']) && $nel->config['debug']['db-num-queries'] && isset($nel->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }
    if(isset($nel->config['debug']['db-queries']) && $nel->config['debug']['db-queries'] && isset($nel->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }
    if(isset($nel->config['debug']['timer']) && $nel->config['debug']['timer']) {
$this->session->SetFlash('timer', $nel->timer);
    }
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($url));
  }


}
