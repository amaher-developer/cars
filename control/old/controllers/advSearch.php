<?php
$this->title = 'البحث عن اعلان';
if($_POST['search']){
        $search = $_POST['search'];
    }else if($_GET['search']){
        $search = $_GET['search'];
    }
    if(!$search){
        $noRecords = '<div class="failure">يجب أدخال الكلمة للبحث عنها</div>';
    }else if(strlen(utf8_decode($search)) <= '3'){
        $noRecords = '<div class="failure">يجب أن تكون الكلمة أكثر من 3 حروف</div>';
    }else{
    $fetch = new Adv();
    $fetch->addCondition('        
                             title LIKE "%'.$search.'%" 
                             OR email LIKE "%'.$search.'%"
                             OR id LIKE "%'.$search.'%"
                             OR address LIKE "%'.$search.'%"              
                             OR content LIKE "%'.$search.'%" 
                        ');
    $fetch->addOrderBy(' id desc ');
    $fetch->paginated((int)$_GET['num'], 10);
    $fetch->prepare();
    $records = $fetch->getRecordSet();
    $pager = $fetch->pager(5, 'contents.php?'.FormProcessor::queryStringWithout('num').'&num=');
    $total_records = $fetch->getTotal();
    if($total_records == 0)
        $noRecords = "<p align='center' style='color:black;font-weight:bolder;'>لا يوجد اعلانات متطابقة<br/><br/></p>";
}
?>