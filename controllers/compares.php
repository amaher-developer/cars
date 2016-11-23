<?php


$this->title = 'Book Categories';

$categoryId = (int)$_GET['categoryId'];
$lang = (int)$_GET['l'];


if($lang == 1){
    $this->title = 'كتب عربية';    
    $clickHere = 'اضغط هنا للمادة الكاملة';
    $textAlign = 'right';
}else{
    $this->title = 'English Papers';
    $clickHere = 'Click here for the full paper';
    $textAlign = 'left';
}
$fetch = new Book();
$fetch->addCondition(' lang = "'.$lang.'"');
$fetch->prepare();
$records = $fetch->getRecordSet();





?>