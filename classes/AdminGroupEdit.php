<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class AdminGroupEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'adminGroupEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update admins_groups set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>