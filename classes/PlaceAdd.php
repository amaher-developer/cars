<?php

/**
 * @author maher
 * @copyright 2012
 */

class PlaceAdd extends FormProcessor{

    public function __construct(){
        $module = 'placeAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into places '.$this->columnsToInsert().'');
        $_SESSION['placeId'] = Database::insertID();
    }
     
}
?>