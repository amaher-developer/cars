<?php
include '../prepare.php';
$country = strip_tags($_POST['country']);
$city = strip_tags($_POST['city']);
$cityname = strip_tags($_POST['cityname']);
if($country && $city){
    $fetch = new Query('select * from users');
    $fetch->addCondition('userid = "'.$_SESSION['user']['userid'].'" and userblock = "0"');
    $fetch->prepare();
    $default = $fetch->getSingleRecord();
    if($default['useractivate'] == 0){
        $_SESSION['user']['useractivate'] = 1;
        $activatequery = ', useractivate = "1"';
        echo 'true1';
    }else
        echo 'true';
    Database::query('update users set usercity = "'.$cityname.'", usercityid = "'.$city.'", usercountry = "'.$country.'" '.$activatequery.' where userid = "'.$_SESSION['user']['userid'].'"');
    $_SESSION['user']['usercity'] = $cityname;
    $_SESSION['user']['usercityid'] = $city;
    $_SESSION['user']['usercountry'] = $country;
}
?>