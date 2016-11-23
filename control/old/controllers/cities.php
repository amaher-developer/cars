<?php

$this->title = 'المحافظات';

$fetch = new Country();
$fetch->addOrderBy(' countryid desc ');
$fetch->prepare();
$countries = $fetch->getRecordSet();

$country = strip_tags($_GET['country']);
$fetch = new City();
if($country)
    $fetch->addCondition(' countries = "'.$country.'"');
$fetch->addOrderBy(' countries desc ');
$fetch->prepare();
if($fetch->getTotal() == 0){
	$noRecords = 'لا يوجد محافظات  متاحة.';
}else{
	$records = $fetch->getRecordSet();

}
?>