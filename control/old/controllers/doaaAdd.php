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
    $form = new DoaaAdd();
    $form->addText('title', 'أدخل العنوان بشكل صحيح');
    $form->addPredefined('length', mb_strlen($_POST['title'],'UTF-8'));
    $form->process($successMessage);   
}


?>