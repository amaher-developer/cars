<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class CardPrint extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'cardPrint';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        $image = $this->successfulProcessed['image'];
        $cards = $this->successfulProcessed['cards'];
        
        if($image){
            Database::query('update students set
                             image = "'.$image.'", cards = "'.$cards.'" where id = '.$this->id.'');
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