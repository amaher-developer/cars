<?php 
ini_set('max_execution_time', 300);
include '../prepare.php';
include 'create_image.php';


$azan = array('', 'الفجر', 'الظهر', 'العصر', 'المغرب', 'العشاء', 'الشروق');
$hijrimonth = array('محرم', 'صفر', 'ربيع الأول', 'ربيع الثاني', 'جمادي الأول', 'جمادي الثاني', 'رجب', 'شعبان', 'رمضان', 'شوال', 'ذو القعدة', 'ذو الحجة');

function timezone($time){
    if($time == 'AM')
        return 'ص';
    else
        return 'م';
} 

//'select * from citiesathan where prayer != 6 and (prayertime > "'.time().'") and (prayertime < "'.(time() + 60).'")'
//'select a.*, b.id bId, car, cen from citiesathan a left join cities b on a.cityid = b.id '
$fetch = new Query('select a.*, b.id bId, car, cen, hijridate from citiesathan a left join cities b on a.cityid = b.id');
$fetch->addCondition('prayer != 6 and (prayertime < "'.time().'") and (prayertime > "'.(time() - 60).'")');
//$fetch->addCondition('cityathanid = 1');
$fetch->prepare();
$rs = $fetch->getRecordSet();

/*
$fetch = new Query('select * from doaa');
//$fetch->addCondition('status = 0');
$fetch->addOrderBy('rand()');
$fetch->prepare();
$doaa = $fetch->getSingleRecord();

//Database::query('update doaa set status = "1" where id = "'.$doaa['id'].'"');
$filename = create_image(array('12 شعبان', '11:24', 'ص', '2'));
$img = Globals::$siteURL.'write_img/'.$filename;
echo $img;
*/

$i = 0; 
$t = 0;
foreach($rs as $r){
    
    if($r){
        /* ---- */
        //tweet on account
        $tweet = 'حان الآن موعد أذان '.$azan[$r['prayer']].' في #'.trim(str_replace(' ', '_', $r['car'])).' ['.date('h:i', $r['prayercitytime']).']';
        //$apprecords[$t]['tweet'] = $tweet;  
        /* ---- */
        
        
        $hijrim = explode('/', $r['hijridate']);
        $hijrimm = ($hijrim[1] - 1);
        $hijri = $hijrim[0].' '.$hijrimonth[$hijrimm];
        
        $azantext = 'أذان '.$azan[$r['prayer']].' في '.trim(str_replace(' ', '_', $r['car']));
        $recorduser = array($hijri, date('g:i', $r['prayercitytime']), timezone(date('A', $r['prayercitytime'])), $r['prayer'], $azantext); 

        $t++;
    }
    
    $fetch = new Query('select * from users ');
    //$fetch->addCondition('userid = 3');
    $fetch->addCondition('usercityid = "'.$r['cityid'].'" and useractivate = "1" and userblock = "0"');
    
    //$fetch->addCondition('useractivate = "1" and userblock = "0"');
    $fetch->prepare();
    if($fetch->getTotal()){
        $rs2 = $fetch->getRecordSet();
        //print_r($rs2);
        foreach($rs2 as $r2){
/*
$tweet = 'حان الآن موعد أذان '.$azan[$r['prayer']].' في '.$r['car'].' ['.date('g:i', $r['prayercitytime']).']
'.'"تغريدة تلقائية"';
//.'تغريدة الأذان من '.'AthanTweets.com';
*/

unset($azanurl, $doaatext);

if($r2['userpaymenttype'] == 0){
    $azanurl = '
'.'تغريدة الأذان من '.'AthanTweets.com';
}else
    $azanurl = '';


if($r2['userdoaatweet'] == 1)
    $doaatext = trim($r['doaa']);
else
    $doaatext = '';

if($r2['usertexttweet']){     
    $tweet = trim($r2['usertexttweet1']).' '.$azan[$r['prayer']].' '.trim($r2['usertexttweet2']).' #'.$r['car'].' '.date('g:i', $r['prayercitytime']).' '.trim($r2['usertexttweet3']).'
'.($doaatext).$azanurl;

}else{
    
$tweet = 'حان الآن أذان '.$azan[$r['prayer']].' لمدينة #'.$r['car'].' '.date('g:i', $r['prayercitytime']).'
'.$doaatext.$azanurl;//.'
//'.'AthanTweets.com';

}
            if($r2['azan'.$r['prayer']] == 1){
                $records[] = $r2;
                $records[$i]['tweet'] = $tweet;  
                $records[$i]['recorduser'] = $recorduser;
                $i++;
            }
        }
    }
}

require "../api/library/twitteroauth_master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
if($records){
    $y = 0;
    foreach($records as $record){
        $connection = new TwitterOAuth('LpPTdo4omu7jJpknSvk0hHPfM', 'drp28IzgvbxtzGyT6RkD3gUGdRRD3rqX84QpQsjGEKtItoc78i', $record['useraccesstoken'], $record['usertokensecret']);
        
        
        if(($record['userimagetweet'] == 1)&& ($record['userpaymenttype'] > 0)){
        /* ------------------------------------------- */
            $filename = create_image($record['recorduser']);
            $img = Globals::$siteURL.'cron/'.$filename;
            /* ------------------------------------------- */
            $tweetWM = $connection->upload('media/upload', ['media' => $img]);
            $tweet = $connection->post('statuses/update', [ 'media_ids' => $tweetWM->media_id, 'status' => $record['tweet'] ]);
        }else
            $tweet = $connection->post('statuses/update', [ 'status' => $record['tweet'] ]);
        
        $queryvalue.= '("'.$record['userid'].'", "'.$tweet->errors[0]->code.'", "'.$tweet->errors[0]->message.'", "'.time().'", "'.$record['tweet'].'", "'.$record['useractivate'].'", "'.$record['userblock'].'"), ';
        $y++;
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
            
            $appuser = array($hijri, date('h:i', $apprecord['prayercitytime']), timezone(date('A', $apprecord['prayercitytime'])), $apprecord['prayer']);
            
            $filename = create_image($appuser);
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
//include '../prepare.php';
//Database::query('insert into logs (loguserid, code, message, date) value ("'.$record['userid'].'", "'.$tweet->errors[0]->code.'", "'.$tweet->errors[0]->message.'", "'.time().'")');
?>