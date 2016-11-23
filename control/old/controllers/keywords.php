<?php
include '../cash/types.php';
    
$this->title = 'كلمات البحث';

$fetch = new Agent('select * from keywords');
$fetch->addOrderBy(' id asc ');
$fetch->prepare();
$records = $fetch->getRecordSet();



?>