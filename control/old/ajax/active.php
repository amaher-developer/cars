<?php 

include '../../prepare.php';
include '../../cash/car_models.php';
include '../../cash/car_motors.php';
include '../../cash/job_types.php';
include '../../cash/job_educations.php';
include '../../cash/job_experiences.php';
include '../../cash/categories.php';
include '../../cash/subcategories.php';

$bezaatId = strip_tags(trim((int)$_POST['id']));
if($bezaatId)
    $result = Database::query('update bezaat set udate = '.time().', expired = "0", activate = "1" where id = "'.$bezaatId.'"');

if($result){
    echo 'true';
    
    $fetch = new Adv('select a.*, b.id bId, b.name_en city from bezaat a left join cities b on a.cityId = b.id');
    $fetch->addCondition('a.id = "'.$bezaatId.'"');
    $fetch->prepare();
    $default = $fetch->getSingleRecord();
    
    $cat = Records::searchById($default['catId'], $categories);
    $catId = $cat['id'];
    $categoryName = $cat['name_en'];
    
    $listing = Records::searchById($default['listingId'], $subcategories);
    $listingId = $listing['id'];
    $listingName = $listing['name_en'];
    
    $email = $default['email'];

    $lang = 'ar';
    $subject = 'سوق ماب - تم تفعيل اعلانك';
    $message = '<font color="#1898ae" face="Helvetica, Arial, sans-serif"><b>مبروك, تم مراجعة وتفعيل اعلانك الذي تم اضافتة بواسطة هذا البريد الاليكتروني <br />
              يمكنك مشاهدة اعلانك عن طريق هذا الرابط<br /><br/>
              <span style="display: none;font-size:0px;">ssss</span><a href="http://www.sooqmap.com/egypt/ar/'.Records::strToURL($default['city']).'/'.Records::strToURL($categoryName).'/'.Records::strToURL($listingName).'/adv/'.$bezaatId.'">http://www.sooqmap.com/egypt/ar/'.Records::strToURL($default['city']).'/'.Records::strToURL($categoryName).'/'.Records::strToURL($listingName).'/adv/'.$bezaatId.'</a><br/></b></font>';
    $form = new AgentMail();
    $form->addPredefined('l', $lang);
    $form->addPredefined('email', $email);
    $form->addPredefined('subject', $subject);
    $form->addPredefined('message', ($message));
    $form->process($successMessage);
}else{
    echo 'false';
}

?>