<?php

$this->title = 'تعديل مشرف';
$id = (int)$_GET['id'];

$fetch = new Admin();
$fetch->addCondition(array(' id = %@ ', $id));
$fetch->prepare();
if($fetch->getTotal() > 0) {
    $default = $fetch->getSingleRecord();
    unset($default['password']);
    if ($formSubmitted) {

        $successMessage = '<div class="alert alert-success display">
                    <button class="close" data-close="alert"></button>
                    تم تعديل المشرف بنجاح
                    <br /><a href="index.php?p=admins">عرض المشرف</a>
                </div>';
        $form = new AdminEdit($id, $default);
        $form->addText('name', 'أدخل اسم الموظف.');
        $form->addText('password');
        $form->addConfirm('repassword', 'password', 'أعد إدخال كلمة المرور بشكل صحيح.');
        $form->addText('privilegeId', 'أختر الصلاحية.');
        $form->process($successMessage);
    }
}
?>