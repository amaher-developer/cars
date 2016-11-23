<?php
include '../../prepare.php';
if($_POST['catId']){
    $fetch = new Section();
    $fetch->addCondition(' catId = "'.intval($_POST['catId']).'" ');
    $fetch->addOrderBy(' id asc ');
    $fetch->prepare();
    $sections = $fetch->getRecordSet();
?>
<?php if($sections){ ?>
<?php foreach($sections as $section){?>
<option value="<?php echo $section['id']?>"><?php echo $section['title']?></option>
<?php }?>
<?php }else{ ?>
<option>لا يوجد أقسام</option>
<?php } ?>
<?php } ?>