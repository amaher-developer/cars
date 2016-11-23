<?php

/**
 * @author maher
 * @copyright 2012
 */

class AdvAdd extends FormProcessor{

    public function __construct(){
        $module = 'advAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
       Database::query('insert into ads '.$this->columnsToInsert().'');
    }
    
     
}
?>