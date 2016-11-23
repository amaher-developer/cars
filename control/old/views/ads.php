<?php
if($total_records == 0){
    echo $noRecords;
}else{
?>
<br />
<div align="right"><b>عدد الاعلانات : </b><span id="total_record"><?php echo $total_records?></span></div>
<table width="100%" align="center" class="table_title">
<th>id</th><th>مقدمة الأعلان</th><th style="width: 100px;">التاريخ</th><?php if($_GET['agentId']){ ?><th>التفعيل</th><?php } ?><?php if($_GET['t'] == 1){echo '<th>عدد المشاهدات</th><th>الرابط للموقع</th>';}else{echo '<th>الحالة</th>';}?><?php if(!$_GET['agentId']){ ?><th>صاحب الاعلان</th><?php } ?><th>تعديل</th><th>حذف</th>
<?php foreach($records as $record){ ?>
<?php

$cat = Records::searchById($record['catId'], $categories);
$catId = $cat['id'];
$categoryName = $cat['name_en'];

$listing = Records::searchById($record['listingId'], $subcategories);
$listingId = $listing['id']; 
$listingName = $listing['name_en'];

?>
<?php $estate = mysqli_fetch_assoc(Database::query('select count(id) count, userId from bezaat where userId = "'.$record['userId'].'"'));?>
<tr align="center" id="total_record<?php echo $record['id']?>">
<td align="center"><?php echo $record['id']?></td>
<td align="center"><span title="<?php echo $record['content']?>"><?php echo $record['title']?></span></td>
<td align="center"><?php echo Date::timestampToDayMonthYear($record['udate'])?></td>
<?php if($_GET['t'] == 1){ ?>
<td align="center"><?php echo $record['views']?></td>
<td align="center"><a href="<?php echo Globals::$siteURL?>ar/<?php echo Records::strToURL($record['city'])?>/<?php echo Records::strToURL($categoryName)?>/<?php echo Records::strToURL($listingName)?>/adv/<?php echo $record['id']?>" target="_blank">الرابط</a></td>
<?php }else{ ?>
<td align="center"><span><?php echo $record['activate_resoan']?></span></td>
<?php } ?>
<?php if($_GET['userId']){ ?>
<td align="center"><?php if($record['activate'] == 1){ echo 'مفعل';}else{ echo 'غير مفعل';}?></td>
<?php } ?>
<?php if(!$_GET['userId']){ ?>
<td align="center"><a href="contents.php?page=ads&userId=<?php echo $record['userId']?>"><?php echo $record['email']?> (<?php echo $estate['count']?>)</a></td>
<?php } ?>
<td><a href="contents.php?page=advEdit&id=<?php echo $record['id']; ?>"><img src="images/edit_icon.png" class="edit_icon" id="edit_icon" /></a></td>
<td><a href="javascript:delete_record(<?php echo $record['id']?>);" id="remove_record_icon<?php echo $record['id']?>"><img src="images/delete_icon.png" class="delete_icon" id="delete_icon" /></a></td>
</tr>
<?php } ?>
</table>
<div class="pager" style="text-align: center;"><?php echo $pager?></div>
<?php } ?>
<script type="text/javascript">
function delete_record(id){
    var id = id;
    var table = 'bezaat';
    var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('هل أنت متأكد ؟');
    if(conf){
        $('#remove_record_icon'+id).hide();
        $('<img id="loading"  src="images/loading.gif" />').insertAfter('#remove_record_icon'+id);
        $.post('ajax/delete.php', {id:id, table:table}, function(data){
            if(data){
                $('#remove_record'+id).remove();
                score = score-1;
                document.getElementById('total_record').innerHTML = score;               
            }else{
                alert('Error, please try again');
            }
            $('#loading').remove();
        })
    }
}
</script>