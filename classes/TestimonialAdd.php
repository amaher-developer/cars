<?php

/**
 * @author maher
 * @copyright 2012
 */

class TestimonialAdd extends FormProcessor{

    public function __construct(){
        $module = 'testimonialAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into testimonials '.$this->columnsToInsert().'');
    }
     
}
?>