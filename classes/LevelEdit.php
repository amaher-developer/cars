<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class LevelEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'levelEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update levels set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>