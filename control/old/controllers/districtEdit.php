<?php

$this->title = "تعديل الحي";

$id = intval($_GET['id']);

$fetch = new District();
$fetch->addCondition('id = "'.$_GET['id'].'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();

if(!$default){
    $pageDoesNotExist = true;
}else{
    unset($fetch);
    
    $fetch = new City();
    $fetch->addOrderBy('id asc');
    $fetch->prepare();
    $cities = $fetch->getRecordSet();
    
    if($formSubmitted){
        
        $successMessage = '<div class="success">تم تعديل الحي بشكل صحيح
                           <div><a href="contents.php?page=districts&id='.$id.'">رؤية جميع الأحياء</a></div>
                           <div><a href="contents.php">الرئيسية</a></div>
                           </div>
                           <script>
                                parent.Three.location.reload();
                           </script>
                          ';
                  
        $form = new DistrictEdit($id, $default);
        $form->addNumber('cityId', 'أختر المحافظة بشكل صحيح');
        $form->addText('name', 'أدخل الأسم بشكل صحيح');
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
}

?>