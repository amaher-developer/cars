<?php

include '../prepare.php';

$type = intval($_POST['type']);
$banktransfer = strip_tags($_POST['banktransfer']);
$buyamount = Globals::$buyamount;
$years = (int)$_POST['yearbanktransfer'];

if($banktransfer && $type){
    $fetch = new Query('select * from orders');
    $fetch->addCondition('userid = "'.$_SESSION['user']['userid'].'" and type = "'.$type.'" and banktransfer = "'.$banktransfer.'"');
    $fetch->addOrderBy('orderid desc');
    $fetch->prepare();
    $order = $fetch->getSingleRecord();
    
    if($order) 
        $dateFrom = $order['dateTo'];
    else
        $dateFrom = time();
    $dateTo = strtotime('+'.$years.' years', $dateFrom);
    
    Database::query('insert into orders (userid, type, amount, status, banktransfer, date, dateFrom, dateTo, years) value ("'.$_SESSION['user']['userid'].'", "'.$type.'", "'.$buyamount.'", "0", "'.$banktransfer.'", "'.time().'", "'.$dateFrom.'", "'.$dateTo.'", "'.$years.'")');
    Database::query('update users set userpaymenttype = "'.$type.'" where userid = "'.$_SESSION['user']['userid'].'"');    
    echo 'true';
   
}

if($type == 0){
    Database::query('update users set userpaymenttype = "'.$type.'" where userid = "'.$_SESSION['user']['userid'].'"');    
    echo 'true';
}

?>