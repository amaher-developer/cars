<?php

include '../cash/makes.php';
include '../cash/models.php';
include '../cash/motors.php';
include '../cash/shaps.php';


$fetch = new Query('select * from cities');
$fetch->addOrderBy('id asc');
$fetch->prepare();
$cities = $fetch->getRecordSet();



$this->title = 'أضافة أعلان';


if($formSubmitted){

    if($_POST['cityId']){
        $fetch = new Query('select * from districts');
        $fetch->addOrderBy('id asc');
        $fetch->prepare();
        $districts = $fetch->getRecordSet();
    }


    $default = array('type' => '', 'cityId' => '','districtId' => '','year' => '','make' => '','shap' => '','model' => '','motor' => '','kilometer' => '','door' => ''
    ,'gearbox' => '','tradable' => '','aircondition' => '','electricwindows' => '','sunroof' => '','ABS' => '','centerlock' => '','alarm' => '','cruisecontrol' => ''
    ,'EBD' => '','powerstearing' => '','airbags' => '','radiocassette' => '','title' => ''
    ,'content' => '','image' => '','price' => '','telephone' => '','mobile' => '','address' => '','email' => ''
    );
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم اضافة الاعلان بنجاح
						</div>';
    
    $form = new AdvAdd();
    $form->addNumber('type', 'أختر النوع بشكل صحيح');
    $form->addNumber('cityId', 'أختر المدينة بشكل صحيح');
    $form->addNumber('districtId', 'أختر الحي بشكل صحيح');
    $form->addNumber('city', 'أختر المدينة بشكل صحيح');
    $form->addNumber('disctirct', 'أختر الحي بشكل صحيح');
    $form->addNumber('year', 'أختر السنه بشكل صحيح');

    $form->addNumber('make', 'أختر الفئة بشكل صحيح');
    $form->addNumber('shap', 'أختر النمط بشكل صحيح');
    $form->addNumber('model', 'أختر الموديل بشكل صحيح');
    $form->addNumber('motor', 'أختر نوع الموتور بشكل صحيح');
    $form->addNumber('kilometer', 'أدخل الكيلومترات بشكل صحيح');
    $form->addNumber('door', 'أدخل عدد الابواب بشكل صحيح');
    $form->addNumber('gearbox', 'أختر ناقل الحركة بشكل صحيح');

    $form->addNumber('tradable');

    $form->addText('aircondition');
    $form->addText('electricwindows');
    $form->addText('sunroof');
    $form->addText('ABS');
    $form->addText('centerlock');
    $form->addText('alarm');
    $form->addText('cruisecontrol');
    $form->addText('EBD');
    $form->addText('powerstearing');
    $form->addText('airbags');
    $form->addText('radiocassette');


    $form->addText('title', 'أدخل العنوان بشكل صحيح');
    $form->addText('content', 'أدخل المحتوي بشكل صحيح');
    $form->addPredefined('date', time());
    $form->addPredefined('udate', time());
    $form->addImage('image', '../dynamic/ads/', 'أدخل صوره الأعلان بشكل صحيح');



    $form->addText('price', 'أدخل السعر بشكل صحيح');
    $form->addText('telephone');
    $form->addText('mobile', 'أدخل الموبيل بشكل صحيح');
    $form->addText('address', 'أدخل العنوان بشكل صحيح');
    $form->addEmail('email', 'أدخل البريد الاليكتروني بشكل صحيح');
    $form->addPredefined('activate', '1');


    $form->process($successMessage); 
      
}


?>