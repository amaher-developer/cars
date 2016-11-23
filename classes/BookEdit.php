<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class BookEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'bookEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update books set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>