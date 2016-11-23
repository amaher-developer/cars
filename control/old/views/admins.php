<script>
function adminDelete(id, name){
	var conf = confirm('هل انت متأكد أنك تريد حذف الموظف "'+name+'"؟');
	if(conf){
		location.href = "index.php?p=adminDelete&id="+id+"&returnTo=<?php echo $returnTo?>";
	}
}
</script>
<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-6 noPrint">
<a href="index.php?p=adminAdd" class="btn btn-primary">اضافة موظف</a>
</div><!--end col12--->

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<table class="table table-bordered">
<tr class="text-center bg-primary">
    <td>الأسم</td>
    <td>الوظيفة</td>
    <td>الصلاحية</td>
    <td>رقم التليفون</td>
    <td class="noPrint">تعديل</td>
<td class="noPrint">حذف</td>
</tr>



<?php //foreach($records as $record){ ?>
    <tr id="remove_record<?php echo $record['id']?>">

        <td align="center">
عبد الله عز الصاوي
        </td>
        <td align="center">
            المدير العام
        </td>
        <td align="center">
            مدير
        </td>

        <td align="center">
            01271737000
        </td>
        <td align="center" class="noPrint">
            <a href="index.php?p=adminEdit&id=<?php echo $record['id']?>"  class="btn default btn-xs black">
                تعديل</a>
        </td>
        <td align="center" class="noPrint">

            <a href="javascript:adminDelete('<?php echo $record['id']?>', '<?php echo addslashes($record['name'])?>');" class="btn default btn-xs black">
                <img src="img/cross-on-white.gif"/> </a>
        </td>
    </tr>

    <tr id="remove_record<?php echo $record['id']?>">

        <td align="center">
            موظف ١
        </td>
        <td align="center">
            محاسب
        </td>
        <td align="center">
            حسابات
        </td>

        <td align="center">
            01xxxxxxxxx
        </td>
        <td align="center" class="noPrint">
            <a href="index.php?p=adminEdit&id=<?php echo $record['id']?>"  class="btn default btn-xs black">
                تعديل</a>
        </td>
        <td align="center" class="noPrint">

            <a href="javascript:adminDelete('<?php echo $record['id']?>', '<?php echo addslashes($record['name'])?>');" class="btn default btn-xs black">
                <img src="img/cross-on-white.gif"/> </a>
        </td>
    </tr>
    <tr id="remove_record<?php echo $record['id']?>">

        <td align="center">
            موظف 2
        </td>
        <td align="center">
سائق
        </td>
        <td align="center">
نقلات
        </td>

        <td align="center">
            01xxxxxxxxx
        </td>
        <td align="center" class="noPrint">
            <a href="index.php?p=adminEdit&id=<?php echo $record['id']?>"  class="btn default btn-xs black">
                تعديل</a>
        </td>
        <td align="center" class="noPrint">

            <a href="javascript:adminDelete('<?php echo $record['id']?>', '<?php echo addslashes($record['name'])?>');" class="btn default btn-xs black">
                <img src="img/cross-on-white.gif"/> </a>
        </td>
    </tr>
    <?php //} ?>



</table>
</div><!--end-col-12-->

</div><!--end row-->
</div>








<script type="text/javascript">
<?php if(strpos($premissions_str, 'userEdit')){ ?>
function saveNotes(id, name){
    var conf=confirm('تعديل '+name+'؟');
    var notes = $('textarea#notes'+id).val();
    $('#save'+id).hide();
    $('<img src="images/loading.gif" id="loading" />').insertAfter('#save'+id);
    if(conf){
        $.post('ajax/notesEdit.php', {id:id, notes:notes}, function(data){
            if(data == 'error'){
                alert('Error, please try again later');
                $('#save'+id).show();
            }else{
                $('#notes'+id).val(data);
            }
                $('#loading').remove();
        })
    }

}
function enableSave(id){
    $('#save'+id).show();
}

function delete_record(id){
    var id = id;
    var table = 'admins';
    var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('Are you sure?');
    
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
function redelete_record(id){
    var id = id;
    var table = 'admins';
    var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('هل أنت متأكد؟');
    if(conf){
        $('#remove_record_icon'+id).hide();
        $('<img id="loading"  src="images/loading.gif" />').insertAfter('#remove_record_icon'+id);
        $.post('ajax/redelete.php', {id:id, table:table}, function(data){
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
function visible_record(id){
    var id = id;
    var table = 'admins';
    var visible = 't';
    $.post('ajax/visible.php', {id:id, table:table, visible:visible}, function(data){
        if(data){
            $('#visible_record'+id).replaceWith('<span id="invisible_record'+id+'"><i class="fa fa-circle"></i> <a href="javascript:invisible_record('+id+', '+"'"+table+"'"+');" class="btn default btn-xs black"> إخفاء؟</a></span>');             
        }else{
            alert('Error, please try again');
        }
    })
}

function invisible_record(id){
    var id = id;
    var table = 'admins';
    var visible = 'f'; 
    $.post('ajax/visible.php', {id:id, table:table, visible:visible}, function(data){
        if(data){
            $('#invisible_record'+id).replaceWith('<span id="visible_record'+id+'"><i class="fa fa-circle-o"></i> <a href="javascript:visible_record('+id+', '+"'"+table+"'"+');"  class="btn default btn-xs black"> إظهار؟</a></span>');
        }else{
            alert('Error, please try again');
        }
    })
}
<?php } ?>
</script>
