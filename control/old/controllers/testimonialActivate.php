<?php
$id = (int)$_GET['id'];
$this->title = 'تفعيل';

Database::query('update testimonials set testimonialActivate = 1 where testimonialid = '.$id);

header('Location: index.php?p=testimonials');
?>