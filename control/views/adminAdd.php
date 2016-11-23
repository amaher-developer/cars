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
<div class="col-lg-12">
<form action="" method="post">
<label>الاسم</label>
<input class="input-data" name="name" type="text" value="<?php echo $default['name']?>" placeholder="اسمك من فضلك"/>
<div class="cleaner-h2"></div>
<label>البريد الإليكتروني</label>
<input class="input-data" name="email" type="email" value="<?php echo $default['email']?>" placeholder="بريدك الإليكتروني من فضلك"/>
<div class="cleaner-h2"></div>
<label>الموبيل</label>
<input class="input-data" name="mobile" type="text" value="<?php echo $default['mobile']?>" placeholder="موبيلك من فضلك"/>
<div class="cleaner-h2"></div>
<label>كلمة المرور</label>
<input class="input-data" name="password" type="password" placeholder="كلمة المرور من فضلك"/>
<div class="cleaner-h2"></div>

<label>نوع العضوية</label>
<select name="groupId" >
<option>أختر...</option>
<?php foreach($groups as $group){ ?>
<option value="<?php echo $group['id']?>" <?php if($group['id'] == $default['groupId']){echo 'selected=""';} ?>><?php echo $group['name']?></option>
<?php } ?>

</select>
<div class="cleaner-h2"></div>

<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>