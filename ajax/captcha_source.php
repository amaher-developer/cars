<?php
session_start();

$string = rand(1,9);
$string1 = rand(1,9);
$string2 = rand(1,9);
$string3 = rand(1,9);
$rando = $string.$string1.$string2.$string3;
    $width = 120; 
    $height = 20;  
    //Create the image resource 
    $image = ImageCreate($width, $height);  
    //We are making three colors, white, black and gray 
    $white = ImageColorAllocate($image, 255, 255, 255); 
    $black = ImageColorAllocate($image, 0, 0, 0); 
    $grey = ImageColorAllocate($image, 204, 204, 204); 
    //Make the background black 
    ImageFill($image, 0, 0, $white); 
    //Add randomly generated string in white to the image
    imageline($image, 0, rand(4,16), $width, $height/2,$grey); 
    Imagestring($image, 15, 15, 3, $string.'  '.$string1.'  '.$string2.'  '.$string3, imagecolorallocate($image,  rand(0,200), rand(0,200), rand(0,200))); 
    //Throw in some lines to make it a little bit harder for any bots to break 
    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    //imageline($image, $width/2, 0, $width/2, $height, $grey); 
 
 
    //$_SESSION['captcha'][$rando] = $rando; 
    
    $_SESSION['captcha'][$_GET['module']]= $string.$string1.$string2.$string3;
header("Content-type: image/png"); 
imagepng($image);
imagedestroy($image);
?>