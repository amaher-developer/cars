<?php

/**
 * @author maher
 * @copyright 2014
 */

class AdvAddAndLogin extends FormProcessor{

    public function __construct(){
        $module = 'advAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        $email = $this->successfulProcessed['email'];
        $password = $this->successfulProcessed['password'];
        $user_cookie = $this->successfulProcessed['user_cookie'];
        
        
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
        
        
        
        
        
        $fetch = new Agent('select id, email, activated, activated_message, code from users');
        $fetch->addCondition('email = "'.strip_tags($email).'" and password = "'.strip_tags($password).'"');
        $fetch->prepare();
        $result = $fetch->getSingleRecord();
        if($result['activated'] == 0 && $result['activated_message'] <= 5){
            $to = $email;
            if($_GET['l'] != 'en'){
                $lang = 'ar';
                $subject = 'سوق ماب - تفعيل البريدالإليكتروني';
                $write = 'لتفعيل البريد الإليكتروني أضغط علي الرابط التالي <br /><br />
                          <a href="http://www.sooqmap.com/egypt/activate.php?email='.$email.'&code='.$result['code'].'">http://www.sooqmap.com/egypt/activate.php?email='.$email.'&code='.$result['code'].'</a>
                         ';
            }else{
                $lang = 'en';
                $subject = 'Sooqmap - Email activation';
                $write = 'To activate your email on sooqmap.com,Please click on the following link <br /><br />
                          <a href="http://www.sooqmap.com/activate.php?email='.$email.'&code='.$result['code'].'">http://www.sooqmap.com/egypt/activate.php?email='.$email.'&code='.$result['code'].'</a>
                         ';
            }
            $message = $write;
            
            $form = new AgentMail();
            $form->addPredefined('l', $lang);
            $form->addPredefined('email', $email);
            $form->addPredefined('subject', $subject);
            $form->addPredefined('message', $message);
            $form->process($successMessage);
            
            Database::query('update users set activated_message = activated_message + 1 where id = "'.$result['id'].'"');
            
        } 
        $_SESSION['userId'] = $result['id'];
        $_SESSION['userLogin'] = 'true';
        if($user_cookie == '1')
            $_SESSION['set_cookie'] = '1';
        
        Database::query('insert into bezaat (userId, activate, date, udate, title, content, price, car_motor, car_kilometer, car_model, car_year, re_sale_area, re_rent_area, re_rent_amenities, job_type, job_education_level, job_experience_level , catId, listingId, cityId, districtId, mobile, mobile_show, email) 
                     value ("'.$_SESSION['userId'].'", "'.$activate.'", "'.$date.'", "'.$udate.'", "'.$title.'", "'.$content.'", "'.$price.'", "'.$car_motor.'", "'.$car_kilometer.'", "'.$car_model.'", "'.$car_year.'", "'.$re_sale_area.'", "'.$re_rent_area.'", "'.$re_rent_amenities.'",  "'.$job_type.'",  "'.$job_education_level.'",  "'.$job_experience_level.'",  "'.$catId.'",  "'.$listingId.'",  "'.$cityId.'", "'.$districtId.'", "'.$mobile.'", "'.$mobile_show.'", "'.$email.'")');
    
        $_SESSION['advId'] = mysqli_insert_id(Database::getConnection());
        $_SESSION['advAddCheck'] = true;
        
    }
     
}
?>