<?php

/**
 * @author maher
 * @copyright 2012
 */
 
include '../config.php';

$this->title = "أضافه ايميلات شركات";

$fetch = new Agent('select * from companies');
$fetch->addOrderBy('id asc');
$fetch->addLimit('450');
$fetch->prepare();
$records = $fetch->getRecordSet();
/*
foreach($records as $record){
    //echo $record['email'].'<Br/>';
    //Database::query('update companies set email = "'.trim($record['email']).'" where id = "'.$record['id'].'"');  
}
*/
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
                $email = trim($email, '.');
                $form = Database::query('insert into companies (email) value ("'.$email.'")');
                $successMessage = '<div class="success">تم الأرسال بنجاح</div>';
            }   
        }
    }
}

?>