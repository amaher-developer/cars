<?php

// link to the font file no the server
$fontname = '../write_img/font/editedfont.otf';
require_once('../write_img/parse_arabic2/Arabic.php');
// controls the spacing between text
$i=30;
//JPG image quality 0-100
$quality = 90;


function create_image($user){

		global $fontname;	
		global $quality;
		$file = "covers/".md5($user[0]['name'].$user[1]['name'].$user[2]['name']).".jpg";	
	
	// if the file already exists dont create it again just serve up the original	
	//if (!file_exists($file)) {	
			

			// define the base image that we lay our text on
			$im = imagecreatefromjpeg("times/".$user[3].".jpg");
			
			// setup the text colours
			$color['white'] = imagecolorallocatealpha($im, 255, 255, 255, 50);
			$color['white2'] = imagecolorallocatealpha($im, 255, 255, 255, 10);
			$color['grey'] = imagecolorallocatealpha($im,131, 139, 131, 50);
			$color['grey2'] = imagecolorallocatealpha($im,193, 197, 193, 10);
			$color['darkgrey'] = imagecolorallocatealpha($im,96,96,96, 30);
			$color['green'] = imagecolorallocatealpha($im, 55, 189, 102, 50);
			
			// this defines the starting height for the text block
			
             
             // month name upper img
             $y = imagesy($im) - $height - 685;
             $image_name = $user[0];
             $font_size = '27';
             $font_color = 'white';
             
		    $Arabic = new I18N_Arabic('Glyphs');
		    $image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x+2, $y+2, $color['grey'], $fontname,($image_name));
			imagettftext($im, $font_size, 0, $x, $y, $color['white'], $fontname,($image_name));
			// add 32px to the line height for the next text block
		      
             
             
             // azan name upper img
             $y = imagesy($im) - $height - 355;
             $image_name = $user[4];
             $font_size = '40';
             $font_color = 'white';
             
		    //$Arabic = new I18N_Arabic('Glyphs');
		    $image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x, $y, $color['white2'], $fontname,($image_name));
			// add 32px to the line height for the next text block
             
              
              
              
             $y = imagesy($im) - $height - 225; 
             $image_name = $user[1];
             $font_size = '95';
             $font_color = 'white';
             
		    //persian_log2vis($image_name);
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x+2, $y+2, $color['grey'], $fontname,($image_name));
			imagettftext($im, $font_size, 0, $x, $y, $color['white'], $fontname,($image_name));
			// add 32px to the line height for the next text block
		
            $image_name = $user[2];
            $font_size = '35';
            $font_color = 'white';
            $i = 122;
		    //persian_log2vis($image_name);
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x+$i+2, $y+2, $color['grey'], $fontname,($image_name));
			imagettftext($im, $font_size, 0, $x+$i, $y, $color['white'], $fontname,($image_name));
			// add 32px to the line height for the next text block
             
             
             /* ------------ create thumbnail on image ----------------------- */
             $stamp = imagecreatefrompng('islamic_2_512.png');
             // Set the margins for the stamp and get the height/width of the stamp image
            $marge_right = 298;
            $marge_bottom = 408;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);

            // Copy the stamp image onto our photo using the margin offsets and the photo 
            // width to calculate positioning of the stamp. 
            imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
            /* ----------------------------------- */
            
		
			// create the image
			imagejpeg($im, $file, $quality);
			

             //}
            						
		return $file;	
}

function center_text($string, $font_size){

			global $fontname;

			$image_width = 900;
			$dimensions = imagettfbbox($font_size, 0, $fontname, $string);
			
			return ceil(($image_width - $dimensions[4]) / 2);				
}


/*
$user = array('12 شعبان', '11:24', 'ص', '2');
	

// run the script to create the image
$filename = create_image($user);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<img src="<?=$filename;?>?id=<?=rand(0,1292938);?>" width="900" height="900"/><br/><br/>
</body>
</html>
<?php */ ?>