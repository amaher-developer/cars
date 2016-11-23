<?php

$this->title = 'الأعضاء';

$fetch = new Admin('select a.*, b.id bId, b.name group_name from admins a left join admins_groups b on a.groupId = b.id');
if((int)$_GET['d'])    
    $fetch->addCondition('a.deleted = "'.(int)$_GET['d'].'" and a.id != "1"');
else 
    $fetch->addCondition(' a.deleted = "0"');
$fetch->addOrderBy(' a.id asc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();


?>