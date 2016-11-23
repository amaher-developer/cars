<?php

$this->title = "أضافة قسم رئيسي";

$default = array(
                    'id' => '',
                    'name' => ''
                );
if($formSubmitted){
    
    $successMessage = '<div class="success">تم أضافة القسم بشكل صحيح
                       <div><a href="contents.php?page=categories">رؤية كل الأقسام</a></div>
                       <div><a href="contents.php">الرئيسية</a></div>
                       </div>
                       <script>
                            parent.Three.location.reload();
                       </script>';
    
    $form = new CategoryAdd();
    $form->addText('name', 'أدخل الأسم بشكل صحيح');
    $form->addText('name_en', 'أدخل الأسم الأنجليزي بشكل صحيح');
    $form->process($successMessage);
    
    $c = '<?php
    ';
    $fetch = new Category();
    $fetch->addOrderBy(' id asc ');
    $fetch->prepare();
    if($fetch->getTotal() > 0){
        $records = $fetch->getRecordSet();
        $i = 0;
        foreach($records as $record){
            foreach($record as $key => $val){
                //$complex = str_replace('"', '\"', htmlspecialchars($val));
                $c.= '$categories[\''.$i.'\'][\''.$key.'\'] = "'.addslashes($val).'";
    ';      
            }
        $i++;
        }
    }
    $c.= '
    ?>';
    
    $f = fopen('../cash/categories.php', 'w');
    fwrite($f, $c);
    fclose($f);
    
}


?>