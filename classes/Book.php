<?php
/**
 * @author maher
 * @copyright 2012
 */

class Book extends Entity{
    
    public function __construct($queryFirstPart = ' select * from books '){
        parent::__construct($queryFirstPart);
    }
}
?>