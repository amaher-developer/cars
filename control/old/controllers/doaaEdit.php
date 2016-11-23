<?php

$this->title = 'تعديل خبر';
$id = (int)$_GET['id'];

$fetch = new Query('select * from doaa');
$fetch->addCondition('id = "'.$id.'"');
$fetch->prepare();
$default = $fetch->getSingleRecord();




?>