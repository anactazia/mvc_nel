<?php
// Include CForm
include('CForm.php');


/**
 * Create a class for a contact-form with name, email and phonenumber.
 */
class CFormContact extends CForm {


  /** Create all form elements and validation rules in the constructor.
   *
   */
  public function __construct() {
    parent::__construct();
    
    $this->AddElement(new CFormElementText('name'))
         ->AddElement(new CFormElementText('email'))
         ->AddElement(new CFormElementText('phone'))
         ->AddElement(new CFormElementSubmit('submit', array('callback'=>array($this, 'DoSubmit'))));
  }


  /**
   * Callback for submitted forms
   */
  protected function DoSubmit() {
    echo "<p><i>DoSubmit(): Form was submitted. Do stuff (save to database) and return true (success) or false (failed processing form)</i></p>";
    return true;
  }

}


// -----------------------------------------------------------------------
//
// Use the form and check it status.
//
session_name('cform_example');
session_start();
$form = new CFormContact();

?>


<!doctype html>
<meta charset=utf8>
<title>Example on using forms with Lydia CForm</title>
<!-- Echo out the form -->
<h1>Example on using forms with Lydia CForm</h1>
<?=$form->GetHTML()?>


<p><code>$_POST</code> <?php if(empty($_POST)) {echo '<i>is empty.</i>';} else {echo '<i>contains:</i><pre>' . print_r($_POST, 1) . '</pre>';} ?></p>

<?php include("../template/footer_mos.php") ?>
