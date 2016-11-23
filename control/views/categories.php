<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-6">
<a href="index.php?p=categoryAdd" class="btn btn-primary">اضافة قسم</a>
</div><!--end col12--->

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<table class="table table-bordered">
<tr class="text-center bg-primary">
<td>#</td>
<td>الأسم</td>
<td>المنيو</td>
<td>تعديل</td>
<td>حذف</td>
</tr>



<?php foreach($records as $record){ ?>
<tr id="remove_record<?php echo $record['id']?>">
	<td>
		 <?php echo $record['id']?>
	</td>
    <td>
		 <?php echo $record['name']?>
	</td>
    <td>
		 <?php if($record['menu']==1){echo 'مينو';}?>
	</td>
    <td class="center">
         <a href="index.php?p=categoryEdit&id=<?php echo $record['id']?>"  class="btn default btn-xs black">
         <img src="images/minus-circle.gif"/></a>
	</td>
	
	
    <?php if($_GET['d'] == 1){ ?>
    <td>
        <a href="javascript:redelete_record(<?php echo $record['id']?>);" id="remove_record_icon<?php echo $record['id']?>" class="btn default btn-xs black">
	    <i class="fa fa-undo"></i> Activate </a>
    </td>
    <?php }else{ ?>
	<td>
        <a href="javascript:delete_record(<?php echo $record['id']?>);" id="remove_record_icon<?php echo $record['id']?>" class="btn default btn-xs black">
	    <img src="images/cross-on-white.gif"/> </a>
    </td>
    <?php } ?>
</tr>
<?php } ?>


</table>
</div><!--end-col-12-->

</div><!--end row-->
</div>








<script type="text/javascript">
<?php if(strpos($premissions_str, 'userEdit')){ ?>
function saveNotes(id, name){
    var conf=confirm('Edit '+name+'?');
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
    var table = 'categories';
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
