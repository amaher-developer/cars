<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"
      xmlns="http://www.w3.org/1999/html">
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

    <label>النوع</label>
    <select name="type" >
        <option>أختر...</option>
        <option value="1" <?php if(1 == $default['type']){echo 'selected=""';} ?>>بيع</option>
        <option value="2" <?php if(2 == $default['type']){echo 'selected=""';} ?>>شراء</option>

    </select>
    <div class="cleaner-h2"></div>

    <label>المدينة</label>
    <select name="catId" >
        <option>أختر...</option>
        <?php foreach($cities as $city){ ?>
            <option value="<?php echo $city['id']?>" <?php if($city['id'] == $default['cityId']){echo 'selected=""';} ?>><?php echo $city['name']?></option>
        <?php } ?>
    </select>
    <div class="cleaner-h2"></div>

    <label>الحي</label>
    <select name="districtId" >
        <option>أختر...</option>
        <?php foreach($districts as $district){ ?>
            <option value="<?php echo $district['id']?>" <?php if($district['id'] == $default['districtId']){echo 'selected=""';} ?>><?php echo $district['name']?></option>
        <?php } ?>
    </select>
    <div class="cleaner-h2"></div>

    <label>الفئة</label>
    <select name="make" >
        <option>أختر...</option>
        <?php foreach($makes as $make){ ?>
            <option value="<?php echo $make['id']?>" <?php if($make['id'] == $default['make']){echo 'selected=""';} ?>><?php echo $make['name']?></option>
        <?php } ?>
    </select>
    <div class="cleaner-h2"></div>

    <label>الموديل</label>
    <select name="model" >
        <option>أختر...</option>
        <?php foreach($models as $model){ ?>
            <option value="<?php echo $model['id']?>" <?php if($model['id'] == $default['model']){echo 'selected=""';} ?>><?php echo $model['name']?></option>
        <?php } ?>
    </select>
    <div class="cleaner-h2"></div>

    <label>السنة</label>
    <select name="year" >
        <option>أختر...</option>
        <?php for($i=date('Y'); $i >= (date('Y')-94);$i--){ ?>
            <option value="<?php echo $i?>" <?php if($i == $default['year']){echo 'selected=""';} ?>><?php echo $i?></option>
        <?php } ?>
    </select>
    <div class="cleaner-h2"></div>

    <label>الموتور</label>
    <select name="motor" >
        <option>أختر...</option>
        <?php foreach($motors as $motor){ ?>
            <option value="<?php echo $motor['id']?>" <?php if($motor['id'] == $default['motor']){echo 'selected=""';} ?>><?php echo $motor['name']?></option>
        <?php } ?>
    </select>
    <div class="cleaner-h2"></div>

    <label>النمط</label>
    <select name="shap" >
        <option>أختر...</option>
        <?php foreach($shaps as $shap){ ?>
            <option value="<?php echo $shap['id']?>" <?php if($shap['id'] == $default['shap']){echo 'selected=""';} ?>><?php echo $shap['name']?></option>
        <?php } ?>
    </select>
    <div class="cleaner-h2"></div>

    <label>الكيلومتر</label>
    <input class="input-data" name="kilometer" type="text" value="<?php echo $default['kilometer']?>" placeholder="الكيلومتر"/>
    <div class="cleaner-h2"></div>


    <label>عدد الابواب</label>
    2 باب<input class="" name="door" type="radio" value="2" />
    4 باب<input class="" name="door" type="radio" value="4" />
    <div class="cleaner-h2"></div>


    <label>ناقل الحركة</label>
    اتوماتيك<input class="" name="gearbox" type="radio" value="1" />
    يدوي<input class="" name="gearbox" type="radio" value="2" />
    <div class="cleaner-h2"></div>



    <label>للبدل</label>
    <input class="" name="tradable" type="checkbox" <?php if($default['tradable']){echo 'checked=""';}?> value="1" />
    <div class="cleaner-h2"></div>


    <label>امكانيات اضافية</label>
    تكيف<input class="" name="aircondition" type="checkbox" <?php if($default['aircondition']){echo 'checked=""';}?> value="1" /><br/>
    زجاج كهربي<input class="" name="electricwindows" type="checkbox" <?php if($default['electricwindows']){echo 'checked=""';}?> value="1" /><br/>
    فتحه سقف<input class="" name="sunroof" type="checkbox" <?php if($default['sunroof']){echo 'checked=""';}?> value="1" /><br/>
    نظام فرامل ABS<input class="" name="ABS" type="checkbox" <?php if($default['ABS']){echo 'checked=""';}?> value="1" /><br/>
    سنتر لوك<input class="" name="centerlock" type="checkbox" <?php if($default['centerlock']){echo 'checked=""';}?> value="1" /><br/>
    انذار<input class="" name="alarm" type="checkbox" <?php if($default['alarm']){echo 'checked=""';}?> value="1" /><br/>
    مثبت سرعة<input class="" name="cruisecontrol" type="checkbox" <?php if($default['cruisecontrol']){echo 'checked=""';}?> value="1" /><br/>
    توزيع اليكتروني للفرامل EBD<input class="" name="EBD" type="checkbox" <?php if($default['EBD']){echo 'checked=""';}?> value="1" /><br/>
    باور<input class="" name="powerstearing" type="checkbox" <?php if($default['powerstearing']){echo 'checked=""';}?> value="1" /><br/>
    وسائد هوائية<input class="" name="airbags" type="checkbox" <?php if($default['airbags']){echo 'checked=""';}?> value="1" /><br/>
    راديو كاسيت<input class="" name="radiocassette" type="checkbox" <?php if($default['radiocassette']){echo 'checked=""';}?> value="1" /><br/>
    <div class="cleaner-h2"></div>

    <label>عنوان الأعلان</label>
    <input class="input-data" name="title" type="text" value="<?php echo $default['title']?>" placeholder="عنوان الاعلان"/>
    <div class="cleaner-h2"></div>

    <div class="cleaner-h2"></div>
    <label>تفاصيل الأعلان</label>
    <textarea class="input-data" name="content"/><?php echo $default['content']?></textarea>
    <div class="cleaner-h2"></div>

<label>السعر</label>
<input class="input-data" name="price" type="text" value="<?php echo ($default['price'])?>"  placeholder="سعر"/>
<div class="cleaner-h2"></div>

<label>الموبيل</label>
<input class="input-data" name="mobile" type="text" value="<?php echo ($default['mobile'])?>" placeholder="موبيل"/>
<div class="cleaner-h2"></div>


    <label>العنوان</label>
    <input class="input-data" name="address" type="text" value="<?php echo $default['address']?>" placeholder="عنوان"/>
    <div class="cleaner-h2"></div>

    <label>البريد الاليكتروني</label>
    <input class="input-data" name="email" type="email" value="<?php echo $default['email']?>" placeholder="بريد اليكتروني"/>
    <div class="cleaner-h2"></div>

    <label>صورة رئيسية</label>
    <input class="input-data" name="image" type="file" value="<?php echo $default['image']?>"/>
    <div class="cleaner-h2"></div>




<input type="submit" name="Submit" class="btn btn-success" value="حفظ" />
<input type="reset" name="Reset" class="btn btn-danger" value="تراجع" />

</form>
</div><!--end-col-12-->
</div><!--end row-->
</div>