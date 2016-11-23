<?php

/**
 * @author maher
 * @copyright 2012
 */

class AgentMail extends FormProcessor{

    public function __construct(){
            switch ($_GET['p']){
                case 'register':
                    $module = 'register';
                break;
                case 'advAdd':
                    $module = 'advAdd';
                break;
                case 'login':
                    $module = 'login';
                break;
                case 'forgotPassword':
                    $module = 'forgotPassword';
                default:
                    $module = '';
                
            }
            
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        $to = $this->successfulProcessed['email'];
        $lang = $this->successfulProcessed['l'];
        $t = $this->successfulProcessed['t'];
        //$subject = mb_encode_mimeheader($this->successfulProcessed['subject']);
        $subject = ($this->successfulProcessed['subject']);
        $write = $this->successfulProcessed['message'];
        
        
        if($lang != 'en'){    
        
            if($t == 'adv')
                $interest = ':اعلانات قد تهمك';
        
            $message = '<html>
        <head>
        <title>سوق ماب</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head>
        <body>
                                                
           <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#FFFFFF">
            <tbody><tr bgcolor="#FFF">
                <td width="30%" height="60" align="right" valign="top" style="padding:10px 5px 0 10px">
                    <a href="http://www.sooqmap.com" style="font-size:18px;text-decoration:none" rel="nofollow" target="_blank">
                        <img width="180" border="0" style="display:block;margin:0" alt="سوق ماب هو اول موقع اعلانات مبوبة مجانية" src="http://www.sooqmap.com/images/logo.png"></a>
                </td>
                <td width="70%" align="right" valign="bottom" style="padding:15px 10px 0 0">
                    <font color="#FFA500"><b><span style="font-family:arial,sans-serif;font-size:10pt">سوق ماب للاعلانات المبوبة</span></b></font>
                </td>
            </tr>
            <tr>
                <td colspan="2" height="1px">
                    <hr style="width:97%;border:1px solid green">
                </td>
            </tr><tr>
                <td width="600" bgcolor="#FFFFFF" align="right" colspan="2" style="width:600px;padding:0 15px;font-size:13px;color:#333333">
                    <table width="600" style="width:600px" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody><tr>
                            <td align="right">
                                <br>
                                <strong><span style="font-family:arial,sans-serif;font-size:10pt"> ,عزيزنا العميل</span></strong><br>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" style="font-family:arial,sans-serif;font-size:9.5pt">
                                <table width="100%">
<tbody><tr>
    <td width="100%" style="width:100%" align="right">
        <span style="font-family:arial,sans-serif;font-size:10pt">'.$interest.'</span>
        <br>
    </td>
</tr>
<tr>
    <td width="100%" style="width:100%">
        <table width="100%" style="width:100%">
            <tbody>
            
            <tr><td style="padding:0" colspan="3"><hr width="100%" size="1" noshade="" align="center" style="color:#cdcdcd"></td></tr>
            <tr><td align="right">'.$write.'</td></tr>
            <tr><td align="left" colspan="3" style="padding:0"><hr width="100%" size="1" noshade="" align="center" style="color:#cdcdcd;margin-top:11px"></td></tr>
            
            </tbody></table>
    </td>
</tr>
<tr>
    <td align="center" width="100%">
        <br>
        <table width="50%" align="center" cellspacing="10">
            <tbody><tr>
            
                <td align="center" width="45%" bgcolor="#FFA500" style="background-color:#ffa500;padding:4pt;border:1px solid #cc9900;border-radius:3px" nowrap="">
                    <b><a style="color:#ffffff;text-decoration:none;font-size:10pt;font-family:arial,sans-serif" href="http://www.sooqmap.com/egypt/en/search" target="_blank">مشاهدة اعلانات سوق ماب</a></b>
                </td>
                <td align="center" width="45%" bgcolor="#FFA500" style="background-color:#ffa500;padding:4pt;border:1px solid #cc9900;border-radius:3px" nowrap="">
                    <b><a style="color:#ffffff;text-decoration:none;font-size:10pt;font-family:arial,sans-serif" href="http://www.sooqmap.com/egypt/en/listing" target="_blank">أضف اعلانك مجانا</a></b>
                </td>
            </tr>
        </tbody></table>
    </td>
</tr>

</tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td  align="right">
                                <br>
                                <br>
                                <strong><span style="font-family:arial,sans-serif;font-size:10pt"> ,مع أطيب التحيات<br>
                                    فريق عمل سوق ماب</span></strong>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr><tr>
                <td align="left" colspan="2" bgcolor="#e9e9e9" style="font-size:8.5pt;line-height:160%;font-family:Arial;color:#333333;padding: 0 10px;">
                    <br>
                    To ensure you receive emails from SoopMap, please add <a href="mailto:info@soopmap.com" target="_blank">info@sooqmap.com</a> to your address book
                    or contact list.
                    <br>
                    Copyright © 2014 SooqMap.com. All Rights Reserved.
                </td>
            </tr>
        </tbody></table>
        
        </body>
        </html>';

        }else{
            if($t == 'adv') 
                $interest = 'Ads that may interest you:'; 
           
           $message = '
                        <html>
                        <head>
                        <title>Sooqmap</title>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                        </head>
                        <body>
                                                
           <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#FFFFFF">
            <tbody><tr bgcolor="#FFF">
                <td width="30%" height="60" align="left" valign="top" style="padding:10px 5px 0 10px">
                    <a href="http://www.sooqmap.com" style="font-size:18px;text-decoration:none" rel="nofollow" target="_blank">
                        <img width="180" border="0" style="display:block;margin:0" alt="Free classified ads, sooqmap is the first free classifieds" src="http://www.sooqmap.com/images/logo_en.png"></a>
                </td>
                <td width="70%" align="right" valign="bottom" style="padding:15px 10px 0 0">
                    <font color="#FFA500"><b><span style="font-family:arial,sans-serif;font-size:10pt">Sooqmap.com for classifieds</span></b></font>
                </td>
            </tr>
            <tr>
                <td colspan="2" height="1px">
                    <hr style="width:97%;border:1px solid green">
                </td>
            </tr><tr>
                <td width="600" bgcolor="#FFFFFF" align="left" colspan="2" style="width:600px;padding:0 15px;font-size:13px;color:#333333">
                    <table width="600" style="width:600px" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody><tr>
                            <td>
                                <br>
                                <strong><span style="font-family:arial,sans-serif;font-size:10pt"> Dear Agent,</span></strong><br>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" style="font-family:arial,sans-serif;font-size:9.5pt">
                                <table width="100%">
<tbody><tr>
    <td width="100%" style="width:100%">
        <span style="font-family:arial,sans-serif;font-size:10pt">'.$interest.'</span>
        <br>
    </td>
</tr>
<tr>
    <td width="100%" style="width:100%">
        <table width="100%" style="width:100%">
            <tbody>
            
            <tr><td style="padding:0" colspan="3"><hr width="100%" size="1" noshade="" align="center" style="color:#cdcdcd"></td></tr>
            <tr><td>'.$write.'</td></tr>
            <tr><td align="left" colspan="3" style="padding:0"><hr width="100%" size="1" noshade="" align="center" style="color:#cdcdcd;margin-top:11px"></td></tr>
            
            </tbody></table>
    </td>
</tr>
<tr>
    <td align="center" width="100%">
        <br>
        <table width="50%" align="center" cellspacing="10">
            <tbody><tr>
            
                <td align="center" width="45%" bgcolor="#FFA500" style="background-color:#ffa500;padding:4pt;border:1px solid #cc9900;border-radius:3px" nowrap="">
                    <b><a style="color:#ffffff;text-decoration:none;font-size:10pt;font-family:arial,sans-serif" href="http://www.sooqmap.com/egypt/en/listing" target="_blank">Post your adv for free</a></b>
                </td>
                <td align="center" width="45%" bgcolor="#FFA500" style="background-color:#ffa500;padding:4pt;border:1px solid #cc9900;border-radius:3px" nowrap="">
                    <b><a style="color:#ffffff;text-decoration:none;font-size:10pt;font-family:arial,sans-serif" href="http://www.sooqmap.com/egypt/en/search" target="_blank">See More Ads Here</a></b>
                </td>
            </tr>
        </tbody></table>
    </td>
</tr>

</tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <br>
                                <strong><span style="font-family:arial,sans-serif;font-size:10pt">Best Regards,<br>
                                    Sooqmap.com Team!</span></strong>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr><tr>
                <td align="left" colspan="2" bgcolor="#e9e9e9" style="font-size:8.5pt;line-height:160%;font-family:Arial;color:#333333;padding: 0 10px;">
                    <br>
                    To ensure you receive emails from SoopMap, please add <a href="mailto:info@soopmap.com" target="_blank">info@sooqmap.com</a> to your address book
                    or contact list.
                    <br>
                    Copyright © 2014 SooqMap.com. All Rights Reserved.
                </td>
            </tr>
        </tbody></table>
        
        </body>
        </html>'; 
        }
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        //$headers .= 'From: <webmaster@example.com>' . "\r\n";
        //$headers .= 'Cc: myboss@example.com' . "\r\n";
        $headers .= "From: ".SITE_NAME.' <'.SITE_EMAIL.'> '."\r\n";
        
        mail($to,$subject,$message,$headers);
        
    }
     
}
?>