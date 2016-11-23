<?php
$this->title = 'الرئيسية';
/*
$fetch = new Query('select * from users');
$fetch->addCondition(' userid = "3" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();
$user = $_SESSION['user'] = $default;
*/
if($_SESSION['usertwitterid']){
    $fetch = new User();
    $fetch->addCondition('usertwitterid = "'.$_SESSION['usertwitterid'].'"');
    $fetch->prepare();
    $user = $_SESSION['user'] = $fetch->getSingleRecord();  
    unset($_SESSION['usertwitterid']);  
}
$fetch = new News();
$fetch->addOrderBy('date desc');
$fetch->addLimit('3');
$fetch->prepare();
$news = $fetch->getRecordSet();
$fetch = new Testimonial();
$fetch->addCondition('testimonialactivate = 1');
$fetch->addOrderBy('date desc');
$fetch->addLimit('3');
$fetch->prepare();
$testimonials = $fetch->getRecordSet();
if(!$_SESSION['countriesNum'] ||  !$_SESSION['citiesNum'] || !$_SESSION['tweetsNum'] || !$_SESSION['usersNum']){    
    $fetch = new Query('select count(countryid) count from countries');
    $fetch->prepare();
    $countriesNum = $fetch->getSingleRecord();
    $_SESSION['countriesNum'] = $countriesNum['count'];
    $fetch = new Query('select count(id) count from cities');
    $fetch->prepare();
    $citiesNum = $fetch->getSingleRecord();
    $_SESSION['citiesNum'] = $citiesNum['count'];
    $fetch = new Query('select count(userid) count from users');
    $fetch->prepare();
    $citiesNum = $fetch->getSingleRecord();
    $_SESSION['usersNum'] = $citiesNum['count'];
    $fetch = new Query('select count(logid) count from logs');
    $fetch->prepare();
    $citiesNum = $fetch->getSingleRecord();
    $_SESSION['tweetsNum'] = $citiesNum['count'];
}
?>