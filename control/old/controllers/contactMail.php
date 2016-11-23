<?php

/**
 * @author maher
 * @copyright 2012
 */

include '../config.php';



if($_GET['company']){
    $this->title = "مراسله الشركات الغير مسجله";
    $fetch = new Query('select * from companies');
    $fetch->addOrderBy('id desc');
    $fetch->prepare();
    $records = $fetch->getRecordSet();
}else{
    $this->title = "مراسلة الأعضاء";
    $fetch = new Query('select * from contacts');
    if($_GET['contactid'])
        $fetch->addCondition('contactid = "'.$_GET['contactid'].'" ');
    $fetch->addOrderBy('contactid desc');
    $fetch->prepare();
    $records = $fetch->getRecordSet();
}
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
    $successMessage = '<div class="success">تم الأرسال بنجاح</div>';
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
                //echo $email.'<br/>';
                $form = new SendMail();
                $form->addPredefined('email', $email);
                $form->addText('subject', 'أدخل عنوان الرساله بشكل صحيح');
                $form->addPredefined('message', $message,'أدخل الرساله بشكل صحيح');
                $form->process($successMessage);
            }   
        }
    }
}

?>