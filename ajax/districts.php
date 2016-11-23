<?php
include '../prepare.php';
if($_POST['cityId']){
    $fetch = new District();
    $fetch->addCondition(' cityId = "'.intval($_POST['cityId']).'" ');
    $fetch->addOrderBy(' id asc ');
    $fetch->prepare();
    $districts = $fetch->getRecordSet();
?>
<?php if($districts){ ?>
<?php foreach($districts as $district){?>
<option value="<?php echo $district['id']?>"><?php echo $district['name']?></option>
<?php } ?>
<option value="">جميع المناطق</option>
<?php } ?>
<?php }else{ ?>
<option value="">جميع المناطق</option>
<?php } ?>