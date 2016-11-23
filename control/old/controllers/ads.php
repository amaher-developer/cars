<?php
include '../cash/categories.php';
include '../cash/subcategories.php';

include '../cash/car_models.php';
include '../cash/car_motors.php';
include '../cash/job_types.php';
include '../cash/job_educations.php';
include '../cash/job_experiences.php';

if($_GET['t'] == 1){
    $t = 1;
    $this->title = 'الاعلانات القديمة';
}else if($_GET['t'] == 0){
    $t = 0;
    $this->title = 'الاعلانات الجديدة';    
}

$fetch = new Adv('select a.*, b.id uId, b.activated, b.email, c.id cId, c.name_en city from bezaat a left join users b on a.userId = b.id left join cities c on a.cityId = c.id');
if(isset($_GET['t'])){ 
    if($_GET['t'] == 2)
        $fetch->addCondition('a.registration = "1"');
    else{
        $fetch->addCondition('a.activate = '.$t.'');
        //$fetch->addCondition('a.activate = '.$t.' and a.registration = "0" and b.activated = "1"');
        //$fetch->addCondition('a.activate = '.$t.' and a.registration = "0"');
    }
    if($t == 1)    
        $fetch->addOrderBy(' a.id desc ');
    else
        $fetch->addOrderBy(' a.id asc ');
    $fetch->paginated((int)$_GET['num'], 10);
}else if(isset($_GET['userId'])){
    $fetch->addCondition('a.userId = "'.$_GET['userId'].'"');
    $fetch->addOrderBy(' a.id desc ');
    $fetch->paginated((int)$_GET['num'], 100);
    $this->title = 'اعلانات العضو';
}else{
    //$fetch->addCondition('a.id group by a.id');
}
$fetch->prepare();
$records = $fetch->getRecordSet();
$pager = $fetch->pager(5, 'contents.php?'.FormProcessor::queryStringWithout('num').'&num=');
$total_records = $fetch->getTotal();
if($total_records == 0)
    $noRecords = "<p align='center' style='color:black;font-weight:bolder;'>لا يوجد اعلانات<br/><br/></p>";

?>