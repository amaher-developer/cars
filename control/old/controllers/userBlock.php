<?php
$id = (int)$_GET['id'];
$this->title = 'بلوك';

Database::query('update users set userblock = 1 where userid = '.$id);

header('Location: index.php?p=users');

?>