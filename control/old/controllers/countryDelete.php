<?php
$id = (int)$_GET['id'];
$this->title = 'حذف حي';

Database::query(array('delete from district where id = %@', $id));

$formSubmitted = true;
?>