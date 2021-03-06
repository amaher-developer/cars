<?php

/**
 * @author yehia
 * @copyright 2010
 */
 
 // Set the enviroment variable for GD
putenv('GDFONTPATH=' . realpath('.'));

// Name the font to be used (note the lack of the .ttf extension)
$font = '../css/fonts/BreeSerif-Regular.otf';
 
define('WATERMARK_MARGIN_ADJUST', 5);
define('WATERMARK_FONT_REALPATH', $font);
define('WATERMARK_OUTPUT_QUALITY', 90);



class Image{

    static public $mimeTable = array(
        'image/pjpeg' => 'jpg',
        'image/jpeg' => 'jpg',
        'image/gif' => 'gif',
        'image/png' => 'png'
    );
    
    private $extension;
    private $src;
    private $imageInfo = array();
    private $originalWidth;
    private $originalHeight;
    private $mime;
    private $resource;
    private $processable = true;
    
    static public function nameWithoutExtension($name){
        return substr($name, 0, strpos($name, '.'));
    }
    static public function extractExtension($name){
        return File::getExtension($name);
    }
    static public function locateThumbnailOf($photo){
    	if(strpos($photo, '.') !== false)
    		$name = Image::nameWithoutExtension($photo);
    	else
    		$name = $photo;;
		return 'thumbnail-'.$name.'.jpg';
    }
    
    public function __construct($src){
        $this->src = $src;
        $this->imageInfo = @getimagesize($src);
        if($this->isImage()){
            $this->originalWidth = $this->imageInfo[0];
            $this->originalHeight = $this->imageInfo[1];
            $this->mime = $this->imageInfo['mime'];
            $this->extension = Image::$mimeTable[$this->mime];
        }
    }
    
    public function isImage(){
         return ($this->imageInfo && $this->imageInfo[0] != 0);
    }
    public function getExtension(){
        return $this->extension;
    }
    public function saveOriginal($destination){
        if($this->isImage()){
            return File::copyAndConfirm($this->src, $destination);
        }
    }
    public function saveClone($destination){
        if($this->isProcessable()){
            $newWidth = $this->originalWidth;
            $newHeight =$this->originalHeight ;        
            $myimage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled(
                $myimage, $this->resource, 0, 0, 0, 0, 
                $newWidth, $newHeight, $this->originalWidth, $this->originalHeight
            );
            return $this->write($myimage, $destination);
        }
    }
    public function saveWidthHeight($destination, $width, $height){
        if($this->isProcessable()){
            $newWidth = $width;     
            $newHeight = $height; 
            $myimage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled(
                $myimage, $this->resource, 0, 0, 0, 0, 
                $newWidth, $newHeight, $this->originalWidth, $this->originalHeight
            );
            return $this->write($myimage, $destination);
        }
    }
    public function saveWidthHeightRatio($destination, $width, $height){
        if($this->isProcessable()){
            $wratio = $width/$this->originalWidth;
            $hratio = $height/$this->originalHeight;
            $widthIsBigger = ($wratio <= $hratio);
            if($widthIsBigger){
                $newWidth = $width;
                $newHeight = $wratio*$this->originalHeight;
            }else{
                $newWidth = $hratio*$this->originalWidth;
                $newHeight = $height;
            }
            $myimage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled(
                $myimage, $this->resource, 0, 0, 0, 0, 
                $newWidth, $newHeight, $this->originalWidth, $this->originalHeight
            );
            return $this->write($myimage, $destination);
        }
    }
    public function saveWidthHeightRatioAndCrop($destination, $width, $height){
        if($this->isProcessable()){
            $wratio = $width/$this->originalWidth;
            $hratio = $height/$this->originalHeight;
            $widthRatioIsBigger = ($wratio <= $hratio);
            if($widthRationIsSmaller){
                $newWidth = $width;
                $newHeight = $wratio*$this->originalHeight;
            }else{
                $newWidth = $hratio*$this->originalWidth;
                $newHeight = $height;
            }
            $myimage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled(
                $myimage, $this->resource, 0, 0, 0, 0, 
                $newWidth, $newHeight, $this->originalWidth, $this->originalHeight
            );
            $myOtherImage = imagecreatetruecolor($width, $height);
            imagecopy(
                $myOtherImage, $myimage, ($width - $newWidth)/2, ($height - $newHeight)/2, 0, 0, 
                $newWidth, $newHeight
            );
            imagedestroy($myimage);
            return $this->write($myOtherImage, $destination);
            //return $this->write($myimage, $destination);
        }
    }
    public function saveWidth($destination, $width){
        if($this->isProcessable()){
            $newWidth = $width;
            $newHeight = ($newWidth/$this->originalWidth)*$this->originalHeight;        
            $myimage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled(
                $myimage, $this->resource, 0, 0, 0, 0, 
                $newWidth, $newHeight, $this->originalWidth, $this->originalHeight
            );
            return $this->write($myimage, $destination);
        }
    }
    public function saveHeight($destination, $height){
        if($this->isProcessable()){
            $newWidth = ($newHeight/$this->originalHeight)*$this->originalWidth; 
            $newHeight = $height;     
            $myimage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled(
                $myimage, $this->resource, 0, 0, 0, 0, 
                $newWidth, $newHeight, $this->originalWidth, $this->originalHeight
            );
            return $this->write($myimage, $destination);
        }
    }
    
