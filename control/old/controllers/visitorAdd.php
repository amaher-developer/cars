<?php

/**
 * @author maher
 * @copyright 2012
 */

include '../config.php';

$this->title = "أضافه ايميلات زائرين";

$records = mysql_fetch_assoc(Database::query('select * from visitors'));

$default = array(
    'email' => ''
);
if($formSubmitted){

    //$emails = explode(',', trim($_POST['email']));
    $to = str_replace("\n\r", "\n", trim($_POST['email']));
    $emails = explode("\n", $to);
    if(count($emails) >= 1){
        foreach($emails as $email){
            if($email && !in_array($email, $records)){
                $form = Database::query('insert into visitors (email) value ("'.$email.'")');
                $successMessage = '<div class="success">تم الأرسال بنجاح</div>';
            }   
        }
    }
}

?>