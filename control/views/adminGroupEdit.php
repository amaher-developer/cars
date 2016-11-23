<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-6">
<?php echo $title?>
</div><!--end col12--->

<?php if($errors){ ?>
<?php include 'includes/errors.php'?>
<?php } ?>
<?php if($success){ ?>
<?php include 'includes/success.php'?>
<?php } ?>


<div class="cleaner-h2"></div>
<form method="post" action="">

<div class="col-lg-12">
<input type="text" name="name" value="<?php echo $default['name']?>" placeholder="أدخل أسم العضوية" />
</div>

<div class="cleaner-h2"></div>

<div class="col-lg-12">
<table class="table table-bordered">
<tr class="text-center bg-primary">
<td>#</td>
<td>الأسم</td>
<td>أختيار</td>
</tr>


<?php $i = 1?>
<?php foreach($records as $key=>$val){ ?>
                                                                                        
                                            
											
<tr id="remove_record<?php echo $record['id']?>">
	<td>
		 <?php echo $i?>
	</td>
    <td>
		 <span id="page_<?php echo $i?>_2" <?php if(in_array($key, $premissions)){ ?>style="font-weight: 900;"<?php } ?>><?php echo $val?></span>
	</td>
	<td>
		 <input type="checkbox" name="permissions[]" onclick="change('page_<?php echo $i?>')" id="page_<?php echo $i?>" <?php if(in_array($key, $premissions)){echo 'checked=""';}?>  value="<?php echo $key?>"  />&nbsp;
	</td>
    
</tr>
<?php $i++;} ?>


</table>


<input type="submit"class="btn btn-success" value="تأكيد" />

</div><!--end-col-12-->
</form>
</div><!--end row-->
</div>







<script>

function change(id){
    if (document.getElementById(id).checked) {
        document.getElementById(id+'_2').style.fontWeight="900";
    } else {
        document.getElementById(id+'_2').style.fontWeight="";
    }
}


</script>