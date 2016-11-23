<?php
$this->title = 'عرض';

$fetch = new Admin('select * from contacts');
$fetch->addOrderBy(' contactid desc ');
$fetch->prepare();
if($fetch->getTotal() == 0){
	//$noRecords = 'لا يوجد بيانات حاليأ.';
}else {
    $records = $fetch->getRecordSet();
}

?>