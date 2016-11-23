<?php
/**
 * @author maher
 * @copyright 2012
 */
class SendMail extends FormProcessor{
    public function __construct(){
            $module = '';
        parent::__construct($module);
    }
    protected function excuteQuery(){
        $to = $this->successfulProcessed['email'];
        $subject = $this->successfulProcessed['subject'];
        $write = $this->successfulProcessed['message'];
        $message = $write;
        //echo $to.$message.SITE_EMAIL;  
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        //$headers .= 'From: <webmaster@example.com>' . "\r\n";
        //$headers .= 'Cc: myboss@example.com' . "\r\n";
        $headers .= "From: ".SITE_NAME.' <'.SITE_EMAIL.'> '."\r\n";
        
        if(mail($to,$subject,$message,$headers))
            $_SESSION['send_mail_check'] = 'true';
    }
}
?>