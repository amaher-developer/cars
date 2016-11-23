<?php
    
$this->title = 'الأعضاء';

$fetch = new Agent('SELECT a.*, b.id bId , count(b.id) count, b.userId, c.id cId, c.name cName FROM users a left join bezaat b on a.id = b.userId left join cities c on a.cityId = c.id');
if($_GET['search'])
    $fetch->addCondition('a.email like "%'.trim($_GET['search']).'%" or a.id = "'.intval(trim($_GET['search'])).'"');
else if($_GET['t'] == 1)
    $fetch->addCondition('a.activated = "0" and a.id group by a.id');
else
    $fetch->addCondition('a.id group by a.id');

if($_GET['t'] == 1)
    $fetch->addOrderBy(' a.account_type desc, count desc, id desc ');
else
    $fetch->addOrderBy(' id desc ');
    
$fetch->paginated((int)$_GET['num'], 10);
$fetch->prepare();
$records = $fetch->getRecordSet();
$pager = $fetch->pager(5, 'contents.php?'.FormProcessor::queryStringWithout('num').'&num=');
$total_records = $fetch->getTotal();

if($total_records == 0)
    $noRecords = "<p align='center' style='color:black;font-weight:bolder;'>لا يوجد أعضاء<br/><br/></p>";

?>