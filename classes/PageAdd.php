<?php

/**
 * @author maher
 * @copyright 2012
 */

class PageAdd extends FormProcessor{

    public function __construct(){
        $module = 'pageAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into pages '.$this->columnsToInsert().'');
    }
     
}
?>