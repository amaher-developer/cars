<?php

$this->title = "أضافة قسم فرعي";

$default = array(
                    'id' => '',
                    'name' => '',
                    'catId' => ''
                );

$fetch = new Category();
$fetch->prepare();
$categories = $fetch->getRecordSet();

if($formSubmitted){
    
    $successMessage = '<div class="success">تم أضافة القسم بشكل صحيح
                       <div><a href="contents.php?page=subcategories">رؤية كل الأقسام</a></div>
                       <div><a href="contents.php">الرئيسية</a></div>
                       </div>';
    
    $form = new SubCategoryAdd();
    $form->addNumber('catId', 'أختر القسم الرئيسي بشكل صحيح');
    $form->addText('name', 'أدخل الأسم بشكل صحيح');
    $form->addText('name_en', 'أدخل الأسم الأنجليزي بشكل صحيح');
    $form->process($successMessage);
    
    $_SESSION['catId'] = $_POST['catId'];
    
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

if($_SESSION['catId'])
    $default['catId'] = $_SESSION['catId'];

?>