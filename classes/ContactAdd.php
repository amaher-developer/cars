<?php
/**
 * @author maher
 * @copyright 2012
 */
class ContactAdd extends FormProcessor{
    public function __construct(){
        $module = 'contact';
        parent::__construct($module);
    }
    protected function excuteQuery(){
        Database::query('insert into contacts '.$this->columnsToInsert().'');
        
    }
}
?>