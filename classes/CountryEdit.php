<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class CountryEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'countryEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update countries set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>