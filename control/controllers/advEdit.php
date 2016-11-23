<?php

include '../cash/advTypes.php';
include '../cash/areas.php';
//include '../cash/categories.php';

$id = (int)$_GET['id'];

$fetch = new Category();
$fetch->prepare();
$categories = $fetch->getRecordSet();

$fetch = new Adv();
$fetch->addCondition(' id = "'.$id.'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$this->title = 'تعديل إعلان';

if($formSubmitted){
    
    
    $dateFrom = Date::DayMonthYearToTimestamp($_POST['dateFrom']);
    $dateTo = Date::DayMonthYearToTimestamp($_POST['dateTo']);
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    $form = new AdvEdit($id, $default);
    $form->addNumber('typeId', 'أختر النوع بشكل صحيح');
    $form->addNumber('catId', 'أختر القسم بشكل صحيح');
    $form->addText('title', 'أدخل الاسم بشكل صحيح');
    $form->addPredefined('dateFrom', $dateFrom);
    $form->addPredefined('dateTo', $dateTo);
    if($_POST['url'])
        $form->addURL('url', 'أدخل الرابط بشكل صحيح');
    $form->addPredefined('date', time());
    $form->addImage('image', '../dynamic/ads/');
    $form->process($successMessage);
    
    
    
}

?>