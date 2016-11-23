<?php

/**
 * @author yehia
 * @copyright 2010
 */


$this->title = "إيقاف/تشغيل الموقع";
include '../websiteStatus.php';
$open = null;
$closed = null;
if(WEBSITE_OPEN == true)
    $open = 'checked = "true"';
else
    $closed = 'checked = "true"';
$message = CLOSED_MESSAGE;
$default = array(
    'open' => $open,
    'closed' => $closed, 
    'message' => $message
);
if($formSubmitted){
    $_POST['openclosed'] = str_replace('"', '\"', 
        str_replace("'", "\'", $_POST['openclosed'])
    );
    $_POST['message'] = str_replace('"', '\"', 
        str_replace("'", "\'", $_POST['message'])
    );
	$c = '<?php
    ';
    $c .= 'define("WEBSITE_OPEN", '.$_POST['openclosed'].');
    ';  
    $c .= 'define("CLOSED_MESSAGE", "'.$_POST['message'].'");
    ';                   
    $c .= ' 
    ?>';
	$file = fopen("../websiteStatus.php", 'w');
	fwrite($file, $c);
	fclose($file);
}

?>