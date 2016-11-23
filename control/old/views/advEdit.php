<?php

if($default['cityId']){
    $fetch = new District();
    $fetch->addCondition('cityId = "'.$default['cityId'].'"');
    $fetch->prepare();
    $districts = $fetch->getRecordSet();  
}

?>
<!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">-->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>


<script type="text/javascript" src="../scripts/all.js"></script>
<style>
.hide {
    display: none!important;
}
.btn-lg {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.33;
    border-radius: 6px;
}
.btn-primary {
    color: #fff;
    background-color: #428bca;
    border-color: #357ebd;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}

img {
    vertical-align: middle;
}

.advAdd p, span{
    color:black !important;
}
.charlimitinfo  {
    width: 0%;
    float: left;
    font-size: 20px;
    margin-left: 30%;
    color: rgb(167, 164, 164) !important;
}
</style>

<table id="contactform">

				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery("#contactform").validate();
					});
				</script>
                
                
                <tr><td>
				
				
				
                <!--<p class="info_form">ضاعف فرصة ظهور إعلانك و إمكانية مشاهدته من قبل أكبر عدد ممكن من الزوار و ذلك بإدخالك لأكبر عدد من الحقول المتاحة ، كالسعر، و الصورة ، وغيرها.</p>-->
				<?php if(isset($success)) { ?>
                    <p class="success">تم التعديل بنجاح</p>
                <?php } ?>
				<?php if(isset($errors)) { //If errors are found ?>
					<p class="error">من فضلك صحح الأخطاء أدناه.</p>
				<?php } ?>
                
                
                <div id="uploaded_images" align="center">
                <?php if($images){ ?>
                <?php $t = 1?>
                <?php foreach($images as $image){ ?>
                <div  id='remove_record<?php echo $t?>' style='float:right;padding-left:10px;padding-bottom: 10px;'>
                <img src='../dynamic/images/thumb_<?php echo $image['image']?>' style='height:100px' class='img-thumbnail'/>
                <br/>
                <a href='javascript:delete_record("<?php echo $image['image']?>","<?php echo $t?>");'>
                <img src='../images/delete_icon.png' id='remove_record_icon<?php echo $t?>' style='float: right;padding-top: 10px;'/></a>
                </div>
                <?php $t++?>
                <?php } ?>
                <?php } ?>
                
                <?php if(isset($_SESSION['upload_images'])){ ?>
                <?php $i = 10?>
                <?php foreach($_SESSION['upload_images'] as $val){ ?>
                <div  id='remove_record<?php echo $i?>' style='float:right;padding-left:10px;padding-bottom: 10px;'>
                <img src='../dynamic/images/<?php echo $val?>' style='height:100px' class='img-thumbnail'/>
                <br/>
                <a href='javascript:delete_record("<?php echo $val?>","<?php echo $i?>");'>
                <img src='../images/delete_icon.png' id='remove_record_icon<?php echo $i?>' style='float: right;padding-top: 10px;'/></a>
                </div>
                <?php $i++?>
                <?php } ?>
                <?php } ?>
                </div>
                 <script type="text/javascript">
                
                    var Uploader = (function () {
                
                        jQuery('#upload_files').on('change', function () {
                            jQuery("#wait").removeClass('hide');
                            jQuery('#upload_files').parent('form').submit();
                        });
                
                        var fnUpload = function () {
                            jQuery('#upload_files').trigger('click');
                        }
                
                        var fnDone = function (data) {
                
                            var data = JSON.parse(data);
                            //alert(data);
                            if (typeof (data['error']) != "undefined") {
                                jQuery('#uploaded_images').html(data['error']);
                                jQuery('#upload_files').val("");
                                jQuery("#wait").addClass('hide');
                                return;
                            }
                            var image_count = $("#uploaded_images div").length;
                            var divs = [];
                            if(image_count >= 6){
                                alert('عذرا لا يمكن اضافة اكثر من 6 صور');
                            }else{
                                for (i in data) {
                                    divs.push("<div  id='remove_record" + (image_count) + "' style='float:right;padding-left:10px;padding-bottom: 10px;'><img src='" + data[i] + "' style='height:100px' class='img-thumbnail'><br/><a href='javascript:delete_record(\"" + data[i].replace("dynamic/images/","") + "\", " + (image_count) + ");'><img src='images/delete_icon.png' id='remove_record_icon" + (image_count) + "' style='float: right;padding-top: 10px;'/></a></div>");
                                }
                            }
                            jQuery('#uploaded_images').append(divs.join(""));
                            jQuery('#upload_files').val("");
                            jQuery("#wait").addClass('hide');
                        }
                
                        return {
                            upload: fnUpload,
                            done: fnDone
                        }
                
                    }());
                
                  </script>
                </td></tr></table>
                <hr />
                <table class="advAdd" id="contactform">
                <div id="reply" class="advAdd">
				<form name="advAdd" action="" method="post" id="" class="advAdd" style="float: right;width: 100%;" enctype="multipart/form-data">	
                    <tr><td></td><td><?php echo $cat['name'].', '.$listing['name']?></td></tr>
                    
                    <tr><td>
                    <label for="catId">قسم رئيسي</label>
					</td><td>
                    <div>
                        <select id="catId" name="catId" class="select required <?php if($errors['catId']){?>error<?php } ?>">
                             <option value="">اختر القسم</option>
                             <?php foreach($categories as $category){ ?>
                             <option value="<?php echo $category['id']?>"<?php if($default['catId'] == $category['id']){echo 'selected=""';}?>><?php echo $category['name']?></option>
                             <?php } ?>
                        </select>
                    </div>
                    </td></tr>
                    
                    <tr>
                    <td>
                    <label for="listingId">قسم فرعي</label>
					</td>
                    <td>
                    <div>
                        <select id="listingId" name="listingId" class="select required <?php if($errors['listingId']){?>error<?php } ?>">
                             <option value="">اختر القسم</option>
                             <?php foreach($subcategories as $subcategories){ ?>
                             <option value="<?php echo $subcategories['id']?>"<?php if($default['listingId'] == $subcategories['id']){echo 'selected=""';}?>><?php echo $subcategories['name']?></option>
                             <?php } ?>
                        </select>
                    </div>
                    </td></tr>
                    
                    <tr><td>
                    <label for="title">عنوان الإعلان</label>
                    </td>
                    <td>
                    <div>
                    <span id="charlimitinfo" class="charlimitinfo">100</span>
                    <input type="text" id="title" name="title" size="22"  value="<?php echo $default['title']?>" placeholder="" class="input required <?php if($errors['title']){?>error<?php } ?>"/>
                    <?php if($errors['title']){?>
                    <label for="title" class="error"><?php echo $errors['title']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    
                    <tr><td>
                    <label for="content">مواصفات الإعلان</label>
					</td><td>
                    <div>
                    <textarea id="content" name="content" cols="50"  rows="10" placeholder="" class="required <?php if($errors['content']){?>error<?php } ?>"><?php echo $default['content']?></textarea>
                    <?php if($errors['content']){?>
                    <label for="content" class="error"><?php echo $errors['content']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    
                    
                    <?php if($categoryName == 'items'){ ?>
                    <tr><td>
                    <label for="price">السعر</label>
					</td><td>
                    <div><input id="price" name="price" value="<?php echo $default['price']?>" placeholder="" class="input required <?php if($errors['price']){?>error<?php } ?>"/>
                    <?php if($errors['price']){?>
                    <label for="price" class="error"><?php echo $errors['price']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
					<?php } ?>
                    
                    <?php if($categoryName == 'cars'){ ?>
                    <tr><td>
                    <div><select id="car_motor" name="car_motor" class="select required <?php if($errors['car_motor']){?>error<?php } ?>">
                         <option value="">سعة المحرك</option>
                         <?php foreach($car_motors as $car_motor){ ?>
                         <option value="<?php echo $car_motor['id']?>"<?php if($default['car_motor'] == $car_motor['id']){echo 'selected=""';}?>><?php echo $car_motor['name']?></option>
                         <?php } ?>
                         </select></div>
                    </td></tr>
                    
                    <tr><td>
                    <label for="car_kilometer">عدد الكيلومترات</label>
					</td><td>
                    <div><input type="number" id="car_kilometer" name="car_kilometer" value="<?php echo $default['car_kilometer']?>" placeholder="" class="input required digits <?php if($errors['car_kilometer']){?>error<?php } ?>"/>
                    <?php if($errors['car_kilometer']){?>
                    <label for="car_kilometer" class="error"><?php echo $errors['car_kilometer']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    
                    <tr><td></td><td>
                    <div><select id="car_model" name="car_model"  class="select required <?php if($errors['car_model']){?>error<?php } ?>">
                         <option value="">موديل</option>
                         <?php foreach($car_models as $car_model){ ?>
                         <option value="<?php echo $car_model['id']?>"<?php if($default['car_model'] == $car_model['id']){echo 'selected=""';}?>><?php echo $car_model['name']?></option>
                         <?php } ?>
                         </select></div>
                    </td></tr>
                    
                    <tr><td></td><td>
                    <div><select id="car_year" name="car_year"  class="select required <?php if($errors['car_year']){?>error<?php } ?>">
                         <option value="">السنة</option>
                         <?php for($i=date('Y'); $i >= (date('Y')-94);$i--){ ?>
                         <option value="<?php echo $i?>"<?php if($default['car_year'] == $i){echo 'selected=""';}?>><?php echo $i?></option>
                         <?php } ?>
                         </select></div>
                    </td></tr>
                    
                    <tr><td>
                    <label for="price">السعر</label>
					</td><td>
                    <div><input type="number" id="price" name="price" value="<?php echo $default['price']?>" class="input required digits <?php if($errors['price']){?>error<?php }?>" placeholder=""/>
                    <?php if($errors['price']){?>
                    <label for="price" class="error"><?php echo $errors['price']?></label>
                    <?php } ?>
                    </div>
                    <?php } ?>
                    </td></tr>
                    
                    <?php if($categoryName == 'estates for rent'){ ?>
                    <tr><td>
                    <label for="re_rent_amenities">الكماليات</label>
					</td><td>
                    <div>
                    <?php if($default['re_rent_amenities']){$amenities = explode('@', $default['re_rent_amenities']);}?>
                    <ul style="float: right;list-style-type: none;width: 30%;">
                    <li><input type="checkbox" name="amenities[]" value="1" <?php if($default['re_rent_amenities'] && in_array('1', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">بلكونة</span></li>
                    <li><input type="checkbox" name="amenities[]" value="2" <?php if($default['re_rent_amenities'] && in_array('2', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">تدفئة وتكيف مركزي</span></li>
                    <li><input type="checkbox" name="amenities[]" value="3" <?php if($default['re_rent_amenities'] && in_array('3', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">مسموح بالحيوانات الإليفة</span></li>
                    <li><input type="checkbox" name="amenities[]" value="4" <?php if($default['re_rent_amenities'] && in_array('4', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">جاكوزي خاص</span></li>
                    <li><input type="checkbox" name="amenities[]" value="5" <?php if($default['re_rent_amenities'] && in_array('5', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">جمنازيوم مشترك</span></li>
                    <li><input type="checkbox" name="amenities[]" value="6" <?php if($default['re_rent_amenities'] && in_array('6', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">غرفة مكتب</span></li>
                    </ul>
                    <ul style="float: right;list-style-type: none;width: 30%;">
                    <li><input type="checkbox" name="amenities[]" value="7" <?php if($default['re_rent_amenities'] && in_array('7', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">أجهزة مطبخ</span></li>
                    <li><input type="checkbox" name="amenities[]" value="8" <?php if($default['re_rent_amenities'] && in_array('8', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">موقف سيارات</span></li>
                    <li><input type="checkbox" name="amenities[]" value="9" <?php if($default['re_rent_amenities'] && in_array('9', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">حديقة خاصة</span></li>
                    <li><input type="checkbox" name="amenities[]" value="10" <?php if($default['re_rent_amenities'] && in_array('10', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">حمام سباحة خاص</span></li>
                    <li><input type="checkbox" name="amenities[]" value="11" <?php if($default['re_rent_amenities'] && in_array('11', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">حمام سباحة مشترك</span></li>
                    <li><input type="checkbox" name="amenities[]" value="12" <?php if($default['re_rent_amenities'] && in_array('12', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">غرفة ملابس</span></li>
                    </ul>
                    <ul style="float: right;list-style-type: none;width: 30%;">
                    <li><input type="checkbox" name="amenities[]" value="13" <?php if($default['re_rent_amenities'] && in_array('13', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">مجهزة بخزائن الملابس</span></li>
                    <li><input type="checkbox" name="amenities[]" value="14" <?php if($default['re_rent_amenities'] && in_array('14', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">غرفة خدم</span></li>
                    <li><input type="checkbox" name="amenities[]" value="15" <?php if($default['re_rent_amenities'] && in_array('15', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">جمنازيوم خاص</span></li>
                    <li><input type="checkbox" name="amenities[]" value="16" <?php if($default['re_rent_amenities'] && in_array('16', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">أمن</span></li>
                    <li><input type="checkbox" name="amenities[]" value="17" <?php if($default['re_rent_amenities'] && in_array('17', $amenities)){ echo 'checked=""'; }?> style="width: inherit;"/>&nbsp;&nbsp;<span for="">نادي صحي مشترك</span></li>
                    </ul>
                    </div>
                    <div style="float: none;clear: both;"></div>
                    <label for="re_rent_area">المساحة (م2)</label>
					<div><input type="number" id="re_rent_area" name="re_rent_area" value="<?php echo $default['re_rent_area']?>" class="input required digits <?php if($errors['re_rent_area']){?>error<?php }?>" placeholder=""/>
                    <?php if($errors['re_rent_area']){?>
                    <label for="re_rent_area" class="error"><?php echo $errors['re_rent_area']?></label>
                    <?php } ?>
                    </div>
                    <label for="price">السعر</label>
					<div><input type="number" id="price" name="price" value="<?php echo $default['price']?>" class="input required digits <?php if($errors['price']){?>error<?php }?>" placeholder=""/>
                    <?php if($errors['price']){?>
                    <label for="price" class="error"><?php echo $errors['price']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    <?php } ?>
                    
                    <?php if($categoryName == 'estates for sale'){ ?>
                    <tr><td>
                    <label for="re_sale_area">المساحة (م2)</label>
					</td><td>
                    <div><input type="number" id="re_sale_area" name="re_sale_area" value="<?php echo $default['re_sale_area']?>" class="input required digits <?php if($errors['re_sale_area']){?>error<?php }?>" placeholder=""/>
                    <?php if($errors['re_sale_area']){?>
                    <label for="re_sale_area" class="error"><?php echo $errors['re_sale_area']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    
                    <tr><td>
                    <label for="price">السعر</label>
					</td><td>
                    <div><input id="price" name="price" value="<?php echo $default['price']?>" placeholder="" class="input"/>
                    <?php if($errors['price']){?>
                    <label for="price" class="error"><?php echo $errors['price']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    <?php } ?>
                    
                    <?php if($categoryName == 'jobs'){ ?>
                    <tr><td></td><td>
                    <div><select id="job_type" name="job_type"  class="select required <?php if($errors['job_type']){?>error<?php } ?>">
                         <option value="">نوع العمل</option>
                         <?php foreach($job_types as $job_type){ ?>
                         <option value="<?php echo $job_type['id']?>"<?php if($default['job_type'] == $job_type['id']){echo 'selected=""';}?>><?php echo $job_type['name']?></option>
                         <?php } ?>
                         </select></div>
                    </td></tr>
                    
                    <tr><td>
                    <label for="job_salary">الراتب</label>
					</td><td>
                    <div><input type="number" id="job_salary" name="job_salary"  value="<?php echo $default['job_salary']?>" placeholder="" class="input"/>
                    <?php if($errors['job_salary']){?>
                    <label for="job_salary" class="error"><?php echo $errors['job_salary']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    
                    <tr><td></td><td>
                    <div><select id="job_education_level" name="job_education_level"  class="select required <?php if($errors['job_education_level']){?>error<?php } ?>">
                         <option value="">المستوي التعليمي</option>
                         <?php foreach($job_educations as $job_education){ ?>
                         <option value="<?php echo $job_education['id']?>"<?php if($default['job_education_level'] == $job_education['id']){echo 'selected=""';}?>><?php echo $job_education['name']?></option>
                         <?php } ?>
                         </select></div>
                    </td></tr>
                    
                    <tr><td></td><td>
                    <div><select id="job_experience_level" name="job_experience_level"  class="select required <?php if($errors['job_experience_level']){?>error<?php } ?>">
                         <option value="">مستوي الخبرة</option>
                         <?php foreach($job_experiences as $job_experience){ ?>
                         <option value="<?php echo $job_experience['id']?>"<?php if($default['job_experience_level'] == $job_experience['id']){echo 'selected=""';}?>><?php echo $job_experience['name']?></option>
                         <?php } ?>
                         </select></div>
                    <?php } ?>
                    </td></tr>
                    <?php if($categoryName == 'services'){ ?>
                    <tr><td>
                    <label for="price">السعر</label>
					</td><td>
                    <div><input type="number" id="price" name="price" value="<?php echo $default['price']?>" class="input required digits <?php if($errors['price']){?>error<?php } ?>" placeholder=""/>
                    <?php if($errors['price']){?>
                    <label for="price" class="error"><?php echo $errors['price']?></label>
                    <?php } ?>
                    </div>
                    </td></tr>
                    <?php } ?>
                    
                    <tr><td></td><td>
                    <div><select id="cityId" name="cityId" class="select required <?php if($errors['cityId']){?>error<?php } ?>"><option value="">أختر مدينتك</option>
                    <?php foreach($cities as $city){ ?>
                    <option value="<?php echo $city['id']?>" <?php if($default['cityId'] == $city['id']){echo 'selected=""';}?>><?php echo $city['name']?></option>
                    <?php } ?>
                    </select></div>
                    </td></tr>
                    <tr><td></td><td>
                    <div>
                    <select id="districtId" name="districtId" class="select required <?php if($errors['districtId']){?>error<?php } ?>">
                    <?php if($districts){ ?><?php foreach($districts as $district){ ?><option value="<?php echo $district['id']?>" <?php if($default['districtId'] == $district['id']){ echo 'selected=""';}?>><?php echo $district['name']?></option><?php } ?><?php } ?>
                    </select></div>
                    </td></tr>
                    
                    <tr><td>
                    <label for="mobile">رقم موبيلك</label>
                    </td><td>
                    <div><input type="text" id="mobile" name="mobile" size="22" placeholder="" value="<?php echo $default['mobile']?>" class="input required <?php if($errors['mobile']){?>error<?php } ?>"/>
                    <?php if($errors['mobile']){?>
                    <label for="mobile" class="error"><?php echo $errors['mobile']?></label>
                    <?php } ?>
                    </div>
                    <div><input type="checkbox" id="mobile_show" name="mobile_show" value="1" <?php if($default['mobile_show'] == 1){ ?>checked=""<?php } ?> style="width: inherit;"/>&nbsp;&nbsp;<span for="mobile_show">أظهار رقم موبيلك في الأعلان</span></div>
                    </td></tr>
                    
                    
					<tr><td></td><td><div><input type="submit" value="أنشر إعلاني" name="Submit" class="submit button"  /></div></td></tr>
				    <?php if($default['activate'] == 0){?>
                    <tr><td colspan="2"><br /><hr/><br /></td></tr>
                    <tr><td></td><td><p class="warning_form">هذا الأعلان منتهي للتجديد <a href="javascript::void(0);" onclick="active(<?php echo $default['id']?>); return false;" id="reactive_button<?php echo $default['id']?>">اضغط هنا</a></p></td></tr>
                    <?php } ?>
                </form>
                </div>
                </table>

<script type="text/javascript">
$('#districts').load('<?php echo Globals::$siteURL?>/ajax/districts.php').show();
$(document).ready(function(){
   
    $('#cityId').change(function(){
        var cityId = $('#cityId').val();
        //alert(cityId);
        if(cityId){
            $.post('<?php echo Globals::$siteURL?>/ajax/districts.php', { cityId: cityId }, 
            function(result){
               $('#districtId').html(result).show();
               $('#districtId').show(); 
            });       
        }
    
    });
});

function delete_record(image, id){        
    var image = image;
    var id = id;
    var conf = confirm('هل أنت متأكد ؟');
    if(conf){
        $('#remove_record_icon'+id).hide();
        $('<img id="loading"  src="images/loading_icon2.gif" style="float: right;padding-top: 10px;" />').insertAfter('#remove_record_icon'+id);
        $.post('../ajax/delete_image.php', {image:image}, function(data){
            //alert(data);
            if(data){
                $('#remove_record'+id).remove();            
            }else{
                alert('خطأ, برجاء المحاولة وقت أخر');
            }
            $('#loading').remove();
        })
    }
}

function active(id){
    var id = id;
    $('#reactive_button'+id).hide();
    $('<img id="loading"  src="../images/loading_icon2.gif" />').insertAfter('#reactive_button'+ id);
    $.post('ajax/active.php', {id:id}, function(data){
        if(data){
            if(data.trim().toString() == 'true'){
                $('#loading').remove();
                $('<strong><img src="../images/trueIcon.gif" />&nbsp;&nbsp;تم التجديد</strong>').insertAfter('#reactive_button'+id);
                alert('مبروك, تم تجديد الأعلان لثلاثة أشهر أخري');
            }else{
                alert(data);
                $('#loading').remove();
                $('#reactive_button'+id).show();  
            }              
        }else{
            alert('خطأ, يرجي المحاولة مرة أخري');
            $('#loading').remove();
            $('#reactive_button'+id).show();  
        }
    });
    //$('#myForm1').load('ajax/login.php');
    return false;
}
</script>


