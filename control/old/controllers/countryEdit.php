<?php

$this->title = 'تعديل البلد';
$id = (int)$_GET['id'];

$fetch = new Country();
$fetch->addCondition(' id = '.$id );
$fetch->prepare();
$default = $fetch->getSingleRecord();
	
if($formSubmitted){

   $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم تعديل المنطقة بنجاح.
							<br /><a href="index.php?p=districts">عرض المناطق</a>
						</div>';
   $form = new CountryEdit($id, $default);
   $form->addText('name', 'أدخل اسم المنطقة.');
   $form->addNumber('regionId', 'أختر الحي.');
   $form->process($successMessage);   

}
?>