    private function isProcessable(){
        if($this->processable){
            return ($this->getResource());
        }else
            return false;
    }
    private function getResource(){
        if(!$this->resource)
            $this->createResource();
        return $this->resource;
    }
    private function createResource(){
        switch($this->extension){
            case 'jpg' : 
                $resource = @imagecreatefromjpeg($this->src);
            break;
            case 'gif' :
                $resource = @imagecreatefromgif($this->src);
            break;
            case 'png':
                $resource = @imagecreatefrompng($this->src);
            break;
        }
        if($resource){
            $this->resource = $resource;
        }else{
            $this->processable = false;
        }
    }
    private function write($myimage, $destination){
        $result = imagejpeg($myimage, $destination);
        imagedestroy($myimage);
        return ($result && is_file($destination));
    }
    
    /* watermark functions */
    
    function render_text_on_gd_image(&$source_gd_image, $text, $font, $size, $color, $opacity, $rotation, $align)
    {
        $source_width = imagesx($source_gd_image);
        $source_height = imagesy($source_gd_image);
        $bb = $this->imagettfbbox_fixed($size, $rotation, $font, $text);
        $x0 = min($bb[0], $bb[2], $bb[4], $bb[6]) - WATERMARK_MARGIN_ADJUST;
        $x1 = max($bb[0], $bb[2], $bb[4], $bb[6]) + WATERMARK_MARGIN_ADJUST;
        $y0 = min($bb[1], $bb[3], $bb[5], $bb[7]) - WATERMARK_MARGIN_ADJUST;
        $y1 = max($bb[1], $bb[3], $bb[5], $bb[7]) + WATERMARK_MARGIN_ADJUST;
        $bb_width = abs($x1 - $x0);
        $bb_height = abs($y1 - $y0);
        switch ($align) {
            case 11:
                $bpy = -$y0;
                $bpx = -$x0;
                break;
            case 12:
                $bpy = -$y0;
                $bpx = $source_width / 2 - $bb_width / 2 - $x0;
                break;
            case 13:
                $bpy = -$y0;
                $bpx = $source_width - $x1;
                break;
            case 21:
                $bpy = $source_height / 2 - $bb_height / 2 - $y0;
                $bpx = -$x0;
                break;
            case 22:
                $bpy = $source_height / 2 - $bb_height / 2 - $y0;
                $bpx = $source_width / 2 - $bb_width / 2 - $x0;
                break;
            case 23:
                $bpy = $source_height / 2 - $bb_height / 2 - $y0;
                $bpx = $source_width - $x1;
                break;
            case 31:
                $bpy = $source_height - $y1;
                $bpx = -$x0;
                break;
            case 32:
                $bpy = $source_height - $y1;
                $bpx = $source_width / 2 - $bb_width / 2 - $x0;
                break;
            case 33;
                $bpy = $source_height - $y1;
                $bpx = $source_width - $x1;
                break;
        }
        $alpha_color = imagecolorallocatealpha(
            $source_gd_image,
            hexdec(substr($color, 0, 2)),
            hexdec(substr($color, 2, 2)),
            hexdec(substr($color, 4, 2)),
            127 * (100 - $opacity) / 100
        );
        return imagettftext($source_gd_image, $size, $rotation, $bpx, $bpy, $alpha_color, WATERMARK_FONT_REALPATH . $font, $text);
    }
    
