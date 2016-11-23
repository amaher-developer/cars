<?php

/**
 * @author maher
 * @copyright 2012
 */

class PhotoAdd extends FormProcessor{

    public function __construct(){
        $module = 'photoAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        $image = $this->successfulProcessed['image'];
        $placeId = $this->successfulProcessed['placeId'];
        if($image && $placeId){
            Database::query('insert into images 
                             (image, placeId) value ("'.$image.'", "'.$placeId.'")');
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