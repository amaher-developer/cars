<?php

ini_set('max_execution_time', 300);

include '../prepare.php';
include 'create_imagefull.php';

$weeks = array('', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة', 'السبت', 'الاحد');
$azan = array('', 'الفجر', 'الظهر', 'العصر', 'المغرب', 'العشاء', 'الشروق');
$hijrimonth = array('محرم', 'صفر', 'ربيع الأول', 'ربيع الثاني', 'جمادي الأول', 'جمادي الثاني', 'رجب', 'شعبان', 'رمضان', 'شوال', 'ذو القعدة', 'ذو الحجة');
$day_of_week = date('N', time());
$day_of_week_name = $weeks[$day_of_week];
function timezone($time){
    if($time == 'AM')
        return 'ص';
    else
        return 'م';
} 


$fetch = new Query('select *, b.id bId, car, cen, hijridate, tzs, ((tzs) + '.(date('H', time())).') as hournow from citiesathan a left join cities b on a.cityid = b.id');
$fetch->addCondition(' (0 < ((tzs) + '.(date('H', time())).')) and (((tzs) + '.(date('H', time())).') <= 1) ');
$fetch->addOrderBy('cityathanid asc');
$fetch->prepare();
$rs = $fetch->getRecordSet();

$i = 0; 
$t = 0;
$z = 1;
foreach($rs as $r){
    $tweet = 'مواقيت الصلاة ليوم '.$day_of_week_name.' بمدينة #'.trim(str_replace(' ', '_', $r['car'])).' : ';
    
    if($r){
        
        if($r['prayer'] == 1 || $r['prayer'] == 6 )
            $timezonee = 'ص';
        else
            $timezonee = 'م';
        
        $hijrim = explode('/', $r['hijridate']);
        $hijrimm = ($hijrim[1] - 1);
        $hijri = $hijrim[0].' '.$hijrimonth[$hijrimm];
        
        $azantext = 'أذان '.$azan[$r['prayer']].' في '.trim(str_replace(' ', '_', $r['car']));
        $recorduser = array($hijri, date('g:i', $r['prayercitytime']), timezone(date('A', $r['prayercitytime'])), $r['prayer'], $azantext);

        //$tweetArr[] = $azan[$r['prayer']].' ('.date('g:i', $r['prayercitytime']).' '.$timezonee.') ';
        $tweetArr[] = $azan[$r['prayer']].' '.date('g:i', $r['prayercitytime']).' ';
        $tweetArr2[] = date('g:i', $r['prayercitytime']).' ';
        if($r['prayer'] == 6){

            $temp = $tweetArr[5];
            $tweetArr[5] = $tweetArr[4];
            $tweetArr[4] = $tweetArr[3];
            $tweetArr[3] = $tweetArr[2];
            $tweetArr[2] = $tweetArr[1];
            $tweetArr[1] = $temp;

            $temp2 = $tweetArr2[5];
            $tweetArr2[5] = $tweetArr2[4];
            $tweetArr2[4] = $tweetArr2[3];
            $tweetArr2[3] = $tweetArr2[2];
            $tweetArr2[2] = $tweetArr2[1];
            $tweetArr2[1] = $temp2;

            $records[$i]['tweet'] =  $tweet.implode('', $tweetArr);
            $records[$i]['tweetAzans'] =  $tweetArr2;
            $records[$i]['cityid'] =  $r['cityid'];
            $records[$i]['cityname'] = $r['car'];
            unset($tweet, $tweetArr, $tweetArr2, $z);
        }
        
        $z++;
        $t++;
        $i++;
    }
    
    
    
}

$i = 0;

unset($record);
require "../api/library/twitteroauth_master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
if($records){
    $y = 0;
    foreach($records as $record){
                
        $fetch = new Query('select * from users ');
        //$fetch->addCondition('userid = 3');
        $fetch->addCondition('usercityid = "'.$record['cityid'].'" and useractivate = "1" and userblock = "0"');
        //$fetch->addCondition('useractivate = "1" and userblock = "0"');
        $fetch->prepare();
        if($fetch->getTotal()){
            $rs2 = $fetch->getRecordSet();
            foreach($rs2 as $r2){
                $connection = new TwitterOAuth('LpPTdo4omu7jJpknSvk0hHPfM', 'drp28IzgvbxtzGyT6RkD3gUGdRRD3rqX84QpQsjGEKtItoc78i', $r2['useraccesstoken'], $r2['usertokensecret']);
 
                if(($r2['userimagetweet'] == 1)&& ($r2['userpaymenttype'] > 0)){
                /* ------------------------------------------- */
                    
                    unset($recorduser);
                    
                    $recorduser = array($record['cityname'], $day_of_week_name, 'full', $record['tweetAzans']);
                    $filename = create_imagefull($recorduser);
                    $img = Globals::$siteURL.'cron/'.$filename;
                    /* ------------------------------------------- */
                    $tweetWM = $connection->upload('media/upload', ['media' => $img]);
                    $tweet = $connection->post('statuses/update', [ 'media_ids' => $tweetWM->media_id, 'status' => $record['tweet'] ]);
                }else
                    $tweet = $connection->post('statuses/update', [ 'status' => $record['tweet'] ]);
                    
                $queryvalue.= '("'.$r2['userid'].'", "'.$tweet->errors[0]->code.'", "'.$tweet->errors[0]->message.'", "'.time().'", "'.$record['tweet'].'", "'.$r2['useractivate'].'", "'.$r2['userblock'].'"), ';
                //echo $queryvalue;
                $y++;
                
                
            }
        }
        
                break;
        
    }
}

$val = file_get_contents('../tweetnumbers.txt');
$val = (int)$val + $y;
file_put_contents('../tweetnumbers.txt', $val);




// tweet in website account on twitter

if($apprecords){
    $z = 0;
    foreach($apprecords as $apprecord){
    
        $connection = new TwitterOAuth('LpPTdo4omu7jJpknSvk0hHPfM', 'drp28IzgvbxtzGyT6RkD3gUGdRRD3rqX84QpQsjGEKtItoc78i', '712596532067966976-O0jzhlSJrG2CSXnzrvQaCgECO04CaYb', 'OHVcdLEri5B6HvUmSTJCEugbBhTSEw5o11dFvoVEPrwBG');
        //$tweetWM = $connection->upload('media/upload', ['media' => 'http://ftkarabia.com/twitter/hybridauth2/maher.jpg']);
        
        if($apprecord['userimagetweet'] = 1){
        /* ------------------------------------------- */
            
            //$appuser = array('12 شعبان', '11:24', 'ص', '2');
            $hijrim = explode('/', $apprecord['hijridate']);
            $hijrimm = $hijrim[1] - 1;
            $hijri = $hijrim[0].' '.$hijrimonth[$hijrimm];
            
            //$appuser = array($hijri, date('h:i', $apprecord['prayercitytime']), timezone(date('A', $apprecord['prayercitytime'])), $apprecord['prayer']);
            
            //$filename = create_imagefull($appuser);
            $img = Globals::$siteURL.'write_img/'.$filename;
            //echo $img;
            /* ------------------------------------------- */
            $tweetWM = $connection->upload('media/upload', ['media' => $img]);
            $tweet = $connection->post('statuses/update', [ 'media_ids' => $tweetWM->media_id, 'status' => $apprecord['tweet'] ]);
        }else
            $tweet = $connection->post('statuses/update', [ 'status' => $apprecord['tweet'] ]);
        
        
        if($z = 10)
            break;
            
        
        $z++;
    }
}

$db_host = "localhost";
$db_name = "athantwe_athan";
$db_user = "athantwe_athan";
$db_pass = "d&lUP*S}#V}d";
$link = mysql_connect("$db_host", "$db_user", "$db_pass") or die(mysql_error());
mysql_select_db($db_name, $link);
if($queryvalue){
    $query = "insert into logs (loguserid, code, message, date, tweet, loguseractivate, loguserblock) values ".(trim(trim($queryvalue), ','));    
    mysql_query($query) or die(mysql_error());
}

?>