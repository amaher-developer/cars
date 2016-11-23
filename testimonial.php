<?php

include 'prepare.php';

$username = $_POST['username'];
$content = $_POST['content'];

if($username && $content){
    $successMessage = '<div class="alert alert-success display">
						<button class="close" data-close="alert"></button>
						تم إضافة المركز بنجاح.
					</div>';
    $form = new TestimonialAdd();
    $form->addPredefined('date', time());
    $form->addPredefined('username', $username);
    $form->addPredefined('userid', $_SESSION['user']['userid']);
    $form->addPredefined('userphoto', $_SESSION['user']['userphoto']);
    $form->addPredefined('content', $content);
    $form->process($successMessage);
    
    echo 'success';
}



?>