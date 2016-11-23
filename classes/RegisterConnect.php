<?php

/**
 * @author maher
 * @copyright 2012
 */

class RegisterConnect extends FormProcessor{

    public function __construct(){
        if($_GET['p'] == 'register')
            $module = 'register';
        else if($_GET['p'] == 'birdAdd')
            $module = 'birdAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        $id = $this->successfulProcessed['id'];
        $username = $this->successfulProcessed['username'];
        $cityId = $this->successfulProcessed['cityId'];
        $member = $this->successfulProcessed['member'];
        $email = $this->successfulProcessed['email'];
        $url = $this->successfulProcessed['url'];
        $name = $this->successfulProcessed['name'];
        $address = $this->successfulProcessed['address'];
        $content = $this->successfulProcessed['content'];
        $mobile = $this->successfulProcessed['mobile'];
        $tel = $this->successfulProcessed['tel'];
        $password = $this->successfulProcessed['password'];
        $image = $this->successfulProcessed['image'];
        $code = $this->successfulProcessed['code'];                
        
        Database::query('insert into users_connect (cityId, email, username, member, name, address, content, mobile, tel, password, image, code, url, date)
                         value 
                         ("'.$cityId.'", "'.$email.'", "'.$username.'", "'.$member.'", "'.$name.'", "'.$address.'", "'.$content.'", "'.$mobile.'", "'.$tel.'", "'.$password.'", "'.$image.'", "'.$code.'", "'.$url.'", "'.time().'")');
                         
        if(mysql_affected_rows()){         
            $to = $email;
            $subject = 'دليل عقارات : تسجيل أشتراك';
            $write = 'لربط حسابك بحساب الفيسبوك الخاص بك .. يرجي الظغط علي الرابط التالي <br /><br />
                      <a href="http://www.dalilaqarat.com/factivate.php?email='.$email.'&code='.$code.'">http://www.dalilaqarat.com/factivate.php?email='.$email.'&code='.$code.'</a>
                     ';
            $message = '<p style="margin-right: 20px;font-size: medium;">'.$write.'</p>';
            /*
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            //$headers .= 'From: <webmaster@example.com>' . "\r\n";
            //$headers .= 'Cc: myboss@example.com' . "\r\n";
            $headers .= "From: ".Globals::$siteName.' <'.Globals::$siteEmail.'> '."\r\n";
            
            mail($to,$subject,$message,$headers);
            */
            $form = new AgentMail();
            $form->addPredefined('email', $to);
            $form->addPredefined('subject', $subject);
            $form->addPredefined('message', $message);
            $form->process($successMessage);
            
            $_SESSION['reg_check'] = '<div class="info">تم ربط حسابك بحساب الفيسبوك بنجاح, برجي الرجوع للبريد الإليكتروني لأتمام عملية الربط</div>';;
        }
    }
    
    protected function createThumbnail($imageObject, $imageName, $folder){
        $saveThumbnail = $imageObject->saveWidthHeightRatio(
                $folder.'/thumb_'.$imageName.'.jpg',
                75,
                75  
        );

        return ($saveThumbnail);
    }
     
}
?>