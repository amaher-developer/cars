<?php
include '../prepare.php';

$id = (int)$_POST['id'];
$type = (int)$_POST['type'];

$fetch = new Agent('select id, company_tel, company_mobile, company_fax from users');
$fetch->addCondition('id = '.$id);
$fetch->prepare();
$default = $fetch->getSingleRecord();

if($type == 3)
    echo $default['company_fax'];
else if($type == 2)
    echo $default['company_mobile'];
else
    echo $default['company_tel'];

?>