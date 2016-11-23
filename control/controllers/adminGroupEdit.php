<?php

$this->title = 'تعديل العضوية';
$id = (int)$_GET['id'];


foreach(new RecursiveIteratorIterator( new RecursiveDirectoryIterator("controllers/")) as $file) {
  if (strtolower(substr($file, -4)) == ".php") {
        $key = trim(str_replace('.php', '', str_replace('controllers\\','', str_replace('controllers/', '', $file))));
        $records[$key] = $key;
  }
}



$fetch = new AdminGroup();
$fetch->addCondition('id = "'.$id.'"');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$premissions = explode(',', $default['permissions']);
if($formSubmitted){
    
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							Successfully
						</div>';
    $form = new AdminGroupEdit($id, $default);
    $form->addText('name', 'برجاء ادخال اسم العضويه بشكل صحيح');
    $form->addArrayInString('permissions', ',','برجاء اختيار الصلاحيات بشكل صحيح');
    $form->process($successMessage);   
}



?>