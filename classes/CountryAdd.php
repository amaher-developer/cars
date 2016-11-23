ty<?php

/**
 * @author maher
 * @copyright 2012
 */

class CountryAdd extends FormProcessor{

    public function __construct(){
        $module = 'countryAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into countries '.$this->columnsToInsert().'');
    }
     
}
?>