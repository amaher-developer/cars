<?php

/**
 * @author maher
 * @copyright 2012
 */

include '../config.php';



$this->title = " مراسلة الأعضاء ";

$fetch = new Admin('select * from admins_groups');
$fetch->addOrderBy('id desc');
$fetch->prepare();
$types = $fetch->getRecordSet();



$fetch = new Admin();
if($_GET['userId'])
    $fetch->addCondition('id = "'.$_GET['userId'].'"');
else if($_GET['type'])
    $fetch->addCondition('groupId = "'.$_GET['type'].'"');
$fetch->addOrderBy('id desc');
$fetch->prepare();
$records = $fetch->getRecordSet();

if($records){
    foreach($records as $record){
        $emailsArray[] = trim($record['email']);
    }
}

if($emailsArray){
    $emailsInString = implode(', ', $emailsArray);
}
$default = array(
    'to' => '',
    'subject' => '', 
    'message' => ''
);
if($formSubmitted){
    $successMessage = '<div class="success">Sent successfully</div>';
    $to = trim($_POST['to']);
    $message = stripslashes($_POST['message']);
    if($_POST['comma'] == '1'){
        $to = str_replace("\n\r", "\n", $to);
        $emails = explode("\n", $to);
    }else
        $emails = explode(',', $to);
    //print_r($emails);
    //echo count($emails);
    if(count($emails) >= 1){
        foreach($emails as $email){
            if($email){
                $form = new SendMail();
                $form->addPredefined('email', $email);
                $form->addText('subject', 'Enter subject correctly');
                $form->addPredefined('message', $message,'Enter message correctly');
                $form->process($successMessage);
            }   
        }
    }
}

?>