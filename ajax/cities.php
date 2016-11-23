<?php

include '../prepare.php';

$country = strip_tags($_POST['country']);

if($country){
    $fetch = new Query('select * from cities');
    $fetch->addCondition('countries = "'.$country.'"');
    $fetch->prepare();
    $cities = $fetch->getRecordSet();
    if(!$cities)
        echo '<option>أختر المدينة</option>';
    foreach($cities as $city)
        echo '<option value="'.$city['id'].'">'.$city['car'].'</option>';
    
}else{
    echo '<option>أختر المدينة</option>';
}



?>