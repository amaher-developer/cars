<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class AdvEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'advEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update ads set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
    
}
?>