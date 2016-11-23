<?php
$this->title = "تعديل الأقسام";
$id = intval($_GET['id']);
$fetch = new Category();
$fetch->addCondition('id = "'.$_GET['id'].'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();
if(!$default){
    $pageDoesNotExist = true;
}else{
    if($formSubmitted){
        $successMessage = '<div class="success">تم تعديل القسم بنجاح
                           <div><a href="contents.php?page=categories">رؤية جميع الأقسام</a></div>
                           <div><a href="contents.php">الرئيسية</a></div>
                           </div>
                           <script>
                                parent.Three.location.reload();
                           </script>
                          ';
        $form = new CategoryEdit($id, $default);
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
}
?>