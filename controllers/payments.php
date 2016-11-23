<?php

if(!$user)
    header('Location: '.Globals::$siteURL);


$type = (int)$_GET['t'];

if($type == 1){
    $buyamount = Globals::$buyamountlife;
    $buyamountunit = Globals::$buyamountunitlife;
}else{
    $buyamount = Globals::$buyamount;
    $buyamountunit = Globals::$buyamountunit;
}


$this->title = 'طرق الدفع';

$fetch = new Query('select * from countries');
//$fetch->addCondition('');
$fetch->prepare();
$countries = $fetch->getRecordSet();

$fetch = new Query('select * from cities');
//$fetch->addCondition('');
$fetch->prepare();
$cities = $fetch->getRecordSet();

?>