<?php
$id = (int)$_GET['id'];
$this->title = 'حذف محافظة';

Database::query(array('delete from city where id = %@', $id));

$formSubmitted = true;
?>