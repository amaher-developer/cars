ty<?php

/**
 * @author maher
 * @copyright 2012
 */

class CityAdd extends FormProcessor{

    public function __construct(){
        $module = 'cityAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into cities '.$this->columnsToInsert().'');
    }
     
}
?>