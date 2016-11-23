<?php

/**
 * @author maher
 * @copyright 2012
 */

class Register extends FormProcessor{

    public function __construct(){
        if($_GET['p'] == 'register')
            $module = 'register';
        else if($_GET['p'] == 'placeAdd')
            $module = 'placeAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        $username = $this->successfulProcessed['username'];
        $email = $this->successfulProcessed['email'];
        $password = $this->successfulProcessed['password'];
        //$image = $this->successfulProcessed['image'];
        $code = $this->successfulProcessed['code'];
        
        Database::query('insert into users (email, username, password, code, date)
                         value 
                         ("'.$email.'", "'.$username.'", "'.$password.'", "'.$code.'", "'.time().'")');
        if(mysql_affected_rows()){         
            $to = $email;
            
            
            
            
            
            $subject = 'دليل عقارات : طلب أشتراك';
            $write = 'تم إستقبال طلب اشتراكك في دليل عقارات مصر بهذا البريد الإلكتروني<br />
                      لتأكيد حسابك، يرجى الضغط على هذا الرابط<br /><br />
                      <a href="http://www.dalilaqarat.com/activate.php?email='.$user['email'].'&code='.$user['code'].'" style="font-size:14px;">http://www.dalilaqarat.com/activate.php?email='.$user['email'].'&code='.$user['code'].'</a><br /><br />
                      التأكيد مطلوب لحماية عنوان بريدك الإلكتروني من الاستخدام غير القانوني<br /><br /><br /><br />
                      فريق دليل عقارات مصر';
                      
            $css = '<style>
                        table {
                        display: table;
                        border-collapse: separate;
                        border-spacing: 2px;
                        border-color: gray;
                        }
                        table[Attributes Style] {
                        width: 600px;
                        border-spacing: 0px;
                        background-color: rgb(24, 152, 174);
                        }
                        td, tr {
                            padding: 0px;
                        }
                        table {
                            font-family: Helvetica,Arial,sans-serif;
                            font-size: 12px;color: rgb(120, 120, 120);border-collapse: collapse;
                        }
                        table td {
                            border-collapse: collapse;
                        }
                        td, tr {
                            padding: 0px;
                        }
                        
                        a:link, a:visited, a:hover {
                            color: rgb(24, 152, 174);
                        }
                        a {
                            font-size: 16px;
                            text-decoration: none;
                            padding: 2px 0px;
                        }
                        a {
                            color: rgb(24, 152, 174);
                        }
                        div {
                        line-height: 24px;
                        }
                    </style>';    
        $main_header = '';
        $main_content = $write;    
        $message = $css.'
                <html>
                <head>
                <title>دليل عقارات</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                </head>
                <body>
                
                <table width="600" cellpadding="0" cellspacing="0" class="wrap header" align="center">
                        <tbody>
                <tr>
                <td valign="top" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                <td width="24" ="padd">
                &nbsp;
                </td>
                <!-- CONTENT start -->
                <td valign="middle" align="right" style="font-family: Georgia,"Times New Roman",Times,serif;
                                    font-style: italic;
                                    text-align: left;
                                    line-height: 14px;
                                    font-size: 14px;">
                <div>
                دليل عقارات مصر
                </div>
                </td>
                <td width="24" class="padd">
                &nbsp;
                </td>
                <td valign="top" align="right" style="padding-bottom: 10px;">
                <img src="http://www.dalilaqarat.com/images/email_logo.jpg" alt="" title="" width="190" height="48" border="0" style="max-width:264px;">
                </td>
                <!-- CONTENT end -->
                <td width="24" class="padd">
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                <table width="600" cellpadding="0" cellspacing="0" class="wrap" bgcolor="#20B6C7" align="center">
                <tbody>
                <tr>
                <td height="6" style="line-height:6px;font-size:6px;border-left:1px solid #20B6C7">
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                <table width="600" cellpadding="0" cellspacing="0" class="wrap body" align="center">
                <tbody>
                <tr height="24">
                <td style="border-left: 1px solid rgb(225, 225, 225);border-right: 1px solid rgb(225, 225, 225);" width="100%">
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                <!-- âº header block ends here -->
                <!-- Intro start -->
                <table width="600" cellpadding="0" cellspacing="0" class="wrap body" align="center">
                <tbody>
                <tr>
                <td width="24" class="padd bl" style="border-left: 1px solid rgb(225, 225, 225);">
                &nbsp;
                </td>
                <td valign="top" align="left">
                <!-- CONTENT start -->
                <div style="font-family: Helvetica,Arial,sans-serif;
                                    font-size: 30px;
                                    font-weight: bold;
                                    letter-spacing: -1px;
                                    margin-bottom: 22px;
                                    margin-top: 2px;
                                    line-height: 36px;float: right;
                                    text-align: right;
                                    color: #1898AE;">
                <div>
                '.$main_header.'
                </div>
                </div>
                <div style="float: right;
                                    text-align: right;
                                    color: #787878;font-family: Helvetica,Arial,sans-serif;
                                    font-size: 18px;
                                    letter-spacing: 0;
                                    margin-top: 2px;
                                    line-height: 20px;">
                <div>
                '.$main_content.'
                </div>
                </div>
                
                
                <!-- CONTENT end -->
                </td>
                <td width="24" class="padd br" style="border-right: 1px solid rgb(225, 225, 225);">
                &nbsp;
                </td>
                </tr>
                <tr>
                <td height="24" style="border-left: 1px solid rgb(225, 225, 225);border-right: 1px solid rgb(225, 225, 225);" colspan="3">
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                <!-- Intro end -->
                
                
                <!-- Footer start -->
                <table width="600" cellspacing="0" cellpadding="0" class="wrap footer" align="center">
                <tbody>
                <tr>
                <td valign="top" align="center">
                <table width="99%" height="2" cellpadding="0" cellspacing="0" style="background-color: #F8F8F8;
                                    border-left: 1px solid #E1E1E1;
                                    border-right: 1px solid #E1E1E1;
                                    border-bottom: 1px solid #E1E1E1;
                                    line-height: 1px;
                                    font-size: 1px;">
                <tbody>
                <tr height="2">
                <td width="100%" style="line-height:2px;font-size:2px;width:100%">
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                <table width="98%" height="2" cellpadding="0" cellspacing="0" style="background-color: #F8F8F8;
                                    border-left: 1px solid #E1E1E1;
                                    border-right: 1px solid #E1E1E1;
                                    border-bottom: 1px solid #E1E1E1;
                                    line-height: 1px;
                                    font-size: 1px;">
                <tbody>
                <tr height="2">
                <td width="100%" style="line-height:2px;font-size:2px;width:100%">
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                <table width="100%" cellpadding="0" cellspacing="0" class="o-fix" align="center">
                <tbody>
                <tr height="8">
                <td>
                </td>
                </tr>
                <tr>
                <td width="24" class="padd">
                &nbsp;
                </td>
                <!-- CONTENT start -->
                <td valign="top" align="left">
                <table width="360" cellpadding="0" cellspacing="0" align="right">
                <tbody>
                <tr>
                <td class="small m-b" align="right" valign="top">
                <div>
                <a href="http://www.dalilaqarat.com/add-estate.html"> أعلن معنا </a> | <a href="http://www.dalilaqarat.com/estates.html"> أحدث العقارات </a> | <a href="http://www.dalilaqarat.com/"> أبحث عن عقار </a>
                <!--<a href="http://rxa.li/skyline">
                Skyline Media
                </a>
                 as 
                <a href="#">
                some@example.com
                </a>
                .-->
                <br/>
                </div>
                <div style="padding-top: 10px;">
                © 2013 dalilaqarat.com, All rights reserved
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                <table width="168" cellpadding="0" cellspacing="0" align="lefts" align="center">
                <tbody>
                <tr>
                <td class="small social" align="left" valign="top">
                <div>
                <a href="https://facebook.com/dalilaqaratcom">
                <img src="http://www.dalilaqarat.com/images/facebook.png" alt="" title="" width="32" height="32" border="0" style="max-width:32px;max-height:32px;">
                </a>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                <!-- CONTENT end -->
                <td width="24" class="padd">
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <tr>
                <td height="24">
                </td>
                </tr>
                </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" style="margin-bottom:24px;" class="wrap">
                <tbody>
                <tr>
                <td>
                &nbsp;
                </td>
                </tr>
                </tbody>
                </table>
                <!-- Footer end -->
                
                </body>
                </html>
                ';
            
            
            
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            //$headers .= 'From: <webmaster@example.com>' . "\r\n";
            //$headers .= 'Cc: myboss@example.com' . "\r\n";
            $headers .= "From: ".Globals::$siteName.' <'.Globals::$siteEmail.'> '."\r\n";
            
            mail($to,$subject,$message,$headers);
            $_SESSION['reg_check'] = '<div class="success">تم التسجيل بنجاح, برجي الرجوع للبريد الإليكتروني لأتمام التسجيل</div>';
        }
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