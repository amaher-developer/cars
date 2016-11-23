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
<form class="add" action="" method="post"  enctype="multipart/form-data">

<div class="cleaner-h1"></div>

<label>الحالة</label>
<input type="checkbox" name="activate" value="1" <?php if($default['activate'] == 1){echo 'checked=""';}?> class="input-add"/>

<div class="cleaner-h1"></div>



<label>كلمات بحث</label>
<input class="input-data" name="keywords" type="text" value="<?php echo $default['keywords']?>" />
<div class="cleaner-h2"></div>

<label>وصف بحث</label>
<input class="input-data" name="description" type="text" value="<?php echo $default['description']?>" />
<div class="cleaner-h2"></div>


<label>نوع النشاط</label>
<select name="catId"  class="input-add">
<option>أختر</option>
<?php foreach($categories as $category){ ?>
<option value="<?php echo $category['id']?>" <?php if($category['id']==$default['catId']){echo 'selected=""';}?>><?php echo $category['name']?></option>
<?php } ?>
</select>
<label>المنطقة</label>
<select name="areaId"  class="input-add">
<option>أختر</option>
<?php foreach($areas as $area){ ?>
<option value="<?php echo $area['id']?>" <?php if($area['id']==$default['areaId']){echo 'selected=""';}?>><?php echo $area['name']?></option>
<?php } ?>
</select>

<label>اسم النشاط</label>
<input type="text" name="name" value="<?php echo $default['name']?>" class="input-add"/>

<label>العنوان</label>
<input type="text" name="address" value="<?php echo $default['address']?>" class="input-add"/>

<div class="cleaner-h1"></div>
<label>علامة مميزة</label>
<input type="text" name="sign" value="<?php echo $default['sign']?>" class="input-add"/>

<div class="cleaner-h1"></div>

<label>التفاصيل</label>
<input type="text" name="content" value="<?php echo $default['content']?>" class="input-add"/>

<div class="cleaner-h1"></div>

<label>التليفون</label>
<input type="text"  name="phone1" value="<?php echo $default['phone1']?>" class="input-add"/>
<input type="text"  name="phone2" value="<?php echo $default['phone2']?>" class="input-add"/>
<input type="text"  name="phone3" value="<?php echo $default['phone3']?>" class="input-add"/>

<div class="cleaner-h1"></div>

<label>الايميل الالكترونى <span>ان وجدت</span></label>
<input type="text" name="email" value="<?php echo $default['email']?>" class="input-add"/>

<div class="cleaner-h1"></div>

<label>الموقع الالكترونى <span>ان وجدت</span></label>
<input type="text" name="url" value="<?php echo $default['url']?>" class="input-add"/>

<div class="cleaner-h1"></div>

<label>صفحه الفيس بوك <span>ان وجدت</span></label>
<input type="text" name="facebook" value="<?php echo $default['facebook']?>" class="input-add"/>

<div class="cleaner-h1"></div>

<label>صورة النشاط الاساسية</label>
  <input type="file" name="image[]" value="" accept="image/*" >
  
<div class="cleaner-h1"></div>

<label>صور معبره عن النشاط</label>
  <?php for($i=0;$i<6;$i++){ ?>
  <input type="file" name="image[]" accept="image/*">
  <?php } ?>              
                <div class="cleaner-h3"></div>
             <div class="btnn">   
     <input type="submit" name="Submit" value="تعديل" class="btn btn-primary pull-left btn-add"/>
   


                </div>
</form>

<div class="cleaner-h3"></div>

<?php if($images){ ?>
<?php foreach($images as $image){ ?>
<div id="remove_record<?php echo $image['id']?>" style="display: block;float: right;"><img src="../dynamic/places/<?php echo $image['image']?>" width="150" height="150" style="padding-left: 10px;float: right;" />
<br /><a href="javascript::void(0)" id="remove_record_icon<?php echo $image['id']?>" onclick="delete_record(<?php echo $image['id']?>)">حذف</a>
</div>
<?php } } ?>

</div><!--end-col-12-->
</div><!--end row-->
</div>


<script>

function delete_record(id){
    var id = id;
    var table = 'images';
    //var score = parseInt(document.getElementById('total_record').innerHTML);    
    var conf = confirm('هل انت متأكد');
    
    if(conf){
        $('#remove_record_icon'+id).hide();
        $('<img id="loading"  src="images/loading.gif" />').insertAfter('#remove_record_icon'+id);
        $.post('ajax/delete.php', {id:id, table:table}, function(data){
            if(data){
                $('#remove_record'+id).remove();
                //score = score-1;
                //document.getElementById('total_record').innerHTML = score;                
            }else{
                alert('Error, please try again');
            }
            $('#loading').remove();
        })
    }
    
}
</script>