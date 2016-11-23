<?php
if(!$user)
    header('Location: '.Globals::$siteURL);
$this->title = 'إعدادات الخدمة';
$azan = array('الفجر', 'الظهر', 'العصر', 'المغرب', 'العشاء');
$fetch = new Query('select * from countries');
//$fetch->addCondition('');
$fetch->prepare();
$countries = $fetch->getRecordSet();
$fetch = new Query('select * from cities');
if($user['usercityid'])
    $fetch->addCondition('countries = "'.$user['usercountry'].'"');
else
    $fetch->addCondition('countries = "ksa"');
$fetch->prepare();
$cities = $fetch->getRecordSet();
if($user['usertexttweet1'] || $user['usertexttweet2'] || $user['usertexttweet3'])
    $tweet_first = $user['usertexttweet1'];
else
    $tweet_first = 'حان الآن موعد أذان';
if($user['usertexttweet1'] || $user['usertexttweet2'] || $user['usertexttweet3'])
    $tweet_middle = $user['usertexttweet2'];
else
    $tweet_middle = 'لمدينة';
if($user['usertexttweet1'] || $user['usertexttweet2'] || $user['usertexttweet3'])
   $tweet_last = $user['usertexttweet3']; 
else
    $tweet_last = '';
$tweet_lenght = mb_strlen($tweet_first,'UTF-8') + mb_strlen($tweet_middle,'UTF-8')  + mb_strlen($tweet_last,'UTF-8');
?>