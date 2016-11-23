<?php

$this->title = 'الشهادات';


$fetch = new Testimonial();
$fetch->addOrderBy(' testimonialid desc ');
$fetch->prepare();
if($fetch->getTotal() == 0){
	//$noRecords = 'لا يوجد محافظات  متاحة.';
}else{
	$records = $fetch->getRecordSet();

}
?>