<?php


$fetch = new Query('select * from users');
$fetch->addCondition(' userid = "'.(int)$_GET['userid'].'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();
$user = $_SESSION['user'] = $default;

$_SESSION['twitterlogin'] = 2;
?>