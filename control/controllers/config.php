<?php

/**
 * @author yehia
 * @copyright 2010
 */


$this->title = "website information";
include '../config.php';
$default = array(
    'siteName' => SITE_NAME,
    'siteEmail' => SITE_EMAIL
);
if($formSubmitted){
	$c = '<?php
    ';
    $c .= 'define("SITE_NAME", "'.$_POST['siteName'].'");
    ';  
    $c .= 'define("SITE_EMAIL", "'.$_POST['siteEmail'].'");
    ';                   
    $c .= ' 
    ?>';
	$file = fopen("../config.php", 'w');
	fwrite($file, $c);
	fclose($file);
}

?>