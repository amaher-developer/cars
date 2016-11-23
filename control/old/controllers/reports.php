<?php

$this->title = 'الاوردرات';

$delete = (int)$_GET['d'];

$fetch = new Query('select a.*, b.userid, b.username, b.userurl from logs a left join users b on a.loguserid = b.userid');
$fetch->addCondition(' code != "" ');
$fetch->addOrderBy(' a.logid desc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();
if($fetch->getTotal() == 0){
	//$noRecords = 'لا يوجد أخبار  متاحة.';
}else{
	//$records = $fetch->getRecordSet();

}

?>