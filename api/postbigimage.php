<?php

$timestamp1 = time();

include 'library/TwitterAPIExchange.php';

define('CONSUMER_KEY', 'LpPTdo4omu7jJpknSvk0hHPfM');
define('CONSUMER_SECRET', 'drp28IzgvbxtzGyT6RkD3gUGdRRD3rqX84QpQsjGEKtItoc78i');

define('ACCESS_TOKEN', '207109597-MOcHhadX6m5Jv8XLLQ4MvOnV5qBZZwTgaknfwvCp');
define('ACCESS_TOKEN_SECRET', 'IDTl0qpIlfzl358R0C2wzxvzUae3id2enFSsU90qbD9Xe');

$settings = array(
    'oauth_access_token' => ACCESS_TOKEN,
    'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
    'consumer_key' => CONSUMER_KEY,
    'consumer_secret' => CONSUMER_SECRET
);

$twitter = new TwitterAPIExchange(array(
    'oauth_access_token' => ACCESS_TOKEN,
    'oauth_access_token_secret' => ACCESS_TOKEN_SECRET,
    'consumer_key' => CONSUMER_KEY,
    'consumer_secret' => CONSUMER_SECRET
));


$url = 'https://api.twitter.com/1.1/statuses/update.json'; 
$requestMethod = 'POST';
$postData = array('status' => 'aaaa', 'media_ids[]'  => "http://www.ftkarabia.com/twitter/hybridauth2/maher.jpg");
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postData)
             ->performRequest();
             
             
?>