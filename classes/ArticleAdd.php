<?php

/**
 * @author maher
 * @copyright 2012
 */

class ArticleAdd extends FormProcessor{

    public function __construct(){
        $module = 'articleAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into articles '.$this->columnsToInsert().'');
    }
     
}
?>