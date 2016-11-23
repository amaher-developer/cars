<?php

$this->title = 'تعديل الشهادة';
$id = (int)$_GET['id'];

$fetch = new Testimonial();
$fetch->addCondition(' testimonialid = '.$id);
$fetch->prepare();
if($fetch->getTotal() > 0){
	$default = $fetch->getSingleRecord();
	
if($formSubmitted){
    
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم تعديل الشهادة بنجاح.
						</div>';
    $form = new TestimonialEdit($id, $default);
    $form->addText('username', 'أدخل الاسم بشكل صحيح');
    $form->addText('content', 'أدخل المحتوي بشكل صحيح');
    $form->addPredefined('date', time());
    $form->addPredefined('testimonialActivate', 1);
    $form->process($successMessage);   
}

}
?>