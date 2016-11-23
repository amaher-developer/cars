<?php

$this->title = 'الأخبـــار';

$fetch = new News();
$fetch->addOrderBy(' id asc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();


?>