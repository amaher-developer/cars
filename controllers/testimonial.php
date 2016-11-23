<?php



$this->title = 'شهادات الاعضاء';


if($formSubmitted){
    $successMessage = 'تم ادخال شهادتك بنجاح ';
    $form = new TestimonialAdd();
    $form->addPredefined('userid', $user['userid']);
    $form->addPredefined('username', $user['username']);
    $form->addPredefined('userphoto', $user['userphoto']);
    $form->addText('content', 'أدخل شهادتك بشكل صحيح');
    $form->addPredefined('date', time());
    $form->process($successMessage);  
    
}




$fetch = new Testimonial();
$fetch->addCondition('testimonialactivate = 1');
$fetch->addOrderBy('date desc');
$fetch->addLimit('3');
$fetch->prepare();
$testimonials = $fetch->getRecordSet();



?>