<?php
if($total_records == 0){
    echo $noRecords;
}else{
?>
<br />
<div align="right"><b>عدد الأقسام : </b><span id="total_record"><?php echo $total_records?></span></div>
<table width="100%" align="center" class="table_title">
<th>id</th><th>الأسم</th><th>الأسم الانجليزي</th><th>تعديل</th><th>حذف</th>
<?php foreach($records as $record){ ?>
<tr align="center" id="remove_record<?php echo $record['id']?>">
<td><?php echo $record['id']?></td>
<td align="center"><?php echo $record['name']?></td>
<td align="center"><?php echo $record['name_en']?></td>
<td><a href="contents.php?page=subcategoryEdit&id=<?php echo $record['id']; ?>">تعديل</a></td>
<td><a href="javascript:delete_record(<?php echo $record['id']?>);" id="remove_record_icon<?php echo $record['id']?>">حذف</a></td>
</tr>
<?php } ?>
</table>
<div class="pager" style="text-align: center;"><?php echo $pager?></div>
<?php } ?>

<script type="text/javascript">
function delete_record(id){
    var id = id;
    var table = 'subcategories';
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
            parent.Three.location.reload();

        })
    }
}
</script>