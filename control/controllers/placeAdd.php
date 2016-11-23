<?php

include '../cash/areas.php';
//include '../cash/categories.php';

$this->title = 'أضافة مكان';



$fetch = new Category();
$fetch->addCondition(' deleted = "0" ');
$fetch->prepare();
$categories = $fetch->getRecordSet();


if($formSubmitted){
    
    $default = array('name' => '', 'content' => '', 'address' => '', 'mobile' => '', 'phone' => '', 'url' => '', 'email' => '', 'facebook' => '', 'areaId' => '', 'keywords' => '', 'description' => '');
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم الإضافة بنجاح
						</div>';
    $form = new PlaceAdd();
    
    $form->addPredefined('activate', '1');
    $form->addPredefined('keywords', strip_tags($_POST['keywords']));
    $form->addPredefined('description', strip_tags($_POST['description']));
    $form->addPredefined('userId', $user['id']);
    $form->addNumber('areaId', 'أختر المنطقة بشكل صحيح');
    $form->addNumber('catId', 'أختر القسم بشكل صحيح');
    $form->addText('name', 'أدخل الاسم بشكل صحيح');
    $form->addHTML('content', 'أدخل المحتوي بشكل صحيح');
    $form->addText('address', 'أدخل العنوان بشكل صحيح');
    $form->addText('sign');
    $form->addText('phone1');
    $form->addText('phone2');
    $form->addText('phone3');
    if($_POST['url'])
        $form->addURL('url', 'أدخل الرابط بشكل صحيح');
    if($_POST['email'])
        $form->addEmail('email', 'أدخل الايميل بشكل صحيح');
    if($_POST['facebook'])
        $form->addURL('facebook', 'أدخل رابط الفيسبوك بشكل صحيح');
    $form->addPredefined('date', time());
    $form->process($successMessage); 
    
    
    if($_SESSION['placeId']){
        
        for($i=0; $i < count(array_filter($_FILES['image'])); $i++){
            
            $form = new PhotoAdd();
            $form->addImageAndThumbnailArray('image', $i, '../dynamic/places/');
            $form->addPredefined('placeId', $_SESSION['placeId']);
            $form->process($successMessage); 
        }
        unset($_SESSION['placeId']);
    }
    
    
      
}



?>