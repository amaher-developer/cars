<?php
$this->title = 'عرض ';

$userid = (int)$_GET['userid'];
$search = strip_tags($_GET['search']);

$fetch = new Query('select * from users');

if($search)
 $fetch->addCondition('username like "%'.trim($_GET['search']).'%" or userid = "'.intval(trim($_GET['search'])).'"');
if($userid)
    $fetch->addCondition('userid = "'.$userid.'"');
$fetch->addOrderBy('userid desc');
$fetch->paginated((int)$_GET['num'], 10);
$fetch->prepare();
$records = $fetch->getRecordSet();

$pager = $fetch->pager(5, 'index.php?'.FormProcessor::queryStringWithout('num').'&num=');
$total_records = $fetch->getTotal();


?>