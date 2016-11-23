<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class NewsEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'newsEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update news set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
    
}
?>