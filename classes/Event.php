<?php
/**
 * @author maher
 * @copyright 2012
 */

class Event extends Entity{
    
    public function __construct($queryFirstPart = ' select * from events '){
        parent::__construct($queryFirstPart);
    }
}
?>