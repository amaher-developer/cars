<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class AdminEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'adminEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update admins set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>