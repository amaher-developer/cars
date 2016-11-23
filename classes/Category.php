<?php
/**
 * @author maher
 * @copyright 2012
 */

class Category extends Entity{
    
    public function __construct($queryFirstPart = ' select * from categories '){
        parent::__construct($queryFirstPart);
    }
}
?>