    /*
     * Fix for the buggy imagettfbbox implementation in gd library
     */
    
    function imagettfbbox_fixed($size, $rotation, $font, $text)
    {
        $bb = imagettfbbox($size, 0, WATERMARK_FONT_REALPATH . $font, $text);
        $aa = deg2rad($rotation);
        $cc = cos($aa);
        $ss = sin($aa);
        $rr = array();
        for ($i = 0; $i < 7; $i += 2) {
            $rr[$i + 0] = round($bb[$i + 0] * $cc + $bb[$i + 1] * $ss);
            $rr[$i + 1] = round($bb[$i + 1] * $cc - $bb[$i + 0] * $ss);
        }
        return $rr;
    }
    
    /*
     * Wrapper function for opening file, calling watermark function and saving file
     */
    
    function create_watermark_from_string($source_file_path, $output_file_path, $text, $font, $size, $color, $opacity, $rotation, $align)
    {
        list($source_width, $source_height, $source_type) = getimagesize($source_file_path);
        if ($source_type === NULL) {
            return false;
        }
        switch ($source_type) {
            case IMAGETYPE_GIF:
                $source_gd_image = imagecreatefromgif($source_file_path);
                break;
            case IMAGETYPE_JPEG:
                $source_gd_image = imagecreatefromjpeg($source_file_path);
                break;
            case IMAGETYPE_PNG:
                $source_gd_image = imagecreatefrompng($source_file_path);
                break;
            default:
                return false;
        }
        
        $this->render_text_on_gd_image($source_gd_image, $text, $font, $size, $color, $opacity, $rotation, $align);
        imagejpeg($source_gd_image, $output_file_path, WATERMARK_OUTPUT_QUALITY);
        imagedestroy($source_gd_image);
    }
    
    /*
     * Uploaded file processing function
     */

    
    function process_image_upload($temp_file_path, $folder, $temp_file_name, $text, $font, $size, $color, $opacity, $rotation, $align)
    {
        $temp_file_path = $temp_file_path;
        $temp_file_name = $temp_file_name;
        
        list(, , $temp_type) = getimagesize($temp_file_path);
        if ($temp_type === NULL) {
            return false;
        }
        switch ($temp_type) {
            case IMAGETYPE_GIF:
                break;
            case IMAGETYPE_JPEG:
                break;
            case IMAGETYPE_PNG:
                break;
            default:
                return false;
        }
        echo 
        
        $uploaded_file_path = $temp_file_path;
        $processed_file_path = $temp_file_path;
        $uploaded_file_path_orginal = $folder.$temp_file_name;
        
        $processed_file_path = $folder.'images/'.$temp_file_name;
        //copy($processed_file_path, $uploaded_file_path_orginal);
        //move_uploaded_file($processed_file_path, $uploaded_file_path);
        /*
         * PARAMETER DESCRIPTION
         * (1) SOURCE FILE PATH
         * (2) OUTPUT FILE PATH
         * (3) THE TEXT TO RENDER
         * (4) FONT NAME -- MUST BE A *FILE* NAME
         * (5) FONT SIZE IN POINTS
         * (6) FONT COLOR AS A HEX STRING
         * (7) OPACITY -- 0 TO 100
         * (8) TEXT ANGLE -- 0 TO 360
         * (9) TEXT ALIGNMENT CODE -- POSSIBLE VALUES ARE 11, 12, 13, 21, 22, 23, 31, 32, 33
         */
        $result = $this->create_watermark_from_string(
            $uploaded_file_path,
            $processed_file_path,
            $text, $font, $size, $color, $opacity, $rotation, $align
        );
        if ($result === false) {
            return false;
        } else {
            return array($uploaded_file_path, $processed_file_path);
        }
    }
    
    
    
    
}

?>