<?php
/*
$db_host = "localhost";
$db_name = "athantwe_athan";
$db_user = "athantwe_athan";
$db_pass = "d&lUP*S}#V}d";
$link = mysql_connect("$db_host", "$db_user", "$db_pass") or die($error_msg);
mysql_select_db($db_name, $link);

$azan = array('', 'ÇáİÌÑ', 'ÇáÔÑæŞ', 'ÇáÙåÑ', 'ÇáÚÕÑ', 'ÇáãÛÑÈ', 'ÇáÚÔÇÁ');


//$result = mysql_query('select * from citiesathan where prayer != 6 and (prayertime > "'.time().'") and (prayertime < "'.(time() + 60).'")');
$result = mysql_query('select a.*, b.id bId, car, cen from citiesathan a left join cities b on a.cityid = b.id where prayer = 1');
if(mysql_num_rows($result) > 0){
    $i = 0;
    while($rs=mysql_fetch_assoc($result)){
        //$records[$i] = $rs;
        $result2 = mysql_query('select * from users where usercityid = "'.$rs['cityid'].'" and userid = 2');
        if(mysql_num_rows($result2) > 0){
            
            while($rs2=mysql_fetch_assoc($result2)){
                $records[$i] = $rs2;
                $tweet = 'ÍÇä ÇáÂä ãæÚÏ ÃĞÇä '.$azan[$rs['prayer']].' ÍÓÈ ÇáÊæŞíÊ ÇáãÍáí áãÏíäÉ '.$rs['car'].'
                         "Åä ÇáÕáÇÉ ßÇäÊ Úáì ÇáãÄãäíä ßÊÇÈÇ ãæŞæÊÇ"
                
                           ÊÛÑíÏÉ ÇáÃĞÇä ãä AthanTweets.com';
                $records[$i]['tweet'] = $tweet;
                
            }
            $i++;
        }
    }
}
*/ 

session_start();
require 'library/twitteroauth_master/autoload.php';

// Ahmed Maher
define('ACCESS_TOKEN', '207109597-MOcHhadX6m5Jv8XLLQ4MvOnV5qBZZwTgaknfwvCp');
define('ACCESS_TOKEN_SECRET', 'IDTl0qpIlfzl358R0C2wzxvzUae3id2enFSsU90qbD9Xe');
$tweetpost = 'ÍÇä ÇáÂä ãæÚÏ ÃĞÇä  ÍÓÈ ÇáÊæŞíÊ ÇáãÍáí áãÏíäÉ 
                         "Åä ÇáÕáÇÉ ßÇäÊ Úáì ÇáãÄãäíä ßÊÇÈÇ ãæŞæÊÇ"
                
                           ÊÛÑíÏÉ ÇáÃĞÇä ãä AthanTweets.com';

$access_token['oauth_token'] = ACCESS_TOKEN;
$access_token['oauth_token_secret'] = ACCESS_TOKEN_SECRET;

$connection = new TwitterOAuth('LpPTdo4omu7jJpknSvk0hHPfM', 'drp28IzgvbxtzGyT6RkD3gUGdRRD3rqX84QpQsjGEKtItoc78i', $access_token['oauth_token'], $access_token['oauth_token_secret']);
    // getting basic user info
$user = $connection->get("account/verify_credentials");

// printing username on screen
echo "Welcome " . $user->screen_name;
$tweetWM = $connection->upload('media/upload', ['media' => 'http://ftkarabia.com/twitter/hybridauth2/maher.jpg']);
$tweet = $connection->post('statuses/update', ['media_ids' => $tweetWM->media_id, 'status' => $tweetpost]);
print_r($tweetpost);
    


?>

