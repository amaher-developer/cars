<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-6">
<a href="index.php?p=advAdd" class="btn btn-primary">اضافة اعلان</a>
</div><!--end col12--->

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<table class="table table-bordered">
<tr class="text-center bg-primary">
<td>#</td>
<td>العنوان</td>
<td>الصوره</td>
<td>التاريخ</td>
<td>تعديل</td>
<td>حذف</td>
</tr>



<?php foreach($records as $record){ ?>
<tr id="remove_record<?php echo $record['id']?>">
	<td>
		 <?php echo $record['id']?>
	</td>
    <td>
		 <?php echo $record['title']?>
	</td>
    <td>
		 <img src="../dynamic/ads/<?php echo $record['image']?>" />
	</td>
    <td>
        <?php echo Date::timestampToDayMonthYear($record['dateFrom']).' ~ '.Date::timestampToDayMonthYear($record['dateTo'])?>
    </td>
    <td class="center">
         <a href="index.php?p=advEdit&id=<?php echo $record['id']?>"  class="btn default btn-xs black">
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


function delete_record(id){
    var id = id;
    var table = 'ads';
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
