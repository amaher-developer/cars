<?php


$this->title = 'أضافة خبر';


if($formSubmitted){
    $default = array('title' => '', 'date' => '', 'content' => '', 'url' => '', 'image' => '');
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    
    $date = Date::DayMonthYearToTimestamp($_POST['date']);
    
    $form = new NewsAdd();
    $form->addText('title', 'أدخل الاسم بشكل صحيح');
    $form->addPredefined('date', $date);
    $form->addHTML('content', 'أدخل المحتوي بشكل صحيح');
    if($_POST['url'])
        $form->addURL('url', 'أدخل الرابط بشكل صحيح');
    $form->addImage('image', '../dynamic/news/');
    $form->process($successMessage); 
      
}


?>