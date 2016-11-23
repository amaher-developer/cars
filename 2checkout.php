<?php

include 'prepare.php';


$user = $_SESSION['user'];

if($user && $_POST['sid']){

    
    if(($_POST['total'] > 20)){
        $type = 2;
    }else if($_POST['total'] > 2){
        $type = 1;
        $dateTo = strtotime('+1 years', time());
    }
    
    
    $fetch  = new Query('select * from orders');
    $fetch->addCondition('userid = "'.$user['userid'].'" and type = "'.$type.'"');
    $fetch->prepare();
    $default = $fetch->getSingleRecord();
    
    
    $tocheckout.= 'sid: '.$_POST['sid'].'<br/>';
    $tocheckout.= 'key: '.$_POST['key'].'<br/>';
    $tocheckout.= 'email: '.$_POST['email'].'<br/>';
    $tocheckout.= 'order_number: '.$_POST['order_number'].'<br/>';
    $tocheckout.= 'currency_code: '.$_POST['currency_code'].'<br/>';
    $tocheckout.= 'product_description: '.$_POST['product_description'].'<br/>';
    $tocheckout.= 'invoice_id: '.$_POST['invoice_id'].'<br/>';
    $tocheckout.= 'country: '.$_POST['country'].'<br/>';
    $tocheckout.= 'quantity: '.$_POST['quantity'].'<br/>';
    $tocheckout.= 'card_holder_name: '.$_POST['card_holder_name'].'<br/>';
    $tocheckout.= 'first_name: '.$_POST['first_name'].'<br/>';
    $dateFrom =  time();
    
    if(!$default){
        Database::query('insert into orders (userid, type, amount, status, 2checkout, datepaid, date, dateFrom, dateTo) value ("'.$user['userid'].'", "'.$type.'", "'.$buyamount.'", "1", "'.$tocheckout.'", "'.time().'", "'.time().'", "'.$dateFrom.'", "'.$dateTo.'")');
        Database::query('update users set useractivate = "1", userpaymenttype = "'.$type.'" where userid = "'.$_SESSION['user']['userid'].'"');    
    }
    
    
    $_SESSION['payment'] = $type;
    
    header('Location: '.Globals::$siteURL); 
}
?>