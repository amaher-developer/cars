<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class TestimonialEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'testimonialEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update testimonials set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>