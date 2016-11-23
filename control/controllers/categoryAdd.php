<?php

$this->title = 'أضافة قسم';

if($formSubmitted){
    
    $default = array('name' => '', 'image' => '', 'keywords' => '', 'description' => '');
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    $form = new CategoryAdd();
    $form->addPredefined('keywords', strip_tags($_POST['keywords']));
    $form->addPredefined('description', strip_tags($_POST['description']));
    $form->addPredefined('menu', strip_tags($_POST['menu']));
    $form->addText('name', 'أدخل الاسم بشكل صحيح');
    $form->addImage('image', '../dynamic/categories/');
    $form->addImage('logo', '../dynamic/categories/');
    $form->addImage('dimage', '../dynamic/categories/');
    $form->process($successMessage); 
    
    
      
}


?>