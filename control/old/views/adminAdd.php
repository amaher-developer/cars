<div class="container">
<div class="row">

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<form action="" method="post">

    <label>إسم الموظف</label>
    يستخدم لتسجيل الدخول
    <input class="input-data" name="name" type="text" value="" placeholder="إسم الموظف"/>
    <div class="cleaner-h2"></div>

    <label>كلمة المرور</label>
أتركها فارغة لعدم تغييرها
    <input class="input-data" name="password" type="password" value="<?php echo $default['password']?>" placeholder="كلمة المرور"/>
    <div class="cleaner-h2"></div>


    <label>كلمة المرور مرة أخرى</label>
    <input class="input-data" name="repassword" type="password" value="<?php echo $default['repassword']?>" placeholder="اعد إدخال كلمة المرور مرة أخرى"/>
    <div class="cleaner-h2"></div>

    <label>التليفون</label>
    <input class="input-data" name="phone" type="text" value="" placeholder="التليفون"/>
    <div class="cleaner-h2"></div>

    <label>الوظيفة</label>
    <input class="input-data" name="job" type="text" value="" placeholder="الوظيفة"/>
    <div class="cleaner-h2"></div>

<label>الصلاحية</label>

    <select name="privilegeId">
        <option value="<?php echo $id?>">...</option>
        <option value="<?php echo $id?>">حسابات</option>
        <option value="<?php echo $id?>">نقلات</option>
        <option value="<?php echo $id?>">مدير</option>
    </select>
<div class="cleaner-h2"></div>

<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>