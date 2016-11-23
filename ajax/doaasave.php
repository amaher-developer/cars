<?php
include '../prepare.php';
$doaatweet = intval($_POST['doaatweet']);
if($doaatweet)
    $doaalength = 80;
$tweet_lenght = mb_strlen($_SESSION['user']['usertexttweet1'],'UTF-8') + mb_strlen($_SESSION['user']['usertexttweet2'],'UTF-8')  + mb_strlen($_SESSION['user']['usertexttweet3'],'UTF-8');
if($tweet_lenght)
    $tweet_lenght = $tweet_lenght + $doaalength;
else
    $tweet_lenght = 25 + $doaalength;
if(($tweet_lenght < 130) && ($tweet_lenght > 0)){
    Database::query('update users set userdoaatweet = "'.$doaatweet.'" where userid = "'.$_SESSION['user']['userid'].'"');
    $_SESSION['user']['userdoaatweet'] = $doaatweet;
    echo (130 - $tweet_lenght);
}else{
    echo 'false';
}
?>