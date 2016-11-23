<?php
$id = (int)$_GET['id'];
$this->title = 'حذف المشرف';

if($id != 1)
    Database::query(('delete from admin where id = '.$id));

$formSubmitted = true;
?>