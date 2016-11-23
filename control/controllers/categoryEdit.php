<?php

$id = (int)$_GET['id'];

$fetch = new Category();
$fetch->addCondition(' id = "'.$id.'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$this->title = 'تعديل مكان';

if($formSubmitted){
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    $form = new CategoryEdit($id, $default);
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