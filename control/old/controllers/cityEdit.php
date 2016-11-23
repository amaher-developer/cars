<?php

$this->title = 'تعديل محافظة';
$id = (int)$_GET['id'];

$fetch = new Country();
$fetch->prepare();
$countries = $fetch->getRecordSet();

$fetch = new City();
$fetch->addCondition(' id = '.$id);
$fetch->prepare();
if($fetch->getTotal() > 0){
	$default = $fetch->getSingleRecord();
	
if($formSubmitted){
    
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم تعديل المحافظة بنجاح.
							<br /><a href="index.php?p=cities">عرض المحافظة</a>
						</div>';
    /*
    $form = new CityEdit($id, $default);
    $form->addText('name', 'أدخل اسم المحافظة.');
    $form->process($successMessage);   
    */
}

}
?>