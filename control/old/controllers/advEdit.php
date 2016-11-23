<?php
include '../cash/categories.php';
include '../cash/subcategories.php';

include '../cash/car_models.php';
include '../cash/car_motors.php';
include '../cash/job_types.php';
include '../cash/job_educations.php';
include '../cash/job_experiences.php';

include 'api/creat_thumb.php';


$id = intval($_GET['id']);

$fetch = new Adv();
$fetch->addCondition('id = "'.$id.'"');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$cat = Records::searchById($default['catId'], $categories);
$catId = $cat['id'];
$categoryName = $cat['name_en'];

$listing = Records::searchById($default['listingId'], $subcategories);
$listingId = $listing['id']; 
$listingName = $listing['name_en'];


$fetch = new Adv('select * from images');
$fetch->addCondition('bezaatId = "'.$default['id'].'"');
$fetch->prepare();
$images = $fetch->getRecordSet();

$fetch = new City();
$fetch->addCondition('countryId = "1"');
$fetch->addOrderBy('name asc');
$fetch->prepare();
$cities = $fetch->getRecordSet();



$fetch = new Adv();
$fetch->addCondition('id = "'.$id.'"');
$fetch->prepare();
$default = $fetch->getSingleRecord();

$fetch = new Agent('select id, email from users');
$fetch->addCondition('id = "'.$default['userId'].'"');
$fetch->prepare();
$agent = $fetch->getSingleRecord();


if($_POST['Submit']){
    
    /*
    $default = array(
                     'title' => '',
                     'content' => '',
                     'service_price' => '',
                     'item_price' => '',
                     'car_price' => '',
                     'car_motor' => '',
                     'car_kilometer' => '',
                     'car_model' => '',
                     'car_year' => '',
                     're_rent_price' => '',
                     're_rent_area' => '',
                     're_rent_amenities' => '',
                     're_sale_area' => '',
                     're_sale_price' => '',
                     'job_type' => '',
                     'job_salary' => '',
                     'job_education_level' => '',
                     'job_experience_level' => '',
                     'cityId' => '',
                     'districtId' => '',
                     'mobile' => '',
                     'mobile_show' => '',
                     );
    
    */
    $account = $_POST['account'];
    $account_type = (int)$_POST['account_type'];
    
    $amenities_to_string = '';
    $i = 1;
    if($_POST['amenities'] && is_array($_POST['amenities'])){
        foreach($_POST['amenities'] as $amenitie){
            if($i == 1)
                $amenities_to_string .= $amenitie;
            else
                $amenities_to_string .= '@'.$amenitie;
            $i++;
        }
    }
    
        
        
        $successMessage = 'Successfully Added';
        $form = new AdvEdit($id, $default);

        
        $form->addPredefined('activate', '1');
        $form->addPredefined('expired', '0');
        $form->addPredefined('udate', time());
        
        
        $form->addText('title', 'أدخل العنوان بشكل صحيح');
        $form->addText('content', 'أدخل المحتوي بشكل صحيح');
        
        if($category == 'items_for_sale'){
            $form->addText('price');
        }else if($category == 'cars'){
            $form->addText('price', 'أدخل السعر بشكل صحيح');
            $form->addNumber('car_motor', 'أختر سعة المحرك بشكل صحيح');
            $form->addNumber('car_kilometer', 'أدخل عدد الكيلومترات بشكل صحيح');
            $form->addNumber('car_model', 'أختر الموديل بشكل صحيح');
            $form->addNumber('car_year', 'أختر السنة بشكل صحيح');
        }else if($category == 'estates-for-sale'){
            $form->addText('price', 'أدخل السعر بشكل صحيح');
            $form->addNumber('re_sale_area', 'أدخل المساحة بشكل صحيح');
        }else if($category == 'estates-for-rent'){
            $form->addText('price', 'أدخل السعر بشكل صحيح');
            $form->addNumber('re_rent_area', 'أدخل المساحة بشكل صحيح');
            $form->addPredefined('re_rent_amenities', $amenities_to_string);
        }else if($category == 'jobs'){
            $form->addText('job_type', 'أختر نوع العمل بشكل صحيح');
            $form->addText('job_salary');
            $form->addNumber('job_education_level', 'أختر المستوي التعليمي بشكل صحيح');
            $form->addNumber('job_experience_level', 'أختر مستوي الخبرة بشكل صحيح');
        }else if($category == 'services'){
            $form->addText('price', 'أدخل السعر بشكل صحيح');
        }
        
        $form->addPredefined('catId', intval($_POST['catId']));
        $form->addPredefined('listingId', intval($_POST['listingId']));
        
        $form->addNumber('cityId', 'أختر المدينة بشكل صحيح');
        $form->addNumber('districtId', 'أختر الحي بشكل صحيح');
        $form->addText('mobile', 'أدخل رقم الموبيل بشكل صحيح');
        $form->addText('mobile_show');
        $form->addPredefined('email',  $agent['email']);
        
        
        
        $form->process($successMessage);
        
        if($default['activate'] == 0){
            $city = Records::searchById($default['cityId'], $cities);
            $cityId = $city['id'];
            $cityName = $city['name_en'];
            
            
            $fetch = new Agent('select id, email from users');
            $fetch->addCondition('id = "'.$default['userId'].'"');
            $fetch->prepare();
            $agent = $fetch->getSingleRecord();
            
            $email = $agent['email'];
        
            $lang = 'ar';
            $subject = 'سوق ماب - تم تفعيل اعلانك';
            $message = '<font color="#1898ae" face="Helvetica, Arial, sans-serif"><b>مبروك, تم مراجعة وتفعيل اعلانك الذي تم اضافتة بواسطة هذا البريد الاليكتروني <br />
                      يمكنك مشاهدة اعلانك عن طريق هذا الرابط<br /><br/>
                      <span style="display: none;font-size:0px;">ssss</span><a href="http://www.sooqmap.com/egypt/ar/'.Records::strToURL($cityName).'/'.Records::strToURL($categoryName).'/'.Records::strToURL($listingName).'/adv/'.$id.'">http://www.sooqmap.com/egypt/ar/'.Records::strToURL($cityName).'/'.Records::strToURL($categoryName).'/'.Records::strToURL($listingName).'/adv/'.$id.'</a><br/></b></font>';
            $form = new AgentMail();
            $form->addPredefined('l', $lang);
            $form->addPredefined('email', $agent['email']);
            $form->addPredefined('subject', $subject);
            $form->addPredefined('message', ($message));
            $form->process($successMessage);
        }
        
    /*
    if($_SESSION['advEditCheck']){
        if($_SESSION['upload_images']){
            foreach($_SESSION['upload_images'] as $image){
                if(file_exists('dynamic/images/'.$image)){
                    makeThumbnails('dynamic/images/', $image);
                    Database::query('insert into images (bezaatId, image) value ("'.$id.'", "'.$image.'")');    
                }
            }
        }
        unset($_SESSION['upload_images']);
        unset($_SESSION['advEditCheck']);
        
    }
    */
}

?>