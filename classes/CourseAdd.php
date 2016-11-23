<?php

/**
 * @author maher
 * @copyright 2012
 */

class CourseAdd extends FormProcessor{

    public function __construct(){
        $module = 'courseAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into courses '.$this->columnsToInsert().'');
    }
     
}
?>