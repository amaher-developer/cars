<?php
class SendSMS extends Entity{
    static public function mysms($mob, $message){
        // to can send arabic text also use this blow two line codes
        
        
        
        
        $arr = unpack('H*hex', iconv('UTF-8', 'UCS-2BE', $message));
        $message = strtoupper($arr['hex']);
        
        $user = "ftkarabia";
        $password = "CedFWMFFHNOfRU";
        $api_id = "BHAF57";
        $baseurl ="http://api.clickatell.com";
        $c1 = " "; $c2 = "+";
        $res = str_replace($c1, $c2, $message);
        $eg1 = "01"; $eg2 = "201"; $sa1 = "05";  $sa2 = "9665"; $co = 2; $co2 = 1;
        if(substr($mob, 0, $co) == $eg1) $to = str_replace($eg1, $eg2, $mob, $co2);
        elseif(substr($mob, 0, $co) == $sa1) $to = str_replace($sa1, $sa2, $mob, $co2);
        else $to = $mob;
        // auth call
        $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id&unicode=1&Unicode=1&from=FasTracKids";
        // do auth call
        $ret = file($url);
		// split our response. return string is on first line of the data returned
        $sess = split(":",$ret[0]);
        if ($sess[0] == "OK") {
        $sess_id = trim($sess[1]); // remove any whitespace
        $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$res&unicode=1&Unicode=1&from=FasTracKids";
        // do sendmsg call
        $ret = file($url);
//		 print_r($ret);
        $send = split(":",$ret[0]);
        if ($send[0] == "ID")
        	return null;//$send[1];
        else return null;//false;
        } else {
        	return null;//false;
        }
        
        
        
    }
}
?>