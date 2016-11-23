<?php
$id = (int)$_GET['id'];
$this->title = 'تفعيل';

Database::query('update users set userblock = 0 where userid = '.$id);

header('Location: index.php?p=users');
?>