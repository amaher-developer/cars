<?php
/**
 * @author maher
 * @copyright 2012
 */

class City extends Entity{
    
    public function __construct($queryFirstPart = ' select * from cities '){
        parent::__construct($queryFirstPart);
    }
}
?>