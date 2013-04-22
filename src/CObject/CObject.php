<?php
/**
* Holding a instance of CNel to enable use of $this in subclasses and provide some helpers.
*
* @package NelCore
*/
class CObject {

/**
* Members
*/
protected $nel;
protected $config;
protected $request;
protected $data;
protected $db;
protected $views;
protected $session;
protected $user;


/**
* Constructor, can be instantiated by sending in the $nel reference.
*/
protected function __construct($nel=null) {
if(!$nel) {
$nel = CNel::Instance();
}
$this->nel = &$nel;
    $this->config = &$nel->config;
    $this->request = &$nel->request;
    $this->data = &$nel->data;
    $this->db = &$nel->db;
    $this->views = &$nel->views;
    $this->session = &$nel->session;
    $this->user = &$nel->user;
}


/**
* Wrapper for same method in CNel. See there for documentation.
*/
protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->nel->RedirectTo($urlOrController, $method, $arguments);
  }


/**
* Wrapper for same method in CNel. See there for documentation.
*/
protected function RedirectToController($method=null, $arguments=null) {
    $this->nel->RedirectToController($method, $arguments);
  }


/**
* Wrapper for same method in CNel. See there for documentation.
*/
protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->nel->RedirectToControllerMethod($controller, $method, $arguments);
  }


/**
* Wrapper for same method in CNel. See there for documentation.
*/
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->nel->AddMessage($type, $message, $alternative);
  }


/**
* Wrapper for same method in CNel. See there for documentation.
*/
protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->nel->CreateUrl($urlOrController, $method, $arguments);
  }


}
