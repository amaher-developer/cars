<?php

$this->title = 'الاوردرات';

$delete = (int)$_GET['d'];

$fetch = new Query('select a.*, b.userid, b.username from orders a left join users b on a.userid = b.userid');
$fetch->addCondition('a.deleted = "'.$delete.'"');
$fetch->addOrderBy(' a.orderid desc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$total_records = $fetch->getTotal();
if($fetch->getTotal() == 0){
	//$noRecords = 'لا يوجد أخبار  متاحة.';
}else{
	//$records = $fetch->getRecordSet();

}
?>