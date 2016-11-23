<?php

/**
 * @author maher
 * @copyright 2012
 */

class NewsAdd extends FormProcessor{

    public function __construct(){
        $module = 'newsAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
       Database::query('insert into news '.$this->columnsToInsert().'');
    }
    
     
}
?>