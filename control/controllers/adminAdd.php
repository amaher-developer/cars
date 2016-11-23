<?php

$this->title = 'أضافة عضو';

$fetch = new AdminGroup();
$fetch->addCondition('id != "1"');
$fetch->addOrderBy('id asc');
$fetch->prepare();
$groups = $fetch->getRecordSet();

if($formSubmitted){
    
    $default = array('name' => '', 'email' => '', 'mobile' => '', 'groupId' => '');
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    $form = new AdminAdd();

    $form->addPredefined('visible', 1);
    $form->addText('name', 'أدخل اسم المستخدم بشكل صحيح');
    $form->addEmail('email', 'أدخل البريد الاليكتروني بشكل صحيح');
    $form->addText('mobile', 'أدخل رقم الموبيل بشكل صحيح');
    $form->addText('password', 'أدخل الرقم السري بشكل صحيح');
    $form->addNumber('groupId', 'اختر نوع العضويه بشكل صحيح');
    $form->process($successMessage);   
}


?>