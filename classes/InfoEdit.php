<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class InfoEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'info';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update info set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>