<?php
/**
 * @author maher
 * @copyright 2012
 */

class Place extends Entity{
    
    public function __construct($queryFirstPart = ' select * from places '){
        parent::__construct($queryFirstPart);
    }
}
?>