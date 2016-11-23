<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class PhotoMapEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = '';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        $image = $this->successfulProcessed['image'];
        $level = $this->successfulProcessed['level'];
        
        Database::query('update mapimages set
                         mapimage = "'.$image.'", level = "'.$level.'" where id = '.$this->id.'');
        
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