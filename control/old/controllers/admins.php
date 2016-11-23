<?php
$this->title = 'عرض الشرفين';

$fetch = new Admin();
$fetch->addOrderBy(' id desc ');
$fetch->prepare();
if($fetch->getTotal() == 0){
	$noRecords = 'لا يوجد بيانات حاليأ.';
}else {
    $records = $fetch->getRecordSet();
}

?>