<?php

$this->title = 'أضافة خبر';

if($formSubmitted){
    
    
    if($_POST['date'])
        $date = Date::DayMonthYearTotimestamp($_POST['date']);
    else
        $date = time();
        
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم إضافة الخبر بنجاح.
						</div>';
    $form = new NewsAdd();
    $form->addText('title', 'أدخل العنوان بشكل صحيح');
    $form->addText('content', 'أدخل المحتوي بشكل صحيح');
    $form->addPredefined('date', $date);
    $form->addImage('image', '../dynamic/news/');
    $form->process($successMessage);   
}


?>