<?php

$id = (int)$_GET['id'];


$fetch = new News();
$fetch->addCondition(' id = "'.$id.'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$this->title = 'تعديل خبر';

if($formSubmitted){
    
    
    $date = Date::DayMonthYearToTimestamp($_POST['date']);
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    $form = new NewsEdit($id, $default);
    $form->addText('title', 'أدخل الاسم بشكل صحيح');
    $form->addPredefined('date', $date);
    $form->addHTML('content', 'أدخل المحتوي بشكل صحيح');
    if($_POST['url'])
        $form->addURL('url', 'أدخل الرابط بشكل صحيح');
    $form->addImage('image', '../dynamic/news/');
    $form->process($successMessage);
    
    
    
}

?>