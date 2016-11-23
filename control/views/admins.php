<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-6">
<a href="index.php?p=adminAdd" class="btn btn-primary">اضافة أدمن</a>
</div><!--end col12--->

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<table class="table table-bordered">
<tr class="text-center bg-primary">
<td>#</td>
<td>الأسم</td>
<?php if(strpos($premissions_str, 'adminEdit')){ ?>
<td>تعديل</td>
<td>حذف</td>
<?php } ?>
</tr>



<?php foreach($records as $record){ ?>
<tr id="remove_record<?php echo $record['id']?>">
	<td>
		 <?php echo $record['id']?>
	</td>
    <td>
		 <?php echo $record['name']?><br /><a href="mailto:<?php echo $record['email']?>?Subject=<?php echo Globals::$siteName?>" target="_top" style="font-weight: normal;color: #940808;"><?php echo $record['email']?></a>
         <br /><?php echo $record['group_name']?>
	</td>
	
    
    <?php if(strpos($premissions_str, 'adminEdit')){ ?>
    
	
	<td class="center">
         <?php if($record['id'] != 1){ ?>
         <a href="index.php?p=adminEdit&id=<?php echo $record['id']?>"  class="btn default btn-xs black">
         <img src="images/minus-circle.gif"/></a>
	   <?php } ?>
    </td>
	
	<td>
        
        <?php if($record['id'] != 1){ ?>
        <a href="javascript:delete_record(<?php echo $record['id']?>);" id="remove_record_icon<?php echo $record['id']?>" class="btn default btn-xs black">
	    <img src="images/cross-on-white.gif"/> </a>
        <?php } ?>
    </td>
    <?php } ?>
</tr>
<?php } ?>


</table>
</div><!--end-col-12-->

</div><!--end row-->
</div>








<script type="text/javascript">
<?php if(strpos($premissions_str, 'adminEdit')){ ?>
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
    //var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('Are you sure?');
    
    if(conf){
        $('#remove_record_icon'+id).hide();
        $('<img id="loading"  src="images/loading.gif" />').insertAfter('#remove_record_icon'+id);
        $.post('ajax/delete.php', {id:id, table:table}, function(data){
            if(data){
                $('#remove_record'+id).remove();
                //score = score-1;
                //document.getElementById('total_record').innerHTML = score;                
            }else{
                alert('Error, please try again');
            }
            $('#loading').remove();
        })
    }
    
}

<?php } ?>
</script>
