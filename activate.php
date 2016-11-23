<?php

include 'prepare.php';

$type = (int)$_GET['t'];
if($_SESSION['user']['usertwitterid']){
    Database::query('update users set useractivate = "'.$type.'" where usertwitterid = "'.$_SESSION['user']['usertwitterid'].'"');
    $_SESSION['user']['useractivate'] = $type;
}

header('Location: '.Globals::$siteURL);

?>