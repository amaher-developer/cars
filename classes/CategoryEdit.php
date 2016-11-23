<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class CategoryEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'categoryEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('update categories set '.$this->columnsToUpdate().' where id = '.$this->id.'');
        
        
    }
    
    
}
?>