<?php
include '../prepare.php';

$fetch = new Testimonial('select * from areas');
$fetch->addCondition('name like "%'.$_REQUEST['term'].'%"');
$fetch->prepare();
$records = $fetch->getRecordSet();

foreach($records as $record){
    $results[] = array('label' => $record['name']);
}

echo json_encode($results);

?>