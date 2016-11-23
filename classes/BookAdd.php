<?php

/**
 * @author maher
 * @copyright 2012
 */

class BookAdd extends FormProcessor{

    public function __construct(){
        $module = 'bookAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into books '.$this->columnsToInsert().'');
    }
     
}
?>