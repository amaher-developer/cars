<div class="container">
<div class="row">

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<form action="" method="post">


    <label>العميل</label>

    <select name="privilegeId">
        <option value="<?php echo $id?>">عميل ١</option>
        <option value="<?php echo $id?>">عميل ٢</option>
        <option value="<?php echo $id?>">عميل ٣</option>
    </select> <a href="index.php?p=clientAdd">إضافة عميل جديد</a>
    <div class="cleaner-h2"></div>

    <label>نوع النقلة</label>

    <select name="privilegeId">
        <option value="<?php echo $id?>">ربع نقل</option>
        <option value="<?php echo $id?>">كساحات</option>
        <option value="<?php echo $id?>">اتوبيس سياحي</option>
    </select>
    <div class="cleaner-h2"></div>

    <label>العدد</label>
    <input class="input-data" name="name" type="text" value="12" placeholder="العدد"/>
    <div class="cleaner-h2"></div>

    <label>من محافظة</label>

    <select name="privilegeId">
        <option value="<?php echo $id?>">القاهرة</option>
        <option value="<?php echo $id?>">الجيزة</option>
        <option value="<?php echo $id?>">الأسكندرية</option>
        <option value="<?php echo $id?>">الفيوم</option>
    </select>
    <div class="cleaner-h2"></div>

    <label>إلى محافظة</label>

    <select name="privilegeId">
        <option value="<?php echo $id?>">الجيزة</option>
        <option value="<?php echo $id?>">الأسكندرية</option>
        <option value="<?php echo $id?>">الفيوم</option>
    </select>
    <div class="cleaner-h2"></div>

<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>