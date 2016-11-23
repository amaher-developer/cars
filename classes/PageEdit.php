<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class PageEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'pageEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update pages set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>