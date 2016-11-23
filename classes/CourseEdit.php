<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class CourseEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'courseEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update courses set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>