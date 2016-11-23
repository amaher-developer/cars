<?php
$id = (int)$_GET['id'];
$this->title = 'بلوك';

Database::query('update testimonials set testimonialActivate = 0 where testimonialid = '.$id);

header('Location: index.php?p=testimonials');

?>