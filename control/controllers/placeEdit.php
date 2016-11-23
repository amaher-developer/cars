<?php

include '../cash/areas.php';
//include '../cash/categories.php';



$id = (int)$_GET['id'];

$fetch = new Category();
$fetch->prepare();
$categories = $fetch->getRecordSet();

$fetch = new Place();
$fetch->addCondition('id = "'.$id.'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$fetch = new Place('select * from images');
$fetch->addCondition('placeId = "'.$id.'" ');
$fetch->prepare();
$images = $fetch->getRecordSet();

if($formSubmitted){
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم التعديل بنجاح
						</div>';
    $form = new PlaceEdit($id, $default);
    $form->addPredefined('activate', $_POST['activate']);
    $form->addPredefined('keywords', strip_tags($_POST['keywords']));
    $form->addPredefined('description', strip_tags($_POST['description']));
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