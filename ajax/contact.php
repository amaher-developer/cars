<?php

include '../prepare.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if($name && $email && $subject && $message){
    $successMessage = '<div class="alert alert-success display">
						<button class="close" data-close="alert"></button>
						تم إضافة المركز بنجاح.
					</div>';
    $form = new ContactAdd();
    $form->addPredefined('userid', $_SESSION['user']['userid']);
    $form->addPredefined('date', time());
    $form->addPredefined('name', $name);
    $form->addPredefined('email', $email);
    $form->addPredefined('subject', $subject);
    $form->addPredefined('message', $message);
    $form->process($successMessage);
    
    $form = new SendMail();
    $form->addPredefined('email', 'callmenow@gmail.com');
    $form->addPredefined('subject', $subject);
    $form->addPredefined('message', $message);
    $form->process($successMessage);
    
    echo 'success';
}



?>