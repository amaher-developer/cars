<?php

/**
 * @author maher
 * @copyright 2012
 */

include '../config.php';
include '../cash/types.php';

$this->title = "أضافه كلمات بحث";
$records = mysql_fetch_assoc(Database::query('select * from keywords'));
$default = array(
    'keyword' => ''
);
if($formSubmitted){
    $typeId = $_POST['typeId'];
    $keywords = explode(',', trim($_POST['keyword']));
    if(count($keywords) >= 1){
        foreach($keywords as $keyword){
            if($keyword && !in_array($keyword, $records)){
                $form = Database::query('insert into keywords (typeId, name) value ("'.$typeId.'", "'.$keyword.'")');
                $successMessage = '<div class="success">تم الحفظ بنجاح</div>';
            }   
        }
    }
}

?>