<?php 



class UserForgotLogin extends FormProcessor{

    public function __construct(){
        $module = 'forgotPassword';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        $email = $this->successfulProcessed['email'];
        
        $fetch = new Agent('select id, email, password, activated, code from users');
        $fetch->addCondition('email = "'.strip_tags($email).'"');
        $fetch->prepare();
        $result = $fetch->getSingleRecord();
        if(!$result){
            if($_GET['l'] != 'en')
                $_SESSION['errors']['forgotPassword']['failure']['email'] = 'البريد الاليكتروني الذي ادخلته غير مسجل لدينا';
            else
                $_SESSION['errors']['forgotPassword']['failure']['email'] = 'E-mail address you entered is not exists in our database';
        }else{
            $to = $email;
            $subject = 'دليل عقارات : تفعيل البريدالإليكتروني';
            $message = '<p>'.$result['password'].'</p>';

            mail($to,$subject,$message,$headers);    
        }   
    }
}
?>