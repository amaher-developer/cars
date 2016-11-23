<?php

$this->title = 'أضافة شهادة';

if($formSubmitted){
    
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم إضافة الشهادة بنجاح.
						</div>';
    $form = new TestimonialAdd();
    $form->addText('username', 'أدخل الاسم بشكل صحيح');
    $form->addText('content', 'أدخل المحتوي بشكل صحيح');
    $form->addPredefined('date', time());
    $form->addPredefined('testimonialActivate', 1);
    $form->process($successMessage);   
}


?>