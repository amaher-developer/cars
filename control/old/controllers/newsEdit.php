<?php

$this->title = 'تعديل الخبر';
$id = (int)$_GET['id'];

$fetch = new News();
$fetch->addCondition(' id = '.$id);
$fetch->prepare();
if($fetch->getTotal() > 0){
	$default = $fetch->getSingleRecord();
	
if($formSubmitted){
    
    if($_POST['date'])
        $date = Date::DayMonthYearTotimestamp($_POST['date']);
    else
        $date = time();
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم تعديل الخبر بنجاح.
						</div>';
    $form = new NewsEdit($id, $default);
    $form->addText('title', 'أدخل العنوان بشكل صحيح');
    $form->addText('content', 'أدخل المحتوي بشكل صحيح');
    $form->addPredefined('date', $date);
    $form->addImage('image', '../dynamic/news/');
    $form->process($successMessage);   
}

}
?>