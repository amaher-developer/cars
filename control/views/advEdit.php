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

<label>عنوان الأعلان</label>
<input class="input-data" name="title" type="text" value="<?php echo $default['title']?>" placeholder="عنوان الاعلان"/>
<div class="cleaner-h2"></div>

<label>تاريخ البداية</label>
<input class="input-data" name="dateFrom" type="text" value="<?php if($_POST['dateFrom']){echo $_POST['dateFrom']; }else{  echo date('m/d/Y', $default['dateFrom']);}?>" id="datepicker1" placeholder="dd/mm/YYYY"/>
<div class="cleaner-h2"></div>

<label>تاريخ النهاية</label>
<input class="input-data" name="dateTo" type="text" value="<?php if($_POST['dateTo']){echo $_POST['dateTo']; }else{ echo date('m/d/Y', $default['dateTo']);}?>" id="datepicker2" placeholder="dd/mm/YYYY"/>
<div class="cleaner-h2"></div>

<label>رابط الاعلان</label>
<input class="input-data" name="url" type="url" value="<?php echo $default['url']?>" placeholder="رابط الاعلان"/>
<div class="cleaner-h2"></div>


<label>القسم</label>
<select name="catId" >
<option>أختر...</option>
<?php foreach($categories as $cat){ ?>
<option value="<?php echo $cat['id']?>" <?php if($cat['id'] == $default['catId']){echo 'selected=""';} ?>><?php echo $cat['name']?></option>
<?php } ?>
</select>
<div class="cleaner-h2"></div>

<label>النوع</label>
<select name="typeId" >
<option>أختر...</option>
<?php foreach($advTypes as $type){ ?>
<option value="<?php echo $type['id']?>" <?php if($type['id'] == $default['typeId']){echo 'selected=""';} ?>><?php echo $type['name']?></option>
<?php } ?>
</select>
<div class="cleaner-h2"></div>

<label>الصوره</label>
<input type="file" name="image"  />
<div class="cleaner-h2"></div>

<?php if($default['image']){ ?>
<img src="../dynamic/ads/<?php echo $default['image']?>" />
<div class="cleaner-h2"></div>
<?php } ?>

<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>
