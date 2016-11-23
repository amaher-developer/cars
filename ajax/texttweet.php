<?php
include '../prepare.php';
$texttweet1 = strip_tags($_POST['texttweet1']);
$texttweet2 = strip_tags($_POST['texttweet2']);
$texttweet3 = strip_tags($_POST['texttweet3']);
$doaatweet = (int)$_POST['doaatweet'];
if($doaatweet)
    $doaalength = 80;
$tweet_lenght = mb_strlen($texttweet1,'UTF-8') + mb_strlen($texttweet2,'UTF-8')  + mb_strlen($texttweet3,'UTF-8');
if($tweet_lenght)
    $tweet_lenght = $tweet_lenght + $doaalength;
else
    $tweet_lenght = 25 + $doaalength;
if(($texttweet1 || $texttweet2 || $texttweet3 ) && $_SESSION['user'] && ($tweet_lenght < 130) && ($tweet_lenght > 0)){
    $tweet = $texttweet1.' @prayer '.$texttweet1.' @city @time '.$texttweet1;
    Database::query('update users set usertexttweet = "'.$tweet.'", usertexttweet1 = "'.$texttweet1.'", usertexttweet2 = "'.$texttweet2.'", usertexttweet3 = "'.$texttweet3.'" where userid = "'.$_SESSION['user']['userid'].'"');
    $_SESSION['user']['usertexttweet'] = $tweet;
    $_SESSION['user']['usertexttweet1'] = $texttweet1;
    $_SESSION['user']['usertexttweet2'] = $texttweet2;
    $_SESSION['user']['usertexttweet3'] = $texttweet3;
    echo 'true';
}else{
    echo 'false';
}
?>