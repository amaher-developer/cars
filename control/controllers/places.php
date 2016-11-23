<?php

include '../cash/areas.php';
//include '../cash/categories.php';

$fetch = new Category();
$fetch->addOrderBy('id asc');
$fetch->prepare();
$cats = $fetch->getRecordSet();

$this->title = 'الأماكن';

$areaId = (int)$_GET['areaId'];
$catId = (int)$_GET['catId'];

$fetch = new Place();
$fetch->addCondition('id = id');
if($areaId)
    $fetch->addCondition(' and areaId = '.$areaId);
if($catId)
    $fetch->addCondition(' and catId = '.$catId);
$fetch->addOrderBy(' id desc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();


?>