<?php

$id = (int)$_GET['id'];

if($id == 1)
    header('Location: index.php?=default');

$fetch = new AdminGroup();
$fetch->addCondition('id != "1"');
$fetch->addOrderBy('id asc');
$fetch->prepare();
$groups = $fetch->getRecordSet();

$fetch = new Admin();
$fetch->addCondition(' id = "'.$id.'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$this->title = 'تعديل عضو';

if($formSubmitted){
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    $form = new AdminEdit($id, $default);
    $form->addText('name', 'أدخل اسم المستخدم بشكل صحيح');
    $form->addEmail('email', 'أدخل البريد الاليكتروني بشكل صحيح');
    $form->addText('mobile', 'أدخل رقم الموبيل بشكل صحيح');
    //$form->addNumber('visible');
    if($_POST['password'])
        $form->addText('password', 'أدخل الرقم السري بشكل صحيح');
    $form->addNumber('groupId', 'اختر نوع العضويه بشكل صحيح');
    $form->process($successMessage);
}

?>