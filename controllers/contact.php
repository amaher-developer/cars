<?php

$this->title = 'اتصل بنا';

if($formSubmitted){
    $default = array('name' => '', 'email' => '', 'content' => '');
    
    $successMessage = '';
    $form = new ContactAdd($successMessage);
    $form->addText('name', 'Enter name correctly');
    $form->addEmail('email', 'Enter email correctly');
    $form->addText('content', 'Enter message correctly');
    $form->process($successMessage);   
}


?>