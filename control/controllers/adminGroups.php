<?php

$this->title = 'العضويات';

$fetch = new AdminGroup();
$fetch->addCondition('id != "1"');
$fetch->addOrderBy(' id asc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();


?>