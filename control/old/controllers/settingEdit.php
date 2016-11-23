<?php

$this->title = 'تعديل التواريخ الهجري';
$id = (int)$_GET['id'];

$fetch = new Query('select * from settings');
$fetch->addOrderBy('settingid asc');
$fetch->prepare();
if($fetch->getTotal() > 0){
	$records = $fetch->getRecordSet();
	
if($formSubmitted){
    
/*    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم تعديل التاريخ الهجري بنجاح.
						</div>';
    $form = new SettingEdit($id, $default);
    $form->addPredefined('hijri', 'أدخل اسم المحافظة.');
    $form->addPredefined('name', 'أدخل اسم المحافظة.');
    $form->process($successMessage);   
*/
}

}

?>