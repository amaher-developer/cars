<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class PlaceEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'placeEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update places set '.$this->columnsToUpdate().' where id = '.$this->id.'');
        
        $_SESSION['placeId'] = $this->id;
    }
}
?>