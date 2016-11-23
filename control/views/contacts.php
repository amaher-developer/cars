<div class="container">
<div class="row">
<div class="cleaner-h2"></div>

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<table class="table table-bordered">
<tr class="text-center bg-primary">
<td>#</td>
<td>بيانات</td>
<td>التاريخ</td>
<td>العنوان</td>
<td>المحتوي</td>
</tr>



<?php foreach($records as $record){ ?>
<tr id="remove_record<?php echo $record['id']?>">
	<td>
		 <?php echo $record['id']?>
	</td>
    <td>
		 <?php echo $record['name']?><br />
		 <?php echo $record['email']?><br />
		 <?php echo $record['phone']?><br />
	</td>
    <td>
		 <?php echo  Date::timestampToDayMonthYear($record['date'])?>
	</td>
    <td class="center">
         <?php echo  ($record['subject'])?>
	</td>
	
	
    
    <td>
        <?php echo  ($record['message'])?>
    </td>
    
</tr>
<?php } ?>


</table>
</div><!--end-col-12-->

</div><!--end row-->
</div>
