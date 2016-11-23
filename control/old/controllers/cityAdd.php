<?php

$this->title = 'أضافة محافظة';

if($formSubmitted){
    
    
    $successMessage = '<div class="alert alert-success display">
							<button class="close" data-close="alert"></button>
							تم إضافة المحافظة بنجاح.
							<br /><a href="index.php?p=cities">عرض المحافظات</a>
						</div>';
    $form = new CityAdd();
    $form->addText('name', 'أدخل اسم المحافظة.');
    $form->process($successMessage);   
}


?>