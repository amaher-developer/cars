<?php

$this->title = 'إضافة مشرف';

if ($formSubmitted) {


    $successMessage = '<div class="alert alert-success display">
                    <button class="close" data-close="alert"></button>
   تم إضافة المشرف بنجاح.
                    <br /><a href="index.php?p=admins">عرض المشرفين</a>
                </div>';
    $form = new AdminAdd();
    $form->addText('name', 'أدخل اسم المشرف.');
    $form->addText('password', 'أدخل كلمة المرور.');
    $form->addConfirm('repassword', 'password', 'أعد إدخال كلمة المرور بشكل صحيح.');
    $form->process($successMessage);
}
?>