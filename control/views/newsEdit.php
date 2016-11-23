<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker1" ).datepicker();
$( "#datepicker2" ).datepicker();
});
</script>

<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-6">
<?php echo $title?>
</div><!--end col12--->

<div class="cleaner-h2"></div>
<?php if($errors){ ?>
<?php include 'includes/errors.php'?>
<?php } ?>
<?php if($success){ ?>
<?php include 'includes/success.php'?>
<?php } ?>

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<form action="" method="post"  enctype="multipart/form-data">

<label>عنوان الخبر</label>
<input class="input-data" name="title" type="text" value="<?php echo $default['title']?>" placeholder="عنوان الخبر"/>
<div class="cleaner-h2"></div>


<label>محتوي الخبر</label>
<textarea class="input-data" name="content"><?php echo $default['content']?></textarea>
<div class="cleaner-h2"></div>

<label>تاريخ الخبر</label>
<input class="input-data" name="date" type="text" value="<?php if($_POST['date']){echo $_POST['date']; }else{  echo date('m/d/Y', $default['date']);}?>" id="datepicker1" placeholder="dd/mm/YYYY"/>
<div class="cleaner-h2"></div>


<label>رابط الخبر</label>
<input class="input-data" name="url" type="url" value="<?php echo $default['url']?>" placeholder="رابط الاعلان"/>
<div class="cleaner-h2"></div>


<label>الصوره</label>
<input type="file" name="image"  />
<div class="cleaner-h2"></div>

<?php if($default['image']){ ?>
<img src="../dynamic/news/<?php echo $default['image']?>" />
<div class="cleaner-h2"></div>
<?php } ?>

<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>
