<?php

$this->title = 'ادعية';

$fetch = new Query('select * from doaa');
$fetch->addOrderBy(' id desc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();
if($fetch->getTotal() == 0){
	//$noRecords = 'لا يوجد أخبار  متاحة.';
}else{
	//$records = $fetch->getRecordSet();

}
?>