<?php

require 'library/twitteroauth_master/autoload.php';



// Ahmed Maher
define('ACCESS_TOKEN', '207109597-MOcHhadX6m5Jv8XLLQ4MvOnV5qBZZwTgaknfwvCp');
define('ACCESS_TOKEN_SECRET', 'IDTl0qpIlfzl358R0C2wzxvzUae3id2enFSsU90qbD9Xe');

// Mohamed Hossam
//define('ACCESS_TOKEN', '16727857-GflT1XBCE83R4Ccr3Mnwyx3RXZcR6PnUyPZ6HZvG2');
//define('ACCESS_TOKEN_SECRET', 'AyfNLzLsdWAAxh2N8KxWMo13ZblZ8Jp5cbUHV1ZfVc5WF');

$access_token['oauth_token'] = ACCESS_TOKEN;
$access_token['oauth_token_secret'] = ACCESS_TOKEN_SECRET;
//for($i = 1; $i < 20;$i++){
    
    $connection = new TwitterOAuth('LpPTdo4omu7jJpknSvk0hHPfM', 'drp28IzgvbxtzGyT6RkD3gUGdRRD3rqX84QpQsjGEKtItoc78i', $access_token['oauth_token'], $access_token['oauth_token_secret']);
    	
    // getting basic user info
    $user = $connection->get("account/verify_credentials");
    
    // printing username on screen
    echo "Welcome " . $user->screen_name;
    // uploading media (image) and getting media_id
    //$tweetWM = $connection->upload('media/upload', ['media' => '']);
    //$tweetWM = $connection->upload('media/upload', ['media' => 'http://ftkarabia.com/twitter/hybridauth2/maher.jpg']);
    $tweetWM = $connection->upload('media/upload', ['media' => 'http://ftkarabia.com/twitter/hybridauth2/maher.jpg']);
    // tweeting with uploaded media (image) using media_id
    
    //$tweetWM = $connection->upload('media/upload', ['command' => 'INIT', 'media_type' => 'video/mp4', 'total_bytes' => '3469591', 'media' => 'http://www.ftkarabia.com/twitter/hybridauth2/azan.mp4']);
    //$tweetWM = $connection->upload('media/upload', ['command' => 'INIT', 'media_ids' => $tweetWM->media_id, 'media_type' => 'video/mp4', 'total_bytes' => '3469591', 'media' => 'http://www.ftkarabia.com/twitter/hybridauth2/azan.mp4']);
    //$tweet = $connection->post('statuses/update', ['command' => 'FINALIZE', 'media_ids' => $tweetWM->media_id,  "video_type" => "video/mp4"]);

    $tweet = $connection->post('statuses/update', ['media_ids' => $tweetWM->media_id, 'status' => ' Test ']);
    print_r($tweet);
    
//}
echo '<br/><Br/>';
$timestamp2 = time();
echo $timestamp2.'<br/>';

echo ($timestamp2 - $timestamp1);
?>