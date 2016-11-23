<?php
/**
 * @author maher
 * @copyright 2012
 */

class Course extends Entity{
    
    public function __construct($queryFirstPart = ' select * from courses '){
        parent::__construct($queryFirstPart);
    }
}
?>