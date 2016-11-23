<?php

class UserLogin extends FormProcessor{

    public function __construct(){
        $module = 'login';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        $email = $this->successfulProcessed['email'];
        //$id = $this->successfulProcessed['id'];
        $password = $this->successfulProcessed['password'];
        $user_cookie = $this->successfulProcessed['user_cookie'];
        
        $fetch = new User('select id, email, active, code, password from users');
        $fetch->addCondition('email = "'.strip_tags($email).'" and password = "'.strip_tags($password).'"');
        $fetch->prepare();
        $result = $fetch->getSingleRecord();
        if(!$result){
            $_SESSION['userLogin'] = 'false';
        }else{
            /*
            if($result['urlActivate'] == false){
                //$err[]= 'برجاء تأكيد البريد الإليكتروني اولا عن طريق رساله التأكيد'.'<Br/>'.'<span style="color:green;">'.'ملحوظه: تم ارسال رساله للبريدك الاليكتروني لتأكيده'.'</span>';
                $activated = true;
                $to = $email;  
                $subject = Globals::$siteName.' - Confirm email';
                $write = '
                          <a href="'.Globals::$siteURL.'activate.php?email='.$email.'&code='.$urlCode.'" style="font-size:14px;">'.Globals::$siteURL.'activate.php?email='.$email.'&code='.$urlCode.'</a><br /><br />
                          ';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                // More headers
                //$headers .= 'From: <webmaster@example.com>' . "\r\n";
                //$headers .= 'Cc: myboss@example.com' . "\r\n";
                $headers .= "From: ".Globals::$siteName.' <'.Globals::$siteEmail.'> '."\r\n";
                
                mail($to,$subject,$message,$headers);
                $_SESSION['errors']['login']['failure']['email'] = 'Please confirm your email through activation message';
            }else{
                */
                $_SESSION['user'] = $result;
                $_SESSION['userLogin'] = 'true';
                if($user_cookie == '1')
                    $_SESSION['set_cookie'] = '1';
            //}
        }   
    }
}
?>