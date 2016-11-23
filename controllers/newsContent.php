<?php

$id = (int)$_GET['id'];

$fetch = new News();
$fetch->addCondition('id = "'.$id.'"');
$fetch->prepare();
$default = $fetch->getSingleRecord();

Database::query('update news set views = views + 1 where id = '.$id);

$this->title = $default['title'];



?>