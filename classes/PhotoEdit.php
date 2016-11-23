<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class PhotoEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'placeEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        $image = $this->successfulProcessed['image'];
        $placeId = $this->successfulProcessed['placeId'];
        
        Database::query('update images set
                         image = "'.$image.'", placeId = "'.$placeId.'" where id = '.$this->id.'');
        
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