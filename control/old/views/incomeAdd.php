<div class="container">
<div class="row">

<div class="cleaner-h2"></div>
<div class="col-lg-12">
<form action="" method="post">

    <label>المبلغ</label>
    <input class="input-data" name="repassword" type="password" value="<?php echo $default['repassword']?>" placeholder="المبلغ"/>
    <div class="cleaner-h2"></div>

    <label>التاريخ الحقيقي</label>
    <input class="datepicker"  class="input-data" name="phone" type="text" value="" placeholder="التاريخ الحقيقي"/>
    <div class="cleaner-h2"></div>

    <label>التاريخ المالي (للعرض في التقارير الشهرية)</label>
    <input class="datepicker"  class="input-data" name="phone" type="text" value="" placeholder="التاريخ المالي"/>
    <div class="cleaner-h2"></div>

    <label>التفاصيل</label>
    <textarea class="input-data" ></textarea>
    <div class="cleaner-h2"></div>

<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>