<?php
include '../prepare.php';
$azan1 = intval($_POST['azan1']);
$azan2 = intval($_POST['azan2']);
$azan3 = intval($_POST['azan3']);
$azan4 = intval($_POST['azan4']);
$azan5 = intval($_POST['azan5']);
$azan6 = intval($_POST['azan6']);
$azan7 = intval($_POST['azan7']);
//if($azan1 || $azan2 || $azan3 || $azan4 || $azan5){
    Database::query('update users set azan1 = "'.$azan1.'", azan2 = "'.$azan2.'", azan3 = "'.$azan3.'", azan4 = "'.$azan4.'", azan5 = "'.$azan5.'", azan6 = "'.$azan6.'", azan7 = "'.$azan7.'" where userid = "'.$_SESSION['user']['userid'].'"');
    $_SESSION['user']['azan1'] = $azan1;
    $_SESSION['user']['azan2'] = $azan2;
    $_SESSION['user']['azan3'] = $azan3;
    $_SESSION['user']['azan4'] = $azan4;
    $_SESSION['user']['azan5'] = $azan5;
    $_SESSION['user']['azan6'] = $azan6;
    $_SESSION['user']['azan7'] = $azan7;
    echo 'true';
//}
?>