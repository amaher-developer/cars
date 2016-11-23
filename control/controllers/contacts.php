<?php

$this->title = 'اتصل بنا';

$fetch = new Query('select * from contacts');
$fetch->addOrderBy(' id desc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();


?>