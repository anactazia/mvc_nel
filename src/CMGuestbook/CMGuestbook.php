<?php
/**
* A model for a guestbok, to show off some basic controller & model-stuff.
*
* @package NelCore
*/
class CMGuestbook extends CObject implements IHasSQL, IModule {


  /**
* Constructor
*/
  public function __construct() {
    parent::__construct();
  }


  /**
* Implementing interface IHasSQL. Encapsulate all SQL used by this class.
*
* @param string $key the string that is the key of the wanted SQL-entry in the array.
*/
  public static function SQL($key=null) {
    $queries = array(
      'create table nel_guestbook' => "CREATE TABLE IF NOT EXISTS nel_guestbook (id INTEGER PRIMARY KEY, entry TEXT, created DATETIME default (datetime('now')));",
      'insert into nel_guestbook' => 'INSERT INTO nel_guestbook (entry) VALUES (?);',
      'select * from nel_guestbook' => 'SELECT * FROM nel_guestbook ORDER BY id DESC;',
      'delete from nel_guestbook' => 'DELETE FROM nel_guestbook;',
     );
    if(!isset($queries[$key])) {
      throw new Exception("No such SQL query, key '$key' was not found.");
    }
    return $queries[$key];
  }


  /**
* Implementing interface IModule. Manage install/update/deinstall and equal actions.
*/
  public function Manage($action=null) {
    switch($action) {
      case 'install':
        try {
          $this->db->ExecuteQuery(self::SQL('create table nel_guestbook'));
          return array('success', 'Successfully created the database tables (or left them untouched if they already existed).');
        } catch(Exception$e) {
          die("$e<br/>Failed to open database: " . $this->config['database'][0]['dsn']);
        }
      break;
      
      default:
        throw new Exception('Unsupported action for this module.');
      break;
    }
  }
  

  /**
* Add a new entry to the guestbook and save to database.
*/
  public function Add($entry) {
    $this->db->ExecuteQuery(self::SQL('insert into nel_guestbook'), array($entry));
    $this->session->AddMessage('success', 'Successfully inserted new message.');
    if($this->db->rowCount() != 1) {
      die('Failed to insert new guestbook item into database.');
    }
  }
  

  /**
* Delete all entries from the guestbook and database.
*/
  public function DeleteAll() {
    $this->db->ExecuteQuery(self::SQL('delete from nel_guestbook'));
    $this->session->AddMessage('info', 'Removed all messages from the database table.');
  }
  
  
  /**
* Read all entries from the guestbook & database.
*/
  public function ReadAll() {
    try {
      return $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('select * from nel_guestbook'));
    } catch(Exception $e) {
      return array();
    }
  }

  
}
