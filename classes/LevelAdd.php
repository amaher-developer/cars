<?php

/**
 * @author maher
 * @copyright 2012
 */

class LevelAdd extends FormProcessor{

    public function __construct(){
        $module = 'levelAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into levels '.$this->columnsToInsert().'');
    }
     
}
?>