<?php

/**
 * @author maher
 * @copyright 2012
 */

class CategoryAdd extends FormProcessor{

    public function __construct(){
        $module = 'categoryAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('insert into categories '.$this->columnsToInsert().'');
    }
    
    
     
}
?>