<?php

$this->title = 'الأقسام';

$fetch = new Category();
if((int)$_GET['d'])    
    $fetch->addCondition('deleted = "'.(int)$_GET['d'].'" ');
else 
    $fetch->addCondition(' deleted = "0"');
$fetch->addOrderBy(' id asc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();


?>