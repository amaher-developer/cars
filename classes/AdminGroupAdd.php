<?php

/**
 * @author maher
 * @copyright 2012
 */

class AdminGroupAdd extends FormProcessor{

    public function __construct(){
        $module = 'adminGroupAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into admins_groups '.$this->columnsToInsert().'');
    }
     
}
?>