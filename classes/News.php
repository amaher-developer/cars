<?php
/**
 * @author maher
 * @copyright 2012
 */

class News extends Entity{
    
    public function __construct($queryFirstPart = ' select * from news '){
        parent::__construct($queryFirstPart);
    }
}
?>