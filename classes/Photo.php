<?php
/**
 * @author maher
 * @copyright 2012
 */

class Photo extends Entity{
    
    public function __construct($queryFirstPart = ' select * from images '){
        parent::__construct($queryFirstPart);
    }
}
?>