<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class OfferEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'offerEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update offers set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>