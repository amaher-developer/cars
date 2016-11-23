<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class EventEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'eventEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update events set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>