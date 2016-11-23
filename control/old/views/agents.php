<?php
if($total_records == 0){
    echo $noRecords;
}else{
?>
<br />
<div align="right"><b>عدد الأعضاء : </b><span id="total_record"><?php echo $total_records?></span></div>
<table width="100%" align="center" class="table_title">
<th>id</th><th>الأسم</th><th style="width: 100px;">البريد الإليكتروني</th><th>التاريخ</th><th>العضوية</th><th>التفعيل</th><th>عقاراتهم</th><th>مراسله العضو</th><th>ايقاف</th><!--<th>حذف</th>-->
<?php foreach($records as $record){ ?>
<tr align="center" id="remove_record<?php echo $record['id']?>">
<td><?php echo $record['id']?></td>
<td><?php echo $record['username']?></td>
<td><?php echo $record['email']?></td>
<td align="center"><?php if($record['date']){echo Date::timestampToDayMonthYear($record['date']);}?></td>
<td><?php if($record['member'] == 2){echo 'شركة'.'&nbsp-&nbsp'.$record['cName'];}else{echo 'فرد';}?></td>
<td><?php if($record['activated'] == 1){echo 'مفعل';}else{echo '<a href="javascript:activate_record('.$record['id'].')" id="remove_record_icon'.$record['id'].'">غير مفعل</a>';}?></td>
<td><a href="contents.php?page=restates&agentId=<?php echo $record['id']?>">عقاراته (<?php echo $record['count']?>)</a></td>
<td><a href="contents.php?page=agentMail&agentId=<?php echo $record['id']?>">راسله</a></td>
<td><a href="javascript:block_record(<?php echo $record['id']?>, <?php if($record['block'] == 1){echo '0';}else{echo '1';}?>)" id="remove_record_icon<?php echo $record['id']?>"><?php if($record['block'] == 1){echo 'موقوف';}else{echo 'غير موقوف';}?></a></td>
<!--<td><a href="javascript:delete_record(<?php echo $record['id']?>);" id="remove_record_icon<?php echo $record['id']?>">حذف</a></td>-->
</tr>
<?php } ?>
</table>
<div class="pager" style="text-align: center;"><?php echo $pager?></div>
<?php } ?>

<script type="text/javascript">
function block_record(id, status){
    var id = id;
    var table = 'users';
    var status = status;
    //var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('هل أنت متأكد ؟');
    if(conf){
        $('#remove_record_icon'+id).hide();
        $('<img id="loading"  src="images/loading.gif" />').insertAfter('#remove_record_icon'+id);
        $.post('ajax/block.php', {id:id, table:table, status:status}, function(data){
            if(data){
                if(data == 0){
                    $('#loading').remove();
                    document.getElementById('#remove_record'+id).innerHTML = 'غير موقوف';
                }else{
                    $('#loading').remove();
                    document.getElementById('#remove_record'+id).innerHTML = 'موقوف';
                }
                //score = score-1;
                //document.getElementById('total_record').innerHTML = score;               
            }else{
                alert('Error, please try again');
            }
            //$('#loading').remove();
            //parent.Three.location.reload();

        });
        location.reload();
    }
}
</script>

<script type="text/javascript">
function activate_record(id){
    var id = id;
    var table = 'users';
    var status = '1';
    var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('هل أنت متأكد ؟');
    if(conf){
        $('#remove_record_icon'+id).hide();
        $('<img id="loading"  src="images/loading.gif" />').insertAfter('#remove_record_icon'+id);
        $.post('ajax/activate.php', {id:id, table:table, status:status}, function(data){
            if(data){
                <?php if($_GET['t'] == 1){ ?>
                $('#remove_record'+id).remove();
                score = score-1;
                document.getElementById('total_record').innerHTML = score;
                <?php } ?>
                //score = score-1;
                //document.getElementById('total_record').innerHTML = score;               
            }else{
                alert('Error, please try again');
            }
            $('#loading').remove();
            //parent.Three.location.reload();

        });
    }
}
</script>

<!--<script type="text/javascript">
function delete_record(id){
    var id = id;
    var table = 'cities';
    var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('هل أنت متأكد ؟ ملحوظة : سوف يتم حذف الأحياء والمناطق التابعة لهذه المحافظة أيضا');
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