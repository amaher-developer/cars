<?php
/**
 * @author maher
 * @copyright 2012
 */

class Testimonial extends Entity{
    
    public function __construct($queryFirstPart = ' select * from testimonials '){
        parent::__construct($queryFirstPart);
    }
}
?>