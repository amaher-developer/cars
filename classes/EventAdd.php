<?php

/**
 * @author maher
 * @copyright 2012
 */

class EventAdd extends FormProcessor{

    public function __construct(){
        $module = 'eventAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into events '.$this->columnsToInsert().'');
    }
     
}
?>