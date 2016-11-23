<?php

include '../prepare.php';

$fetch = new Query('select * from doaa');
$fetch->addCondition('status = 0');
$fetch->addOrderBy('rand()');
$fetch->addLimit('5');
$fetch->prepare();
$doaa = $fetch->getRecordSet();

for($i = 0;$i < 5;$i++){
    $t = $i + 1;
    Database::query('update citiesathan set doaa = "'.$doaa[$i]['doaa'].'" where prayer = "'.$t.'"');
    Database::query('update doaa set status = "1" where id = "'.$doaa[$i]['id'].'"');
}


?>