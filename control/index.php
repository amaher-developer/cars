<?php


include '../prepare.php';
$module = $_GET['p'];

$premissions_str = $_SESSION['admin']['permissions'];
$premissions_ar = explode(',', $_SESSION['admin']['permissions']);
$premissions_str = implode(' ', $premissions_ar);
$premissions_str = ' '.$premissions_str;

if($_SESSION['admin']['id'] && $_SESSION['admin']['groupId'] && !in_array($module, $premissions_ar)){
    
    //header('Location: '.Globals::$siteURL.'control/index.php?p=default');
    header('Location: index.php?p=default');
    //echo "<script>window.location = 'index.php?p=default'</script>";
}

$router = new Router($module);
$router->render();
?>