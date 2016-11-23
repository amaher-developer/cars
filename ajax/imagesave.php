<?php
include '../prepare.php';
$imagetweet = intval($_POST['imagetweet']);
Database::query('update users set userimagetweet = "'.$imagetweet.'" where userid = "'.$_SESSION['user']['userid'].'"');
$_SESSION['user']['userimagetweet'] = $imagetweet;
echo 'true';
?>