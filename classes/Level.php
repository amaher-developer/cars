<?php
/**
 * @author maher
 * @copyright 2012
 */

class Level extends Entity{
    
    public function __construct($queryFirstPart = ' select * from levels '){
        parent::__construct($queryFirstPart);
    }
}
?>