<?php
$this->title = "تعديل القسم الفرعي";
$id = intval($_GET['id']);
$fetch = new SubCategory();
$fetch->addCondition('id = "'.$_GET['id'].'" ');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$fetch = new Category();
$fetch->prepare();
$categories = $fetch->getRecordSet();

if(!$default){
    $pageDoesNotExist = true;
}else{
    if($formSubmitted){
        $successMessage = '<div class="success">تم تعديل القسم بنجاح
                           <div><a href="contents.php?page=subcategories">رؤية جميع الأقسام</a></div>
                           <div><a href="contents.php">الرئيسية</a></div>
                           </div>
                          ';
        $form = new SubCategoryEdit($id, $default);
        $form->addNumber('catId', 'أختر القسم الرئيسي بشكل صحيح');
        $form->addText('name', 'أدخل الأسم بشكل صحيح');
        $form->addText('name_en', 'أدخل الأسم الأنجليزي بشكل صحيح');
        $form->process($successMessage);
        $c = '<?php
        ';
        $fetch = new SubCategory();
        $fetch->addOrderBy(' id asc ');
        $fetch->prepare();
        if($fetch->getTotal() > 0){
            $records = $fetch->getRecordSet();
            $i = 0;
            foreach($records as $record){
                foreach($record as $key => $val){
                    //$complex = str_replace('"', '\"', htmlspecialchars($val));
                    $c.= '$subcategories[\''.$i.'\'][\''.$key.'\'] = "'.addslashes($val).'";
        ';      
                }
            $i++;
            }
        }
        $c.= '
        ?>';
        $f = fopen('../cash/subcategories.php', 'w');
        fwrite($f, $c);
        fclose($f);
    }
}
?>