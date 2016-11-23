<?php

/**
 * @author maher
 * @copyright 2012
 */

class PhotoMapAdd extends FormProcessor{

    public function __construct(){
        $module = '';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        $image = $this->successfulProcessed['mapimage'];
        $level = $this->successfulProcessed['level'];
        if($image && $level){
            Database::query('insert into mapimages 
                             (mapimage, level) value ("'.$image.'", "'.$level.'")');
        }
    }
    
    protected function createThumbnail($imageObject, $imageName, $folder){
        $saveThumbnail = $imageObject->saveWidthHeightRatio(
                $folder.'/thumb_'.$imageName.'.jpg',
                190,
                151  
        );

        return ($saveThumbnail);
    }
     
}
?>