<?php

$this->title = 'الأعلانات';

$fetch = new Adv();
$fetch->addOrderBy(' id desc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();


?>