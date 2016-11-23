<?php

   
$this->title = 'أضافة منطقة';


if ($formSubmitted) {


    $successMessage = '<div class="alert alert-success display">
						<button class="close" data-close="alert"></button>
						تم إضافة المركز بنجاح.
						<br /><a href="index.php?p=district">عرض المراكز</a>
					</div>';
    $form = new CountryAdd();
    $form->addPredefined('name', $name);
    $form->addPredefined('regionId', $_POST['regionId']);
    //$form->addText('name', 'أدخل اسم المنطقة.');
    //$form->addNumber('regionId', 'أختر الحي.');
    $form->process($successMessage);
}


?>