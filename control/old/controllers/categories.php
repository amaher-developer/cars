<?php
    
$this->title = 'الأقسام الرئيسية';

$fetch = new Category();
$fetch->addOrderBy(' id asc ');
$fetch->paginated((int)$_GET['num'], 10);
$fetch->prepare();
$records = $fetch->getRecordSet();
$pager = $fetch->pager(5, 'contents.php?'.FormProcessor::queryStringWithout('num').'&num=');
$total_records = $fetch->getTotal();

if($total_records == 0)
    $noRecords = "<p align='center' style='color:black;font-weight:bolder;'>لا يوجد أقسام<br/><br/></p>";

?>