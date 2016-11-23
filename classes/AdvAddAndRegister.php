<?php

/**
 * @author maher
 * @copyright 2014
 */

class AdvAddAndRegister extends FormProcessor{

    public function __construct(){
        $module = 'advAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        $cityId = $this->successfulProcessed['cityId'];
        $email = $this->successfulProcessed['email'];
        $password = $this->successfulProcessed['password'];
        $account_type = $this->successfulProcessed['account_type'];
        $company_url = $this->successfulProcessed['company_url'];
        $company_name = $this->successfulProcessed['company_name'];
        $company_address = $this->successfulProcessed['company_address'];
        $company_tel = $this->successfulProcessed['company_tel'];
        $company_mobile = $this->successfulProcessed['company_mobile'];
        $company_logo = $this->successfulProcessed['company_logo'];
        $company_catId = $this->successfulProcessed['company_catId'];
        $company_facebook = $this->successfulProcessed['company_facebook'];
        $company_twitter = $this->successfulProcessed['company_twitter'];
        $code = Random::alphanumeric();
        
        
        $activate = $this->successfulProcessed['activate'];
        $date = $this->successfulProcessed['date'];
        $udate = $this->successfulProcessed['udate'];
        $title = $this->successfulProcessed['title'];
        $content = $this->successfulProcessed['content'];
        
        $price = $this->successfulProcessed['price'];
        $car_motor = $this->successfulProcessed['car_motor'];
        $car_kilometer = $this->successfulProcessed['car_kilometer'];
        $car_model = $this->successfulProcessed['car_model'];
        $car_year = $this->successfulProcessed['car_year'];
        $re_sale_area = $this->successfulProcessed['re_sale_area'];
        $re_rent_area = $this->successfulProcessed['re_rent_area'];
        $re_rent_amenities = $this->successfulProcessed['re_rent_amenities'];
        $job_type = $this->successfulProcessed['job_type'];
        $job_education_level = $this->successfulProcessed['job_education_level'];
        $job_experience_level = $this->successfulProcessed['job_experience_level'];
        $catId = $this->successfulProcessed['catId'];
        $listingId = $this->successfulProcessed['listingId'];
        $cityId = $this->successfulProcessed['cityId'];
        $districtId = $this->successfulProcessed['districtId'];
        $mobile = $this->successfulProcessed['mobile'];
        $mobile_show = $this->successfulProcessed['mobile_show'];
        $email = $this->successfulProcessed['email'];
        

        Database::query('insert into users (cityId, email, password, account_type, company_catId, company_url, company_name, company_address, company_tel, company_mobile, company_facebook, company_twitter, company_logo, date, code)
                         value 
                         ("'.$cityId.'", "'.$email.'", "'.$password.'", "'.$account_type.'", "'.$company_catId.'", "'.$company_url.'", "'.$company_name.'", "'.$company_address.'", "'.$company_tel.'", "'.$company_mobile.'", "'.$company_facebook.'", "'.$company_twitter.'", "'.$company_logo.'", "'.time().'", "'.$code.'")');
        if(mysqli_affected_rows(Database::getConnection())){ 
            $_SESSION['userId'] = mysqli_insert_id(Database::getConnection());
            $_SESSION['register_success'] = 'true';
            
            $to = $email;  
            if($_GET['l'] != 'en'){
                $lang = 'en';
                $subject = 'سوق ماب - طلب أشتراك';
                $write = '<font color="#1898ae" face="Helvetica, Arial, sans-serif"><b>تم إستقبال طلب اشتراكك في سوق ماب بهذا البريد الإلكتروني<br />
                          لتأكيد حسابك، يرجى الضغط على هذا الرابط (اذا لم يعمل معك الرابط برجاء قم بنسخ الرابط وطبعه في مكان المخصص لروابط المواقع)<br /><br/>
                          <span style="display: none;font-size:0px;">ssss</span><a href="http://www.sooqmap.com/egypt/activate.php?email='.$email.'&code='.$code.'">http://www.sooqmap.com/egypt/activate.php?email='.$email.'&code='.$code.'</a><br/></b></font>';
            }else{
                $lang = 'en';
                $subject = 'Sooqmap - Registration request';
                $write = 'We received registration request in sooqmap.com by this email, To confirm your account, please click on this link<br /><br />
                          <a href="'.Globals::$siteURL.'activate.php?email='.$email.'&code='.$code.'" style="font-size:14px;">'.Globals::$siteURL.'activate.php?email='.$email.'&code='.$code.'</a><br /><br />
                          Verification is required to protect your email address from illegal use<br /><br /><br /><br />
                          Sooqmap team';
            }
            $message = $write;
            $form = new AgentMail();
            $form->addPredefined('l', $lang);
            $form->addPredefined('email', $to);
            $form->addPredefined('subject', $subject);
            $form->addPredefined('message', $message);
            $form->process($successMessage);         
            
            $_SESSION['reg_check'] = '<div class="success">تم التسجيل بنجاح, برجي الرجوع للبريد الإليكتروني لأتمام التسجيل</div>';
        }
        

        
        Database::query('insert into bezaat (userId, activate, date, udate, title, content, price, car_motor, car_kilometer, car_model, car_year, re_sale_area, re_rent_area, re_rent_amenities, job_type, job_education_level, job_experience_level , catId, listingId, cityId, districtId, mobile, mobile_show, email) 
                         value ("'.$_SESSION['userId'].'", "'.$activate.'", "'.$date.'", "'.$udate.'", "'.$title.'", "'.$content.'", "'.$price.'", "'.$car_motor.'", "'.$car_kilometer.'", "'.$car_model.'", "'.$car_year.'", "'.$re_sale_area.'", "'.$re_rent_area.'", "'.$re_rent_amenities.'",  "'.$job_type.'",  "'.$job_education_level.'",  "'.$job_experience_level.'",  "'.$catId.'",  "'.$listingId.'",  "'.$cityId.'", "'.$districtId.'", "'.$mobile.'", "'.$mobile_show.'", "'.$email.'")');
        
        $_SESSION['advId'] = mysqli_insert_id(Database::getConnection());
        $_SESSION['advAddCheck'] = true;
    }
    
    protected function createThumbnail($imageObject, $imageName, $folder){
        $saveThumbnail = $imageObject->saveWidthHeightRatio(
                $folder.'/thumb_'.$imageName.'.jpg',
                125,
                125  
        );

        return ($saveThumbnail);
    }
     
}
?>