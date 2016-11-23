<?php

/**
 * @author maher
 * @copyright 2012
 */

class OfferAdd extends FormProcessor{

    public function __construct(){
        $module = 'offerAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into offers '.$this->columnsToInsert().'');
    }
     
}
?>