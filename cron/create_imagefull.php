<?php

// link to the font file no the server
$fontname = 'font/editedfont.otf';
require_once('parse_arabic2/Arabic.php');
// controls the spacing between text
$i=30;
//JPG image quality 0-100
$quality = 90;


function create_imagefull($user){
		global $fontname;	
		global $quality;
        
		$file = "covers/".md5($user[0]['name'].$user[1]['name'].$user[2]['name']).".jpg";	
	
	// if the file already exists dont create it again just serve up the original	
	//if (!file_exists($file)) {	
			
			// define the base image that we lay our text on
			$im = imagecreatefromjpeg("times/$user[2].jpg");
			
			// setup the text colours
			$color['white'] = imagecolorallocatealpha($im, 255, 255, 255, 0);
			$color['black'] = imagecolorallocatealpha($im, 0, 0, 0, 0);
			$color['white2'] = imagecolorallocatealpha($im, 255, 255, 255, 10);
			$color['grey'] = imagecolorallocatealpha($im,131, 139, 131, 50);
			$color['grey2'] = imagecolorallocatealpha($im,193, 197, 193, 10);
			$color['darkgrey'] = imagecolorallocatealpha($im,96,96,96, 30);
			$color['green'] = imagecolorallocatealpha($im, 55, 189, 102, 50);
			
			// this defines the starting height for the text block
			
            // city name
            $y = imagesy($im) - $height - 155;
            $image_name = $user[0];
            $font_size = '40';
            $font_color = 'white';
             
		    $Arabic = new I18N_Arabic('Glyphs');
		    $image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			//imagettftext($im, $font_size, 0, $x+2, $y+2, $color['grey'], $fontname,($image_name));
			imagettftext($im, $font_size, 0, $x+30, $y, $color['white'], $fontname,($image_name));
			// add 32px to the line height for the next text block
            
            
            $y = imagesy($im) - $height - 102; 
            $image_name = $user[1];
            $font_size = '25';
            $font_color = 'white';
             
		    $image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			//imagettftext($im, $font_size, 0, $x+2, $y+2, $color['grey'], $fontname,($image_name));
			imagettftext($im, $font_size, 0, $x+20, $y, $color['white'], $fontname,($image_name));
			// add 32px to the line height for the next text block
		
            
            
            
            // fajr time
            $y = imagesy($im) - $height - 433; 
            $image_name = $user[3][0];
            $font_size = '16';
            $font_color = 'black';
            $i = 312;
		    
		    //$image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x-$i, $y, $color['black'], $fontname,($image_name));
			// add 32px to the line height for the next text block
             
            
            // shrouq time
            $y = imagesy($im) - $height - 373; 
            $image_name = $user[3][1];
            $font_size = '16';
            $font_color = 'black';
            $i = 312;
		    
		    //$image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x-$i, $y, $color['black'], $fontname,($image_name));
			// add 32px to the line height for the next text block
             
             
             
            // zahr time
            $y = imagesy($im) - $height - 310; 
            $image_name = $user[3][2];
            $font_size = '16';
            $font_color = 'black';
            $i = 312;
		    
		    //$image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x-$i, $y, $color['black'], $fontname,($image_name));
			// add 32px to the line height for the next text block
             
              
            // 3asr time
            $y = imagesy($im) - $height - 250; 
            $image_name = $user[3][3];
            $font_size = '16';
            $font_color = 'black';
            $i = 312;
		    
		    //$image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x-$i, $y, $color['black'], $fontname,($image_name));
			// add 32px to the line height for the next text block
              
              
            // ma3'rb time
            $y = imagesy($im) - $height - 186; 
            $image_name = $user[3][4];
            $font_size = '16';
            $font_color = 'black';
            $i = 312;
		    
		    //$image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x-$i, $y, $color['black'], $fontname,($image_name));
			// add 32px to the line height for the next text block
             
             
            // 3shaa time
            $y = imagesy($im) - $height - 127; 
            $image_name = $user[3][5];
            $font_size = '16';
            $font_color = 'black';
            $i = 312;
		    
		    //$image_name = $Arabic->utf8Glyphs($image_name);
            
			// center the text in our image - returns the x value
			$x = center_text($image_name, $font_size);	
			imagettftext($im, $font_size, 0, $x-$i, $y, $color['black'], $fontname,($image_name));
			// add 32px to the line height for the next text block
             
             
            
		
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

$user = array('شرم الشيخ', 'الخميس', 'full', array('4:26 ص', '5:53 ص', '1:04 م', '4:57 م', '8:16 م', '9:42 م'));
	

// run the script to create the image
$filename = create_imagefull($user);

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