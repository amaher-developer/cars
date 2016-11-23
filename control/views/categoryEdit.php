<div class="container">
<div class="row">
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
<div class="col-lg-12">
<form action="" method="post"  enctype="multipart/form-data">

<label>كلمات بحث</label>
<input class="input-data" name="keywords" type="text" value="<?php echo $default['keywords']?>" />
<div class="cleaner-h2"></div>

<label>وصف بحث</label>
<input class="input-data" name="description" type="text" value="<?php echo $default['description']?>" />
<div class="cleaner-h2"></div>

<label>الاسم</label>
<input class="input-data" name="name" type="text" value="<?php echo $default['name']?>" placeholder="اسمك من فضلك"/>
<div class="cleaner-h2"></div>


<label>هل تريد ادراجها في القائمه الرئيسية</label>
<input name="menu" type="checkbox" <?php if($default['menu'] == 1){echo 'checked=""';}?> value="1"/>
<div class="cleaner-h2"></div>

<div class="cleaner-h2"></div>

<label>صوره معبره عن النشاط</label>
<input type="file" name="image"  />

<div class="cleaner-h2"></div>
<?php if($default['image']){ ?>
<img src="../dynamic/categories/<?php echo $default['image']?>" />
<div class="cleaner-h2"></div>
<?php } ?>

<label>صوره اللوجو الصغيره اللي في البحث</label>
<input type="file" name="logo"  />
<div class="cleaner-h2"></div>

<?php if($default['logo']){ ?>
<img src="../dynamic/categories/<?php echo $default['logo']?>" />
<div class="cleaner-h2"></div>
<?php } ?>

<label>الصوره الثابته</label>
<input type="file" name="dimage"  />
<div class="cleaner-h2"></div>

<?php if($default['dimage']){ ?>
<img src="../dynamic/categories/<?php echo $default['dimage']?>" />
<div class="cleaner-h2"></div>
<?php } ?>
<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>