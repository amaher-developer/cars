<?php
$this->title = 'المناطق';


$fetch = new Country('select * from countries');
$fetch->paginated((int)$_GET['num'], 20);
$fetch->addOrderBy(' countryid desc ');
$fetch->prepare();
$records = $fetch->getRecordSet();
$pager = $fetch->pager(5, 'index.php?'.FormProcessor::queryStringWithout('num').'&num=');

?>