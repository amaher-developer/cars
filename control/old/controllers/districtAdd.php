<?php

$this->title = "أضافة حي";

$default = array(
                    'id' => '',
                    'cityId' => '',
                    'name' => '',
                    'name_en' => ''
                );

$fetch = new City();
$fetch->addOrderBy('id asc');
$fetch->prepare();
$cities = $fetch->getRecordSet();

if($formSubmitted){
    $_SESSION['cityId'] = $_POST['cityId'];
    $successMessage = '<div class="success">تم أضافة الحي بشكل صحيح
                       <div><a href="contents.php?page=districts&id='.$id.'">رؤية جميع الأحياء</a></div>
                       <div><a href="contents.php">الرئيسية</a></div>
                       </div>
                       <script>
                            parent.Three.location.reload();
                       </script>';
    
    $form = new DistrictAdd();
    $form->addNumber('cityId', 'أختر المحافظة بشكل صحيح');
    $form->addText('name', 'أختر الأسم بشكل صحيح');
    $form->addText('name_en', 'أختر الأسم بالنجليزي بشكل صحيح');
    $form->process($successMessage);
    
    $c = '<?php
    ';
    $fetch = new District();
    $fetch->addOrderBy(' id asc ');
    $fetch->prepare();
    if($fetch->getTotal() > 0){
        $records = $fetch->getRecordSet();
        $i = 0;
        foreach($records as $record){
            foreach($record as $key => $val){
                //$complex = str_replace('"', '\"', htmlspecialchars($val));
                $c.= '$districts[\''.$i.'\'][\''.$key.'\'] = "'.addslashes($val).'";
    ';      
            }
        $i++;
        }
    }
    $c.= '
    ?>';
    
    $f = fopen('../cash/districts.php', 'w');
    fwrite($f, $c);
    fclose($f);
}


?>